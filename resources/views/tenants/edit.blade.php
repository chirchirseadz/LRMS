@extends('layouts.master')

@section('content')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4 offset-3">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="{{ asset('../../dist/img/user4-128x128.jpg') }}" alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{ $user->name }}</h3>

            <p class="text-muted text-center">{{ $user->email }}</p>

            <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary btn-block"><i class="fas fa-eye mr-1"></i> <b>Show</b></a>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      
    </div>
    <div class="row">
    <div class="col-md-12">
        <!-- About Me Box -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-bars mr-1"></i>Edit Details</h3>
          </div>
          <!-- /.card-header -->
          <form action="{{ route('user.update', $user->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputPassword1">Name</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="exampleInputPassword1" placeholder="Enter name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label>Select Role</label><br>
                <div class="row">
                  @foreach($roles as $role)
                  <div class="col-md-3">
                    <label>
                      <input type="checkbox" name="roles[]" value="{{ $role->name }}" {{ $user->hasRole($role) ? 'checked' : '' }}>
                      {{ $role->name }}
                    </label>
                  </div>
                  @endforeach
                </div>
                <hr>
                @error('roles')
                <span class="text text-danger text-sm" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label>Select Permissions</label><br>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="checkAllPermissions">
                  <label class="form-check-label" for="checkAllPermissions">Check All</label>
                </div>
                <hr>
                <div class="row">
                  @foreach ($permissions as $permission)
                  <div class="col-md-3">
                    <div class=" form-check">
                      <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}" {{ in_array($permission->name, $userPermissions) ? 'checked' : '' }}>
                      <label class="form-check-label">
                        {{ $permission->name }}
                      </label>
                      <hr>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>

              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
            <!-- /.card-body -->
          </form>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var checkAllPermissions = document.getElementById('checkAllPermissions');

    checkAllPermissions.addEventListener('click', function() {
      var checkboxes = document.querySelectorAll('input[ type="checkbox"][name="permissions[]"]');
      var isChecked = checkAllPermissions.checked;

      checkboxes.forEach(function(checkbox) {
        checkbox.checked = isChecked;
      })

    })
  })
</script>
@endpush

