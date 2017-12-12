<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

use App\Store;

class AdminController extends Controller
{
    //

    public function index(){
        return view('admin.auth.login');
    }

    public function home(){
        return view('admin.home');
    }

    public function listStores(){
        $stores = Store::all();

        return view('admin.stores.list', ['stores' => $stores]);
    }

    public function addStore(){
        return view('admin.stores.add');
    }




    public function login(Request $request){
        $this->validate($request, [
            "email" => 'required',
            "password"  => 'required',
        ]);

        if(Auth::attempt([
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
            'type' => 1,
        ])) {
            return redirect()->route('admin.home')->with('signin_success', 'Successfully Logged In.');
        } else {
            return redirect(url()->previous())->with('signin_error', 'Email or Password is Incorrect.');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('admin.login');
    }

}
