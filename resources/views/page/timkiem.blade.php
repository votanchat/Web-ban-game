@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Tìm kiếm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trangchu')}}">Home</a> / <span>Tìm kiếm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
			<div id="content" class="space-top-none">
				<div class="main-content">
					<div class="space60">&nbsp;</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="beta-products-list">
								<h4>Kết quả tìm kiếm</h4>
								<div class="beta-products-details">
									<p class="pull-left">{{count($gamemoi)}} game</p>
									<div class="clearfix"></div>
								</div>
								<div class="row">
									@foreach($gamemoi as $moi) 
									<div class="col-sm-3">
										<div class="single-item">
											@if(isset($moi->khuyenMai))
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
											@endif
											<div class="single-item-header">
												<a href="{{route('game',$moi->id)}}"><img src="{{$moi->imageUrl}}" alt="" height="180px"></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{$moi->ten}}</p>
												@if(isset($moi->khuyenMai)) 
												<p class="single-item-price">
													<span class="flash-sale">{{number_format($moi->gia*$moi->khuyenMai->soPhanTramKm/100)}}đ</span>
													<span class="flash-del">{{number_format($moi->gia)}}đ</span>
												</p>
												@else 
												<p class="single-item-price">
													<span>{{number_format($moi->gia)}}đ</span>
												</p>
												@endif 
											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-right" href="{{route('themgiohang',$moi->id)}}"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="{{route('game',$moi->id)}}">Details <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
									@endforeach
									@if(count($gamemoi)==0)
									<div class="col-sm-12">Không có game nào !</div>
									@endif
								</div>
								<div class="row">{{$gamemoi->links()}}</div>
							</div>
						</div>
					</div> <!-- end section with sidebar and main content -->
				</div> <!-- .main-content -->
			</div> <!-- #content -->
	</div>
@endsection
@section('title','Tìm kiếm')