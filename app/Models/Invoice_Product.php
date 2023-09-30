<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice_Product extends Model
{
    use HasFactory;
    protected $table="invoice_products";
    protected $fillable=["invoice_id",'product_id','quantity','subtotal'];
}
