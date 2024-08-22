<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <meta name="csrf_token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portfolio | MTH</title>
    <meta name="description" content="Mr. Taimoor Hussain - Portfolio">
    <meta name="author" content="https://github.com/taimoorKVD">
    <link rel="shortcut icon" href="{{ asset('website/images/favicon/fav-icon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('website/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('website/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/fonts/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/venobox.css') }}">
    <link rel="stylesheet" href="{{ asset('website/owlcarousel/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('website/owlcarousel/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/base.css') }}"/>
    <link rel="stylesheet" href="{{ asset('website/css/style.css') }}"/>
</head>
<body class="demo-2 loading">

<svg class="hidden">
    <symbol id="icon-arrow" viewBox="0 0 24 24">
        <title>arrow</title>
        <polygon points="6.3,12.8 20.9,12.8 20.9,11.2 6.3,11.2 10.2,7.2 9,6 3.1,12 9,18 10.2,16.8 "/>
    </symbol>
    <symbol id="icon-drop" viewBox="0 0 24 24">
        <title>drop</title>
        <path
            d="M12,21c-3.6,0-6.6-3-6.6-6.6C5.4,11,10.8,4,11.4,3.2C11.6,3.1,11.8,3,12,3s0.4,0.1,0.6,0.3c0.6,0.8,6.1,7.8,6.1,11.2C18.6,18.1,15.6,21,12,21zM12,4.8c-1.8,2.4-5.2,7.4-5.2,9.6c0,2.9,2.3,5.2,5.2,5.2s5.2-2.3,5.2-5.2C17.2,12.2,13.8,7.3,12,4.8z"/>
        <path
            d="M12,18.2c-0.4,0-0.7-0.3-0.7-0.7s0.3-0.7,0.7-0.7c1.3,0,2.4-1.1,2.4-2.4c0-0.4,0.3-0.7,0.7-0.7c0.4,0,0.7,0.3,0.7,0.7C15.8,16.5,14.1,18.2,12,18.2z"/>
    </symbol>
</svg>

<div class="content content--fixed">
    <button class="menu-trigger">+ Explore</button>
</div>
<!-- / END EXPLORE BUTTON -->

<!-- / HOME CONTENT-1 -->
<div id="content-1" class="content content--switch content--switch-current"
     style="background-image: url('{{ asset($home['image']) }}')">
    <h2 class="content__title">{{ $home['title'] }}</h2>
    <div class="content__subtitle">{!! $home['description'] !!}</div>
    @if(count($home['social_link']) > 0)
        <div class="top_social_profile">
            <ul>
                @foreach($home['social_link'] as $socialLink)
                    <li>
                        <a href="{{$socialLink['link']}}" target="_blank" class="top_f_facebook">
                            <img src="{{ asset($socialLink['svg']) }}" alt="{{ $socialLink['link'] }}"/>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<!-- / END HOME CONTENT-1 -->

<!-- / ABOUT CONTENT-2 -->
<div id="content-2" class="content content--switch">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                 data-wow-offset="0">
                <div class="about_img">
                    <img src="{{ asset($about['image']) }}" class="img-fluid" alt="profile-picture"/>
                </div>
            </div><!-- / END COL -->
            <div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s"
                 data-wow-offset="0">
                <div class="about_info">
                    <h4>About Me</h4>
                    <h3>{{ $about['title'] }}</h3>
                    {!! $about['description'] !!}
                    <div class="basic-info">
                        <div class="single-basic-info">
                            <p>Email:
                                <br/>
                                <span style="font-size: 12px !important;"><strong>{{ $about['email'] }}</strong></span>
                            </p>
                        </div>
                        <div class="single-basic-info" style="margin-left: 50px;">
                            <p>Phone:
                                <br/>
                                <span
                                    style="font-size: 12px !important;"><strong>{{ $about['contact'] }}</strong></span>
                            </p>
                        </div>
                        <div class="single-basic-info" style="margin-left: 20px;">
                            <p>Nationality:
                                <br/>
                                <span
                                    style="font-size: 12px !important;"><strong>{{ $about['nationality'] }}</strong></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div><!-- / END COL -->
        </div><!-- / END ROW -->

        @if(count($about['skill']) > 0)
            <div class="row skill_mt">
                <div class="section-title-two">
                    <h2>My skill achievement</h2>
                </div>
                <div class="col-lg-8 offset-lg-2 col-sm-12 col-xs-12">
                    @foreach($about['skill'] as $skill)
                        <div class="progress-bar-linear">
                            <p class="progress-bar-text">
                                {{ $skill['name'] }}
                                <span>{{$skill['percentage']}}%</span>
                            </p>
                            <div class="progress-bar" style="background:white;">
                                <span data-percent="{{$skill['percentage']}}"
                                      style="background-color: {{$skill['color']}}"></span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- / END COL -->
            </div>
            <!-- / END ROW -->
        @endif
    </div>
    <!-- END CONTAINER  -->
