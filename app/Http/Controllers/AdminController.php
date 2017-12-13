<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Store;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //

    public function index(){
        if(Auth::check()){
            return redirect()->route('admin.home');
        }
        return view('admin.auth.login');
    }

    public function home(){
        return view('admin.home');
    }

    public function listStores(){
        $stores = Store::paginate(5);

        return view('admin.stores.list', ['stores' => $stores]);
    }

    public function addStore(){
        return view('admin.stores.add');
    }

    public function addStoreProcess(Request $request){


        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        $store = new Store();
        $store->name = $request->name;
        $store->address = $request->address;
        $store->latitude = $request->latitude;
        $store->longitude = $request->longitude;

        $store->save();

        Session::flash('flash_message', 'Successfully added!');

        return redirect()->route('admin.stores');
    }

    public function showStore($id)
    {
        $store = Store::findOrFail($id);

        return view('admin.stores.show', ['store' => $store]);
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
            Session::flash('flash_message', 'Email or Password is Incorrect.');
            return redirect(url()->previous())->with('signin_error', 'Email or Password is Incorrect.');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('admin.login');
    }

}
