@extends('master')
@section('content')	
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng nhập</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('trangchu')}}">Home</a> / <span>Đăng nhập</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content">
			
			<form action="{{route('dangnhap')}}" method="post" class="beta-form-checkout">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-sm-3"></div>
					@if(Session::has('flag'))
					<div class="alert alert-{{Session('flag')}}">{{Session('thongbao')}}</div>
					@endif
					@if(count($errors)>0)
					<div class="alert alert-danger">
						@foreach($errors->all() as $loi)
						{{$loi}}
						@endforeach
					</div>
					@endif
					<div class="col-sm-6">
						<h4>Đăng nhập</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email *</label>
							<input type="email" name="email" required>
						</div>
						<div class="form-block">
							<label for="phone">Mật khẩu *</label>
							<input type="password" name="password" required>
						</div>
						<div class="form-block">
							<label for="phone">Ghi nhớ &nbsp;<input type="checkbox" name="luu"></label>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Đăng nhập</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div>
	</div>
@endsection
@section('title','Đăng nhập')