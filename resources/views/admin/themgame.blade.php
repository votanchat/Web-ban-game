@extends('admin.master')
@section('title','Thêm game')
@section('content')
<div id="page-wrapper" >
		  <div class="header"> 
                        <h1 class="page-header">
                             Thêm game
                        </h1>
						<ol class="breadcrumb">
            <li><a href="{{route('trangchu')}}">Home</a></li>
            <li><a href="{{route('dashboard')}}">Admin</a></li>
            <li class="active">Game</li>
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
    <form action="{{route('themgame')}}" method="post" class="col s12">
    	{{ csrf_field() }}
      <div class="row">
        <div class="input-field col s12">
          <input id="first_name" name='ten' type="text" class="validate">
          <label for="first_name">Tên game:</label>
        </div>
      </div>
      <div class="row">
      	<div class="col s12">
      		<label for="sel1">Thể loại:</label>
      		<select class="form-control" name="theloai">
      			@foreach($dstheloai as $theloai)
      			<option value="{{$theloai->id}}">{{$theloai->ten}}</option>
      			@endforeach
      		</select>
      	</div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="gia" type="number" name="gia" class="validate">
          <label for="gia">Giá:</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="img" type="text" name="img" class="validate">
          <label for="img">Link ảnh game:</label>
        </div>
      </div>
      <div class="row">
        <div class="col s12">
          <label for="chitiet">Chi tiết:</label>
          <textarea id="chitiet" name="chitiet" class="validate"></textarea> 
        </div>
      </div>
      <div class="row">
        <div class="col s12">
          <label for="mota">Mô tả:</label>
          <textarea id="mota" name="mota" class="validate"></textarea> 
        </div>
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