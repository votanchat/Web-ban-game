<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hóa đơn số {{$donhang->id}} </title>
	<base href="{{asset('')}}">
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="assets/dest/css/style.css">
	<link rel="stylesheet" href="assets/dest/css/animate.css">
</head>
<body>
	<div class="container">
		<div class="row">
			@if(Session::has('thanhcong'))
                       <div class="alert alert-success"> {{Session::get('thanhcong')}}</div>
                       @endif
			<div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<address>
							<strong>UIT Game</strong>
							<br>
							Khu phố 6, P.Linh Trung
							<br>
							Q.Thủ Đức, Tp.Hồ Chí Minh
							<br>
							<abbr title="Phone">Sdt:</abbr> 0969696969
						</address>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 text-right">
						<p>
							<em>Ngày: {{$donhang->created_at}}</em>
						</p>
						<p>
							<em>Hóa đơn số #: {{$donhang->id}}</em>
						</p>
					</div>
				</div>
				<div class="row">
					<div class="text-center">
						<h1>Hóa đơn</h1>
					</div>
					<div class="text-left">
						<p><strong>Khách hàng:</strong> {{$donhang->ten}} </p>
						<p><strong>Email:</strong> {{$donhang->mailNhan}}</p>
					</div>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Tên game</th>
								<th>#</th>
								<th class="text-center">Giá</th>
								<th class="text-center">Tổng tiền</th>
							</tr>
						</thead>
						<tbody>
							@foreach($donhang->chiTietDonHang as $chitiet)
							<tr>
								<td class="col-md-9"><em>{{$chitiet->game->ten}}</em></h4></td>
								<td class="col-md-1" style="text-align: center"> {{$chitiet->soLuong}} </td>
								<td class="col-md-1 text-center">{{number_format($chitiet->donGia)}}đ</td>
								<td class="col-md-1 text-center">{{number_format($chitiet->soLuong*$chitiet->donGia)}}đ</td>
							</tr>
							@endforeach
							<tr>
								<td>   </td>
								<td>   </td>
								<td class="text-right col-md-3">
									<p>
										<strong>Tổng tiền:</strong>
									</p>
									<p>
										<strong>Thanh toán:</strong>
									</p>
								</td>
								<td class="text-center">
									<p>
										<strong>{{number_format($donhang->tien)}}đ</strong>
									</p>
									<p>
										<strong>{{number_format($tongtien)}}đ</strong>
									</p>
								</td>
							</tr>
							<tr>
								<td>   </td>
								<td>   </td>
								<td class="text-right col-md-5"><h4><strong>Còn lại: </strong></h4></td>
								<td class="text-center text-danger"><h4><strong>{{number_format($donhang->tien-$tongtien)}}đ</strong></h4></td>
							</tr>
						</tbody>
					</table>
					@if($donhang->tien-$tongtien>0)
					<a type="button" href="thanh-toan/{{$donhang->id}}/{{$donhang->tien-$tongtien}}" class="btn btn-success btn-lg btn-block">Thanh toán<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
					@else
					<a type="button" href="{{route('trangchu')}}" class="btn btn-success btn-lg btn-block">Trang chủ<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
					@endif
				</td>
			</div>
		</div>
	</div>
</body>
</html>
