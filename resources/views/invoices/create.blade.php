@extends('admin_layouts.master')

@section('page_name', 'add invoice')


@section('css')
@livewireStyles
    <!-- daterange picker -->
@endsection
@section('content')

@livewire('invoices')


@endsection

@push('script')
@livewireScripts




@endpush
