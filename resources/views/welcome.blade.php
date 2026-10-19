@extends('master') 
@section('homeContent')
<!--Main Contant Section Start-->
<div class="main-container">
   <!--Slider Part Include Start-->
   <div class="slider-section">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
         <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2" class="active"></li>
         </ol>
         <div class="carousel-inner">
            <div class="carousel-item">
               <img class="d-block w-100" src="lib/folder/banner1.jpeg" alt="SM Power Image">
            </div>
            <div class="carousel-item">
               <img class="d-block w-100" src="lib/folder/banner1.jpeg" alt="SM Power Image">
            </div>
            <div class="carousel-item active">
               <img class="d-block w-100" src="lib/folder/banner1.jpeg" alt="SM Power Image">
            </div>
         </div>
         <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
         </a>
         <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
         </a>
      </div>
   </div>
   <div class="main-home-page">
      <div class="container">
         <div class="categories-tabs">
            <div class="row">
               <div class="col-md-3 col-6" style="padding: 10px;">
                  <a href="{{url('/milk')}}"><img src="lib/folder/pic1.jpeg" alt="category-blog" style="height:274px;width:821px;"></a>
               </div>
               <div class="col-md-3 col-6" style="padding: 10px;">
                  <a href="{{url('/skincare')}}"><img src="lib/folder/pic2.jpeg" alt="category-blog" style="height:274px;width:821px;"></a>
               </div>
               <div class="col-md-3 col-6" style="padding: 10px;">
                  <a href="{{url('/processfood')}}"><img src="lib/folder/pic3.jpeg" alt="category-blog" style="height:274px;width:821px;"></a>
               </div>
               <div class="col-md-3 col-6" style="padding: 10px;">
                  <a href="{{url('/spices')}}"><img src="lib/folder/pic4.jpeg" alt="category-blog" style="height:274px;width:821px;"></a>
               </div>
               <div class="col-md-3 col-6" style="padding: 10px;">
                  <a href="{{url('/rice')}}"><img src="lib/folder/pic5.jpeg" alt="category-blog" style="height:274px;width:821px;">  </a>
               </div>
               <div class="col-md-3 col-6" style="padding: 10px;">
                  <a href="{{url('/lentils')}}"><img src="lib/folder/pic6.jpeg" alt="category-blog" style="height:274px;width:821px;"></a>
               </div>
               <div class="col-md-3 col-6" style="padding: 10px;">
                  <a href="{{url('/fishmarket')}}"><img src="lib/folder/pic7.jpeg" alt="category-blog" style="height:274px;width:821px;"></a>
               </div>
               <div class="col-md-3 col-6" style="padding: 10px;">
                  <a href="{{url('/shef')}}"><img src="lib/folder/pic8.jpeg" alt="category-blog" style="height:274px;width:821px;"></a>
               </div>
               <div class="col-md-3 col-6" style="padding: 10px;">
                  <a href="{{url('/flourse')}}"><img src="lib/folder/pic9.jpeg" alt="category-blog" style="height:274px;width:821px;"></a>
               </div>
               <div class="col-md-3 col-6" style="padding: 10px;">
                  <a href="{{url('/curry')}}"><img src="lib/folder/pic10.jpeg" alt="category-blog" style="height:274px;width:821px;"></a>
               </div>
               <div class="col-md-3 col-6" style="padding: 10px;">
                  <a href="{{url('/processfood')}}"><img src="lib/folder/pic11.jpeg" alt="category-blog" style="height:274px;width:821px;"></a>
               </div>
               <div class="col-md-3 col-6" style="padding: 10px;">
                  <a href="{{url('/green')}}"><img src="lib/folder/pic15.jpeg" alt="category-blog" style="height:274px;width:821px;"></a>
               </div>
               <div class="col-md-3 col-6" style="padding: 10px;">
                  <a href="{{url('/meat')}}"><img src="lib/folder/pic13.jpg" alt="category-blog" style="height:274px;width:821px;"></a>
               </div>
               <div class="col-md-3 col-6" style="padding: 10px;">
                  <a href="{{url('/edible')}}"><img src="lib/folder/pic12.jpeg" alt="category-blog" style="height:274px;width:821px;"></a>
               </div>
               <div class="col-md-3 col-6" style="padding: 10px;">
                  <a href="{{url('/sweets')}}"><img src="lib/folder/pic14.jpeg" alt="category-blog" style="height:274px;width:821px;"></a>
               </div>
               <div class="col-md-3 col-6" style="padding: 10px;">
                  <a href="{{url('/fruits')}}"><img src="lib/folder/pic16.jpg" alt="category-blog" style="height:274px;width:821px;"></a>
               </div>
            </div>
         </div>
         <div class="products-section">
            <div class="featured-products salePart" style="background-color: #3c1053">
               <a href="{{url('/shopitem')}}"><button class="float-right btn btn-success">View All</button></a>
               <h2 style="color:#fff;">NEW PRODUCTS</h2>
               
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
            <div class="featured-products latest" style="background-color: #e1f5fe;">
               <a href="{{url('/shopitem')}}"><button class="float-right btn btn-success">View All</button></a>
               <h2 style="color:rgb(43, 163, 89);">BEST SELLER</h2>
               <div class="row">
                  @foreach ($items as $product)
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
         </div>
      </div>
   </div>
</div>
@endsection