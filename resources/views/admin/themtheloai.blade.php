	@extends('admin.master')
	@section('title','Thêm thể loại')
	@section('content')
	<div id="page-wrapper" >
		<div class="header"> 
			<h1 class="page-header">
				Thêm thể loại
			</h1>
			<ol class="breadcrumb">
				<li><a href="{{route('trangchu')}}">Home</a></li>
				<li><a href="{{route('dashboard')}}">Admin</a></li>
				<li class="active">Thể loại</li>
			</ol> 

		</div>
		<div id="page-inner"> 
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						@if(count($errors)>0)
						<div class="alert alert-danger">
							@foreach($errors->all() as $loi)
							{{$loi}}
							@endforeach
						</div>
						@endif
						@if(Session::has('thanhcong'))
						<div class="alert alert-success"> {{Session::get('thanhcong')}}</div>
						@endif
						<div class="card-action">
							Nhập thông tin
						</div>
						<div class="card-content">
							<form action="{{route('themtheloai')}}" method="post" class="col s12">
								{{ csrf_field() }}
								<div class="row">
									<div class="input-field col s12">
										<input id="first_name" name='ten' type="text" class="validate">
										<label for="first_name">Tên thể loại:</label>
									</div>
								</div>
								<button type="submit" class="btn btn-primary">Thêm</button>
							</form>
							<div class="clearBoth"></div>
						</div>
					</div>
				</div>	
			</div>		

			<!-- /.col-lg-12 --> 
@endsection