@extends('layouts.master')
@section('content')



<section>
	<div class="container">
		<div class="row">

			<div class="col col_9_of_12">
				@php
				if (isset($_GET['page'])) {
					$pg=$_GET['page'];
				}else{
					$pg=0;
				}

				@endphp
				<h1 class="page_title">Hiển thị kết quả tìm kiếm : <b>{{$q}}</b></h1>
				
				<p class="woocommerce-result-count">Showing {{$pg*10}} - {{count($resultSearch)*($pg+1)}} results</p>
				<form class="woocommerce-ordering" method="get">
					<select name="orderby" class="orderby">
						<option value="menu_order" selected="selected">Default sorting</option>
						<option value="popularity">Sort by popularity</option>
						<option value="rating">Sort by average rating</option>
						<option value="date">Sort by newness</option>
						<option value="price">Sort by price: low to high</option>
						<option value="price-desc">Sort by price: high to low</option>
					</select>
				</form>
				<br><br>


				<div class="row">
					@foreach($resultSearch as $resultSearch1)
					<div class="col col_6_of_12">

						<div class="layout_post_1">
							<div class="item_thumb">

								<div class="thumb_icon">
									<a href="{{route('category',['category'=>$resultSearch1->shownamesubcate()->slug,'post'=>$resultSearch1->slug])}}" style="background-color: #913D88"><i class="fa fa-copy"></i></a>
								</div>
								<div class="thumb_hover">
									<a href="{{route('category',['category'=>$resultSearch1->shownamesubcate()->slug,'post'=>$resultSearch1->slug])}}"><img src="images/{{$resultSearch1->images}}" alt="Post"></a>
								</div>
								<div class="thumb_meta">
									<span class="category" style="background-color: #913D88"><a href="{{route('category',$resultSearch1->shownamesubcate()->slug)}}">{{$resultSearch1->shownamesubcate()->name}}</a></span>
									<span class="comments"><a href="post_single.html">15 Comments</a></span>
								</div>
							</div>
							<div class="item_content">
								<h4><a href="{{route('category',['category'=>$resultSearch1->shownamesubcate()->slug,'post'=>$resultSearch1->slug])}}">{{$resultSearch1->title}}</a></h4>
								<p>{{$resultSearch1->summary}} [...]</p>
								<div class="item_meta clearfix">
									<span class="meta_date">{{$resultSearch1->created_at}}</span>
									<span class="meta_likes"><a href="#">29</a></span>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				{{ $resultSearch->links('vendor.pagination.custompg') }}

			</div>

			@include('client.sidebar')
		</div>
	</div>
</section>
@endsection