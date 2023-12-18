@extends('layouts.manager')
@section('page_now')
{{ 'Homepage' }} @parent
@endsection
@push('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

{{--
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" /> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
@section('content')

<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title"> มอบหมายอาจารย์นิเทศก์</h3>

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


        <form id="addmonter" name="addmonter" action="{{route('Teach_bus.store')}}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label class="form-label">อาจารย์นิเทศก์</label>
                <select class="teacher form-control" name="teachID"></select>

            </div>
            @php
            if(date("m")>=6){
            $yy=date("Y")+543;
            }else{
            $yy=date("Y")+542;
            }
            @endphp

            <div class="form-group mb-3">
                <label for="select2Multiple">นิสิต</label>
                <select class="itemName  form-control" name="stdid[]" multiple="multiple" id="select2Multiple">

                </select>
            </div>
            <input type="hidden" name="year" value="{{$yy}}" />
            <button type="submit" class="btn btn-primary">submit</button>
        </form>


    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title"> อาจารย์ที่ปรึกษา/นิสิต</h3>

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
        {{-- {{dd($Teachbus)}} --}}
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>นิสิต</th>
                    <th>อาจารย์นิเทศก์</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Teachbus as $key=> $Teachb)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$Teachb->student_name}}</td>
                    <td>{{$Teachb->teacher_name}}</td>
                    <td>{{$Teachb->id}}
                        <form method="post" action="{{ route('Teach_bus.destroy', $Teachb->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
            // Select2 Multiple
            $('.select2-multiple').select2({
                placeholder: "Select",
                allowClear: true
            });

        });

</script>
<script type="text/javascript">
    $('.itemName').select2({
            placeholder: 'เลือกนิสิต',
            ajax: {
            //   url: '/select2-autocomplete-ajax',
            url  :"{{route('dataAjax')}}",
              delay: 250,
              processResults: function (data) {
                return {
                  results:  $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
              },
              cache: true
            }
          });


          $('.teacher').select2({
        placeholder: 'เลือกอาจารย์ที่ปรึกษา',
        ajax: {
        //   url: '/select2-autocomplete-ajax-teacher',
        url  :"{{route('datateacher')}}",
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                    return {
                        text: item.name,
                        id: item.id
                    }
                })
            };
          },
          cache: true
        }
      });

      $(document).ready(function(){
    $("#addmonter").on("submit", function(e){
                    e.preventDefault();
                    
                    $.ajax({
                        url  :"{{route('Teach_bus.store')}}",
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
                                    window.location.href = "{{route('Assign.advisor')}}";  // Replace with your desired URL
                                });
                          console.log(response);
                        },error: function (response) {
                        // Handle errors if needed
                        console.log(response);
                    }
                    });
                });
              });
</script>
@endpush