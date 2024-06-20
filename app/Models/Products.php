<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id'; // Fixed issue with the primary key
    protected $guarded = [];

    public static function getProducts()
    {
        try {
            return self::select('product_name', 'product_description', 'product_price') // Changed Absences to self
                ->get();
        } catch (\Exception $e) {
            Log::error("Products Model Error: getProducts(): " . $e->getMessage());
            return 0;
        }
    }

    public static function getProductDetails($id)
    {
        try {
            return self::select('product_name', 'product_description', 'product_price') // Changed Absences to self
                ->where("id", $id)
                ->get();
        } catch (\Exception $e) {
            Log::error("Products Model Error: getProductDetails(): " . $e->getMessage());
            return 0;
        }
    }
}
