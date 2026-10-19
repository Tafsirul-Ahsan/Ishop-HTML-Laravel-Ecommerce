@extends('admin.master')
<style>
	table, th, td {
	  border: 3px solid;
	  color: rgb(0, 174, 255);
	  text-align: center;
	}
	</style>
@section('homeContent')

<div class="row">
            <div class="panel-body">
                <div class="col-md-12 w3ls-graph">

                    <!--agileinfo-grap-->
                        <div class="agileinfo-grap">
                            <div class="agileits-box">
                                <header class="agileits-box-header clearfix">
                                  <div class="card">
@if(session()->has('success'))
<div class="alert alert-success" role="alert">
                    <strong>Well done!</strong> You successfully read this! .
                </div>
@endif
      
      
                                    <h3 style="color: blue;">User Message Panel</h3>
                                    <div class="table-responsive">
                                        <table style="width: 100%; text-align:center !important;">
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Phone Number</th>
                  <th scope="col">User Address</th>
                  <th scope="col">User Message</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($info as $product)
                <tr>
                <td class="text-info">{{$product->name}}</td>
                  <td class="text-info">{{$product->numberad}}</td>
                  <td class="text-info">{{$product->landmark}}</td>
                  <td class="text-info">{{$product->city}}</td>
                  <td class="text-info">
                    <a href="{{url('admin/products/'.$product->id)}}" class="btn btn-outline-success btn-sm rounded shadow"> <i class="fa fa-eye fa-2x"></i></a>
                    <a href="javascript:void(0)" onclick="document.getElementById('deleteform').submit()" class="btn btn-outline-danger btn-sm rounded shadow"> <i class="fa fa-trash fa-2x"></i></a>
                    <form method="post" id="deleteform" action="{{url('admin/products/'.$product->id)}}">
                        @csrf
                        @method('DELETE')
                    </form>
                  </td>
                </tr>
               @endforeach
              </tbody>
        </table>
                                            
                                        </div>
                                </header>
                                <!-- <div class="agileits-box-body clearfix">
                                    <div id="hero-area"></div>
                                </div> -->
                            </div>
                        </div>
    <!--//agileinfo-grap-->

                </div>
            </div>
        </div>


        <div class="agil-info-calendar">
        <!-- calendar -->
        <div class="col-md-6 agile-calendar">
            <div class="calendar-widget">
                <div class="panel-heading ui-sortable-handle">
                    <span class="panel-icon">
                      <i class="fa fa-calendar-o"></i>
                    </span>
                    <span class="panel-title"> Calendar Widget</span>
                </div>
                <!-- grids -->
                    <div class="agile-calendar-grid">
                        <div class="page">
                            
                            <div class="w3l-calendar-left">
                                <div class="calendar-heading">
                                    
                                </div>
                                <div class="monthly" id="mycalendar"></div>
                            </div>
                            
                            <div class="clearfix"> </div>
                        </div>
                    </div>
            </div>
        </div>
        <!-- //calendar -->
        <div class="col-md-6 w3agile-notifications">
            <div class="notifications">
                <!--notification start-->
                
                    <header class="panel-heading">
                        Notification 
                    </header>
                    <div class="notify-w3ls">
                        <div class="alert alert-info clearfix">
                            <span class="alert-icon"><i class="fa fa-envelope-o"></i></span>
                            <div class="notification-info">
                                <ul class="clearfix notification-meta">
                                    <li class="pull-left notification-sender"><span><a href="#">Jonathan Smith</a></span> send you a mail </li>
                                    <li class="pull-right notification-time">1 min ago</li>
                                </ul>
                                <p>
                                    Urgent meeting for next proposal
                                </p>
                            </div>
                        </div>
                        <div class="alert alert-danger">
                            <span class="alert-icon"><i class="fa fa-facebook"></i></span>
                            <div class="notification-info">
                                <ul class="clearfix notification-meta">
                                    <li class="pull-left notification-sender"><span><a href="#">Jonathan Smith</a></span> mentioned you in a post </li>
                                    <li class="pull-right notification-time">7 Hours Ago</li>
                                </ul>
                                <p>
                                    Very cool photo jack
                                </p>
                            </div>
                        </div>
                        <div class="alert alert-success ">
                            <span class="alert-icon"><i class="fa fa-comments-o"></i></span>
                            <div class="notification-info">
                                <ul class="clearfix notification-meta">
                                    <li class="pull-left notification-sender">You have 5 message unread</li>
                                    <li class="pull-right notification-time">1 min ago</li>
                                </ul>
                                <p>
                                    <a href="#">Anjelina Mewlo, Jack Flip</a> and <a href="#">3 others</a>
                                </p>
                            </div>
                        </div>
                        <div class="alert alert-warning ">
                            <span class="alert-icon"><i class="fa fa-bell-o"></i></span>
                            <div class="notification-info">
                                <ul class="clearfix notification-meta">
                                    <li class="pull-left notification-sender">Domain Renew Deadline 7 days ahead</li>
                                    <li class="pull-right notification-time">5 Days Ago</li>
                                </ul>
                                <p>
                                    Next 5 July Thursday is the last day
                                </p>
                            </div>
                        </div>
                        <div class="alert alert-info clearfix">
                            <span class="alert-icon"><i class="fa fa-envelope-o"></i></span>
                            <div class="notification-info">
                                <ul class="clearfix notification-meta">
                                    <li class="pull-left notification-sender"><span><a href="#">Jonathan Smith</a></span> send you a mail </li>
                                    <li class="pull-right notification-time">1 min ago</li>
                                </ul>
                                <p>
                                    Urgent meeting for next proposal
                                </p>
                            </div>
                        </div>
                        
                    </div>
                
        @endsection