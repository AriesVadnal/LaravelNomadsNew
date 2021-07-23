@extends('layouts.checkout')

@section('title','Checkout')

@section('content')
<main>
      <section class="section-details-header">
         <section class="section-details-content">
           <div class="container">
             <div class="row">
               <div class="col p-0">
                 <nav>
                   <ol class="breadcrumb">
                     <li class="breadcrumb-item">
                       Paket Travel
                     </li>
                     <li class="breadcrumb-item">
                      Details
                    </li>
                    <li class="breadcrumb-item active">
                      Checkout
                    </li>
                   </ol>
                 </nav>
               </div>
             </div>

             <div class="row">
               <div class="col-lg-8 pl-lg-0 mb-5">
                 <div class="card card-details">

                   @if($errors->any())
                   <div class="alert alert-danger">
                     <ul>
                       @foreach ( $errors->all() as $error )
                         <li>{{ $error }}</li>
                       @endforeach
                     </ul>
                   </div>
                  @endif

                   <h1>Who Is Going</h1>
                   <p>
                     Trip To {{ $item->travel_package->title}}, {{ $item->travel_package->location }}
                   </p>
                   <div class="anttendee">
                     <table class="table table-responsive-sm text-center">
                       <thead>
                         <tr>
                           <td>Picture</td>
                           <td>Name</td>
                           <td>Nasionality</td>
                           <td>Visa</td>
                           <td>Passport</td>
                           <td></td>
                         </tr>
                       </thead>
                       <tbody>
                         @forelse ( $item->details as $detail )
                          <tr>
                          <td>
                            <img src="https://ui-avatars.com/api/?name={{ $detail->username }}" alt="" height="60" class="rounded-circle">
                           </td>
                           <td class="align-middle">
                               {{ $detail->username }}
                           </td>
                           <td class="align-middle">
                               {{ $detail->nationality }}
                           </td>
                           <td class="align-middle">
                              {{ $detail->is_visa ? '30 Days' : 'N/A'}}
                           </td>
                           <td class="align-middle">
                             {{ \Carbon\Carbon::createFromDate($detail->doe_passport) > 
                             \Carbon\Carbon::now() ? 'Active' : 'Inactive'}}
                           </td>
                           <td class="align-middle">
                             <a href="{{ route('checkout_remove', $detail->id )}}">
                               <img src="{{ url('frontend/assets/images/delete@2x.png')}}" alt="">
                             </a>
                           </td>
                        </tr>
                         @empty
                            <tr>
                              <td colspan="6" class="text-center">
                                No Visitor
                              </td>
                            </tr>
                         @endforelse
                       </tbody>
                     </table>
                   </div>

                   <div class="member mt-3">
                     <h2>Add Members</h2>
                     <form class="form-inline" method="post" action="{{ route('checkout_create', $item->id )}}">
                     @csrf
                        
                       <label for="username" class="sr-only">Name</label>
                       <input type="text" name="username" class="form-control mb-2 mr-sm-2" id="username" placeholder="username">

                       <label for="inputUsername" class="sr-only">Nationality</label>
                       <input type="text" name="nationality" class="form-control mb-2 mr-sm-2" id="nationality" placeholder="Nationality">

                       <label for="inputVisa" class="sr-only">VISA</label>
                       <select name="is_visa" id="inputVisa" class="custom-select mb-2 mr-sm-2">
                          <option value="" selected>VISA</option>
                          <option value="1">30 Days</option>
                          <option value="0">N/A</option>
                       </select>

                       <label for="deopassport" class="sr-only"> DOE Passport</label>
                       <div class="input-group mb-2 mr-sm-2">
                         <input type="date" name="doe_passport" class="form-control datepicker" id="deopassport" placeholder="DEO Passport">
                       </div>

                       <button type="submit" class="btn btn-primary mb-2 px-4">Add Now</button>
                     </form>
                     <h3 class="mt-2 mb-0">Note</h3>
                     <p class="disclaimer mb-0">
                      You are only able to invite member that has registered in Nomads
                     </p>
                   </div>
                 </div>
               </div>

               <div class="col-lg-4">
                 <div class="card card-details card-right">
                   <h2>Checkout Information</h2>
                   <table class="trip-informations">
                     <tr>
                       <th width="50%">Members</th>
                       <td width="50%" class="text-right">
                        {{ $item->details->count() }} Person
                       </td>
                     </tr>
                     <tr>
                      <th width="50%">Additional VISA</th>
                      <td width="50%" class="text-right">
                        $ {{ $item->additional_visa}},00
                      </td>
                    </tr>
                    <tr>
                      <th width="50%">Trip Price</th>
                      <td width="50%" class="text-right">
                        $ {{ $item->travel_package->price}},00 / person
                      </td>
                    </tr>
                    <tr>
                      <th width="50%">Sub Total</th>
                      <td width="50%" class="text-right">
                        $ {{ $item->transaction_total}},00
                      </td>
                    </tr>
                    <tr>
                      <th width="50%">Total (+Unique Code)</th>
                      <td width="50%" class="text-right text-total">
                        <span class="text-blue">${{ $item->transaction_total }}, <span class="text-orange">{{ mt_rand(0,99)}}</span></span>
                      </td>
                    </tr>
                   </table>
                   <hr>
                   <h2>Payment Instructions</h2>
                   <p class="payment-instruction">
                     Payment
                   </p>
                   <img src="{{ url('/frontend/assets/images/gopay.png')}}" alt="" width="150">
                 </div>

                 <div class="join-container">
                   <a href="{{ route('checkout_success', $item->id)}}" class="btn btn-block btn-join mt-3 py-2">
                    Checkout Process
                   </a>
                 </div>

                 <div class="text-center mt-3 mb-5">
                   <a href="{{ route('detail', $item->travel_package->slug)}}" class="text-muted">
                     Cancle Booking
                   </a>
                 </div>
               </div>
             </div>
           </div>
         </section>
      </section>
    </main>
@endsection

@push('prepend_style')
   <link rel="stylesheet" href="{{ url('frontend/assets/gijgo/css/gijgo.min.css')}}">
@endpush

@push('addon_script')
<script src="{{ url('frontend/assets/gijgo/js/gijgo.min.js')}}"></script>
    <script>
      $(document).ready(function(){
        $('.xzoom, .xzoom-gallery').xzoom({
          zoomWidth: 500,
          title: false,
          tint: '#333',
          xoffset: 15
        })

        $('.datepicker').datepicker({
          format: 'yyyy-mm-dd',
          uiLibrary: 'bootstrap4',
          icons: {
            rightIcon: '<img src="{{ url('frontend/assets/images/ic@2x.png')}}" / width="15">'
          }
        })
      });
    </script>
@endpush