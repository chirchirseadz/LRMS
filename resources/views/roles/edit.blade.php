@extends('layouts.table')
@section('content')
<div class="container">
   
    <form method="POST" action="{{ route('roles.update', $role->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Select Permissions:</label><br>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="checkAll">
                <label class="form-check-label" for="checkAll">Check All</label>
            </div>
            <hr>
            <div class="row">
                @foreach($permissions as $permission)
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input permission-checkbox" type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                            {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                        <label class="form-check-label" for="permission_{{ $permission->id }}">
                            {{ $permission->name }}
                        </label>
                    </div>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update Permissions</button>
    </form>
</div>

@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkAllCheckbox = document.getElementById('checkAll');
        const permissionCheckboxes = document.querySelectorAll('.permission-checkbox');

        checkAllCheckbox.addEventListener('change', function() {
            permissionCheckboxes.forEach(checkbox => {
                checkbox.checked = checkAllCheckbox.checked;
            });
        });
    });
</script>
