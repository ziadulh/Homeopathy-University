<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;

class sliderController extends Controller
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
        $data = Slider::get();
        return view('Slider.list',compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Slider.create');
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
            "title" => 'required', "description" => 'required ','photo' => 'required | image | mimes:jpeg,png,jpg,gif,svg | max : 2048', 'publish' => 'required'
        ]);


        $name='';
        if($file = $request->file('photo')){
            $name = rand() .$file->getClientOriginalName();
            $file->move(public_path('Photos/Slider'), $name);}

        $slider = array(
            "title" => $request->input('title'),
            "description" => $request->input('description'),
            "publish" => $request->input('publish'),
            'created_by' => auth()->user()->id,
            "photo" => $name,
        );

        Slider::create($slider);

        return redirect(route('slider.index'))->with('success','Slider is added');
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
        $data = Slider::find($id);
        return view('Slider.edit',compact(['data']));
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
            "title" => 'required', "description" => 'required', 'publish' => "required", 'photo' => ' image | mimes:jpeg,png,jpg,gif,svg | max : 2048'
        ]);

        $data = Slider::find($id);
        Slider::where('id', $id)
          ->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'publish' => $request->input('publish'),
            'updated_by' => auth()->user()->id
          ]);

        if($file = $request->file('photo')){
            $name = "";
            $album = $data->photo;
            $filename = public_path() . '/Photos/Slider/' . $album;

            \File::delete($filename);

            $name = rand() .$file->getClientOriginalName();
            $file->move(public_path('/Photos/Slider'), $name);
            $data->photo = $name;

            Slider::where('id',$id)->update([
                "photo" => $name,
            ]);
        }

        return redirect(route('slider.edit',$id))->with('success','Slider information updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data = Slider::find($id);

        $album = $data->photo;
        $filename = public_path().'/Photos/Slider/'.$album;
        \File::delete($filename);

        (Slider::where('id', $id))->delete();

        return redirect(route('slider.index'))->with('success','Slider deleted');
    }
}
