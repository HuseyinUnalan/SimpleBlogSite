 <!-- Top Bar Start -->
 <div class="topnav">
     <div class="container">
         <div class="row">




             <div class="col-xl-12 col-md-12 col-sm-12 col-12 mt-2 mb-2">
                 <a href="{{ route('/') }}">
                     <h5> Anasayfa / </h5>
                 </a>
                 @auth
                     <a href="">
                         <h5> Bloglar / </h5>
                     </a>

                     <a href="{{ route('blog.add') }}">
                         <h5> Blog Yaz / </h5>
                     </a>

                     <a href="{{ route('user.profile.edit') }}">
                         <h5> Profil Güncelle / </h5>
                     </a>

                     <a href="{{ route('user.change.password') }}">
                         <h5> Şifre Değiştir / </h5>
                     </a>

                     <a href="{{ route('user.logout') }}">
                         <h5> Çıkış Yap </h5>
                     </a>

                     @if (Auth::user()->role == 0)
                         <a href="{{ route('admin.dashboard') }}">
                             <h5> / Admin Paneline Git </h5>
                         </a>
                     @endif
                     <div class="text-white" style="float: right">
                             <h5>  {{ Auth::user()->name }}  {{ Auth::user()->surname }}</h5>
                     </div>
                 @else
                     <a href="{{ route('register') }}">
                         <h5>Kayıt Ol / </h5>
                     </a>

                     <a href="{{ route('login') }}">
                         <h5> Giriş Yap </h5>
                     </a>
                 @endauth
             </div>









         </div>
     </div>
 </div>
 <!-- Top Bar End -->
