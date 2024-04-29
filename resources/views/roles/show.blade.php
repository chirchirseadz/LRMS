@extends('layouts.table')
@section('content')

<div class="container p-2">
    <h1>Role: {{ $role->name }}</h1>

    <form method="POST" action="{{ route('roles.edit', $role->id) }}">
        @csrf
        @method('PUT')

        <h3 class='text-header' >Assigned Permissions:</h3>
        <!-- <div class="row">

            @foreach ($role->permissions as $permission)
            <div class="col-md-4">

                <li>{{ $permission->name }}</li>
            </div>
            @endforeach
        </div> -->
        

        
       <div class="row">
       @foreach ($permissions as $permission)
           <div class="col-md-4">
           <div class="form-check">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                    {{ $role->permissions->contains($permission->id) ? 'checked disabled' : '' }}>
                <label class="form-check-label" for="permission_{{ $permission->id }}">
                    {{ $permission->name }}
                </label>
            </div>
           </div>
        @endforeach
       </div>


    </form>
</div>

@endsection