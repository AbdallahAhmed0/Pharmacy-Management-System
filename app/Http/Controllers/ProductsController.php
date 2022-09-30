<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use App\Models\Purchases;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Products::all();
        $purchase = Purchases::all();
        $category = Categories::all();
        return view('admin.products.index', ['data' => $data, 'purchase' => $purchase, 'category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Purchases::all();
        return view('admin.products.add_product', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

        $data = array('id'=>$request->id, 'purchase_id'=>$request->purchase_id, 'price'=>$request->price, 'discount'=>$request->discount, 'description'=>$request->description);
        Products::create($data);
        return redirect()->route('products.index')->with('msg', 'Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Products::findOrFail($id);
        $purchase = Purchases::all();
        $category = Categories::all();
        return view('admin.products.show_product', ['data' => $data, 'purchase' => $purchase, 'category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Products::findOrFail($id);
        $purchase = Purchases::all();
        $category = Categories::all();
        return view('admin.products.edit', ['data'=>$data, 'purchase' => $purchase, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id)
    {
        $data = Products::findOrFail($id);

        $data->update([
            'id'=>$id,
            'purchase_id'=>$request->purchase_id,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'description'=>$request->description
        ]);

        return redirect()->route('products.index')->with('msg', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Products::findOrFail($id)->delete();
        return redirect()->route('products.index')->with('msg', 'Deleted successfully');
    }

    public function archive(){
        $data = Products::onlyTrashed()->get();
        return view('admin.products.archive', ['data'=>$data]);
    }


    public function destroyArchive($id){
        Products::withTrashed()->where('id', $id)->first()->forceDelete();
        return redirect()->route('products.archive')->with('msg', 'Delete Successfully');
    }

    public function restoreArchive($id){
        Products::withTrashed()->where('id', $id)->restore();
        return redirect()->route('products.index')->with('msg', 'Restored succesfully');
    }

}
