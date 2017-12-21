<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::all();

        return view('site.list', ['stores' => $stores]);
    }

    public function create()
    {
        return view('site.create');

    }

    public function store(Request $request)
    {
        $store = new Store;
        $store->name = $Request;

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

        Session::flash('success', 'Successfully added!');

        //return redirect()->route('admin.store.show', $store->id);
    }

    public function show($id)
    {
        $store = Store::findOrFail($id);

        return view('site.show', ['store' => $store]);
    }

    public function edit($id)
    {
        $store = Store::findOrFail($id);

        return view('site.edit', ['store' => $store]);
    }

    public function update(Request $request, $id)
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

    public function destroy($id)
    {
        $store = Store::findOrFail($id);

        $store->delete();

        Session::flash('flash_message', 'Successfully deleted!');

        return redirect()->back();
    }
}