</div>
<!-- / END ABOUT CONTENT-2 -->

<!-- / END CONTENT-3 -->
<div id="content-3" class="content content--switch">
    <div class="container">
        <div class="section-title wow zoomIn">
            <h4>Top services</h4>
            <h2>Services I provide.</h2>
        </div>
        @if(count($services) > 0)
            <div class="row">
                @foreach($services as $service)
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="single_feature_one">
                            <div class="sf_top">
                                <span class="ti-flag ss_one"></span>
                                <h2>
                                    <a href="#" data-bs-toggle="modal"
                                       data-bs-target="#service-{{$service['id']}}">{{ $service['title'] }}</a>
                                </h2>
                            </div>
                            <p>{!! $service['description'] !!}</p>
                        </div>
                    </div>
                    <div tabindex="0" class="modal fade" id="service-{{$service['id']}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">{{ $service['title'] }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset($service['image']) }}" class="img-fluid"
                                         alt="{{ asset($service['image']) }}"/>
                                    <ul>
                                        @forelse($service['detail'] as $detail)
                                            <li>
                                                <p>{{ $detail['value'] }}</p>
                                            </li>
                                        @empty
                                            <p style="text-align: center">No detail found.</p>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    @endif
    <!-- END ROW -->
    </div>
    <!-- END CONTAINER -->

    <div class="container d-none">
        <div class="row">
            <div class="col-lg-12">
                <div id="testimonial-slider" class="owl-carousel">
                    <div class="testimonial">
                        <p class="description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam justo neque, aliquet sit
                            amet elementum vel vehicula.
                        </p>
                        <div class="testimonial-content">
                            <div class="pic"><img src="{{ asset('website/images/img-1.jpg') }}" class="img-fluid"
                                                  alt=""></div>
                            <h3 class="title">Mark Linomi</h3>
                            <span class="post">Mr. Taimoor Hussain INC</span>
                        </div>
                    </div>
                    <div class="testimonial">
                        <p class="description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam justo neque, aliquet sit
                            amet elementum vel vehicula.
                        </p>
                        <div class="testimonial-content">
                            <div class="pic"><img src="{{ asset('website/images/img-2.jpg') }}" class="img-fluid"
                                                  alt=""></div>
                            <h3 class="title">Amira Yerden</h3>
                            <span class="post">Mr. Taimoor Hussain INC</span>
                        </div>
                    </div>
                    <div class="testimonial">
                        <p class="description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam justo neque, aliquet sit
                            amet elementum vel vehicula.
                        </p>
                        <div class="testimonial-content">
                            <div class="pic"><img src="{{ asset('website/images/img-3.jpg') }}" class="img-fluid"
                                                  alt=""></div>
                            <h3 class="title">Steve Thomas</h3>
                            <span class="post">Mr. Taimoor Hussain INC</span>
                        </div>
                    </div>
                    <div class="testimonial">
                        <p class="description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam justo neque, aliquet sit
                            amet elementum vel vehicula.
                        </p>
                        <div class="testimonial-content">
                            <div class="pic"><img src="{{ asset('website/images/img-4.jpg') }}" class="img-fluid"
                                                  alt=""></div>
                            <h3 class="title">Marina Mojo</h3>
                            <span class="post">Mr. Taimoor Hussain INC</span>
                        </div>
                    </div>
                    <div class="testimonial">
                        <p class="description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam justo neque, aliquet sit
                            amet elementum vel vehicula.
                        </p>
                        <div class="testimonial-content">
                            <div class="pic"><img src="{{ asset('website/images/img-1.jpg') }}" class="img-fluid"
                                                  alt=""></div>
                            <h3 class="title">Fennouni Ayoub</h3>
                            <span class="post">Mr. Taimoor Hussain INC</span>
                        </div>
                    </div>
                </div>
            </div><!-- END COL-->
        </div><!-- END ROW -->
    </div>
    <!-- END CONTAINER -->
