@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đặt hàng</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('trangchu')}}">Trang chủ</a> / <span>Đặt hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content">
			
			<form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
				{{ csrf_field() }}
				<div class="row">
					@if(count($errors)>0)
					<div class="alert alert-danger">
						@foreach($errors->all() as $loi)
						{{$loi}}
						@endforeach
					</div>
					@endif
					@if(Session('thanhcong'))
					<div class="alert alert-success">
						{{Session('thanhcong')}}
					</div>
					@endif
					<div class="col-sm-6">
						<h4>Đặt hàng</h4>
						<div class="space20">&nbsp;</div>
						@if(Auth::check())
							<div class="form-block">
							<label for="name">Họ tên</label>
							<input type="text" name="name" placeholder="Họ tên" value="{{Auth::user()->name}}">
						</div>
						<div class="form-block">
							<label for="email">Email *</label>
							<input type="email" name="email" required value="{{Auth::user()->email}}">
						</div>
						<div class="form-block">
							<label for="adress">Địa chỉ</label>
							<input type="text" name="adress" value="{{Auth::user()->diaChi}}" required>
						</div>
						<div class="form-block">
							<label for="phone">Điện thoại *</label>
							<input type="text" name="sdt" value="{{Auth::user()->sdt}}" required>
						</div>
						<div class="form-block">
							<label for="notes">Ghi chú</label>
							<textarea name="notes"></textarea>
						</div>
						@else
						<div class="form-block">
							<label for="name">Họ tên</label>
							<input type="text" name="name" placeholder="Họ tên" required>
						</div>
						<div class="form-block">
							<label for="email">Email *</label>
							<input type="email" name="email" required placeholder="expample@gmail.com">
						</div>
						<div class="form-block">
							<label for="adress">Địa chỉ</label>
							<input type="text" name="adress" placeholder="Street Address" required>
						</div>
						<div class="form-block">
							<label for="phone">Điện thoại *</label>
							<input type="text" name="sdt" required>
						</div>
						
						<div class="form-block">
							<label for="notes">Ghi chú</label>
							<textarea name="notes"></textarea>
						</div>
						@endif
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
									@if(isset($dsgamemua))
										@foreach($dsgamemua as $gamemua)
										<div class="media">
											<img width="25%" src="{{$gamemua['item']->imageUrl}}" alt="" class="pull-left">
											<div class="media-body">
												<a class="font-large" href="{{$gamemua['item']->id}}"><b style="color: black">{{$gamemua['item']->ten}}</b></a>
												<div class="space5">&nbsp;</div>
												<p class="color-gray your-order-info">Số lượng: <input id="{{$gamemua['item']->id}}" type="number" class="color-black" min="1" max="99" value="{{$gamemua['qty']}}" style="text-align:  center;width: 40px;"></p>
												<div class="space5">&nbsp;</div>
												<span class="color-gray your-order-info">Giá: 
												@if(isset($gamemua['item']->khuyenMai)) 
												<span class="single-item-price">
													<span class="flash-sale">{{number_format($gamemua['item']->gia*$gamemua['item']->khuyenMai->soPhanTramKm/100)}}đ</span>
													<span class="flash-del">{{number_format($gamemua['item']->gia)}}đ</span>
												</span>
												@else 
												<span class="single-item-price">
													<span>{{number_format($gamemua['item']->gia)}}đ</span>
												</span>
												@endif
												</span>
											</div>
										</div>
										@endforeach
									@endif
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">
									@if(isset($dsgamemua))
									{{number_format($tongtien)}}
									@else
									0
									@endif
									đ</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="OL" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán qua ví điện tử</label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Thanh toán qua ví điện tử online
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 123 456 789
											<br>- Chủ TK: Nguyễn A
											<br>- Ngân hàng ACB, Chi nhánh TPHCM
										</div>						
									</li>
									
								</ul>
							</div>

							<div class="text-center"><button class="beta-btn primary">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div>
	</div>
	<script>
		$(function($) {
			$('input[type="number"]').change(function() {
				var id = $(this).attr("id");
				$.get('add-to-cart/'+id+'/'+$(this).val(), function(data){
					UpdateCart(data.dsgamemua,data.tongtien,data.soluong);
					$('h5.color-black').text(formatter.format(data.tongtien)+' đ');
				});
			})
		});
	</script>
@endsection
@section('title','Đặt hàng')