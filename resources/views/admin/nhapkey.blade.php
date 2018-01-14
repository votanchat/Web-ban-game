	@extends('admin.master')
	@section('title','Nhập key game')
	@section('content')
	<div id="page-wrapper" >
		<div class="header"> 
			<h1 class="page-header">
				Nhập key cho game {{$game->ten}}
			</h1>
			<ol class="breadcrumb">
				<li><a href="{{route('trangchu')}}">Home</a></li>
				<li><a href="{{route('dashboard')}}">Admin</a></li>
				<li class="active">Key</li>
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
							<form action="{{route('nhapkey',$game->id)}}" method="post" class="col s12">
								{{ csrf_field() }}
								<div class="row">
									<div class="col s12">
										<label for="sel1">Nhập list key (mỗi key nằm trên 1 hàng):</label>
										<textarea id="list" style="height: 20rem;" name="listkey" class="validate"></textarea>
									</div>
								</div>
								<button type="submit" class="btn btn-primary">Nhập</button>
							</form>
							<div class="clearBoth"></div>
						</div>
					</div>
				</div>	
			</div>		

			<!-- /.col-lg-12 --> 
			@endsection