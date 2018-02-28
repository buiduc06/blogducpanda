@extends('layouts.master')
@section('content')
<section>
	<div class="container">
		<div class="row">

			<div class="col col_9_of_12">
				{{-- check bai viet rong trong danh muc --}}
				@if(count($getDataPost)==null)
				<div class="alert_message red head_title" style="text-align: center;margin-top: 10px;">
				<h4>Xin Lỗi Chuyên Mục <b style="color: #f85050">{{$getDataCategory->name}}</b> hiện Không Có Bài Viết</h4>
				</div>
				
				@else
				<h1 class="page_title">{{$getDataCategory->name}}</h1>
				<div class="row">

					<div class="col col_12_of_12">

						@foreach($getDataPost as $getDataPost1)

						<div class="layout_post_2 clearfix">
							<div class="item_thumb">

								<div class="thumb_icon">
									<a href="{{route('category',['category'=>$getDataCategory->slug,'post'=>$getDataPost1->slug])}}" style="background-color: #913D88"><i class="fa fa-copy"></i></a>
								</div>
								<div class="thumb_hover">
									<a href="{{route('category',['category'=>$getDataCategory->slug,'post'=>$getDataPost1->slug])}}"><img src="images/{{$getDataPost1->images}}" alt="Post"></a>
								</div>
								<div class="thumb_meta">
									<span class="category" style="background-color: #913D88"><a href="{{route('category',$getDataCategory->slug)}}">{{$getDataCategory->name}}</a></span>
									<span class="comments"><a href="post_single.html">15 Comments</a></span>
								</div>
							</div>
							<div class="item_content">
								<h4><a href="{{route('category',['category'=>$getDataCategory->slug,'post'=>$getDataPost1->slug])}}">{{$getDataPost1->title}}</a></h4>
								<p>{{$getDataPost1->summary}} [...]</p>
								<div class="item_meta clearfix">
									<span class="meta_date">{{$getDataPost1->created_at}}</span>
									<span class="meta_likes"><a href="#">29</a></span>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>

				{{-- pagination custom --}}
				{{ $getDataPost->links('vendor.pagination.custompg') }}

				@endif
			</div>

			@include('client.sidebar')
		</div>
	</div>
</section>

@endsection
