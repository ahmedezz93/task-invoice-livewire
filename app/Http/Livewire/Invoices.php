<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Invoice_Product;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Invoices extends Component
{
    public $date, $customer_id, $order_tax, $order_discount, $quantity, $product_id, $unit_price, $subtotal, $result, $getPrice, $total, $orderDiscount, $orderTax, $grandTotal,$reference;
    public $rows = [];
    public function render()
    {

        $customers = Customer::all();
        $products = Product::all();

        return view('livewire.invoices', compact('customers', 'products'));
    }


    public function storeInvoice()
    {

            $this->validate([
                'date' => 'required|date',
                 'reference'=>'required|string',
                'customer_id' => 'required|integer|exists:customers,id',
                'order_tax' => 'numeric|between:0,100',
                'order_discount' => 'numeric|between:0,100',
                'rows.*.quantity' => 'required|integer|min:1',
                'rows.*.product_id' => 'required|integer|exists:products,id',
            ]);

            $invoice = Invoice::create([


                'customer_id' => $this->customer_id,
                'reference_no'=>$this->reference,
                'date' => date('Y-m-d H:i:s', strtotime($this->date)),
                'tax_percentage'=>$this->order_tax,
                'discount_percentage'=>$this->order_discount,
                 'total'=>$this->total,
                'order_discount' => $this->orderDiscount,
                'order_tax' => $this->orderTax,
                'grand_total' => $this->grandTotal,

            ]);

            $productIds = [];
            $productIds = $this->product_id;


            foreach ($this->rows as $index => $row) {
                Invoice_Product::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $row['product_id'],
                    'quantity' => $row['quantity'],
                    'subtotal' => $row['subtotal']
                ]);
            }

            return  back()->with('success', 'created successfully');

    }


    public function addRow()
    {
        $this->rows[] = [
            'quantity' => '',
            'product_id' => null,
            'price' => null,
            'subtotal' => null,
        ];
    }

    public function removeRow($index)
    {
        unset($this->rows[$index]);
        $this->rows = array_values($this->rows);
    }

    public function getSubtotal($index)
    {
        $row = $this->rows[$index];

        $product = Product::find($row['product_id']);
        if ($product) {
            $qty = ($row['quantity'] > 0 && !is_null($row['quantity'])) ? $row['quantity'] : 0;
            $row['price'] = $product->price;
            $row['subtotal'] = $qty * $product->price;
        } else {
            $row['price'] = 0;
            $row['subtotal'] = 0;
        }

        $this->rows[$index] = $row;
        $this->total = array_sum(array_column($this->rows, 'subtotal'));

        $this->getGrandTotal();
    }

    public function getGrandTotal()
    {

        $discount = ($this->order_discount > 0 && !is_null($this->order_discount)) ? $this->order_discount : 0;
        $this->orderDiscount = $this->total * ($discount / 100);

        $order_tax = ($this->order_tax > 0 && !is_null($this->order_tax)) ? $this->order_tax : 0;
        $this->orderTax = $this->total * ($order_tax / 100);

        $this->grandTotal = $this->total - ($this->orderDiscount + $this->orderTax);
    }
}
