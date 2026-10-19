@extends('master')

@section('homeContent')
    

<div class="container mt-5">
	@if(count($searchpro) > 0)
	<h1>{{count($searchpro)}} item found in "{{$keyword}}"</h1>
    <div class="row">
        @foreach($searchpro as $product)
        <div class="column" style="background-color:#e1f5fe;">
            <div class="carddds">
                <p><a href="{{url('product-details-'.$product->id)}}"> 
              <img class="card-img-top" src="{{asset('uploads/'.$product->thum_img)}}" alt="Denim Jeans" style="height:160px; !important;width:150px; !important">
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
	 
              @else
              <h1>Search result not found!</h1>
              @endif

</div>


@endsection
