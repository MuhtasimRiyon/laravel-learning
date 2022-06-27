@php

$sliders = DB::table('sliders')->get();

@endphp

<!-- Begin Slider With Banner Area -->
<div class="slider-with-banner">
    <div class="container">
        <div class="row">
            <!-- Begin Slider Area -->
            <div class="col-lg-8 col-md-8">
                <div class="slider-area pt-sm-30 pt-xs-30">
                    <div class="slider-active owl-carousel">
                        
                        @foreach($sliders as $value)
                        <!-- Begin Single Slide Area slider 1 -->
                        <div style="background-image: url({{ asset($value->image) }}) !important;" class="single-slide align-center-left animation-style-01 bg-1">
                            <div class="slider-progress"></div>
                            <div class="slider-content">
                                <h5>{{ $value->title }} <span>-20% Off</span> This Week</h5>
                                <h2>{{ $value->description }}</h2>
                                <h2>Chamcham Galaxy S9 | S9+</h2>
                                <h3>Starting at <span>$1209.00</span></h3>
                                <div class="default-btn slide-btn">
                                    <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Slide Area End Here -->
                        @endforeach

                        <!-- slider 2 and 3 was here -->

                    </div>
                </div>
            </div>
            <!-- Slider Area End Here -->

            <!-- Begin Li Banner Area -->
            <div class="col-lg-4 col-md-4 text-center pt-sm-30 pt-xs-30">
                <div class="li-banner">
                    <a href="#">
                        <img src="{{ asset('forntend/images/banner/1_1.jpg')}}" alt="">
                    </a>
                </div>
                <div class="li-banner mt-15 mt-md-30 mt-xs-25 mb-xs-5">
                    <a href="#">
                        <img src="{{ asset('forntend/images/banner/1_2.jpg')}}" alt="">
                    </a>
                </div>
            </div>
            <!-- Li Banner Area End Here -->
        </div>
    </div>
</div>
<!-- Slider With Banner Area End Here -->

<!-- Begin Static Top Area -->
<div class="static-top-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="static-top-content mt-sm-30">
                    Gift Special: Gift every single day on Weekends - New Coupon code "
                    <span>LimupaSaleoff</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Static Top Area End Here -->