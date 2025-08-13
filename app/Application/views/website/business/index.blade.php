<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <!-- Author -->
    <meta name="author" content="Themes Industry">
    <!-- description -->
    <meta name="description" content="MegaOne is a highly creative, modern, visually stunning and Bootstrap responsive multipurpose studio and portfolio HTML5 template with 8 ready home page demos.">
    <!-- keywords -->
    <meta name="keywords" content="Creative, modern, clean, bootstrap responsive, html5, css3, portfolio, blog, studio, templates, multipurpose, one page, corporate, start-up, studio, branding, designer, freelancer, carousel, parallax, photography, studio, masonry, grid, faq">
    <!-- Page Title -->
    <title>B2B | IGTS</title>

    <!-- Favicon -->
    <link href="{{ asset('website/business/2023') }}/innovative/img/favicon.png" rel="icon">
    <!-- Bundle -->
    <link href="{{ asset('website/business/2023') }}/vendor/css/bundle.min.css" rel="stylesheet">
    <link href="{{ asset('website/business/2023') }}/vendor/css/revolution-settings.min.css" rel="stylesheet">
    <!-- Plugin Css -->
    <link href="{{ asset('website/business/2023') }}/vendor/css/jquery.fancybox.min.css" rel="stylesheet">
    <!-- Style Sheet -->
    <link href="{{ asset('website/business/2023') }}/innovative/css/style.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <!--    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->

    <script charset="utf-8" type="text/javascript" src="https://js.hsforms.net/forms/embed/v2.js"></script>

    <link
            href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css"
            rel="stylesheet"  type='text/css'>


</head>

<body data-offset="90" data-spy="scroll" data-target=".navbar">

<!--start loader-->
<div class="loader">
    <div class="cssload-loader">
        <div class="cssload-inner cssload-one"></div>
        <div class="cssload-inner cssload-two"></div>
        <div class="cssload-inner cssload-three"></div>
    </div>
</div>
<!--loader end-->

<!--Header Start-->
<header>

    <!--Navigation-->
    <nav class="navbar navbar-top-default navbar-expand-lg navbar-simple nav-box-round">
        <div class="container">
            <a href="javascript:void(0)" title="Logo" class="logo scroll">
                <!--Logo Default-->
                <img src="{{ asset('website/business/2023') }}/innovative/img/logo-white.png" alt="logo" class="logo-light default">
                <!--Logo Sticky-->
                <img src="{{ asset('website/business/2023') }}/innovative/img/logo-black.png" alt="logo" class="logo-dark">

                <!--                <a class="nav-link" href="#home">  For Business</a>-->

            </a>

            <!--Nav Links-->
            <div class="collapse navbar-collapse" id="megaone">
                <div class="navbar-nav ml-auto">
                    <a class="nav-link scroll" href="#home">Home</a>
                    <a class="nav-link scroll" href="#subscription">Subscriptions </a>
                    <a class="nav-link scroll" href="#creative">Digital</a>

                    <a class="nav-link scroll" href="#research"> Research</a>
                    <a class="nav-link scroll" href="#production"> Media</a>
                    <a class="nav-link scroll" href="#ebook"> EBook</a>

                    <a class="nav-link scroll" href="#animation">Animation</a>
                    <a class="nav-link" target="_self" download  href="{{ asset('website/business/2023') }}/innovative/portfolionew.pdf">Portfolio</a>
                </div>
            </div>

            <!--Side Menu Button-->
            <a href="javascript:void(0)" class="d-inline-block sidemenu_btn" id="sidemenu_toggle">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </div>
    </nav>

    <!--Side Nav-->
    <div class="side-menu hidden">
        <div class="inner-wrapper">
            <span class="btn-close" id="btn_sideNavClose"><i></i><i></i></span>
            <nav class="side-nav w-100">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link scroll" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll" href="#subscription">Subscription Courses </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link scroll" href="#creative">Digital Transformation
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link scroll" href="#research"> Scientific Research</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll" href="#production"> Media Production</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll" href="#ebook"> E-Books</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link scroll" href="#animation">Animation Graphics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="_self" download  href="{{ asset('website/business/2023') }}/innovative/portfolionew.pdf">Portfolio</a>
                    </li>

                </ul>
            </nav>

            <div class="side-footer text-white w-100">
                <ul class="social-icons-simple">
                    <li><a class="facebook-text-hvr" href="https://www.facebook.com/igtsgroup"><i class="fab fa-facebook-f"></i> </a> </li>
                    <li><a class="instagram-text-hvr" href="https://www.instagram.com/igtsgroup/"><i class="fab fa-instagram"></i> </a> </li>
                    <li><a class="twitter-text-hvr" href="https://twitter.com/igtsgroup"><i class="fab fa-twitter"></i> </a> </li>
                    <li><a class="linkedin-text-hvr" href="https://www.linkedin.com/company/igtsgroup"><i class="fab fa-linkedin-in"></i> </a> </li>
                </ul>
                <p class="text-white">Copyright © 2023 Health Tourism Future. All rights reserved.</p>
            </div>
        </div>
    </div>
    <a id="close_side_menu" href="javascript:void(0);"></a>
    <!-- End side menu -->

