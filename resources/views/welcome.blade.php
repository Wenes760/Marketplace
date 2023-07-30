@extends('layouts.pages.main')

@section('welcome', 'active')

@section('content')
  <!-- Background image -->
  <div id="intro-example" class="p-5 mt-n2 text-center bg-image"
    style="position: relative; width: 100%; height: 100vh; background-image: url('http://sitimustiani.com/wp-content/uploads/2020/09/Ranca-Bali-Ciwidey.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center center;">
    <div class="mask"
      style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.39);">
      <div class="d-flex justify-content-center align-items-center h-100">
        <div class="text-white" style="text-align: center; padding: 5rem;">
          <h1 class="mb-3 fw-bold display-1">Restani</h1>
          <h6 class="mb-4 fs-2 display-6">Temukan hasil pertanian dan perkebunan terdekat tanpa perantara</h6>
          <a class="btn btn-success btn-lg text-capitalize fs-5 fw-normal rounded-pill mt-5 m-2" href="/shop"
            role="button">Mulai Sekarang</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Background image -->
@endsection
