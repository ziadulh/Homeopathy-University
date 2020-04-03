<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notice;
use App\Setting;
use App\Slider;
use App\User;
use App\Message;
use App\Homeopathy_pages;

class dependentAjaxController extends Controller
{
    public function findState(Request $request)
    {
        $id = $request->get('id');
        $states = DB::table('states')->where('country_id',$id)->pluck('name','id');
        return response()->json($states);
    }

    public function findDistrict(Request $request)
    {
        $id = $request->get('id');
        $district = DB::table('districts')->where('state_id',$id)->pluck('name','id');
        return response()->json($district);
    }


    public function photoDestroy(Request $request){

        $id = $request->get('id');
        if ($id) {

            $data = Notice::find($id);
            $album = $data->photo;
            $filename = public_path() . '/Photos/Notice/' . $album;
            \File::delete($filename);

            Notice::where('id',$id)->update([
                "Photo" => "",
                ]);

        } else {
            echo "No";
        }
    }


    public function userPhotoDestroy(Request $request){

        $id = $request->get('id');
        if ($id) {

            $users = User::find($id);
            $album = $users->photo;
            $filename = public_path() . '/Photos/Users/' . $album;
            \File::delete($filename);

            User::where('id',$id)->update([
                "Photo" => "",
                ]);



        } else {
            echo "No";
        }
    }

    public function userSignDestroy(Request $request){

        $id = $request->get('id');
        if ($id) {

            $data = User::find($id);
            $album = $data->signature;
            $filename = public_path() . '/Photos/Signature/' . $album;
            \File::delete($filename);

            User::where('id',$id)->update([
                "signature" => "",
                ]);

        } else {
            echo "No";
        }
    }

    public function albumPhotoDestroy(Request $request){

        $id = $request->get('id');
        if ($id) {

            $data = Album::find($id);
            $album = $data->photo;
            $filename = public_path() . '/Photos/Album/' . $album;
            \File::delete($filename);


            Album::where('id',$id)->update([
                "Photo" => "",
                ]);
        } else {
            echo "No";
        }
    }



    public function settingDelete(Request $request){

        $id = $request->get('id');
        if ($id) {

            $data = Setting::find($id);

            $album = $data->logo;
            $filename = public_path() . '/Photos/Logo/' . $album;
            \File::delete($filename);

            Setting::where('id',$id)->update([
                "logo" => "",
                ]);
        }
        else {
            echo "No";
        }
    }

    public function sliderDelete(Request $request){

        $id = $request->get('id');
        if ($id) {

            $data = Slider::find($id);

            $album = $data->photo;
            $filename = public_path() . '/Photos/Slider/' . $album;
            \File::delete($filename);

            Slider::where('id',$id)->update([
                "photo" => "",
                ]);
        }
        else {
            echo "No";
        }
    }


    public function messageDelete(Request $request){

        $id = $request->get('id');
        if ($id) {

            $data = Message::find($id);

            $album = $data->photo;
            $filename = public_path() . '/Photos/Messenger/' . $album;
            \File::delete($filename);

            Message::where('id',$id)->update([
                "photo" => "",
                ]);
        }
        else {
            echo "No";
        }
    }


    public function pageDelete(Request $request){

        $id = $request->get('id');
        if ($id) {

            $data = Homeopathy_pages::find($id);

            $album = $data->photo;
            $filename = public_path() . '/Photos/HomeopathyPages/' . $album;
            \File::delete($filename);

            Homeopathy_pages::where('id',$id)->update([
                "photo" => "",
                ]);
        }
        else {
            echo "No";
        }
    }


}
