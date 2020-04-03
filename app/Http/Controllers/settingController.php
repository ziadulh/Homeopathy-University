<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class settingController extends Controller
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
    public function index()
    {
        $settings = Setting::first();
        return view('Setting.show',compact(['settings']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::find($id);
        return view('Setting.edit',compact(['setting']));
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
        $request->validate([
            "logo" => ' image | mimes:jpeg,png,jpg,gif,svg | max : 1024',
        ]);

        if($request->input('ins')){
            $ins = $request->input('ins');
        }
        else {
            $ins = '#';
        }


        Setting::where('id', $id)
          ->update([
            'web_title' => $request->input('web_title'),
            'phone' => $request->input('phone'),
            // 'logo' => $request->input('logo'),
            'third_party_code' => $request->input('third_party_code'),
            'address' => $request->input('address'),
            'copy_rights' => $request->input('copy_rights'),
            'meta_tag' => $request->input('meta_tag'),
            'site_admin_phone' => $request->input('site_admin_phone'),
            'site_admin_email' => $request->input('site_admin_email'),
            'fb' => $request->input('fb'),
            'tw' => $request->input('tw'),
            'ins' => $ins,
            'created_by' => auth()->user()->id,
          ]);

          if($file = $request->file('logo')){
            $data = Setting::find($id);
            $name = "";
            $album = $data->logo;
            $filename = public_path() . '/Photos/Logo/' . $album;

            \File::delete($filename);

            $name = rand() .$file->getClientOriginalName();
            $file->move(public_path('/Photos/Logo'), $name);


            Setting::where('id',$id)->update([
                "logo" => $name,
            ]);
        }

        return redirect(route('setting.edit',$id))->with('success','Settings is changed');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
