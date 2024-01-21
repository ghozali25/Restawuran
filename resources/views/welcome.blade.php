<x-guest-layout>

    <!-- ------------------------ Splide Hero Section ------------------------ -->
    <section class="splide my-4" aria-label="Splide Basic HTML Example">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">
                    <a href="{{ url('/menus') }}">
                        <img src="{{ url('images/splide/landing-page/hero-slide-1.png') }}" class="d-block w-100"
                            style="border-radius:8px;">
                    </a>
                </li>
                <li class="splide__slide">
                    <a href="{{ url('/reservation/step-one') }}">
                        <img src=" {{ url('images/splide/landing-page/hero-slide-2.png') }}" class="d-block w-100"
                            style="border-radius:8px;">
                    </a>
                </li>
               <!-- <li class="splide__slide">
                    <a href="{{ url('/reservation/step-one') }}">
                        <img src="{{ url('images/splide/landing-page/hero-slide-3.png') }}" class="d-block w-100"
                            style="border-radius:8px;">
                    </a>
                </li>
                <li class="splide__slide">
                    <img src="{{ url('images/splide/landing-page/hero-slide-4.png') }}" class="d-block w-100"
                        style="border-radius:8px;">
                </li>-->
            </ul>
        </div>
    </section>

    <!-- ------------------------ Logo List Section ------------------------ -->
    <section class="logo-list d-none d-sm-none d-md-none d-lg-block">
        <div class="container py-2">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="#"><img src="{{ url('images/logo/7.png') }}" class="img-fluid"
                            alt="Gofood logo" /></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="#"><img src="{{ url('images/logo/8.png') }}" class="img-fluid"
                            alt="Shopeefood logo" /></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="#"><img src="{{ url('images/logo/9.png') }}" class="img-fluid"
                            alt="Grabfood logo" /></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="#"><img src="{{ url('images/logo/10.png') }}" class="img-fluid"
                            alt="Maxim logo" /></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="#"><img src="{{ url('images/logo/11.png') }}" class="img-fluid"
                            alt="Traveloka logo" /></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="#"><img src="{{ url('images/logo/12.png') }}" class="img-fluid"
                            alt="Oyo logo" /></a>
                </div>
            </div>
        </div>
    </section>

    <!-- ------------------------ Menu Card Section ------------------------ -->
    <section class="my-100">
        <div class="container">
            <div class="row mt-5 text-center">
                <small class="text-warning text-uppercase fw-bold">Menu Spesial buat Kamu dan Orang Spesial</small>
                <h1 class="fw-bold">Coba menu spesial kami hari ini!</h1>
                <p>Jangan lupa buat reservasi dulu di website kami ya, kalau masih kepo sama menu bisa liat liat
                    dulu kok</p>
            </div>
            <div class="row mt-4">
                <div class="container">
                    <div class="swiper menu-swiper">
                        <div class="swiper-wrapper">
                            @forelse ($menus as $menu)
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img src="{{ Storage::url($menu->image) }}"
                                            class="card-img-top card-img-top-landing-page" />
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold"> {{ $menu->name }}</h5>
                                            <div class="category-card-description-wrapper">
                                                <p class="card-text category-card-description" style="font-size: 13px;">
                                                    {{ $menu->description }}
                                                </p>
                                            </div>
                                            <hr>
                                            <h5 class="fw-semibold">Rp.{{ $menu->price }}.000,00</h5>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>Belum ada menu bray</p>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="container mt-4">
                    <div class="row">
                        <a href="{{ url('/menus') }}"
                            class="btn btn-warning text-white px-4 mx-auto text-center col-10 col-md-3 my-3 fw-bold">Lihat
                            Semua
                            &nbsp; <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ------------------------ #1 Feature Section ------------------------ -->
    <section class="my-100" id="tentang-kami">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-7 mb-4 mb-lg-0 my-auto">
                    <div class="splide splide2">
                        <div class="splide__track">
                            <div class="splide__list">
                                <div class="splide__slide" data-splide-interval="600">
                                    <img src="{{ url('images/landing-page/reservation-features-images.png') }}"
                                        class="img-fluid shadow-images" />
                                </div>
                                <div class="splide__slide" data-splide-interval="600">
                                    <img src="{{ url('images/landing-page/reservation-features-images-2.png') }}"
                                        class="img-fluid shadow-images" />
                                </div>
                                <div class="splide__slide" data-splide-interval="600">
                                    <img src="{{ url('images/landing-page/reservation-features-images-3.png') }}"
                                        class="img-fluid shadow-images" />
                                </div>
                                <div class="splide__slide" data-splide-interval="600">
                                    <img src="{{ url('images/landing-page/reservation-features-images-4.png') }}"
                                        class="img-fluid shadow-images" />
                                </div>
                                <div class="splide__slide" data-splide-interval="600">
                                    <img src="{{ url('images/landing-page/reservation-features-images-5.png') }}"
                                        class="img-fluid shadow-images" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="
                    col-12 col-md-12 col-lg-4
                    ms-auto
                    text-center text-md-start text-lg-start
                    my-auto
                  ">
                    <p class="mb-0 fw-bold text-warning">FITUR RESERVASI</p>
                    <h2 class="fw-bold">Gak usah ribet nanyain menu dan booking tempat!</h2>
                    <div class="row mt-4">
                        <div class="col-3 col-md-2 col-lg-3 mx-auto">
                            <div class="p-1 bg-warning rounded-logo text-center">
                                <i class="fab fa-wpforms py-3" style="color: white; font-size:24px"></i>
                            </div>
                        </div>
                        <div class="col-12 col-md-10 col-lg-9 mt-3 mt-md-0 mt-lg-0">
                            <h5 class="mb-1 fw-semibold">Isi Data Diri Kamu</h5>
                            <small>Nama, nomor telepon dan email yang bisa kami hubungi</small>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-3 col-md-2 col-lg-3 mx-auto">
                            <div class="p-1 bg-warning rounded-logo text-center">
                                <i class="fas fa-chair py-3" style="color: white; font-size:24px"></i>
                            </div>
                        </div>
                        <div class="col-12 col-md-10 col-lg-9 mt-3 mt-md-0 mt-lg-0">
                            <h5 class="mb-1 fw-semibold">Pilih Menu & Meja</h5>
                            <small>Pilih tempat meja dan tentukan tanggal serta jam juga menu nya</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ------------------------ Category Cards Section ------------------------ -->
    <section class="my-100">
        <div class="container">
            <div class="text-center mb-5">
                <small class="text-warning fw-bold text-uppercase">Kategori Makanan Yang Tersedia di
                    Restawuran</small>
                <h1 class="fw-bold">Kategori Makanan & Minuman</h1>
                <p>Mau cari minuman, makanan, dessert atau oleh oleh ada kategorinya nih</p>
            </div>
            <div class="row g-3">
                @forelse ($categories as $cat)
                    <div class="col-md-4 col-lg-3">
                        <div class="card card-in-home bg-warning text-dark text-center">
                            <img class="card-img-top card-img-top-category-landing-page"
                                src="{{ Storage::url($cat->image) }}" alt="" srcset="">
                            <div class="card-body">
                                <h5 class="card-title fw-bold mt-1">{{ $cat->name }}</h5>
                                <div class="category-card-description-wrapper">
                                    <p class="card-text category-card-description" style="font-size: 14px;">
                                        {{ $cat->description }}
                                    </p>
                                </div>
                                <a href="{{ route('categories.show', $cat->id) }}"
                                    class="btn btn-outline-dark fs-12">Lihat Semua &nbsp;
                                    <small class="arrow-category-button">→</small></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>gak ada kategori euy</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ------------------------ #2 Feature Section ------------------------ -->
    <section class="my-100">
        <div class="container">
            <div class="row">
                <div
                    class="
                    order-2 order-md-1
                    col-12 col-md-12 col-lg-4
                    me-auto
                    text-center text-md-start text-lg-start
                    my-auto
                  ">
                    <p class="mb-0 fw-bold text-warning">DIANTERIN KERUMAH</p>
                    <h2 class="fw-bold">Cocok buat kalian yang suka rebahan dan males keluar</h2>
                    <div class="row mt-4">
                        <div class="col-3 col-md-2 col-lg-3 mx-auto">
                            <div class="p-1 bg-warning rounded-logo text-center">
                                <i class="fas fa-search py-3" style="color: white; font-size:24px"></i>
                            </div>
                        </div>
                        <div class="col-12 col-md-10 col-lg-9 mt-3 mt-md-0 mt-lg-0">
                            <h5 class="mb-1 fw-semibold">Pilih Menu</h5>
                            <small>Pilih menu di aplikasi kami dan isi alamat dan data diri kamu</small>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-3 col-md-2 col-lg-3 mx-auto">
                            <div class="p-1 bg-warning rounded-logo text-center">
                                <i class="fas fa-motorcycle py-3" style="color: white; font-size:24px"></i>
                            </div>
                        </div>
                        <div class="col-12 col-md-10 col-lg-9 mt-3 mt-md-0 mt-lg-0">
                            <h5 class="mb-1 fw-semibold">Makanan Dijalan</h5>
                            <small>Tungguin makanan akan dianterin driver kami ke alamat kamu</small>
                        </div>
                    </div>
                </div>
                <div
                    class="
                    order-1 order-md-2
                    col-12 col-md-12 col-lg-7
                    mb-4
                    mt-lg-0
                    mb-lg-0
                    overlay-container
                  ">
                    <img src="{{ url('images/landing-page/video.png') }}"
                        class="img-fluid shadow-images img-video" />
                    <!-- The overlay area -->
                    <div class="container__overlay">
                        <!-- The player button -->
                        <a target="_blank" href="https://www.youtube.com/">
                            <i class="fas fa-play-circle text-white play-button"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ------------------------ Gallery Pictures Section ------------------------ -->
    <section class="my-100" id="galeri-outlet">
        <div class="container">
            <div class="text-center mb-5">
                <small class="text-warning fw-bold text-uppercase">Foto dan Dokumentasi di outlet kami</small>
                <h1 class="fw-bold">Galeri & Dokumentasi di Outlet</h1>
                <p>Buat kalian yang penasaran sama tempatnya kayak gimana tapi tempatnya nyaman kok hehehe</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                    <img src="https://interiordesign.id/wp-content/uploads/2023/07/572925073777638b2481530002052b31.jpg"
                        class="w-100 shadow-1-strong rounded mb-4" alt="Outdoor 1" />

                    <img src="https://interiordesign.id/wp-content/uploads/2023/07/1-11.jpg"
                        class="w-100 shadow-1-strong rounded mb-4" alt="Outdoor 2" />

                        <img src="https://cdn.pergidulu.com/wp-content/uploads/2022/02/Coffee-Shop-Baru-di-Bandung-2022.jpeg"
                        class="w-100 shadow-1-strong rounded mb-4" alt="Coffee" />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                    <img src="https://interiordesign.id/wp-content/uploads/2023/07/5-12.jpg"
                        class="w-100 shadow-1-strong rounded mb-4" alt="Outdoor 3" />

                    <img src="https://interiordesign.id/wp-content/uploads/2023/07/6-5.jpg"
                        class="w-100 shadow-1-strong rounded mb-4" alt="Outdoor 4" />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                    <img src="https://ds393qgzrxwzn.cloudfront.net/resize/m720x480/cat1/img/images/0/zWTVqgzGpF.jpg"
                        class="w-100 shadow-1-strong rounded mb-4" alt="Coffee 1" />

                    <img src="https://awsimages.detik.net.id/community/media/visual/2021/09/24/5-coffee-shop-di-bandung-ini-cocok-buat-nyantai-dan-foto-ootd_43.jpeg?w=1200"
                        class="w-100 shadow-1-strong rounded mb-4" alt="Coffee Shop" />

                        <img src="https://assets-pergikuliner.com/INR3DyV2wQorTbhu2wVbT1DzMQo=/fit-in/1366x768/smart/filters:no_upscale()/https://assets-pergikuliner.com/uploads/bootsy/image/19193/coffee_shop_di_puri.jpg"
                        class="w-100 shadow-1-strong rounded mb-4" alt="Coffee 2" />
                </div>
            </div>
        </div>
    </section>

    <!-- ------------------------ Testimonials Section ------------------------ -->
    <section class="my-100">
        <div class="container">
            <div class="text-center mb-5">
                <small class="text-warning fw-bold text-uppercase">Apa kata mereka tentang kami?</small>
                <h1 class="fw-bold">Testimoni dari Para Pelanggan</h1>
                <p>Biar kalian makin yakin buat ke tempat kami karena kata orang orang bagus dan kece dong</p>
            </div>
            <div class="row">
                <div class="container">
                    <div class="swiper testimonial-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="card card-in-home bg-warning text-black">
                                    <div class="card-body">
                                        <h5 class="card-title lh-lg">⭐⭐⭐⭐⭐</h5>
                                        <h5 class="card-title lh-lg fw-bold">
                                            Tempat nyaman dan aman
                                        </h5>
                                        <p class="card-text mb-4">
                                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum a eveniet
                                            consectetur ipsum accusantium alias dignissimos
                                        </p>
                                        <hr />
                                        <div class="row">
                                            <div class="col-2 col-md-2 my-auto">
                                                <img src="https://www.sibberhuuske.nl/wp-content/uploads/2016/10/default-avatar.png"
                                                    class="img-fluid rounded" />
                                            </div>
                                            <div class="col-10 col-md-10 my-auto">
                                                <p class="mb-0 fw-bold">
                                                    Ali
                                                </p>
                                                <small>Orang Gabut, 27 tahun</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card card-in-home bg-warning text-black">
                                    <div class="card-body">
                                        <h5 class="card-title lh-lg">⭐⭐⭐⭐⭐</h5>
                                        <h5 class="card-title lh-lg fw-bold">
                                            Makanan Enak Banget Banget!
                                        </h5>
                                        <p class="card-text mb-4">
                                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum a eveniet
                                            consectetur ipsum accusantium alias dignissimos
                                        </p>
                                        <hr />
                                        <div class="row">
                                            <div class="col-2 col-md-2 my-auto">
                                                <img src="https://www.sibberhuuske.nl/wp-content/uploads/2016/10/default-avatar.png"
                                                    class="img-fluid rounded" />
                                            </div>
                                            <div class="col-10 col-md-10 my-auto">
                                                <p class="mb-0 fw-bold">
                                                    Maurizka
                                                </p>
                                                <small>Si Cantik, 25 tahun</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card card-in-home bg-warning text-black">
                                    <div class="card-body">
                                        <h5 class="card-title lh-lg">⭐⭐⭐⭐⭐</h5>
                                        <h5 class="card-title lh-lg fw-bold">
                                            Pegawai nya cantik dan ganteng
                                        </h5>
                                        <p class="card-text mb-4">
                                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum a eveniet
                                            consectetur ipsum accusantium alias dignissimos
                                        </p>
                                        <hr />
                                        <div class="row">
                                            <div class="col-2 col-md-2 my-auto">
                                                <img src="https://www.sibberhuuske.nl/wp-content/uploads/2016/10/default-avatar.png"
                                                    class="img-fluid rounded" />
                                            </div>
                                            <div class="col-10 col-md-10 my-auto">
                                                <p class="mb-0 fw-bold">
                                                    Lutfhi
                                                </p>
                                                <small>Tukang Tidur, 27 tahun</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ------------------------ CTA Social Media Section ------------------------ -->
    <section>
        <div class="container mb-5">
            <div class="row rounded mx-auto " style="background-color: #fcca29">
                <div class="col-md-7 my-auto text-black px-5 py-5">
                    <h2 class="fw-bold text-black">Jangan lewatkan promo dari kami !!!</h2>
                    <p>
                        Pastikan kalian follow instagram dan twitter kami untuk informasi terkait promo, event, menu
                        baru atau giveaway bagi kalian para restawvers di seluruh Indonesia!
                    </p>
                    <a href='#' target="_blank" class="btn btn-outline-dark mt-2 px-4 py-2"
                        style="font-weight:500;">Follow Instagram
                        ⇾</a>
                </div>
                <div class="col-md-4 background-cta ms-auto">
                </div>
            </div>
        </div>
    </section>


</x-guest-layout>
