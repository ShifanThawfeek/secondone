<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Main Css -->
    <link rel="stylesheet" href="https://moja.link/css/landing.css">
    <!-- Favicon -->
    <!-- <link rel="icon" href="{{ url('favicon.ico') }}" /> -->

    <link rel="icon" href="https://moja.link/favicon.ico" />

    <title>{{ $website->name }}</title>


    <style>
        div.example {
            background-color: yellow;
            padding: 20px;
        }

        @media screen and (max-width: 600px) {
            div.example {
                display: none;
            }
        }

        .custom-button {
            margin-bottom: 5px;
        }
    </style>



</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-main header sticky-top">
        <div class="container navbar-container">
            <a class="navbar-brand" href="https://moja.link/">
                <img class="img-fluid logo" src="assets/images/Expanded.png">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/features">Features <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/features#pricing">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/help">Help</a>
                    </li>
                </ul>
                <form class="ml-auto">
                    @guest
                    <a href="{{ route('register') }}" class="btn btn-light rounded-pill">GET STARTED</a>
                    @endguest
                    @auth
                    <a href="{{ route('user.settings') }}" class="btn btn-light rounded-pill">
                        Settings <i class="fa fa-arrow-right"></i>
                    </a>
                    @endauth
                </form>
            </div>
        </div>
    </nav>
    <!-- / Navbar -->

    <div class="container-fluid">
        @yield('content')
    </div>

    <!-- Footer -->
    <!-- <div class="container-fluid bg-light">
        <div class="container py-20" style="padding-top: 40px;padding-bottom: 20px;">
            <p class="text-center">All rights reserved for Mataonme.</p>
        </div>
    </div> -->
    <!-- / Footer -->

    <br><br><br><br>
    <!-- Footer -->
    <footer class="page-footer font-small indigo">
        <!-- Footer Links -->
        <div class="container-fluid bg-light">
            <div class="row text-center d-flex justify-content-center pt-5 mb-3">
                <div class="col-md-2 mb-3">
                    <h6 class="text-uppercase font-weight-bold">
                        <a href="/features">Features</a>
                    </h6>
                </div>
                <div class="col-md-2 mb-3">
                    <h6 class="text-uppercase font-weight-bold">
                        <a href="#!">Blog</a>
                    </h6>
                </div>
                <div class="col-md-2 mb-3">
                    <h6 class="text-uppercase font-weight-bold">
                        <a href="/features#pricing">Pricing</a>
                    </h6>
                </div>
                <div class="col-md-2 mb-3">
                    <h6 class="text-uppercase font-weight-bold">
                        <a href="/help">Help</a>
                    </h6>
                </div>
                <div class="col-md-2 mb-3">
                    <h6 class="text-uppercase font-weight-bold">
                        <a href="#!">Contact</a>
                    </h6>
                </div>
            </div>
            <hr class="rgba-white-light" style="margin: 0 15%;">
            <div class="row d-flex text-center justify-content-center mb-md-0 mb-4">
                <div class="col-md-8 col-12 mt-5">
                    <p style="line-height: 1.7rem; font-weight: bold">Arrange your links in one place... <br>
                    From website, social accounts to blog posts. All eyes on you in one landing page!</p>
                </div>
            </div>
            <hr class="clearfix d-md-none rgba-white-light" style="margin: 10% 15% 5%;">
            <!-- <div class="row container-fluid"> -->
            <div class="row text-center d-flex justify-content-center pt-5 mb-3">
                <div class="col-md-12">
                    <div class="mb-5 flex-center">
                        <a href="https://www.facebook.com/mataonme" class="fb-ic">
                            <i class="fab fa-facebook-f fa-lg white-text mr-4"> </i>
                        </a>
                        <!-- <a class="tw-ic">
                            <i class="fab fa-twitter fa-lg white-text mr-4"> </i>
                        </a> -->
                        <!-- <a class="gplus-ic">
                            <i class="fab fa-google-plus-g fa-lg white-text mr-4"> </i>
                        </a> -->
                        <!-- <a class="li-ic">
                            <i class="fab fa-linkedin-in fa-lg white-text mr-4"> </i>
                        </a> -->
                        <a href="https://www.instagram.com/mataonme" class="ins-ic">
                            <i class="fab fa-instagram fa-lg white-text mr-4"> </i>
                        </a>
                        <!-- <a class="pin-ic">
                            <i class="fab fa-pinterest fa-lg white-text"> </i>
                        </a> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Links -->
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">All rights reserved for Moja.link.
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <script>
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();

            var targetEle = this.hash;
            var $targetEle = $(targetEle);

            $('html, body').stop().animate({
                'scrollTop': $targetEle.offset().top
            }, 8000, 'swing', function() {
                window.location.hash = targetEle;
            });
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>
