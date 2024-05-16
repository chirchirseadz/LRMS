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
                           
                                <div class="modal-body">
                                    <div class="row">
                                    
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="customer_name">Name</label>
                                                <input readonly type="text" name="full_name" class="form-control" id="full_name" placeholder="Enter full names" autocomplete="off" value="{{$landlord->full_name}}" required>
                                                @error('name')
                                                <span class="text text-danger text-sm" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                        </div>                                      
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="mobile_number">Mobile Number</label>
                                                <input readonly type="text" name="mobile_number" class="form-control" id="mobile_number" placeholder="Enter mobile number E.g 07xxx" autocomplete="off" value="{{$landlord->mobile_number}}" required>
                                                @error('mobile_number')
                                                <span class="text text-danger text-sm" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                        </div>                                      
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="identification_number">Identification Number</label>
                                                <input readonly type="text" name="identification_number" class="form-control" id="identification_number" placeholder="Enter identification number " autocomplete="off" value="{{$landlord->identification_number}}" required>
                                                @error('identification_number')
                                                <span class="text text-danger text-sm" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                        </div>                                      
                                      
                                    </div>

                                </div>
                               
                            
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