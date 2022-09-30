<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUser;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function index()
    {

        $data = User::all();
        return view('admin.user.index', ['data' => $data]);
    }

    public function create()
    {

        return view('admin.user.create');
    }


    public function store(StoreUser $request)
    {

        $imageName = null;
        if ($request->hasFile('avatar')) {
            $imageName = time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('images'), $imageName);
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'avatar' => $imageName
        ]);
        return redirect()->route('user.index')->with('msg', 'added successfully');
    }



    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('admin.user.edit', ['data' => $data]);
    }


    public function update(StoreUser $request, $id)
    {
        $imageName = $request->avatar;
        if ($request->hasFile('avatar')) {
            $imageName = time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('images'), $imageName);
        }
        $supplier = User::findOrFail($id);
        $supplier->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'avatar' => $imageName
        ]);
        return redirect()->route('user.index')->with('msg', 'Updated successfully');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('user.index')->with('msg', 'Deleted successfully');
    }
    public function archive()
    {
        $data = User::onlyTrashed()->get();
        return view('admin.user.archive', ['data' => $data]);
    }
    public function destroyArchive($id)
    {
        User::withTrashed()->where('id', $id)->first()->forceDelete();
        return redirect()->route('user.archive')->with('msg', 'Archive deleted successfully');
    }
    public function restoreArchive($id)
    {
        User::withTrashed()->where('id', $id)->restore();
        return redirect()->route('user.index')->with('msg', 'Restored successfully');
    }
}
