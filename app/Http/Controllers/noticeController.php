<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;

class noticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Notice::get();
        return view('notice.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notice.create');
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
            'title' => 'required', 'description' => 'required', 'photo' => 'required | image | mimes:jpeg,png,jpg,gif,svg | max : 2048',
        ]);

        $name='';
        if($file = $request->file('photo')){
            $name = rand() .$file->getClientOriginalName();
            $file->move(public_path('Photos/Notice'), $name);}

        $data = array(
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'publish' => $request->input('publish'),
            'home' => $request->input('home'),
            'created_by' => auth()->user()->id,
            'photo' => $name,
        );

        Notice::create($data);

        return redirect(route('notice.index'))->with('success','Notice Created');
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
        $data = Notice::find($id);
        return view('notice.edit',compact(['data']));
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
            "title" => 'required', "description" => 'required' ,  "photo" => ' image | mimes:jpeg,png,jpg,gif,svg| max : 2048'
        ]);


        Notice::where('id', $id)
          ->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'publish' => $request->input('publish'),
            'home' => $request->input('home'),
            'updated_by' => auth()->user()->id
          ]);

          if($file = $request->file('photo')){
            $data = Notice::find($id);
            $name = "";
            $album = $data->photo;
            $filename = public_path() . '/Photos/Notice/' . $album;

            \File::delete($filename);

            $name = rand() .$file->getClientOriginalName();
            $file->move(public_path('/Photos/Notice'), $name);
            $data->photo = $name;

            Notice::where('id',$id)->update([
                "photo" => $name,
            ]);
        }

          return redirect(route('notice.edit',$id))->with('success','Notice is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Notice::find($id);

        $album = $data->photo;
        $filename = public_path() . '/Photos/Notice/' . $album;
        \File::delete($filename);

        (Notice::find($id))->delete();

        return redirect(route('notice.index'))->with('success','Notice is deleted');
    }
}
