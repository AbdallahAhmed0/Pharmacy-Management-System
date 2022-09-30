<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use App\Models\Purchases;
use App\Models\Suppliers;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Purchases::all();
        $Category_names = Categories::select('id', 'name')->get();
        $Supplier_name = Suppliers::select('id', 'name')->get();
        return view('admin.purchases.index', ['data' => $data, 'Category_names' => $Category_names, 'Supplier_name' => $Supplier_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Category_names = Categories::select('id', 'name')->get();
        $Supplier_name = Suppliers::select('id', 'name')->get();
        return view('admin.purchases.create', ['Category_names' => $Category_names, 'Supplier_name' => $Supplier_name]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product' => 'required|max:200',
            'category' => 'required',
            'cost_price' => 'required|min:1',
            'quantity' => 'required|min:1',
            'expiry_date' => 'required',
            'supplier' => 'required',
            'image' => 'file|image|mimes:jpg,jpeg,png,gif',
        ]);
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage/purchases'), $imageName);
        }
        Purchases::create([
            'product' => $request->product,
            'category_id' => $request->category,
            'supplier_id' => $request->supplier,
            'cost_price' => $request->cost_price,
            'quantity' => $request->quantity,
            'expiry_date' => $request->expiry_date,
            'image' => $imageName,
        ]);
        return redirect()->route('purchases.index')->with('msg', 'Purchases has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $purchases = purchases::findOrFail($id);
        $Category_name = Categories::findOrFail($purchases['category_id']);
        $Supplier_name = Suppliers::findOrFail($purchases['supplier_id']);
        $Category_names = Categories::select('id', 'name')->get();
        $Supplier_names = Suppliers::select('id', 'name')->get();
        return view('admin.purchases.edit', ['purchases' => $purchases, 'Category_names' => $Category_name, 'Supplier_name' => $Supplier_name, 'Category_names' => $Category_names, 'Supplier_names' => $Supplier_names]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $purchases = Purchases::findOrFail($id);
        $this->validate($request, [
            'product' => 'required|max:200',
            'category' => 'required',
            'cost_price' => 'required|numeric|min:1|not_in:0',
            'quantity' => 'required|numeric|min:1|not_in:0',
            'expiry_date' => 'required',
            'supplier' => 'required',
            'image' => 'file|image|mimes:jpg,jpeg,png,gif',
        ]);
        $imageName = $purchases->image;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage/purchases'), $imageName);
        }
        $purchases->update([
            'product' => $request->product,
            'category_id' => $request->category,
            'supplier_id' => $request->supplier,
            'cost_price' => $request->cost_price,
            'quantity' => $request->quantity,
            'expiry_date' => $request->expiry_date,
            'image' => $imageName,
        ]);

        return redirect()->route('purchases.index')->with('msg', "Purchase has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $product = Products::findOrFail($id); //should i delete the prodect that mapped to that purchases
        Purchases::findOrFail($id)->delete();
        return redirect()->route('purchases.index')->with('msg', "Purchase has been deleted");
    }


    public function report()
    {
        return view('admin.purchases.report');
    }
    // public function getReport($start, $to)
    // {
    //     return $start . "   " . $to;
    // }
    public function getReport(Request $request)
    {
        //SELECT * FROM `sales` where updated_at >= 'fdate' and updated_at < ldate;
        $data = Purchases::query()->where('created_at', '>=', $request->fdate)->where('created_at', '<', $request->ldate)->get();
        $Category_names = Categories::select('id', 'name')->get();
        $Supplier_name = Suppliers::select('id', 'name')->get();
        return view('admin.purchases.report', ['data' => $data, 'Category_names' => $Category_names, 'Supplier_name' => $Supplier_name]);

        // return  $data;
    }
}
