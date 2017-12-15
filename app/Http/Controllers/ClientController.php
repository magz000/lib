<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{

    public function index()
    {
        if(Auth::check()) {
            return redirect()->route('client.home');
        }else{
            return view('client.landing');
        }
    }

    public function home(){

        return view('client.home');
    }

    public function listUsers(){
        $users = User::where('id', '!=', Auth::user()->id)->get();

        return view('client.users', ['users' => $users ]);
    }

    public function listStores(){
        $stores = Store::all();

        return view('client.stores.list', ['stores' => $stores]);
    }

    public function query(Request $request){
        $stores = Store::where('name','like','%'. $request->q .'%')
            ->orWhere('address', 'like', '%'. $request->q.'%')
            ->get();


        return view('client.stores.search', ['stores' => $stores,
                                                    'latitude' => $request->lat,
                                                    'longitude' => $request->lng]);
    }

    public function profile(){
        return view('client.profile');
    }

    public function login(Request $request){
        $this->validate($request, [
            "email" => 'required',
            "password"  => 'required',
        ]);

        if(Auth::attempt([
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
            'type' => 3,
        ])) {
            return redirect()->route('client.home');
        } else {
            Session::flash('flash_message', 'Email or Password is Incorrect.');
            return redirect(url()->previous());
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('public.index');
    }

    public function register(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);


        $user = new User;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->name = $request->name;
        $user->type = 3;
        $user->save();

        Session::flash('registration_successful', 'Registration Successful.');

        return redirect('/login');
    }

}
