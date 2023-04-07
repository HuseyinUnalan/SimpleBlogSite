@extends('frontend.main_master')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            <strong>Success!</strong> {{ session('success') }}
        </div>
    @endif
    <div class="container mt-5" style="margin-bottom: 150px">
        <h2>Profil Güncelle</h2>
        <br>
        <form method="POST" action="{{ route('user.profile.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">İsim:</label>
                <input type="text" class="form-control" id="name" placeholder="İsim" name="name" required
                    value="{{ $user->name }}">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="surname">Soyisim:</label>
                <input type="text" class="form-control" id="surname" placeholder="Soyisim" name="surname" required
                    value="{{ $user->surname }}">
                @if ($errors->has('surname'))
                    <span class="text-danger">{{ $errors->first('surname') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="username">Kullanıcı Adı:</label>
                <input type="text" class="form-control" id="username" placeholder="Kullanıcı Adı" name="username"
                    required value="{{ $user->username }}">
                @if ($errors->has('username'))
                    <span class="text-danger">{{ $errors->first('username') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" placeholder="Eski Şifre" name="email" required
                    value="{{ $user->email }}">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>


            <button type="submit" class="btn btn-primary">Güncelle</button>
        </form>
    </div>
    <br>
@endsection
