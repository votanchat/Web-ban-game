	<div id="footer" class="color-div">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="widget">
						<h4 class="widget-title">Instagram Feed</h4>
						<div id="beta-instagram-feed"><div></div></div>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="widget">
						<h4 class="widget-title">Information</h4>
						<div>
							<ul>
								<li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Web Design</a></li>
								<li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Web development</a></li>
								<li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Marketing</a></li>
								<li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Tips</a></li>
								<li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Resources</a></li>
								<li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Illustrations</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="col-sm-10">
						<div class="widget">
							<h4 class="widget-title">Contact Us</h4>
							<div>
								<div class="contact-info">
									<i class="fa fa-map-marker"></i>
									<p>Công ty UIT Game </p>
									<p>Cung cấp game uy tín nhất thị trường</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="widget">
						<h4 class="widget-title">Newsletter Subscribe</h4>
						<form action="#" method="post">
							<input type="email" name="your_email">
							<button class="pull-right" type="submit">Subscribe <i class="fa fa-chevron-right"></i></button>
						</form>
					</div>
				</div>
			</div> <!-- .row -->
		</div> <!-- .container -->
	</div> <!-- #footer -->
	<div class="copyright">
		<div class="container">
			<p class="pull-left">Privacy policy. (&copy;) 2014</p>
			<p class="pull-right pay-options">
				<a href="#"><img src="assets/dest/images/pay/master.jpg" alt="" /></a>
				<a href="#"><img src="assets/dest/images/pay/pay.jpg" alt="" /></a>
				<a href="#"><img src="assets/dest/images/pay/visa.jpg" alt="" /></a>
				<a href="#"><img src="assets/dest/images/pay/paypal.jpg" alt="" /></a>
			</p>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .copyright -->
	<script>
		var formatter = new Intl.NumberFormat('en-US');
		$(function() {
			$.get("{{route('thongtingiohang')}}", function(data){
				UpdateCart(data.dsgamemua,data.tongtien,data.soluong);
			});
		});

		function UpdateCart(dsgame,tongtien,soluong) {
			if (typeof tongtien === 'undefined') {
				jQuery('.beta-select span').text('Giỏ hàng (0)');
				jQuery('div.beta-dropdown.cart-body').text('Giỏ hàng trống ! ');
			}else{
				jQuery('.beta-select span').text('Giỏ hàng ('+soluong+')');
				var txt='';
				//var txt='<div class="beta-dropdown cart-body" style="left: auto; right: 15px; display: block;">';
				dsgame.forEach(function(game){
					txt+='<div class="cart-item">  <a class="cart-item-delete" id="'+game.item.id+'"><i class="fa fa-times"></i></a>   <div class="media">	<a class="pull-left" href="'+game.item.id+'"><img src="'+game.item.imageUrl+'" alt=""></a> 	<div class="media-body"><span class="cart-item-title">'+game.item.ten+'</span><span class="cart-item-amount">'+game.qty+' x <span>'+formatter.format(game.price)+' đ</span></span></div></div></div>';
				});
				txt+='<div class="cart-caption"><div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">'+formatter.format(tongtien)+' đ</span></div><div class="clearfix"></div><div class="center"><div class="space10">&nbsp;</div><a href="{{route('dathang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a></div></div>';
				jQuery('div.beta-dropdown.cart-body').html(txt);
				jQuery('.cart-item-delete').click(function(){
					var id = jQuery(this).attr("id");
					jQuery.get('del-item-cart/'+id, function(data){
						UpdateCart(data.dsgamemua,data.tongtien,data.soluong);
					});
				});
			}
		}
		$(document).ready(function($) {
			if($(document).width()<750){
					$("#search").css("width", "1%");
					$(".cart-body").css({"left": "1px", "right": "auto"});
				}else{
					$("#search").css("width", "0%");
					$(".cart-body").css({"left": "auto", "right": "15px"});
			}
			$(window).resize(function(){
				if($(document).width()<750){
					$("#search").css("width", "1%");
					$(".cart-body").css({"left": "1px", "right": "auto"});
				}else{
					$("#search").css("width", "0%");
					$(".cart-body").css({"left": "auto", "right": "15px"});
				}
			})
			$('body').css("padding-top",$(".navbar").height());
			$(window).resize(function(){
			$('body').css("padding-top",$(".navbar").height());
			})


			function flyToElement(flyer, flyingTo) {
				    var $func = $(this);  
				    var flyerClone = $(flyer).clone();
				    $(flyerClone).css({
					        position: 'absolute',
					        top: $(flyer).offset().top + "px",
					        left: $(flyer).offset().left + "px",
					        opacity: 1,
					        'z-index': 1000
				    }).appendTo($('body'));
				 
				    var gotoX = $(flyingTo).offset().left;
				    var gotoY = $(flyingTo).offset().top;
				    $(flyerClone).animate({
					        opacity: 0.4,
					        left: gotoX,
					        top: gotoY,
					        width: $(flyingTo).width(),
					        height: $(flyingTo).height()
				    }, 700,
				    function () {
					        $(flyingTo).effect("shake",function(){
						            $(flyerClone).fadeOut('fast', function () {
							                $(flyerClone).remove();
						            });
					        });
				    });
			}
			$(function(){
				$('.add-to-cart').click(function(){
					var $_this = $(this);
					var id = $(this).attr("id");
					var itemImg = $(this).closest('.single-item').find('img').eq(0);
					flyToElement(itemImg, $('.beta-select'));
					$.get('add-to-cart/'+id, function(data){
						UpdateCart(data.dsgamemua,data.tongtien,data.soluong);
					});
				});
			});
		});
		</script>
	<!-- include js files -->
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="assets/dest/vendors/animo/Animo.js"></script>
	<script src="assets/dest/vendors/dug/dug.js"></script>
	<script src="assets/dest/js/scripts.min.js"></script>
	<script src="assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="assets/dest/js/waypoints.min.js"></script>
	<script src="assets/dest/js/wow.min.js"></script>
	<!--customjs-->
	<script src="assets/dest/js/custom2.js"></script>