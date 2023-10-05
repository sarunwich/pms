@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="prefix"
                                class="col-md-4 col-form-label text-md-end">{{ __('คำนำหน้า') }}</label>


                            <div class="col-md-6">
                                {{-- {{old('prefix')}} --}}
                                <select name="prefix" id="prefix" class="form-control ">
                                    <option value="">เลือกคำนำหน้า</option>
                                    <option value="นาย" @if(old('prefix')=='นาย') selected @endif >นาย</option>
                                    <option value="นาง" @if(old('prefix')=='นาง') selected @endif >นาง</option>
                                    <option value="นางสาว" @if(old('prefix')=='นางสาว') selected @endif >นางสาว</option>

                                </select>
                                @error('prefix')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('ชื่อ-สกุล') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="faculty" class="col-md-4 col-form-label text-md-end">คณะ:</label>
                            <div class="col-md-6">
                                <select name="faculty" class="form-control" id="faculty">
                                    <option value="">เลือกคณะ</option>
                                    @foreach($faculties as $faculty)
                                    <option value="{{ $faculty->id }}">{{ $faculty->faculty_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="branch" class="col-md-4 col-form-label text-md-end">สาขา:</label>
                            <div class="col-md-6">
                                <select name="branch" class="form-control" id="branch" disabled>
                                    <option value="">เลือกสาขา</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="major" class="col-md-4 col-form-label text-md-end">หลักสูตร:</label>
                            <div class="col-md-6">
                                <select name="major" class="form-control" id="major" disabled>
                                    <option value="">เลือกหลักสูตร</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="student_code"
                                class="col-md-4 col-form-label text-md-end">{{ __('รหัสนิสิต') }}</label>

                            <div class="col-md-6">
                                <input id="student_code" type="text"
                                    class="form-control @error('student_code') is-invalid @enderror" name="student_code"
                                    value="{{ old('student_code') }}" maxlength="9" autocomplete="student_code" autofocus>

                                @error('student_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone"
                                class="col-md-4 col-form-label text-md-end">{{ __('เบอร์โทรศัพท์') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ old('phone') }}" autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                                }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password')
                                }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm
                                Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#faculty').change(function() {
            var facultyId = $(this).val();
            if (facultyId) {
                $('#branch').prop('disabled', false);
                $.ajax({
                    url: '{{ route("get.branches") }}',
                    type: 'POST',
                    data: {
                        faculty_id: facultyId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $('#branch').empty().append('<option value="">เลือกสาขา</option>');
                        $.each(data.branches, function(key, value) {
                            $('#branch').append('<option value="' + value.id + '">' + value.branchs_name + '</option>');
                        });
                    }
                });
            } else {
                $('#branch').prop('disabled', true);
                $('#branch').empty().append('<option value="">Select Branch</option>');
                $('#major').prop('disabled', true);
                $('#major').empty().append('<option value="">Select Major</option>');
            }
        });

        $('#branch').change(function() {
            var branchId = $(this).val();
            if (branchId) {
                $('#major').prop('disabled', false);
                $.ajax({
                    url: '{{ route("get.majors") }}',
                    type: 'POST',
                    data: {
                        branch_id: branchId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $('#major').empty().append('<option value="">เลือกหลักสูตร</option>');
                        $.each(data.majors, function(key, value) {
                            $('#major').append('<option value="' + value.id + '">' + value.majors_name + '</option>');
                        });
                    }
                });
            } else {
                $('#major').prop('disabled', true);
                $('#major').empty().append('<option value="">Select Major</option>');
            }
        });
    });
</script>
@endpush