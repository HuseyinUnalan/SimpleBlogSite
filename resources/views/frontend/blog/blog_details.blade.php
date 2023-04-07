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
                    <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>
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


        <form action="{{ route('review.store') }}" method="POST" class="mb-5">
            @csrf
            <input type="hidden" name="blog_id" value="{{ $blog->id }}">

            <div class="form-group">
                <label for="comment">Yorum:</label>
                <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Yorum Yap</button>
        </form>


        @php
            $reviews = App\Models\Reviews::where('blog_id', $blog->id)
                // ->where('status', 1)
                ->latest()
                ->limit(5)
                ->get();
            
        @endphp

        @foreach ($reviews as $review)
            <div class="card mb-5">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12">
                            <p>
                                <a class="float-left" href=""><strong>{{ $review->user->name }}
                                        {{ $review->user->surname }}</strong></a>
                            <p class="text-secondary text-right">
                                {{ Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</p>

                            </p>
                            <div class="clearfix"></div>
                            <p>{!! $review->comment !!}</p>

                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
    <!-- Container End -->
@endsection
