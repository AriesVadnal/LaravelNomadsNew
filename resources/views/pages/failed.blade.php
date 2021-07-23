@extends('layouts.success')

@section('title','Success')

@section('content')
<main>
      <section class="section-success d-flex align-center">
        <div class="col text-center">
          <h1 class="mt-5">Opps .. </h1>
          <p>Payment is Failed</p>
            <a href="{{ route('home')}}" class="btn btn-home-page mt-3 px-5">Home Page</a>
        </div>
      </section>
    </main>
@endsection