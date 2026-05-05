@extends('layouts.master')
@section('title', 'Shop')

{{-- ===== SLIDER SECTION ===== --}}
@section('slider')
<div class="slider-wrapper">
    <div class="slider-container" id="sliderContainer">
        <div class="slide active" style="background-image: url('{{ asset('template_customer/images/slide1.jpg') }}')"></div>
        <div class="slide" style="background-image: url('{{ asset('template_customer/images/slide2.jpg') }}')"></div>
        <div class="slide" style="background-image: url('{{ asset('template_customer/images/slide3.jpg') }}')"></div>
    </div>

    {{-- Tombol navigasi --}}
    <button class="slider-btn prev" id="prevBtn" aria-label="Previous slide">&#10094;</button>
    <button class="slider-btn next" id="nextBtn" aria-label="Next slide">&#10095;</button>

    {{-- Dots indikator --}}
    <div class="slider-dots" id="sliderDots">
        <span class="dot active" data-index="0"></span>
        <span class="dot" data-index="1"></span>
        <span class="dot" data-index="2"></span>
    </div>
</div>
@endsection

@section('before_content')
<div class="section-divider">
    <h2>Best Sellers</h2>
</div>
@endsection


{{-- ===== CONTENT SECTION ===== --}}
@section('content')
<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="row">
            {{-- Loop Product --}}
            @foreach ($data as $item)
            <div class="col-12 col-md-4 col-lg-3 mb-5">
                <a class="product-item" href="{{ route('customer.shop', $item->id) }}">
                    <img src="{{ asset('storage/' . $item->gambar) }}" class="img-fluid product-thumbnail">
                    <h3 class="product-title">{{ $item->nama_barang }}</h3>
                    <strong class="product-price">
                        Rp. {{ number_format($item->harga, 0, ',', '.') }}
                    </strong>
                    <form action="{{ route('quick.add', $item->id) }}" method="POST" class="text-center mt-2">
                        @csrf
                        <button type="submit" class="btn p-0 border-0 bg-transparent">
                            <span class="icon-cross">
                                <img src="{{ asset('template_customer/images/cross.svg') }}" class="img-fluid">
                            </span>
                        </button>
                    </form>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

{{-- ===== SCRIPTS ===== --}}
@push('scripts')
<script>
    (function () {
        const slides = document.querySelectorAll('.slide');
        const dots   = document.querySelectorAll('.dot');
        let current  = 0;
        let timer;

        function goTo(index) {
            slides[current].classList.remove('active');
            dots[current].classList.remove('active');
            current = (index + slides.length) % slides.length;
            slides[current].classList.add('active');
            dots[current].classList.add('active');
        }

        function autoPlay() {
            timer = setInterval(() => goTo(current + 1), 4000);
        }

        function resetTimer() {
            clearInterval(timer);
            autoPlay();
        }

        document.getElementById('prevBtn').addEventListener('click', function () {
            goTo(current - 1);
            resetTimer();
        });

        document.getElementById('nextBtn').addEventListener('click', function () {
            goTo(current + 1);
            resetTimer();
        });

        dots.forEach(function (dot) {
            dot.addEventListener('click', function () {
                goTo(parseInt(this.dataset.index));
                resetTimer();
            });
        });

        autoPlay();
    })();
</script>
@endpush