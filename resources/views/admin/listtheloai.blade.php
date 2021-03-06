@extends('admin.master')
@section('title','Danh sách thể loại')
@section('content')
<div id="page-wrapper" >
		  <div class="header"> 
                        <h1 class="page-header">
                            Danh sách thể loại
                        </h1>
						<ol class="breadcrumb">
                      <li><a href="{{route('trangchu')}}">Home</a></li>
                      <li><a href="{{route('dashboard')}}">Admin</a></li>
                      <li class="active">Thể loại</li>
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
                                            <th>Tên thể loại</th>
                                            <th>Số lượng game</th>
                                            <th>Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($dstheloai as $theloai)
                                        <tr class="gradeA">
                                        	<td>{{$theloai->id}}</td>
                                            <td>{{$theloai->ten}}</td>
                                            <td>{{$theloai->game->count()}}</td>
                                            <td><a href="{{route('xoatheloai',$theloai->id)}}"> <i class="fa fa-trash-o  fa-fw"></i></a> <a href="{{route('suatheloai',$theloai->id)}}"> <i class="fa fa-pencil fa-fw"></i></a></td>
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