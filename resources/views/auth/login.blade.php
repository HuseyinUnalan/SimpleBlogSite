@extends('frontend.main_master')
@section('content')
    <div class="container mt-5" style="margin-bottom: 330px">
        <h2>Giriş Yap</h2>
        <form method="POST" action="{{ route('user.login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="E-mail" name="email" required>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="pwd">Şifre:</label>
                <input type="password" class="form-control" id="password" placeholder="Şifre" name="password" required>
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
            </div>
            <div class="form-group form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" id="remember_me" name="remember"> Beni Hatırla
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Giriş Yap</button>
        </form>
    </div>
@endsection
