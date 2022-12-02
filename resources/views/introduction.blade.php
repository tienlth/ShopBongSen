@extends('layouts.user')
@section('title', 'Giới thiệu')

@section('content')
<div class="introduction-page">
    @include('components.breadcrumb',[
        'pages'=>[
            ['name'=>'Trang chủ',
                'link'=>route('index')]
        ],
        'currentPage'=>'Giới thiệu'
    ])

    <div class="banner row my-4 px-0 mx-0 container-fluid">
        <div class="col ps-0">
            <img src="/imgs/introduction/banner1.png"alt="banner">
        </div>
        <div class="col pe-0">
            <img src="/imgs/introduction/banner2.png"alt="banner">
        </div>
    </div>

    <div class="intro mb-4">
        <h4>Về chúng tôi</h4>
        <p class="mb-3 content">
            Cửa hàng hoa tươi Bông Sen được thành lập vào 9/2022 với cơ sở đầu tiên tại quận Ninh Kiều, TP. Cần Thơ. Đến nay, thương hiệu hoa tươi Bông Sen đã có sự phát triển ổn định trên thị trường và đang tiếp tục được đẩy mạnh phát triển, mở rộng quy mô.
        </p>
    </div>

    <div class="intro mb-4">
        <h4>Dịch vụ</h4>
        <p class="mb-3 content">
            Hoa tươi Bông Sen cung cấp hầu hết các loại hoa phổ biến trên thị trường hiện nay, đặt biệt, shop có thế mạnh ở lĩnh vực hoa cho các sự kiện, các dịp lễ, Tết. Đến với Bông Sen, quý khách hàng có thể chọn lựa cho mình những sản phẩm hoa tươi được thiết kế sẳn theo từng chủ đề, người được tặng. Shop cam kết sẽ đem đến cho quý khách sản phẩm có chất lượng cao, phù hợp với mục đích sử dụng và có ý nghĩa không thua kém những hình thức quà tặng khác. Bên cạnh đó, hoa tươi Bông Sen cũng có nhiều sự lựa chọn cho khách hàng có nhu cầu mua hoa trang trí không gian nhà ở, cửa hàng, nơi làm việc.
        </p>
    </div>

    <div class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($product1s as $i=>$e)
            <div class="carousel-item @if($i==0){{'active'}}@endif">
                @include('components.product-introduction', [
                    'reverse' => false,
                    'img' => $e->main_image,
                    'name' => $e->name,
                    'stars' => $e->quality,
                    'sold' => $e->sold,
                    'price' => $e->price,
                    'oldPrice' => $e->price,
                    'meaning' => $e->meaning,
                ])
            </div>
            @endforeach
        </div>
    </div>


    <div class="intro mb-4">
        <p class="mb-3 content">
            Ngoài ra, hoa tươi Bông Sen còn cung cấp dịch vụ thiết kế hoa theo yêu cầu. Quý khách hàng có thể đặt hoa theo thiết kế của mình hoặc nhờ nhân viên của shop tư vấn thành phần hoa và thiết kế cho phù hợp với nhu cầu của mình. Quý khách có thể chọn loại hoa, kiểu dáng, ý nghĩa, dịp tặng, người được tặng, ... Với đội ngũ nhân viên giàu kinh nghiệm trong lĩnh vực hoa tươi, Bông Sen cam kết sẽ đem đến cho quý khách sản phẩm vừa ý nhất có thể.
        </p>
    </div>

    <div class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($product2s as $i=>$e)
            <div class="carousel-item @if($i==0){{'active'}}@endif">
                @include('components.product-introduction', [
                    'reverse' => true,
                    'img' => $e->main_image,
                    'name' => $e->name,
                    'stars' => 4,
                    'sold' => $e->sold,
                    'price' =>($e->price - $e->price*$e->sale/100),
                    'oldPrice' => $e->price,
                    'meaning' => $e->meaning,
                ])
            </div>
            @endforeach
        </div>
    </div>

    <div class="intro mb-4">
        <p class="mb-3 content">
            Với sự phát triển của mình, hiện nay, hoa tươi Bông Sen đã có cơ sở trên khắp 63 tình thành toàn quốc, chúng tôi cam kết sẽ đem lại sự thuận tiện nhất cho quý khách hàng trong việc đặt hàng. Bông Sen sẽ đảm bảo quý khách sẽ nhận được sản phẩm nhanh, đúng hẹn, chất lượng giống với mô tả. Đặt biệt, với mật độ cửa hàng phân bố trên phạm vi cả nước, shop còn cung cấp dịch vụ giao hàng hỏa tốc trong vòng 60 phút cho quý khách hàng có nhu cầu sử dụng hoa làm quà tặng.
        </p>
    </div>

    <div class="intro mb-4">
        <h4>Chất lượng sản phẩm</h4>
        <p class="mb-3 content">
            Đội ngũ nhân viên của hoa tươi Bông Sen đã được đào tạo bài bản trước khi đi vào công việc cắm hoa, thiết kế, trang trí sản phẩm. Với thái độ làm việc nghiêm túc, có tinh thần trách nhiệm, Bông Sen cam kết luôn mang đến cho quý khách hàng những sản phẩm tốt đẹp nhất đồng thời chúng tôi cũng luôn tôn trọng và mong muốn nhận được những góp ý, đánh giá của quý khách hàng để ngày càng nâng cao chất lượng phục vụ.
        </p>
        <p class="mb-3 content">
            Bên cạnh đó, chất lượng sản phẩm của Bông Sen cũng đến từ nguồn gốc của các nguyên liệu thành phần tạo nên các sản phẩm. Tất cả các nguyên liệu của chúng tôi đều đến từ vùng cao nguyên Đà Lạt, nơi có khí hậu ôn hòa thích hợp để các loại hoa phát triển. Chúng tôi luôn tự hào có những đối tác tin cậy và trách nhiệm nhất trong việc đảm bảo nguồn cung cấp hoa tươi như:  DaLat Hasfarm, DalatFlower và Winsyfarm.
        </p>
    </div>

    <div class="statistical my-4">
        <h4 class="text-center mb-4">Sản phẩm đã bán ra</h4>
        <div id="statistical-slide" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($producttypeSold as $i=>$prodtSolds)
                <div class="carousel-item @if($i==1) active @endif">
                    <div class="numbers row">
                        @foreach($prodtSolds as $prodtSold)
                        <div class="item col">
                            <div class="data d-flex justify-content-center align-items-center"
                                style="background-image: url(/imgs/introduction/statistical-bg.png)">
                                {{$prodtSold['sold']}}
                            </div>
                            <h4 class="type">{{$prodtSold['name']}}</h4>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>

            <div>
                <button class="carousel-control-prev" type="button" data-bs-target="#statistical-slide" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa-solid fa-angle-left"></i></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#statistical-slide" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa-solid fa-angle-right"></i></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection




