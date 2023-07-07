<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

    <div class="main-wrapper" style="width: 800px;text-align:center;margin:50px 20% 0px 20%;line-height:25px;">
        <div>
            <h3>Mã giảm giá được gửi từ Shop giày thể thao MINOSS</h3>
        </div>
        <div>
            <span>Xin chào. Bạn là khách hàng vip của shop chúng tôi. Bạn hãy đăng nhập và mua hàng
                <a target="_blank" href="http://127.0.0.1:8000/login-checkout" style="font-weight:bold;">tại đây</a>
                để được hưởng các chương trình khuyến mãi. Chúc quý khách có một ngày mới vui vẻ.
            </span>
            <br>
        </div>
        <div>
            <span>Hãy sử dựng mã code sau để được giảm
                <span style="color: red;">
                    @if($magiamgia['magiamgia_loaigiamgia']==1)
                    {{$magiamgia['magiamgia_sotiengiam']}} %
                    @else
                    {{number_format($magiamgia['magiamgia_sotiengiam'],0,',','.')}} vnđ
                    @endif

                </span> cho giá trị tổng đơn hàng: <span style="color: red;cursor:pointer;">{{$magiamgia['magiamgia_code']}}</span>
            </span><br>
            <span>Vì mã giảm giá có số lượng có hạn nên quý khách hãy nhanh tay truy cập
                <a target="_blank" href="http://127.0.0.1:8000/home" style="text-decoration:none;font-weight:bold;">Shop giày thể thao MINOSS</a>
                để mua hàng và để không bỏ lỡ những chương trình khuyến mãi khủng của chúng tôi.
            </span>
            <br>
            <span>Số lượng mã: <span style="color: red;">{{$magiamgia['magiamgia_soluong']}}</span></span><br>
            <span>Ngày bắt đầu mã khuyến mãi: <span style="color: red;">{{$magiamgia['magiamgia_ngaybatdau']}}</span></span><br>
            <span>Ngày kết thúc mã khuyến mãi: <span style="color: red;">{{$magiamgia['magiamgia_ngayketthuc']}}</span></span><br>
            <span>Xin chân thành cảm ơn!!!</span>
        </div>
    </div>

</body>

</html>