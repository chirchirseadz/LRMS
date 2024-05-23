@extends('layouts.table')

@section('content')

    <div class="row m-3">
        <div class="col-md-12 text-right">
         <a  class="btn btn-primary" href="{{route('rent_details.create')}}"> <i class="fa fa-plus mr-2" aria-hidden="true"></i>rent_detail</a>
        </div>
    </div>

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
                    <th>OVERDUE DATE</th>
                    <th>CREATED AT</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rent_details as $rent_detail)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$rent_detail->name}}</td>
                    
                    <td>{{date('j F Y  H:m:s', strtotime($rent_detail->overdue_date))}}</td>
                    <td>{{date('j F Y  H:m:s', strtotime($rent_detail->created_at))}}</td>
                 
                    <td>
                        <div class="margin">
                            <div class="btn-group">
                                <a href="{{route('rent_details.edit', $rent_detail->id)}}">
                                    <button type="button" class="btn btn-xs btn-default"><i class="fa fa-edit"></i>
                                        Edit</button>
                                </a>
                            </div>
                            <div class="btn-group">
                                <a href="{{route('rent_details.show', $rent_detail->id)}}">
                                    <button type="button" class="btn btn-xs btn-info"><i class="fa fa-eye"></i>
                                        View</button>
                                </a>
                            </div>
                            @can('delete rent-details')
                          
                          <div class="btn-group">
                               <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete" type="submit" class="btn btn-xs btn-danger "><i class="fa fa-trash"></i>
                                   delete</button>

                           </div>
               
                          @endcan

                           <!-- Modal -->
                       <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Item deletion</h5>
                                            <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span class="text-white" aria-hidden="true">&times;</span>
                                            </button>
                                           
                                        </div>
                                        <div class="modal-body">
                                        
                                            <form action="{{ route('rent_details.destroy', $rent_detail->id) }}" method="post">
                                            <p style="text-align:center;"> Are you sure you want to delete this record ? </p>
                                                @csrf
                                                @method('DELETE')
                                                <div class="row">
                                                
                                                    <div class="col-md-6">
                                                        <button class="btn btn-block btn-primary" data-dismiss="modal"><i class="fa fa-undo"></i> Back</button>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <button type="submit" class="btn btn-block btn-danger">
                                                            <i class="fa fa-trash"></i> Delete
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            


                        </div>
                    </td>

                </tr>
                @endforeach

            </tbody>
            <!-- <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </tfoot> -->
        </table>
    </div>
    <!-- /.card-body -->
</div>

@endsection