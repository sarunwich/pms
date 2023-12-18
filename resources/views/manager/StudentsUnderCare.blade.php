@extends('layouts.manager')
@section('page_now')
{{ 'นิสิตในความดูแล' }} @parent
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ปีการศึกษา') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form name"select_yy" action="{{ route('UnderCare.Search') }}" method="get">

                        <select name="search" class="form-control" onchange="this.form.submit()">
                            <option value="">---เลือก---</option>
                            @foreach($groupYears as $groupYear )
                            <option value="{{$groupYear->year}}" @if($groupYear->year==$yy)
                                selected

                                @endif>{{$groupYear->year}}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">นิสิตในความดูแล</h3>

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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>รหัสนิสิต</th>
                        <th>นิสิต</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Teachbus as $key=> $Teachb)
                    <tr class="data-row" data-id="{{ $Teachb->student_id }}">
                        <td>{{$key+1}}</td>
                        <td>{{$Teachb->student_code}}</td>
                        <td>{{$Teachb->prefix}}{{$Teachb->student_name}}</td>
                        {{-- <td>{{$Teachb->student_id}}

                        </td> --}}

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>


<div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Details</h4>
                <button type="button" onclick="closeModel()" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            <div class="modal-body">
                <!-- Display data here -->
                <p id="modalContent"></p>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
{{-- <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script> --}}
<!-- JavaScript to handle the click event -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.data-row').on('click', function() {
            var dataId = $(this).data('id');

            // AJAX request to fetch data
            $.ajax({
                url: '/data/' + dataId,
                type: 'GET',
                success: function(response) {
                    // Populate modal with fetched data
                    $('#modalContent').html('รหัสนิสิต: ' + response.student_code + '<br>ชื่อ-สกุล: ' + response.prefix+''+response.name+ '<br>เบอร์โทร: ' + response.Phone);
                    $('#dataModal').modal('show');
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
    function closeModel()
    {
        $('#dataModal').modal('hide');
    }
</script>
@endpush