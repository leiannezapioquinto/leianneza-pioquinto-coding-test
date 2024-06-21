<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Products;
use Yajra\DataTables\DataTables;
use App\Repositories\ProductRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

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
        // Define cache expiration time in minutes
        $minutes = 60;

        // Retrieve product details from cache or fetch from the database
        $product = Cache::remember('product_detail_' . $id, $minutes, function () use ($id) {
            return $this->productRepository->getById($id);
        });

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

    public function UpdateProduct(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'product_name' => 'required|string|max:255',
                'product_description' => 'required|string',
                'product_price' => 'required|numeric|min:0|max:9999999.99',
            ]);

            // Prepare the data for updating
            $data = [
                'product_name' => $request->product_name,
                'product_description' => $request->product_description,
                'product_price' => $request->product_price,
            ];

            // Update the product using the repository
            $product = $this->productRepository->update($request->id, $data);

            // Check if the product was successfully updated
            if ($product) {
                return response()->json(['success' => true, 'message' => 'Product updated successfully.']);
            } else {
                return response()->json(['success' => false, 'message' => 'Product update failed.'], 500);
            }
        } catch (\Exception $e) {
            Log::error("Home Controller Error: UpdateProduct(): " . $e->getMessage());
            return response()->json(['status_code' => 1]);
        }
    }
}
