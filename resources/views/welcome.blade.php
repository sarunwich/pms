@extends('layouts.app')
@section('page_now')
    {{ 'Wellcome' }} @parent
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> --}}
            <h1 class="text-center">Co-operative Education</h1>
        </div>
    </div>
</div>

 <!-- Default box -->
      {{-- <div class="card">
        <div class="card-header">
          <h3 class="card-title"> ยินดีต้อนรับ สู่ ระบบจัดการการฝึกสหกิจ</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body"> --}}
    {{-- <body class="antialiased"> --}}
        {{-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}

            {{-- <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0"> --}}
                    {{-- <div class="row justify-content-center">
                   <h1>Co-operative Education</h1>
                </div> --}}

                {{-- <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    
                </div>

                
            </div> --}}
        {{-- </div> --}}
    {{-- </div>
    <!-- /.card-body -->
    <div class="card-footer">
      
    </div>
    <!-- /.card-footer-->
  </div>
  <!-- /.card --> --}}
@endsection
@push('scripts')
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
@endpush
