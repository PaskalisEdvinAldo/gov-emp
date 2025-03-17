@extends('layouts.main')
@section('container')
<div class="col-md-12 fw-bold fs-3 mb-3">Employee</div>
<div class="col-md-12">
    <form action="{{ route('employee.store') }}" method="post" name="addemployee" id="addemployee" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">New Employee Data Form</h6>
            </div>
            <div class="card-body">
                <div class="p-3">
                    <div class="row">
                        <div class="col-md-12"><label class="labels">ID Number</label>
                            <input type="text" class="@error ('nip') is-invalid @enderror form-control" minlength="18" maxlength="18" pattern="\d{18}" placeholder="enter employee's ID number" form="addemployee" name="nip" value="{{ old('nip') }}" autofocus>
                            @error('nip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Fullname</label>
                            <input type="text" class="@error ('fullname') is-invalid @enderror form-control" placeholder="enter employee's fullname" form="addemployee" name="fullname" value="{{ old('fullname') }}">
                            @error('fullname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4"><label class="labels">Birth Place</label>
                            <input type="text" class="@error ('birth_place') is-invalid @enderror form-control" placeholder="enter employee's birth place" form="addemployee" name="birth_place" value="{{ old('birth_place') }}">
                            @error('birth_place')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4"><label class="labels">Birth Date</label>
                            <input type="date" class="@error ('birth_date') is-invalid @enderror form-control" form="addemployee" name="birth_date" value="{{ old('birth_date') }}" required>
                            @error('birth_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4"><label class="labels">Gender</label>
                            <div class="d-flex align-item-center gap-3">
                                <div class="form-check mt-2">
                                    <input type="radio" id="gender_male" class="form-check-input @error('gender') is-invalid @enderror" name="gender" form="addemployee" value="Male" {{ old('gender') == 'Male' ? 'checked' : '' }} required>
                                    <label for="gender_male" class="form-check-label">Male</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input type="radio" id="gender_female" class="form-check-input @error('gender') is-invalid @enderror" name="gender" form="addemployee" value="Female" {{ old('gender') == 'Female' ? 'checked' : '' }}>
                                    <label for="gender_female" class="form-check-label">Female</label>
                                </div>
                            </div>
                            @error('gender')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Address</label>
                            <input type="textarea" class="@error ('address') is-invalid @enderror form-control" placeholder="enter employee's address" form="addemployee" name="address" value="{{ old('address') }}">
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Phone Number</label>
                            <input type="text" class="@error ('phone') is-invalid @enderror form-control" placeholder="enter employee's phone number" form="addemployee" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6"><label class="labels">Religion</label>
                            <select id="religion" class="@error('religion') is-invalid @enderror form-select" form="addemployee" name="religion" value="{{ old('religion') }}" required>
                                <option selected disabled>choose employee's religion</option>
                                <option value="Islam" {{ old('religion') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Catholic" {{ old('religion') == 'Catholic' ? 'selected' : '' }}>Catholic</option>
                                <option value="Christian" {{ old('religion') == 'Christian' ? 'selected' : '' }}>Christian</option>
                                <option value="Hindu" {{ old('religion') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Buddha" {{ old('religion') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                <option value="Confucianism" {{ old('religion') == 'Confucianism' ? 'selected' : '' }}>Confucianism</option>
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
                            <input type="text" class="@error ('position') is-invalid @enderror form-control" placeholder="enter employee's position" form="addemployee" name="position" value="{{ old('position') }}">
                            @error('position')
                            <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6"><label class="labels">Work Unit</label>
                                <input type="text" class="@error ('work_unit') is-invalid @enderror form-control" placeholder="enter employee's work unit" form="addemployee" name="work_unit" value="{{ old('work_unit') }}">
                                @error('work_unit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Tax ID Number</label>
                                <input type="text" class="@error ('tax_number') is-invalid @enderror form-control" minlength="16" maxlength="16" pattern="\d{16}" placeholder="enter employee's tax number" form="addemployee" name="tax_number" value="{{ old('tax_number') }}">
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
                                <select id="group" class="@error('group') is-invalid @enderror form-select" form="addemployee" name="group" value="{{ old('group') }}" required>
                                    <option selected disabled>choose employee's group</option>
                                    <option value="I-A" {{ old('group') == 'I-A' ? 'selected' : '' }}>I-A</option>
                                    <option value="I-B" {{ old('group') == 'I-B' ? 'selected' : '' }}>I-B</option>
                                    <option value="I-C" {{ old('group') == 'I-C' ? 'selected' : '' }}>I-C</option>
                                    <option value="I-D" {{ old('group') == 'I-D' ? 'selected' : '' }}>I-D</option>
                                    <option value="II-A" {{ old('group') == 'II-A' ? 'selected' : '' }}>II-A</option>
                                    <option value="II-B" {{ old('group') == 'II-B' ? 'selected' : '' }}>II-B</option>
                                    <option value="II-C" {{ old('group') == 'II-C' ? 'selected' : '' }}>II-C</option>
                                    <option value="II-D" {{ old('group') == 'II-D' ? 'selected' : '' }}>II-D</option>
                                    <option value="III-A" {{ old('group') == 'III-A' ? 'selected' : '' }}>III-A</option>
                                    <option value="III-B" {{ old('group') == 'III-B' ? 'selected' : '' }}>III-B</option>
                                    <option value="III-C" {{ old('group') == 'III-C' ? 'selected' : '' }}>III-C</option>
                                    <option value="III-D" {{ old('group') == 'III-D' ? 'selected' : '' }}>III-D</option>
                                    <option value="IV-A" {{ old('group') == 'IV-A' ? 'selected' : '' }}>IV-A</option>
                                    <option value="IV-B" {{ old('group') == 'IV-B' ? 'selected' : '' }}>IV-B</option>
                                    <option value="IV-C" {{ old('group') == 'IV-C' ? 'selected' : '' }}>IV-C</option>
                                    <option value="IV-D" {{ old('group') == 'IV-D' ? 'selected' : '' }}>IV-D</option>
                                    <option value="V-A" {{ old('group') == 'V-A' ? 'selected' : '' }}>V-A</option>
                                    <option value="V-B" {{ old('group') == 'V-B' ? 'selected' : '' }}>V-B</option>
                                    <option value="V-C" {{ old('group') == 'V-C' ? 'selected' : '' }}>V-C</option>
                                    <option value="V-D" {{ old('group') == 'V-D' ? 'selected' : '' }}>V-D</option>
                                </select>
                                @error('group')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="labels">Echelon</label>
                                <select id="echelon" class="@error('echelon') is-invalid @enderror form-select" form="addemployee" name="echelon" :value="{{ old('echelon') }}">
                                    <option selected disabled>choose employee's echelon</option>
                                    <option value="I" {{ old('echelon') == 'I' ? 'selected' : '' }}>I</option>
                                    <option value="II" {{ old('echelon') == 'II' ? 'selected' : '' }}>II</option>
                                    <option value="III" {{ old('echelon') == 'III' ? 'selected' : '' }}>III</option>
                                    <option value="IV" {{ old('echelon') == 'IV' ? 'selected' : '' }}>IV</option>
                                    <option value="V" {{ old('echelon') == 'V' ? 'selected' : '' }}>V</option>
                                </select>
                                @error('echelon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="labels">Duty Station</label>
                                <select id="duty_station" class="@error('duty_station') is-invalid @enderror form-select" form="addemployee" name="duty_station" value="{{ old('duty_station') }}">
                                    <option selected disabled>choose employee's duty station</option>
                                    <option value="Jakarta" {{ old('duty_station') == 'Jakarta' ? 'selected' : '' }}>Jakarta</option>
                                    <option value="Bandung" {{ old('duty_station') == 'Bandung' ? 'selected' : '' }}>Bandung</option>
                                    <option value="Surabaya" {{ old('duty_station') == 'Surabaya' ? 'selected' : '' }}>Surabaya</option>
                                    <option value="Medan" {{ old('duty_station') == 'Medan' ? 'selected' : '' }}>Medan</option>
                                    <option value="Palembang" {{ old('duty_station') == 'Palembang' ? 'selected' : '' }}>Palembang</option>
                                </select>
                                @error('duty_station')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>
                        <div class="col-md-12 mt-3"><label class="labels mb-0">Employee's Profile Picture Upload</label>
                            <div class="mb-3"><span class="text-sm text-black-50">(accepted files: .png, .jpg, .jpeg)</span></div>
                            <input type="file" class="@error ('profile_picture') is-invalid @enderror form-control" id="profile_picture" name="profile_picture" form="addemployee">
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
                        <a href="{{ route('dashboard.index') }}" class="btn btn-primary profile-button border-0 bg-secondary" type="reset"><i class="bi bi-x-lg"></i> Back</a>
                        <button class="btn btn-primary profile-button border-0 bg-danger" type="reset"><i class="bi bi-x-lg"></i> Cancel</button>
                        <button class="btn btn-primary profile-button border-0 bg-success" type="submit"><i class="bi bi-floppy-fill"></i> Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
