@extends('layouts.user')
@section('page_now')
{{ 'บันทึกข้อมูลฝึกสหกิจ' }} @parent
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
    <h3 class="card-title">บันทึกข้อมูลฝึกสหกิจ</h3>

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

    <form name="r" id="addreport" action="{{ route('Reportstd.store') }}" method="post" enctype="multipart/form-data">
      @csrf


      <!--form-group-->

      <div class="form-group">
        <div class="form-row">
          <div class="col-md-12">
            <label for="Year">วันที่</label>
            <div class="input-group date" id="dtp_input1" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd"
              data-target-input="nearest">
              <input type="text" id="date_add" name="date_add" onchange="checkDate()" value="{{ old('date_add') }}"
                class="form-control datetimepicker-input" data-validation-error-msg="กรุณาระบุวันที่"
                data-target="#dtp_input1" data-validation="required" readonly required>
              <div class="input-group-append" data-target="#dtp_input1" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>

            </div>
            @if ($errors->has('date_add'))
            <div class="invalid-feedback">
              {{ $errors->first('date_add') }}
            </div>
            @endif
          </div>

        </div>

      </div>
      <div class="form-group">
        <div class="form-row">
          <div class="col-md-12">
            <label for="Year">Report Details(รายละเอียดการฝึกสหกิจ)</label>

            <textarea class="form-control" rows="5" id="Details" name="Details" data-validation="required"
              data-validation-error-msg="กรุณาระบุรายละเอียดการฝึกสหกิจ" required>{{ old('Details') }}</textarea>
            @if ($errors->has('Details'))
            <div class="invalid-feedback">
              {{ $errors->first('Details') }}
            </div>
            @endif
          </div>

        </div>
      </div>
      <div class="form-group">
        <div class="form-row">
          <div class="col-md-12">
            <label for="Year">Note(หมายเหตุ)</label>

            <textarea class="form-control" rows="3" id="note" name="note">{{ old('note') }}</textarea>
          </div>

        </div>
      </div>





      <div id='TextBoxesGroup'>
        <div id="TextBoxDiv1">

        </div>
      </div>
      <div class="form-group">
        <div class="form-row">
          <div class="col-sm-3">
            <input type='button' class="form-control" value='เพิ่มภาพกิจกรรม' id='addButton'>
          </div>
          <div class="col-sm-3">
            <input type='button' class="form-control" value='ลบภาพกิจกรรม' id='removeButton'>
          </div>
        </div>
      </div>


      <!-- end  -->


      <div class="form-group">
        <div class="form-row">
          <div class="col-md-12">

            <button type="submit" class="btn btn-primary btn-block">Save</button>
          </div>

        </div>
      </div>

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

<!---   inputtextbox    -->
<script type="text/javascript">
  $(document).ready(function(){

var counter = 1;
var counter2 = $("#cc").val();


$("#addButton").click(function () {

if(counter>5){
alert("Only 5 textboxes allow");
return false;
}   

var newTextBoxDiv = $(document.createElement('div'))
.attr("id", 'TextBoxDiv' + counter);

newTextBoxDiv.after().html('<div class="row"><label class="control-label col-sm-2">ภาพกิจกรรมที่ '+ counter + ' </label>' 

+'<div class="col-sm-4"><input type="file" accept="image/*" class="form-control"id="textbox' + counter + '" name="picdetail[]" value="" required/></div>'

+'<label class="control-label col-sm-2">อธิบายภาพ : </label>'
+'<div class="col-sm-4"><input type="text"  data-validation="required" class="form-control"id="emailstudent' + counter + '" name="textin[]" value="" required/></div>'
+'<div>' 
);

newTextBoxDiv.appendTo("#TextBoxesGroup");


counter++;
});

$("#removeButton").click(function () {
if(counter==1){
alert("No more textbox to remove");
counter++;
return false;
}else{   

counter--;

$("#TextBoxDiv" + counter).remove();
}
});

$("#getButtonValue").click(function () {

var msg = '';
for(i=1; i<counter; i++){
msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
}
alert(msg);
});








});
</script>
<script>
  //Date picker
 $('#dtp_input1').datetimepicker({
      format: 'YYYY-MM-DD',
      maxDate : 'now'
  });
  $('#dtp_input2').datetimepicker({
      format: 'YYYY-MM-DD'
  });

  
</script>

<script>
$(document).ready(function(){
$("#addreport").on("submit", function(e){
                e.preventDefault();
                
                $.ajax({
                    url  :"Reportstd",
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
                                window.location.href = 'Internship-report';  // Replace with your desired URL
                            });
                      console.log(response);
                    },error: function (response) {
                    // Handle errors if needed
                    console.log(response);
                }
                });
            });
          });


//   document.getElementById('addreport').addEventListener('submit', function(event) {
//   event.preventDefault();

//   // Make an AJAX request to submit the form data
// //   axios.post('/Reportstd', new FormData(this))
// //       .then(function (response) {
// //           // Display success message using SweetAlert
// //           Swal.fire({
// //               icon: 'success',
// //               title: 'Success',
// //               text: response.data.message,
// //               showConfirmButton: false,
// //               timer: 2000
// //           }).then(() => {
// //               // Redirect to another page
// //               window.location.href = '/Internship-report';  // Replace with your desired URL
// //           });
// //       })
// //       .catch(function (error) {
// //         if (error.response.status === 422) {
// //                 // Handle validation errors
// //                 var errors = error.response.data.errors;
// // var i=0;
// //                 // Display error messages using SweetAlert
// //                 var errorMessage = 'Validation Error:\n';
// //                 for (var key in errors) {
// //                     errorMessage += ' ลำดับที่ '+(parseInt(key[10])+1)+' ' + errors[key][0] +'\n';
// //                 }

// //                 Swal.fire({
// //                     icon: 'error',
// //                     title: 'Validation Error',
// //                     text: errorMessage
// //                 });
// //             } else {
// //                 console.error(error);
// //             }
// //       });

// // var formData = new FormData($("addreport")[0]);
// // formData.append( $('#addreport').serialize());
// $('#addreport').submit(function (e) {
//             e.preventDefault();
// var formData = new FormData(this);
// $.ajax({
//                 type: 'POST',
//                 url: 'Reportstd', // Define the route for the form submission
//                 data:formData,
//                 success: function (response) {
//                     alert(response.message);
//                     Swal.fire({
//                     icon: 'success',
//                     title: 'Success',
//                     text: response.data.message,
//                     showConfirmButton: false,
//                     timer: 2000
//                 }).then(() => {
//                     // Redirect to another page
//                     window.location.href = '/Internship-report';  // Replace with your desired URL
//                 });
//                 },
//                 error: function (response) {
//                     // Handle errors if needed
//                     console.log(response);
//                 }
//             });
//           });
// })
</script>
@endpush