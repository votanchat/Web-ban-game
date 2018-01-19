@extends('admin.master')
@section('title','Danh sách key game '.$game->ten)
@section('content')
<div id="page-wrapper" >
		  <div class="header"> 
                        <h1 class="page-header">
                            Danh sách key game <strong>{{$game->ten}}</strong>
                        </h1>
						<ol class="breadcrumb">
                      <li><a href="{{route('trangchu')}}">Home</a></li>
                      <li><a href="{{route('dashboard')}}">Admin</a></li>
                      <li class="active">Key</li>
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
                             Bảng danh sách key game <strong>{{$game->ten}}</strong>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="listkey">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên game</th>
                                            <th>Key</th>
                                            <th>Trạng thái</th>
                                            <th>Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($dskey as $key)
                                        <tr class="gradeA">
                                        	<td>{{$key->id}}</td>
                                            <td>{{$game->ten}}</td>
                                            <td>{{$key->key}}</td>
                                            <td>
                                            	@if($key->idChiTiet==NULL)
                                            	<div style="color: green">Chưa bán</div>
                                            	@else
                                            	<div style="color: red">Đã bán</div>
                                            	@endif
                                            </td>
                                            <td><a href="{{route('xoakey',$key->id)}}"> <i class="fa fa-trash-o  fa-fw"></i></a></td>
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