</div>
<!-- / END CONTENT-3 -->

<div id="content-4" class="content content--switch">
    <div class="container">
        <div class="section-title">
            <h4>Portfolio</h4>
            <h2>Recent Works</h2>
        </div>
        @if(count($portfolios) > 0)
            <div class="row portfolio_item">
                @foreach($portfolios as $portfolio)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="box">
                            <img src="{{ asset($portfolio['image']) }}" alt="{{ asset($portfolio['image']) }}">
                            <div class="box-content">
                                <h3 class="title">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#project-{{$portfolio['id']}}">
                                        {{ asset($portfolio['title']) }}
                                    </a>
                                </h3>
                                <span class="port-cat">{{ implode(', ', $portfolio['stacks']) }}</span>
                                <a href="{{ asset($portfolio['image']) }}" class="port-icon lightbox"
                                   data-gall="gall-work"><i
                                        class="ti-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div tabindex="0" class="modal fade" id="project-{{$portfolio['id']}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">{{ ucfirst($portfolio['title']) }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset($portfolio['image']) }}" class="img-fluid" alt="{{ asset($portfolio['image']) }}"/>
                                    {!! $portfolio['description'] !!}
                                    <ul class="list-unstyled project-list">
                                        <li><label>Client : </label> {{ ucfirst($portfolio['client']) }}</li>
                                        <li><label>Category :</label> {{ $portfolio['category'] }}</li>
                                        <li><label>Date : </label> {{ $portfolio['date'] }}</li>
                                        <li><label>Project Url : </label> <a href="{{ $portfolio['url'] }}" target="_blank">{{ $portfolio['url'] }}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                @endforeach
            </div>
        @else
            <div class="d-flex justify-content-center">
                <img src="{{ asset('website/images/portfolio/under-construction.png') }}"
                     alt="{{ asset('website/images/portfolio/under-construction.png') }}">
            </div>
    @endif
    <!-- END ROW -->
    </div>
    <!-- END CONTAINER  -->
</div>
<!-- / END CONTENT-4 -->

<div id="content-5" class="content content--switch">
    <div class="container">
        <div class="section-title">
            <h4>News</h4>
            <h2>My latest Blog</h2>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                 data-wow-offset="0">
                <div class="single_blog">
                    <img src="{{ asset('website/images/blog/1.jpg') }}" class="img-fluid" alt="image"/>
                    <div class="content_box">
                        <span>Sep 15, 2023 | <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#blogModal">Design</a></span>
                        <h2><a href="#" data-bs-toggle="modal" data-bs-target="#blogModal">Autumn is a second spring
                                when every leaf is a flower</a></h2>
                        <p>Because when a visitor first lands on your website stranger They have to get to know you in
                            order to want.</p>
                    </div>
                </div>
            </div><!-- END COL-->
            <div class="col-lg-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                 data-wow-offset="0">
                <div class="single_blog">
                    <img src="{{ asset('website/images/blog/2.jpg') }}" class="img-fluid" alt="image"/>
                    <div class="content_box">
                        <span>Sep 16, 2023 | <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#blogModal2">Photo</a></span>
                        <h2><a href="#" data-bs-toggle="modal" data-bs-target="#blogModal2">Never let your memories be
                                greater than your dreams</a></h2>
                        <p>Because when a visitor first lands on your website stranger They have to get to know you in
                            order to want.</p>
                    </div>
                </div>
            </div><!-- END COL-->
            <div class="col-lg-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s"
                 data-wow-offset="0">
                <div class="single_blog">
                    <img src="{{ asset('website/images/blog/3.jpg') }}" class="img-fluid" alt="image"/>
                    <div class="content_box">
                        <span>Sep 17, 2023 | <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#blogModal3">Marketing</a></span>
                        <h2><a href="#" data-bs-toggle="modal" data-bs-target="#blogModal3">Self-observation is the
                                first step of inner unfolding</a></h2>
                        <p>Because when a visitor first lands on your website stranger They have to get to know you in
                            order to want.</p>
                    </div>
                </div>
            </div><!-- END COL-->
            <div tabindex="0" class="modal fade" id="blogModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5">Full Content</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset('website/images/blog/1.jpg') }}" class="img-fluid" alt=""/>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer porttitor massa sed
                                velit egestas vulputate. Morbi turpis tellus, porta in cursus at, finibus vitae dui. Nam
                                mollis quam a sem iaculis euismod. Pellentesque habitant morbi tristique senectus et
                                netus et malesuada fames ac turpis egestas. Sed ac pharetra justo, vel dapibus tortor.
                                Etiam laoreet imperdiet varius.</p>

                            <p>Nam mollis quam a sem iaculis euismod. Pellentesque habitant morbi tristique senectus et
                                netus et malesuada fames ac turpis egestas. Sed ac pharetra justo, vel dapibus tortor.
                                Etiam laoreet imperdiet varius.</p>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.END MODAL -->
            <div tabindex="0" class="modal fade" id="blogModal2">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5">Full Content</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset('website/images/blog/3.jpg') }}" class="img-fluid" alt=""/>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer porttitor massa sed
                                velit egestas vulputate. Morbi turpis tellus, porta in cursus at, finibus vitae dui. Nam
                                mollis quam a sem iaculis euismod. Pellentesque habitant morbi tristique senectus et
                                netus et malesuada fames ac turpis egestas. Sed ac pharetra justo, vel dapibus tortor.
                                Etiam laoreet imperdiet varius.</p>

                            <p>Nam mollis quam a sem iaculis euismod. Pellentesque habitant morbi tristique senectus et
                                netus et malesuada fames ac turpis egestas. Sed ac pharetra justo, vel dapibus tortor.
                                Etiam laoreet imperdiet varius.</p>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.END MODAL -->
            <div tabindex="0" class="modal fade" id="blogModal3">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5">Full Content</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset('website/images/blog/3.jpg') }}" class="img-fluid" alt=""/>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer porttitor massa sed
                                velit egestas vulputate. Morbi turpis tellus, porta in cursus at, finibus vitae dui. Nam
                                mollis quam a sem iaculis euismod. Pellentesque habitant morbi tristique senectus et
                                netus et malesuada fames ac turpis egestas. Sed ac pharetra justo, vel dapibus tortor.
                                Etiam laoreet imperdiet varius.</p>

                            <p>Nam mollis quam a sem iaculis euismod. Pellentesque habitant morbi tristique senectus et
                                netus et malesuada fames ac turpis egestas. Sed ac pharetra justo, vel dapibus tortor.
                                Etiam laoreet imperdiet varius.</p>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.END MODAL -->
        </div><!-- / END ROW -->
    </div><!-- END CONTAINER  -->
