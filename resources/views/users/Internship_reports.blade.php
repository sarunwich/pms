@extends('layouts.user')
@section('page_now')
{{ 'รายงานฝึกงาน' }} @parent
@endsection
@push('style')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush
@section('content')


<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">รายงานฝึกงาน</h3>

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
    รายงานฝึกงาน
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>วันที่</th>
          <th>รายละเอียด</th>
          
          <th>พี่เลี้ยง</th>
          <th>อาจารยที่ปรึกษา</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($reportstds as $key => $reportstd)
        <tr>
          <td>{{$reportstd['date_add']}}</td>
          <td>
            {{-- <ul>
              @foreach($reportstd->picreports as $picreport)
              <li>{{ $picreport->picname }}
                <img alt="Product Image" class="w-100" src="{{ asset('storage/picdetail/' . $picreport->picname) }}" />
              </li>
              @endforeach
            </ul> --}}
            <div class="card card-solid">
              <div class="card-body">
                <div class="row">
                  <div class="col-12 col-sm-12">
                    <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                    <div class="col-12">

                      @foreach($reportstd->picreports as $index => $picreport)
                      @if($index === 0)
                      <img src="{{ asset('storage/picdetail/' . $picreport->picname) }}" class="product-image"
                        alt="Product Image">
                      @endif
                      @endforeach
                    </div>
                    <div class="col-12 product-image-thumbs">
                      @foreach($reportstd->picreports as $picreport)
                      <div class="product-image-thumb @if($index === 0) active @endif"><img
                          src="{{ asset('storage/picdetail/' . $picreport->picname) }}" alt="Product Image"></div>

                      @endforeach
                    </div>
                  </div>
                  
                </div>
                <div class="row mt-4">
                  <nav class="w-100">
                    <div class="nav nav-tabs" id="product-tab{{$reportstd['id']}}" role="tablist">
                      <a class="nav-item nav-link active" id="product-desc-tab{{$reportstd['id']}}" data-toggle="tab"
                        href="#product-desc{{$reportstd['id']}}" role="tab" aria-controls="product-desc"
                        aria-selected="true">รายละเอียด</a>
                      <a class="nav-item nav-link" id="product-comments-tab{{$reportstd['id']}}" data-toggle="tab"
                        href="#product-comments{{$reportstd['id']}}" role="tab" aria-controls="product-comments"
                        aria-selected="false">หมายเหตุ</a>

                    </div>
                  </nav>
                  <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="product-desc{{$reportstd['id']}}" role="tabpanel"
                      aria-labelledby="product-desc-tab{{$reportstd['id']}}">{{$reportstd['detail']}}</div>
                    <div class="tab-pane fade" id="product-comments{{$reportstd['id']}}" role="tabpanel"
                      aria-labelledby="product-comments-tab{{$reportstd['id']}}"> {{$reportstd['note']}} </div>

                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </td>
          
          <td></td>
          <td></td>
        </tr>
        @endforeach

      </tbody>
      <tfoot>
        <tr>
          <th>วันที่</th>
          <th>รายละเอียด</th>
          
          <th>พี่เลี้ยง</th>
          <th>อาจารยที่ปรึกษา</th>
        </tr>
      </tfoot>
    </table>
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
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
{{-- <script src="../../dist/js/adminlte.min.js"></script> --}}
<!-- AdminLTE for demo purposes -->
{{-- <script src="../../dist/js/demo.js"></script> --}}
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "order": [[ 0, "desc" ]],
      "lengthMenu": [ 25, 50, 75, "All" ],
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
   
  });
</script>
<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })



  
</script>
@endpush