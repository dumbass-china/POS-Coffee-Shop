@extends('front_master')

@push('styles')
@endpush
<style>
    #email::placeholder {
        color: #3559e0;
    }

    #address::placeholder {
        color: #3559e0;
    }

    #phone::placeholder {
        color: #3559e0;
    }

    #companyname::placeholder {
        color: #3559e0;
    }

    #customername::placeholder {
        color: #3559e0;
    }
</style>
@section('content')
    <div class="container-fluid mt-3">
        <div class="table-responsive" style="background-color: #ffffff">
            <div class="card-header" style="background-color: #3559e0; color: #ffffff">
                <h3 class="card-title" style="font-size: 35px">Create Customer</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.customer.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 px-5 mt-3">
                            <div class="form-group">
                                <label for="customername" class="custom-label my-2"
                                    style="font-size: 20px; color: #3559e0;">Customer Name</label>
                                <input type="text" name="customername" class="form-control" id="customername"
                                    placeholder="Enter Customer Name" style=" color: #3559e0;">
                            </div>
                            <div class="form-group">
                                <label for="companyname" class="custom-label my-2"
                                    style="font-size: 20px; color: #3559e0;">Company Name</label>
                                <input type="text" name="companyname" class="form-control" id="companyname"
                                    placeholder="Enter Company Name" style=" color: #3559e0;">
                            </div>
                            <div class="form-group">
                                <label for="phone" class="custom-label my-2"
                                    style="font-size: 20px; color: #3559e0;">Phone Number</label>
                                <input type="text" name="phone" class="form-control" id="phone"
                                    placeholder="Enter Phone Number" style=" color: #3559e0;">
                            </div>
                            <div class="form-group">
                                <label for="email" class="custom-label my-2"
                                    style="font-size: 20px; color: #3559e0;">Email</label>
                                <input type="text" name="email" class="form-control" id="email"
                                    placeholder="Enter Email" style=" color: #3559e0;">
                            </div>
                        </div>

                        <div class="col-md-6 px-5 mt-3">
                            <div class="form-group">
                                <label for="address" class="custom-label my-2"
                                    style="font-size: 20px; color: #3559e0;">Address</label>
                                <textarea class="form-control" name="address" id="address" cols="30" rows="5" placeholder="Enter Address"
                                    style=" color: #3559e0;">
                                </textarea>
                            </div>
                            <label for="address" class="custom-label my-2" style="font-size: 20px; color: #3559e0;">Active
                                or InActive</label>
                            <div class="form-check form-switch mx-2">
                                <input type="hidden" name="ishidden" value="0">
                                <!-- Hidden field for unchecked state -->
                                <input class="form-check-input fs-5" type="checkbox" id="ishiddenCheckbox" name="ishidden"
                                    value="1" checked>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12  mt-3 d-flex justify-content-end">
                                <a href="{{ route('admin.customer.index') }}" class="btn btn-primary"
                                    style="background-color: #3559e0; width: 100px;">Back</a>
                                <button type="submit"class="btn btn-block btn-default mx-4"
                                    style="background-color: #3559e0;width: 100px;color:#ffffff">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