</header>
<!--Header end-->

<!--Single portfolio item one-->
<section class="single-items center-block parallax m-0" id="home" style="background: url({{ asset('website/business/2023') }}/innovative/img/single-portfolio1.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-md-12 center-col">
                <div class="area-heading text-center wow fadeInUp">
                    <h3 class="area-title text-capitalize alt-font text-white mb-2 font-weight-100">
                        Our <strong>Services </strong></h3>
                    <p class="text-white font-weight-300">

                        Subscription Courses ,Digital Transformation ,Scientific Research ,Media Production ,Interactive E-Books ,Animation And Motoin
                        Graphics

                    </p>
                </div>
            </div>
        </div>
    </div>

</section>

<!--Single portfolio item five-->
<section class="single-items center-block parallax text-blue subscription" id="subscription" style="">
    <div class="container">
        <div class="icon-img">
            <img decoding="async" width="300" height="300" src="{{ asset('website/business/2023') }}/innovative/img/icons/Subscription.png" class="circle" alt="">
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-8">
                <div class="area-heading text-left wow text-blue fadeInLeft">
                    <h3 class="area-title text-capitalize alt-font text-blue  mb-2 font-weight-100">
                        <a data-fancybox="group-five" href="innovative/img/single-portfolio5.jpg">Subscription  <strong>Courses</strong></a>
                    </h3>
                    <p class="text-blue">
                        With just one subscription, you can enjoy more than 400 courses in various fields .
                        and enjoy all the new rewards in addition to the platform.
                    </p>


                    <button class="btn btn-transparent-white text-blue btn-rounded btn-large mt-3" type="button" data-toggle="modal" data-target="#myModal" tabindex="-1">Get Now</button>

                </div>
            </div>
        </div>
    </div>
</section>


<!--Single portfolio item two-->
<section class="single-items center-block parallax creative" id="creative"  style="height: auto">
    <div class="container">
        <div class="icon-img">
            <img decoding="async" width="300" height="300" src="{{ asset('website/business/2023') }}/innovative/img/icons/digital-transformation.png" class="circle" alt="">
        </div>
        <div class="row">
            <div class="col-lg-6"></div>
            <div class="col-lg-6 center-col">
                <div class="area-heading text-right wow fadeInRight">
                    <h3 class="area-title text-capitalize alt-font text-white text-white mb-2 font-weight-100">
                        <a class="text-white" data-fancybox="group-two" href="innovative/img/single-portfolio2.jpg">Digital  <strong>transformation</strong></a>
                    </h3>
                    <p class="text-white font-weight-300">
                    <ul class="text-white" style="direction: rtl">
                        <li> ELMs development </li>
                        <li> ELMs design </li>
                        <li> ELMs maintenance </li>
                        <li>  ELMs customization</li>
                        <li>  Subscribed modules</li>
                        <li>  Content & in- structural design </li>
                        <li>  Recording sessions </li>
                    </ul>
                    </p>

                    <button class="text-white btn btn-transparent-white  btn-rounded btn-large mt-3" type="button" data-toggle="modal" data-target="#myModal" tabindex="-1">Get Now</button>

                </div>
            </div>
        </div>
    </div>

