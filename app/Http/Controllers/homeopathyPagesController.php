<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;
use App\Homeopathy_pages;
use App\Photo;
use App\Setting;

class homeopathyPagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('access')->except('photo','gallery','view');
    }


    //manually created function
    public function view()
    {
        $segment_page = request()->segment(1);
        if(!empty($segment_page))
        {
            $setting = Setting::first();
            $page = Homeopathy_pages::where('slug',$segment_page)->first();
            return view('homeopathyPages.pageContent',compact(['page','setting']));
        }
    }

    public function gallery()
    {
        $segment_page = request()->segment(1);
        if(!empty($segment_page))
        {
        $gallery = Album::where('publish',1)->get();
        $setting = Setting::first();
        return view('homeopathyPages.gallery',compact(['gallery','setting']));
        }
    }

    public function photo($id)
    {
        $setting = Setting::first();
        $photo = Photo::where('album_id',$id)->where('publish',1)->get();
        return view('homeopathyPages.photo',compact(['photo','setting']));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pages_table_data = Homeopathy_pages::get();
        return view('homeopathyPages.list',compact(['pages_table_data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "Don't try to be over smart";
        // return view('HomeopathyPages.CreatePage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        return "Wrong Query";
        // $request->validate([
        //     "title" => 'required', "description" => 'required', 'slug' => "required",
        // ]);

        // $name='';
        // if($file = $request->file('photo')){
        //     $name = rand() .$file->getClientOriginalName();
        //     $file->move(public_path('Photos/HomeopathyPages'), $name);}

        // $data = array(
        //     "title" => $request->input('title'),
        //     "description" => $request->input('description'),
        //     "slug" => $request->input('slug'),
        //     "photo" => $name,
        //     "created_by" => auth()->user()->id,
        //     "third_party_code" => $request->input('third_party_code'),
        //     // 'nid' => $request->input('nid'),
        //     // 'user_type' => $request->input('user_type'),
        //     "publish" => $request->input('publish'),
        // );

        // Homeopathy_pages::create($data);
        // return redirect(route('pages.index'))->with('success','Page is added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pages_table_data = Homeopathy_pages::find($id);
        return view('homeopathyPages.edit',compact(['pages_table_data']));
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
            "title" => 'required', "description" => 'required', 'slug' => "required", 'photo' => 'image | mimes:jpeg,png,jpg,gif,svg | max : 2048',
        ]);

        $data = Homeopathy_pages::find($id);
        Homeopathy_pages::where('id', $id)
          ->update([
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'description' => $request->input('description'),
            'third_party_code' => $request->input('third_party_code'),
            'publish' => $request->input('publish'),
            'updated_by' => auth()->user()->id
          ]);

        if($file = $request->file('photo')){
            $name = "";
            $album = $data->photo;
            $filename = public_path() . '/Photos/HomeopathyPages/' . $album;

            \File::delete($filename);

            $name = rand() .$file->getClientOriginalName();
            $file->move(public_path('/Photos/HomeopathyPages'), $name);
            $data->photo = $name;

            Homeopathy_pages::where('id',$id)->update([
                "photo" => $name,
            ]);
        }

        return redirect(route('pages.edit',$id))->with('success','Page information is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $data = Homeopathy_pages::find($id);

    //     $album = $data->photo;
    //     $filename = public_path() . '/Photos/HomeopathyPages/' . $album;
    //     \File::delete($filename);

    //     $data->delete();
    //     return redirect(route('pages.index'))->with('success','Page is deleted');
    // }
}
