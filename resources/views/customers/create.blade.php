@extends('admin_layouts.master')

@section('page_name', 'add customer')
@section('content')
    @include('messages')

    <form action="{{ route('store.customer') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="company">company</label>
            <input type="text" name="company" class="form-control" id="company" placeholder="company">
            @error('company')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="contact-person">contact person</label>
            <input type="text" name="contact_person" class="form-control" id="contact person"
                placeholder="contact person">
            @error('contact-person')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="Email Address">Email Address</label>
            <input type="text" name="email" class="form-control" id="Email Address" placeholder="Email Address">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label for="phone">phone</label>
            <input type="text" name="phone" class="form-control" id="phone" placeholder="phone">
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="Address"> Address</label>
            <input type="text" name="address" class="form-control" id="Address" placeholder="Address">
            @error('Address')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label for="city"> City</label>
            <input type="text" name="city" class="form-control" id="city" placeholder="city">
            @error('city')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>



        <div class="form-group">
            <label for="state"> State</label>
            <input type="text" name="state" class="form-control" id="state" placeholder="state">
            @error('state')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label for="postal code"> postal code</label>
            <input type="text" name="postal_code" class="form-control" id="postal code" placeholder="postal code">
            @error('postal_code')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>



        <div class="form-group">
            <label for="country"> Country</label>
            <input type="text" name="country" class="form-control" id="country" placeholder="country">
            @error('country')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

@endsection

@push('script')
@endpush