</section>

<!--Single portfolio item three-->
<section class="single-items center-block parallax research" style="height: auto;" id="research">
    <div class="container">
        <div class="icon-img">
            <img decoding="async" width="300" height="300" src="{{ asset('website/business/2023') }}/innovative/img/icons/inter-actove-courses.png" class="circle" alt="">
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-8">
                <div class="area-heading text-left wow fadeInLeft">
                    <h3 class="area-title text-capitalize text-blue alt-font text-white mb-2 font-weight-100">
                        <a data-fancybox="group-three" href="innovative/img/single-portfolio3.jpg">Scientific  <strong>Research</strong></a>
                    </h3>
                    <p class="text-blue">
                        1- Research support services: Thesis writing, manuscript writing, manuscript revision, English proofreading, grammatical correction, statistical analysis,
                        journals selection, publishing support,
                        manuscript submission and followup, Plagiarism detection, research analytics training,
                        publishing and writing training, statistical analysis training.
                    </p>
                    <p>
                        2- Medical and Scientific Office services
                        Products identity design, professionally detailed medical content of products,
                        brochures development and design, pamphlets development, consumers' message development and design,
                        medical training for products managers, trade and sales team, pharmacovigilance,
                        health technology assessment solutions.
                    </p>

                    <button class="btn btn-transparent-white text-blue btn-rounded btn-large mt-3" type="button" data-toggle="modal" data-target="#myModal" tabindex="-1">Get Now</button>


                </div>
            </div>
        </div>
    </div>

</section>

<!--Single portfolio item four-->
<section class="single-items center-block parallax production" id="production">
    <div class="container">
        <div class="icon-img">
            <img decoding="async" width="300" height="300" src="{{ asset('website/business/2023') }}/innovative/img/icons/media-production.png" class="circle" alt="">
        </div>
        <div class="row">
            <div class="col-md-12 center-col">
                <div class="area-heading text-right wow fadeInRight">
                    <h3 class="area-title text-capitalize alt-font text-white mb-2 font-weight-100">
                        <a data-fancybox="group-four" class="text-white" href="innovative/img/single-portfolio4.jpg">Media  <strong> Production</strong></a>
                    </h3>

                    <ul class="text-white" style="direction: rtl">
                        <li> Courses Videos </li>
                        <li> Training Videos </li>
                        <li> Documentary Videos </li>
                        <li>  Motion Graphics Videos</li>
                        <li>  Studio Services</li>
                        <li>  Editing Services</li>
                    </ul>

                    <button class="btn btn-transparent-white text-white btn-rounded btn-large mt-3" type="button" data-toggle="modal" data-target="#myModal" tabindex="-1">Get Now</button>

                    <!--                    <a class="btn btn-transparent-white btn-rounded btn-large mt-3" data-fancybox="group-four" href="innovative/img/single-portfolio4.jpg">View More</a>-->
                </div>
            </div>
        </div>
    </div>

</section>


