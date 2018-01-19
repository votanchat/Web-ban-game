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
                             Bảng danh sách chi tiết đơn hàng <h3>#{{$donhang->id}}</h3>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>ID game</th>
                                            <th>Tên Game</th>
                                            <th>Số lượng</th>
                                            <th>Số key còn lại</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($donhang->chiTietDonHang as $chitiet)
                                        <tr class="gradeA">
                                          	<td>{{$chitiet->id}}</td>
                                          	<td>{{$chitiet->game->id}}</td>
                                          	<td>{{$chitiet->game->ten}}</td>
                                            <td>{{$chitiet->soLuong}}</td>
                                            <td>{{$chitiet->game->key()->where('idChiTiet',NULL)->count()}}</td>
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