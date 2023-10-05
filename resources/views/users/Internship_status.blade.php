@extends('layouts.user')
@section('page_now')
{{ 'สถานะขอฝึกงาน' }} @parent
@endsection
@section('content')


<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">สถานะขอฝึกงาน</h3>

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
    สถานะขอฝึกงาน
    {{-- {{dd($apprentys)}} --}}
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr align="center">
            <th>#</th>
            <th>ชื่อหน่วยงาน</th>
            <th>วันที่เริ่ม</th>
            <th>วันที่สิ้นสุด</th>
            <th>จำนวนวัน</th>
            <th>สถานะคำร้อง</th>

          </tr>
        </thead>
        <tbody>
          @php
          function DateDiff($strDate1,$strDate2)
          {
          return (strtotime($strDate2) - strtotime($strDate1))/ ( 60 * 60 * 24 ); // 1 day = 60*60*24
          }
          @endphp
          @foreach ($apprentys as $key => $apprenty)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{$apprenty['agenciesTHname']}}</td>
            <td align="center">{{$apprenty['startday']}}</td>
            <td align="center">{{$apprenty['lastday']}}</td>
            <td align="center">{{ DateDiff($apprenty['startday'],$apprenty['lastday'])}}</td>
            <td align="center">
              <div class="alert alert-info">{{$apprenty['status_name']}}</div>
              @if ($apprenty['status']==1 || $apprenty['status']==2 )

              <button type="button" class="btn btn-warning">แก้ไข</button>
              <form action="{{ route('Apprenty.destroy', $apprenty->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                  onclick="return confirm('Are you sure you want to delete this ?')">ลบ</button>
              </form>

              @endif
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
@endsection