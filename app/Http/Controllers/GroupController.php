<?php

namespace App\Http\Controllers;

use App\Groupchat;
use App\Store;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GroupController extends Controller
{

    public function index()
    {
        if(Auth::check()){
            return redirect()->route('stores.home');
        }
        return view('stores.login');
    }

    public function home(){

        $store = Store::findOrFail(Auth::user()->store_id);

        return view('stores.home', ['store' => $store]);
    }

    public function getRequest(){

        $groupchats = Groupchat::where('store_id', '=', Auth::user()->store_id)->first();

        return json_encode($groupchats->user);
    }

    public function updateRequest($id, $status){
        $groupchat = Groupchat::findOrFail($id);

        $groupchat->status = $status;
        $groupchat->save();

        return redirect(url()->previous());
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
            return redirect()->route('stores.home');
        } else {
            Session::flash('flash_message', 'Email or Password is Incorrect.');
            return redirect(url()->previous());
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('stores.login');
    }



}
