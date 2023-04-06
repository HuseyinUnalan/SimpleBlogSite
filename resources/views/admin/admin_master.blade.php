@php
    // $adminData = DB::table('admins')->first();
    $id = auth()
        // ->guard('admin')
        ->id();
    $adminData = App\Models\User::where('role', 0)->find($id);
    // auth()->guard('admin')->id()
@endphp
<!doctype html>
<html lang="tr">

<head>

    <meta charset="utf-8" />
    <title>Blog Sitesi | Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/images/logo-sm.png') }}">

    <!-- jquery.vectormap css -->
    <link href="{{ asset('backend/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="{{ asset('backend/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('backend/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('backend/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('backend/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <!-- Toastr Css-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <!-- Input Tags -->
    <link rel="stylesheet" href="{{ asset('backend/libs/input-tags/css/tagsinput.css') }}">

    <!-- Plugins css -->
    <link href="{{ asset('backend/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body data-topbar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        <!-- Header Start -->
        @include('admin.body.header')
        <!-- Header End -->


        <!-- Left Sidebar Start -->
        @include('admin.body.sidebar')
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <!-- Index Page Start -->

            <!-- Page End -->

            @yield('admin')

            <!-- End Page-content -->

            <!-- Footer Start -->

            @include('admin.body.footer')

            <!-- Footer End -->

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->




    <!-- JAVASCRIPT -->
    <script src="{{ asset('backend/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/libs/node-waves/waves.min.js') }}"></script>

    <!--tinymce js-->
    <script src="{{ asset('backend/libs/tinymce/tinymce.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('backend/js/pages/form-editor.init.js') }}"></script>

    <!-- apexcharts -->
    <script src="{{ asset('backend/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- jquery.vectormap map -->
    <script src="{{ asset('backend/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('backend/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}">
    </script>

    <!-- Required datatable js -->
    <script src="{{ asset('backend/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('backend/js/pages/datatables.init.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('backend/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('backend/js/pages/dashboard.init.js') }}"></script>

    <!-- Input Tags -->
    <script src="{{ asset('backend/libs/input-tags/js/tagsinput.js') }}"></script>

    <!-- Plugins js -->
    <script src="{{ asset('backend/libs/dropzone/min/dropzone.min.js') }}"></script>

    <!-- Plugins css -->
    <link href="{{ asset('backend/libs/bootstrap-editable/css/bootstrap-editable.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Toastr js -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Plugins js -->
    <script src="{{ asset('backend/libs/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('backend/libs/bootstrap-editable/js/index.js') }}"></script>

    <!-- Init js-->
    <script src="{{ asset('backend/js/pages/form-xeditable.init.js') }}"></script>

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            });
        });

        $(function() {
            $(document).on('click', '#confirm', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                Swal.fire({
                    title: 'Siparişi Onaylamak İstediğine Emin misin?',
                    text: "Bunu geri alamazsınız!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Evet, Siparişi Onayla!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'Başarılı!',
                            'Sipariş Onaylandı.',
                            'success'
                        )
                    }
                })
            });
        });

        $(function() {
            $(document).on('click', '#processing', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                Swal.fire({
                    title: 'Siparişi İşleme Almak İstediğine Emin misin?',
                    text: "Bunu geri alamazsınız!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Evet, İşleme Al!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'Başarılı!',
                            'Sipariş İşleme Alındı.',
                            'success'
                        )
                    }
                })
            });
        });

        $(function() {
            $(document).on('click', '#picked', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                Swal.fire({
                    title: 'Hazırlanmış Siparişlere Almak İstediğineze Emin misin?',
                    text: "Bunu geri alamazsınız!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Evet, Hazırlanmış Siparişlere Al!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'Başarılı!',
                            'Sipariş Hazırlanmış Siparişlere Alındı.',
                            'success'
                        )
                    }
                })
            });
        });


        $(function() {
            $(document).on('click', '#shipped', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");


                Swal.fire({
                    title: 'Kargoya Verildi Olarak İşaretlemek İstediğinize Emin misiniz?',
                    text: "Bunu geri alamazsınız!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Evet, Kargoya Verildi!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'Başarılı!',
                            'Sipariş Kargoya Verildi.',
                            'success'
                        )
                    }
                })


            });

        });


        $(function() {
            $(document).on('click', '#delivered', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");


                Swal.fire({
                    title: 'Teslim Edildi Olarak İşaretlemek İstediğinize Emin misiniz?',
                    text: "Bunu geri alamazsınız!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Evet, Teslim Edildi!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'Başarılı!',
                            'Sipariş Teslim Edildi!',
                            'success'
                        )
                    }
                })


            });
        });
    </script>


    <!-- App js -->
    <script>
        ! function(n) {
            "use strict";

            function s() {
                for (var e = document.getElementById("topnav-menu-content").getElementsByTagName("a"), t = 0, n = e
                        .length; t < n; t++) "nav-item dropdown active" === e[t].parentElement.getAttribute("class") && (e[
                        t]
                    .parentElement.classList.remove("active"), e[t].nextElementSibling.classList.remove("show"))
            }

            function t(e) {
                1 == n("#light-mode-switch").prop("checked") && "light-mode-switch" === e ? (n("html").removeAttr("dir"), n(
                    "#dark-mode-switch").prop("checked", !1), n("#rtl-mode-switch").prop("checked", !1), n(
                    "#bootstrap-style").attr("href", "{{ asset('backend/css/bootstrap.min.css') }}"), n(
                    "#app-style").attr("href",
                    "{{ asset('backend/css/app.min.css') }}"), sessionStorage.setItem("is_visited",
                    "light-mode-switch")) : 1 == n(
                    "#dark-mode-switch").prop("checked") && "dark-mode-switch" === e ? (n("html").removeAttr("dir"), n(
                    "#light-mode-switch").prop("checked", !1), n("#rtl-mode-switch").prop("checked", !1), n(
                    "#bootstrap-style").attr("href", "{{ asset('backend/css/bootstrap-dark.min.css') }}"), n(
                    "#app-style").attr(
                    "href", "{{ asset('backend/css/app-dark.min.css') }}"), sessionStorage.setItem("is_visited",
                    "dark-mode-switch")) : 1 == n("#rtl-mode-switch").prop("checked") && "rtl-mode-switch" === e && (n(
                        "#light-mode-switch").prop("checked", !1), n("#dark-mode-switch").prop("checked", !1), n(
                        "#bootstrap-style").attr("href", "{{ asset('backend/css/bootstrap-rtl.min.css') }}"), n(
                        "#app-style").attr(
                        "href", "{{ asset('backend/app-rtl.min.css') }}"), n("html").attr("dir", "rtl"), sessionStorage
                    .setItem(
                        "is_visited", "rtl-mode-switch"))
            }

            function e() {
                document.webkitIsFullScreen || document.mozFullScreen || document.msFullscreenElement || (console.log(
                    "pressed"), n("body").removeClass("fullscreen-enable"))
            }
            var a;
            n("#side-menu").metisMenu(), n("#vertical-menu-btn").on("click", function(e) {
                    e.preventDefault(), n("body").toggleClass("sidebar-enable"), 992 <= n(window).width() ? n("body")
                        .toggleClass("vertical-collpsed") : n("body").removeClass("vertical-collpsed")
                }), n("body,html").click(function(e) {
                    var t = n("#vertical-menu-btn");
                    t.is(e.target) || 0 !== t.has(e.target).length || e.target.closest("div.vertical-menu") || n("body")
                        .removeClass("sidebar-enable")
                }), n("#sidebar-menu a").each(function() {
                    var e = window.location.href.split(/[?#]/)[0];
                    this.href == e && (n(this).addClass("active"), n(this).parent().addClass("mm-active"), n(this)
                        .parent().parent().addClass("mm-show"), n(this).parent().parent().prev().addClass(
                            "mm-active"), n(this).parent().parent().parent().addClass("mm-active"), n(this).parent()
                        .parent().parent().parent().addClass("mm-show"), n(this).parent().parent().parent().parent()
                        .parent().addClass("mm-active"))
                }), n(".navbar-nav a").each(function() {
                    var e = window.location.href.split(/[?#]/)[0];
                    this.href == e && (n(this).addClass("active"), n(this).parent().addClass("active"), n(this).parent()
                        .parent().addClass("active"), n(this).parent().parent().parent().addClass("active"), n(this)
                        .parent().parent().parent().parent().addClass("active"), n(this).parent().parent().parent()
                        .parent().parent().addClass("active"))
                }), n(document).ready(function() {
                    var e;
                    0 < n("#sidebar-menu").length && 0 < n("#sidebar-menu .mm-active .active").length && (300 < (e = n(
                        "#sidebar-menu .mm-active .active").offset().top) && (e -= 300, n(
                        ".vertical-menu .simplebar-content-wrapper").animate({
                        scrollTop: e
                    }, "slow")))
                }), n('[data-toggle="fullscreen"]').on("click", function(e) {
                    e.preventDefault(), n("body").toggleClass("fullscreen-enable"), document.fullscreenElement ||
                        document.mozFullScreenElement || document.webkitFullscreenElement ? document.cancelFullScreen ?
                        document.cancelFullScreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() :
                        document.webkitCancelFullScreen && document.webkitCancelFullScreen() : document.documentElement
                        .requestFullscreen ? document.documentElement.requestFullscreen() : document.documentElement
                        .mozRequestFullScreen ? document.documentElement.mozRequestFullScreen() : document
                        .documentElement.webkitRequestFullscreen && document.documentElement.webkitRequestFullscreen(
                            Element.ALLOW_KEYBOARD_INPUT)
                }), document.addEventListener("fullscreenchange", e), document.addEventListener("webkitfullscreenchange",
                    e), document.addEventListener("mozfullscreenchange", e), n(".right-bar-toggle").on("click", function(
                    e) {
                    n("body").toggleClass("right-bar-enabled")
                }), n(document).on("click", "body", function(e) {
                    0 < n(e.target).closest(".right-bar-toggle, .right-bar").length || n("body").removeClass(
                        "right-bar-enabled")
                }),
                function() {
                    if (document.getElementById("topnav-menu-content")) {
                        for (var e = document.getElementById("topnav-menu-content").getElementsByTagName("a"), t = 0, n = e
                                .length; t < n; t++) e[t].onclick = function(e) {
                            "#" === e.target.getAttribute("href") && (e.target.parentElement.classList.toggle("active"),
                                e.target.nextElementSibling.classList.toggle("show"))
                        };
                        window.addEventListener("resize", s)
                    }
                }(), [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function(e) {
                    return new bootstrap.Tooltip(e)
                }), [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]')).map(function(e) {
                    return new bootstrap.Popover(e)
                }), n(window).on("load", function() {
                    n("#status").fadeOut(), n("#preloader").delay(350).fadeOut("slow")
                }), window.sessionStorage && ((a = sessionStorage.getItem("is_visited")) ? (n(".right-bar input:checkbox")
                    .prop("checked", !1), n("#" + a).prop("checked", !0), t(a)) : sessionStorage.setItem("is_visited",
                    "light-mode-switch")), n("#light-mode-switch, #dark-mode-switch, #rtl-mode-switch").on("change",
                    function(e) {
                        t(e.target.id)
                    }), Waves.init()
        }(jQuery);
    </script>

</body>

</html>
