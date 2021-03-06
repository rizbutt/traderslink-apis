@extends('layouts.app')

@section('content')
<section class="hero-slider">
        <!-- Single Slider -->
        <div class="single-slider">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-6 co-12">
                        <div class="home-slider">
                            <div class="hero-text">
                                <span class="small-title wow fadeInUp" data-wow-delay=".3s">Business Solution</span>
                                <h1 class="wow fadeInUp" data-wow-delay=".5s"><span>We Provide Quality</span><br>
                                    Consulting Services</h1>
                                <p class="wow fadeInUp" data-wow-delay=".7s">Lorem Ipsum is simply dummy text of the
                                    printing and typesetting <br> industry. Lorem Ipsum has been the industry's standard
                                    <br>dummy text ever since.</p>
                                <div class="button wow fadeInUp" data-wow-delay=".9s">
                                    <a href="about-us.html" class="btn mouse-dir">Discover More <span
                                            class="dir-part"></span></a>
                                </div>
                            </div>
                            <div class="hero-text">
                                <span class="small-title">Business Solution</span>
                                <h1><span>We Provide Quality</span><br> Consulting Services</h1>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting <br> industry. Lorem
                                    Ipsum has been the industry's standard <br>dummy text ever since.</p>
                                <div class="button">
                                    <a href="about-us.html" class="btn mouse-dir">Discover More <span
                                            class="dir-part"></span></a>
                                </div>
                            </div>
                            <div class="hero-text">
                                <span class="small-title">Business Solution</span>
                                <h1><span>We Provide Quality</span><br> Consulting Services</h1>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting <br> industry. Lorem
                                    Ipsum has been the industry's standard <br>dummy text ever since.</p>
                                <div class="button">
                                    <a href="about-us.html" class="btn mouse-dir">Discover More <span
                                            class="dir-part"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Single Slider -->
    </section>
    <section class="services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-12">
                    <div class="section-title">
                        <span class="wow fadeInDown" data-wow-delay=".2s">What We Offer You</span>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Our Categories</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($categories as $category)
                <div class="col-lg-3 col-md-6 col-12">
                <a href="{{ route('category', $category->slug ) }}">
                    <div class="single-service wow fadeInUp" data-wow-delay=".2s">
                        <div class="serial">
                            <span><i class="{{ $category->image }}"></i></span>
                        </div>
                        
                        <h3><a href="{{ route('category', $category->slug ) }}">{{ $category->name }}</a></h3>
                    </div>
                </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    
@endsection

    </body>
</html>