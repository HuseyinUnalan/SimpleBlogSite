@extends('frontend.main_master')
@section('content')
    <!-- Blog Section Start -->
    <div class="container mt-5 mb-5 text-center">
        <div class="row justify-content-center mb-4">
            <div class="col-md-7 text-center">
                <h3 class="mb-3">Blog</h3>
                <hr>
            </div>
        </div>
        <div class="row">




            @foreach ($blogs as $item)
                <!-- Column -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="{{ !empty($item->photo) ? url($item->photo) : url('upload/no_image.jpg') }}"
                                class="img-fluid blog-card" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }} </h5>
                            <p class="card-text">
                                {!! Str::limit($item->description, 200) !!}
                            </p>
                            <a href="{{ route('blog.detail', $item->id) }}" class="btn btn-blog">Devamını Oku</a>
                        </div>
                        <small class="text-muted cat">
                            <i class="fa fa-user text-info"></i>{{ $item->user->name }} {{ $item->user->surname }}
                            <i class="fa fa-clock-o text-info"></i>{{ $item->date }}
                        </small>
                    </div>
                </div>
                <!-- Column -->
            @endforeach







        </div>
    </div>
    <!-- Blog Section End -->
@endsection
