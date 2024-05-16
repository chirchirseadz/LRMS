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
                            <form role="form" id="form" action="{{ route('flat.store') }}" method="post">
                                @csrf

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="customer_name">Flat Name</label>
                                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter appartment name" autocomplete="off" value="{{old('appartment')}}" required>
                                            </div>
                                        </div>
                                        @error('name')
                                            <span class="text text-danger text-sm" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="customer_name">Location</label>
                                                <input type="text" name="location" class="form-control" id="name" placeholder="Enter location name" autocomplete="off" value="{{old('location')}}" required>
                                            </div>
                                        </div>
                                        @error('location')
                                            <span class="text text-danger text-sm" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                       <div class="col-md-6 col-sm-12">
                                       <div class="form-group">
                                            <label for="landlord_id">Landlord Name</label>
                                            <select name="landlord_id" id="landlord_id" class="form-control select2 text-dark" required>
                                                <option value="">- Select Landlord -</option>
                                                @foreach ($landlords as $landlord)
                                                <option value="{{ $landlord->id }}" @if(old('landlord_id')==$landlord->id) 'selected' @endif>
                                                   <span class="text-dark"> {{ $landlord->full_name }}</span>
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('landlord_id')
                                            <span class="text text-danger text-sm" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
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
<!-- /.content -


@endsection