@extends('frontend.master')
@section('title', 'Chi tiết sản phẩm')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">{!! $product['name'] !!}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{!! route('front.index') !!}">Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="{!! url('resources/views/upload/'.$product['image']) !!}" />
							<p>Hình chi tiết</p>
							@foreach($product_detail as $pro_detail)
							<img style="width: 120px; height: 120px" src="{!! url('resources/views/detail/'.$pro_detail['image']) !!}" />
							@endforeach
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title">{!! $product['name'] !!}</p>
								<p class="single-item-price">
									<span>{!! number_format($product['price'], 0, ',', '.') !!} VNĐ</span>
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{!! $product['content'] !!}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-options">
								<a class="add-to-cart" href="{!! route('front.addCart', [$product['id'], $product['alias']]) !!}"><i class="fa fa-shopping-cart"></i></a><strong>Thêm vào giỏ hàng</strong>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Miêu tả</a></li>
							<li><a href="#tab-reviews">Nhận xét (0)</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{!! $product['description'] !!}</p>
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm liên quan</h4>

						<div class="row">
							@foreach($product_related as $pro_related)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="{!! route('front.getProduct', [$pro_related['id'], $pro_related['alias']]) !!}"><img src="{!! url('resources/views/upload/'.$pro_related['image']) !!}" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{!! $pro_related['name'] !!}</p>
										<p class="single-item-price">
											<span>{!! number_format($pro_related['price'], 0, ',', '.') !!} VNĐ</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="product.blade.php"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product.blade.php">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Giảm giá sốc</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($product_related as $pro_detail)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{!! route('front.addCart', [$pro_detail['id'], $pro_detail['alias']]) !!}"><img src="{!! url('resources/views/upload/'.$pro_detail['image']) !!}" alt=""></a>
									<div class="media-body">
										{!! $pro_detail['name'] !!}
										<span class="beta-sales-price">{!! number_format($pro_detail['price'], 0, ',', '.') !!} VNĐ</span>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">Sản phẩm mới</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($product_new as $pro_new)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{!! route('front.getProduct', [$pro_new->id, $pro_new->alias]) !!}"><img src="{!! url('resources/views/upload/'.$pro_new->image) !!}" alt=""></a>
									<div class="media-body">
										{!! $pro_new->name !!}
										<span class="beta-sales-price">{!! number_format($pro_new->price, 0, ',', '.') !!} VNĐ</span>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
