<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StoreController extends Controller
{

    public function index()
    {
        if(Auth::check()){
            return redirect()->route('store.home');
        }
        return view('store.login');
    }

    public function home(){

        $store = Store::findOrFail(Auth::user()->store_id);

        return view('store.home', ['store' => $store]);
    }

    public function login(Request $request){
        $this->validate($request, [
            "email" => 'required',
            "password"  => 'required',
        ]);

        if(Auth::attempt([
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
            'type' => 2,
        ])) {
            return redirect()->route('store.home');
        } else {
            Session::flash('flash_message', 'Email or Password is Incorrect.');
            return redirect(url()->previous());
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('store.login');
    }



}
