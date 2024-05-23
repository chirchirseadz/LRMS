@extends('layouts.master')

@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-user-edit"></i> {{ $title }}</h3>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <form role="form" id="form" action="{{ route('tenant.store') }}" method="post">
                                @csrf

                                <div class="modal-body">
                                    <div class="row">

                                        <input type="hidden" name="appartment_id" value="{{$appartmentId}}">
                                        @error('appartment_id')
                                        <span class="text text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="customer_name">Tenant Name</label>
                                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter tenant name" autocomplete="off" value="{{old('name')}}" required>
                                                @error('name')
                                                <span class="text text-danger text-sm" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="customer_email">Tenant Email</label>
                                                <input type="text" name="email" class="form-control" id="name" placeholder="Enter tenant email" autocomplete="off" value="{{old('email')}}" required>
                                                @error('email')
                                                <span class="text text-danger text-sm" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="customer_name">Mobile Number</label>
                                                <input type="number" name="mobile_number" class="form-control" id="name" placeholder="Enter mobile number" autocomplete="off" value="{{old('mobile_number')}}" required>
                                                @error('mobile_number')
                                                <span class="text text-danger text-sm" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="customer_name">ID Number</label>
                                                <input type="number" name="id_number" class="form-control" id="name" placeholder="Enter ID number" autocomplete="off" value="{{old('id_number')}}" required>
                                                @error('id_number')
                                                <span class="text text-danger text-sm" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="customer_name">Tenant Address</label>
                                                <input type="text" name="address" class="form-control" id="name" placeholder="Enter tenant address" autocomplete="off" value="{{old('name')}}" required>
                                                @error('address')
                                                <span class="text text-danger text-sm" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="customer_name">Tenant Occupation</label>
                                                <input type="text" name="occupation" class="form-control" id="name" placeholder="Enter tenant occupation" autocomplete="off" value="{{old('occupation')}}" required>
                                                @error('occupation')
                                                <span class="text text-danger text-sm" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <!-- Form with Select2 -->
                                                <div class="form-group">
                                                    <label for="tenantSelect">Tenant</label>
                                                    <select id="tenantSelect" name="tenant_id" class="form-control select2" style="width: 100%;">
                                                        <option value="">Select Appartment</option>
                                                        @foreach ($appartments as $appartment )
                                                        <option value="{{$appartment->id}}">{{$appartment->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="submit" id="submit" class="btn btn-primary"> <i class="fa fa-user-edit"></i>
                                        Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->


@endsection