@extends('admin.master')
@section('title','Dashboard')
@section('content')
		<div id="page-wrapper">
		  <div class="header"> 
		  	<h1 class="page-header">
		  		Dashboard
		  	</h1>
		  	<ol class="breadcrumb">
		  		<li><a href="{{route('trangchu')}}">Home</a></li>
		  		<li><a href="{{route('dashboard')}}">Dashboard</a></li>
		  		<li class="active">Dữ liệu</li>
		  	</ol> 
									
			</div>
            <div id="page-inner">			
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
						<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image red">
						<i class="fa fa-eye fa-5x"></i>
						</div>
						<div class="card-stacked">
						<div class="card-content">
						<h3>{{$thongke['ltc']}}</h3> 
						</div>
						<div class="card-action">
						<strong> Lượt truy cập</strong>
						</div>
						</div>
						</div>
	 
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
					
						<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image orange">
						<i class="fa fa-shopping-cart fa-5x"></i>
						</div>
						<div class="card-stacked">
						<div class="card-content">
						<h3>{{number_format($thongke['thanhtoan'])}}đ</h3> 
						</div>
						<div class="card-action">
						<strong> Số tiền</strong>
						</div>
						</div>
						</div> 
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
					
							<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image blue">
						<i class="fa fa-credit-card fa-5x"></i>
						</div>
						<div class="card-stacked">
						<div class="card-content">
						<h3>{{$thongke['donhang']}}</h3> 
						</div>
						<div class="card-action">
						<strong> Hóa đơn</strong>
						</div>
						</div>
						</div> 
						 
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
					
					<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image">
						<i class="fa fa-user fa-5x"></i>
						</div>
						<div class="card-stacked">
						<div class="card-content">
						<h3>{{$thongke['nguoidung']}}</h3> 
						</div>
						<div class="card-action">
						<strong> Tài khoản</strong>
						</div>
						</div>
						</div> 
						 
                    </div>
                </div>
			
                <!-- /. ROW  --> 
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-3"> 
					<div class="card-panel text-center">
						<h4>Hóa đơn thanh toán</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="{{$thongke['donhangthanhtoan']}}" ><span class="percent">{{$thongke['donhangthanhtoan']}}%</span>
						</div> 
					</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3"> 
					<div class="card-panel text-center">
						<h4>Hóa đơn có Tài khoản</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="{{$thongke['donhangcouser']}}" ><span class="percent">{{$thongke['donhangcouser']}}%</span>
						</div>
					</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3"> 
					<div class="card-panel text-center">
						<h4>Người dùng có hóa đơn</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="{{$thongke['nguoidungao']}}" ><span class="percent">{{$thongke['nguoidungao']}}</span>
						</div> 
					</div>
			</div>
<!-- 			<div class="col-xs-12 col-sm-6 col-md-3"> 
					<div class="card-panel text-center">
						<h4>Sales</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="55" ><span class="percent">55%</span>
						</div>
					</div>
			</div>  -->
		</div><!--/.row-->
			   <div class="fixed-action-btn horizontal click-to-toggle">
    <a class="btn-floating btn-large red">
      <i class="material-icons">menu</i>
    </a>
    <ul>
      <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
      <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
      <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
      <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
    </ul>
  </div>
@endsection