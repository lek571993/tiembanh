@extends('frontend.master')
@section('title', 'Trang chủ')
@section('slide')
	<div class="rev-slider">
		<div class="fullwidthbanner-container">
			<div class="fullwidthbanner">
				<div class="bannercontainer" >
					<div class="banner" >
						<ul>
							<!-- THE FIRST SLIDE -->
							@foreach($slide as $sl)
								<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
									<div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
										<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="{!! url('resources/views/slide/'.$sl->image) !!}" data-src="{!! url('resources/views/slide/'.$sl->image) !!}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('{!! asset('resources/views/slide/'.$sl->image) !!}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
										</div>
									</div>
								</li>
							@endforeach
						</ul>
					</div>
				</div>

				<div class="tp-bannertimer"></div>
			</div>
		</div>
	</div>
@endsection
@section('content')
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">
									<?php use App\Product_image;$count = count($product_new); ?>
									Tìm thấy {!! $count !!} sản phẩm
								</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($product_new as $key => $value)
								<div class="col-sm-3">
									<div class="single-item">
										@if($key == 2)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="#"><img src="{!! url('resources/views/upload/'.$value->image) !!}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{!! $value->name !!}</p>
											<p class="single-item-price">
												@if($key == 2)
												<span class="flash-del">{!! number_format($value->price,0 , ',', '.') !!} VNĐ</span>
												<span class="flash-sale">{!! number_format($value->price/2,0 , ',', '.') !!} VNĐ</span>
												@else
													<span>{!! number_format($value->price,0 , ',', '.') !!} VNĐ</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{!! route('front.addCart', [$value->id, $value->alias]) !!}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{!! route('front.getProduct', [$value->id, $value->alias]) !!}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>

						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm bán chạy</h4>
							<div class="beta-products-details">
								<p class="pull-left"><?php $sl = count($product_top); ?>
									Tìm thấy {!! $sl !!} sản phẩm
								</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach ($product_top as $key => $pro_top)
								<div class="col-sm-3">
									<div class="single-item">
										@if($key == 2 || $key == 5)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="product.blade.php"><img src="{!! url('resources/views/upload/'.$pro_top->image) !!}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{!! $pro_top->name !!}</p>
											<p class="single-item-price">
												@if($key == 2 || $key == 5)
												<span class="flash-del">{!! number_format($pro_top->price,0 , ',', '.') !!} VNĐ</span>
												<span class="flash-sale">{!! number_format($pro_top->price/2,0 , ',', '.') !!} VNĐ</span>
												@else
												<span>{!! number_format($pro_top->price,0 , ',', '.') !!} VNĐ</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{!! route('front.addCart', [$pro_top->id, $pro_top->alias]) !!}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{!! route('front.productType', [$pro_top->id, $pro_top->alias]) !!}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@if($key == 3)
									<div class="space40">&nbsp;</div>
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

