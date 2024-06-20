<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Products;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
    protected $user;

    public function __construct()
    {
        // Initialize the $user property with the authenticated user
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function GetProductsList()
    {
        $products = Products::all();

        return DataTables::of($products)->make(true);
    }

    public function GetProductDetails($id)
    {
        $productDetails = Products::getProductDetails($id);
        return response()->json(['productDetails' => $productDetails]);
    }
}
