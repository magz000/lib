<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\User;

class MainController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }


    public function index()
    {
        if(Auth::check()) {
            return redirect('home');
        }else{
            return view('public.landing');
        }
    }



    public function home(){

        if(Auth::user()->isAdmin()){
            return redirect()->route('admin.home');
        }else {
            return view('public.home');
        }
    }

    public function listUsers(){
        $users = User::where('id', '!=', Auth::user()->id)->get();

        return view('public.users', ['users' => $users ]);
    }
}
