@extends('master')

@section('content')
    
<div class="main-container">
        
  <div class="checkoutHeader">
      <ul>
          <li><a href="om.com/carts">SHOPPING CART</a><i class="fa fa-2x fa-angle-right"></i></li>
          <li><a href="" style="color: #ccc;">CHECKOUT DETAILS</a><i class="fa fa-2x fa-angle-right" style="color: #ccc;"></i></li>
          <li><a href="" style="color: #ccc;">ORDER COMPLETE</a></li>
      </ul>
  </div>
  
  <div class="checkoutPage">
      <div class="container">
                    <div>
                      </div>
          <div>
                                                          </div>
  <form class="form-horizontal" action="{{url('orderplacement/success')}}" method="POST" enctype="multipart/form-data">
     @csrf
 <div class="row">
              <div class="col-md-7">
                  <div class="checkoutForm">
                      <h4>BILLING &amp; SHIPPING</h4>
                      <div class="row mb-3">
                          <div class="col-12">
                              <label for="last_name"> Name *</label>
                              <input type="text" value="" name="name" class="form-control" placeholder="Enter Name" required="">
                                                                                  </div>
                          
                      </div>
                      
                      <div class="row mb-3">
                          <div class="col-12">
                              <label for="company_name">Company name (optional)</label>
                              <input type="text" name="company" value="" class="form-control" placeholder="Company Name">
                                                      </div>
                      </div>
                      
                      <div class="row mb-3">
                          <div class="col-md-6">
                              <label>Country / Region *</label>
                              <h5 style="color: #bfc400; margin: 0;">Bangladesh</h5>
                          </div>
                          <div class="col-md-6">
                              <label for="city_name">Town / City *</label>
                              <input type="text" name="city" value="" class="form-control" placeholder="Enter Town/City Name" required="">
                                                      </div>
                      </div>
                      
                      <div class="row mb-3">
                          <div class="col-md-6">
                              <label for="postal_code">Postcode / ZIP *</label>
                              <input type="text" name="postal_code" value="" class="form-control" placeholder="Enter Poscode /ZIP" required="">
                                                      </div>
                          <div class="col-md-6">
                              <label for="prefecture">Prefecture *</label>
                              <select class="form-control prefectureArea" name="prefecture" required="">
                                  <option value="">Select Area</option>
                                  <option value="Hajiganj">
                                    Hajiganj</option>
                                    <option value="Chandpur">Chandpur</option>
                                    <option value="Kachua">Kachua</option>
                                    <option value="Lokkipur">Lokkipur</option>
                                    <option value="Comilla">Comilla</option>
                                    <option value="Chandina">Chandina</option>
                                    <option value="Chittagong">Chittagong</option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Rajshahi">Rajshahi</option>
                                    <option value="shylet">shylet</option>
                                    <option value="Rongpur">Rongpur</option>
                                    <option value="Khulna">Khulna</option>
                                    <option value="Borishal">Borishal</option>
                                                              </select>
                                                      </div>
                      </div>
              
                      <div class="row mb-3">
                          <div class="col-12">
                              <label for="address">Street address *</label>
                              <input type="text" name="address" class="form-control" value="" placeholder="House Number &amp; Street name" required="">
                                                      </div>
                      </div>
                      
                      <div class="row mb-3">
                          <div class="col-md-6">
                              <label for="mobile">Phone *</label>
                              <input type="text" name="mobile" class="form-control" value="" placeholder="Enter Phone Number" required="">
                                                      </div>
                          <div class="col-md-6">
                              <label for="email">Email Address *</label>
                              <input type="email" name="email" value="" class="form-control" placeholder="Enter Email Address" required="">
                                                      </div>
                      </div>
                  
                      
                      <div class="row mb-3">
                          <div class="col-md-12"><span style="display: block;color: #ffa835;">We will try our best to deliver your order on the specified date.</span></div>
                          <div class="col-md-6 selectDateDelivery">
                              <label for="delivery_date">Delivery Date*</label>
  <input type="taxt" readonly="" class="form-control hasDatepicker" name="delivery_date" placeholder="Select Delivery Date" id="datepicker" style="cursor: pointer;" required="">
  
  
  
  
  <script>
      $(document).ready(function(){
          
          var lastDay =1;
          
          $( "#datepicker" ).datepicker({
            minDate: +lastDay,
           maxDate: "+30D",
           showTimezone: true, 
              timezone: "+9" 
          });
  
      });
  </script>                        </div>
                          <div class="col-md-6">
                              <label for="time_slot">Time Slot*</label>
                              <select class="form-control" name="time_slot" required="">
                                  <option value="">Select a time slot</option>
                                  <option value="09:00 - 12:00">09:00 - 12:00</option>
                                  <option value="09:00 - 21:00">09:00 - 21:00</option>
                                  <option value="14:00 - 16:00">14:00 - 16:00</option>
                                  <option value="16:00 - 18:00">16:00 - 18:00</option>
                                  <option value="18:00 - 20:00">18:00 - 20:00</option>
                                  <option value="19:00 - 21:00">19:00 - 21:00</option>
                              </select>
                                                      </div>
                      </div>
                      
  
                                           <div class="row">
                          <div class="col-12">
                              <h4>ADDITIONAL INFORMATION</h4>
                              <label>Order notes (optional)</label>
                              <textarea type="text" row="" name="note" col="" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                          </div>
                      </div>
                  </div>
              </div>
              
              <div class="col-md-5">
                <div class="checkoutInfo">
                    <h4>{{ __('messages.YOUR ORDER') }}</h4>
                    <table class="ordertable table">
                      <thead>
                        <tr>
                          <th style="width: 65%">{{ __('messages.PRODUCT') }}</th>
                          <th style="width: 35%; text-align: end;">{{ __('messages.SUBTOTAL') }}</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach(Cart::getContent() as $cartitem)
                                                <tr>
                          <th>{{$cartitem->name}}</th>
                          <td style="text-align: end;">
                            $ {{$cartitem->attributes->subtotal}}
                                              </td>
                        </tr>
                                                <tr>
                          <th>{{ __('messages.Subtotal') }}</th>
                          <td style="text-align: end;">¥ {{$cartitem->price}}</td>
                        </tr>
                        <tr>
                          <th>{{ __('messages.SHIPPING') }}</th>
                          <td style="text-align: end;">
                                                  ¥ 100.0
                                       </td>
                        </tr>
                        <tr>
                          <th>{{ __('messages.Tax')}}</th>
                          <td style="text-align: end;">¥ 39</td>
                        </tr>
                        <tr>
                          <th>{{ __('messages.Total') }}</th>
                          @php
      $a=array(Cart::getTotal(), 49, ((Cart::getSubTotal()*8)/100));
      $sum = array_sum($a);
      @endphp
       <input type="hidden" name="grandtotal" value="{{$sum}}">
   
                          <td style="text-align: end;">$ {{$sum}}</td>
                         
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    
                    <div class="cashonDelivery">
                        <p>{{ __('messages.Cash on delivery') }}</p>
                        <span>{{ __('messages.Pay with cash upon delivery.') }}</span>
                    </div>
                    
                    
                    
                    <button type="submit" class="placeOrderbtn">{{ __('messages.Place Order') }}</button>
                    
                    <p class="policy-text">{{ __('messages.personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our.') }} <a href=".com/sub/ecommercepro/polices">privacy policy.</a></p>
                </div>
            </div>
          </div>
          </form>
      </div>
  </div>
  
  
  <!-- Modal -->
  <div class="modal fade" id="loginModel">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Log In</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal form-simple" action="https://www.baticrom.com/baticromloginjapan" method="post">
                          <input type="hidden" name="_token" value="KtJXkd7ch3mS5FMrBVixVObNT27ziPFe7WM5uAQP">                        <input type="hidden" name="loginType" value="checkout">
                          
                    <label for="email">
                      Username or email address *
                    </label>
                    <div class="form-group form-group-section">
                        <input type="text" value="" name="username" class="form-control control-section" placeholder="Email Address" required="">
                    </div>
              
                    <label for="password">
                      Password *
                    </label>
                    <div class="form-group form-group-section">
                        <input type="password" class="form-control control-section" id="password" name="password" placeholder="Enter Password" required="">
                    </div>
                    <div>
                      <button type="submit" class="btn submitbutton">LOG IN</button>
                    </div>
                  </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  
  
          </div>
    
    



	@endsection