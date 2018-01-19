@extends('master')
@section('content')	
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">{{$game->ten}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trangchu')}}">Home</a> / <span><a href="{{route('theloai',$game->theLoai->id)}}">{{$game->theLoai->ten}}</span></a>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">
					<div class="row">
						<div class="col-sm-5">
							<div class="space20">&nbsp;</div>
							<img src="{{$game->imageUrl}}" alt="">
						</div>
						<div class="col-sm-7">
							<div class="single-item-body">
								<h1 class="single-item-title">{{$game->ten}}</h1>
								@if(isset($game->khuyenMai)) 
								<p class="single-item-price">
									<span class="flash-del">{{number_format($game->gia)}}đ</span>
									<span class="flash-sale">{{number_format($game->gia*$game->khuyenMai->soPhanTramKm/100)}}đ</span>
								</p>
								@else 
								<p class="single-item-price">
									<span>{{number_format($game->gia)}}đ</span>
								</p>
								@endif 
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$game->moTa}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Số lượng:</p>
								<input type="number" name="soluong" id="{{$game->id}}" min="1" max="100" class="wc-select" value="1">
								<button class="btn btn-default"><p class="fa fa-shopping-cart"></p></button>
								<div class="clearfix"></div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Chi tiết</a></li>
							<li><a href="#tab-reviews">Reviews (0)</a></li>
						</ul>

						<div class="panel" id="tab-description">
							{{$game->chiTiet}}
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Game cùng thể loại</h4>
						<div class="row">
							@foreach($gamecungtheloai as $moi) 
							<div class="col-sm-4">
								<div class="single-item">
									@if(isset($moi->khuyenMai))
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item-header">
										<a href="{{$moi->id}}"><img src="{{$moi->imageUrl}}" alt="" height="220px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$moi->ten}}</p>
										@if(isset($moi->khuyenMai)) 
										<p class="single-item-price">
											<span class="flash-del">{{number_format($moi->gia)}}đ</span>
											<span class="flash-sale">{{number_format($moi->gia*$moi->khuyenMai->soPhanTramKm/100)}}đ</span>
										</p>
										@else 
										<p class="single-item-price">
											<span>{{number_format($moi->gia)}}đ</span>
										</p>
										@endif
									</div>
									<div class="single-item-caption">
										<button class="add-to-cart pull-right" id="{{$moi->id}}"><i class="fa fa-shopping-cart"></i></button>
										<a class="beta-btn primary" href="{{route('game',$moi->id)}}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Best Sellers</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/1.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/2.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/3.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/4.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">New Products</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/1.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/2.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/3.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/4.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div>
	<script>
		$(function($) {
			$('button.btn-default').click(function() {
				var id = $('input[type="number"]').attr("id");
				$.get('add-to-cart/'+id+'/'+$('input[type="number"]').val(), function(data){
					UpdateCart(data.dsgamemua,data.tongtien,data.soluong);
				});
			})
		});
	</script>
@endsection
@section('title',$game->ten)