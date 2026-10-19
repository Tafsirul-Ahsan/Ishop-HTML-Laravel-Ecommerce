@extends('master')
@section('homeContent')
<div class="main-container">
   <div class="main-home-page">
      <div class="container">
         <div class="cart-page">
            <div class="productList-table">
               <p class="customer"><i class="fa mr-2 fa-check" aria-hidden="true"></i>{{ __('messages.Customer matched zone 1 Day Delivery') }}</p>
               <hr style="border: 2px solid #ccc; margin: 5px 0 15px;">
               <div class="row">
                
                  <div class="col-md-7" style="border-right: 1px solid #ccc;">
                     <div class="table-responsive">
                        <table class="table carttable">
                           <thead>
                              <tr>
                                 <th scope="col" colspan="2" style="width: 250px;min-width:250px;padding:5px;">{{ __('messages.Product')}}</th>
                                 <th scope="col" style="width: 120px; text-align: center;min-width:120px;padding:5px;">{{ __('messages.Quantity') }}</th>
                                 <th scope="col" style="width: 120px; text-align: end;min-width:120px;padding:5px;">{{ __('messages.Subtotal') }}</th>
                              </tr>
                           </thead>
                           <tbody>
                               @foreach(Cart::getContent() as $cartitem)
                              <tr>
                                 <td style="padding:3px;width: 75px;min-width: 75px;">
                                  <a href="{{url('cart/remove-item/'.$cartitem->id)}}" style="color: #444; font-size:18px;" href="javascript:void(0)" class="cartUpdate" data-url="">
                                    <i class="fa fa-times-circle-o"></i>
                                    </a><a href="">
                                    <img src="{{asset('uploads/'.$cartitem->attributes->thum_img)}}" style="width: 100px;">
                                    </a>
                                 </td>
                                 <td style="padding:3px;">
                                    <a href="">
                                    {{$cartitem->name}}
                                    </a>
                                    <br>
                                    {{$cartitem->adinfo}}
                                 </td>
                                 <td style="text-align: center;padding:3px;"> {{$cartitem->quantity}}</td>
                                 <td style="text-align: end;padding:3px;">
                                    ৳ {{$cartitem->price}}
                                 </td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                     <hr style="border: 1px solid #ccc;">
                     <div class="continueShop">
                        <ul>
                           <li>
                              <a class="continueShpbtn" href="{{url('/')}}"><i class="fa mr-2 fa-long-arrow-left" aria-hidden="true"></i>{{ __('messages.Continue Shopping') }}</a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-5">
                     <table class="table carttotaltable">
                        <thead>
                           <tr>
                              <th scope="col" style="width: 25%">{{ __('messages.Cart Totals')}}</th>
                              <th scope="col" style="width: 75%; text-align: end;">{{ __('messages.Price') }}</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td scope="row">{{ __('messages.Subtotal') }}</td>
                              <td style="text-align: end;">৳ {{Cart::getSubTotal()}}</td>
                           </tr>
                           <tr>
                              <td scope="row">{{ __('messages.SHIPPING') }}</td>
                              <td style="text-align: end;">
                                 ৳ 49.0
                              </td>
                           </tr>
                           <tr>
                              <td scope="row">{{ __('messages.Tax') }}</td>
                              <td style="text-align: end;">৳ 5%</td>
                           </tr>
                           
                           <tr>
                            @php
        $a=array(\Cart::getTotal(), 49, ((Cart::getSubTotal()*8)/100));
        $sum = array_sum($a);
        @endphp
                              <td scope="row">{{ __('messages.Total') }}</td>
                              <td style="text-align: end;">৳ {{$sum}}</td>
                           </tr>
                        </tbody>
                     </table>
                     <hr style="border: 2px solid #ccc; margin: 0;">
                     <a class="checkoutbtn" href="{{url('/orderplacement')}}">{{ __('messages.PROCEED TO CHECKOUT') }}</a>
                  </div>
                  
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection