<x-guest-layout>

    <!-- ------------------------ Menu Hero Section ------------------------ -->
    <section>
        <div class="container">
            <div class="mt-4 mt-md-0 mb-3 bg-warning text-dark rounded-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 p-5 my-auto align-center">
                            <h1 class="display-5 fw-bold">Katalog Menu Makanan & Minuman Restawuran</h1>
                            <p class="col-md-10">
                                Disini kalian bisa nemuin semua menu dengan berbagai macam kategori yang dapat kalian
                                pesan
                                di restoran kami, scroll kebawah ya!
                            </p>
                            <button class="btn btn-outline-light text-dark px-4 fw-bold" type="button">
                                Lihat semua &nbsp; <i class="fas fa-arrow-down"></i>
                            </button>
                        </div>
                        <div class="col-md-4 my-auto p-0">
                            <img src="{{ url('images/landing-page/user-listing-images-removebg-preview-2.png') }}"
                                class="img-fluid img-jumbotron d-none d-md-block" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ------------------------ Menu Main Content [Filter & Menu Card] Section ------------------------ -->
    <section>
        <div class="container" style="margin-bottom: 100px">
            <div class="row">
                
                <div>
                    <div class="alert alert-warning" role="alert">
                        Terdapat total {{ DB::table('menus')->count() }} menu yang tersedia di katalog menu restoran
                        kami
                    </div>
                    <div class="row">
                        @foreach ($menus as $menu)
                            <div class="col-md-3">
                                <div class="card card-borderless-shadow card-min-height">
                                    <img src="{{ Storage::url($menu->image) }}"
                                        class="card-img-top card-img-top-menus" />
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold"> {{ $menu->name }}</h5>
                                        <div class="category-card-description-wrapper">
                                            <p class="card-text category-card-description" style="font-size: 13px;">
                                                {{ $menu->description }}
                                            </p>
                                        </div>
                                        <hr>
                                        <h5 class="fw-semibold">Rp.{{ $menu->price }}.000,-</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-guest-layout>
