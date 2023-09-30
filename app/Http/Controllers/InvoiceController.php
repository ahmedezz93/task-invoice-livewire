<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{


    public function index(){


        $invoices=Invoice::all();

        return view('invoices.index',compact('invoices'));
    }
    public function create()
    {

        $customers=Customer::all();
        $products=Product::all();

        return view('invoices.create',compact('customers','products'));

    }


}
