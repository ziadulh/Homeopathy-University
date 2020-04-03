<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Photo;

class PhotoController extends Controller
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
        $photo = Photo::get();
        return view('Photos.list',compact(['photo']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $album = Album::get();
        return view('Photos.create',compact(['album']));
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
            "title" => 'required', "album_id" => 'required', 'photo' => "required | image | mimes:jpeg,png,jpg,gif,svg | max : 2048", "publish" => 'required',
        ]);

        $name='';
        if($file = $request->file('photo')){
            $name = rand() .$file->getClientOriginalName();
            $file->move(public_path('Photos/Photos'), $name);}

        $data = array(
            "title" => $request->input('title'),
            "album_id" => $request->input('album_id'),
            "description" => $request->input('description'),
            "photo" => $name,
            "created_by" => auth()->user()->id,
            "publish" => $request->input('publish'),
        );

        Photo::create($data);
        return redirect(route('photo.index'))->with('success','Photo is added');
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
        $album = Album::get();
        $photo = Photo::find($id);
        return view('Photos.edit',compact(['photo','album']));
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
            "title" => 'required', 'photo' => "image | mimes:jpeg,png,jpg,gif,svg| max : 2048"
        ]);

        Photo::where('id', $id)
          ->update([
            'title' => $request->input('title'),
            'album_id' => $request->input('album_id'),
            'description' => $request->input('description'),
            'publish' => $request->input('publish'),
            'updated_by' => auth()->user()->id
          ]);

          if($file = $request->file('photo')){
            $data = Photo::find($id);
            $name = "";
            $album = $data->photo;
            $filename = public_path() . '/Photos/Photos/' . $album;

            \File::delete($filename);

            $name = rand() .$file->getClientOriginalName();
            $file->move(public_path('/Photos/Photos'), $name);
            $data->photo = $name;

            Photo::where('id',$id)->update([
                "photo" => $name,
            ]);
        }

          return redirect(route('photo.edit',$id))->with('success','Photo information updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::find($id);

        $album = $photo->photo;
        $filename = public_path() . '/Photos/Photos/' . $album;
        \File::delete($filename);

        (Photo::find($id))->delete();

        return redirect(route('photo.index'))->with('success','Photo deleted');
    }
}
