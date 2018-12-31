@extends('frontend.master')
@section('title', 'Loại sản phẩm')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm</h6>
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
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							<li><a style="font-size: 16px"><strong>Danh mục các sản phẩm</strong></a></li>
							@foreach($cates as $cate)
							<li class="aside_item">
								<a>{!! $cate['name'] !!}</a>
								<ul class="aside_sub_menu">
									<?php $product_cates = DB::table('products')->select('id', 'name', 'alias')->where('cate_id', $cate['id'])->get()->toArray(); ?>
									@foreach($product_cates as $pro_cate)
									<li><span class="glyphicon glyphicon-chevron-right"></span> <a href="{!! route('front.productType', [$pro_cate->id, $pro_cate->alias]) !!}">{!! $pro_cate->name !!}</a></li>
									@endforeach
								</ul>
							</li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Danh mục sản phẩm</h4>
							<div class="beta-products-details">
								<p class="pull-left"><?php $count = count($product_detail)?>
									Tìm thấy {!! $count !!} sản phẩm
								</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($product_detail as $key => $pro_detail)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="product.blade.php"><img src="{!! url('resources/views/detail/'.$pro_detail['image']) !!}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{!! $product['name'] !!}</p>
											<p class="single-item-price">
												<span>{!! number_format($product['price'], 0, ',', '.') !!} VNĐ</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{!! route('front.addCart', [$product->id, $product->alias]) !!}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{!! route('front.getProduct', [$product->id, $product->alias]) !!}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@if($key == 2)
									<div class="space50">&nbsp;</div>
								@endif
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->


					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
