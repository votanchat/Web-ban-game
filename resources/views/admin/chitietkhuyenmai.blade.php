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
                             Bảng chi tiết khuyến mãi <h3>#{{$khuyenmai->id}}</h3>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên Game</th>
                                            <th>Giá gốc</th>
                                            <th>Giá khuyến mãi</th>
                                            <th>Còn lại</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($khuyenmai->game as $game)
                                        <tr class="gradeA">
                                          	<td>{{$game->id}}</td>
                                          	<td>{{$game->ten}}</td>
                                          	<td>{{number_format($game->gia)}}đ</td>
                                            <td>{{number_format($game->gia*$game->khuyenMai->soPhanTramKm/100)}}đ</td>
                                            <td>{{number_format($game->gia-$game->gia*$game->khuyenMai->soPhanTramKm/100)}}đ</td>
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