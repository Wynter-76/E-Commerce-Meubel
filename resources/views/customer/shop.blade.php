@extends('layouts.master')
@section('title','Shop')
@section('content')
		<!-- Start Hero Section -->
		@section('hero')
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Shop</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		@endsection
		<!-- End Hero Section -->

		

		<div class="untree_co-section product-section before-footer-section">
		    <div class="container">
		      	<div class="row">

		      		{{-- Start Loop Product --}}
					@foreach ($data as $item)
					<div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item" href="{{ route('customer.shop', $item->id) }}">
							<img src="{{ asset('storage/' . $item->gambar) }}" class="img-fluid product-thumbnail">
							<h3 class="product-title">{{ $item->nama_barang }}</h3>
							<strong class="product-price">
								Rp. {{ number_format($item->harga, 0, ',', '.') }}
							</strong>
							<form action="{{ route('quick.add', $item->id) }}"
							method="POST"
							class="text-center mt-2">
							@csrf
							<button type="submit" class="btn p-0 border-0 bg-transparent">
								<span class="icon-cross">
									<img src="{{ asset('storage/images/cross.svg') }}"
										class="img-fluid">
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
