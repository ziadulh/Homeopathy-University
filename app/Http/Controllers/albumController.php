<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Photo;

class albumController extends Controller
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
        $data = Album::get();
        return view('Album.list',compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Album.create');
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
            "title" => 'required', 'photo' => "required | image | mimes:jpeg,png,jpg,gif,svg | max : 2048", "publish" => 'required'
        ]);

        $name='';
        if($file = $request->file('photo')){
            $name = rand() .$file->getClientOriginalName();
            $file->move(public_path('Photos/Album'), $name);}

        $data = array(
            "title" => $request->input('title'),
            "description" => $request->input('description'),
            "photo" => $name,
            "created_by" => auth()->user()->id,
            "publish" => $request->input('publish'),
        );
        Album::create($data);
        return redirect(route('album.index'))->with('success','Album is added');
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
        $data = Album::find($id);
        return view('Album.edit',compact(['data']));
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
            "title" => 'required', 'photo' => "image | mimes:jpeg,png,jpg,gif,svg | max : 2048"
        ]);

        Album::where('id', $id)
          ->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'publish' => $request->input('publish'),
            'updated_by' => auth()->user()->id
          ]);

          if($file = $request->file('photo')){
            $data = Album::find($id);
            $name = "";
            $album = $data->photo;
            $filename = public_path() . '/Photos/Album/' . $album;

            \File::delete($filename);

            $name = rand() .$file->getClientOriginalName();
            $file->move(public_path('/Photos/Album'), $name);
            $data->photo = $name;

            Album::where('id',$id)->update([
                "photo" => $name,
            ]);
        }

          return redirect(route('album.edit',$id))->with('success','Album information updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Album::find($id);
        $photos = Photo::where('album_id',$id)->get();

        foreach ($photos as $photos) {

            $photo_name = $photos->photo;

            $filename_photo = public_path() . '/Photos/Photos/' . $photo_name;
            \File::delete($filename_photo);

            (Photo::find($photos->id))->delete();
        }

        $album = $data->photo;
        $filename = public_path() . '/Photos/Album/' . $album;
        \File::delete($filename);

        (Album::find($id))->delete();

        return redirect(route('album.index'))->with('success','Album deleted');
    }
}
