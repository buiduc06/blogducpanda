
			<div class="col col_3_of_12">

				<div class="widget">
					<div class="widget_title"><h3>Search widget</h3></div>
					<div class="tb_widget_search">
						<form>
							<input type="text">
							<input type="submit" value="Search">
						</form>
					</div>
				</div>

				<div class="widget">
					<div class="widget_title"><h3>Socialize</h3></div>
					<div class="tb_widget_socialize clearfix">
						<a href="https://www.facebook.com/ducdeveloper" target="_blank" class="icon facebook">
							<div class="symbol"><i class="fa fa-facebook"></i></div>
							<div class="text"><p>46,841</p><p>Facebook</p></div>
						</a>
						<a href="https://plus.google.com/ducdeveloper" target="_blank" class="icon google">
							<div class="symbol"><i class="fa fa-google-plus"></i></div>
							<div class="text"><p>17,045</p><p>Google+</p></div>
						</a>
						<a href="https://www.twitter.com/ducdeveloper" target="_blank" class="icon twitter">
							<div class="symbol"><i class="fa fa-twitter"></i></div>
							<div class="text"><p>3,075</p><p>Twitter</p></div>
						</a>
						<a href="https://www.linkedin.com/ducdeveloper" target="_blank" class="icon linkedin">
							<div class="symbol"><i class="fa fa-linkedin"></i></div>
							<div class="text"><p>15,441</p><p>LinkedIn</p></div>
						</a>
					</div>
				</div>

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
								<h4><a href="{{route('category',['category'=>$TopViewPost1->shownamesubcate()->slug,'post'=>$TopViewPost1->slug])}}">{{$TopViewPost1->title}}</a></h4>
								<p style="color: red">{{number_format($TopViewPost1->views)}} views</p>
							</div>
							<div class="order">{{$i++}}</div>
						</div>


						@endforeach
					</div>
				</div>

				<div class="widget">
					<div class="widget_title"><h3>Timeline</h3></div>
					<div class="tb_widget_timeline clearfix">
						@foreach($TimelinePost as $TimelinePost1)
						<article>
							<span class="date">{{$TimelinePost1->created_at}}</span>
							<span class="time">11:19 AM</span>
							<div class="timeline_content">
								<i class="fa fa-clock-o" style="color: #E87E04"></i>
			<h3><a href="{{route('category',['category' => $TimelinePost1->shownamesubcate()->slug,'post' => $TimelinePost1->slug ])}}">{{ $TimelinePost1->title }}</a></h3>
							</div>
						</article>
						@endforeach



					</div>
				</div>

				<div class="widget">
					<div class="widget_title"><h3>Banner</h3></div>
					<div class="tb_widget_banner_125 clearfix">
						<a href="#" target="_blank">
							<img src="demo/125x125.png" alt="Banner">
						</a>
						<a href="#" target="_blank">
							<img src="demo/125x125.png" alt="Banner">
						</a>
						<a href="#" target="_blank">
							<img src="demo/125x125.png" alt="Banner">
						</a>
						<a href="#" target="_blank">
							<img src="demo/125x125.png" alt="Banner">
						</a>
					</div>
				</div>

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
									<span class="meta_likes"><a href="#">29</a></span>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>

				<div class="widget">
					<div class="widget_title"><h3>Latest posts</h3></div>
					<div class="tb_widget_posts_big clearfix">
						@foreach($LatestPost as $LatestPost1)

						<div class="item clearfix">
							<div class="item_content">
								<h4><a href="{{route('category',['category'=>$LatestPost1->shownamesubcate()->slug,'post'=>$LatestPost1->slug])}}"><span class="format" style="background-color: #D2527F">news</span>{{$LatestPost1->title}}</a></h4>
								<p>{{$LatestPost1->summary}} [...]</p>
								<div class="item_meta clearfix">
									<span class="meta_date">{{$LatestPost1->created_at}}</span>
									<span class="meta_comments"><a href="{{route('category',['category'=>$LatestPost1->shownamesubcate()->slug,'post'=>$LatestPost1->slug])}}">16</a></span>
									<span class="meta_likes"><a href="#">0</a></span>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>

				<div class="widget">
					<div class="widget_title"><h3>Tags</h3></div>
					<div class="tb_widget_tagcloud clearfix">
						@foreach($getTag as $getTag1)
						<a href="tag/{{$getTag1->slug}}">{{$getTag1->name}}</a>
						@endforeach
					</div>
				</div>
				
{{-- fb --}}
				<div class="widget">
					<div class="widget_title"><h3>Fanpage</h3></div>
					<div class="tb_widget_tagcloud clearfix">
					<div class="fb-page" data-href="https://www.facebook.com/vietnammmo.net" data-tabs="timeline" data-width="260px" data-height="320px" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/vietnammmo.net" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/vietnammmo.net">Vietnammmo.net</a></blockquote></div>
					</div>
				</div>

			</div> 