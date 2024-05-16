@extends('layouts.master')

@section('content')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">

 <div class="row justify-content-center">

  <div class="col-md-4">
    <!-- Profile Image -->
<div class="card card-primary card-outline">
    <div class="card-body box-profile">
        <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="{{ asset('../../dist/img/user4-128x128.jpg') }}" alt="User profile picture">
        </div>
        <h3 class="profile-username text-center">{{ $user->name }}</h3>
        <p class="text-muted text-center">{{ $user->email }}</p>
        @can('edit users')
        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-block"><i class="fas fa-edit mr-1"></i> <b>Edit</b></a>
        @endcan
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
  </div>
</div>

</div>

    <div class="row">
      
      <div class="col-md-12">
        <!-- About Me Box -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-bars mr-1"></i>My Details</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div>
              <strong>Roles:</strong><br>
              @foreach($roles as $role)
              <label>
                <input disabled type="checkbox" name="roles[]" value="{{ $role }}" {{ $user->hasRole($role) ? 'checked' : '' }}>
                {{ $role }}
              </label><br>
              @endforeach
            </div>
            <div>
              <hr>
              <p class="text-dark" data-toggle="tooltip" data-placement="top" title="These are permissions assigned  to the user through  role. ">
                <strong>Permissions via role:</strong><br>
              </p>
              <hr>
              <div class="row">
                @foreach($permissions as $permission)
                <div class="col-md-4">
                  <label>
                    <input disabled type="checkbox" name="permissions[]" value="{{ $permission->name }}" {{ $user->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                    {{ $permission->name }}
                  </label><br>
                  
                </div>
                @endforeach
              </div>
            </div>
            <hr>
            <div>
              <p class="text-dark" data-toggle="tooltip" data-placement="top" title="These are permissions assigned directly to the user. ">
                <strong>Direct permissions:</strong><br>
              </p>
              <hr>
              <div class="row">
                @foreach($directPermissions as $permission)
                <div class="col-md-4">
                  <label>
                    <input class="text-success" disabled type="checkbox" name="permissions[]" value="{{ $permission->name }}" {{ $user->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                    {{$permission->name }}
                  </label><br>
                </div>
                @endforeach
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection