@extends('admin.master')
@section('title','Thêm Khuyến mãi')
@section('content')
<div id="page-wrapper" >
		  <div class="header"> 
                        <h1 class="page-header">
                             Thêm Khuyến mãi
                        </h1>
						<ol class="breadcrumb">
            <li><a href="{{route('trangchu')}}">Home</a></li>
            <li><a href="{{route('dashboard')}}">Admin</a></li>
            <li class="active">Khuyến mãi</li>
          </ol> 
									
		</div>
		
            <div id="page-inner"> 
			 <div class="row">
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
			 <div class="col-lg-12">
			 <div class="card">
                        <div class="card-action">
                            Nhập thông tin
                        </div>
                        <div class="card-content">
    <form action="{{route('themkhuyenmai')}}" method="post" class="col s12">
    	{{ csrf_field() }}
      <div class="row">
        <div class="input-field col s12">
          <input id="first_name" name='ten' type="text" class="validate">
          <label for="first_name">Tên Khuyến mãi:</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="first_name" name='soPhanTramKm' type="number" min="1" class="validate">
          <label for="first_name">Số % khuyến mãi:</label>
        </div>
      </div>
      <div class="row">
      	<label class="active">Thể loại:</label>
      			@foreach($dsgame as $game)
      			<p>
      				<input type="checkbox" value="{{$game->id}}" name="game[]" id="{{$game->id}}">
      				<label for="{{$game->id}}">{{$game->ten}}
              @if($game->khuyenMai)
              *
              @endif
              </label>
      			</p>
      			@endforeach
      </div>
      <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
	<div class="clearBoth"></div>
  </div>
    </div>
 </div>	
	 </div>		

                <!-- /.col-lg-12 --> 
@endsection