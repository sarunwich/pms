@extends('layouts.supervision')
@section('page_now')
{{ 'ผลการปฏิบัติงาน' }} @parent
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

            


            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach ($Teachbus as $item)
                <li class="nav-item">
                    <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="tab-{{ $item->student_id }}"
                        data-id="{{ $item->student_id }}" onclick="tabclick({{ $item->student_id }})" data-toggle="tab" href="#tabContent-{{ $item->student_id }}"
                        role="tab" aria-controls="tabContent-{{ $item->student_id }}"
                        aria-selected="false">{{$item->prefix}}{{$item->student_name}}</a>
                </li> 
                @endforeach
            </ul>
            <div class="tab-content" id="myTabContent">
                <!-- Tab panes will be loaded dynamically -->
                @foreach ($Teachbus as $item)
                <div class="tab-pane fade{{ $loop->first ? ' show active' : '' }}"" id=" tabContent-{{ $item->
                    student_id}}" role="tabpanel"
                    aria-labelledby="tab-{{ $item->student_id }}">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>วัน/เดือน/ปี</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody id="dataBody">

                        </tbody>
                    </table>

                </div>
                @endforeach

            </div>

            
        </div>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">ผลการปฏิบัติงาน</h5>
                <button type="button" class="close" onclick="closeModel()" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalBody">
                <!-- Data fetched from database will appear here -->
                <div id="modalContent"></div>
                <div id="imageGallery" class="row">
                    <!-- Images fetched from database will appear here -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="closeModel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- Other buttons if needed -->
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
</script>
<script>
 
    function tabclick(id){
    // alert(id);
    // var url = '/fetch-data/' + id;
     var url= '{{ route("fetchData", ":id") }}'.replace(':id', id);
                    fetch(url)
                        .then(response => response.json())
                        .then(data => {
                            console.log(data);
                            const dataTable = document.getElementById('dataBody');
                            let rowNumber = 1;
            dataTable.innerHTML = ''; // Clear previous data
            data.forEach(item => {
                const row = document.createElement('tr');
                const date = new Date(item.updated_at);
                const thaiDateOptions = {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric',
                        timeZone: 'UTC', // Ensure it's in UTC time
                        locale: 'th-TH' // Thai locale
                        };
                        const thaiFormattedDate = date.toLocaleDateString('th-TH', thaiDateOptions);
                row.innerHTML = `
                    <td>${rowNumber}</td>
                    <td>${thaiFormattedDate}</td>
                    <td><button type="button" onclick="showmodal(${item.id})" class="btn btn-primary btn-show-modal" data-id="${item.id}">ดูข้อมูล</button></td>
                    
                `;
                dataTable.appendChild(row);
                rowNumber++;
           
            
            });
        })
                        .catch(error => console.error('Error:', error));
} 
    function showmodal(id){
        // alert(id);
        $.ajax({
        // url: '/fetch-datadetail/' + id,
        url: '{{ route("fetchDataDetail", ":id") }}'.replace(':id', id),
        type: 'GET',
        success: function(response) {
            console.log(response)
            console.log(response.data1)
            const modalContent = $('#modalContent');
            $('#imageGallery').empty();
            response.images.forEach(function(image) {
                $('#imageGallery').append(`
                <img src="{{asset('storage/picdetail/${image.picname}')}}" class="img-fluid" alt="Image">`);
            });
                modalContent.empty().append(`
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">ผลการปฏิบัติงาน :</label>
                    <textarea class="form-control">${response.data1.detail}</textarea >
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">หมายเหตุ :</label>
                    <textarea class="form-control" rows="3">${response.data1.note}</textarea >
                </div>
               
                `);
//             $('#modalContent').html('<div class='mb-3>
//   <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
//   <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
// </div>' + response.data1.detail + '<br>Name: ' + response.data1.note);
         $('#myModal').modal('show');
    },
        error: function(error) {
            console.error('Error:', error);
        }
    });
    }

    function closeModel()
    {
        $('#myModal').modal('hide');
    }
</script>
@endpush