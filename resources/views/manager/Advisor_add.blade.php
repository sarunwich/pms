@extends('layouts.manager')
@section('page_now')
{{ 'Homepage' }} @parent
@endsection
@push('style')

<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
<link href="{{ asset('css/validator.css')}}" rel="stylesheet">
<script src="{{ asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/jquery.form.validator.min.js')}}"></script>
<script src="{{ asset('js/security.js')}}"></script>
<script src="{{ asset('js/file.js')}}"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}

<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title"> ยินดีต้อนรับ สู่ ระบบจัดการการฝึกสหกิจ</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">

                        <form id="addteacher" name="addteacher" method="POST" action="{{ route('addteacher') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="prefix" class="col-md-4 col-form-label text-md-end">{{ __('คำนำหน้า')
                                    }}</label>


                                <div class="col-md-6">
                                    {{-- {{old('prefix')}} --}}
                                    <select name="prefix" id="prefix" class="form-control ">
                                        <option value="">เลือกคำนำหน้า</option>
                                        <option value="อาจารย์" @if(old('prefix')=='อาจารย์' ) selected @endif>อาจารย์
                                        </option>
                                        <option value="อาจารย์ ดร." @if(old('prefix')=='อาจารย์ ดร.' ) selected @endif>
                                            อาจารย์ ดร.</option>
                                        <option value="ผศ." @if(old('prefix')=='ผศ.' ) selected @endif>ผศ.</option>
                                        <option value="ผศ. ดร." @if(old('prefix')=='ผศ. ดร.' ) selected @endif>ผศ. ดร.
                                        </option>

                                    </select>
                                    @error('prefix')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('ชื่อ-สกุล')
                                    }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                            {{-- <div class="row mb-3">
                                <label for="student_code" class="col-md-4 col-form-label text-md-end">{{ __('รหัสนิสิต')
                                    }}</label>

                                <div class="col-md-6">
                                    <input id="student_code" type="text"
                                        class="form-control @error('student_code') is-invalid @enderror"
                                        name="student_code" value="{{ old('student_code') }}" maxlength="9"
                                        autocomplete="student_code" autofocus>

                                    @error('student_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="row mb-3">
                                <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('เบอร์โทรศัพท์')
                                    }}</label>

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
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

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
                                        required autocomplete="new-password" value="12345678">

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
                                        name="password_confirmation" value="12345678" required
                                        autocomplete="new-password">
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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('ข้อมูลอาจารย์') }}</div>

                    <div class="card-body">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>อาจารย์นิเทศก์</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key=> $user)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$user->name}}</td>
                                    
                                    <td>
                                        {{-- {{$user->id}} --}}
                                        {{-- <form method="post" action="{{ route('Teach_bus.destroy', $Teachb->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
                                        </form> --}}
                                    </td>
                
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">

    </div>
    <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection
@push('scripts')
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>

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
///////////////////////////
                $("#addteacher").on("submit", function(e){
                        e.preventDefault();
                        
                        $.ajax({
                            url  :"{{route('addteacher')}}",
                            type :"POST",
                            cache:false,
                            contentType : false, // you can also use multipart/form-data replace of false
                            processData : false,
                            data: new FormData(this),
                            success:function(response){ 
                              Swal.fire({
                                        icon: 'success',
                                        title: 'Success',
                                        text: response.message,
                                        showConfirmButton: false,
                                        timer: 2500
                                    }).then(() => {
                                        // Redirect to another page
                                        window.location.href = "{{route('Advisor.add')}}";  // Replace with your desired URL
                                    });
                              console.log(response);
                            },error: function (response) {
                            // Handle errors if needed
                            console.log(response);
                        }
                        });
                    });

///////////////////////////////////

    }
    );
</script>


@endpush