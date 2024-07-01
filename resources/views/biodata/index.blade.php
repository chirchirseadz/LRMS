@extends('layouts.table')

@section('content')

<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-primary float-right" data-toggle="modal"
            data-target=".bd-example-modal-lg"><i class="fa fa-user-plus"></i> Add New Bio Data</button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>HOSPITAL NUMBER</th>
                    <th>FULL NAMES</th>
                    <th>ID NUMBER</th>
                    <th>PHONE NUMBER</th>
                    <th>RESIDENCE</th>
                    <th>DATE CREATED</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @php
                    use Carbon\Carbon;
                @endphp
                @foreach ($bioData as $data)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$data->hospitalNumber}}</td>
                        <td>{{$data->firstName}} {{$data->lastName}}</td>
                        <td>{{$data->idNo}}</td>
                        <td>{{$data->phoneNumber}}</td>
                        <td>{{$data->residence}}</td>
                        <td>{{ Carbon::parse($data->created_at)->format('j F Y') }}</td>
                        <td>
                            <div class="margin">
                                <div class="btn-group">
                                    <a href="{{route('bioData.edit', $data->id)}}">
                                        <button type="button" class="btn btn-xs btn-default"><i class="fa fa-edit"></i>
                                            Edit</button>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a href="{{route('bioData.show', $data->id)}}">
                                        <button type="button" class="btn btn-xs btn-info"><i class="fa fa-eye"></i>
                                            View</button>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <form action="{{route('bioData.destroy', $data)}}" method="post"
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
                <h5 class="modal-title" id="myLargeModalLabel">Add New Bio Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('bioData.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="hospitalNumber">Hospital Number</label>
                                <input type="text" class="form-control"
                                    value="{{ old('hospitalNumber', $hospitalNumber) }}" id="hospitalNumber"
                                    name="hospitalNumber" readonly required>
                                @error('hospitalNumber')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="firstName"
                                    placeholder="E.g John" value="{{ old('firstName') }}" required>
                                @error('firstName')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="lastName"
                                    placeholder="E.g Doe" value="{{ old('lastName') }}" required>
                                @error('lastName')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="idNumber">ID Number</label>
                                <input type="number" class="form-control" id="idNumber" name="idNumber"
                                    placeholder="E.g 12345678.." value="{{ old('idNumber') }}" required>
                                @error('idNumber')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phoneNumber">Phone Number</label>
                                <input type="text" class="form-control" id="phoneNumber" name="phoneNumber"
                                    placeholder="E.g 07xxxxxxxx" value="{{ old('phoneNumber') }}" required>
                                @error('phoneNumber')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="residence">Residence</label>
                                <input type="text" class="form-control" id="residence" name="residence"
                                    placeholder="E.g Kyeni" value="{{ old('residence') }}" required>
                                @error('residence')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control select2" id="gender" name="gender" required>
                                    <option value="">- select -</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female
                                    </option>
                                </select>
                                @error('gender')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="level">Destination</label>
                                <select class="form-control select2" id="level" name="level" required>
                                    <option value="">- select destination -</option>
                                    <option value="doctor" {{ old('level') == 'doctor' ? 'selected' : '' }}>Doctor
                                    </option>
                                    <option value="lab" {{ old('level') == 'lab' ? 'selected' : '' }}>Lab</option>
                                </select>
                                @error('level')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Add more fields as necessary -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection('section')