
@extends('layouts.master')

@section('content')
@parent
        <!-- category section -->
        <div class="product-section mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="section-title">
                            <h3><span class="orange-text">Our</span> Categories</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
                                beatae optio.</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-lg-4 col-md-6 text-center">
                            <div class="single-product-item">
                                <div class="product-image">
                                    {{-- style="max-height:250px !important;min-height:250px !important"> --}}
                                    <a href="{{route('product.category.show', $category->name)}}">
                                        <img 
                                            style="max-height:250px !important;min-height:250px !important"
                                            src="{{ asset('assets\img\categories\\'.$category->image_path) }}" 
                                            alt="{{ $category->name }}"
                                        >
                                    </a>
                                </div>
                                <h3>{{ $category->name }}</h3>
                                <p>{{ $category->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- end category section -->

        <!-- cart banner section -->
        <section class="cart-banner pt-100 pb-100">
            <div class="container">
                <div class="row clearfix">
                    <!--Image Column-->
                    <div class="image-column col-lg-6">
                        <div class="image">
                            <div class="price-box">
                                <div class="inner-price">
                                    <span class="price">
                                        <strong>30%</strong> <br> off per kg
                                    </span>
                                </div>
                            </div>
                            <img src="assets/img/a.jpg" alt="">
                        </div>
                    </div>
                    <!--Content Column-->
                    <div class="content-column col-lg-6">
                        <h3><span class="orange-text">Deal</span> of the month</h3>
                        <h4>Hikan Strwaberry</h4>
                        <div class="text">Quisquam minus maiores repudiandae nobis, minima saepe id, fugit ullam similique!
                            Beatae, minima quisquam molestias facere ea. Perspiciatis unde omnis iste natus error sit voluptatem
                            accusant</div>
                        <!--Countdown Timer-->
                        <div class="time-counter">
                            <div class="time-countdown clearfix" data-countdown="2020/2/01">
                                <div class="counter-column">
                                    <div class="inner"><span class="count">00</span>Days</div>
                                </div>
                                <div class="counter-column">
                                    <div class="inner"><span class="count">00</span>Hours</div>
                                </div>
                                <div class="counter-column">
                                    <div class="inner"><span class="count">00</span>Mins</div>
                                </div>
                                <div class="counter-column">
                                    <div class="inner"><span class="count">00</span>Secs</div>
                                </div>
                            </div>
                        </div>
                        <a href="cart.html" class="cart-btn mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- end cart banner section -->

        <!-- testimonail-section -->
        <div class="testimonail-section mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-center">
                        <div class="testimonial-sliders">
                            <div class="single-testimonial-slider">
                                <div class="client-avater">
                                    <img src="assets/img/avaters/avatar1.png" alt="">
                                </div>
                                <div class="client-meta">
                                    <h3>Saira Hakim <span>Local shop owner</span></h3>
                                    <p class="testimonial-body">
                                        " Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto beatae
                                        vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus
                                        error sit voluptatem accusantium "
                                    </p>
                                    <div class="last-icon">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="single-testimonial-slider">
                                <div class="client-avater">
                                    <img src="assets/img/avaters/avatar2.png" alt="">
                                </div>
                                <div class="client-meta">
                                    <h3>David Niph <span>Local shop owner</span></h3>
                                    <p class="testimonial-body">
                                        " Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto beatae
                                        vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus
                                        error sit voluptatem accusantium "
                                    </p>
                                    <div class="last-icon">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="single-testimonial-slider">
                                <div class="client-avater">
                                    <img src="assets/img/avaters/avatar3.png" alt="">
                                </div>
                                <div class="client-meta">
                                    <h3>Jacob Sikim <span>Local shop owner</span></h3>
                                    <p class="testimonial-body">
                                        " Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto beatae
                                        vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus
                                        error sit voluptatem accusantium "
                                    </p>
                                    <div class="last-icon">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end testimonail-section -->

        <!-- advertisement section -->
        <div class="abt-section mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="abt-bg">
                            <a href="https://www.youtube.com/watch?v=DBLlFWYcIGQ" class="video-play-btn popup-youtube"><i
                                    class="fas fa-play"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="abt-text">
                            <p class="top-sub">Since Year 1999</p>
                            <h2>We are <span class="orange-text">Fruitkha</span></h2>
                            <p>Etiam vulputate ut augue vel sodales. In sollicitudin neque et massa porttitor vestibulum ac vel
                                nisi. Vestibulum placerat eget dolor sit amet posuere. In ut dolor aliquet, aliquet sapien sed,
                                interdum velit. Nam eu molestie lorem.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente facilis illo repellat
                                veritatis minus, et labore minima mollitia qui ducimus.</p>
                            <a href="{{ route('about') }}" class="boxed-btn mt-4">know more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end advertisement section -->

        <!-- shop banner -->
        <section class="shop-banner">
            <div class="container">
                <h3>December sale is on! <br> with big <span class="orange-text">Discount...</span></h3>
                <div class="sale-percent"><span>Sale! <br> Upto</span>50% <span>off</span></div>
                <a href="{{ route('product.index') }}" class="cart-btn btn-lg">Shop Now</a>
            </div>
        </section>
        <!-- end shop banner -->

        <!-- latest news -->
        <div class="latest-news pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="section-title">
                            <h3><span class="orange-text">Our</span> News</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
                                beatae optio.</p>
                        </div>
                    </div>
                </div>

                <!-- end news -->
                <div class="latest-news mt-70 mb-50">
                    <div class="container">
                        <div class="row">

                            @foreach ($news as $post)
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-latest-news">
                                        <a href="{{ route('news.show', $post->id) }}">
                                            <div >
                                                <img
                                                    style="min-height: 250px; max-height: 250px; border-radius: 10px;"
                                                    src="{{ asset('assets/img/news/'.$post->image) }}" alt="{{ $post->title }}"
                                                    >
                                            </div>
                                        </a>
                                        <div class="news-text-box">
                                            <h3><a href="{{ route('news.show', $post->id) }}">{{ $post->title }}</a></h3>
                                            <p class="blog-meta">
                                                <span class="author"><i class="fas fa-user"></i> {{ $post->role }}</span>
                                                <span class="date"><i class="fas fa-calendar"></i> {{ $post->created_at->format('d F, Y') }}</span>
                                            </p>
                                            @if (strlen($post->content) > 30)
                                                <p class="excerpt">{{ substr($post->content, 0, 30) }}...</p>
                                            @else
                                                <p class="excerpt">{{ substr($post->content, 0, 30) }}</p>
                                            @endif
                                            <a href="{{ route('news.show', $post->id) }}" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <a href="{{ route('news.index') }}" class="boxed-btn">More News</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end news -->
            </div>
        </div>
        <!-- end latest news -->

        <!-- logo carousel -->
        <div class="logo-carousel-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="logo-carousel-inner">
                            <div class="single-logo-item">
                                <img src="assets/img/company-logos/1.png" alt="">
                            </div>
                            <div class="single-logo-item">
                                <img src="assets/img/company-logos/2.png" alt="">
                            </div>
                            <div class="single-logo-item">
                                <img src="assets/img/company-logos/3.png" alt="">
                            </div>
                            <div class="single-logo-item">
                                <img src="assets/img/company-logos/4.png" alt="">
                            </div>
                            <div class="single-logo-item">
                                <img src="assets/img/company-logos/5.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end logo carousel -->
@endsection
