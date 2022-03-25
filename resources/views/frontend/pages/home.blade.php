@extends('frontend.layout.template')

@section('title') <title>Blog Site</title> @endsection

@section('body-content')

    <div class="site-wrapper">
        <div class="main-overlay"></div>
        @include('frontend.includes.topmenu')



        <!-- section starts  -->
        <section id="hero">
            <div class="container-xl">
                <div class="row gy-4">
                    <div class="col-lg-8">

                        @foreach($onepost as $fiturePost)
                        <div class="post featured-post-lg">
                            <div class="details clearfix">
                                <a href="#" class="category-badge">{{$fiturePost->category->name}}</a>
                                <h2 class="post-title">
                                    <a href="{{route('detailspost', $fiturePost->slug)}}">{{$fiturePost->name}}</a>
                                </h2>
                                <ul class="meta list-inline mb-0">
                                    <li class="list-inline-item">
                                        <a href="#">Author : {{$fiturePost->userInfo->name}}</a>
                                    </li>
                                    <li class="list-inline-item">Date : {{ $fiturePost->created_at->format('M d , Y') }}</li>
                                </ul>
                            </div>
                            <a href="#">
                                <div class="thumb rounded">
                                   
                                    <div class="inner data-bg-image" data-bg-image="{{asset('backend/img/blogpost/' . $fiturePost->thumnail)}}">
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-lg-4">
                    @include('frontend.includes.right-sidebar')
                    </div>
                </div>
            </div>
        </section>

        <!-- main content  -->

        <section class="main-content">
            <div class="container-xl">
                <div class="row gy-4">

                    <!-- left part 1st section  -->
                    <div class="col-lg-8">
                        <div class="section-header">
                            <h3 class="section-title">Editor's Pick</h3>
                        </div>

                        <div class="padding-30 rounded bordered">
                            <div class="row gy-5">
                                <div class="col-sm-6">
                                    <!-- post  -->
                                    @foreach($onepost as $postOne)
                                    <div class="post">
                                        <div class="thumb rounded">
                                            <a href="#" class="category-badge position-absolute">{{$postOne->category->name}}</a>
                                            <span class="post-format">
                                                <i class="icon-picture"></i>
                                            </span>
                                            <a href="{{route('detailspost', $postOne->slug)}}">
                                                <div class="inner">
                                                    <img src="{{asset('backend/img/blogpost/' . $postOne->thumnail)}}" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <ul class="meta list-inline mt-4 mb-0">
                                            <li class="list-inline-item">
                                                <a href="#">
                                                    <img class="author" src="{{asset('backend/img/user/'. $postOne->userInfo->profile)}}" style='width:40px; height:40px; border-radius:50%' alt="">
                                                    {{$postOne->userInfo->name}}
                                                </a>
                                            </li>
                                            <li class="list-inline-item">{{ $postOne->created_at->format('M d, Y') }}</li>
                                        </ul>
                                        <h5 class="post-title mb-3 mt-3">
                                            <a href="{{route('detailspost', $postOne->slug)}}">{{$postOne->name}}</a>
                                        </h5>
                                        <p class="excerpt mb-0">
                                        {{ substr(strip_tags($postOne->descrip),0,300) }}

                                        </p>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-sm-6">
                                    @foreach( $sidepost as $postFore )
                                    <div class="post post-list-sm square">
                                        <div class="thumb rounded">
                                            <a href="{{route('detailspost', $postFore->slug)}}">
                                                <div class="inner">
                                                    <img src="{{asset('backend/img/blogpost/'. $postFore->thumnail)}}" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0">
                                                <a href="{{route('detailspost', $postFore->slug)}}">
                                                    {{ $postFore->name}}
                                                </a>
                                            </h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">{{ $postFore->created_at->format('M d, Y') }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    @endforeach
                                    

                                </div>

                            </div>
                        </div>

                        <div class="spacer" data-height="50"></div>

                        <div class="section-header">
                            <h3 class="section-title">Trending</h3>
                        </div>

                        <div class="padding-30 rounded bordered">
                            <div class="row gy-5">
                                <div class="col-sm-6">
                                    @foreach( App\Models\Post::where('cat_id',5)->where('status',1)->latest()->limit(1)->get() as $webDesign )
                                    <div class="post">
                                        <div class="thumb rounded">
                                            <a href="#" class="category-badge position-absolute">{{$webDesign->category->name}}</a>
                                            <span class="post-format">
                                                <i class="icon-picture"></i>
                                            </span>
                                            <a href="{{route('detailspost', $webDesign->slug)}}">
                                                <div class="inner">
                                                    <img src="{{asset('backend/img/blogpost/' . $webDesign->thumnail)}}" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <ul class="meta list-inline mt-4 mb-0">
                                            <li class="list-inline-item">
                                                <a href="#">
                                                    <img src="{{asset('backend/img/user/' . $webDesign->userInfo->profile)}}"  class="author" alt="" style='width:30px; height:30px; border-radius:50%'>
                                                    {{$webDesign->userInfo->name}}
                                                </a>
                                            </li>
                                            <li class="list-inline-item">{{ $webDesign->created_at->format('M d, Y') }}</li>
                                        </ul>
                                        <h5 class="post-title mb-3 mt-3">
                                            <a href="{{route('detailspost', $webDesign->slug)}}">{{$webDesign->name}}</a>
                                        </h5>
                                        <p class="excerpt mb-0">
                                        {{ substr(strip_tags($webDesign->descrip),0,220) }}
                                        </p>
                                    </div>
                                    @endforeach

                                    @foreach( App\Models\Post::where('cat_id',5 )->where('status',1)->latest()->limit(2)->get() as $webDesTo )
                                    <div class="post post-list-sm square before-seperator">
                                        <div class="thumb rounded">
                                            <a href="{{route('detailspost', $webDesTo->slug)}}">
                                                <div class="inner">
                                                    <img src="{{asset('backend/img/blogpost/'.$webDesTo->thumnail)}}" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0">
                                                <a href="{{route('detailspost', $webDesTo->slug)}}">{{$webDesTo->name}}</a>
                                            </h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">{{ $webDesTo->created_at->format('M d, Y') }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-sm-6">
                                    @foreach( App\Models\Post::where('cat_id',6)->where('status',1)->latest()->limit(1)->get() as $webDesign )
                                    <div class="post">
                                        <div class="thumb rounded">
                                            <a href="#" class="category-badge position-absolute">{{$webDesign->category->name}}</a>
                                            <span class="post-format">
                                                <i class="icon-picture"></i>
                                            </span>
                                            <a href="{{route('detailspost', $webDesign->slug)}}">
                                                <div class="inner">
                                                    <img src="{{asset('backend/img/blogpost/' . $webDesign->thumnail)}}" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <ul class="meta list-inline mt-4 mb-0">
                                            <li class="list-inline-item">
                                                <a href="#">
                                                    <img src="{{asset('backend/img/user/' . $webDesign->userInfo->profile)}}"  class="author" alt="" style='width:30px; height:30px; border-radius:50%'>
                                                    {{$webDesign->userInfo->name}}
                                                </a>
                                            </li>
                                            <li class="list-inline-item">{{ $webDesign->created_at->format('M d, Y') }}</li>
                                        </ul>
                                        <h5 class="post-title mb-3 mt-3">
                                            <a href="{{route('detailspost', $webDesign->slug)}}">{{$webDesign->name}}</a>
                                        </h5>
                                        <p class="excerpt mb-0">
                                        {{ substr(strip_tags($webDesign->descrip),0,220) }}
                                        </p>
                                    </div>
                                    @endforeach

                                    @foreach( App\Models\Post::where('cat_id',6 )->where('status',1)->latest()->limit(2)->get() as $webDesTo )
                                    <div class="post post-list-sm square before-seperator">
                                        <div class="thumb rounded">
                                            <a href="{{route('detailspost', $webDesTo->slug)}}">
                                                <div class="inner">
                                                    <img src="{{asset('backend/img/blogpost/'.$webDesTo->thumnail)}}" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0">
                                                <a href="{{route('detailspost', $webDesTo->slug)}}">{{$webDesTo->name}}</a>
                                            </h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">{{ $webDesTo->created_at->format('M d, Y') }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                               
                            </div>
                        </div>
                        <div class="spacer" data-height="50"></div>

                        <div class="section-header">
                            <h3 class="section-title">Inspiration</h3>
                            <div class="slick-arrows-top">
                                <buttton class="carousel-topNav-prev slick-custom-buttons" type="button"
                                    data-role="none" aria-label="Previous">
                                    <i class="icon-arrow-left"></i>
                                </buttton>
                                <buttton class="carousel-topNav-next slick-custom-buttons" type="button"
                                    data-role="none" aria-label="Next">
                                    <i class="icon-arrow-right"></i>
                                </buttton>
                            </div>
                        </div>

                        <div class="row post-carousel-twoCol post-carousel">
                            @foreach( App\Models\Post::orderby('name','desc')->where('status',1)->latest()->limit(4)->get() as $posts )
                            <div class="post post-over-content col-md-6">
                                <div class="details clearfix">
                                    <a href="#" class="category-badge">{{$posts->category->name}}</a>
                                    <h4 class="post-title">
                                        <a href="{{route('detailspost', $posts->slug)}}">{{$posts->name}}</a>
                                    </h4>
                                    <ul class="meta list-inline mb-0">
                                        <li class="list-inline-item">
                                            <a href="#">{{$posts->userInfo->name}}</a>
                                        </li>
                                        <li class="list-inline-item">{{ $posts->created_at->format('M d, Y') }}</li>
                                    </ul>
                                </div>
                                <a href="#">
                                    <div class="thumb rounded">
                                        <div class="inner">
                                            <img src="{{asset('backend/img/blogpost/'. $posts->thumnail)}}" alt="">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach

                            
                        </div>


                        <div class="spacer" data-height="50"></div>

                        <div class="section-header">
                            <h3 class="section-title">Latest Posts</h3>
                        </div>

                        <div class="padding-30 rounded bordered">
                            <div class="row">
                                @foreach( App\Models\Post::orderby('name','desc')->where('status',1)->latest()->limit(4)->get() as $posts )
                                <div class="col-md-12 col-sm-6">
                                    <!-- post  -->
                                    <div class="post post-list clearfix">
                                        <div class="thumb rounded">
                                            <a href="{{route('detailspost', $posts->slug)}}">
                                                <div class="inner">
                                                    <img src="{{asset('backend/img/blogpost/'. $posts->thumnail)}}" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details">
                                            <ul class="meta list-inline mb-3">
                                                <li class="list-inline-item">
                                                    <a href="#">
                                                        <img src="{{asset('backend/img/user/'. $posts->userInfo->profile)}}" style='width:30px; height:30px; border-radius:50%' class="author" alt="">
                                                        {{$posts->userInfo->name}}
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#">{{$posts->category->name}}</a>
                                                </li>
                                                <li class="list-inline-item">{{ $postFore->created_at->format('M d, Y') }}</li>
                                            </ul>
                                            <h5 class="post-tile">
                                                <a href="{{route('detailspost', $posts->slug)}}">
                                                    {{$posts->name}}
                                                </a>
                                            </h5>
                                            <p class="excerpt mb-0">
                                            {{ substr(strip_tags($posts->descrip),0,150)}}
                                            </p>
                                            <div class="post-bottom clearfix d-flex align-items-center">
                                                <div class="social-share me-auto">
                                                    <button class="toggle-button icon-share"></button>
                                                    <ul class="icons list-unstyled list-inline mb-0">
                                                        <li class="list-inline-item">
                                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="#"><i class="fab fa-pinterest"></i></a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="#"><i class="fab fa-telegram-plane"></i></a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="#"><i class="far fa-envelope"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="more-button float-end">
                                                    <a href="#"><span class="icon-options"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                               

                                <div class="text-center">
                                    <button class="btn btn-simple">Load More</button>
                                </div>
                            </div>
                        </div>
                        <!-- left part over here  -->
                    </div>
                    <!-- right part starts from here  -->

                    <div class="col-lg-4">
                        <div class="sidebar">
                            <div class="widget rounded">
                                <div class="widget-about text-center">
                                    <img src="{{asset('img/Rentsheba-Logo-01.png')}}" alt="" width="100px" class="logo">
                                    <p class="mb-4" style="text-align: justify;">This is Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit.
                                        Dolores tempora accusantium culpa deleniti nesciunt repellat quisquam quos vero.
                                        Esse itaque est optio nostrum porro quisquam nihil reprehenderit fugiat enim
                                        non.</p>
                                    <ul class="social-icons list-unstyled list-inline mb-0">
                                        <li class="list-inline-item">
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#"><i class="fab fa-pinterest"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#"><i class="fab fa-telegram-plane"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#"><i class="far fa-envelope"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="widget rounded">
                                <div class="widget-header text-center">
                                    <h3 class="widget-title">Popular Posts</h3>
                                </div>
                                <div class="widget-content">
                                    <div class="post post-list-sm circle">
                                        <div class="thumb circle">
                                            <span class="number">1</span>
                                            <a href="#">
                                                <div class="inner">
                                                    <img src="{{asset('frontend')}}/images/posts/tabs-1.jpg" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0">
                                                <a href="#">Bitcoin price raise after sudden fall</a>
                                            </h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">30 May 2021</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="post post-list-sm circle">
                                        <div class="thumb circle">
                                            <span class="number">2</span>
                                            <a href="#">
                                                <div class="inner">
                                                    <img src="{{asset('frontend')}}/images/posts/tabs-2.jpg" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0">
                                                <a href="#">Clubhouse Crosses 1Mn Downloads On Play Store</a>
                                            </h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">30 May 2021</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="post post-list-sm circle">
                                        <div class="thumb circle">
                                            <span class="number">3</span>
                                            <a href="#">
                                                <div class="inner">
                                                    <img src="{{asset('frontend')}}/images/posts/tabs-3.jpg" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0">
                                                <a href="#">Check current Gold Price of 24k</a>
                                            </h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">30 May 2021</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="post post-list-sm circle">
                                        <div class="thumb circle">
                                            <span class="number">4</span>
                                            <a href="#">
                                                <div class="inner">
                                                    <img src="{{asset('frontend')}}/images/posts/tabs-4.png" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0">
                                                <a href="#">Improve your mails with Grammarly</a>
                                            </h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">30 May 2021</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="widget rounded">
                                <div class="widget-header text-center">
                                    <h3 class="widget-title">Explore Topics</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="list">
                                        <li><a href="#">Trending</a><span>(7)</span></li>
                                        <li><a href="#">Politics</a><span>(5)</span></li>
                                        <li><a href="#">Fashion</a><span>(1)</span></li>
                                        <li><a href="#">Lifestyle</a><span>(9)</span></li>
                                        <li><a href="#">Inspiration</a><span>(2)</span></li>
                                        <li><a href="#">Culture</a><span>(4)</span></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="widget rounded">
                                <div class="widget-header text-center">
                                    <h3 class="widget-title">Newsletter</h3>
                                </div>
                                <div class="widget-content">
                                    <span class="newsletter-headline text-center mb-3">Join 50,000 subscribers</span>
                                    <form action="#">
                                        <div class="mb-2">
                                            <input type="email" class="form-control w-100 text-center"
                                                placeholder="Email address...">
                                        </div>
                                        <button class="btn btn-default btn-full">Sign Up</button>

                                    </form>
                                    <span class="newsletter-privacy text-center mt-3">
                                        By signing up, you agree to our <a href="#">Privacy policy</a>
                                    </span>
                                </div>
                            </div>

                            <div class="widget rounded">
                                <div class="widget-header text-center">
                                    <h3 class="widget-title">COVID-19</h3>
                                </div>
                                <div class="widget-content">
                                    <div class="post-carousel-widget">

                                        <div class="post post-carousel">
                                            <div class="thumb rounded">
                                                <a href="#" class="category-badge position-absolute">COVID-19</a>
                                                <a href="#">
                                                    <div class="inner">
                                                        <img src="{{asset('frontend')}}/images/posts/wid-1.jpg" alt="">
                                                    </div>
                                                </a>
                                            </div>
                                            <h5 class="post-title mb-0 mt-4">
                                                <a href="#">10 Things to do for being safe of corona</a>
                                            </h5>
                                            <ul class="meta list-inline mt-2 mb-0">
                                                <li class="list-inline-item">
                                                    <a href="#">Techie Coder</a>
                                                </li>
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                        </div>
                                        <div class="post post-carousel">
                                            <div class="thumb rounded">
                                                <a href="#" class="category-badge position-absolute">COVID-19</a>
                                                <a href="#">
                                                    <div class="inner">
                                                        <img src="{{asset('frontend')}}/images/posts/wid-2.jpg" alt="">
                                                    </div>
                                                </a>
                                            </div>
                                            <h5 class="post-title mb-0 mt-4">
                                                <a href="#">Wash your hands after certain interval of time.</a>
                                            </h5>
                                            <ul class="meta list-inline mt-2 mb-0">
                                                <li class="list-inline-item">
                                                    <a href="#">Techie Coder</a>
                                                </li>
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                        </div>
                                        <div class="post post-carousel">
                                            <div class="thumb rounded">
                                                <a href="#" class="category-badge position-absolute">COVID-19</a>
                                                <a href="#">
                                                    <div class="inner">
                                                        <img src="{{asset('frontend')}}/images/posts/wid-3.jpg" alt="">
                                                    </div>
                                                </a>
                                            </div>
                                            <h5 class="post-title mb-0 mt-4">
                                                <a href="#">Get vaccinated to stop the chain of corona</a>
                                            </h5>
                                            <ul class="meta list-inline mt-2 mb-0">
                                                <li class="list-inline-item">
                                                    <a href="#">Techie Coder</a>
                                                </li>
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="slick-arrows-bot">
                                        <buttton class="carousel-botNav-prev slick-custom-buttons" type="button"
                                            data-role="none" aria-label="Previous">
                                            <i class="icon-arrow-left"></i>
                                        </buttton>
                                        <buttton class="carousel-botNav-next slick-custom-buttons" type="button"
                                            data-role="none" aria-label="Next">
                                            <i class="icon-arrow-right"></i>
                                        </buttton>
                                    </div>

                                </div>
                            </div>


                            <div class="widget rounded">
                                <div class="widget-header text-center">
                                    <h3 class="widget-title">Tag Clouds</h3>
                                </div>
                                <div class="widget-content">
                                    <a href="#" class="tag">#Trending</a>
                                    <a href="#" class="tag">#Cooking</a>
                                    <a href="#" class="tag">#Featured</a>
                                    <a href="#" class="tag">#Beauty</a>
                                    <a href="#" class="tag">#Finance</a>
                                    <a href="#" class="tag">#Celebrities</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="instagram">
            <div class="container-xl">
                <a href="#" class="btn btn-default btn-instagram">Instagram</a>
                <div class="instagram-feed d-flex flex-wrap">
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="{{asset('frontend')}}/images/insta/insta-1.jpg" alt="">
                        </a>
                    </div>
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="{{asset('frontend')}}/images/insta/insta-2.jpg" alt="">
                        </a>
                    </div>
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="{{asset('frontend')}}/images/insta/insta-3.jpg" alt="">
                        </a>
                    </div>
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="{{asset('frontend')}}/images/insta/insta-4.jpg" alt="">
                        </a>
                    </div>
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="{{asset('frontend')}}/images/insta/insta-5.jpg" alt="">
                        </a>
                    </div>
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="{{asset('frontend')}}/images/insta/insta-6.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>

       
        @include('frontend.includes.footer')



    </div>


    @include('frontend.includes.sidemenu')
   

@endsection