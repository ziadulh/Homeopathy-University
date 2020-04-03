<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;
use App\Mail\sendMailToAdmin;
use PDF;

class userRegistrationController extends Controller
{


    public function __construct()
    {
        $this->middleware('access');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // function to create multiple search option

        $filters = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'from' => $request->input('from'),
            'to' => $request->input('to'),
            'phone' => $request->input('phone'),
        ];



        // print_r($filters);exit;
            $user_registration_data = User::where('user_type','GENERAL')->where(function ($query) use ($filters) {
                if ($filters['name']) {
                    $query->where('name', 'LIKE', '%' . $filters['name'] . '%');
                }
                if ($filters['phone']) {
                    $query->where('phone', '=', $filters['phone']);
                }
                if ($filters['email']) {
                    $query->where('email', '=', $filters['email']);
                }
                if ($filters['from'] && $filters['to']) {
                    $from = $filters['from']. " 00:00:00";
                    $to = $filters['to']. " 23:59:59";
                    $query->where('created_at', '>=', $from)->where('created_at', '<=', $to);
                }
            })->get();

        return view('UserRegistration.list', compact(['user_registration_data']));
    }
    public function admin()
    {
        return view('admin.home');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $countries = DB::table('countries')->pluck('name','id');
        return view('UserRegistration.registerForm',compact(['countries']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'photo' => ' required | image | mimes:jpeg,png,jpg,gif,svg | max:1024', 'name' => 'required', 'nid' => 'required |','address' => 'required','country' => 'required','city' => 'required','phone' => 'required','email' => 'required | email ',
            'payment' => 'required', 'signature' => 'required | image | mimes:jpeg,png,jpg,gif,svg | max:1024',
        ]);

        $name='';
        if($file = $request->file('photo')){
            $name = rand() .$file->getClientOriginalName();
            $file->move(public_path('Photos/Users'), $name);}

            $signature_name = "";
            if($file = $request->file('signature')){
                $signature_name = rand() .$file->getClientOriginalName();
                $file->move(public_path('Photos/Signature'), $signature_name);}


        $userRegistrationFormData = array(
            "name" => $request->input('name'),
            "photo" => $name,
            "nid_or_passport_check" => $request->input('nid_or_passport_check'),
            "nid" => $request->input('nid'),
            "dhms_stdn" => $request->input('dhms_stdn'),
            "bhms_stdn" => $request->input('bhms_stdn'),
            "other_stdn" => $request->input('other_stdn'),
            "session_stdn" => $request->input('session_stdn'),
            "dhms_dctr" => $request->input('dhms_dctr'),
            "bhms_dctr" => $request->input('bhms_dctr'),
            "other_dctr" => $request->input('other_dctr'),
            "regNo_dctr" => $request->input('regNo_dctr'),
            "npp" => $request->input('npp'),
            "institute" => $request->input('institute'),
            "address" => $request->input('address'),
            "country" => $request->input('country'),
            "city" => $request->input('city'),

            "phone" => $request->input('phone'),
            "email" => $request->input('email'),
            "payment" => $request->input('payment'),
            "AcNumber" => $request->input('AcNumber'),
            "Transaction_no" => $request->input('Transaction_no'),
            "signature" => $signature_name,
            "publish" => $request->input('publish'),
            "created_by" => auth()->user()->id,

        );



        $data_save = User::create($userRegistrationFormData);

        User::where('id', $data_save->id)
          ->update([
            'serial_no' => "HW-".$data_save->id,
          ]);

        $data = User::where('id', $data_save->id)->first();

        $user_data = User::where('id', $data->id)->first();

        $country = DB::table('countries')->where('id', $data->country)->first();
        $pdf = PDF::loadView('home.userRegistrationpdf', array('user_data' => $user_data, 'country' => $country));

        Mail::send(new sendMail($data,$pdf,$country));

        Mail::send(new sendMailToAdmin($data,$country));

        return redirect(route('registration.index'))->with('success','Form submited');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_registration_data = User::find($id);
        return view('UserRegistration.show',compact(['user_registration_data']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_registration_data = User::find($id);
        $countries = DB::table('countries')->pluck('name','id');
        $city = DB::table('states')->where('country_id',$user_registration_data->country)->pluck('name','id');
        $district = DB::table('districts')->where('state_id',$user_registration_data->city)->pluck('name','id');
        return view('UserRegistration.edit',compact(['user_registration_data','countries','city','district']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = User::find($id);

        $request->validate([
        'name' => 'required', 'photo' => 'image | mimes:jpeg,png,jpg,gif,svg | max:1024', 'nid' => 'required','address' => 'required','country' => 'required','city' => 'required', 'phone' => 'required','email' => 'required | email',
            'payment' => 'required', 'signature' => 'image | mimes:jpeg,png,jpg,gif,svg | max:1024',
        ]);

        User::where('id', $id)
          ->update([
            'name' => $request->input('name'),
            "nid_or_passport_check" => $request->input('nid_or_passport_check'),
            'nid' => $request->input('nid'),
            'dhms_stdn' => $request->input('dhms_stdn'),
            'bhms_stdn' => $request->input('bhms_stdn'),
            'other_stdn' => $request->input('other_stdn'),
            'session_stdn' => $request->input('session_stdn'),
            'dhms_dctr' => $request->input('dhms_dctr'),
            'bhms_dctr' => $request->input('bhms_dctr'),
            'other_dctr' => $request->input('other_dctr'),
            'regNo_dctr' => $request->input('regNo_dctr'),
            'npp' => $request->input('npp'),
            'institute' => $request->input('institute'),
            'address' => $request->input('address'),
            'country' => $request->input('country'),
            'city' => $request->input('city'),

            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'payment' => $request->input('payment'),
            'AcNumber' => $request->input('AcNumber'),
            'Transaction_no' => $request->input('Transaction_no'),
            'publish' => $request->input('publish'),
            'updated_by' => auth()->user()->id,

          ]);


          if($file = $request->file('photo')){
            $name = "";
            $album = $data->photo;
            $filename = public_path() . '/Photos/Users/' . $album;

            \File::delete($filename);

            $name = rand() .$file->getClientOriginalName();
            $file->move(public_path('/Photos/Users'), $name);
            $data->photo = $name;

            User::where('id',$id)->update([
                "photo" => $name,
                ]);
            }

            if($file = $request->file('signature')){
                $name = "";
                $album = $data->signature;
                $filename = public_path() . '/Photos/Signature/' . $album;

                \File::delete($filename);

                $name = rand() .$file->getClientOriginalName();
                $file->move(public_path('/Photos/Signature'), $name);
                $data->signature = $name;

                User::where('id',$id)->update([
                    "signature" => $name,
                ]);
            }

          return redirect(route('registration.edit',$id))->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_registration_data = User::find($id);

        $album = $user_registration_data->photo;
        $filename = public_path() . '/Photos/Users/' . $album;
        \File::delete($filename);

        $user_registration_data->delete();

        return redirect(route('registration.index'))->with('success','User data delated successfully');
    }

}
