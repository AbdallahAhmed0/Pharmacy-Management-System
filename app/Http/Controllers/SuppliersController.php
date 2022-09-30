<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suppliers;
use App\Http\Requests\StoreSuppliers;

class SuppliersController extends Controller
{

    public function index()
    {
        $data = Suppliers::all();
        return view('admin.suppliers.index', ['data' => $data]);
    }


    public function create()
    {
        return view('admin.suppliers.create');
    }


    public function store(StoreSuppliers $request)
    {
        Suppliers::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
            'address' => $request->adderss,
            'product' => $request->product,
            'comment' => $request->comment
        ]);
        return redirect()->route('suppliers.index')->with('msg', 'added successfully');
    }



    public function edit($id)
    {
        $data = Suppliers::findOrFail($id);
        return view('admin.suppliers.edit', ['data' => $data]);
    }


    public function update(StoreSuppliers $request, $id)
    {
        $supplier = Suppliers::findOrFail($id);
        $supplier->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
            'address' => $request->adderss,
            'product' => $request->product,
            'comment' => $request->comment
        ]);
        return redirect()->route('suppliers.index')->with('msg', 'Updated successfully');
    }

    public function destroy($id)
    {
        Suppliers::findOrFail($id)->delete();
        return redirect()->route('suppliers.index')->with('msg', 'Deleted successfully');
    }
    public function archive()
    {
        $data = Suppliers::onlyTrashed()->get();
        return view('admin.suppliers.archive', ['data' => $data]);
    }
    public function destroyArchive($id)
    {
        Suppliers::withTrashed()->where('id', $id)->first()->forceDelete();
        return redirect()->route('suppliers.archive')->with('msg', 'Deleted successfully');
    }
    public function restoreArchive($id)
    {
        Suppliers::withTrashed()->where('id', $id)->restore();
        return redirect()->route('suppliers.index')->with('msg', 'Restored successfully');
    }
}