</div>
<!-- / END CONTENT-5 -->

<div id="content-6" class="content content--switch">
    <div class="container">
        <div class="row add_mb text-center">
            <div class="col-lg-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                 data-wow-offset="0">
                <div class="single_address">
                    <i class="ti-map"></i>
                    <h4>Our Location</h4>
                    <p>{{ $about['address'] }}</p>
                </div>
            </div><!-- END COL -->
            <div class="col-lg-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s"
                 data-wow-offset="0">
                <div class="single_address sabr">
                    <i class="ti-mobile"></i>
                    <h4>Telephone</h4>
                    <p>{{ $about['contact'] }}</p>
                </div>
            </div><!-- END COL -->
            <div class="col-lg-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s"
                 data-wow-offset="0">
                <div class="single_address">
                    <i class="ti-email"></i>
                    <h4>Send email</h4>
                    <p>{{ $about['email'] }}</p>
                </div>
            </div>
            <!-- END COL -->
        </div>
        <!--- END ROW -->
    </div>
    <!--- END CONTAINER -->
    <div class="container">
        <div class="section-title-two">
            <h2>Send your message.</h2>
        </div>
        <div class="row">
            <div class="offset-lg-1 col-lg-10 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s"
                 data-wow-delay="0.2s" data-wow-offset="0">
                <div class="contact">
                    <form id="contact-form" class="form" name="enq">
                        {{ csrf_token() }}
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" id="name" name="name" class="form-control"
                                       placeholder="Enter your name...">
                                <div class="invalid-feedback name mb-3"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" id="email" name="email" class="form-control"
                                       placeholder="Enter your email...">
                                <div class="invalid-feedback email mb-3"></div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="subject">Subject <span class="text-danger">*</span></label>
                                <input type="text" id="subject" name="subject" class="form-control"
                                       placeholder="Give us a brief subject line...">
                                <div class="invalid-feedback subject mb-3"></div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="message">Message <span class="text-danger">*</span></label>
                                <textarea rows="6" id="message" name="message" class="form-control"
                                          placeholder="Write your message or inquiry here..."></textarea>
                                <div class="text-danger invalid-feedback message mb-3"></div>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" value="Send message" name="submit" id="submitButton"
                                        class="home_btn" title="Submit Your Message!">Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- END COL  -->
        </div><!-- END ROW -->
    </div><!--- END CONTAINER -->
