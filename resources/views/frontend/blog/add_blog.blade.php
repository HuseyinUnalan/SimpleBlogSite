@extends('frontend.main_master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    @if (session('success'))
        <div class="alert alert-success">
            <strong>Success!</strong> {{ session('success') }}
        </div>
    @endif
    <div class="container mt-5" style="margin-bottom: 75px">
        <h2>Blog Ekle</h2>
        <br>
        <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">


            <div class="form-group">
                <img id="showImage" class="rounded avatar-xl" style="width: 200px; height: auto;">
            </div>

            <div class="form-group">
                <label for="photo">Fotoğraf (Zorunlu Değil):</label>
                <input type="file" id="image" class="form-control" placeholder="Fotoğraf" name="photo">
            </div>

            <div class="form-group">
                <label for="title">Başlık:</label>
                <input type="text" class="form-control" placeholder="Başlık" name="title" required>
                @if ($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="description">İçerik:</label>
                <textarea name="description" id="" cols="30" rows="4" class="form-control" required></textarea>
                @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>


            <div class="form-group">
                <label for="date">Yayınlanma Tarihi (İsteğe Bağlı Boş Bırakılırsa Direkt Yayına Alınır):</label>
                <input type="date" class="form-control" placeholder="Yayınlanma Tarihi (İsteğe Bağlı)" name="date">
                @if ($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
            </div>



            <button type="submit" class="btn btn-primary">Kaydet</button>
        </form>
    </div>
    <br>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
