<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class messageController extends Controller
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
        $data = Message::get();
        return view('Messages.messageList',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Messages.createMessage');
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
            "title" => 'required', "message" => 'required', "photo" => 'image | mimes:jpeg,png,jpg,gif,svg | max : 2048',
        ]);

        $name='';
        if($file = $request->file('photo')){
            $name = rand() .$file->getClientOriginalName();
            $file->move(public_path('Photos/Messenger'), $name);}

        $data = array(
            "title" => $request->input('title'),
            "message" => $request->input('message'),
            "publish" => $request->input('publish'),
            "created_by" => auth()->user()->id,
            "photo" => $name,
        );

        Message::create($data);

        return redirect(route('message.index'))->with('success','Message Created');


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
        $data = Message::find($id);
        return view('Messages.edit',compact(['data']));

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
            "title" => 'required', "message" => 'required' ,  "photo" => ' image | mimes:jpeg,png,jpg,gif,svg | max : 2048'
        ]);


        Message::where('id', $id)
          ->update([
            'title' => $request->input('title'),
            'message' => $request->input('message'),
            'publish' => $request->input('publish'),
            'updated_by' => auth()->user()->id
          ]);

          if($file = $request->file('photo')){
            $data = Message::find($id);
            $name = "";
            $album = $data->photo;
            $filename = public_path() . '/Photos/Messenger/' . $album;

            \File::delete($filename);

            $name = rand() .$file->getClientOriginalName();
            $file->move(public_path('/Photos/Messenger'), $name);
            $data->photo = $name;

            Message::where('id',$id)->update([
                "photo" => $name,
            ]);
        }

          return redirect(route('message.edit',$id))->with('success','Message is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data = Message::find($id);

        $album = $data->photo;
        $filename = public_path() . '/Photos/Messenger/' . $album;
        \File::delete($filename);

        (Message::find($id))->delete();

        return redirect(route('message.index'))->with('success','Message is deleted');
    }
}
