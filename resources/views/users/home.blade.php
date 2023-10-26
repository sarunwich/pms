@extends('layouts.user')
@section('page_now')
    {{ 'Homepage' }} @parent
@endsection
@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}

 <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"> ยินดีต้อนรับ สู่ ระบบจัดการการฝึกงาน</h3>

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
            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <pre>
                      ส่วนที่ 1 ขั้นตอนก่อนฝึกงาน
                      1. นิสิตลงทะเบียนฝึกงาน
                      2. นิสิตกรอกแบบฟอร์มแจ้งความจำนงขอฝึกงาน ในหน้า "บันทึกข้อมูลแบบฟอร์มฝึกงาน" แนบไฟล์ประวัติส่วนตัวและใบแสดงผลการเรียน (ถ้ามี)
                      *กรณีไม่มีสถานประกอบการให้เลือก นิสิตต้องเข้าไปกรอกรายละเอียดสถานประกอบการที่หน้า "หน่วยงาน" / "บันทึกข้อมูลหน่วยงาน"
                      3. นิสิตพิมพ์แบบฟอร์มให้อาจารย์ผู้รับผิดชอบพิจารณา
                      4. นิสิตอัพโหลดไฟล์แบบฟอร์มเข้าสู่ระบบเพื่อยื่นแบบฟอร์มแจ้งความจำนงขอฝึกงาน
                      **ข้อ 3-4 หากอาจารย์สามารถเข้ามาตรวจสอบในระบบได้ให้เปลี่ยนเป็น "อาจารย์พิจารณาให้ความเห็นชอบในการออกหนังสือขอความอนุเคราะห์รับนิสิตเข้าฝึกงาน"**
                      5. เจ้าหน้าที่จัดทำหนังสือขอความอนุเคราะห์รับนิสิตเข้าฝึกงานจัดส่งไปยังสถานประกอบการและอัพโหลดเข้าสู่ระบบ
                      6. นิสิตตรวจสอบสถานะคำร้องได้ที่หน้า "สถานะคำร้อง"
                      7. สาขาวิชาจัดโครงการปฐมนิเทศก่อนฝึกงาน นิสิตจะได้รับหนังสือส่งตัวเพื่อส่งต่อให้สถานประกอบการ 
                      
                      ส่วนที่ 2 ขั้นตอนระหว่างการฝึกงาน
                      1. นิสิตรายงานตัวเข้าฝึกงาน ณ สถานประกอบการ พร้อมทั้งนำหนังสือส่งตัวส่งมอบให้สถานประกอบการ
                      2. นิสิตบันทึกการปฏิบัติงานประจำวันในหน้า "บันทึกประจำวัน"
                      3. เจ้าหน้าที่พี่เลี้ยง/อาจารย์นิเทศตรวจสอบบันทึกการปฏิบัติงานประจำวัน
                      4. นิสิตและอาจารย์นิเทศกำหนดวันนิเทศในหน้า "นิเทศฝึกงาน" 
                      
                      ส่วนที่ 3 ขั้นตอนหลังการฝึกงาน
                      1. นิสิตเข้าไปประเมินสถานประกอบการในหน้า "แบบประเมิน"
                      2. นิสิตพิมพ์รายงานบันทึกการปฏิบัติงานประจำวันในหน้า "พิมพ์รายงาน"
                      3. นิสิตจัดทำรายงานผลการปฏิบัติงาน
                      4. สาขาวิชาจัดโครงการสัมมนาหลังฝึกงาน นิสิตถ่ายทอดประสบการณ์การฝึกงาน
                          </pre>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
@endsection
@push('scripts')
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
@endpush
