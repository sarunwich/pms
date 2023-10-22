@extends('layouts.user')
@section('page_now')
{{ 'หน่วยงาน' }} @parent
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
    <h3 class="card-title">หน่วยงาน</h3>
    <div class="card-tools">
      <a href="{{route('Agency.create')}}"><i class="fas fa-plus"></i></a>
    </div>
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
    หน่วยงาน
    {{-- {{dd($sgencys)}} --}}

    <div class="table-responsive">
      <table id="userTable" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>ชื่อหน่วยงาน</th>
            <th>ประเภท</th>
            <th>ที่อยู่</th>
            <th>โทรศัพท์</th>
          </tr>
        </thead>
        @foreach ($sgencys as $key => $sgency)
        <tr>
          <td>{{$key+1}}</td>
          <td>{{$sgency['agenciesTHname']}}</td>
          <td></td>
          <td>
            {{$sgency['address']}}{{$sgency['DISTRICT_NAME']}}{{$sgency['AMPHUR_NAME']}}{{$sgency['PROVINCE_NAME']}}{{$sgency['poststaion']}}
          </td>
          <td>{{$sgency['tel']}}</td>
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
{{-- <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script> --}}
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready( function () {
      $('#userTable').DataTable();
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
@endpush