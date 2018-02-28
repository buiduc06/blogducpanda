<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">

<!-- Mirrored from trendyblog.different-themes.com/html/home_blocks.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Jan 2018 17:48:23 GMT -->
<head>
	<title>DucPanda Blog | Cùng Nhau Chia Sẻ</title>
	<meta charset="UTF-8">
	<meta property="fb:app_id" content="1545563538883800"/>
	<meta property="fb:admins" content="100007893810964"/>
	<base href="{{asset('')}}">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="icon" href="favicon.png">

	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/fontawesome.css">
	<link rel="stylesheet" href="css/weather.css">
	<link rel="stylesheet" href="css/colors.css">
	<link rel="stylesheet" href="css/typography.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/demo-settings.css">

	<link rel="stylesheet" type="text/css" media="(max-width:768px)" href="css/responsive-0.css">
	<link rel="stylesheet" type="text/css" media="(min-width:769px) and (max-width:992px)" href="css/responsive-768.css">
	<link rel="stylesheet" type="text/css" media="(min-width:993px) and (max-width:1200px)" href="css/responsive-992.css">
	<link rel="stylesheet" type="text/css" media="(min-width:1201px)" href="css/responsive-1200.css">
	<link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,300italic,400,400italic,700,700italic" rel='stylesheet' type='text/css'>
	
	{{-- <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css"> --}}
</head>
<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=1545563538883800&autoLogAppEvents=1';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<div id="wrapper" class="wide">

		<header id="header" role="banner">

			<div class="header_meta">
				<div class="container">

					<div class="weather_forecast">
						<i class="wi wi-day-lightning"></i>
						<span class="city">Hà Nội, việt Nam</span>
						<span class="temp">18°C</span>
					</div>

					<nav class="top_navigation" role="navigation">
						<span class="top_navigation_toggle"><i class="fa fa-reorder"></i></span>
						<ul class="menu">
							<li class="menu-item-has-children"><a href="{{ route('homepage') }}">Home</a>
								<span class="top_sub_menu_toggle"></span>
								<ul class="sub-menu">
									<li><a href="index.html">Homepage</a></li>
								</ul>
							</li>
							<li class="menu-item-has-children"><a href="#">About</a>
								<span class="top_sub_menu_toggle"></span>
								<ul class="sub-menu">
									<li><a href="home_blocks.html">Blocks</a></li>
									<li><a href="home_blocks_1.html">Blocks 1</a></li>
									<li><a href="home_blocks_2.html">Blocks 2</a></li>
									<li><a href="home_blocks_3.html">Blocks 3</a></li>
									<li><a href="home_blocks_4.html">Blocks 4</a></li>
									<li><a href="home_blocks_5.html">Blocks 5</a></li>
									<li><a href="home_blocks_6.html">Blocks 6</a></li>
								</ul>
							</li>
							<li><a href="page_contact.html">Contact</a></li>
							<li><a href="blog.html">Blog</a></li>
							@if(Auth::check())
									<li class="menu-item-has-children"><a href="#">hello ! {{Auth::user()->name}}</a>
								<span class="top_sub_menu_toggle"></span>
								<ul class="sub-menu">
									<li><a href="{{route('admin.index')}}" >Go To Panel</a></li>
									<li><a href="{{route('logout')}}">Log out</a></li>
								</ul>
							</li>
						
							@else
							<li><a href="{{url('login')}}">login</a></li>
							<li><a href="{{url('register')}}">Register</a></li>
							@endif
							<li class="search_icon_form"><a href="#"><i class="fa fa-search"></i></a>
								<div class="sub-search">
									<form action="{{ url('search') }}" method="get">
										<input type="search" name="q" placeholder="Search...">
										<input type="submit" value="Search">
									</form>
								</div>
							</li>
						</ul>
					</nav>
				</div>
			</div>

			<div id="header_main" class="sticky header_main">
				<div class="container">

					<div class="site_brand">
						<h1 id="site_title"><a href="{{route('homepage')}}">ducpanda<span>Blog</span></a></h1>
						<h2 id="site_description">Love IT</h2>
					</div>

					<nav class="site_navigation" role="navigation">
						<span class="site_navigation_toggle"><i class="fa fa-reorder"></i></span>
						<ul class="menu">
							@foreach($allcategories as $allcategories1)
							<li class="menu-item-has-children"><a href="#">{{$allcategories1->name}}<div class="subtitle">Frontpages</div></a>
								<span class="site_sub_menu_toggle"></span>
								<ul class="sub-menu" style="border-top-color: #D2527F">
									@foreach($allcategories1->subcategory as $showsubcate)
									<li><a href="{{route('category',$showsubcate->slug)}}">{{$showsubcate->name}}</a></li>
									@endforeach
								</ul>
							</li>
							@endforeach


							{{-- shop card--}}
							{{-- <li class="menu-item-has-children"><a href="shop.html"><i class="fa fa-shopping-cart"></i><div class="subtitle">4 Items</div></a>
								<span class="site_sub_menu_toggle"></span>
								<div class="cart_content">
									<div class="widget_shopping_cart_content">
										<ul class="cart_list product_list_widget">

											<li>
												<a href="#"><img src="demo/60x60.png" alt="Image">This is shop item</a>
												<span class="quantity">2 × <span class="amount">$9.00</span></span>
											</li>

											<li>
												<a href="#"><img src="demo/60x60.png" alt="Image">This is shop item</a>
												<span class="quantity">2 × <span class="amount">$9.00</span></span>
											</li>

											<li>
												<a href="#"><img src="demo/60x60.png" alt="Image">This is shop item</a>
												<span class="quantity">2 × <span class="amount">$9.00</span></span>
											</li>
										</ul>
										<p class="total">
											<strong>Subtotal:</strong>
											<span class="amount">$44.00</span>
										</p>
										<p class="buttons">
											<a href="#" class="button btn btn_small wc-forward">View Cart</a>
											<a href="#" class="button btn btn_small btn_red checkout wc-forward">Checkout</a>
										</p>
									</div>
								</div>
							</li> --}}

							{{-- end shop card --}}
						</ul>
					</nav>
				</div>
			</div>
		</header>


		@yield('content')

		<footer id="footer">
			<div class="container">
				<div class="row">
					<div class="col col_3_of_12">

						<div class="widget">
							<div class="widget_title"><h3>TrendyBlog</h3></div>
							<p>TrendyBlog is a professional HTML5 template perfect for newspaper publishers, magazines ort personal blogs.</p>
							<p>You get 30 fully featured pages with lots of widgets, menus, different post layouts and homepages.</p>
						</div>

						<div class="widget">
							<div class="widget_title"><h3>Socialize</h3></div>
							<div class="tb_widget_socialize clearfix">
								<a href="https://www.facebook.com/ducdeveloper" target="_blank" class="icon facebook">
									<div class="symbol"><i class="fa fa-facebook"></i></div>
									<div class="text"><p>46,841</p><p>Facebook</p></div>
								</a>
								<a href="https://plus.google.com/" target="_blank" class="icon google">
									<div class="symbol"><i class="fa fa-google-plus"></i></div>
									<div class="text"><p>17,045</p><p>Google+</p></div>
								</a>
							</div>
						</div>
					</div>
					<div class="col col_3_of_12">

						<div class="widget">
							<div class="widget_title"><h3>Top View</h3></div>
							<div class="tb_widget_top_rated clearfix">
								@php
								$i=1;
								@endphp
								@foreach($TopViewPost as $TopViewPost1)
								<div class="item clearfix">
									<div class="item_thumb clearfix">
										<a href="{{route('category',['category'=>$TopViewPost1->shownamesubcate()->slug,'post'=>$TopViewPost1->slug])}}"><img src="images/{{$TopViewPost1->images}}" alt="Post" class="visible animated"></a>
									</div>
									<div class="item_content">
										<div class="item_meta clearfix">
											<span class="meta_rating" title="Rated 4.50 out of 5">
												<span style="width: 100%">
													<strong>5</strong>
												</span>
											</span>
										</div>
										<h4><a href="{{route('category',['category'=>$TopViewPost1->shownamesubcate()->slug,'post'=>$TopViewPost1->slug])}}">Nam at maximus nisl sed tempus est</a></h4>
										<p style="color: red">{{number_format($TopViewPost1->views)}} views</p>
									</div>
									<div class="order">{{$i++}}</div>
								</div>


								@endforeach
							</div>
						</div>
					</div>
					<div class="col col_3_of_12">
						<div class="widget">
							<div class="widget_title"><h3>Recent posts</h3></div>
							<div class="tb_widget_recent_list clearfix">
								@foreach($RecentPosts as $RecentPosts1)
								<div class="item clearfix">
									<div class="item_thumb">
										<div class="thumb_icon">
											<a href="{{route('category',['category'=>$RecentPosts1->shownamesubcate()->slug,'post'=>$RecentPosts1->slug])}}"><i class="fa fa-copy"></i></a>
										</div>
										<div class="thumb_hover">
											<a href="{{route('category',['category'=>$RecentPosts1->shownamesubcate()->slug,'post'=>$RecentPosts1->slug])}}"><img src="images/{{$RecentPosts1->images}}" alt="Post"></a>
										</div>
									</div>
									<div class="item_content">
										<h4><a href="{{route('category',['category'=>$RecentPosts1->shownamesubcate()->slug,'post'=>$RecentPosts1->slug])}}">{{$RecentPosts1->title}}</a></h4>
										<div class="item_meta clearfix">
											<span class="meta_date">{{$RecentPosts1->created_at}}</span>
											<span class="meta_likes"><a href="{{route('category',['category'=>$RecentPosts1->shownamesubcate()->slug,'post'=>$RecentPosts1->slug])}}">29</a></span>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>	
					</div>
					<div class="col col_3_of_12">
						<div class="widget">
							<div class="widget_title"><h3>Archive</h3></div>
							<div class="tb_widget_categories">
								<ul>
									<li><a href="#">May</a> (159)</li>
									<li><a href="#">January</a> (159)</li>
									<li><a href="#">October</a> (159)</li>
									<li><a href="#">September</a> (159)</li>
									<li><a href="#">July</a> (159)</li>
									<li><a href="#">June</a> (159)</li>
									<li><a href="#">October</a> (159)</li>
									<li><a href="#">January</a> (159)</li>
									<li><a href="#">April</a> (159)</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>

		<div id="copyright" role="contentinfo">
			<div class="container">
				<p>&copy; 2018 ducpanda blog. <a href="https://facebook.com/ducdeveloper" target="_blank">ducdeveloper</a></p>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="js/jqueryscript.min.js"></script>
	<script type="text/javascript" src="js/jqueryuiscript.min.js"></script>
	<script type="text/javascript" src="js/easing.min.js"></script>
	<script type="text/javascript" src="js/smoothscroll.min.js"></script>
	<script type="text/javascript" src="js/magnific.min.js"></script>
	<script type="text/javascript" src="js/bxslider.min.js"></script>
	<script type="text/javascript" src="js/fitvids.min.js"></script>
	<script type="text/javascript" src="js/demo-settings.js"></script>
	<script type="text/javascript" src="js/viewportchecker.js"></script>
	<script type="text/javascript" src="js/init.js"></script>
</body>
{{-- @if(Session()->has('msg') || Session()->has('success')) --}}
@if(Session()->has('msg'))
<script>alert("{{Session('msg')}}")</script>
@endif
<!-- Mirrored from trendyblog.different-themes.com/html/home_blocks.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Jan 2018 17:48:30 GMT -->
</html>
