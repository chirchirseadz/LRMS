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
                            <form role="form" id="form" action="{{ route('room.store') }}" method="post">
                                @csrf
                                
                                <div class="modal-body">
                                    <div class="row">
                                                                    
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="customer_name">Room Cost</label>
                                                <input type="number" name="amount" class="form-control" id="name" placeholder="Enter room cost amount" autocomplete="off" value="{{old('amount')}}" required>
                                                @error('amount')
                                                <span class="text text-danger text-sm" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
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