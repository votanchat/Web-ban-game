@extends('master')
@section('content')
	<div class="rev-slider">
		<div class="fullwidthbanner-container">
			<div class="fullwidthbanner">
				<div class="bannercontainer" >
					<div class="banner" >
						<ul>
							@foreach($slide as $sl)
							<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
								<div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
									<a href="{{$sl->link}}">
										<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="{{$sl->image}}" data-src="{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
										</div>
									</a>
								</div>
								
							</li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="tp-bannertimer"></div>
			</div>
		</div>
	</div>
	<div class="container">
			<div id="content" class="space-top-none">
				<div class="main-content">
					<div class="space60">&nbsp;</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="beta-products-list">
								<h4>Game hot</h4>
								<div class="beta-products-details">
									<p class="pull-left">{{count($gamehot)}} game</p>
									<div class="clearfix"></div>
								</div>
								<div class="row">
									@foreach($gamehot as $moi) 
									<div class="col-sm-4">
										<div class="single-item">
											@if(isset($moi->khuyenMai))
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
											@endif
											<div class="single-item-header">
												<a href="{{route('game',$moi->id)}}"><img id="img" src="{{$moi->imageUrl}}" alt="" height="220px"></a>
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
												<button class="add-to-cart pull-right" id="{{$moi->id}}"><i class="fa fa-shopping-cart"></i></button>
												<a class="beta-btn primary" href="{{route('game',$moi->id)}}">Details <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
							<div class="space50">&nbsp;</div>
							<div class="beta-products-list">
								<h4>Game mới</h4>
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
												<button class="add-to-cart pull-right" id="{{$moi->id}}"><i class="fa fa-shopping-cart"></i></button>
												<a class="beta-btn primary" href="{{route('game',$moi->id)}}">Details <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
									@endforeach 
								</div>
								<div class="row">{{$gamemoi->links()}}</div>
							</div>

							
						</div>
					</div> <!-- end section with sidebar and main content -->


				</div> <!-- .main-content -->
			</div> <!-- #content -->
	</div>
@endsection
@section('title','Home')