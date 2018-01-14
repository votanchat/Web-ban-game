	<div id="header">
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" id="btnNavar" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
					<a class="navbar-brand" href="#">UIT Game</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li class="active"><a href="{{route('trangchu')}}">Trang chủ</a></li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">Thể loại <span class="caret"></span></a>
							<ul class="dropdown-menu">
								@foreach($theLoai as $tl)
								<li><a href="the-loai/{{$tl->id}}">{{$tl->ten}}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="#">Page 2</a></li>
						<li><a href="#">Page 3</a></li>
					</ul>
					<form class="navbar-form navbar-left" method="get" action="{{route('timkiem')}}">
						<div class="input-group">
							<input name="keyword" type="text" class="form-control" placeholder="Search">
							<div class="input-group-btn" id="search">
								<button class="btn btn-default" type="submit">
									<i class="glyphicon glyphicon-search"></i>
								</button>
							</div>
						</div>
					</form>
					<ul class="nav navbar-nav navbar-right">
						@if(Auth::check())
						@if(Auth::user()->lv > 0)
						<li><a href="{{route('dashboard')}}"><span class="glyphicon glyphicon-cog"></span> Admin CP</a></li>
						@endif
						<li><a href="{{route('profile')}}"><span class="glyphicon glyphicon-user"></span> {{Auth::user()->name}}</a></li>
						<li><a href="{{route('dangxuat')}}"><span class="glyphicon glyphicon-off"></span> Đăng xuất</a></li>
						@else
						<li><a href="{{route('dangky')}}"><span class="glyphicon glyphicon-user"></span> Đăng ký</a></li>
						<li><a href="{{route('dangnhap')}}"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>
						@endif
						
						<div class="cart" style="float: left;">
							@if(isset($dsgamemua))
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> <span>Giỏ hàng ({{Session('cart')->totalQty}})</span> <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
								@foreach($dsgamemua as $gamemua)
								<div class="cart-item">
									<a class="cart-item-delete" id="{{$gamemua['item']->id}}"><i class="fa fa-times"></i></a>
									<div class="media">
										<a class="pull-left" href="{{$gamemua['item']->id}}"><img src="{{$gamemua['item']->imageUrl}}" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">{{$gamemua['item']->ten}}</span>
											<span class="cart-item-amount">{{$gamemua['qty']}} x <span>
												@if(isset($gamemua['item']->khuyenMai))
												{{number_format($gamemua['item']->gia*$gamemua['item']->khuyenMai->soPhanTramKm/100)}} đ
												@else
												{{number_format($gamemua['item']['gia'])}} đ
											@endif</span></span>
										</div>
									</div>
								</div>
								@endforeach
								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{number_format($tongtien)}} đ</span></div>
									<div class="clearfix"></div>
									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{route('dathang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
							@else
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> <span>Giỏ hàng (0)</span> <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">Giỏ hàng trống !</div>
							@endif
						</div>

					</ul>
				</div>
			</div>
		</nav>
	</div>