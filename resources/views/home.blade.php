<x-guest-layout />

{{-- Include Bootstrap's CSS --}}
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}

<div class="container">
    <div class="row">
        <div class="homepage-content col-lg-12 col-12 col-md-12">
            <div class="entry-content">
                <div data-vc-full-width="true" data-vc-full-width-init="true" class="aa">
                    <div class="column-container col-sm-12">
                        <div class="column-inner">
                            <div class="wrapper">
                                <div class="slider-element">
                                    <!-- Start Slide Show -->
                                    {{-- Carousel Markup --}}
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                          <li data-target="#myCarousel" data-slide-to="1"></li>
                                          <li data-target="#myCarousel" data-slide-to="2"></li>
                                        </ol>
                                      
                                        <!-- Slides -->
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <div class="slide_1"></div>
                                                <div class="row">
                                                    <div class="col-sm-7 col-md-6">
                                                        <img src="{{ asset('images/slider_1.png') }}" alt="Image 1">
                                                    </div>
                                                    <div class="col-sm-5 col-md-6">
                                                        <div class="carousel-caption">
                                                            <h3>Image 1</h3>
                                                            <p>Image 1 description</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="row">
                                                    <div class="col-sm-7 col-md-6">
                                                        <img src="{{ asset('images/slider_1.png') }}" alt="Image 2">
                                                    </div>
                                                    <div class="col-sm-5 col-md-6">
                                                        <div class="carousel-caption">
                                                            <h3>Image 2</h3>
                                                            <p>Image 2 description</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="row">
                                                    <div class="col-sm-7 col-md-6">
                                                        <img src="{{ asset('images/slider_1.png') }}" alt="Image 3">
                                                    </div>
                                                    <div class="col-sm-5 col-md-6">
                                                        <div class="carousel-caption">
                                                            <h3>Image 3</h3>
                                                            <p>Image 3 description</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <!-- Controls -->
                                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Include jQuery and Bootstrap's JavaScript --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


{{-- Initialize Carousel with Automatic Sliding --}}
<script>
    $(document).ready(function() {
      $('.carousel').carousel();
    });
</script>

{{-- <div class="container">
    <div class="row">
        <div class="homepage-content col-lg-12 col-12 col-md-12">
            <div class="entry-content">
                <div data-vc-full-width="true" data-vc-full-width-init="true" class="aa">
                    <div id="slide_1" class="slider_design">
                            <div class="slider_internal_design">
                                <div class="container slider_inner_design">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-7 col-md-6">   
                                            <!-- Slide content on the left side -->
                                            aaa
                                        </div>
                                    
                                        <div class="col-sm-12 col-lg-5 col-md-6">
                                            <div class="column_inner">
                                                <div class="wrapper">
                                                    <div class="label"> 
                                                        4-Door Flex French Door
                                                        <br>
                                                        Counter-Depth Fingerprint Resistant Refrigerator
                                                    </div>
                                                    <div class="description"> 
                                                        Sleek Samsung 4-Door Flex Fridge in Black Stainless Steel with 22.6 Cu. Ft. capacity, counter-depth design, fingerprint-resistant finish, and advanced features for modern kitchens
                                                    </div>
                                                    <div class="Button"> 
                                                        <a href="" class="btn btn-primary">SHOP NOW</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <button class="flickity-viewport" type="button" aria-label="Previous"></button>
                        <button class="flickity-viewport" type="button" aria-label="Next"></button>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div> --}}

<style>
  /* Slider container */
.container {
    width: 100% !important;
        padding-right: 15px;
        padding-left: 15px;
        margin: 0px, auto, 0px, auto; 
        padding-top: 0;
}

/* Slider images */
.carousel-inner .item img {
  width: 100%;
  height: auto;
}

/* Slider controls */
.carousel-control {
  width: 50px;
  height: 50px;
  background-color: #000; /* Adjust to your desired background color */
  opacity: 0.7;
  top: 50%;
  transform: translateY(-50%);
  z-index: 10;
}

.carousel-control:hover {
  opacity: 1;
}

.carousel-control .glyphicon-chevron-left,
.carousel-control .glyphicon-chevron-right {
  color: #fff; /* Adjust to your desired arrow color */
  font-size: 24px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.carousel-indicators {
  bottom: 0;
}

.carousel-indicators li {
  background-color: #000; /* Adjust to your desired indicator color */
  opacity: 0.7;
}

.carousel-indicators .active {
  background-color: #fff; /* Adjust to your desired active indicator color */
  opacity: 1;
}

.slide_1 {
    background-image: url('/images/slider_1_back.png');
    background-color: black;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    trans
}
    /* .container{
        width: 100% !important;
        padding-right: 15px;
        padding-left: 15px;
        margin: 0px, auto, 0px, auto; 
        padding-top: 0;
    }

    .row{
        align-items: flex-start !important;
        display: flex;
        flex-wrap: wrap;
        margin-right: -15px !important;
        margin-left: -15px !important;
    }

    .site-content{
        margin-bottom: 40px;
    }

    .aa{
        position: relative;
        left: -148.6px;
        box-sizing: border-box;
        width: 1519px;
        max-width: 1519px;
    }

    .column_container {
        padding-left: 0;
        padding-right: 0;
    }

    .column-inner {
        padding-left: 0;
        padding-right: 0;
    }

    .column_container>.column-inner {
        box-sizing: border-box;
        width: 100%;
    }

    .column-inner::before, .column-inner::after {
        content: " ";
        display: table;
    }

    .slider-element {
        margin-bottom: 0;
    }

    .slide{
        visibility: visible;
        background: rgb(16, 16, 16);
        padding: 0px;
        height: 754px;
        display: block;
        width: 1519px;
        margin-top: 0px;
        margin-bottom: 0px;
        position: absolute;
        max-height: none;
        overflow: visible;
        left: 0px;
        transform: translate(0px, 0px);
        top: 0px;
    }

    .bb{
        height: 100%;
        width: 1519px;
        max-height: none;
        touch-action: manipulation;
        cursor: pointer;
        user-select: none;
    } */

    /* .carousel-inner{
        overflow: hidden;
        position: absolute;
        visibility: visible;
        max-height: none;
        height: 100%;
        width: 100%;
        touch-action: manipulation;
    } */

    /* .carousel-item{
        position: absolute;
        display: block;
        overflow: hidden;
        height: 100%;
        width: 100%;
        touch-action: manipulation;
        z-index: 20;
        opacity: 1;
        visibility: inherit;
    } */

    /* .img{
        width: 50%;
        height: auto;
    } */
    /* .slide_internal_design{
        max-width: 1222px;
        z-index: 2;
        display: flex;
        padding-top: 35px;
        padding-bottom: 35px;
        justify-content: center;
        align-items: center;;
    }

    .slider_inner_design{   
        opacity: 1;
        transform: none;
        transform: scale(.6);
        transition-duration: 0.25s,1s
        transition-property: opacity,transform;
        transition-timing-function: ease,cubic-bezier(0,.87,.58,1);
    }

    .row{
        display: flex;
        flex-wrap: wrap;
    }

    .label{
        font-size: 42px;
        line-height: 78px;
        font-weight: 600!important;
        font-family: Cabin, Arial, Helvetica, sans-serif;
        margin-bottom: 15px !important;
    }

    .description{
        font-size: 16px;
        sline-height: 26px;
        font-family: Cabin, Arial, Helvetica, sans-serif;
        margin-bottom: 30px;
    }

    .btn.btn-primary{
        color: #fff;
        background-color: #e83a3a;
    }

    :is(.btn,.button,button,[type="button"]){
        padding: 5px 20px;
        font-size: 13px;
        position: relative;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        outline: none;
        border: 0 solid transparent;
        border-radius: 0;
        box-shadow: none;
        vertical-align: middle;
        text-align: center;
        text-decoration: none;
        text-transform: uppercase;
        text-shadow: none;
        font-weight: 600;
        font-family: inherit;
        line-height: 1.2;
        cursor: pointer;
        transition: color .25s
    } */
</style>