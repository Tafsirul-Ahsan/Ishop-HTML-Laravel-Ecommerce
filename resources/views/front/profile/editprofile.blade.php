@extends('master')
@section('homeContent')
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
                  <div class="myrecentorder">
                     <p style="font-weight: bold;border-bottom: 1px solid #eaeded;padding: 5px 0;">My Profile Update</p>
                     <div>
                        <form class="form-horizontal" role="form" method="POST" action="{{ $profile->id ? url('profiles/'.$profile->id) : url('profiles') }}" enctype="multipart/form-data">
                           @if ($profile->id) {{ method_field('PATCH') }} @endif
                           {!! csrf_field() !!}
                           <label for="inputPassword" class="col-sm-3 col-form-label">Name*</label>
                           <div class="col-sm-9">
                              <input type="text" class="form-control" name="name" value="{{$profile->name}}" placeholder="Your Name" required="">
                           </div>
                     </div>
                     <div class="form-group row">
                     <label for="inputPassword" class="col-sm-3 col-form-label">Company Name </label>
                     <div class="col-sm-9">
                     <div class="input-group mb-3">
                     <input type="text" class="form-control" name="company" value="{{$profile->company}}" placeholder="Company Name" required="">
                     </div>
                     </div>
                     </div>
                     <div class="form-group row">
                     <label for="inputPassword" class="col-sm-3 col-form-label">Email Name*</label>
                     <div class="col-sm-9">
                     <div class="input-group mb-3">
                     <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}" placeholder="Email Address" required="">
                     </div>
                     </div>
                     </div>
                     <div class="form-group row">
                     <label for="inputPassword" class="col-sm-3 col-form-label">Mobile Number*</label>
                     <div class="col-sm-9">
                     <div class="input-group mb-3">
                     <input type="text" name="mobile" class="form-control" placeholder="Phone Number" value="{{$profile->mobile}}" required="">
                     </div>
                     </div>
                     </div>
                     <div class="form-group row">
                     <label for="inputPassword" class="col-sm-3 col-form-label">Country*</label>
                     <div class="col-sm-4">
                     <input type="text" class="form-control" readonly="" value="Bangladesh">
                     </div>
                     <label for="inputPassword" class="col-sm-2 col-form-label">Prefecture*</label>
                     <div class="col-sm-3">
                     <select class="form-control" name="prefecture" required="">
                     <option value="">Select Option</option>
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
                     <div class="form-group row">
                     <label for="inputPassword" class="col-sm-3 col-form-label">Town / City*</label>
                     <div class="col-sm-4">
                     <input type="text" class="form-control" name="city" value="{{$profile->city}}" placeholder="Enter City" required="">
                     </div>
                     <label for="inputPassword" class="col-sm-2 col-form-label">Postal Code*</label>
                     <div class="col-sm-3">
                     <input type="text" class="form-control" name="postal_code" value="{{$profile->postal_code}}" placeholder="Enter Postal Code" required="">
                     </div>
                     </div>
                     <div class="form-group row">
                     <label for="inputPassword" class="col-sm-3 col-form-label">Address*</label>
                     <div class="col-sm-9">
                     <input type="text" class="form-control" name="address" value="{{$profile->address}}" placeholder="Exp: House Road.." required="">
                     </div>
                     </div>
                     <div class="form-group row">
                     <label for="inputPassword" class="col-sm-3 col-form-label">Uploard Photo</label>
                     <div class="col-8 col-sm-7">
                     <input type="file" class="form-control" name="img" style="padding: 3px;" required="">
                     </div>
                     <div class="col-4 col-sm-2">
                     <div class="profileImage">
                        @if(isset($profile->img))
                            <img src="{{asset('images/profiles/'.$profile->img)}}" width="100px">
                            @else
                            <img src="" width="100px">
                            @endif
                     </div>
                     </div>
                     </div>
                     <div class="form-group row">
                     <label for="inputPassword" class="col-sm-3 col-form-label"></label>
                     <div class="col-sm-9">
                     <button type="submit" class="btn btn-primary">Update Profile</button>
                     </div>
                     </div>
                     </form> 
                     <div style="margin: 5% !important;">
                        <a class="dropdown-profile" href="{{ route('logout') }}"
                                                           onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                                                            <button class="btn btn-primary">{{ __('Logout') }}</button>
                                                        </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>             
                    </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
@endsection