<?php

namespace App\Http\Controllers;

use App\Avatar;
use App\Groupchat;
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
        $groupchat = Groupchat::where('user_id', Auth::user()->id)
                                    ->whereIn('status', [0,1])->first();


        if(!empty($groupchat)) {
            return redirect()->route('client.stores.show', $groupchat->store_id);
        }

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

    public function showStore($id){
        $store = Store::findOrFail($id);

        return view('client.stores.show', ["store" => $store]);
    }

    public function query(Request $request){
        $stores = Store::where('name','like','%'. $request->q .'%')
            ->orWhere('address', 'like', '%'. $request->q.'%')
            ->get();


        return view('client.stores.search', ['stores' => $stores,
                                                    'latitude' => $request->lat,
                                                    'longitude' => $request->lng]);
    }

    public function joinGroup($id, $store_id){
        $groupchat = new Groupchat;

        $groupchat->user_id = $id;
        $groupchat->store_id = $store_id;
        $groupchat->status = 0;
        $groupchat->save();

        return redirect(url()->previous());
    }

    public function profile($id){
        $user = User::findOrFail($id);

        return view('client.profile.show', ["user" => $user]);
    }

    public function editProfile(){

        $user = User::findOrFail(Auth::user()->id);

        $avatars = Avatar::all();

        return view('client.profile.edit', ["user" => $user, "avatars" => $avatars]);
    }

    public function editProfileProcess(Request $request, $id){

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->skills = $request->skills;
        $user->looking_for = $request->looking_for;
        $user->avatar_id =$request->avatar_id;
        $user->save();

        Session::flash('flash_message', 'Edit Successful');
        return redirect()->route('client.profile',  $id);

    }

    public function updateRequest($id, $status){
        $groupchat = Groupchat::findOrFail($id);

        $groupchat->status = $status;
        $groupchat->save();

        return redirect(url()->previous());
    }

    public function getStatus($id){
        $groupchats = Groupchat::findOrFail($id);

        return $groupchats->status;
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
            Session::flash('login_failed', 'Email or Password is Incorrect.');
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

        if(Auth::attempt([
            'email'     => $request->email,
            'password'  => $request->password,
            'type' => 3,
        ])){
            return redirect()->route('client.home');
        }else {
            Session::flash('login_failed', 'Email or Password is Incorrect.');
            return redirect(url()->previous());
        }

        Session::flash('registration_successful', 'Registration Successful.');

        return redirect('/login');
    }

}
