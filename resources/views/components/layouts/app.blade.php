<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    {{-- <meta name="csrf-token" content="@csrfToken()"> --}}
    <meta name="description" content="Little Growers is your one-stop shop for small plants, seeds, fertilizers, and gardening accessories. Create your indoor garden with affordable, high-quality products. Let’s grow together!" />
    <meta name="title" content="Little Growers – Small Plants, Seeds, Fertilizers, Pots & Gardening Accessories" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    
    <!-- Open Graph / Facebook / WhatsApp -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Little Growers – Your Gardening Companion" />
    <meta property="og:description" content="Discover high-quality small plants, seeds, fertilizers, and gardening essentials at LittleGrowers.xyz. Let’s grow your garden together!" />
    <meta property="og:url" content="https://www.littlegrowers.xyz" />
    <meta property="og:image" content="https://www.littlegrowers.xyz/img/w-littlegrowers-logo.jpeg" />
    <meta property="og:site_name" content="Little Growers" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Little Growers – Small Plants & Gardening Essentials" />
    <meta name="twitter:description" content="Grow your love for plants with Little Growers. Explore our selection of small plants, seeds, fertilizers, and more." />
    <meta name="twitter:image" content="https://www.littlegrowers.xyz/img/w-littlegrowers-logo.jpeg" />


    <link rel="canonical" href="https://www.littlegrowers.xyz" />
    <meta name="keywords" content="small plants, seeds, fertilizers, gardening accessories, plastic pots, plant care, indoor plants, Little Growers" />

    <link rel="icon" href="https://www.littlegrowers.xyz/favicon.ico" type="image/x-icon" />


    <!-- Title -->
    <title>Little Growers</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">


    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="/style.css">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="/img/w-littlegrowers-logo.jpeg" alt="">
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- ***** Top Header Area ***** -->
        <div class="top-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="top-header-content d-flex align-items-center justify-content-between">
                            <!-- Top Header Content -->
                            <div class="top-header-meta">
                                {{-- <a href="#" data-toggle="tooltip" data-placement="bottom" title="infodeercreative@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span>Email:  rohit171209@gmail.com </span></a> --}}
                                <a href="#" data-toggle="tooltip" data-placement="bottom"
                                    title="+1 234 122 122"><i class="fa fa-phone" aria-hidden="true"></i> <span>Call Us:
                                        @getSettingValue('contact_mobile')</span></a>
                            </div>

                            <!-- Top Header Content -->
                            <div class="top-header-meta d-flex">
                                <!-- Language Dropdown -->
                                {{-- <div class="language-dropdown">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle mr-30" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Language</button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">USA</a>
                                            <a class="dropdown-item" href="#">UK</a>
                                            <a class="dropdown-item" href="#">Bangla</a>
                                            <a class="dropdown-item" href="#">Hindi</a>
                                            <a class="dropdown-item" href="#">Spanish</a>
                                            <a class="dropdown-item" href="#">Latin</a>
                                        </div>
                                    </div>
                                </div> --}}
                                <!-- Login -->
                                {{-- <div class="login">
                                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <span>Login</span></a>
                                </div> --}}
                                <!-- Cart -->
                                @livewire('cart-header-component')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- ***** Navbar Area ***** -->
        <div class="alazea-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="alazeaNav">

                        <!-- Nav Brand -->
                        <a href="/" class="nav-brand">
                            <img src="/img/s-littlegrowers-logo.png" alt="Little Growers">
                        </a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Navbar Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="/">Home</a></li>
                                    <li><a href="about">About</a></li>
                                    <li><a href="contact">Contact</a></li>
                                </ul>

                                <!-- Search Icon -->
                                <div id="searchIcon">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </div>

                            </div>
                            <!-- Navbar End -->
                        </div>
                    </nav>

                    <!-- Search Form -->
                    <div class="search-form">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search"
                                placeholder="Type keywords &amp; press enter...">
                            <button type="submit" class="d-none"></button>
                        </form>
                        <!-- Close Icon -->
                        <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
            style="background-image: url(/img/bg-img/24.jpg);">
            <h2>Shop</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shop</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Shop Area Start ##### -->
    {{ $slot }}
    <!-- ##### Shop Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area bg-img" style="background-image: url(img/bg-img/3.jpg);">
        <!-- Main Footer Area -->
        <div class="main-footer-area">
            <div class="container">
                <div class="row">

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-6">
                        <div class="single-footer-widget">
                            <div class="footer-logo mb-30">
                                <a href="/">
                                    <img width="200" src="/img/s-littlegrowers-logo.png" alt="logo" />
                                </a>
                            </div>
                            {{-- <p>Lorem ipsum dolor sit samet, consectetur adipiscing elit. India situs atione mantor</p> --}}
                            <div class="social-info">
                                <a href="https://www.facebook.com/share/tNf9bEvHbSDnV3Qy"><i class="fa fa-facebook"
                                        aria-hidden="true"></i></a>
                                {{-- <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> --}}
                                {{-- <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> --}}
                                <a
                                    href="https://www.instagram.com/little_growers.in/profilecard/?igsh=bjkyaDltdnZjYXg4"><i
                                        class="fa fa-instagram" aria-hidden="true"></i></a>
                                {{-- <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> --}}
                            </div>
                        </div>
                    </div>



                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        {{-- <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>BEST SELLER</h5>
                            </div>

                            <!-- Single Best Seller Products -->
                            <div class="single-best-seller-product d-flex align-items-center">
                                <div class="product-thumbnail">
                                    <a href="shop-details.html"><img src="/img/bg-img/4.jpg" alt=""></a>
                                </div>
                                <div class="product-info">
                                    <a href="shop-details.html">Cactus Flower</a>
                                    <p>$10.99</p>
                                </div>
                            </div>

                            <!-- Single Best Seller Products -->
                            <div class="single-best-seller-product d-flex align-items-center">
                                <div class="product-thumbnail">
                                    <a href="shop-details.html"><img src="/img/bg-img/5.jpg" alt=""></a>
                                </div>
                                <div class="product-info">
                                    <a href="shop-details.html">Tulip Flower</a>
                                    <p>$11.99</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>CONTACT</h5>
                            </div>

                            <div class="contact-information">
                                <p><span>Address:</span> @getSettingValue('contact_address')</p>
                                <p><span>Phone:</span> @getSettingValue('contact_mobile')</p>
                                {{-- <p><span>Email:</span> rohit171209@gmail.com </p> --}}
                                <p><span>Open hours:</span> @getSettingValue('open_hours') </p>
                                {{-- <p><span>Happy hours:</span> Sat: 2 PM to 4 PM</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="border-line"></div>
                    </div>
                    <!-- Copywrite Text -->
                    <div class="col-12 col-md-6">
                        <div class="copywrite-text">
                            <p>&copy;
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved
                            </p>
                        </div>
                    </div>
                    <!-- Footer Nav -->
                    <div class="col-12 col-md-6">
                        <div class="footer-nav">
                            <nav>
                                <ul>
                                    <li><a href="/">Home</a></li>
                                    <li><a href="/about">About</a></li>
                                    <li><a href="/contact">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <a href="https://api.whatsapp.com/send?phone=@getSettingValue('whatsapp_number')&text=@getSettingValue('whatsapp_initial_text')" class="whatsapp-float"
        target="_blank">
        <i class="fa fa-whatsapp whatsapp--float"></i>
    </a>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="/js/bootstrap/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- All Plugins js -->
    <script src="/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="/js/active.js"></script>

    <script>
        window.addEventListener('alert', event => {
            toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toast-bottom-right",
                }
                

            event.detail.forEach(detail => { 
                toastr[detail.type](detail.message,
                    detail.title ?? '') 
            });
        });
    </script>


</body>

</html>
