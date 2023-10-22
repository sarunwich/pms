@extends('layouts.user')
@section('page_now')
{{ 'หน่วยงาน' }} @parent
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
<!-- SELECT2 EXAMPLE -->


<div class="card collapsed-card">
  <div class="card-header">
    <h3 class="card-title">เพิ่มหน่วยงาน</h3>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
    @endif
    {{--<div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-plus"></i>
      </button>
       <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button> 
    </div>--}}
  </div>
  <div class="card-body" style="display:block;">
     

    <form id="addAgency" name="addAgency" action="{{route('Agency.store')}}" method="post" enctype="multipart/form-data">

      @csrf
      <div class="form-group">
        <div class="form-row">
          <div class="col-md-6">
            <label for="Name">ชื่อหน่วยงาน</label>

            <input class="form-control" id="Name" type="text" name="Name" placeholder="ชื่อหน่วยงาน"
              data-validation="required" required>
           
          </div>
          <div class="col-md-6">
            <label for="LastName">ชื่อหน่วยงาน</label>
             <input class="form-control" id="ENName" type="text" name="ENName" placeholder="ภาษาอังกฤษ"
              data-validation="required" required>
            {{-- <select class="form-control" id="sel1" name="dptype">
              <option>--Select--</option>
            
            </select> --}}

          </div>
        </div>
      </div>
      <!--form-group-->
      <div class="form-group">
        <div class="form-row">

          <div class="col-md-12">
            <label for="Picture">ที่อยู่หน่วยงาน</label>
            <textarea class="form-control" rows="3" id="address" name="address" data-validation="required"
              required></textarea>

          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="form-row">
          <div class="col-md-6">
            <label for="pro">จังหวัด</label>
            <br>
            <select class="form-control select2bs4 " style="width: 100%" id="province" name="province">
              <option id="province_list"> ----- จังหวัด -----</option>
              @foreach($provinces as $province)
              <option value="{{ $province->PROVINCE_ID }}">{{ $province->PROVINCE_NAME }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-sm-6 ">
            <label for="Name">อำเภอ/เขต :</label>
            <select class="form-control select2bs4" title="Please select" style="width:100%" id="amphur"
              name="amphur" title="เลือก" disabled data-validation="required">
              <option id=""> -- Select --</option>

              
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 ">
            <label for="Name">ตำบล/แขวง :</label>
            <select class="form-control select2bs4" title="Please select" style="width:100%"
              id="district" name="district" title="เลือก" data-validation="required" disabled required>
              <option id=""> -- Select --</option>

              
            </select>
          </div>
          <div class="col-md-6">
            <label for="Year">รหัสไปรษณีย์</label>
            <input class="form-control" id="postoffice" type="text" maxlength="5" name="postoffice"
              placeholder="รหัสไปรษณีย์" data-validation="length number" data-validation-length="min5"
              data-validation-error-msg="The answer you gave was not a correct number a value (5 chars)" required>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="form-row">
          <div class="col-md-6">
            <label for="Picture">หมายเลขโทรศัพท์</label>
            <input class="form-control" id="phont" type="text" name="phont" placeholder="หมายเลขโทรศัพท์" maxlength="10"
              data-validation="length number" data-validation-length="min9"
              data-validation-error-msg="The answer you gave was not a correct number a value (9-10 chars)" required>
          </div>
          <div class="col-md-6">
            <label for="Picture">หมายเลขโทรสาร</label>
            <input class="form-control" id="fax" type="text" name="fax" placeholder="หมายเลขโทรสาร" maxlength="10">
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="form-row">
          <div class="col-md-6">
            <label for="Picture">เว็บไซต์</label>
            <input class="form-control" id="web" type="text" name="web" placeholder="http://"
              data-validation="required" required>
          </div>
          <div class="col-md-6">
            <label for="Picture">E-Mail</label>
            <input class="form-control" id="mail" type="text" name="mail" placeholder="E-Mail" data-validation="email"
              required>
          </div>
        </div>
      </div>




      <button type="submit" class="btn btn-primary btn-block">บันทึก</button>


    </form>
  </div>

</div>




@endsection
@push('scripts')
{{-- <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script> --}}
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready( function () {

    $('#province').change(function() {
            var province_id = $(this).val();
            if (province_id) {
                $('#amphur').prop('disabled', false);
                $.ajax({
                    url: '{{ route("get.amphur") }}',
                    type: 'POST',
                    data: {
                      province_id: province_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $('#amphur').empty().append('<option value="">เลือกอำเภอ</option>');
                        $.each(data.amphurs, function(key, value) {
                            $('#amphur').append('<option value="' + value.AMPHUR_ID + '">' + value.AMPHUR_NAME + '</option>');
                        });
                    }
                });
            } else {
                $('#amphur').prop('disabled', true);
                $('#amphur').empty().append('<option value="">Select amphur</option>');
                $('#district').prop('disabled', true);
                $('#district').empty().append('<option value="">Select district</option>');
            }
        });

        $('#amphur').change(function() {
            var amphur_id = $(this).val();
            if (amphur_id) {
                $('#district').prop('disabled', false);
                $.ajax({
                    url: '{{ route("get.district") }}',
                    type: 'POST',
                    data: {
                      amphur_id: amphur_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $('#district').empty().append('<option value="">เลือกตำบล</option>');
                        $.each(data.districts, function(key, value) {
                            $('#district').append('<option value="' + value.DISTRICT_ID + '">' + value.DISTRICT_NAME + '</option>');
                        });
                    }
                });
            } else {
                $('#district').prop('disabled', true);
                $('#district').empty().append('<option value="">Select Major</option>');
            }
        });


      // $('#userTable').DataTable();
  } );
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
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
<script>
  document.getElementById('addAgency').addEventListener('submit', function(event) {
  event.preventDefault();

  // Make an AJAX request to submit the form data
  axios.post('/Agency', new FormData(this))
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
              window.location.href = '/Agency';  // Replace with your desired URL
          });
      })
      .catch(function (error) {
          console.error(error);
      });
});
</script>
@endpush