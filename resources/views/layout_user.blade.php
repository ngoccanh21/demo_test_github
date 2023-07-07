<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MINOSS - Shop bán giày thể thao MINOSS</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="Shop chuyên bán giày dành cho những bạn trẻ, những bạn đam mê giày thể thao">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="giay the thao minoss, giay the thao cho gioi tre">
    <link rel="canonical" href="">
    <!-- source http://127.0.0.1:8000/home -->
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/frontend/assets/images/favicon.ico" />

    <!-- CSS
    ============================================ -->

    <!-- Vendor CSS (Contain Bootstrap, Icon Fonts) -->
    <link rel="stylesheet" href="/frontend/assets/css/vendor/font-awesome.min.css" />
    <link rel="stylesheet" href="/frontend/assets/css/vendor/Pe-icon-7-stroke.css" />

    <!-- Plugin CSS (Global Plugins Files) -->
    <link rel="stylesheet" href="/frontend/assets/css/plugins/animate.css">
    <link rel="stylesheet" href="/frontend/assets/css/plugins/jquery-ui.min.css">
    <link rel="stylesheet" href="/frontend/assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="/frontend/assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="/frontend/assets/css/plugins/magnific-popup.min.css" />

    <!-- Minify Version -->
    <!-- <link rel="stylesheet" href="/frontend/assets/css/vendor/vendor.min.css"> -->
    <!-- <link rel="stylesheet" href="/frontend/assets/css/plugins/plugins.min.css"> -->

    <!-- Style CSS -->
    <link rel="stylesheet" href="/frontend/assets/css/style.css">
    <!-- <link rel="stylesheet" href="/frontend/assets/css/style.min.css"> -->

    <!-- sweet alert css -->
    <link rel="stylesheet" href="/frontend/assets/css/sweetalert/sweetalert.css">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!--mật khẩu ứng dụng gg: rzuqghrcwbnzxgie -->

</head>

