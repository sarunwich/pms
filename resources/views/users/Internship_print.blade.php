@extends('layouts.user')
@section('page_now')
{{ 'พิมพ์รายการขอฝึกสหกิจ' }} @parent
@endsection
@push('style')


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">

@endpush
@section('content')


<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">พิมพ์รายการขอฝึกสหกิจ</h3>

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
    พิมพ์รายการขอฝึกสหกิจ
    <form method="GET" action="{{ route('Internship.print') }}">
      <div class="form-group">
        <div class="form-row">
          <div class="input-group mb-3">
          <div class="col-md-5">
            <label for="Year">วันที่เริ่ม</label>

            <div class="input-group date" id="dtp_input1" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd"
              data-target-input="nearest">
              <input type="text" id="dtp_input1v" name="startdate"  value="{{$startdate}}{{ old('startdate') }}"
                class="form-control datetimepicker-input" data-target="#dtp_input1" readonly required>
              <div class="input-group-append" data-target="#dtp_input1" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>

            </div>
            @if ($errors->has('startdate'))
            <div class="invalid-feedback">
              {{ $errors->first('startdate') }}
            </div>
            @endif
          </div>
          <div class="col-md-5">
            <label for="Year">วันที่สิ้นสุด</label>
            <div class="input-group date" id="dtp_input2" onchange="checkdate()" data-link-field="dtp_input2"
              data-link-format="yyyy-mm-dd" data-target-input="nearest">
              <input type="text" id="dtp_input2v" name="enddate" value="{{$enddate}}{{ old('enddate') }}"
                class="form-control datetimepicker-input" data-target="#dtp_input2" readonly required>
              <div class="input-group-append" data-target="#dtp_input2" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
            @if ($errors->has('enddate'))
            <div class="invalid-feedback">
              {{ $errors->first('enddate') }}
            </div>
            @endif
          </div>
          
           
           
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
          </div>
        </div>
      </div>
    </form>


    <div class="table-responsive">
      <table id="userTable" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>วันที่</th>
            <th>รายละเอียด</th>
            <th>หมายเหตุ</th>


          </tr>
        </thead>
        @foreach ($reportstds as $key => $reportstd)
        <tr>
          <td>{{$reportstd->date_add}}</td>
          <td>
            <pre>{{$reportstd->detail}}</pre>
          </td>
          <td>{{$reportstd->note}}</td>

        </tr>
        @endforeach
        <tbody>
        </tbody>
      </table>
    </div>

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


    function checkdate()
    {
        var myVar2 = document.getElementById('dtp_input2v').value;//prompt("Enter a start date: ")
        var myVar1 = document.getElementById('dtp_input1v').value;//prompt("Enter a end date: ")
        if(myVar2 <=myVar1 ){
            Swal.fire(
                'มีบ่างอย่างไม่ถูกต้อง',
                'วันที่สิ้นสุดต้องมากกว่าวันที่เริ่มต้น?',
                'question'
                )
            document.getElementById('dtp_input2v').value="";

        }
        
    }
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
@endpush