@extends('layouts.table')

@section('content')



<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-primary float-right" data-toggle="modal"
            data-target=".bd-example-modal-lg"><i class="fa fa-user-plus"></i> Add New User</button>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>CREATED AT</th>
                    <th>UPDATED AT</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>

                        <td>{{date("j F Y", strtotime($user->created_at))}}</td>
                        <td>{{date("j F Y", strtotime($user->updated_at))}}</td>
                        <td>
                            <div class="margin">
                                <div class="btn-group">
                                    <a href="{{route('user.edit', $user->id)}}">
                                        <button type="button" class="btn btn-xs btn-default"><i class="fa fa-edit"></i>
                                            Edit</button>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a href="{{route('user.show', $user->id)}}">
                                        <button type="button" class="btn btn-xs btn-info"><i class="fa fa-eye"></i>
                                            View</button>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <form action="{{route('user.destroy', $user->id)}}" method="post"
                                        onclick="return confirm('Do you really want to delete this record ?')">
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

        </table>
    </div>
    <!-- /.card-body -->
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="myLargeModalLabel"><i class="fa fa-user-plus mr-2"></i>Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('user.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="E.g John"
                                    value="{{ old('name') }}" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">User Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="E.g abc@domain.com" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phoneNumber">Password </label>
                                <input type="password" class="form-control" id="phoneNumber" name="password"
                                    placeholder="Enter Password" value="{{ old('password') }}" required>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password_confirmation">Password Confirmation </label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="Enter Password"
                                    value="{{ old('password_confirmation') }}" required>
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save User</button>
                    </div>
                </div>
        </div>
    </div>

    </form>
</div>
</div>
</div>
@endsection