<?php

namespace App\Http\Controllers;

use App\Photo;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Store;
use Illuminate\Support\Facades\Hash;
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
        $stores = Store::orderBy('created_at', 'desc')->paginate(5);

        return view('admin.stores.list', ['stores' => $stores]);
    }

    public function addStore(){
        return view('admin.stores.add', ['action', 'add']);
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

        return redirect()->route('admin.stores.show', $store->id);
    }

    public function showStore($id)
    {
        $store = Store::findOrFail($id);

        $employees = User::where('store_id', '=', $id)->get();

        return view('admin.stores.show', ['store' => $store, 'employees' => $employees]);
    }

    public function editStore($id){
        $store = Store::findOrFail($id);

        return view('admin.stores.edit', ['store' => $store, 'action' => 'edit']);
    }

    public function editStoreProcess(Request $request, $id)
    {
        $store = Store::findOrFail($id);

        $store->name = $request->name;
        $store->address = $request->address;
        $store->latitude = $request->latitude;
        $store->longitude = $request->longitude;
        $store->save();

        Session::flash('flash_message', 'Successfully updated!');

        return redirect()->route('admin.stores.show', $id);

    }

    public function changeCoverImage($id){
        $store = Store::findOrFail($id);

        return view('admin.stores.change_cover_image', ['store' => $store]);
    }

    public function changeCoverImageProcess(Request $request, $id){

        $store = Store::findOrFail($id);

        if ($request->hasFile('cover_image')) {

            $file = $request->file('cover_image');

            $destinationPath = 'img/covers';

            if ($store->cover_image != null) {
                if(file_exists($destinationPath . '/' . $store->cover_image))
                    unlink($destinationPath . '/' . $store->cover_image) or die("Couldn't delete file");
            }

            $filename = 'store-' . $id . '-' . $store->name . '.' . $file->getClientOriginalExtension();

            $file->move($destinationPath, $filename);

            $store->cover_image = $filename;

            $store->save();

            Session::flash('flash_message', 'Successfully uploaded!');

            return redirect()->route('admin.stores.show', $id);
        }else{
            Session::flash('upload_failed', 'No file uploaded');

            return redirect()->back();
        }

    }

    public function addPhotos($id){
        $store = Store::findOrFail($id);

        return view('admin.stores.add_photos', ['store' => $store]);
    }

    public function addPhotosProcess(Request $request, $id){
        if($request->hasFile('photos')) {
            $files = $request->photos;

            $ctr = 0;

            foreach ($files as $file) {
                $filename = $id.'-'. date('YmdHis') . '-' . $ctr . '.' .$file->getClientOriginalExtension();
                $destinationPath = 'img/photos/' . $id;

                $photo = new Photo;
                $photo->store_id = $id;
                $photo->file_name = $filename;
                $photo->save();

                $file->move($destinationPath, $filename);

                $ctr++;
            }

            return redirect()->route('admin.stores.show', $id);
        }else{
            Session::flash('upload_failed', 'No file uploaded');

            return redirect()->back();
        }
    }

    public function deletePhoto($id){
        $photo = Photo::findOrFail($id);

        $destinationPath = 'img/photos/' . $photo->store_id;

        if(file_exists($destinationPath . '/' . $photo->file_name))
            unlink($destinationPath . '/' . $photo->file_name) or die("Couldn't delete file");


        $photo->delete();

        Session::flash('flash_message', 'Successfully deleted!');

        return redirect()->back();

    }

    public function deleteStore($id){
        $store = Store::findOrFail($id);

        $store->delete();

        Session::flash('flash_message', 'Successfully deleted!');

        return redirect()->back();

    }

    public function query(Request $request){
        $stores = Store::where('name','like','%'. $request->q .'%')
            ->orWhere('address', 'like', '%'. $request->q.'%')
            ->get();


        //return response()->json($result);
        return view('admin.stores.search', ['stores' => $stores]);
    }

    public function queryJSON(Request $request){

        $result = Store::where('name','like','%'. $request->q .'%')
                            ->orWhere('address', 'like', '%'. $request->q.'%')
                            ->get();

        return response()->json($result);
    }

    public function addEmployee($id){
        return view('admin.stores.add_employee', ['id' => $id]);
    }

    public function addEmployeeProcess(Request $request, $id){

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);


        $user = new User;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->name = $request->name;
        $user->type = 2;
        $user->store_id = $id;
        $user->save();

        return redirect()->route('admin.stores.show', $id);
    }

    public function deleteEmployeeProcess($id){
        $user = User::findOrFail($id);

        $user->delete();

        Session::flash('flash_message', 'Successfully deleted!');

        return redirect()->back();
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
