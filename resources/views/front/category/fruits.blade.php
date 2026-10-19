@extends('master')
@section('homeContent')
<div class="products-section">
    <div class="featured-products salePart" style="background-color: #e1f5fe;">
       <h2 style="color:rgb(43, 163, 89);">Fashion Accesories</h2>
       <div class="row">
         @foreach ($products as $product)
         <div class="column">
            
                
            
            <div class="carddds">
                 <p><a href="{{url('product-details-'.$product->id)}}"> 
               <img class="card-img-top" src="{{asset('uploads/'.$product->thum_img)}}" alt="Denim Jeans" style="height:160px; !important;width:147spx; !important">
               <p class="word">{{$product->name}}</p>
               <p class="price p-0" style="color:red;">Price: ৳{{$product->price}}</p>
               
              </a></p>
              <p><span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span></p>
             </div>
             
         </div>
         @endforeach
      </div>
    </div>
@endsection