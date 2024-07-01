@extends('layouts.table')
@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#details" data-toggle="tab"><i
                                class="fa fa-user"></i>
                            Patient Details</a></li>

                    <li class="nav-item"><a class="nav-link" href="#visits" data-toggle="tab"><i
                                class="fa fa-users"></i>
                            Patient visits</a></li>

                    <li class="nav-item"><a class="nav-link" href="#mpesa-payments" data-toggle="tab"><i
                                class="fa fa-list"></i>
                            Mpesa Payments</a></li>

                    <li class="nav-item"><a class="nav-link" href="#cash-payments" data-toggle="tab"><i
                                class="fa fa-calendar"></i>
                            Cash Payments </a></li>
                </ul>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="details">
                        <!-- Profile -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fa fa-user"></i> Patient Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="modal-body">
                                    Patient details
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.Profile -->
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="mpesa-payments">
                        <!-- mpesa-payments -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fa fa-user-plus"></i> Mpesa Payments </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                Mpesa Payments
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- mpesa-payments -->
                    </div>
                    <!-- /.tab-pane -->
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="visits">
                        <!-- mpesa-payments -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fa fa-user-plus"></i> Patient Visits </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                Patient visits
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- mpesa-payments -->
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="cash-payments">
                        <!-- cash-payments -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fa fa-calendar"></i> Cash Payments
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="margin mb-2 text-right">
                                    <a href="#" target="_new">
                                        <!-- <button type="button" class="btn btn-success"><i class="fa fa-plus"></i>
                                                Add
                                                Cash Payments
                                            </button> -->
                                    </a>
                                </div>
                                Cash Payments of the patient
                            </div>
                        </div>
                        <!-- cash-payments -->
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</section>
<!-- /.content -->

@endsection