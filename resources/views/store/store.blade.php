<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Home | E-Shop</title>


        <link href="{{ elixir('css/all.css') }}" rel="stylesheet">


    </head><!--/head-->

    <body>
        <header id="header"><!--header-->
            <div class="header_top"><!--header_top-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                    <li><a href="#"><i class="fa fa-phone"></i> (98) 3244-7243</a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i> atendimento@codecommerce.pozzguo.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header_top-->

            <div class="header-middle"><!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <a href="/"><span>CodeCommerce</span></a>
                            </div>

                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="{{ route('account.orders') }}"><i class="fa fa-user"></i> Minha conta</a></li>
                                    <li><a href="{{ route('admin.index') }}"><i class="fa fa-lock"></i> Admin...</a></li>
                                    <li><a href="{{ route('cart') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                    <li><a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i> Carrinho</a></li>
                                    @if (Auth::guest())
                                        <li><a href="{{ url('/login') }}"><i class="fa fa-lock"></i> Login</a></li>
                                    @else
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>

                                            <ul class="sub-menu" role="menu">
                                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                            </ul>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-middle-->

            <div class="header-bottom"><!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li><a href="/" class="active">Home</a></li>
                                    <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="{{ route('cart') }}">Cart</a></li>
                                            <li><a href="login">Login</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="contact-us.html">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="search_box pull-right">
                                <input type="text" placeholder="Buscar"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-bottom-->
        </header><!--/header-->



        <section>
            <div class="container">

                <div class="row">

                    @yield('categories') 

                    @yield('content')

                </div>

            </div>
            <div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-content">
                    <ul class="list-inline item-details">
                        <li><a href="http://themifycloud.com">ThemifyCloud</a></li>
                        <li><a href="http://themescloud.org">ThemesCloud</a></li>
                    </ul>
                </div>
            </div>
        </section>

        <footer id="footer"><!--Footer-->




            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <p class="pull-left">Copyright © 2016 Pozzguo CodeCommerce. All rights reserved.</p>
                        <p class="pull-right">Designed by <span><a target="_blank" href="http://invoinn.com/">InvoInn</a></span></p>
                    </div>
                </div>
            </div>

        </footer><!--/Footer-->



        <script src="{{ elixir('js/all.js') }}"></script>

    </body>
</html>