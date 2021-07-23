@extends('layouts.success')

@section('title','Success')

@section('content')
<main>
      <section class="section-success d-flex align-center">
        <div class="col text-center">
          <img src="{{ url('frontend/assets/images/email@2x.png')}}" alt="" width="270">
          <h1>Yay! Success</h1>
          <p>We’ve send email for trip interaction <br>
            Please read it as well</p>
            <a href="{{ route('home')}}" class="btn btn-home-page mt-3 px-5">Home Page</a>
        </div>
      </section>
    </main>
@endsection