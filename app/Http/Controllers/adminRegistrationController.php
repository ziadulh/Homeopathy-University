<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class adminRegistrationController extends Controller
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
        $data = User::where('user_type','ADMIN')->get();
        return view('AdminCURD.index',compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminCURD.create');
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
            'name' => 'required','email' => 'required','password' => 'required|min:3|required_with:confirm-password|same:confirm-password', 'confirm-password' => 'min:3|required',
        ]);


        $data = array(
            "name" => $request->input('name'),
            "email" => $request->input('email'),
            "password" => Hash::make($request->input('password')),
            "user_type" => 'ADMIN',
            "created_by" => auth()->user()->id
        );

        User::create($data);

        return redirect(route('adminCURD.index'))->with('success','User created');
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
        $data = User::where('user_type','ADMIN')->find($id);
        return view('AdminCURD.edit',compact(['data']));
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
            'name' => 'required','email' => 'required',
        ]);

        User::where('id',$id)->update([
            "name" => $request->input('name'),
            "email" => $request->input('email'),
            "updated_by" => auth()->user()->id
            ]);

        return redirect(route('adminCURD.edit',$id))->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::where('user_type','ADMIN')->find($id);
        $data->delete();
        return redirect(route('adminCURD.index'))->with('success','User deleted');

    }
}
