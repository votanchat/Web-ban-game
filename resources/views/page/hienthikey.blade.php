@extends('master')
@section('content')
@if(isset($dh))		
		<div id="accordion">
			Key chỉ hiển thị 1 lần vui lòng lưu lại
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
			</div>
@endif
@endsection