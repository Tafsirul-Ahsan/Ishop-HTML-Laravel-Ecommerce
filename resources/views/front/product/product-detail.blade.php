@extends('master')
@section('homeContent')
<div class="products-section">
   <div class="categoryheader">
      <div class="row">
         <div class="col-md-12">
            <ul class="categoryblog-lists">
               <li><a href="">Home</a>/</li>
               <li><a href="">Service</a>/</li>
            </ul>
         </div>
      </div>
   </div>
   <div class="container" style="padding: 50px 0;">
      <div class="row">
        
         <div class="col-md-6">
            <div class="xzoom-container">
               <img src="{{asset('uploads/'.$product->thum_img)}}" class="xzoom4" id="xzoom-fancy"  style="width: 540px; ">
               
            </div>
           </div>
         <div class="col-md-6">
            <div class="products-process">
               <h3 class="singleProducttitle">{{$product->name}}</h3>
               <div class="starView">
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                  <span class=" ml-2">
                  (0)
                  </span>
                  Review
               </div>
               <h5 class="singlPrice">
                 Price: ¥ {{$product->price}}
               </h5>
               <p class="single-excerpt">
                  Category:   {{$product->type}}
                  </p>
               <p class="single-excerpt">
                Weight:  {{$product->adinfo}}
               </p>
               <p class="single-excerpt">
                  Description:  {{$product->description}}
                 </p>
               <p class="single-excerpt">
               MoreInfo:   {{$product->short_des}}
               </p>
              
               <form action="{{url('/cart/addtocart')}}" method="post">
                @csrf
                <fieldset>
                  <div class="row">
                     <div class="column">
                       <div class="">
                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="  fa fa-minus" aria-hidden="true"></i></span>
                                      <input type="number" class="qty-text" id="qty" step="1" min="1" max="50" name="quantity" value="1">
                                     <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                       
                            
                       </div>
                     </div>
                   
                     <div class="column">
                       <div class="ml-3">
                         <input type="hidden" name="pid" value="{{$product->id}}">
                                     <button type="submit" name="addtocart" class="btn btn-primary">ADD TO CART</button>
                            
                       </div>
                     </div> </fieldset>
              </form>
               <hr>
               <p class="stockAvailable">
                  Available In Stock: 91
               </p>
               <div class="singleSocial">
                  <ul>
                     <li>
                        <a href="#" style="background: #3a579a;"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                     </li>
                     <li>
                        <a href="#" style="background: #0da8e3;"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                     </li>
                     <li>
                        <a href="#" style="background-image: linear-gradient(#4560ca, #ff5745,#ffd057);"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                     </li>
                     <li>
                        <a href="#" style="background: #1c9a11;"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="description-parts">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
         <li class="nav-item">
            <p class="nav-link Productdescription active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" style="cursor: pointer; margin: 0;">
               Additional Information
            </p>
         </li>
         <li class="nav-item">
            <p class="nav-link Productdescription" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false" style="cursor: pointer; margin: 0;">
               Reviews
            </p>
         </li>
      </ul>
      <div class="tab-content" id="myTabContent" style="overflow: auto;">
         <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="productnoticelist">
               <p>
                  {{$product->description}}
               </p>
            </div>
         </div>
         <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
            <div class="productnoticelist">
               <p>
                  {{$product->short_des}}
               </p>
            </div>
         </div>
      </div>
   </div>
   <div class="singleRelated" style="background-color: #e1f5fe;">
      <h3 style="color:rgb(43, 163, 89);">Related Products</h3>
      <div class="row">
        @foreach ($products as $product)
        <div class="column">
           
               
           
           <div class="card">
              <img src="{{asset('uploads/'.$product->thum_img)}}" alt="Denim Jeans" style="height:200px; !important">
              <p class="word">{{$product->name}}</p>
              <p class="price">¥{{$product->price}}</p>
              <p><a href="{{url('product-details-'.$product->id)}}"><button class="button-5">Add to Cart</button></a></p>
            </div>
            
        </div>
        @endforeach
     </div>
   </div>
</div>

@endsection