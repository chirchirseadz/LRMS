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
                                <form role="form" id="form"
                                    action="{{ route('appartment.store') }}" method="post">
                                    @csrf
                                  
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="customer_name">Appartment Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                        id="name" placeholder="Enter appartment name" autocomplete="off"
                                                        value="{{old('appartment')}}" required>
                                                </div>
                                            </div>
                                
                                        </div>
                                    
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="submit" id="submit" class="btn btn-primary"> <i
                                                class="fa fa-user-edit"></i>
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