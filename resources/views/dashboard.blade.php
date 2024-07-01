@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-3 col-sm-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <!-- <h3>150</h3> -->

                <p>System Roles</p>
            </div>
            <div class="icon">
            <i class="fa fa-lock" aria-hidden="true"></i>
            </div>
            <a href="{{route('roles.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
     <!-- ./col -->
     <div class="col-lg-3 col-sm-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <p>Manage Users</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route('user.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
   
   
    <!-- ./col -->
    <!-- ./col -->
    <div class="col-lg-3 col-sm-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <p>Bio Data</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-sm-6">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                <p>Cash Payments</p>
            </div>
            <div class="icon">
               <i class="fa fa-money-bill"></i>
            </div>
            <a href="{{route('cash.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
   
   
    <!-- ./col -->
    <!-- ./col -->
    <div class="col-lg-3 col-sm-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <p>Mpesa transactions</p>
            </div>
            <div class="icon">
               <i class="fa fa-money-bill"></i>
            </div>
            <a href="{{route('allMpesaTransactions')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
   

   
    <!-- ./col -->
</div>
@endsection('content')