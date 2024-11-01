<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>
        @hasSection('title')
        @yield('title')
        @else
        {{ ApplicationHelper::getSetting()->appname }}
        @endif
    </title>
    <meta content="{{ ApplicationHelper::getSetting()->meta_description }}" name="description">
    <meta content="{{ ApplicationHelper::getSetting()->meta_keywords }}" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('assets/img/logo/bandungbaratlogo.png')}}" rel="icon">
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/post.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/timeline_style.css')}}" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <section id="topbar" class="topbar d-flex align-items-center"
        style="background-color: {{ ApplicationHelper::getSetting()->theme_color }}">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a
                        href="mailto:{{ ApplicationHelper::getSetting()->email }}">{{ ApplicationHelper::getSetting()->email
            }}</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>{{ ApplicationHelper::getSetting()->phone
            }}</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="{{ ApplicationHelper::getSetting()->twitter }}" class="twitter"><i
                        class="bi bi-twitter"></i></a>
                <a href="{{ ApplicationHelper::getSetting()->facebook }}" class="facebook"><i
                        class="bi bi-facebook"></i></a>
                <a href="{{ ApplicationHelper::getSetting()->instagram }}" class="instagram"><i
                        class="bi bi-instagram"></i></a>
            </div>
        </div>
    </section><!-- End Top Bar -->

    @include('layouts.frontend.header')
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    @yield('content')
    <!-- End Hero Section -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer" style="background-color: {{ ApplicationHelper::getSetting()->theme_color }}">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="/" class="logo d-flex">
                        <span>{{ ApplicationHelper::getSetting()->appname }}</span>
                    </a>
                    <p>
                        {!! App\Models\Page::where('id', 1)->first()->description !!}
                    </p>
                    <div class="social-links d-flex mt-4">
                        <a href="{{ ApplicationHelper::getSetting()->twitter }}" class="twitter"><i
                                class="bi bi-twitter"></i></a>
                        <a href="{{ ApplicationHelper::getSetting()->facebook }}" class="facebook"><i
                                class="bi bi-facebook"></i></a>
                        <a href="{{ ApplicationHelper::getSetting()->instagram }}" class="instagram"><i
                                class="bi bi-instagram"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Profil</h4>
                    <ul>
                        @foreach(ApplicationHelper::getProfil() as $profil)
                        <li><a href="{{ route('page.content', ['slug' => $profil->slug]) }}">{{ $profil->title }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-2 col-6 footer-links">
                    <h4>Informasi</h4>
                    <ul>
                        @foreach(ApplicationHelper::getInformasi() as $informasi)
                        <li>
                            <a
                            href="{{ route('page.content', ['slug' => $informasi->slug]) }}">{{ $informasi->title }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Kantor</h4>
                    <p>
                        {{ ApplicationHelper::getSetting()->office_address }}<br>
                        <strong>Phone:</strong> {{ ApplicationHelper::getSetting()->phone }}<br>
                        <strong>Email:</strong> {{ ApplicationHelper::getSetting()->email }}<br>
                    </p>
                </div>
            </div>
        </div>
        <div class="container mt-4">
            <div class="copyright">
                &copy; Copyright <strong><span>{{ ApplicationHelper::getSetting()->appname }}</span></strong>.
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
    <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.js"></script>
    <script>
        var showLoadingAlert = function () {
            Swal.fire({
                title: "Mohon tunggu...",
                html: "<i class=\"fa fa-spinner fa-spin\"></i> Processing...",
                icon: "info",
                showConfirmButton: false,
                allowOutsideClick: false,
                allowEscapeKey: false
            })
        }

        var loadingDone = function () {
            Swal.close()
        }

    </script>
    <script>
        // $('#adsModal').modal('show');
        $('.carousel').carousel({
            interval: 2000
        })

    </script>

    {{-- <script>
    $('.carousel').carousel()
  </script> --}}

    <!-- Template Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>

    @stack('scripts')

</body>

</html>
