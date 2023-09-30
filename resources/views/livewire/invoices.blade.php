<div>
    @include('messages')


    <div class="form-group">

    <label>date</label>
    <input type="date" wire:model="date" type="yyyy-MM-dd">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Refrence No</label>
        <input type="text" class="form-control" wire:model="reference" id="exampleInputEmail1" >
      </div>

    <div class="form-group">
        <label>Customer</label>
        <select wire:model="customer_id" class="form-control select2" style="width: 100%;">
            <option value="">choose customer</option>
            @if ($customers)
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->company }}</option>
                @endforeach

            @endif
        </select>
        @error('customer_id')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    </div>


    <div class="form-group">
        <label>Order Tax</label>
        <select class="form-control select2" wire:change="getGrandTotal" wire:model="order_tax"style="width: 100%;">
            <option >Choose Tax</option>
            <option value="0">No Tax</option>
            <option value="14">Value added tax(14%)</option>
        </select>
        @error('order_tax')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    </div>

    <div class="form-group">

        <label for="order_discount">Order Discount</label>

        <select class="form-control select2" wire:change="getGrandTotal" wire:model="order_discount"
            style="width: 100%;">
            <option >Choose Discount</option>

            @for ($i = 0; $i <= 100; $i += 5)
                <option value="{{ $i }}">{{ $i }}%</option>
            @endfor
        </select>
        @error('order_discount')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>quantity</th>
                                        <th>product</th>
                                        <th>unit price</th>
                                        <th>subtotal</th>
                                    </tr>
                                <tbody>

                                    @foreach ($rows as $index => $row)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}

                                            </td>
                                            <td>
                                                <input type="text" wire:model="rows.{{ $index }}.quantity"
                                                    wire:keyup="getSubtotal({{ $index }})">
                                            </td>
                                            <td>
                                                <select wire:model="rows.{{ $index }}.product_id"
                                                    wire:change="getSubtotal({{ $index }})">
                                                    <option value="">select product</option>
                                                    @isset($products)
                                                        @foreach ($products as $product)
                                                            <option value="{{ $product->id }}">
                                                                {{ $product->name }}</option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" disabled value="{{ $rows[$index]['price'] }}">
                                            </td>
                                            <td>
                                                {{ $rows[$index]['subtotal'] }}
                                            </td>
                                            <td>
                                                <a wire:click="removeRow({{ $index }})"
                                                    class="btn btn-primary">-</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a wire:click="addRow" class="btn btn-primary">+</a>
                            <div style="display: flex;  justify-content: space-around;">
                                <span>order discount: {{ $orderDiscount }}</span>
                                <span>order tax: {{ $orderTax }}</span>
                                <span>grand total: {{ $grandTotal }}</span>
                            </div>
                        </div> <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <div class="card-footer">
        <button type="submit" wire:click="storeInvoice" class="btn btn-primary">Submit</button>
    </div>


</div>


