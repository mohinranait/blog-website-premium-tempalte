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
                       
                        <div class='details-page border rounded px-4 mb-4'>
                            <div class="details-header">
                                <h1>{{$details->name}}</h1>
                                <a href="#" class='btn ' style='background:#023369;color:white;border-radius:5px'><i class="fa-brands fa-facebook-f px-2"></i>Facebook</a>
                                <a href="#" class='btn ' style='background:#00ACEE;color:white;border-radius:5px'><i class="fa-brands fa-twitter px-2"></i>Twitter</a>
                                <a href="#" class='btn ' style='background:#3B5999;color:white;border-radius:5px'><i class="fa-brands fa-linkedin px-2"></i>Linkedin</a>
                      
                                <div class='d-flex autho'>
                                    <img src="{{asset('backend/img/user/'.$details->userInfo->profile)}}" style="width:45px ; height:45px; border-radius:50% ; margin-right:15px" alt="">
                                    <div>
                                        <p class='auth-name'><strong>Author</strong>  : {{$details->userInfo->name}}</p>
                                        <p> <strong>Update Time </strong> : {{ $details->created_at->format('M d, Y') }}</p>
                                    </div>
                                </div>
                                <img src="{{asset('backend/img/blogpost/'. $details->thumnail)}}" alt="">
                                
                            </div>
                            <div class="details-body">
                                <p>{!! $details->body !!}</p>
                            </div>
                            <div class="details-footer"></div>

                        </div>
                        <div class="comment p-4 rounded border mb-4  ">
                            <p><strong> Comment Here</strong></p>
                            <form action="">
                               
                                <div class="form-group mb-2">
                                    <textarea name="" id="" class='form-control' cols="30" rows="3" placeholder='Type here...'></textarea>
                                </div>
                                <div class="form-group mb-2">
                                    <input type="text" class='form-control' placeholder='Full Name...'>
                                </div>
                                <div class="form-group mb-2">
                                    <input type="email" class='form-control' placeholder='Email Address...'>
                                </div>
                                <div class="form-group mb-2">
                                    <input type="text" class='form-control' placeholder='Website...'>
                                </div>
                                <div class="form-group mb-2">
                                    <input type="submit" class='btn w-100' value='POST COMMENT' style='background:linear-gradient(315deg, #6e72fc 0%, #ad1deb 74%)'>
                                </div>
                            </form>
                        </div>
                        <div class="related-post">
                            <div class="section-header">
                                <h3 class="section-title">Trending</h3>
                            </div>

                            <div class="padding-30 rounded bordered">
                                <div class="row gy-5">
                                    <div class="col-sm-6">
                                        <div class="post">
                                            <div class="thumb rounded">
                                                <a href="#" class="category-badge position-absolute">Business</a>
                                                <span class="post-format">
                                                    <i class="icon-picture"></i>
                                                </span>
                                                <a href="#">
                                                    <div class="inner">
                                                        <img src="{{asset('frontend')}}/images/posts/tren-lg-1.jpg" alt="">
                                                    </div>
                                                </a>
                                            </div>
                                            <ul class="meta list-inline mt-4 mb-0">
                                                <li class="list-inline-item">
                                                    <a href="#">
                                                        <img src="{{asset('frontend')}}/images/other/author-sm.jpg" class="author" alt="">
                                                        Techie Coder
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">24 May 2021</li>
                                            </ul>
                                            <h5 class="post-title mb-3 mt-3">
                                                <a href="#">Bitcoin investors lost $14.2bn in recent cypto crash</a>
                                            </h5>
                                            <p class="excerpt mb-0">
                                                This is Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus,
                                                id.
                                            </p>
                                        </div>

                                        <div class="post post-list-sm square before-seperator">
                                            <div class="thumb rounded">
                                                <a href="#">
                                                    <div class="inner">
                                                        <img src="{{asset('frontend')}}/images/posts/tren-sm-1.jpg" alt="">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="details clearfix">
                                                <h6 class="post-title my-0">
                                                    <a href="#">IPL 2021 to resume in sept 3rd week in UAE</a>
                                                </h6>
                                                <ul class="meta list-inline mt-1 mb-0">
                                                    <li class="list-inline-item">25 May 2021</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="post post-list-sm square before-seperator">
                                            <div class="thumb rounded">
                                                <a href="#">
                                                    <div class="inner">
                                                        <img src="{{asset('frontend')}}/images/posts/tren-sm-2.jpg" alt="">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="details clearfix">
                                                <h6 class="post-title my-0">
                                                    <a href="#">HDFC Bank concerned over retail asset quality in
                                                        near-term</a>
                                                </h6>
                                                <ul class="meta list-inline mt-1 mb-0">
                                                    <li class="list-inline-item">25 May 2021</li>
                                                </ul>
                                            </div>
                                        </div>




                                    </div>

                                    <div class="col-sm-6">
                                        <div class="post">
                                            <div class="thumb rounded">
                                                <a href="#" class="category-badge position-absolute">Inspiration</a>
                                                <span class="post-format">
                                                    <i class="icon-earphones"></i>
                                                </span>
                                                <a href="#">
                                                    <div class="inner">
                                                        <img src="{{asset('frontend')}}/images/posts/tren-lg-2.jpg" alt="">
                                                    </div>
                                                </a>
                                            </div>
                                            <ul class="meta list-inline mt-4 mb-0">
                                                <li class="list-inline-item">
                                                    <a href="#">
                                                        <img src="{{asset('frontend')}}/images/other/author-sm.jpg" class="author" alt="">
                                                        Techie Coder
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">29 May 2021</li>
                                            </ul>
                                            <h5 class="post-title mb-3 mt-3">
                                                <a href="#">Spotify gives a discount for student</a>
                                            </h5>
                                            <p class="excerpt mb-0">
                                                This is Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus,
                                                id.
                                            </p>
                                        </div>

                                        <div class="post post-list-sm square before-seperator">
                                            <div class="thumb rounded">
                                                <a href="#">
                                                    <div class="inner">
                                                        <img src="{{asset('frontend')}}/images/posts/tren-sm-3.jpg" alt="">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="details clearfix">
                                                <h6 class="post-title my-0">
                                                    <a href="#">Arogya ap to display vaccination status</a>
                                                </h6>
                                                <ul class="meta list-inline mt-1 mb-0">
                                                    <li class="list-inline-item">25 May 2021</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="post post-list-sm square before-seperator">
                                            <div class="thumb rounded">
                                                <a href="#">
                                                    <div class="inner">
                                                        <img src="{{asset('frontend')}}/images/posts/tren-sm-4.jpg" alt="">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="details clearfix">
                                                <h6 class="post-title my-0">
                                                    <a href="#">Petrol, diesel prices hiked again today.</a>
                                                </h6>
                                                <ul class="meta list-inline mt-1 mb-0">
                                                    <li class="list-inline-item">25 May 2021</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="spacer" data-height="50"></div>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        @include('frontend.includes.right-sidebar')

                    </div>
                </div>
            </div>
        </section>


        </div>
    @include('frontend.includes.footer')
    </div> <!-- /.site-wrapper -->

    @include('frontend.includes.sidemenu')
@endsection