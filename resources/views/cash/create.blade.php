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
                            <form role="form" id="form" action="{{ route('cash.store') }}" method="post">
                                @csrf

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="patient_id">patient Name</label>
                                                <select name="patient_id" id="select" class="form-control select2bs4" required>
                                                    <option value="">- Select patient -</option>
                                                    @foreach ($patients as $patient)
                                                    <option value="{{ $patient->id }}" @if(old('patient_id')==$patient->id) selected @endif>
                                                        {{ $patient->name }} ({{ $patient->email }})
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('patient_id')
                                                <span class="text text-danger text-sm" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="customer_name">Amount</label>
                                                <input type="number" name="amount" class="form-control" id="amount" placeholder="Enter amount " autocomplete="off" value="{{old('amount')}}" required>
                                            </div>
                                        </div>
                                        @error('amount')
                                        <span class="text text-danger text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="customer_name">Date</label>
                                                <input type="date" name="date" class="form-control" id="date" placeholder="Enter payments date " autocomplete="off" value="{{old('date')}}" required>
                                            </div>
                                        </div>
                                        @error('date')
                                        <span class="text text-danger text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

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