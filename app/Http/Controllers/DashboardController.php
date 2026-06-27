<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $totalProducts = Product::count();

        $activeProducts = Product::where('is_active', true)->count();

        $lowStockProducts = Product::lowStock()->count();

        $outOfStockProducts = Product::where(
            'stock_quantity',
            0
        )->count();

        $inventoryValue = Product::selectRaw(
            'SUM(stock_quantity * cost_price) as total'
        )->value('total');

        return view('dashboard', compact(
            'totalProducts',
            'activeProducts',
            'lowStockProducts',
            'outOfStockProducts',
            'inventoryValue'
        ));
    }
}
