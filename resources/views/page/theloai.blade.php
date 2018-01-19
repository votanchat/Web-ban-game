@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">{{$theloai->ten}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trangchu')}}">Home</a> / <span>{{$theloai->ten}}</span>
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
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($dstheloai as $tl)
							@if($tl->id==$theloai->id)
							<li class="is-active"><a href="the-loai/{{$tl->id}}">{{$tl->ten}}</a></li>
							@else
							<li><a href="the-loai/{{$tl->id}}">{{$tl->ten}}</a></li>
							@endif
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Danh sách</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($theloai->game)}} game</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($dsgame as $game)
								<div class="col-sm-4">
									<div class="single-item">
										@if(isset($game->khuyenMai))
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
											@endif
										<div class="single-item-header">
											<a href="{{route('game',$game->id)}}"><img src="{{$game->imageUrl}}" alt="" height="180px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$game->ten}}</p>
											@if(isset($game->khuyenMai)) 
												<p class="single-item-price">
													<span class="flash-sale">{{number_format($game->gia*$game->khuyenMai->soPhanTramKm/100)}}đ</span>
													<span class="flash-del">{{number_format($game->gia)}}đ</span>	
												</p>
												@else 
												<p class="single-item-price">
													<span>{{number_format($game->gia)}}đ</span>
												</p>
												@endif 
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-right" href="{{route('themgiohang',$game->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('game',$game->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>

						<div class="space50">&nbsp;</div>
					<div class="row">{{$dsgame->links()}}</div>
					</div>
				</div> 


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div>
@endsection
@section('title',$theloai->ten)