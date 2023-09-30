<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function create()
    {

        return view('customers.create');
    }



    public function store(CustomerRequest $request)
    {

        try {

            $request->validated();
            Customer::create($request->all());
            return  back()->with('success', 'created successfully');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getmessage());
        }
    }
}
