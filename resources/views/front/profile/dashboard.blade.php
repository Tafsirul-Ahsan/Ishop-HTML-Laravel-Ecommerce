@extends('master')
<link href="https://fonts.googleapis.com/css?family=Source Code Pro" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&amp;display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Acme&amp;display=swap" rel="stylesheet">

    <!-- Bootstrap CS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Font Awesome CSS CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Slick Slider CSS CDN-->
    <link rel="stylesheet" type="text/css" href="https://www.baticrom.com/public/batikrom/css/slick.css">
    <link rel="stylesheet" type="text/css" href="https://www.baticrom.com/public/batikrom/css/slick-theme.css">
    
    <link rel="stylesheet" type="text/css" href="https://www.baticrom.com/public/batikrom/css/jquery.fancybox.css">

    <!-- Matis Menus CSS -->
    <link rel="stylesheet" href="https://www.baticrom.com/public/batikrom/css/metisMenu.css">

    <!-- Custom Css for this Design -->
    <link rel="stylesheet" href="https://www.baticrom.com/public/batikrom/css/style.css">
    
    <!-- Jquery Script  CDN-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    
@section('homeContent')

<!--Main Contant Section Start-->
<div class="main-container">
    <div class="userdashboard">
<div class="container">
<div class="row" style="margin:0;">
    <div class="col-lg-3 usersidebardiv">
        <div class="usersidebar">
<p style="margin: 0;font-size: 20px;color: #333;">Shortcuts</p>
<ul id="usersidebar">
    <li>
    <a href="{{url('/profiles')}}">My Dashboard</a>
</li>
<li>
    <a href="{{url('profiles/'.Auth::user()->id.'/edit')}}">Edit Profile</a>
</li>
<li>
    <a href="{{url('/changePassword')}}">Change Password</a>
</li>
<li>
    <a href="">My Orders</a>
</li>


<li>
    <a href="">My Review</a>
</li>

<li>
    <a class="dropdown-profile" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>             
</li>
</ul>
</div>
    </div>
    <div class="col-lg-9 usermainbody">
        <div class="usercontent">
            <div class="profiledetails">
                <div class="row" style="margin: 0;padding: 10px;">
                    
                        
                    
                    <div class="col-6 col-md-2">
                        @foreach ($profiles as $profile)
                        <div class="profileImage">
                            @if(isset($profile->img))
                            <img src="{{asset('images/profiles/'.$profile->img)}}" width="100px">
                            @else
                            <img src="" width="100px">
                            @endif
                        </div>
                        @endforeach
                    </div>
                    <div class="col-6 col-md-6">
                        <div class="parsonalprofile2">
                            @if(isset(Auth::user()->name))
                        <p><i class="fa fa-user"></i>{{Auth::user()->name}}</p>
                        @else
                        <p><i class="fa fa-user"></i></p>
@endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="parsonalprofile">
                            <a href="{{url('profiles/'.Auth::user()->id.'/edit')}}" class="editPrifilebtn">Edit Profile</a>
                            
                        </div>
                   
                        <div class="parsonalprofile">
                            <a href="{{url('/changePassword')}}" class="editPrifilebtn">Change Password</a>
                            
                        </div>
                        <div class="parsonalprofile">
                            <a class="editPrifilebtn" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>    
                        </div>
                    </div>
                </div>
                <div class="row" style="background: #fafafa;margin: 0;padding: 10px;text-align: center;">
                    <div class="dashboardcountinfo">
                        <span>0</span>
                        <p><a href="">All Order</a></p>
                    </div>
                    <div class="dashboardcountinfo">
                        <span>0</span>
                        <p><a href="">Pending Order</a></p>
                    </div>
                    <div class="dashboardcountinfo">
                        <span>0</span>
                        <p><a href="">Confirm Order</a></p>
                    </div>
                    <div class="dashboardcountinfo">
                        <span>0</span>
                        <p><a href="">Shipped Order</a></p>
                    </div>
                    <div class="dashboardcountinfo">
                        <span>0</span>
                        <p><a href="">Completed Order</a></p>
                    </div>
                    <div class="dashboardcountinfo">
                        <a class="dropdown-profile" href="{{ route('logout') }}"
                                                           onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
                                                        </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>             
                    </div>
                </div>
            </div>

                            <div class="row">
                
                 <div class="col-md-12">
                    <div class="dashbaordInfo">
                    <p>Shipping Address</p>
                    <table class="table table-bordered shippingTable">
                        <tbody><tr>
                            <td>Shipping Address</td>
                            @if(isset($profile->address))
                            <td style="width:30%;">{{$profile->address}}</td>
                            @else
                            <td>: </td>
                            @endif
                        </tr>
                        
                        <tr>
                            <td>City</td>
                            @if(isset($profile->city))
                            <td> {{$profile->city}}</td>
                            @else
                            <td></td>
                            @endif
                        </tr>
                        <tr>
                            <td>Postal Code </td>
                            @if(isset($profile->postal_code))
                            <td>{{$profile->postal_code}} </td>
                            @else
                            <td> </td>
                            @endif
                        </tr>
                        <tr>
                            <td> Prefecture</td>
                            @if(isset($profile->prefecture))
                            <td> {{$profile->prefecture}}</td>
                            @else
                            <td> </td>
                            @endif

                        </tr>
                        <tr>
                            <td>Country </td>
                            <td>Bangladesh</td>
                        </tr>
                    </tbody></table>
                          
                    </div>
                  
                </div>
            </div>
            
        </div>
    </div>
</div>
</div>
</div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
    <!-- Metis Menus Script -->
    <script src="https://www.baticrom.com/public/batikrom/js/metisMenu.min.js"></script>
 
    <!-- Sweet Alert CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 
    <!-- Slick slider CDN -->
    <script type="text/javascript" src="https://www.baticrom.com/public/batikrom/js/slick.min.js"></script>
 
    <!--iconify Script CDN-->
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
 
    <!-- Custom Script for this Design -->
    <script src="https://www.baticrom.com/public/batikrom/js/myjquery.js"></script>
 

@endsection