<section class="single-items center-block parallax ebook" id="ebook" style="height: auto" >
    <div class="container">
        <div class="icon-img">
            <img decoding="async" width="300" height="300" src="{{ asset('website/business/2023') }}/innovative/img/icons/ebook.png" class="circle" alt="">
        </div>
        <div class="row">
            <div class="col-md-8 center-col">
                <div class="area-heading text-left wow fadeInLeft">
                    <h3 class="area-title text-capitalize alt-font text-blue mb-2 font-weight-100">
                        <a data-fancybox="group-eight" href="innovative/img/single-portfolio8.jpg"> <strong> E-Books</strong></a>
                    </h3>
                    <p class="text-blue">
                        We produce e-books that are engaging both mentally and physically for readers as they flow from one page to another.
                        That is achieved through adding photos, infographics, shortcuts, videos and many other elements alongside the text.
                        Our interactive e-books can be downloaded to all devices with different operating systems such as, IOS and Android.

                    </p>
                    <button class="btn btn-transparent-white text-blue btn-rounded btn-large mt-3" type="button" data-toggle="modal" data-target="#myModal" tabindex="-1">Get Now</button>

                    <!--                    <a class="btn btn-transparent-white btn-rounded btn-large mt-3" data-fancybox="group-eight" href="innovative/img/single-portfolio8.jpg">View More</a>-->
                </div>
            </div>
        </div>
    </div>
</section>



<!--Single portfolio item six-->
<section class="single-items center-block parallax animation"  id="animation" style="height: auto">
    <div class="container">
        <div class="icon-img">
            <img decoding="async" width="300" height="300" src="{{ asset('website/business/2023') }}/innovative/img/icons/animation.png" class="circle" alt="">
        </div>
        <div class="row">
            <div class="col-md-12 center-col">
                <div class="area-heading text-right wow fadeInRight">
                    <h3 class="area-title text-capitalize alt-font text-white mb-2 font-weight-100">
                        <a data-fancybox="group-six" class="text-white" href="innovative/img/single-portfolio6.jpg">Animation
                            And Motoin
                            <br>
                            <strong>Graphics</strong> </a>
                    </h3>
                    <p class="text-white">

                        Using a combination of animated visuals, infographics and text within the learning materials or videos,
                        and this versatile approach is followed to create a variety of learning experiences through micro-learning bites.
                        In addition, learning concepts are explained using stories and scenarios to become easier to understand and engage with.
                        The interactive visuals we present are sharp and creative ensuring effective learning outcomes.
                    </p>
                    <button class="text-white btn btn-transparent-white  btn-rounded btn-large mt-3" type="button" data-toggle="modal" data-target="#myModal" tabindex="-1">Get Now</button>

                    <!--                    <a class="btn btn-transparent-white btn-rounded btn-large mt-3" data-fancybox="group-six" href="innovative/img/single-portfolio6.jpg">View More</a>-->
                </div>
            </div>
        </div>
    </div>

</section>

<!--Footer Start-->
<section class="bg-light text-center" style="padding: inherit;    background-color: black !important;">
    <h2 class="d-none">hidden</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="footer-social">

                    <div class="container text-center">
                        <img style="height: 100px;padding-top: 30px" src="https://igtsservice.com/website/images/logonewwhite.png" class="footer-image" alt="MEDU Footer Logo">
                        <!--                        <p class="mb-40 white-color footer-content">-->
                        <!--                            Medical training is our passion and focus in IGTS Medical Department, through which we seek to convey the useful knowledge and accumulated experiences of our highly qualified team of instructors with abundant experience, and we are distinguished in the IGTS Medical Department by the dynamism and flexibility of training plans for the various groups benefiting from our services and we are working to develop and harness the best possible resources to produce our programs and courses to learners and trainees. Our slogan in IGTS (Learning with Quality You Deserve), because education is important, so we must deliver this concept to our clients and trainees, along with obtaining their satisfaction and trust.-->
                        <!--                        </p>-->
                        <!--                        <div class="social-links">-->
                        <!--                            <a href="https://www.facebook.com/igtsgroup" target="blank"><img src="{{ asset('website/business/2023') }}/https://igtsservice.com/website/business/new/images/facebook.svg" alt="facebook"></a>-->
                        <!--                            <a href="https://twitter.com/igtsgroup" target="blank"><img src="{{ asset('website/business/2023') }}/https://igtsservice.com/website/business/new/images/twitter.svg" alt="twitter"></a>-->
                        <!--                            <a href="https://www.linkedin.com/company/igtsgroup" target="blank"><img src="{{ asset('website/business/2023') }}/https://igtsservice.com/website/business/new/images/linkedin.svg" alt="linkedin"></a>-->
                        <!--                        </div>-->
                    </div>


                    <ul class="list-unstyled">
                        <li><a class="wow fadeInUp" href="https://www.facebook.com/igtsgroup"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                        <li><a class="wow fadeInDown" href="https://twitter.com/igtsgroup"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a class="wow fadeInDown" href="https://www.linkedin.com/company/igtsgroup"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a></li>
                        <li><a class="wow fadeInUp" href="https://www.instagram.com/igtsgroup/"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a class="wow fadeInDown" href="https://www.youtube.com/channel/UCrvAiaydu8MKL5KMtG6r98Q"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
                <p class="company-about fadeIn">Copyright © 2023 IGTS. All rights reserved.</p>
            </div>
        </div>
    </div>
