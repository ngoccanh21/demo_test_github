<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Tables</title>

    <!-- Fontfaces CSS-->
    <link href="/backend/css/font-face.css" rel="stylesheet" media="all">
    <link href="/backend/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/backend/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/backend/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="/backend/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="/backend/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="/backend/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/backend/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/backend/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/backend/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/backend/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/backend/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="/backend/css/theme.css" rel="stylesheet" media="all">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- css search js -->
    <link rel="stylesheet" href="/backend/css/jquery.dataTables.min.css">

    <!-- css datepicker --  -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!-- css biểu đồ morris thống kê -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

    <!-- sweet alert css -->
    <link rel="stylesheet" href="/frontend/assets/css/sweetalert/sweetalert.css">

</head>

<body class="animsition">
    <!-- <style>
        * {
            font-family: DejaVu Sans;
        }
    </style> -->
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        @include('admin_includes.header')
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        @include('admin_includes.menu')
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search"
                                    placeholder="Nhập từ khoá tìm kiếm..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <!-- <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="/backend/images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="/backend/images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="/backend/images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="/backend/images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="/backend/images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="/backend/images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">
                                                <?php

                                                use Illuminate\Support\Facades\Auth;

                                                $name = Auth()->user()->admin_name;
                                                //$name = session()->get('admin_name');
                                                if ($name) {
                                                    echo $name;
                                                }
                                                ?>
                                            </a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="/backend/images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <?php
                                                        $name = Auth()->user()->admin_email;
                                                        //$name = session()->get('admin_email');
                                                        if ($name) {
                                                            echo $name;
                                                        }
                                                        ?>
                                                    </h5>
                                                    <span class="email">
                                                        <?php
                                                        $email = Auth()->user()->admin_name;
                                                        //$email = session()->get('admin_email');
                                                        if ($email) {
                                                            echo $email;
                                                        }
                                                        ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Tài khoản</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Cài đặt</a>
                                                </div>
                                                <!-- <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div> -->
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <!-- <a href="/logout">
                                                    <i class="zmdi zmdi-power"></i>Đăng xuất
                                                </a> -->
                                                <a href="/logout-auth">
                                                    <i class="zmdi zmdi-power"></i>Đăng xuất
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            @yield('content')
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="/backend/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="/backend/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="/backend/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="/backend/vendor/slick/slick.min.js">
    </script>
    <script src="/backend/vendor/wow/wow.min.js"></script>
    <script src="/backend/vendor/animsition/animsition.min.js"></script>
    <script src="/backend/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="/backend/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="/backend/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="/backend/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="/backend/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/backend/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="/backend/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="/backend/js/main.js"></script>

    <!-- file js swett alert -->
    <script src="/frontend/assets/js/sweetalert/sweetalert.min.js"></script>

    <!-- ckeditor -->
    <script src="/backend/ckeditor/ckeditor.js"></script>
    <script>
    CKEDITOR.replace('category_mota');
    CKEDITOR.replace('product_mota');
    CKEDITOR.replace('tintuc_noidung');
    </script>

    <!-- chỉ cho chọn 1 checkbox, ko đc chọn nhiều checkbox 1 lúc -- chọn phân quyền-->
    <!-- <script type="text/javascript">
        // the selector will match all input controls of type :checkbox
        // and attach a click event handler 
        $("input:checkbox").on('click', function() {
            // in the handler, 'this' refers to the box clicked on
            var $box = $(this);
            if ($box.is(":checked")) {
                // the name of the box is retrieved using the .attr() method
                // as it is assumed and expected to be immutable
                var group = "input:checkbox[name='" + $box.attr("name") + "']";
                // the checked state of the group/box on the other hand will change
                // and the current value is retrieved using .prop() method
                $(group).prop("checked", false);
                $box.prop("checked", true);
            } else {
                $box.prop("checked", false);
            }
        });
    </script> -->


    <!-- search-js  sInfo: "Showing _START_ to _END_ of _TOTAL_ entries" sLengthMenu: "Show _MENU_ entries"-->
    <script src="/backend/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>

    <!-- format tiền khi nhập -->
    <script src="/backend/js/simple.money.format.js"></script>
    <script type="text/javascript">
    $('.product_giaban_format').simpleMoneyFormat();
    </script>

    <!-- lịch thống kê --  datepicker index -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
    $(function() {
        $("#datepicker").datepicker({
            prevText: "Tháng trước",
            nextText: "Tháng sau",
            dateFormat: "yy-mm-dd",
            dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
            duration: "slow"
        });
        $("#datepicker2").datepicker({
            prevText: "Tháng trước",
            nextText: "Tháng sau",
            dateFormat: "yy-mm-dd",
            dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
            duration: "slow"
        });
        //duration: khoảng thời gian
    });
    </script>

    <!-- datepicker mã giảm giá -->
    <script>
    $(function() {
        $("#magiamgia_ngaybatdau").datepicker({
            prevText: "Tháng trước",
            nextText: "Tháng sau",
            dateFormat: "yy-mm-dd",
            dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
            duration: "slow"
        });
        $("#magiamgia_ngayketthuc").datepicker({
            prevText: "Tháng trước",
            nextText: "Tháng sau",
            dateFormat: "yy-mm-dd",
            dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
            duration: "slow"
        });
    });
    </script>

    <!-- biểu đồ morris -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <script src="/backend/js/morris_thongke.js"></script>

    <!-- thống kê số lượng -->
    <script type="text/javascript">
    $(document).ready(function() {
        var donut = Morris.Donut({
            element: 'donut',
            resize: true,
            colors: ['#fa4251', '#00b5e9', '#28a745'],
            data: [{
                    label: "Sản phẩm",
                    value: <?php echo $tong_sanpham ?>
                },
                {
                    label: "Đơn hàng",
                    value: <?php echo $donhang_count ?>
                },
                // {
                //     label: "Lợi nhuận",
                //     value:
                // },
                {
                    label: "Khách hàng",
                    value: <?php echo $khachhang_count ?>
                }
            ]
        });
    });
    </script>


    <!-- trạng thái đơn hàng -->
    <script src="/backend/js/trang_thai_order.js"></script>

    <!-- phí vận chuyển - delivery -->
    <script src="/backend/js/phi_van_chuyen.js"></script>

    <!-- thêm load số lượng theo size -->
    <script src="/backend/js/product_size.js"></script>

</body>

</html>
<!-- end document-->