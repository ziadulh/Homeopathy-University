<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use App\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;
use App\Mail\sendPdf;
use App\Mail\sendMailToAdmin;
use App\Slider;
use App\Notice;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('Admin.home');
    // }

    public function index(){

        $message = Message::where('publish',1)->get();
        // $data = Homeopathy_pages::get();
        $slider = Slider::where('publish',1)->get();
        $setting = Setting::first();
        $notice = Notice::where('home',1)->get();
    	return view('home.index',compact(['message','setting','slider','notice']));
    }
    public function register()
    {
        $countries = DB::table('countries')->pluck('name','id');
        $setting = Setting::first();
        return view('home.registerForm',compact(['countries','setting']));



    }
    public function registerprocess(Request $request)
    {


        // 'password' => 'required | min:3 | required_with:password_confirmation|same:password_confirmation'
        $request->validate([

            'name' => 'required', 'nid' => 'required' ,'photo' => ' required | image | mimes:jpeg,png,jpg,gif,svg|  max:1024|', 'address' => 'required','country' => 'required','city' => 'required','phone' => 'required','email' => 'required | email | max:255| unique:users',
            'payment' => 'required', 'signature' => 'required | image | mimes:jpeg,png,jpg,gif,svg| max:1024',
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

        );



        $data_save = User::create($userRegistrationFormData);
        User::where('id', $data_save->id)
          ->update([
            'serial_no' => "HW-".$data_save->id,
          ]);

        $data = User::where('id', $data_save->id)->first();

        $user_data = User::where('id', $data_save->id)->first();
        $country = DB::table('countries')->where('id', $data_save->country)->first();
        $pdf = PDF::loadView('home.userRegistrationpdf', array('user_data' => $user_data, 'country' => $country));

        Mail::send(new sendMail($data,$pdf,$country));
        Mail::send(new sendMailToAdmin($data,$country));

        // $message = Message::first();
        // $setting = Setting::first();

        // $user_data = User::find($data->id);
        // $id = $user_data->id;

        // $country = DB::table('countries')->where('id',$user_data->country)->first();

        // $states = DB::table('states')->find($data->city);
        // $district = DB::table('districts')->find($data->district);



        // view()->share(compact(['user_data','country']));
        session()->flash('message',"your form has submitted. To download submitted data <a href='pdfview/$data->id'>click here</a>");

        // session()->flash('message','<a href="{{route(\'pdfview\',$id)}}">Click Here</a>');
        return redirect(route('home'));


        // return view('home.userRegistrationpdf',compact(['message','setting','user_registration_data','countries','states','district',]));



        // $items = ['user_data' => $user_data];


        // if($request->has('download')){
        //     $pdf = PDF::loadView('home.userRegistrationpdf');
        //     return $pdf->download('pdfview.pdf');
        // }



        // $pdfdata = ['user_data' => $user_data];
        // $pdf = PDF::loadView('home.userRegistrationpdf', $pdfdata);
        // return $pdf->download('demonutslaravel.pdf');

        // return redirect('/');



        // return view('home.userRegistrationpdf')
        // ->with(compact(['message','setting','user_registration_data','countries','states','district']))
        // ->with('success', 'Form Submitted');


    }

    public function pdfview(Request $request,$id){

        $items = User::find($id);
        // $user_data = ['user_data' => $items];
        $country = DB::table('countries')->where('id',$items->country)->first();
        $division = DB::table('states')->where('id',$items->city)->first();
        $district = DB::table('districts')->where('id',$items->district)->first();


        $pdf = PDF::loadView('home.userRegistrationpdf',array('user_data' => $items,'country' => $country,'division' => $division, 'district' => $district));
        return $pdf->download('pdfview.pdf');

    }

    // public function htmlpdf(){
    //     return view('home.userRegistrationpdf');
    // }

    public function sendPdfMail($id)
    {
        // $user_data = User::find($id);

        // $country = DB::table('countries')->where('id',$user_data->country)->first();

        // $data["client_name"] = $user_data->name;
        // $data["email"] = $user_data->email;
        // $data["subject"]= "Confirmation";

        // // $pdfdata = ['user_data' => $user_data];


        // $pdf = PDF::loadView('home.userRegistrationpdf', array('user_data' => $user_data, 'country' => $country));


        // // Mail::send('pdfsend', $data, function($message)use($data,$pdf) {
        // //     $message->to($data["email"], $data["client_name"])
        // //     ->subject($data["subject"])
        // //     ->attachData($pdf->output(), "invoice.pdf");
        // //     });

        // Mail::send(new sendPdf($data,$pdf));
        // return redirect(route('registration.index'));



        $data = User::find($id);

        $country = DB::table('countries')->where('id',$data->country)->first();

        

        // $pdfdata = ['user_data' => $user_data];


        $pdf = PDF::loadView('home.userRegistrationpdf', array('user_data' => $data, 'country' => $country));

        Mail::send(new sendPdf($data,$pdf,$country));
        return redirect(route('registration.index'))->with('seccess','Mail sent');
    }
}
