@extends('master')
@section('content')
	<div class="well">
		@if(count($errors)>0)
	<div class="alert alert-danger">
		@foreach($errors->all() as $loi)
		{{$loi}}
		@endforeach
	</div>
	@endif
	@if(Session('thongbao'))
	<div class="alert alert-success">
		{{Session('thongbao')}}
	</div>
	@endif
		<ul class="nav nav-tabs">
			<li class="active"><a href="#lichsu" data-toggle="tab">Lịch sử giao dịch</a></li>
			<li><a href="#home" data-toggle="tab">Thông tin</a></li>
			<li><a href="#profile" data-toggle="tab">Mật khẩu</a></li>
		</ul>
		<div id="myTabContent" class="tab-content">
			<div class="tab-pane active in" id="lichsu">
				
				<div id="accordion">
					@foreach($donhang as $dh)
					<h3 class="sectiondropdown">Đơn hàng #{{$dh->id}} 
					@if($dh->trangThai==1)
					<b class="glyphicon glyphicon-ok-sign text-success"></b>
					@else
					<b class="glyphicon glyphicon-exclamation-sign text-danger"></b>
					@endif
					<i class="fa fa-caret-down" aria-hidden="true"></i></h3>
					<div style="height: 100% !important;">
						<p>
							@foreach($dh->chiTietDonHang as $chitiet)
							<p><strong>Game : </strong> {{$chitiet->game->ten}}</p>
							<p><strong>Số lượng : </strong>{{$chitiet->soLuong}}</p>
							<p><strong>Key :
							@foreach($chitiet->key as $key)
							{{$key->key}}, 
							@endforeach 
							</strong></p>
							@endforeach
						</p>
					</div>
					@endforeach
				</div>
			</div>
			<div class="tab-pane fade" id="home">
				<form action="{{route('updateprofile')}}" method="post" id="tab">
					{{ csrf_field() }}
					<label>Tên</label>
					<input type="text" value="{{Auth::user()->name}}" name="fullname" class="input-xlarge">
					<label>Email</label>
					<input type="text" value="{{Auth::user()->email}}" name="email" class="input-xlarge">
					<label>Số điện thoại</label>
					<input type="text" value="{{Auth::user()->sdt}}" name="phone" class="input-xlarge">	
					<label>Địa chỉ</label>
					<textarea name="adress" rows="3" class="input-xlarge">{{Auth::user()->diaChi}}</textarea>
					<label>Nhập mật khẩu để cập nhật</label>
					<input type="password" name="password" class="input-xlarge">
					<div class="space40">
						<button class="btn btn-primary">Cập Nhật</button>
					</div>
				</form>
			</div>
			<div class="tab-pane fade" id="profile">
				<form id="tab2" method="post" action="{{route('updatepassword')}}">
					{{ csrf_field() }}
					<label>Mật khẩu</label>
					<input name="password" type="password" class="input-xlarge">
					<label>Mật khẩu mới</label>
					<input name="passwordnew" type="password" class="input-xlarge">
					<label>Nhập lại mật khẩu mới</label>
					<input name="re_passwordnew" type="password" class="input-xlarge">
					<div>
						<button class="btn btn-primary">Cập Nhật</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>
		jQuery( function() {
			jQuery( "#accordion" ).accordion({ header: "h3", collapsible: true, active: false, heightStyle: "content", autoHeight: false });
		} );
		jQuery('.sectiondropdown').click(function() {
			jQuery("i", this).toggleClass("fa-caret-up fa-caret-down");
		});
</script>
@endsection
@section('title','Trang cá nhân')