<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Homeopathy_pages;

class pagesController extends Controller
{
    public function home(){

        $data = Homeopathy_pages::get();
    	return view('User.home')->with('data',$data);
    }

    public function registerForm(){
    	return view('User.registerForm');
    }

    public function viewPages($id){
        return view('homeopathyPages.pageContent');
    }
}
