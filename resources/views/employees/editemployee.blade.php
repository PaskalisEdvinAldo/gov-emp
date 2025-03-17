@extends('layouts.main')
@section('container')
<div class="col-md-12 fw-bold fs-3 mb-3">Employee</div>
<div class="col-md-12">
    <form action="{{ route('employee.update', ['user_id' => $employee->user_id, 'employee' => $employee->id]) }}" method="post" name="editemployee" id="editemployee" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Employee Data Form</h6>
            </div>
            <div class="card-body">
                <div class="p-3">
                    <div class="row">
                        <div class="col-md-12"><label class="labels">ID Number</label>
                            <input type="text" class="@error ('nip') is-invalid @enderror form-control" minlength="18" maxlength="18" pattern="\d{18}" placeholder="enter employee's ID number" form="editemployee" name="nip" value="{{ $employee->occupation->nip }}" autofocus>
                            @error('nip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Fullname</label>
                            <input type="text" class="@error ('fullname') is-invalid @enderror form-control" placeholder="enter employee's fullname" form="editemployee" name="fullname" value="{{ $employee->fullname }}">
                            @error('fullname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Birth Place</label>
                            <input type="text" class="@error ('birth_place') is-invalid @enderror form-control" placeholder="enter employee's birth place" form="editemployee" name="birth_place" value="{{ $employee->birth_place }}">
                            @error('birth_place')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6"><label class="labels">Birth Date</label>
                            <input type="date" class="@error ('birth_date') is-invalid @enderror form-control" form="editemployee" name="birth_date" value="{{ $employee->birth_date }}" required>
                            @error('birth_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Address</label>
                            <input type="textarea" class="@error ('address') is-invalid @enderror form-control" placeholder="enter employee's address" form="editemployee" name="address" value="{{ $employee->address }}">
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4"><label class="labels">Gender</label>
                            <div class="d-flex align-item-center gap-3">
                                <div class="form-check mt-2">
                                    <input type="radio" id="gender_male" class="form-check-input @error('gender') is-invalid @enderror" name="gender" form="editemployee" value="Male" {{ $employee->gender == 'Male' ? 'checked' : '' }} required>
                                    <label for="gender_male" class="form-check-label">Male</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input type="radio" id="gender_female" class="form-check-input @error('gender') is-invalid @enderror" name="gender" form="editemployee" value="Female" {{ $employee->gender == 'Female' ? 'checked' : '' }}>
                                    <label for="gender_female" class="form-check-label">Female</label>
                                </div>
                            </div>
                            @error('gender')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4"><label class="labels">Phone Number</label>
                            <input type="text" class="@error ('phone') is-invalid @enderror form-control" placeholder="enter employee's phone number" form="editemployee" name="phone" value="{{ $employee->phone }}">
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4"><label class="labels">Religion</label>
                            <select id="religion" class="@error('religion') is-invalid @enderror form-select" form="editemployee" name="religion" value="{{ $employee->religion }}" required>
                                <option selected disabled>choose employee's religion</option>
                                <option value="Islam" {{ $employee->religion == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Catholic" {{ $employee->religion == 'Catholic' ? 'selected' : '' }}>Catholic</option>
                                <option value="Christian" {{ $employee->religion == 'Christian' ? 'selected' : '' }}>Christian</option>
                                <option value="Hindu" {{ $employee->religion == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Buddha" {{ $employee->religion == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                <option value="Confucianism" {{ $employee->religion == 'Confucianism' ? 'selected' : '' }}>Confucianism</option>
                            </select>
                            @error('religion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Position</label>
                            <input type="text" class="@error ('position') is-invalid @enderror form-control" placeholder="enter employee's position" form="editemployee" name="position" value="{{ $employee->occupation->position }}">
                            @error('position')
                            <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6"><label class="labels">Work Unit</label>
                                <input type="text" class="@error ('work_unit') is-invalid @enderror form-control" placeholder="enter employee's work unit" form="editemployee" name="work_unit" value="{{ $employee->occupation->work_unit }}">
                                @error('work_unit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Tax ID Number</label>
                                <input type="text" class="@error ('tax_number') is-invalid @enderror form-control" minlength="16" maxlength="16" pattern="\d{16}" placeholder="enter employee's tax number" form="editemployee" name="tax_number" value="{{ $employee->tax_number }}">
                                @error('tax_number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label class="labels">Group</label>
                                <select id="group" class="@error('group') is-invalid @enderror form-select" form="editemployee" name="group" value="{{ $employee->occupation->group }}" required>
                                    <option selected disabled>choose employee's group</option>
                                    <option value="I-A" {{ $employee->occupation->group == 'I-A' ? 'selected' : '' }}>I-A</option>
                                    <option value="I-B" {{ $employee->occupation->group == 'I-B' ? 'selected' : '' }}>I-B</option>
                                    <option value="I-C" {{ $employee->occupation->group == 'I-C' ? 'selected' : '' }}>I-C</option>
                                    <option value="I-D" {{ $employee->occupation->group == 'I-D' ? 'selected' : '' }}>I-D</option>
                                    <option value="II-A" {{ $employee->occupation->group == 'II-A' ? 'selected' : '' }}>II-A</option>
                                    <option value="II-B" {{ $employee->occupation->group == 'II-B' ? 'selected' : '' }}>II-B</option>
                                    <option value="II-C" {{ $employee->occupation->group == 'II-C' ? 'selected' : '' }}>II-C</option>
                                    <option value="II-D" {{ $employee->occupation->group == 'II-D' ? 'selected' : '' }}>II-D</option>
                                    <option value="III-A" {{ $employee->occupation->group == 'III-A' ? 'selected' : '' }}>III-A</option>
                                    <option value="III-B" {{ $employee->occupation->group == 'III-B' ? 'selected' : '' }}>III-B</option>
                                    <option value="III-C" {{ $employee->occupation->group == 'III-C' ? 'selected' : '' }}>III-C</option>
                                    <option value="III-D" {{ $employee->occupation->group == 'III-D' ? 'selected' : '' }}>III-D</option>
                                    <option value="IV-A" {{ $employee->occupation->group == 'IV-A' ? 'selected' : '' }}>IV-A</option>
                                    <option value="IV-B" {{ $employee->occupation->group == 'IV-B' ? 'selected' : '' }}>IV-B</option>
                                    <option value="IV-C" {{ $employee->occupation->group == 'IV-C' ? 'selected' : '' }}>IV-C</option>
                                    <option value="IV-D" {{ $employee->occupation->group == 'IV-D' ? 'selected' : '' }}>IV-D</option>
                                    <option value="V-A" {{ $employee->occupation->group == 'V-A' ? 'selected' : '' }}>V-A</option>
                                    <option value="V-B" {{ $employee->occupation->group == 'V-B' ? 'selected' : '' }}>V-B</option>
                                    <option value="V-C" {{ $employee->occupation->group == 'V-C' ? 'selected' : '' }}>V-C</option>
                                    <option value="V-D" {{ $employee->occupation->group == 'V-D' ? 'selected' : '' }}>V-D</option>
                                </select>
                                @error('group')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="labels">Echelon</label>
                                <select id="echelon" class="@error('echelon') is-invalid @enderror form-select" form="editemployee" name="echelon" :value="{{ $employee->occupation->echelon }}">
                                    <option selected disabled>choose employee's echelon</option>
                                    <option value="I" {{ $employee->occupation->echelon == 'I' ? 'selected' : '' }}>I</option>
                                    <option value="II" {{ $employee->occupation->echelon == 'II' ? 'selected' : '' }}>II</option>
                                    <option value="III" {{ $employee->occupation->echelon == 'III' ? 'selected' : '' }}>III</option>
                                    <option value="IV" {{ $employee->occupation->echelon == 'IV' ? 'selected' : '' }}>IV</option>
                                    <option value="V" {{ $employee->occupation->echelon == 'V' ? 'selected' : '' }}>V</option>
                                </select>
                                @error('echelon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="labels">Duty Station</label>
                                <select id="duty_station" class="@error('duty_station') is-invalid @enderror form-select" form="editemployee" name="duty_station" value="{{ $employee->occupation->duty_station }}">
                                    <option selected disabled>choose employee's duty station</option>
                                    <option value="Jakarta" {{ $employee->occupation->duty_station == 'Jakarta' ? 'selected' : '' }}>Jakarta</option>
                                    <option value="Bandung" {{ $employee->occupation->duty_station == 'Bandung' ? 'selected' : '' }}>Bandung</option>
                                    <option value="Surabaya" {{ $employee->occupation->duty_station == 'Surabaya' ? 'selected' : '' }}>Surabaya</option>
                                    <option value="Medan" {{ $employee->occupation->duty_station == 'Medan' ? 'selected' : '' }}>Medan</option>
                                    <option value="Palembang" {{ $employee->occupation->duty_station == 'Palembang' ? 'selected' : '' }}>Palembang</option>
                                </select>
                                @error('duty_station')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>
                        <div class="col-md-12 mt-3"><label class="labels mb-0">Employee's Profile Picture Upload</label>
                            <div class="mb-3"><span class="text-sm text-black-50">(accepted files: .png, .jpg, .jpeg)</span></div>
                            <input type="file" class="@error ('profile_picture') is-invalid @enderror form-control" id="profile_picture" name="profile_picture" form="editemployee">
                            @error('profile_picture')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col text-right">
                        <a href="{{ route('employee.show') }}" class="btn btn-primary profile-button border-0 bg-secondary" type="reset"><i class="bi bi-x-lg"></i> Back</a>
                        <button class="btn btn-primary profile-button border-0 bg-success" type="submit"><i class="bi bi-floppy-fill"></i> Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
