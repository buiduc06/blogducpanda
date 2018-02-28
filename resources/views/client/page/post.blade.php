@extends('layouts.master')
@section('content')
<section>
	<div class="container">
		<div class="row">

			<div class="col col_9_of_12">

				<article class="post">

					<div class="entry_media">
						<span class="meta_likes"><a href="#" data-tip="12 likes"><i class="fa fa-heart"></i></a></span>
						<a href="images/{{$getPost->images}}" class="popup_link"><img src="images/{{$getPost->images}}" alt="Image"></a>
					</div>

					<div class="full_meta clearfix">
						<span class="meta_format"><i class="fa fa-file-text"></i></span>
						<span class="meta_date">{{$getPost->created_at}}</span>
						<span class="meta_comments"><a href="#">28 Comments</a></span>
						<span class="meta_rating" title="Rated 2.00 out of 5">
							<span style="width: 40%">
								<strong>2.00</strong>
							</span>
						</span>
					</div>

					<div class="entry_content">

						<h1 class="entry_title">{{$getPost->title}}</h1>
						<p class="dropcap">{{$getPost->summary}}</p>
						
						<p>{{$getPost->content}}</p>
						<div  class="fb-like" data-href="{{route('category',['category' => $getPost->shownamesubcate()->slug,'post'=>$getPost->slug])}}" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
						
					</div>

					<div class="bottom_wrapper">

						<div class="entry_tags">
							<span><i class="fa fa-tags"></i> Tags</span>
							@foreach($getPost->tag as $showtag)
							<a href="#">{{$showtag->name}}</a>
							@endforeach
						</div>

						<div class="entry_tags categories">
							<span><i class="fa fa-folder-open"></i>Category</span>
							<a href="{{route('category',$getPost->shownamesubcate()->slug)}}">{{$getPost->shownamesubcate()->name}}</a>
						</div>

					</div>

					{{-- <div class="editor_review">
						<div class="panel_title">
							<div>
								<h4><a href="blog.html">Editor review</a></h4>
							</div>
						</div>
						<div class="inner clearfix">

							<div class="review">
								<div class="review_header">
									<div class="title">Design</div>
									<div class="result">8/10</div>
								</div>
								<div class="review_footer">
									<span style="width: 80%"></span>
								</div>
							</div>

							<div class="review">
								<div class="review_header">
									<div class="title">Support</div>
									<div class="result">2/10</div>
								</div>
								<div class="review_footer">
									<span style="width: 20%"></span>
								</div>
							</div>

							<div class="review">
								<div class="review_header">
									<div class="title">Development</div>
									<div class="result">4.5/10</div>
								</div>
								<div class="review_footer">
									<span style="width: 45%"></span>
								</div>
							</div>

							<div class="review_summary">
								<div class="final_result">
									<p>7.5</p>
									<strong>Awesome</strong>
									<div class="item_meta clearfix">
										<span class="meta_rating" title="Rated 3.50 out of 5">
											<span style="width: 70%"><strong>3.50</strong></span>
										</span>
									</div>
								</div>
								<div class="final_summary">
									<h5>Summary</h5>
									<p>Sed tincidunt purus sed ex dapibus congue. Nam gravida consequat odio eget bibendum. Morbi laoreet dui a sapien laoreet semper. Donec in quam ut velit tincidunt mollis. Aenean tincidunt leo justo, ut porta justo accumsan ac. Morbi in felis in ante laoreet rhoncus vitae commodo tellus. Proin ut congue odio. Nunc in dui et urna euismod ultricies non lobortis lorem. Vestibulum pellentesque ex quis orci faucibus, et ullamcorper nunc bibendum.</p>
								</div>
							</div>
						</div>
					</div> --}}
				</article>

				<div class="panel_title">
					<div>
						<h4><a href="blog.html">You might also like</a></h4>
					</div>
				</div>
				<div class="row">

					@foreach($getPost->getPostRelated() as $showPostRelated)
					<div class="col col_4_of_12">
						<div class="layout_post_1">
							<div class="item_thumb">
								<div class="thumb_icon">
									<a href="{{route('category',['category'=>$showPostRelated->shownamesubcate()->slug,'post'=>$showPostRelated->slug])}}" style="background-color: #F89406"><i class="fa fa-copy"></i></a>
								</div>
								<div class="thumb_hover">
									<a href="{{route('category',['category'=>$showPostRelated->shownamesubcate()->slug,'post'=>$showPostRelated->slug])}}"><img width="500px" height="500px" src="images/{{$showPostRelated->images}}" alt="Post" class="visible animated"></a>
								</div>
								<div class="thumb_meta">
									<span class="category" style="background-color: #F89406"><a href="{{route('category',$showPostRelated->shownamesubcate()->slug)}}">{{$showPostRelated->shownamesubcate()->name}}</a></span>
									<span class="comments"><a href="{{route('category',['category'=>$showPostRelated->shownamesubcate()->slug,'post'=>$showPostRelated->slug])}}">15 Comments</a></span>
								</div>
							</div>
							<div class="item_content">
								<h4><a href="{{route('category',['category'=>$showPostRelated->shownamesubcate()->slug,'post'=>$showPostRelated->slug])}}">{{$showPostRelated->title}}</a></h4>
								<div class="item_meta clearfix">
									<span class="meta_date">October 3, 2014</span>
									<span class="meta_likes"><a href="#">29</a></span>
								</div>
								<p>{{$showPostRelated->summary}} [...]</p>
							</div>
						</div>
					</div>

					@endforeach
				</div>

				<div id="comments">
					{{-- <div class="panel_title">
						<div>
							<h4><a href="blog.html">27 Comments</a></h4>
						</div>
					</div>
					<ol class="comment_list">
						<li>
							<article>
								<div class="comment_avatar"><img src="demo/70x70/7.jpg" alt="Avatar"></div>
								<div class="comment_overflow">
									<div class="comment_meta">
										<h5><a href="#">Charles Haid</a></h5>
										<span>September 8, 2014</span><span><a href="#">Reply</a></span>
									</div>
									<div class="comment_content">Quisque laoreet augue sapien, quis vehicula nulla mollis uisque laoreet augue sapien, quis vehicula nulla mollis fin finibus magna. Sed tincidunt purus sed ex dapibus congue. Nam gravida consequat odio eget bibendum. Morbi laoreet dui a sapien laoreet semper. Donec in quam ut velit tincidunt mollis. Aenean tincidunt leo justo, ut justo accumsan ac.</div>
								</div>
							</article>
							<ul class="children">
								<li>
									<article>
										<div class="comment_avatar"><img src="demo/70x70/5.jpg" alt="Avatar"></div>
										<div class="comment_overflow">
											<div class="comment_meta">
												<h5><a href="#">Felix Alcala</a></h5>
												<span>September 8, 2014</span><span><a href="#">Reply</a></span>
											</div>
											<div class="comment_content">Quisque laoreet augue sapien, quis vehicula nulla mollis uisque laoreet augue sapien, quis vehicula nulla mollis fin finibus magna. Sed tincidunt purus sed ex dapibus congue. Nam gravida consequat odio eget bibendum. Morbi laoreet dui a sapien laoreet semper. Donec in quam ut velit tincidunt mollis. Aenean tincidunt leo justo, ut justo accumsan ac.</div>
										</div>
									</article>
								</li>
								<li>
									<article>
										<div class="comment_avatar"><img src="demo/70x70/4.jpg" alt="Avatar"></div>
										<div class="comment_overflow">
											<div class="comment_meta">
												<h5><a href="#">Michelle McLaren</a></h5>
												<span>September 8, 2014</span><span><a href="#">Reply</a></span>
											</div>
											<div class="comment_content">Quisque laoreet augue sapien, quis vehicula nulla mollis uisque laoreet augue sapien, quis vehicula nulla mollis fin finibus magna. Sed tincidunt purus sed ex dapibus congue. Nam gravida consequat odio eget bibendum. Morbi laoreet dui a sapien laoreet semper. Donec in quam ut velit tincidunt mollis. Aenean tincidunt leo justo, ut justo accumsan ac.</div>
										</div>
									</article>
								</li>
								<li>
									<article>
										<div class="comment_avatar"><img src="demo/70x70/3.jpg" alt="Avatar"></div>
										<div class="comment_overflow">
											<div class="comment_meta">
												<h5><a href="#">Charles Haid</a></h5>
												<span>September 8, 2014</span><span><a href="#">Reply</a></span>
											</div>
											<div class="comment_content">Quisque laoreet augue sapien, quis vehicula nulla mollis uisque laoreet augue sapien, quis vehicula nulla mollis fin finibus magna. Sed tincidunt purus sed ex dapibus congue. Nam gravida consequat odio eget bibendum. Morbi laoreet dui a sapien laoreet semper. Donec in quam ut velit tincidunt mollis. Aenean tincidunt leo justo, ut justo accumsan ac.</div>
										</div>
									</article>
								</li>
							</ul>
						</li>
						<li>
							<article>
								<div class="comment_avatar"><img src="demo/70x70/2.jpg" alt="Avatar"></div>
								<div class="comment_overflow">
									<div class="comment_meta">
										<h5><a href="#">Terry McDonough</a></h5>
										<span>September 8, 2014</span><span><a href="#">Reply</a></span>
									</div>
									<div class="comment_content">Quisque laoreet augue sapien, quis vehicula nulla mollis uisque laoreet augue sapien, quis vehicula nulla mollis fin finibus magna. Sed tincidunt purus sed ex dapibus congue. Nam gravida consequat odio eget bibendum. Morbi laoreet dui a sapien laoreet semper. Donec in quam ut velit tincidunt mollis. Aenean tincidunt leo justo, ut justo accumsan ac.</div>
								</div>
							</article>
						</li>
						<li>
							<article>
								<div class="comment_avatar"><img src="demo/70x70/1.jpg" alt="Avatar"></div>
								<div class="comment_overflow">
									<div class="comment_meta">
										<h5><a href="#">Charles Haid</a></h5>
										<span>September 8, 2014</span><span><a href="#">Reply</a></span>
									</div>
									<div class="comment_content">Quisque laoreet augue sapien, quis vehicula nulla mollis uisque laoreet augue sapien, quis vehicula nulla mollis fin finibus magna. Sed tincidunt purus sed ex dapibus congue. Nam gravida consequat odio eget bibendum. Morbi laoreet dui a sapien laoreet semper. Donec in quam ut velit tincidunt mollis. Aenean tincidunt leo justo, ut justo accumsan ac.</div>
								</div>
							</article>
						</li>
					</ol> --}}

					<div class="fb-comments" data-href="{{route('category',['category' => $getPost->shownamesubcate()->slug,'post'=>$getPost->slug])}}" data-width="850px" data-numposts="5"></div>
				</div>
{{-- form bassic --}}
				{{-- <div id="respond">
					<h3>Leave a Reply</h3>
					<form>
						<p>
							<label>Name<span>*</span></label>
							<input type="text">
						</p>
						<p>
							<label>Email<span>*</span></label>
							<input type="text">
						</p>
						<p>
							<label>Comment<span>*</span></label>
							<textarea></textarea>
						</p>
						<input name="submit" type="submit" id="submit" value="Post a comment" class="btn">
					</form>
				</div>
 --}}

 
			</div>

			@include('client.sidebar')
		</div>
	</div>
</section>

@endsection