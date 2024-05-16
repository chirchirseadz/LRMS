@extends('layouts.master')

@section('content')

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <!-- <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
            </div> -->


            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Mobile Number</b> <a class="float-right">{{$tenant->mobile_number}}</a>
              </li>
              <li class="list-group-item">
                <b>Id Number</b> <a class="float-right">{{$tenant->id_number}}</a>
              </li>
              <li class="list-group-item">
                <b>Email </b> <a class="float-right">{{$tenant->email}}</a>
              </li>
              <li class="list-group-item">
                <b>Occupation </b> <a class="float-right">{{$tenant->occupation}}</a>
              </li>
              <li class="list-group-item">
                <b>Emergency Contact </b> <a class="float-right">{{isset($tenant->emergency_contact) ? $tenant->emergency_contact : 'N/A'}}</a>
              </li>
            </ul>

            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->


        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#appartment_details" data-toggle="tab">Appartment Details</a></li>
              <li class="nav-item"><a class="nav-link" href="#cash_payments" data-toggle="tab">Cash payments</a></li>
              <li class="nav-item"><a class="nav-link" href="#mpesa_payments" data-toggle="tab">Mpesa payments</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <!-- tab -->
            <div class="tab-content">
              <div class="tab-pane active" id="appartment_details">

                <div class="card card-primary card-outline">
                  <div class="card-body box-profile">

                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Name</b> <a class="float-right">{{isset($appartment->name) ? $appartment->name : 'N/A' }}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Id Number</b> <a class="float-right">{{isset($appartment->amount) ? $appartment->amount : 'N/A'}}</a>
                      </li>    
                    </ul>
                  
                  </div>
                  <!-- /.card-body -->
                </div>

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="cash_payments">
                <div class="card card-primary">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>AMOUNT (Ksh)</th>
                        <th>PAYMENT DATE</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>100</td>
                        <td>may 10 2024</td>
                      </tr>

                    </tbody>

                  </table>
                  <!-- /.card-body -->
                </div>

              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="mpesa_payments">

              <div class="card card-primary">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>AMOUNT (Ksh)</th>
                        <th>TTRANSACTION CODE (Ksh)</th>
                        <th>PAYMENT DATE</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>100</td>
                        <td>QRSDEOWIDJRU</td>
                        <td>may 10 2024</td>
                      </tr>

                    </tbody>

                  </table>
                  <!-- /.card-body -->
                </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>

@endsection