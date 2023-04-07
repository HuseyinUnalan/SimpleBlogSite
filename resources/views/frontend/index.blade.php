@extends('frontend.main_master')
@section('content')
    <!--Carousel Wrapper-->
    <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
        <!--Slides-->
        <div class="carousel-inner" role="listbox">


            <div class="carousel-item active">
                <div class="view">
                    <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(68).webp"
                        alt="First slide">
                    <div class="mask rgba-black-light"></div>
                </div>
                <div class="carousel-caption">
                    <h3 class="h3-responsive"></h3>
                    <p>Blog Yazmak ve Blogları Görmek İçin Giriş Yapmanız Gerekiyor.</p>
                </div>
            </div>


        </div>
        <!--/.Slides-->

    </div>
    <!--/.Carousel Wrapper-->




    {{-- <!-- Blog Section Start -->
    <div class="container mt-5 mb-5 text-center">
        <div class="row justify-content-center mb-4">
            <div class="col-md-7 text-center">
                <h3 class="mb-3">Blog</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="assets/img/blog/blog-1.jpg" class="img-fluid blog-card" />
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Post title</h5>
                        <p class="card-text">
                            Some quick example text to build on the card title and make up the bulk of the card's
                            content.
                        </p>
                        <a href="blog-details.html" class="btn btn-blog">Read More</a>
                    </div>
                    <small class="text-muted cat">
                        <i class="fa fa-user text-info"></i>Admin
                        <i class="fa fa-clock-o text-info"></i>24 May 2023
                    </small>
                </div>
            </div>
            <!-- Column -->





            <div class="col-md-12 mt-3 text-center">
                <a href="{{ route('all.blog') }}" class="btn btn-blog-view text-white border-0 btn-md btn-arrow">
                    <span>All Blogs</span>
                </a>
            </div>


        </div>
    </div>
    <!-- Blog Section End --> --}}
@endsection