</div>
<!-- / END CONTENT-6 -->

<!-- START NAV -->
<nav class="grim">
    <div class="grim__item">
        <div class="grim__item-bg grim__item-bg--1"></div>
    </div>
    <div class="grim__item">
        <div class="grim__item-bg grim__item-bg--2"></div>
    </div>
    <div class="grim__item">
        <div class="grim__item-bg grim__item-bg--3"></div>
        <div class="grim__item-content">
            <div class="grim__item-inner">
                <button class="menu-trigger menu-trigger--close">- Close</button>
            </div>
        </div>
    </div><!-- / END CLOSE BUTTON -->
    <div class="grim__item">
        <div class="grim__item-bg grim__item-bg--4"></div>
    </div>
    <div class="grim__item">
        <div class="grim__item-bg grim__item-bg--5"></div>
        <a href="#content-1" class="grim__link grim__item-content">
            <div class="grim__item-inner">
                <h3 class="grim__item-title">Home</h3>
            </div>
        </a>
    </div><!-- / END CONTENT-1 -->
    <div class="grim__item">
        <div class="grim__item-bg grim__item-bg--6"></div>
        <div class="grim__item-img grim__item-img--1"></div>
        <a href="#content-5" class="grim__link grim__item-content">
            <div class="grim__item-inner">
                <h3 class="grim__item-title">News</h3>
                <span class="grim__item-desc">My latest Blog</span>
            </div>
        </a>
        <div class="grim__item-bg grim__item-bg-cover grim__item-bg--6"></div>
    </div><!-- / END CONTENT-2 -->
    <div class="grim__item">
        <div class="grim__item-bg grim__item-bg--7"></div>
        <div class="grim__item-img grim__item-img--2"></div>
        <a href="#content-3" class="grim__link grim__item-content">
            <div class="grim__item-inner">
                <h3 class="grim__item-title">Services</h3>
                <span class="grim__item-desc">Service I provide</span>
            </div>
        </a>
        <div class="grim__item-bg grim__item-bg-cover grim__item-bg--7"></div>
    </div><!-- / END CONTENT-3 -->
    <div class="grim__item">
        <div class="grim__item-bg grim__item-bg--8"></div>
        <div class="grim__item-img grim__item-img--3"></div>
        <a href="#content-6" class="grim__link grim__item-content">
            <div class="grim__item-inner">
                <h3 class="grim__item-title">Contact</h3>
                <span class="grim__item-desc">Get In touch</span>
            </div>
        </a>
        <div class="grim__item-bg grim__item-bg-cover grim__item-bg--8"></div>
    </div><!-- / END CONTENT-4 -->
    <div class="grim__item">
        <div class="grim__item-bg grim__item-bg--9"></div>
        <div class="grim__item-img grim__item-img--4"></div>
        <a href="#content-2" class="grim__link grim__item-content">
            <div class="grim__item-inner">
                <h3 class="grim__item-title">About</h3>
                <span class="grim__item-desc">Know me more</span>
            </div>
        </a>
        <div class="grim__item-bg grim__item-bg-cover grim__item-bg--9"></div>
    </div><!-- / END CONTENT-5 -->
    <div class="grim__item">
        <div class="grim__item-bg grim__item-bg--10"></div>
        <div class="grim__item-img grim__item-img--5"></div>
        <a href="#content-4" class="grim__link grim__item-content">
            <div class="grim__item-inner">
                <h3 class="grim__item-title">Portfolio</h3>
                <span class="grim__item-desc">My latest Work</span>
            </div>
        </a>
        <div class="grim__item-bg grim__item-bg-cover grim__item-bg--10"></div>
    </div><!-- / END CONTENT-6 -->
