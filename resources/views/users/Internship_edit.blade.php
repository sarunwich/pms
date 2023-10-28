@extends('layouts.user')
@section('page_now')
    {{ 'แก้ไขรายการฝึกสหกิจ' }} @parent
@endsection
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
        </div>
        <!-- /.card-body -->
        {{-- <div class="card-footer">
          Footer
        </div> --}}
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
@endsection
