@extends('layouts.main')
@section('container')
<h1 class="h3 mb-4 text-gray-800">Employees Data</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="employeesdata" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID Number</th>
                        <th>Name</th>
                        <th>Birth Place</th>
                        <th>Address</th>
                        <th>Birth Date</th>
                        <th>Gender</th>
                        <th>Group</th>
                        <th>Echelon</th>
                        <th>Position</th>
                        <th>Duty Station</th>
                        <th>Religion</th>
                        <th>Work Unit</th>
                        <th>Phone Number</th>
                        <th>Tax Number</th>
                        <th class="no-export">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($employee as $emp)
                            <tr>
                                <td>{{ $emp->occupation ? $emp->occupation->nip : '-' }}</td>
                                <td>{{ $emp->fullname }}</td>
                                <td>{{ $emp->birth_place }}</td>
                                <td>{{ $emp->address }}</td>
                                <td>{{ $emp->birth_date }}</td>
                                <td>{{ $emp->gender }}</td>
                                <td>{{ $emp->occupation ? $emp->occupation->group : '-' }}</td>
                                <td>{{ $emp->occupation ? $emp->occupation->echelon : '-' }}</td>
                                <td>{{ $emp->occupation ? $emp->occupation->position : '-' }}</td>
                                <td>{{ $emp->occupation ? $emp->occupation->duty_station : '-' }}</td>
                                <td>{{ $emp->religion }}</td>
                                <td>{{ $emp->occupation ? $emp->occupation->work_unit : '-' }}</td>
                                <td>{{ $emp->phone }}</td>
                                <td>{{ $emp->tax_number }}</td>
                                <td>
                                    <a href="/storage/{{ $emp->profile_picture }}" class="btn btn-primary m-1 btn-sm"><i class="bi bi-eye-fill"><span>View</span></i></a>
                                    <div>
                                        <a href="{{ route('employee.edit', ['user_id'=>$emp->user_id, 'id' => $emp->id]) }}" class="btn btn-warning m-1 btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                            <span>Update</span>
                                        </a>
                                        <form action="{{ route('employee.destroy', ['user_id'=>$emp->user_id, 'id' => $emp->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger m-1 btn-sm delete-button" data-emp-id="{{ $emp->id }}">
                                                <i class="bi bi-trash-fill"></i>
                                                <span>Delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
