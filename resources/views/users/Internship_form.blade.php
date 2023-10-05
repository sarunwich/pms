@extends('layouts.user')
@section('page_now')
{{ 'บันทึกข้อมูลขอฝึกงาน' }} @parent
@endsection
@push('style')
<!-- daterange picker -->
{{--
<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css')}}"> --}}
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<!-- Select2 -->
{{--
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
<!-- BS Stepper -->
<link rel="stylesheet" href="{{ asset('plugins/bs-stepper/css/bs-stepper.min.css')}}">
<!-- dropzonejs -->
<link rel="stylesheet" href="{{ asset('plugins/dropzone/min/dropzone.min.css')}}"> --}}
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
{{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}

<link href="{{ asset('css/validator.css')}}" rel="stylesheet">
<script src="{{ asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/jquery.form.validator.min.js')}}"></script>
<script src="{{ asset('js/security.js')}}"></script>
<script src="{{ asset('js/file.js')}}"></script>

{{--
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endpush
@section('content')


<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">บันทึกข้อมูลขอฝึกงาน</h3>

        {{-- <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div> --}}
    </div>
    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <form name="r" id="myForm" action="{{ route('Internship.form.save') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="Name">รหัสนิสิต</label>
                        <input class="form-control" id="stdcode" name="stdcode" type="text" readonly
                            value="{{ Auth::user()->student_code }}">
                    </div>
                    <div class="col-md-6">
                        <label for="Name">ชื่อ-สกุล</label>
                        <input class="form-control" id="Name" type="text" readonly
                            value="{{ Auth::user()->prefix }}{{ Auth::user()->name }}">

                    </div>
                </div>
            </div>


            <!--form-group-->
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-2">
                        <label for="Year">ปีการศึกษา</label>

                        <input class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" type="text" id="year"
                            value="{{ old('year') }}" name="year" placeholder="Enter '{{ now()->year +543 }}' "
                            maxlength="4" data-validation="length number" data-validation-length="min4"
                            data-validation-error-msg="กรุณาระบุปีการศึกษา" required>
                        @if ($errors->has('year'))
                        <div class="invalid-feedback">
                            {{ $errors->first('year') }}
                        </div>
                        @endif
                    </div>

                    <div class="col-md-2">
                        <label for="Year">ชั้นปี</label>
                        <input class="form-control" type="text" id="level" name="level" placeholder="Enter '1-4' "
                            maxlength="1" data-validation="length number" value="{{ old('level') }}" data-validation-length="min1"
                            data-validation-error-msg="ชันปีที่กำลังศึกษา" required>
                            @if ($errors->has('level'))
                            <div class="invalid-feedback">
                                {{ $errors->first('level') }}
                            </div>
                            @endif
                    </div>
                    <div class="col-md-3">
                        <label for="Year">วันที่เริ่ม</label>

                        <div class="input-group date" id="dtp_input1" data-link-field="dtp_input1"
                            data-link-format="yyyy-mm-dd" data-target-input="nearest">
                            <input type="text" id="dtp_input1v" name="startday" value="{{ old('startday') }}"
                                class="form-control datetimepicker-input" data-target="#dtp_input1" readonly required>
                            <div class="input-group-append" data-target="#dtp_input1" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>

                        </div>
                        @if ($errors->has('startday'))
                        <div class="invalid-feedback">
                            {{ $errors->first('startday') }}
                        </div>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <label for="Year">วันที่สิ้นสุด</label>
                        <div class="input-group date" id="dtp_input2" data-link-field="dtp_input1"
                            data-link-format="yyyy-mm-dd" data-target-input="nearest">
                            <input type="text" id="dtp_input2v" name="lastday" value="{{ old('lastday') }}" class="form-control datetimepicker-input"
                                data-target="#dtp_input2" readonly required>
                            <div class="input-group-append" data-target="#dtp_input2" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        @if ($errors->has('lastday'))
                        <div class="invalid-feedback">
                            {{ $errors->first('lastday') }}
                        </div>
                        @endif
                    </div>
                    <div class="col-md-2">
                        <label for="Year">ระยะเวลาฝึกงาน</label>
                        <button class="btn btn-info btn-block" onclick="dateDiff()">คำนวน</button>
                    </div>
                    <span class="help-block form-error">*** ระยะเวลาฝึกงาน รวมเสาร์-อาทิตย์ และวันหยุดนักขัตฤกษ์แล้ว
                        ไม่น้อยกว่า 60 วัน</span>
                </div>
            </div>


            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-12">
                       <input type="radio" name="sent" value="1" checked="checked"> ขอให้คณะฯ
                            จัดส่งหนังสือขอความอนุเคราะห์ฝึกงานถึงหน่วยงานทางไปรษณีย์
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <input type="radio" name="sent" value="0">
                            ข้าพเจ้าจะนำหนังสือขอความอนุเคราะห์ฝึกงานไปส่งหน่วยงานด้วยตนเอง
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="Name">เรียน</label>
                        <input class="form-control" id="boss" type="text" value="{{ old('boss') }}" name="boss"
                            placeholder="ตำแหน่งหัวหน้าหน่วยงาน" data-validation="required" required>
                            @if ($errors->has('boss'))
                            <div class="invalid-feedback">
                                {{ $errors->first('boss') }}
                            </div>
                            @endif
                    </div>
                    <div class="col-md-6">
                        <label for="Name">หน่วยงาน</label>
                        {{-- <select class="itemName form-control" name="itemName"></select>
                        <select class="form-control select2-selection--single " style="width:100%" id="Agency"
                            name="Agency" data-validation="required" required>
                            <option id="province_list"></option>
                        </select> --}}
                        <select class="form-control" id="search" style="width:100%;" name="Agency"
                            ata-validation="required" required></select>
                            @if ($errors->has('Agency'))
                            <div class="invalid-feedback">
                                {{ $errors->first('Agency') }}
                            </div>
                            @endif
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="Name">
                            แบบฟอร์มขออนุญาตผู้ปกครอง จำนวน 1 ฉบับ  </label>
                            <input class="form-control" type="file" accept=".pdf" name="filePermissionToUpload" id="filePermissionToUpload"
                        data-validation="required"
                            data-validation-allowing="jpg, png, gif" data-validation-max-size="512kb"
                            data-validation-error-msg-size="You can not upload images larger than 512kb"
                            data-validation-error-msg-mime="You can only upload images"
                            data-validation-error-msg-length="You have to upload at least one images"
                            data-validation-error-msg-allowing="The file you are trying to upload is of wrong type You can only upload images jpg, png, gif"
                            placeholder="Enter jpg, png, gif ">
                            @if ($errors->has('filePermissionToUpload'))
                            <div class="invalid-feedback">
                                {{ $errors->first('filePermissionToUpload') }}
                            </div>
                            @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="Name">ประวัติส่วนตัวนิสิต (Resume) พร้อมติดรูปถ่าย 1 นิ้ว จำนวน 1 ฉบับ</label>
                        <input class="form-control" type="file" accept=".pdf" name="fileResumeToUpload" id="fileResumeToUpload"
                        data-validation="required"
                            data-validation-allowing="jpg, png, gif" data-validation-max-size="512kb"
                            data-validation-error-msg-size="You can not upload images larger than 512kb"
                            data-validation-error-msg-mime="You can only upload images"
                            data-validation-error-msg-length="You have to upload at least one images"
                            data-validation-error-msg-allowing="The file you are trying to upload is of wrong type You can only upload images jpg, png, gif"
                            placeholder="Enter jpg, png, gif ">
                            @if ($errors->has('fileResumeToUpload'))
                            <div class="invalid-feedback">
                                {{ $errors->first('fileResumeToUpload') }}
                            </div>
                            @endif
                    </div>
                    <div class="col-md-6">
                        <label for="Name">สำเนาใบแสดงผลการเรียน 5 ภาคการเรียนปกติ (Transcript) จำนวน 1 ฉบับ</label>
                        <input class="form-control" type="file" accept=".pdf" name="fileTranscriptToUpload"
                            id="fileTranscriptToUpload" data-validation-allowing="jpg, png, gif"
                            data-validation="required"
                            data-validation-max-size="512kb"
                            data-validation-error-msg-size="You can not upload images larger than 512kb"
                            data-validation-error-msg-mime="You can only upload images"
                            data-validation-error-msg-length="You have to upload at least one images"
                            data-validation-error-msg-allowing="The file you are trying to upload is of wrong type You can only upload images jpg, png, gif"
                            placeholder="Enter jpg, png, gif ">
                            @if ($errors->has('fileTranscriptToUpload'))
                            <div class="invalid-feedback">
                                {{ $errors->first('fileTranscriptToUpload') }}
                            </div>
                            @endif

                    </div>

                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">บันทึก</button>


        </form>
    </div>
    <!-- /.card-body -->
    {{-- <div class="card-footer">
        Footer
    </div> --}}
    <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection
@push('scripts')
<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
  
    $('#search').select2({
        placeholder: 'เลือกหน่วยงาน',
        ajax: {
          url: path,
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            console.log(data);
            return {
              results:  $.map(data, function (item) {
                    return {
                        text: item.agenciesTHname,
                        id: item.id
                    }
                })
            };
          },
          cache: true
        }
      });
  
</script>
<script>
    $.validate({
        modules: 'security, file',
        onModulesLoaded: function () {
            $('input[name="pass_confirmation"]').displayPasswordStrength();
        }
    });
</script>

<script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

<script>
    //Date picker
   $('#dtp_input1').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#dtp_input2').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    function dateDiff(){




var myVar1 = document.getElementById('dtp_input2v').value;//prompt("Enter a start date: ")
var myVar2 = document.getElementById('dtp_input1v').value;//prompt("Enter a end date: ")

var first_date = Date.parse(myVar1)
var last_date = Date.parse(myVar2)
var diff_date =  first_date - last_date;

var num_years = diff_date/31536000000;
var num_months = (diff_date % 31536000000)/2628000000;
var num_days = diff_date /86400000;

var result ="";

//result +=(" " + Math.floor(num_years) + " ปี\n");
//result +=(" " + Math.floor(num_months) + " ดือน\n");
result +=(" " + Math.floor(num_days) + " วัน");
alert(result);

}
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.getElementById('myForm').addEventListener('submit', function(event) {
    event.preventDefault();

    // Make an AJAX request to submit the form data
    axios.post('/Internshipformsave', new FormData(this))
        .then(function (response) {
            // Display success message using SweetAlert
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: response.data.message,
                showConfirmButton: false,
                timer: 2000
            }).then(() => {
                // Redirect to another page
                window.location.href = '/Internship-status';  // Replace with your desired URL
            });
        })
        .catch(function (error) {
            console.error(error);
        });
});
</script>
@endpush