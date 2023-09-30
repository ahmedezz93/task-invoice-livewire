@extends('admin_layouts.master')

@section('page_name','invoices')

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
              <th>number</th>
              <th>customer</th>
              <th>tax_percentage</th>
              <th>discount_percentage</th>
              <th>order_discount</th>
              <th>order_tax</th>
              <th>total</th>
              <th>grand_total</th>
            </tr>
            </thead>
            <tbody style="text-align: center">
                @forelse ($invoices as $invoice )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $invoice->reference_no }}</td>
                    <td>{{ $invoice->customer->company }}</td>
                    <td >{{ $invoice->tax_percentage }}</td>
                    <td>{{ $invoice->discount_percentage }}</td>
                    <td>{{ $invoice->order_discount }}</td>
                    <td>{{ $invoice->order_tax }}</td>
                    <td>{{ $invoice->total }}</td>
                    <td>{{ $invoice->grand_total }}</td>

                  </tr>

                @empty
                 data not found
                @endforelse
            </tbody>

          </table>
        </div>
        <!-- /.card-body -->
      </div>

      <!-- /.card -->

      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
@endsection

@push('script')

@endpush
