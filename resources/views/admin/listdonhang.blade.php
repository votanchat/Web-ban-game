@extends('admin.master')
@section('title','Danh sách đơn hàng')
@section('content')
<div id="page-wrapper" >
		  <div class="header"> 
                        <h1 class="page-header">
                            Danh sách đơn hàng
                        </h1>
						<ol class="breadcrumb">
                      <li><a href="{{route('trangchu')}}">Home</a></li>
                      <li><a href="{{route('dashboard')}}">Admin</a></li>
                      <li class="active">Đơn hàng</li>
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
                             Bảng danh sách
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="table-donhang">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Ngày tạo</th>
                                            <th>Số tiền</th>
                                            <th>Trạng thái</th>
                                            <th>Người dùng</th>
                                            <th>Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($dsdonhang as $donhang)
                                        <tr class="gradeA">
                                          	<td>{{$donhang->id}}</td>
                                          	<td>{{$donhang->created_at}}</td>
                                            <td>{{$donhang->tien}}</td>
                                            <td>
                                            @if($donhang->trangThai==1)
                                            <div style="color: green">Hoàn thành</div>
                                            @elseif($donhang->trangThai==0)
                                            <div style="color: red">Chưa thanh toán</div>
                                            @else
                                            <div style="color: yellow">Chưa cấp đủ key</div>
                                            @endif
                                        	</td>
                                        	<td>
                                        	@if($donhang->users()->exists())
                                        	{{$donhang->users->name}}
                                        	@endif
                                        	</td>
                                            <td>
                                            	<a href="{{route('active',$donhang->id)}}"> <span class="glyphicon glyphicon-ok-sign"></span></a>
                                            	<a href="{{route('xoadonhang',$donhang->id)}}"> <i class="fa fa-trash-o fa-fw"></i></a>
                                            	<a href="{{route('chitiet',$donhang->id)}}"> <i class="fa fa-info-circle fa-fw"></i></a>
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