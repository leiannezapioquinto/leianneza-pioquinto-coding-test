<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Products;
use Yajra\DataTables\DataTables;
use App\Repositories\ProductRepositoryInterface;
use Carbon\Carbon;


class HomeController extends Controller
{
    protected $user;
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
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
        $products = $this->productRepository->getAll();
        return DataTables::of($products)->make(true);
    }

    public function GetProductDetails($id)
    {
        $product = $this->productRepository->getById($id);
        return response()->json(['productDetails' => $product]);
    }

    public function DeleteProduct($id)
    {
        $response = $this->productRepository->delete($id);
        return response()->json(['res' => $response]);
    }

    public function RegisterProduct(Request $request)
    {
        // Retrieve data from the request
        $name = $request->name;
        $description = $request->description;
        $price = $request->price;

        // Create a new product using the product repository
        $response = $this->productRepository->create([
            'product_name' => $name,
            'product_description' => $description,
            'product_price' => $price,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);

        // Return a JSON response indicating the result
        return response()->json(['res' => $response]);
    }
}
