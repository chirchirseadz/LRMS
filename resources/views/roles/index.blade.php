@extends('layouts.table')


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
                    <th width='30%'>ACTION</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <td>NO:</td>
                    <td>{{$role->name}}</td>
                    <td>
                        <div class="margin">
                            <div class="btn-group">
                                <a href="{{route('roles.edit', $role->id)}}">
                                    <button type="button" class="btn btn-xs btn-default"><i class="fa fa-edit"></i>
                                        Edit</button>
                                </a>
                            </div>
                            <div class="btn-group">
                                <a href="{{route('roles.show', $role->id)}}">
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

@endsection('content')