@extends('layouts.master')
@section('title')
<title>Home Page</title>
@endsection()

@section('css')
<link rel='stylesheet' href="{{asset('home/home.css')}}">	
@endsection()

@section('js')
<link rel='stylesheet' href="{{asset('home/home.js')}}">

@endsection()

@section('content')
	<!--slider-->
	@include('home.components.slider')
	<!--/slider-->
	<section>
		<div class="container">
			<div class="row">
				@include('components.sliderbar')
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						@foreach($products as $product)
						<a href="{{URL::to('/detail/'.$product->id)}}">
							
						<div class="col-sm-4">
							<div class="product-image-wrapper">
						
								<div class="single-products">
							<form action="{{URL::to('/save_cart')}}" method="post">
							{{csrf_field()}}
										<div class="productinfo text-center" style="width: 300px;height: 450px;">
											<img src="{{$product->feature_image_path}}" alt="" style="width:200px;height: 250px;" />
											<h2>{{number_format($product->price)}} VND</h2>
											<p>{{$product->name}}</p>
											<input name="product_id_hidden" type="hidden" value="{{$product->id}}" />
											<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
										</div>	
										</form>	
										<form action="{{URL::to('/save_cart')}}" method="post">	
										{{csrf_field()}}																					
										<div class="product-overlay">
										<a href="{{URL::to('/detail/'.$product->id)}}">	
											<div class="overlay-content">
												<h2>{{number_format($product->price)}} VND</h2>
												<p>{{$product->name}}</p>
									<input name="qty" type="hidden" value="1" />

												<input name="product_id_hidden" type="hidden" value="{{$product->id}}" />
												<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
											</div>
											</a>
										</div>
										</form>	
								</div>
								</form>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						</a>
						@endforeach						
					</div><!--features_items-->
					<!--category-tab-->
					@include('home.components.category_tab')
					<!--/category-tab-->
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="/eshopper/images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="/eshopper/images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="/eshopper/images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
								</div>
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="/eshopper/images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="/eshopper/images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="/eshopper/images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	<script>
		function addtocart(){
			alert(123);
		};
		$(function (){
			$('.add-to-cart').on('click',addtocart)
		});
	</script>
	<!-- Latest compiled and minified CSS -->

@endsection()
    
