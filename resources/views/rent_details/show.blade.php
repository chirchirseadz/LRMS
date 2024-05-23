@extends('layouts.table')

@section('content')
<section class="content p-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <!-- <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                </div> -->


                        <h3 class="profile-username text-center">{{$appartment->name}}</h3>

                        <p class="text-muted text-center"></p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Price (Ksh) </b> <a class="float-right">{{$appartment->amount}}</a>
                            </li>

                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Currently occupying Tenant</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">


                        <div class="row">
                            <div class="col-md-3">
                                <strong><i class="fas fa-book m-2"></i> Name</strong>
                                <p class="text-muted">
                                    {{isset($tenant->name) ? $tenant->name : 'N/A'}}
                                </p>
                            </div>
                            <hr>
                            <div class="col-md-3">
                                <strong><i class="fas fa-edit m-2"></i> Email</strong>
                                <p class="text-muted">
                                    {{isset($tenant->email) ? $tenant->email: 'N/A'}}
                                </p>
                            </div>
                            <hr>
                            <div class="col-md-3">
                                <strong><i class="fas fa-bars m-2"></i> Mobile Number</strong>
                                <p class="text-muted">
                                    {{isset($tenant->mobile_number) ? $tenant->mobile_number : 'N/A'}}
                                </p>
                            </div>
                            <div class="col-md-3">
                                <strong><i class="fas fa-pen m-2"></i> ID Number</strong>
                                <p class="text-muted">
                                    {{isset($tenant->id_number) ? $tenant->id_number : 'N/A'}}
                                </p>
                            </div>
                            <div class="col-md-3">
                                <strong><i class="fas fa-bars m-2"></i> Address</strong>
                                <p class="text-muted">
                                    {{isset($tenant->address) ? $tenant->address : 'N/A'}}
                                </p>
                            </div>
                            <div class="col-md-3">
                                <strong><i class="fas fa-eye m-2"></i> E-Contact </strong>
                                <p class="text-muted">
                                    {{isset($tenant->emergency_contact) ? $tenant->emergency_contact : 'N/A' }}
                                </p>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<div class="row m-3">
    <div class="col-md-7">
        <h3> Previous tenants for {{$appartment->name}} appartment </h3>
    </div>

    <div class="col-md-5 text-right p-2">

        <a class="btn btn-primary" href="/"> <i class="fa fa-plus mr-2" aria-hidden="true"></i>ASSIGN APPARTMENT</a>
    </div>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"></h3>
        </div>
        <!-- /.card-header  -->

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>MOBILE NUMBER</th>
                        <th>ID NUMBER</th>
                        <th>ADDRESS</th>
                        <th>OCCUPATION</th>
                        <th>EMERGENCY NUMBER</th>
                        <th>CREATED AT</th>
                        <th>UPDATED AT AT</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>

                    @if ($tenant == null)
                    <p class="alert alert-danger alert-sm "> No Tenant in this appartment !</p>
                    @else
                    <tr>
                        <td>NO:</td>
                        <td>{{$tenant->name}}</td>
                        <td>{{$tenant->email}}</td>
                        <td>{{$tenant->mobile_number}}</td>
                        <td>{{$tenant->id_number}}</td>
                        <td>{{$tenant->address}}</td>
                        <td>{{$tenant->occupation}}</td>
                        <td>{{isset($tenant->emergency_contact) ? $tenant->emergency_contact : 'N/A' }}</td>
                        <td>{{$tenant->created_at}}</td>
                        <td>{{$tenant->updated_at}}</td>
                        <td>
                            <div class="margin">
                                <div class="btn-group">
                                    <a href="{{route('tenant.edit', $tenant->id)}}">
                                        <button type="button" class="btn btn-xs btn-default"><i class="fa fa-edit"></i>
                                            Edit</button>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a href="{{route('tenant.show', $tenant->id)}}">
                                        <button type="button" class="btn btn-xs btn-info"><i class="fa fa-eye"></i>
                                            View</button>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <form action="" method="post" onclick="return confirm('Do you really want to delete this desktop?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>
                                            Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>

                    </tr>
                    @endif


                </tbody>

            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>

@endsection