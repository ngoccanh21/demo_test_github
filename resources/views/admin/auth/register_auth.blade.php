<!DOCTYPE html>

<head>
    <title>Đăng kí tài khảon Admin Authentication</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="/backend/login_file/css/bootstrap.min.css">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="/backend/login_file/css/style.css" rel='stylesheet' type='text/css' />
    <link href="/backend/login_file/css/style-responsive.css" rel="stylesheet" />
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="/backend/login_file/css/font.css" type="text/css" />
    <link href="/backend/login_file/css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <script src="/backend/login_file/js/jquery2.0.3.min.js"></script>

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="log-w3">
        <div class="w3layouts-main">
            <h2>Đăng kí tài khoản Admin Authentication</h2>
            <?php
            //session_start();
            $message = session()->get('message');
            if ($message) {
                echo '<span class="text-alert">' . $message . '</span>';
                session()->put('message', null);
            }
            ?>
            <form action="{{URL::to('/register-auth-post')}}" method="post">
                {{ csrf_field() }}
                <input type="text" class="ggg" name="admin_name" placeholder="Nhập tên người dùng" required="">
                <input type="email" class="ggg" name="admin_email" placeholder="Nhập email" required="">
                <input type="password" class="ggg" name="admin_password" placeholder="Nhập mật khẩu" required="">
                <input type="text" class="ggg" name="admin_phone" placeholder="Nhập số điện thoại" required="">

                <div class="clearfix"></div>
                <input type="submit" value="Đăng kí" name="login">
            </form>
            <a href="/login-google"><i class="fa-brands fa-google"></i> Đăng nhập bằng tài khoản goole</a>
            <!-- <a href="/register-auth">Đăng kí Authentication</a> -->
            <!-- <a href="/login-facebook">Đăng nhập bằng facebook</a> -->
            <!-- {{-- <p>Don't Have an Account ?<a href="registration.html">Create an account</a></p> --}} -->
        </div>
    </div>
    <script src="/backend/login_file/js/bootstrap.js"></script>
    <script src="/backend/login_file/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="/backend/login_file/js/scripts.js"></script>
    <script src="/backend/login_file/js/jquery.slimscroll.js"></script>
    <script src="/backend/login_file/js/jquery.nicescroll.js"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
    <script src="/backend/login_file/js/jquery.scrollTo.js"></script>

    <!-- link api captcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</body>

</html>