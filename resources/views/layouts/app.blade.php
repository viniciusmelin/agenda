<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
{{-- 
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- Styles -->
   
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/css/skins/all-skins.min.css')}} ">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck/square/_all.min.css')}} "/>

    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/css/dataTables.bootstrap.min.css') }}">

    
    @yield('adminlte_css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
       

        @guest
        @else

        @include('layouts.header')
        @include('layouts.sidebar')
      
        
        <div class="content-wrapper" >
            @foreach (['error','warning','success','danger'] as $session )
                @if(session($session))
                <span class="hidden informacao" data-classe="{{$session}}">{{ session($session) }}</span>
                @endif
              
            @endforeach 
            <section class="content">
                @yield('content')
            </section>
        </div>
        @endguest
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('adminlte/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('js/notify.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/icheck/icheck.min.js') }}"></script>
    <script>
            $(function () {
              $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
              });
            });
    </script>
    <script language="javascript" type="text/javascript">
        $(document).ready(function () {
            if ($(".informacao").text() != "") {
                $.notify($(".informacao").text(), $(".informacao").data("classe"));
            }
        });
       </script>
    @yield('adminlte_js')
</body>
</html>
