@extends('layouts.success')

@section('title','Success')

@section('content')
<main>
      <section class="section-success d-flex align-center">
        <div class="col text-center">
          <h1 class="mt-5">Opps Unfinish</h1>
          <p>Payment haven't finished</p>
            <a href="{{ route('home')}}" class="btn btn-home-page mt-3 px-5">Home Page</a>
        </div>
      </section>
    </main>
@endsection