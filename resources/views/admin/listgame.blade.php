@extends('admin.master')
@section('title','Danh sách game')
@section('content')
<div id="page-wrapper" >
		  <div class="header"> 
                        <h1 class="page-header">
                            Danh sách game
                        </h1>
						<ol class="breadcrumb">
                      <li><a href="{{route('trangchu')}}">Home</a></li>
                      <li><a href="{{route('dashboard')}}">Admin</a></li>
                      <li class="active">Game</li>
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
                                            <th>Tên game</th>
                                            <th>Thể loại</th>
                                            <th>Giá tiền</th>
                                            <th>Khuyến mãi</th>
                                            <th>Số lượng key</th>
                                            <th>Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($dsgame as $game)
                                        <tr class="gradeA">
                                        	<td>{{$game->id}}</td>
                                            <td>{{$game->ten}}</td>
                                            <td><a href="{{route('theloai',$game->theLoai->id)}}">{{$game->theLoai->ten}}</a></td>
                                            <td>{{number_format($game->gia)}}đ</td>
                                            <td>
                                            @if(isset($game->khuyenMai))
                                            {{$game->khuyenMai->soPhanTramKm}}%
                                            @else
                                            0%
                                            @endif
                                            </td>
                                            <td>{{$game->Key->count()}} <a href="{{route('listkey',$game->id)}}"> <i class="fa fa-eye fa-fw"></i></a> <a href="{{route('nhapkey',$game->id)}}"> <i class="fa fa-arrow-down fa-fw"></i></a> </td>
                                            <td>
                                                <a href="{{route('xoagame',$game->id)}}"> <i class="fa fa-trash-o  fa-fw"></i></a>
                                                <a href="{{route('suagame',$game->id)}}"> <i class="fa fa-pencil fa-fw"></i></a>
                                                @if(!$game->hot)
                                                <a href="{{route('hot',$game->id)}}"> <i class="glyphicon glyphicon-pushpin"></i></a>
                                                @else
                                                <a href="{{route('hot',$game->id)}}"> <i class="glyphicon glyphicon-remove"></i></a>
                                                @endif
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