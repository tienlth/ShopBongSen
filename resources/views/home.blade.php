@extends('layouts.user')
@section('title', 'Trang chủ')

<?php
    $_SESSION['header']='transparent';
?>

@section('content')
<div class="home-page">
    <div id="home-slide" class="carousel slide top-bg d-flex align-items-center" data-bs-ride="carousel"
        style="background-image: url('/imgs/share/top-bg1.png')">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="mb-4" src="/imgs/share/logo.png" width="100" height="60" alt="">
                <h2 style="color: #FF5CB4">Shop hoa tươi Bông Sen</h2>
                <h4 style="color: #fa79be">Trao hoa trao yêu thương</h4>
                <br>
                <div>116A, 3/2, Phường Xuân Khánh, Quận Ninh Kiều, TP. Cần Thơ</div>
            </div>
            <div class="carousel-item">
                <h5><span class="badge bg-secondary">Chào mừng ngày 20/10</span></h5>
                <h3 style="color: #CC5DFE">Giảm giá 20% các loại hoa</h3>
                <br>
                <h4 style="color: #FF5CB4">Hãy cùng shop Bông Sen gửi đến người phụ nữ Việt Nam món quà ý
                    nghĩa
                    nhất</h4>

                <a href="#">
                    <button style="background-color: #FF5CB4" type="button" class="btn text-white mt-4">
                        <b>Mua ngay</b>
                    </button>
                </a>
            </div>
            <div class="carousel-item">
                <h3 style="color: #CC5DFE">Hoa sinh nhật</h3>
                <br>
                <h4 style="color: #FF5CB4">Giảm giá 20% khi mua hoa vào ngày sinh nhật người thân, bạn bè</h4>

                <a href="">
                    <button style="background-color: #7375AF" type="button" class="btn text-white mt-4">
                        <b>Mua ngay</b>
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div class="info">
        <div class="row mb-3">

            <div class="col">
                <div><img src="/imgs/home/info1.png" width="95" height="75" alt="info-img"></div>
                <h5>Giao hoa trên toàn quốc</h5>
                <p>Shop hoa tươi Bông Sen đã có chi nhánh tại 63 tỉnh thành trên cả nước. Thời gian giao hàng
                    nhanh đúng hẹn với cam kết sản phẩm đến tay khách hàng nhanh nhất có thể.</p>
            </div>

            <div class="col">
                <div><img src="/imgs/home/info2.png" width="95" height="75" alt="info-img"></div>
                <h5>Đa dạng các loại hoa </h5>
                <p>Shop Bông Sen có bán hầu hết các loại hoa phổ biến trên thị trường hiện nay. Shop có thể
                    đáp ứng nhu cầu sử dụng hoa tươi của khách hàng vào tất cả các dịp, sự kiện.</p>
            </div>

        </div>
        <div class="row mb-3">

            <div class="col">
                <div><img src="/imgs/home/info3.png" width="95" height="75" alt="info-img"></div>
                <h5>Đặt hoa theo yêu cầu</h5>
                <p>Ngoài các sản phẩm hoa đã có, khách hàng có thể đặt hoa theo sở thích của bản thân.
                    Quý khách có thể tự chọn loại hoa, kiểu dáng, cách cắm hoa,... Shop Bông Sen luôn mong
                    muốn đem lại sự hài lòng tuyệt đối cho quý khách.</p>
            </div>

            <div class="col">
                <div><img src="/imgs/home/info4.png" width="95" height="75" alt="info-img"></div>
                <h5>Chăm sóc khách hàng</h5>
                <p>Với đội ngũ nhân viên giàu kinh nghiệm trong lĩnh vực hoa tươi, shop Bông Sen luôn sẵn sàng
                    tư vấn cho khách hàng sản phẩm phù hợp nhất. Mọi đánh giá, góp ý của quý khách đều
                    được tôn trọng và đó là động lực để phát triển của chúng tôi.</p>
            </div>

        </div>
    </div>

    <div class="products">
        <div class="heading py-4" style="background-color: #fdf8f8">
            <h5 class="text-center m-0" style="color: #fe73c7">Sản phẩm nổi bật</h5>
        </div>

        <div class="product-list">
            <div style="color: #FA7EC8" class="product-type ms-4 mt-4">
                <h5>Hoa sinh nhật</h5>
            </div>
            <div class="wrapper">
                @if(count($productsBirthday)>0)
                <div class="list">
                    @foreach($productsBirthday as $e)
                    @include("components.product-item", [
                        'productLink'=>route('products.show', ['product'=>$e->id]),
                        'productImage'=>$e->main_image,
                        'stars'=>$e->quality,
                        'name'=>$e->name,
                        'oldPrice'=>$e->price,
                        'price'=>($e->price - $e->price*$e->sale/100),
                    ])
                    @endforeach
                </div>
                <div class="d-flex justify-content-center"><a href="#"><button class="text-white seemore">Xem thêm</button></a></div>
                @else
                <h3 class="text-secondary text-center">Không có sản phẩm</h3>
                @endif
            </div>
        </div>

        <div class="product-list">
            <div style="color: #FA7EC8" class="product-type ms-4 mt-4">
                <h5>Hoa tình yêu</h5>
            </div>
            <div class="wrapper">
                @if(count($productsLove)>0)
                <div class="list">
                    @foreach($productsLove as $e)
                    @include("components.product-item", [
                        'productLink'=>route('products.show', ['product'=>$e->id]),
                        'productImage'=>$e->main_image,
                        'stars'=>3,
                        'name'=>$e->name,
                        'oldPrice'=>$e->price,
                        'price'=>($e->price - $e->price*$e->sale/100),
                    ])
                    @endforeach
                </div>
                <div class="d-flex justify-content-center"><a href="#"><button class="text-white seemore">Xem thêm</button></a></div>
                @else
                <h3 class="text-secondary text-center">Không có sản phẩm</h3>
                @endif
            </div>
        </div>

    </div>
    <div class="services container-fluid py-4">
        <h5 class="text-center">Dịch vụ của chúng tôi</h5>
        <div class="row container-fluid m-0">
            <div class="col p-0">
                <div class="row">
                    <span><img src="/imgs/home/service1.png" height="60" width="60" alt="services"></span>
                    <span>Có đủ các loại hoa trên thị trường</span>
                </div>
                <div class="row">
                    <span><img src="/imgs/home/service2.png" height="60" width="60" alt="services"></span>
                    <span>Giao hàng toàn quốc</span>
                </div>
                <div class="row">
                    <span><img src="/imgs/home/service3.png" height="60" width="60" alt="services"></span>
                    <span>Giao hàng hỏa tốc trong  60 phút</span>
                </div>
            </div>
            <div class="col p-0">
                <div class="row">
                    <span><img src="/imgs/home/service5.png" height="60" width="60" alt="services"></span>
                    <span>Phục vụ 24/24</span>
                </div>
                <div class="row">
                    <span><img src="/imgs/home/service4.png" height="60" width="60" alt="services"></span>
                    <span>Chăm sóc khách hàng chu đáo</span>
                </div>
                <div class="row">
                    <span><img src="/imgs/home/service6.png" height="60" width="60" alt="services"></span>
                    <span>Sản phẩm chất lượng cao</span>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection




