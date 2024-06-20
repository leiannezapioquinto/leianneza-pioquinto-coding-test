<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = id;
    protected $guarded = [];

}
