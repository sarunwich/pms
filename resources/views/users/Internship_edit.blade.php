@extends('layouts.user')
@section('page_now')
{{ 'แก้ไขรายการฝึกสหกิจ' }} @parent
@endsection
@push('style')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
  img.zzz {
    position: absolute;
    text-align: right;
    z-index: 2;

  }
</style>
@endpush
@section('content')


<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">แก้ไขรายการฝึกสหกิจ</h3>

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
    แก้ไขรายการฝึกสหกิจ

    <div class="table-responsive">
      <table id="userTable" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>วันที่</th>
            <th>รายละเอียด</th>
            <th>หมายเหตุ</th>
            <th>#</th>

          </tr>
        </thead>

        <tbody>
          @foreach ($reportstds as $key => $reportstd)
          <tr>
            <td>{{$reportstd['date_add']}}</td>
            <td class="abbreviation">
              <pre>{{$reportstd['detail']}}
              </pre>
              @foreach($reportstd->picreports as $picreport)
              
              <div class="product-image-thumb ">
                <a href="javascript:void(0);" class="delete" data-href="{{ route('del.Picreport', $picreport->id) }}">
                  <img src="{{ asset('dist/img/del1.jpg')}}" width='30px' class='zzz'></a>
                <img src="{{ asset('storage/picdetail/' . $picreport->picname) }}" title='{{$picreport->pictile}}'>
              </div>
              @endforeach
            </td>
            <td>

              {{$reportstd['note']}}

            </td>
            <td>

              <a href="javascript:void(0);" data-href="{{ route('del.Reportstd', $reportstd->id) }}"
                class="btn btn-danger delete">ลบ</a>
              <button class="btn btn-primary edit-button" data-id="{{ $reportstd->id }}">แก้ไข</button>
              <button class="btn btn-info addpic-button" data-id="{{ $reportstd->id }}">เพิ่มภาพ</button>
            </td>

          </tr>
          @endforeach
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
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="editForm">
          @csrf
          @method('PUT')

          {{-- <textarea name="detail" id="detail"></textarea>
          <input type="text" name="note" id="note"> --}}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="Year">Report Details(รายละเอียดการฝึกสหกิจ)</label>
                
                <textarea class="form-control" rows="5" id="detail" name="detail" data-validation="required"
                  data-validation-error-msg="กรุณาระบุรายละเอียดการฝึกสหกิจ" required>{{ old('detail') }}</textarea>
                @if ($errors->has('detail'))
                <div class="invalid-feedback">
                  {{ $errors->first('detail') }}
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
          <!-- Add more fields as needed -->
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="addpicModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">เพิ่มภาพ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="addpicForm" action="{{route('addpic')}}" enctype="multipart/form-data">
          @csrf


          {{-- <textarea name="detail" id="detail"></textarea>
          <input type="text" name="note" id="note"> --}}
          <input type="hidden" id="reportstd_id" name="reportstd_id">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="Year">ภาพกิจกรรม</label> <input type="file" accept="image/*" class="form-control"
                  id="picdetail" name="picdetail" value="" required />
              </div>
            </div>

          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="Year">อธิบายภาพ</label>
                <input type="text" data-validation="required" class="form-control" id="pictile" name="pictile" value=""
                  required />
              </div>
            </div>
          </div>
          <!-- Add more fields as needed -->
          <button type="submit" class="btn btn-primary">บันทึก</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
{{-- <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script> --}}
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready( function () {
      $('#userTable').DataTable(
        {
          "order": [[ 0, "desc" ]],
          "responsive": true
        }
      );


      $(".edit-button").click(function () {
            var id = $(this).data("id");
            var url = 'redit/'+id;

            // Use AJAX to fetch the data to populate the form
            $.get(url, function (data) {
              console.log(data);
                // Populate the form fields with the data
                $("#detail").val(data.detail);
                $("#note").val(data.note);
                // Add more fields as needed

                // Set the form action to the correct URL for updating
                $("#editForm").attr("action", 'Reportstdupdate/' + id);
            });

            // Show the modal
            $("#editModal").modal("show");
        });

        $(".addpic-button").click(function () {
            var id = $(this).data("id");
            // var url = "/Reportstdedit/" + id + "/edit";

            // Use AJAX to fetch the data to populate the form
            // $.get(url, function (data) {
            //     // Populate the form fields with the data
                 $("#reportstd_id").val(id);
            //     $("#note").val(data.note);
            //     // Add more fields as needed

            //     // Set the form action to the correct URL for updating
                // $("#addpicForm").attr("action", "/addpic");
            // });

            // Show the modal
            $("#addpicModal").modal("show");
        });
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




      $(".delete").click(function() {
          var _href = $(this).data('href');
          Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                      window.location.href = _href
                      Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                  } else {
                    Swal.fire("Your file is safe!");
                  }
                  
              });
});
</script>
@endpush