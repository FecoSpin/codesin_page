<!DOCTYPE html>
<html lang="es" style="font-size: 16px;">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <meta name="description" content="@yield('meta-content', 'Codesin')">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('meta-title', config('app.name'))</title>
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon-16x16.png')}}">
        <!-- all css empieza -->
        <link rel="stylesheet" href="{{asset('js/bootstrap/dist/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

        <link rel="stylesheet" href="{{asset('css/codesin.css')}}">
        <link rel="stylesheet" href="{{asset('css/responsiveCodesin.css')}}">
        <link rel="stylesheet" href="{{asset('css/nicepage.css')}}">
        <link rel="stylesheet" href="{{asset('css/reset.css')}}">
        <!-- @stack('script') -->
        <style>
            .lock { position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 100000; background-color: rgba( 255,255,255,1 ); }
            .sk-spinner-wave.sk-spinner, .preloader-it {
                margin: 0 auto;
                width: 8%;
                top: 40%;
                position: relative;
                text-align: center;
                color: #303030;
            }
        </style>
    </head>
    <body>
    <div id="app">
        <!--Preloader-->
        <div class="lock" id="lock">
            <div class="preloader-it">
                <img class="ldld" src="/img/loaders/spin.svg">
            </div>
        </div>

	    <!--/Preloader-->
        <header class="space-inter">
            <nav-bar></nav-bar>
        </header>
        <!-- contenido -->
        <router-view></router-view>
        {{-- footer area --}}
        <section class="footer">
            <footer class="footer-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="footer-up">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="footer-logo">
                                        <a href="/"><img src="../img/logo/footer-logo.png" alt="codesin"></a>
                                    </div>
                            </div>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <div class="single-widget">
                                    <div class="footer-social">
                                        <ul>
                                            <li><a v-bind:href="facebook" class="social-icon"><img src="../img/icons/Facebook.svg" alt=""></a></li>
                                            <!--<li><a v-bind:href="youtube"  class="social-icon"><img src="../img/icons/Youtube.svg" alt=""></a></li>-->
                                            <li><a v-bind:href="twitter"  class="social-icon"><img src="../img/icons/Twitter.svg" alt=""></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div>
                                        <div class="aviso"><router-link :to="{name: 'aviso'}" >Avisos de privacidad</router-link></div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="footer-section">
                                <div class="col-sm-1 col-xs-1 icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="col-sm-10">
                                    <p>(667) 712 8232<br>(667) 715 1920</p>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="footer-contact">
                                <div class="col-sm-1 col-xs-1 icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="col-sm-10">
                                    <p>Pedro Infante 2911, interior 505, Edificio Country Courts, Centro de Negocios. Desarrollo Urbano Tres Ríos. Culiacán, Sinaloa, México. C.P. 80020</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="header-top-area azul-bg hidden-xs">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <ul class="header-login">
                                            <li><a href="/login"><i class="fa fa-key"></i>Login</a></li>
                                            <li><a href="https://gestori.codesin.mx/"><i class="fa fa-key"></i>gestori</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </section>
</div>
<script src="{{asset('js/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.magnific-popup.js')}}"></script>
<script src="{{mix('js/app.js')}}"></script>
</body>
</html>
