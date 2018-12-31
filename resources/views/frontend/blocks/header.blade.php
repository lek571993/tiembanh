
<div class="header-top">
    <div class="container">
        <div class="pull-left auto-width-left">
            <ul class="top-menu menu-beta l-inline">
                <li><a href="{!! route('front.index') !!}"><i class="fa fa-home"></i> Số 64, Đường 2, Mai Đình, Sóc Sơn, Hà Nội</a></li>
                <li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
            </ul>
        </div>
        <div class="pull-right auto-width-right">
            <ul class="top-details menu-beta l-inline">
                @if(Auth::check())
                    <li><a href="#"><i class="fa fa-user"></i>Chào mừng <strong>{!! Auth::user()->username !!}</strong></a></li>
                    <li><a href="{!! route('front.getLogout') !!}">Đăng xuất</a></li>
                @else
                <li><a href="{!! route('front.getRegister') !!}">Đăng kí</a></li>
                <li><a href="{!! route('front.getLogin') !!}">Đăng nhập</a></li>
                @endif
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- .container -->
</div> <!-- .header-top -->
<div class="header-body">
    <div class="container beta-relative">
        <div class="pull-left">
            <a href="{!! route('front.index') !!}" id="logo"><img src="{!! url('public/frontend/assets/dest/images/logo-cake.png') !!}" width="200px" alt=""></a>
        </div>
        <div class="pull-right beta-components space-left ov">
            <div class="space10">&nbsp;</div>
            <div class="beta-comp">
                <form method="get" id="searchform" action="{!! route('front.getSearch') !!}">
                    @csrf
                    <input type="text" value="" name="search" id="s" placeholder="Nhập từ khóa..." />
                    <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                </form>
            </div>

            <div class="beta-comp">
                <div class="cart">
                    <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng
                        @if(Cart::count() > 0)
                            ({!! Cart::count() !!})
                        @else
                            (trống)
                        @endif
                        <i class="fa fa-chevron-down"></i></div>
                    <div class="beta-dropdown cart-body">
                        @foreach($content as $item)
                        <div class="cart-item">
                            <div class="media">
                                <a class="pull-left" href="#"><img src="{!! url('resources/views/upload/'.$item->options['image']) !!}" alt=""></a>
                                <div class="media-body">
                                    <span class="cart-item-title">{!! $item->name !!}</span>
                                    <span class="cart-item-amount">{!! $item->qty !!}*<span>{!! number_format($item->price, 0, ',', '.') !!} VNĐ</span></span>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="cart-caption">
                            <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{!! Cart::total(0, '.', '.') !!} VNĐ</span></div>
                            <div class="clearfix"></div>

                            <div class="center">
                                <div class="space10">&nbsp;</div>
                                <a href="{!! route('front.showCart') !!}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div> <!-- .cart -->
            </div>
        </div>
        <div class="clearfix"></div>
    </div> <!-- .container -->
</div> <!-- .header-body -->
<div class="header-bottom" style="background-color: #0277b8;">
    <div class="container">
        <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
        <div class="visible-xs clearfix"></div>
        <nav class="main-menu">
            <ul class="l-inline ov">
                <li><a href="{!! route('front.index') !!}">Trang chủ</a></li>
                <li><a href="#">Sản phẩm</a>
                    <ul class="sub-menu">
                        <?php $cate = DB::table('cates')->select('id', 'name')->get()->toArray(); ?>
                        @foreach($cate as $ct)
                        <li><a href="#">{!! $ct->name !!}</a>
                            <ul class="sub-menu">
                                <?php $product_name = DB::table('products')->select('id', 'name', 'alias')->where('cate_id', $ct->id)->get()->toArray(); ?>
                                @foreach($product_name as $pro_name)
                                <li><a href="{!! route('front.productType', [$pro_name->id, $pro_name->alias]) !!}">{!! $pro_name->name !!}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{!! route('front.about') !!}">Giới thiệu</a></li>
                <li><a href="{!! route('front.getContact') !!}">Liên hệ</a></li>
            </ul>
            <div class="clearfix"></div>
        </nav>
    </div> <!-- .container -->
</div> <!-- .header-bottom -->
