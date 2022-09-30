<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sales;
use App\Models\Categories;
use App\Models\Purchases;
use App\Models\Suppliers;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $total_purchases = Purchases::where('expiry_date', '!=', Carbon::now())->count();
        $total_categories = Categories::count();
        $total_suppliers = Suppliers::count();
        $total_sales = Sales::count();

        $total_expired_products = Purchases::whereDate('expiry_date', '=', Carbon::now())->count();
        $latest_sales = Sales::whereDate('created_at', '=', Carbon::now())->get();
        $today_sales = Sales::whereDate('created_at', '=', Carbon::now())->sum('total_price');
        return view('admin.dashboard', compact(
            'total_expired_products',
            'latest_sales',
            'today_sales',
            'total_categories',
            'total_suppliers',
            'total_sales',
            'total_purchases'
        ));
    }
}
