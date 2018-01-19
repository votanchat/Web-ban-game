@extends('admin.master')
@section('title','Danh sách người dùng ')
@section('content')
<div id="page-wrapper" >
		  <div class="header"> 
                        <h1 class="page-header">
                            Danh sách người dùng
                        </h1>
						<ol class="breadcrumb">
                      <li><a href="{{route('trangchu')}}">Home</a></li>
                      <li><a href="{{route('dashboard')}}">Admin</a></li>
                      <li class="active">User</li>
                    </ol> 
									
		</div>
		
            <div id="page-inner"> 
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="card">
                    	@if(Session::has('thanhcong'))
                    	<div class="alert alert-success"> {{Session::get('thanhcong')}}</div>
                    	@endif
                        <div class="card-action">
                             Bảng danh sách người dùng
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="listuser">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên</th>
                                            <th>Email</th>
                                            <th>Cấp bậc</th>
                                            <th>Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($dsuser as $user)
                                        <tr class="gradeA">
                                        	<td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                            	@if($user->lv>0)
                                            	<div style="color: red">Admin</div>
                                            	@else
                                            	<div style="color: green">Người dùng</div>
                                            	@endif
                                            </td>
                                            <td>
                                            	<a href="{{route('xoauser',$user->id)}}"> <i class="fa fa-trash-o  fa-fw"></i></a>
                                            	<a href="{{route('capnhatpass',$user->id)}}"> <i class="fa fa-key  fa-fw"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
                <!-- /. ROW  -->
@endsection