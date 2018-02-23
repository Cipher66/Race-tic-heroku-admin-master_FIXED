<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="refresh"  />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/racetic.png" /> <title>Race-tic</title>


    <!-- Latest compiled and minified CSS
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- BootBox -->
    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js" rel-->
    <!--<script src="node_modules/bootbox/bootbox.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>


    <!-- SweetAlert-->


    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.min.js"></script>



    <link href="css/estiloshome.css" rel="stylesheet">
    <script>
        window.onscroll = function(){scrollFunction()};

        function scrollFunction() {
            if(document.body.scrollTop>20 || document.documentElement.scrollTop>20){
                document.getElementById("myBtn").style.display = "block";
            } else {
                document.getElementById("myBtn").style.display = "none";
            }
        }

        $(document).ready(function() {
            $("a[href='inicio#nosotros']").click(function() {
                $('html, body').animate({
                    scrollTop: $("#nosotros").offset().top
                }, 1000);
            });
            $("a[href='inicio#qsomos']").click(function() {
                $('html, body').animate({
                    scrollTop: $("#qsomos").offset().top
                }, 1000);
            });
            $("a[href='inicio#cfunciona']").click(function() {
                $('html, body').animate({
                    scrollTop: $("#cfunciona").offset().top
                }, 1000);
            });
            $("#myBtn").click(function() {

                $('html, body').animate({scrollTop: 0}, 1000);
            });
        });
    </script>



</head>

<body>

<nav class="navbar-inverse">
    <div class="container-fluid" id="navbar">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="inicio" id="titulo">RACE-TIC</a>
        </div>
        <div class="collapse navbar-collapse collapse navbar-collapse" role="navigation"  data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1"
             aria-expanded="false" aria-label="Toggle navigation" id="myNavbar">
            <ul class="nav navbar-nav">
                @guest
                    <li><a href="inicio#nosotros" name="nosotros" id="menus">¿POR QUÉ NOSOTROS?</a></li>
                    <li><a href="inicio#qsomos" id="menus">QUIENES SOMOS</a></li>
                    <li><a href="inicio#cfunciona" id="menus">CÓMO FUNCIONA</a></li>
                    <li><a href="contacto" id="menus">CONTACTO</a></li>
                @else
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">INFORMACIÓN<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="inicio#nosotros" name="nosotros" id="menus">¿POR QUÉ NOSOTROS?</a></li>
                            <li><a href="inicio#qsomos" id="menus">QUIENES SOMOS</a></li>
                            <li><a href="inicio#cfunciona" id="menus">CÓMO FUNCIONA</a></li>
                        </ul>
                    </li>
                        <li><a href="coches" id="menus">COCHES</a></li>

                        <li><a href="carreras" id="menus">CARRERAS</a></li>
                        <li><a href="contacto" id="menus">CONTACTO</a></li>
                @endguest
            </ul>
            <ul class="nav navbar-nav navbar-right">

                @guest
                    <li><a href="register" id="menus"><span class="glyphicon glyphicon-user colorboton"></span> Registrarse</a></li>
                    <li><a href="login" id="menus"><span class="glyphicon glyphicon-log-in colorboton"></span> Iniciar sesión</a></li>
                    @else


                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-user"></span> 
                                <strong>{{ Auth::user()->name }}</strong>
                                <span class="glyphicon glyphicon-chevron-down"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="navbar-login">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <p class="text-center">
                                                    <span class="glyphicon glyphicon-user icon-size"></span>
                                                </p>
                                            </div>
                                            <div class="col-lg-8">
                                                <p class="text-left"><strong>{{ Auth::user()->name }}</strong></p>
                                                <p class="text-left small">{{ Auth::user()->email }}</p>
                                                <p class="text-left">
                                                    <a href="perfil" class="btn btn-primary btn-block btn-sm">Perfil</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="navbar-login navbar-login-session">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <p>
                                                    <!-- <a href="#" class="btn btn-danger btn-block">Cerrar Sesion</a> -->
                                                    <a href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-danger btn-block">
                                                        Cerrar Sesión
                                                    </a>

                                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>


                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                        @endguest
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<!--footer start from here-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 footer-col">
                <div class="logofooter">Race-tic</div>
                <p>Empresa Nº1 en diagnostico de coches en tiempo real</p>
                <p><i class="fa fa-map-pin"></i> Donostia , San-Sebastian</p>
                <p><i class="fa fa-phone"></i>  +34 9999 999 999</p>
                <p><i class="fa fa-envelope"></i> E-mail : racetic17@gmail.com</p>

            </div>
            <div class="col-md-3 col-sm-6 footer-col">
                <img src="images/racetic.png" width="150" height="100">
            </div>
            <div class="col-md-3 col-sm-6 footer-col">
                <h6 class="heading7">Premios</h6>
                <div class="post">
                    <p>Premio a la empresa más innovadora <span>Agosto 3,2017</span></p>
                    <p>Premio a la empresa más joven <span>Agosto 3,2017</span></p>
                </div>


            </div>
            <div class="col-md-3 col-sm-6 footer-col">
                <h6 class="heading7">Mantente informado</h6>
                <ul class="footer-social">
                    <li><a href="https://linkedin.com/"><i class="ion-social-linkedin" aria-hidden="true"></i></a></li>
                    <li><a href="https://facebook.com/"><i class="ion-social-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="https://twitter.com/"><i class="ion-social-twitter" aria-hidden="true"></i></a></li>

                </ul>
            </div>
        </div>
    </div>
</footer>
<!--footer start from here-->

<div class="copyright">
    <div class="container">
        <div class="col-md-6">
            <p>© 2018 - All Rights Reserved</p>
        </div>

    </div>
</div>





</body>
</html>
