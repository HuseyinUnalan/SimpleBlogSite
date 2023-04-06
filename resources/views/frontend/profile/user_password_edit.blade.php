@extends('frontend.main_master')
@section('content')
    <div class="container mt-5" style="margin-bottom: 260px">
        <h2>Şifre Değiştir</h2>
        <br>
        <form method="POST" action="{{ route('user.password.update') }}">
            @csrf

            <div class="form-group">
                <label for="oldpassword">Eski Şifre:</label>
                <input type="password" class="form-control" id="oldpassword" placeholder="Eski Şifre" name="oldpassword"
                    required>
                @if ($errors->has('oldpassword'))
                    <span class="text-danger">{{ $errors->first('oldpassword') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="password">Yeni Şifre:</label>
                <input type="password" class="form-control" id="password" placeholder="Yeni Şifre" name="password"
                    required>
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>


            <div class="form-group">
                <label for="password_confirmation">Yeni Şifre Tekrar:</label>
                <input type="password" class="form-control" id="password_confirmation" placeholder="Yeni Şifre Tekrar"
                    name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-primary">Güncelle</button>
        </form>
    </div>
@endsection