</section>


<a class="float-button" target="_blank" href="https://wa.me/+971507052494?text=B2b Services">
    <i class="fa fa-whatsapp" aria-hidden="true"></i>
    <span>Message me<span>
</a>


<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <div class="popup">


                    <script>
                        hbspt.forms.create({
                            region: "na1",
                            portalId: "4880007",
                            formId: "5b643cde-f6ad-44c2-9ce5-26132c4cc29b"
                        });
                    </script>


                </div>
            </div>
            <div class="modal-footer" style="justify-content: center;">
                <a class="wp" style="color: #25D366 !important; text-align: center"  href="https://wa.me/+971507052494?text=B2b Services">
                    <i class="fab fa-whatsapp fa-2x"></i>
                    <span  style="text-align:center">Contact us on WhatsApp</span>
                </a>
            </div>
        </div>
    </div>
</div>


<!--Footer End-->

<!--Scroll Top-->
<!--<a class="scroll-top-arrow" href="javascript:void(0);"><i class="fas fa-angle-up"></i></a>-->
<!--Scroll Top End-->

<!-- JavaScript -->
<script src="{{ asset('website/business/2023') }}/vendor/js/bundle.min.js"></script>
<!-- Plugin Js -->
<script src="{{ asset('website/business/2023') }}/vendor/js/jquery.appear.js"></script>
<script src="{{ asset('website/business/2023') }}/vendor/js/jquery.fancybox.min.js"></script>
<script src="{{ asset('website/business/2023') }}/vendor/js/parallaxie.min.js"></script>
<script src="{{ asset('website/business/2023') }}/vendor/js/wow.min.js"></script>
<!-- REVOLUTION JS FILES -->
<script src="{{ asset('website/business/2023') }}/vendor/js/jquery.themepunch.tools.min.js"></script>
<script src="{{ asset('website/business/2023') }}/vendor/js/jquery.themepunch.revolution.min.js"></script>
<!-- SLIDER REVOLUTION EXTENSIONS -->
<script src="{{ asset('website/business/2023') }}/vendor/js/extensions/revolution.extension.actions.min.js"></script>
<script src="{{ asset('website/business/2023') }}/vendor/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="{{ asset('website/business/2023') }}/vendor/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="{{ asset('website/business/2023') }}/vendor/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="{{ asset('website/business/2023') }}/vendor/js/extensions/revolution.extension.migration.min.js"></script>
<script src="{{ asset('website/business/2023') }}/vendor/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="{{ asset('website/business/2023') }}/vendor/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="{{ asset('website/business/2023') }}/vendor/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="{{ asset('website/business/2023') }}/vendor/js/extensions/revolution.extension.video.min.js"></script>
<!-- custom script -->
<script src="{{ asset('website/business/2023') }}/innovative/js/script.js"></script>

</body>
</html>