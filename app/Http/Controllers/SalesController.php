<?php

namespace App\Http\Controllers;

use App\Models\customer_report;
use App\Models\Sales;
use App\Models\Products;
use App\Models\Purchases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Sales::all();
        $report = customer_report::all();
        return view('admin.sales.index', ['data' => $data, 'report' => $report]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Prodect_names = Products::select('id', 'purchase_id')->get();
        $Purchases_names = Purchases::select('id', 'product', 'quantity')->get();
        return view('admin.sales.create', ['Prodect_names' => $Prodect_names, 'Purchases_names' => $Purchases_names]);
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
            'customer_name' => 'required|max:225',
            'product' => 'required|array|min:1',
            'quantity' => 'required|array|min:1',
            'product.*' => 'distinct',
            'quantity.*' => 'min:1',
            ['product.distinct' => 'u can\'t sale same prodect more than one time just increae the quantity']
        ]);
        // return  $request->quantity ;
        if (count(array_filter($request->product)) != count((array_filter($request->quantity))))
            return redirect()->back()->with('msg', 'there are a prodect dosn\'t have quantity');
        /**
         *
sale_id
customer_name
total_price
sale_time

sale_id
prodects_id
quantity
         */
        $sale = new Sales();
        $sale->sale_man_id = Auth::id();
        $sale->customer_name = $request->customer_name;
        $sale->total_price    = 1;
        // $sale->sale_time = Carbon::now()->toDateTimeString();
        $sale->save();
        for ($i = 0; $i < count($request->product); $i++) {
            $report = new customer_report();
            $report->sale_id = $sale->id;
            $report->prodects_id = $request->product[$i];
            $report->quantity = $request->quantity[$i];
            $report->save();
        }
        $userPro = $request->product;
        // return $userPro;
        $allProdects = Products::select('id', 'price', 'discount')->get();
        $total_price = 0.0;
        for ($i = 0; $i < count($userPro); $i++) {
            foreach ($allProdects as $pro) {
                if ($userPro[$i] == $pro['id']) {
                    $total_price += ($pro['price'] - $pro['discount']) * ($request->quantity[$i]);
                    break;
                }
            }
            // if (in_array($userPro[$i], $allProdects)) {
            // }
        }
        $sale->update(['total_price' => $total_price]);
        return redirect()->route('sales.index')->with('msg', 'The Sale opration inserted succssfully');
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
        $Purchases_names = Purchases::select('id', 'product', 'quantity')->get();
        $sale = Sales::where('id', $id)->first();
        $report = customer_report::where('sale_id', $id)->get();
        $Prodect_names = Products::select('id', 'purchase_id')->get();
        // return $Purchases_names;
        return view('admin.sales.edit', ['sale' => $sale, 'report' => $report, 'Purchases_names' => $Purchases_names, 'Prodect_names' => $Prodect_names]);
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
        $this->validate($request, [
            'customer_name' => 'required|max:225',
            'product' => 'required|min:1',
            'quantity' => 'required|min:1',
        ]);
        $sale = Sales::findOrFail($id);

        $allProdects = Products::select('id', 'price', 'discount')->get();
        $old_values = customer_report::where('sale_id', $id)->get();
        $total_price = 0.0;
        $userPro = $request->product;
        $quantity = $request->quantity;
        for ($i = 0; $i < count($userPro); $i++) {
            foreach ($allProdects as $pro) {
                if ($userPro[$i] == $pro['id']) {
                    $total_price += ($pro['price'] - $pro['discount']) * ($quantity[$i]);
                    break;
                }
            }
        }
        // return $request->customer_name;
        $sale->update([
            'customer_name' => $request->customer_name,
            'total_price' => $total_price
        ]);

        for ($i = 0; $i < count($userPro); $i++) {
            customer_report::where(['sale_id' => $id, 'prodects_id' => $old_values[$i]['prodects_id']])->update([
                'prodects_id' => $userPro[$i],
                'quantity' => $quantity[$i]
            ]);
        }
        // $report = customer_report::where('sale_id', $id)->get();

        // return $report;

        return redirect()->route('sales.index')->with('msg', 'updated sucssfully');
        /**
        $id = array_fill(0, count($userPro), 'id');
        // $Product = array_combine($id, $userPro);
        $Product = array('id'=>$userPro);

        Flight::upsert([
            ['departure' => 'Oakland', 'destination' => 'San Diego', 'price' => 99],
            ['departure' => 'Chicago', 'destination' => 'New York', 'price' => 150]
        ], ['departure', 'destination'], ['price']);
        $report = customer_report::where('sale_id', $id);
        foreach ($userPro as $i => $v) {
            customer_report::where('sale_id', $id)->update(['prodects_id' => $userPro[$i], 'quantity' => $request->quantity[$i]]);
            // var_dump($report);
        // }
        customer_report::upsert(collect($userPro)->map(function ($userPro) use ($id) {
            return [
                'sale_id' => $id,
                'prodects_id' => $userPro

            ];
        })->toArray(), ['sale_id', 'prodects_id'], ['prodects_id']);
        customer_report::upsert(collect($quantity)->map(function ($quantity) use ($id) {
            return [
                'sale_id' => $id,
                'quantity' => $quantity

            ];
        })->toArray(), ['sale_id'], ['quantity']);
        $arr=
        collect($userPro)->map(function ($userPro) use ($id) {
            return [
                'sale_id' => $id,
                'prodects_id' => $userPro

            ];
        })->toArray();
        return $arr;

        for ($i = 0; $i < count($userPro); $i++) {
            $report->update([
                'prodects_id' => $userPro->prodects_id[$i],
                'quantity' => $userPro->quantity[$i]
            ]);
        }
         */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        customer_report::findOrFail($id)->delete();
        Sales::findOrFail($id)->delete();
        return redirect()->route('sales.index')->with('msg', 'deleted succssfully');
    }

    public function archive()
    {
        $data = Sales::onlyTrashed()->get();
        return view('admin.sales.archive', ['data' => $data]);
    }

    public function destroyArchive($id)
    {
        customer_report::withTrashed()->where('sale_id', $id)->forceDelete();
        Sales::withTrashed()->where('id', $id)->first()->forceDelete();
        return redirect()->route('sales.archive')->with('msg', 'Archive deleted secssfully');
    }

    public function restoreArchive($id)
    {
        customer_report::withTrashed()->where('sale_id', $id)->restore();
        Sales::withTrashed()->where('id', $id)->restore();
        return redirect()->route('sales.index')->with('msg', 'Archive restored succesfully');
    }

    public function report()
    {
        return view('admin.sales.report');
    }
    // public function getReport($start, $to)
    // {
    //     return $start . "   " . $to;
    // }
    public function getReport(Request $request)
    {
        $this->validate($request, [
            'fdate' => 'required',
            'ldate' => 'required',
        ]);
        //SELECT * FROM `sales` where updated_at >= 'fdate' and updated_at < ldate;
        $data = Sales::query()->where('created_at', '>=', $request->fdate)->where('created_at', '<', $request->ldate)->get();
        return view('admin.sales.report', ['data' => $data]);
        // return  $data;
    }
}
