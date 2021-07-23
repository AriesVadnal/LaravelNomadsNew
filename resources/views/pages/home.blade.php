@extends('layouts.app')

@section('title','Home')

@section('content')
<!-- Header -->
<header class="text-center">
      <h1>Explore the Beautiful World<br>
        As Easy One Click</h1>
        <p class="mt-3">You will see beautiful<br>
          Moment you never see before</p>
          <a href="#popular" class="btn btn-get-started px-4 mt-4">
            Get Started
          </a>
    </header>
    <!-- End Header -->
<main>
      <div class="container">
        <section class="section-stats row justify-content-center" id="start">
           <div class="col-3 col-md-2 stats-detail">
             <h2>20K</h2>
             <p>Members</p>
           </div>
           <div class="col-3 col-md-2 stats-detail">
            <h2>12K</h2>
            <p>Countries</p>
          </div>
          <div class="col-3 col-md-2 stats-detail">
            <h2>3K</h2>
            <p>Hotel</p>
          </div>
          <div class="col-3 col-md-2 stats-detail">
            <h2>72</h2>
            <p>Partners</p>
          </div>
        </section>
      </div>



      <section class="section-popular" id="popular">
        <div class="container">
          <div class="row">
            <div class="col text-center section-popular-heading">
              <h2>Wisata Popular</h2>
              <p>Something that you never try<br>
                Before in this world</p>
            </div>
          </div>
        </div>
      </section>

      <section class="section-popular-content container" id="popularContent">
        <div class="section-popular-travel row justify-content-center">
        @foreach ( $items as $item )
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card-travel text-center d-flex flex-column" style="background-image: url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}');">
              <div class="travel-country">{{ $item->location }} </div>
              <div class="travel-location">{{ $item->title }}</div>
              <div class="travel-button mt-auto">
                <a href="{{ route('detail', $item->slug)}}" class="btn btn-travel-details px-4">
                  View Details
                </a>
              </div>
            </div>
          </div>
        @endforeach
        </div>
      </section>

      <section class="section-networks" id="networks">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <h2>Our Network</h2>
              <p>Companies are trusted us<br>
                More then just a trip</p>
            </div>
            <div class="col-md-8 text-center">
              <img src="{{ url('frontend/assets/images/partner@2x.png')}}" alt="" class="img-partner" width="100%">
            </div>
          </div>
        </div>
      </section>

      <section class="section-testimonial-heading" id="testimonialheading">
        <div class="container">
          <div class="row">
            <div class="col text-center">
              <h2>They are Loving Us</h2>
              <p>Moments were giving them<br>
                Then best experience</p>
            </div>
          </div>
        </div>
      </section>


      <section class="section section-testimonial-content" id="testimonialContent">
        <div class="container">
          <div class="section-popular-travel row justify-content-center">
            <div class="col-sm-6 col-md-6 col-lg-4">
              <div class="card card-testimonial text-center">
                <div class="testimonial-content">
                  <img src="{{ url('frontend/assets/images/angga@2x.jpg')}}" alt="" class="mb-4 rounded-circle">
                  <h3 class="mb-4">Angga Rizky</h3>
                  <p class="testimonial">
                    “ It was glorious and I cloud
                      Not stop to say wohooo for
                      Every single moment
                      Dankeeeeee “
                  </p>
                </div>
                <hr>
                <p class="trip-to mt-2">
                  Trip To Ubud
                </p>
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
              <div class="card card-testimonial text-center">
                <div class="testimonial-content">
                  <img src="{{ url('frontend/assets/images/richard@2x.jpg')}}" alt="" class="mb-4 rounded-circle">
                  <h3 class="mb-4">Richard Heinzee</h3>
                  <p class="testimonial">
                    “ The trip was amazing and
                    I saw something beautiful in
                    That City  that make me
                    Want to learn more “
                  </p>
                </div>
                <hr>
                <p class="trip-to mt-2">
                  Trip to Dubai, Indonesia
                </p>
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
              <div class="card card-testimonial text-center">
                <div class="testimonial-content">
                  <img src="{{ url('frontend/assets/images/aries@2x.jpg')}}" alt="" class="mb-4 rounded-circle">
                  <h3 class="mb-4">Aries Vadnal</h3>
                  <p class="testimonial">
                    “ I loved it when the waves
                    Was shaking header - I was
                    Scared too “
                  </p>
                </div>
                <hr>
                <p class="trip-to mt-2">
                  Trip to Karimun, Indonesia
                </p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 text-center">
              <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">
                I Need Help
              </a>
              <a href="{{ route('register')}}" class="btn btn-get-started px-4 mt-4 mx-1">
                Get Started
              </a>
            </div>
          </div>
        </div>
      </section>

    </main>
@endsection