	@extends('admin.master')
	@section('title','Thêm slide')
	@section('content')
	<div id="page-wrapper" >
		<div class="header"> 
			<h1 class="page-header">
				Thêm slide
			</h1>
			<ol class="breadcrumb">
				<li><a href="{{route('trangchu')}}">Home</a></li>
				<li><a href="{{route('dashboard')}}">Admin</a></li>
				<li class="active">Slide</li>
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
							<form action="{{route('themslide')}}" method="post" class="col s12">
								{{ csrf_field() }}
								<div class="row">
									<div class="input-field col s12">
										<input id="first_name" name='link' type="text" class="validate">
										<label for="first_name">Link:</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<input id="first_name" name='image' type="text" class="validate">
										<label for="first_name">Image:</label>
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