@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title"></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>NAME</th>
                    <th>PHONE NUMBER</th>
                    <th>TRANSACTION TYPE</th>
                    <th>TRANSACTION DATE/TIME</th>
                    <th>MPESA CODE</th>
                    <th>AMOUNT</th>
                    <th>CREATED AT</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($C2bPayments as $payment)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                        {{
                        isset($payment->FirstName) ? $payment->FirstName : (
                            isset($payment->MiddleName) ? $payment->MiddleName : (
                                isset($payment->LastName) ? $payment->LastName : ' '
                            )
                        )
                    }}
                    </td>
                    <td>{{$payment->MSISDN}}</td>
                    <td>{{$payment->TransactionType}}</td>
                    <td>{{date('j F Y  H:m:s', strtotime($payment->TransTime))}}</td>
                    <td>{{$payment->TransID}}</td>
                    <td>{{number_format($payment->TransAmount, 2)}}</td>
                    <td>{{date("j F Y", strtotime($payment->created_at))}}</td>
                    <!-- <td>{{date("j F Y", strtotime($payment->updated_at))}}</td> -->
                    <td>
                        <div class="margin">
                            @can('view mpesa-transactions')
                            <div class="btn-group">
                                <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#allocate" type="submit"><i class="fa fa-edit"></i>
                                    allocate</button>
                            </div>
                            @endcan
                        </div>
                    </td>
                    <!-- Modal -->
                    <div class="modal fade" id="allocate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title" id="exampleModalLongTitle"> <span class="mr-3"> <i class="fa fa-user-edit"></i></span>
                                        <h5 class="mt-1">Allocate transaction</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span class="text-white" aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('allocatePaymentToTenant', $payment->id)}}" method="post">
                                        @csrf
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <!-- Form with Select2 -->
                                                        <div class="form-group">
                                                            <label for="tenantSelect">Tenant</label>
                                                            <select id="tenantSelect" name="tenant_id" class="form-control select2" style="width: 100%;">
                                                                <option value="">Select tenant</option>
                                                                @foreach ($tenants as $tenant )                                                           
                                                                <option value="{{$tenant->id}}">{{$tenant->full_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <!-- Form with Select2 -->
                                                        <div class="form-group">
                                                            <label for="rentDetailsSelect">Rent Details</label>
                                                            <select id="rentDetailsSelect" name="payment_id" class="form-control select2" style="width: 100%;">
                                                                <option value="1">July rent</option>
                                                                <option value="2">August rent</option>
                                                                <option value="3">September rent</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                                                                     
                                                        <input  type="hidden" id="amount" name="amount" class="form-control" value="{{$payment->TransAmount}}" required>
                                                 
                                                    <div class="row">
                                                        <div class="col-md-6"></div>
                                                        <div class="col-md-6">
                                                            <button type="submit" class="btn btn-block btn-success">
                                                                <i class="fa fa-user-edit"></i> Submit
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>


                                </div>

                            </div>
                        </div>

                    </div>

                </tr>
                @endforeach

            </tbody>

        </table>
    </div>
    <!-- /.card-body -->
</div>

@endsection