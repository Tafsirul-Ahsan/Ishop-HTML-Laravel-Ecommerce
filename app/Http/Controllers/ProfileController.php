<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Cart;
use App\Models\Order;
use App\Models\Profile;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $profiles=Profile::orderby('id','desc')->get();
      $user=User::orderby('id','desc')->get();
       return view('front.profile.dashboard',compact('profiles','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.profile.editprofile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profile=new Profile(); 
      $profile->name = $request->name;
    $profile->company = $request->company;
    $profile->email = $request->email;
    $profile->mobile = $request->mobile;
    $profile->prefecture = $request->prefecture;
    $profile->city = $request->city;
    $profile->postal_code = $request->postal_code;
    $profile->address = $request->address;

    if($request->hasFile('img')) {
        $img = $request->file('img');
        $filename = $img->getClientOriginalName();
        $img->move(public_path('images/profiles'), $filename);
        $profile->img = $request->file('img')->getClientOriginalName();
    }

    $profile->save();
       return back()->with('success','This info save successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        $profiles=Profile::orderby('id','desc')->get();
      return view('front.profile.dashboard', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('front.profile.editprofile', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $profile->name = $request->name;
    $profile->company = $request->company;
    $profile->email = $request->email;
    $profile->mobile = $request->mobile;
    $profile->prefecture = $request->prefecture;
    $profile->city = $request->city;
    $profile->postal_code = $request->postal_code;
    $profile->address = $request->address;

    if($request->hasFile('img')) {
        $img = $request->file('img');
        $filename = $img->getClientOriginalName();
        $img->move(public_path('images/profiles'), $filename);
        $profile->img = $request->file('img')->getClientOriginalName();
    }

    $profile->update();

    return back()->with('success','This info save successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function success(Request $request)
    {
        $cartitems=Cart::getContent();
      $order=new Order();
      $order->name=$request->name;
          $order->company=$request->company;
          $order->city=$request->city;
          $order->postal_code=$request->postal_code;
          $order->prefecture=$request->prefecture;
          $order->address=$request->address;
          $order->mobile=$request->mobile;
          $order->email=$request->email;
          $order->time_slot=$request->time_slot;
          $order->note=$request->note;
          $order->cart_items=$cartitems;
          $order->grandtotal=$request->grandtotal;
       

      foreach (\Cart::getContent()  as $item) {

        
        $order->uid=Auth::user()->id;
        $order->pid=$item->id;
        $order->quantity=$item->quantity;
        $order->subtotal=$item->attributes->subtotal;
        $order->status=0;
        
        
     }
     //dd($order);
     $order->save();
       
          

        Cart::clear();

        return view('front.cart.cart')->with('success','This info save successfully');

    }

    public function oderplace(Request $request)
    {
       return view('front.cart.orderplacement');
    }

    public function showChangePasswordForm(){
        return view('auth.changepassword');
    }

    
    public function changePassword(Request $request){

        if (!(\Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

    }
}