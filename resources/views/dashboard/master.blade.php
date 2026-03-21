<!DOCTYPE html>
<html lang="es" dir="">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{config('app.name')}}</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon-16x16.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
    <link href="{{asset('dashboard/css/themes/lite-purple.min.css')}}" rel="stylesheet" />
    <link href="{{asset('dashboard/css/plugins/perfect-scrollbar.min.css')}}" rel="stylesheet" />
    <link href="{{asset('dashboard/css/plugins/fontawesome-5.min.css')}}" rel="stylesheet" />
    <link href="{{asset('dashboard/css/plugins/ladda-themeless.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('dashboard/css/btn.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

    @stack('style')

</head>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">
        <div class="main-header">
            <div class="logo">
                <img src="{{asset('dashboard/images/logo.png')}}" alt="">
            </div>
            <div class="menu-toggle">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div style="margin: auto"></div>
            <div class="header-part-right">
                <!-- Full screen toggle -->
                <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>
                <!-- User avatar dropdown -->
                <div class="dropdown">
                    <div class="user col align-self-end">
                        <img src="{{asset('dashboard/images/1.svg')}}" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="dropdown-header">
                                <i class="i-Lock-User mr-1"></i> {{ auth()->user()->name}}
                            </div>
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button class="dropdown-item" style="cursor: pointer" href="signin.html">cerrar sesion</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- =============== Left side Start ================-->
        @include('dashboard.partials.nav')
        <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                @yield('header')
                <div class="separator-breadcrumb border-top">
                    @if (session()->has('flash'))
                        <div class="alert alert-success">{{ session('flash') }}</div>
                    @endif
                    @yield('content')
                </div>
            </div>
            <!-- end of main-content -->
        </div>
        @include('dashboard.partials.createModal')
    </div>
    <script src="{{asset('dashboard/js/plugins/jquery-3.3.1.min.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{asset('dashboard/js/plugins/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins/spin.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins/ladda.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins/ckeditor/build/ckeditor.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    @stack('script')
    <script src="{{asset('dashboard/js/scripts/script.min.js')}}"></script>
    <script src="{{asset('dashboard/js/scripts/sidebar.large.script.min.js')}}"></script>



    <script>
    $('.image-popup').magnificPopup({
        type: 'image',
        gallery:{
            enabled:false
        }
    });
    if (document.getElementById('editor')) {
        ClassicEditor.create( document.querySelector( '#editor' ), {

            toolbar: {
                items: [
                    'heading',
                    '|',
                    'removeFormat',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    'alignment',
                    '|',
                    'fontSize',
                    'fontFamily',
                    'fontColor',
                    'fontBackgroundColor',
                    '|',
                    'blockQuote',
                    'mediaEmbed',
                    'undo',
                    'redo'
                ]
            },
            language: 'es',

        } )
        .then( editor => {
            window.editor = editor;
        } )
        .catch( error => {
            console.error( 'Oops, something went wrong!' );
            console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
            console.warn( 'Build id: 6geux0be63q6-woaw56c0fym8' );
            console.error( error );
        } );
    }

    </script>
    @unless(request()->is('admin/noticias/*') || request()->is('admin/proyectos/*')|| request()->is('admin/politicas/*')|| request()->is('admin/estrategiasProyectos/*'))
        <script src="{{asset('dashboard/js/createModal.js')}}"></script>
    @endunless
</body>

</html>