<body>
    <style>
        .coupon2 .delete_all_cart:hover {
            background: #bac34e;
        }
    </style>
    <style>
        .dropdown-content a:hover {
            background: #eee;
            /*background: rgb(186, 195, 78);*/
            transition: all 0.8s;
        }

        .dropdown-content {
            display: none;
            width: 470px;
            height: 500px;
            position: absolute;
            overflow: auto;
            z-index: 10000;
            background: gray;
            margin: 55px 0px 0px 205px;
        }

        .dropdown-content .header-search {
            background: #eee;
            width: 100%;
            height: 30px;
            line-height: 30px;
        }

        .dropdown-content .header-search .headerSearch-content {
            font-weight: bold;
            width: 100%;
            font-size: 14px;
            color: #323c3f;
            padding: 0px 0px 0px 5px;
        }

        .dropdown-content a {
            width: 100%;
            height: 110px;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a .search-content {
            width: 100%;
            height: 100%;
        }

        .dropdown-content a .search-content .search-content-img {
            width: 22%;
            height: 100%;
            float: left;
            margin: 5px;
        }

        .dropdown-content a .search-content .search-content-img img {
            width: 90%;
            height: 90%;
        }

        .dropdown-content a .search-content .search-noidung {
            width: 75%;
            height: 110px;
            float: left;
        }

        .dropdown-content a .search-content .search-noidung .nameSearch {
            font-size: 15px;
            text-transform: capitalize;
            line-height: 35px;
            padding: 0px 0px 0px 10px;
        }

        .dropdown-content a .search-content .search-noidung .priceSearch {
            padding: 0px 0px 0px 10px;
            line-height: 25px;
            font-size: 13px;
        }

        /*bật tắt tìm kiếm*/

        .show {
            display: block;
        }
    </style>

    <div class="main-wrapper">

        <!-- Begin Main Header Area -->
        @include('user_includes.header')
        <!-- Main Header Area End Here -->

        <!-- Begin Slider Area -->
        @yield('content')
        <!-- Blog Area End Here -->

        <!-- Begin Footer Area -->
        @include('user_includes.footer')
        <!-- Footer Area End Here -->

        <!-- Begin Scroll To Top -->
        <a class="scroll-to-top" href="">
            <i class="fa fa-chevron-up"></i>
        </a>
        <!-- Scroll To Top End Here -->

    </div>

    <!-- Global Vendor, plugins JS -->

    <!-- JS Files
    ============================================ -->
    <!-- Global Vendor, plugins JS -->

    <!-- Vendor JS -->
    <script src="/frontend/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="/frontend/assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="/frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="/frontend/assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="/frontend/assets/js/vendor/jquery.waypoints.js"></script>

    <!--Plugins JS-->
    <script src="/frontend/assets/js/plugins/wow.min.js"></script>
    <script src="/frontend/assets/js/plugins/jquery-ui.min.js"></script>
    <script src="/frontend/assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="/frontend/assets/js/plugins/jquery.nice-select.js"></script>
    <script src="/frontend/assets/js/plugins/parallax.min.js"></script>
    <script src="/frontend/assets/js/plugins/jquery.magnific-popup.min.js"></script>

    <!-- Minify Version -->
    <!-- <script src="/frontend/assets/js/vendor.min.js"></script> -->
    <!-- <script src="/frontend/assets/js/plugins.min.js"></script> -->

    <!--Main JS (Common Activation Codes)-->
    <script src="/frontend/assets/js/main.js"></script>
    <!-- <script src="/frontend/assets/js/main.min.js"></script> -->

    <!-- file js swett alert -->
    <script src="/frontend/assets/js/sweetalert/sweetalert.min.js"></script>



    <!-- tăng, giảm quantity cart -->
    <!-- <script>
        const minusButton = document.getElementById('minus');
        const plusButton = document.getElementById('plus');
        const inputField = document.getElementById('input');

        minusButton.addEventListener('click', event => {
            event.preventDefault();
            const currentValue = Number(inputField.value) || 0;
            inputField.value = currentValue - 1;
        });

        plusButton.addEventListener('click', event => {
            event.preventDefault();
            const currentValue = Number(inputField.value) || 0;
            inputField.value = currentValue + 1;
        });
    </script> -->

    <!-- Tìm kiếm sản phẩm -->
    <script src="/frontend/assets/js/timkiem.js"></script>

    <!-- Khi thay đổi size thì qty thay đổi -- chi tiết sp-->
    <script src="/frontend/assets/js/product_size_qty.js"></script>

    <!-- gio hàng ajax -->
    <script src="/frontend/assets/js/cart.js"></script>

    <!-- phí vận chuyển -- delivery-->
    <script src="/frontend/assets/js/phi_van_chuyen.js"></script>

    <!-- đặt hàng -- order-->
    <script src="/frontend/assets/js/send_order.js"></script>


    <!-- lọc sản phẩm theo tên, giá -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sort').on('change', function() {
                var url = $(this).val();
                if (url) {
                    window.location = url;
                }
                return false;
            });
        });
    </script>

    <!--lý do huỷ đơn hàng -->
    <script type="text/javascript">
        function huyDonHang(id) {
            var don_hang_code = id;
            var lydohuy = $('.li_do_huy_don').val();
            var don_hang_trangthai = 4;
            var _token = $('input[name="_token"]').val();
            // alert(don_hang_code);
            // alert(lydohuy);
            // alert(don_hang_trangthai);
            // alert(_token);
            $.ajax({
                url: '/ly-do-huy-don-hang',
                method: 'POST',
                data: {
                    don_hang_code: don_hang_code,
                    lydohuy: lydohuy,
                    don_hang_trangthai: don_hang_trangthai,
                    _token: _token
                },
                success: function() {
                    swal("Thành công!", "Đơn hàng của bạn đã được huỷ thành công!", "success");

                }
            });
            window.setTimeout(function() {
                location.reload();
            }, 2000);
        }
    </script>

    <!-- tăng lượt xem sản phẩm, bài viết-->
    <script src="/frontend/assets/js/add_luotxem.js"></script>



</body>

</html>