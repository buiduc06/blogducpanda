@extends('layouts.master')
@section('content')
<section>
	<div class="container">
		<div class="row">

			<div class="col col_9_of_12">
				@foreach($allcate1 as $allcate)
				@if($loop->first)
				<div class="panel_title">
					<div>
						<h4><a href="#">{{$allcate->name}}</a></h4>
					</div>
				</div>

				<div class="row">
					<div class="col col_12_of_12">
						@foreach($allcate->subcategory as $allsubcate) 
						@if($loop->first)
						<div class="layout_post_1">
							<div class="item_thumb">
								<div class="thumb_icon">
									<a href="{{route('category',['category'=>$allsubcate->slug,'post'=>$allsubcate->getFirstPosts()->slug])}}"><i class="fa fa-copy"></i></a>
								</div>
								
								<div class="thumb_hover">
									<a href="{{route('category',['category'=>$allsubcate->slug,'post'=>$allsubcate->getFirstPosts()->slug])}}"><img style="object-fit: cover;width: 100%;height: 350px;" src="images/{{$allsubcate->getFirstPosts()->images}}" alt="Post"></a>
								</div>
								<div class="thumb_meta">
									<span class="category"><a href="{{route('category',$allsubcate->slug)}}">{{$allsubcate->name}}</a></span>
									<span class="comments"><a href="{{route('category',['category'=>$allsubcate->slug,'post'=>$allsubcate->getFirstPosts()->slug])}}">15 Comments</a></span>
								</div>
							</div>
							<div class="item_content">
								<h4><a href="{{route('category',['category'=>$allsubcate->slug,'post'=>$allsubcate->getFirstPosts()->slug])}}">{{$allsubcate->getFirstPosts()->title}}</a></h4>
								<p>{{$allsubcate->getFirstPosts()->summary}} [...]</p>
							</div>
						</div>
						@else
						<div class="list_posts">
							@foreach($allsubcate->getAllPosts() as $ShowAllPosts)
							<div class="post clearfix">
								<div class="item_thumb">
									<div class="thumb_icon">
										<a href="{{route('category',['category' => $allsubcate->slug,'post'=>$ShowAllPosts->slug])}}" style="background-color: #4183D7"><i class="fa fa-copy"></i></a>
									</div>
									<div class="thumb_hover">
										<a href="{{route('category',['category' => $allsubcate->slug, 'post'=>$ShowAllPosts->slug])}}"><img src="images/{{$ShowAllPosts->images}}" alt="Post" class="visible animated"></a>
									</div>
								</div>
								<div class="item_content">
									<h4><a href="{{route('category',['category'=>$allsubcate->slug,'post'=>$ShowAllPosts->slug])}}">{{$ShowAllPosts->title}}</a></h4>
									<div class="item_meta clearfix">
										<span class="meta_date">{{$ShowAllPosts->created_at}}</span>
										<span class="meta_likes"><a href="#">29</a></span>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						@endif
						@endforeach

					</div>
				</div>

				@else

				<div class="panel_title">
					<div>
						<h4><a href="{{$allcate->slug}}">{{$allcate->name}}</a></h4>
					</div>
				</div>
				<div class="row">
					@foreach ($allcate->subcategory as $subcategory)
					@if ($loop->first)
					<div class="col col_6_of_12">
						@foreach($subcategory->getAllPosts2() as $showallposts)
						@if($loop->first)
						<div class="layout_post_1">
							<div class="item_thumb">
								<div class="thumb_icon">

									<a href="{{route('category',['category'=>$subcategory->slug,'post'=>$showallposts->slug])}}"><i class="fa fa-copy"></i></a>
								</div>
								<div class="thumb_hover">
									<a href="{{route('category',['category'=>$subcategory->slug,'post'=>$showallposts->slug])}}"><img src="images/{{$showallposts->images}}" alt="Post"></a>
								</div>
								<div class="thumb_meta">
									<span class="category"><a href="{{route('category',$subcategory->slug)}}">{{$subcategory->name}}</a></span>
									<span class="comments"><a href="{{route('category',['category'=>$subcategory->slug,'post'=>$showallposts->slug])}}">15 Comments</a></span>
								</div>
							</div>
							<div class="item_content">
								<h4><a href="{{route('category',['category'=>$subcategory->slug,'post'=>$showallposts->slug])}}">{{$showallposts->title}}</a></h4>
								<p>{{$showallposts->summary}}[...]</p>
							</div>
						</div>

						@else
						<div class="list_posts">
 
							<div class="post clearfix">
								<div class="item_thumb">
									<div class="thumb_icon">
										<a href="{{route('category',['category'=>$subcategory->slug,'post'=>$showallposts->slug])}}"><i class="fa fa-copy"></i></a>
									</div>
									<div class="thumb_hover">
										<a href="{{route('category',['category'=>$subcategory->slug,'post'=>$showallposts->slug])}}"><img src="images/{{$showallposts->images}}" alt="Post"></a>
									</div>
								</div>
								<div class="item_content">
									<h4><a href="{{route('category',['category'=>$subcategory->slug,'post'=>$showallposts->slug])}}">{{$showallposts->summary}}</a></h4>
									<div class="item_meta clearfix">
										<span class="meta_date">{{$showallposts->created_at}}</span>
										<span class="meta_comments"><a href="{{route('category',['category'=>$subcategory->slug,'post'=>$showallposts->slug])}}">16</a></span>
										<span class="meta_likes"><a href="#">29</a></span>
									</div>
								</div>
							</div>

							
						</div>

						@endif
						@endforeach
						{{-- <a href="#" class="btn btn_small btn_grey btn_expand">Show all</a> --}}
					</div>
					@endif
					@if($loop->last)

					<div class="col col_6_of_12">
						@foreach($subcategory->getAllPosts2() as $showallposts)
						@if($loop->first)
						<div class="layout_post_1">
							<div class="item_thumb">
								<div class="thumb_icon">
									<a href="{{route('category',['category'=>$subcategory->slug,'post'=>$showallposts->slug])}}"><i class="fa fa-copy"></i></a>
								</div>
								<div class="thumb_hover">
									<a href="{{route('category',['category'=>$subcategory->slug,'post'=>$showallposts->slug])}}"><img src="images/{{$showallposts->images}}" alt="Post"></a>
								</div>
								<div class="thumb_meta">
									<span class="category"><a href="{{route('category',$subcategory->slug)}}">{{$subcategory->name}}</a></span>
									<span class="comments"><a href="{{route('category',['category'=>$subcategory->slug,'post'=>$showallposts->slug])}}">15 Comments</a></span>
								</div>
							</div>
							<div class="item_content">
								<h4><a href="{{route('category',['category'=>$subcategory->slug,'post'=>$showallposts->slug])}}">{{$showallposts->title}}</a></h4>
								<p>{{$showallposts->summary}}[...]</p>
							</div>
						</div>

						@else
						<div class="list_posts">

							<div class="post clearfix">
								<div class="item_thumb">
									<div class="thumb_icon">
										<a href="{{route('category',['category'=>$subcategory->slug,'post'=>$showallposts->slug])}}"><i class="fa fa-copy"></i></a>
									</div>
									<div class="thumb_hover">
										<a href="{{route('category',['category'=>$subcategory->slug,'post'=>$showallposts->slug])}}"><img src="images/{{$showallposts->images}}" alt="Post"></a>
									</div>
								</div>
								<div class="item_content">
									<h4><a href="{{route('category',['category'=>$subcategory->slug,'post'=>$showallposts->slug])}}">{{$showallposts->summary}}</a></h4>
									<div class="item_meta clearfix">
										<span class="meta_date">{{$showallposts->created_at}}</span>
										<span class="meta_comments"><a href="{{route('category',['category'=>$subcategory->slug,'post'=>$showallposts->slug])}}">16</a></span>
										<span class="meta_likes"><a href="#">29</a></span>
									</div>
								</div>
							</div>

							
						</div>

						@endif
						@endforeach

						<a href="{{route('category',$subcategory->slug)}}" class="btn btn_small btn_grey btn_expand">Show all</a>
					</div>
					@endif

					@endforeach
				</div>



				@endif
				@endforeach

			</div>




















































			@include('client.sidebar')



		</div>
	</div>
</section>

@endsection