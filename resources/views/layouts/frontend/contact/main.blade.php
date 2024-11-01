@extends('layouts.frontend.app')
@section('content')

<main id="main">
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Kontak Kami</h2>
            </div>
            <div class="row gx-lg-0 gy-4">
                <div class="col-md-6">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe width="100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.517120813676!2d107.62090391468978!3d-6.948161694980089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e8607345ae0d%3A0x4be1438c45b50cb2!2sJl.%20Suryalaya%20XVIII%2C%20Cijagra%2C%20Kec.%20Lengkong%2C%20Kota%20Bandung%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1666634888476!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form action="{{ route('contact.sendMessage') }}" method="post" role="form" class="php-email-form">
                        @csrf

                        <div class="row">
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nama Lengkap" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="No. Handphone" required>
                            </div>
                            <div class="col-md-6 form-group mt-md-0">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subjek" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="7" placeholder="Pesan" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit">Kirim</button>
                        </div>
                    </form>
                </div><!-- End Contact Form -->
            </div>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="info-container" style="background-color: {{ ApplicationHelper::getSetting()->theme_color }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="info-item d-flex" style="background-color: #fc5356;">
                                    <i class="bi bi-geo-alt flex-shrink-0"></i>
                                    <div>
                                        <h4>Alamat Kantor:</h4>
                                        <p>{{ ApplicationHelper::getSetting()->office_address }}</p>
                                    </div>
                                </div><!-- End Info Item -->
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="info-item d-flex" style="background-color: #fc5356;">
                                    <i class="bi bi-envelope flex-shrink-0"></i>
                                    <div>
                                        <h4>Email:</h4>
                                        <p>{{ ApplicationHelper::getSetting()->email }}</p>
                                    </div>
                                </div><!-- End Info Item -->
                            </div>
                            <div class="col-md-6">
                                <div class="info-item d-flex" style="background-color: #fc5356;">
                                    <i class="bi bi-phone flex-shrink-0"></i>
                                    <div>
                                        <h4>Telp:</h4>
                                        <p>{{ ApplicationHelper::getSetting()->phone }}</p>
                                    </div>
                                </div><!-- End Info Item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
</main>
@endsection