</nav>
<!-- / END NAV -->

<!-- All jQuery -->
<script src="{{ asset('website/js/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('website/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('website/js/script.js') }}"></script>
<script src="{{ asset('website/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('website/js/anime.min.js') }}"></script>
<script src="{{ asset('website/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('website/owlcarousel/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('website/js/jquery.mixitup.js') }}"></script>
<script src="{{ asset('website/js/jquery.appear.js') }}"></script>
<script src="{{ asset('website/js/venobox.min.js') }}"></script>
<script src="{{ asset('website/js/menu.js') }}"></script>
<script src="{{ asset('website/js/sweetalert2.js') }}"></script>
<script>document.documentElement.className = "js";
    var supportsCssVars = function () {
        var e, t = document.createElement("style");
        return t.innerHTML = "root: { --tmp-var: bold; }", document.head.appendChild(t), e = !!(window.CSS && window.CSS.supports && window.CSS.supports("font-weight", "var(--tmp-var)")), t.parentNode.removeChild(t), e
    };
    supportsCssVars() || alert("Please view this demo in a modern browser that supports CSS Variables.");
</script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
    $(document).ready(function () {
        $('#contact-form').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('website.contact.store') }}',
                method: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                data: $(this).serialize(),
                success: function (response) {
                    Toast.fire({
                        icon: "success",
                        title: response.message
                    });
                    $('#contact-form')[0].reset();
                },
                error: function (xhr) {
                    let errors = xhr.responseJSON.errors;
                    if (errors) {
                        return $.each(errors, function (key, value) {
                            $(`#${key}`).addClass('is-invalid');
                            $(`.${key}`).text(value[0]);
                        });
                    }
                    Toast.fire({
                        icon: "error",
                        title: "Something went wrong. Please try again later!"
                    });
                }
            });
        });
        $(document).on('keyup', '#name, #email, #subject, #message', function () {
            $(this).removeClass('is-invalid');
        });
    });
</script>
</body>
</html>
