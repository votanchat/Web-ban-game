@extends('admin.master')
@section('title','Danh sách khuyến mãi')
@section('content')
<div id="page-wrapper" >
		  <div class="header"> 
                        <h1 class="page-header">
                            Danh sách khuyến mãi
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
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên</th>
                                            <th>Ngày tạo</th>
                                            <th>Số phần trăm khuyến mãi</th>
                                            <th>Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($dskhuyenmai as $khuyenmai)
                                        <tr class="gradeA">
                                          	<td>{{$khuyenmai->id}}</td>
                                          	<td>{{$khuyenmai->ten}}</td>
                                          	<td>{{$khuyenmai->created_at}}</td>
                                            <td>{{$khuyenmai->soPhanTramKm}} %</td>
                                            <td>
                                            	<a href="{{route('xoakhuyenmai',$khuyenmai->id)}}"> <i class="fa fa-trash-o fa-fw"></i></a>
                                            	<a href="{{route('suakhuyenmai',$khuyenmai->id)}}"> <i class="fa fa-pencil fa-fw"></i></a>
                                            	<a href="{{route('chitietkhuyenmai',$khuyenmai->id)}}"> <i class="fa fa-info-circle fa-fw"></i></a>
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