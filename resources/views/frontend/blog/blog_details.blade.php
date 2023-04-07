@extends('frontend.main_master')
@section('content')
    <!-- Container Start -->
    <div class="container">
        <!-- Row Start -->
        <div class="row">
            <!-- Blog Details Start -->
            <div class="col-xl-12 col-md-12 blog-details">
                <img src="{{ !empty($blog->photo) ? url($blog->photo) : url('upload/no_image.jpg') }}" alt=""
                    style="width:100%; height: auto;">
                <div class="mt-3">
                    <i class="fa fa-clock-o"></i>{{ $blog->date }}
                    <i class="fa fa-user"></i>{{ $blog->user->name }} {{ $blog->user->surname }}
                </div>
                <hr>
                <div>

                    <h4>{{ $blog->title }}</h4>

                    {!! $blog->description !!}

                </div>

            </div>
            <!-- Blog Details End -->




        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
@endsection
