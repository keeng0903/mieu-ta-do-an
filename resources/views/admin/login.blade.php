
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Đăng nhập</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Online Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Meta tag Keywords -->
    <!-- css files -->
    <link rel="stylesheet" href="{{asset('login/css/style.css')}}" type="text/css" media="all" /> <!-- Style-CSS -->
    <link rel="stylesheet" href="{{asset('login/css/font-awesome.css')}}"> <!-- Font-Awesome-Icons-CSS -->
    <!-- //css files -->
    <!-- online-fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">
    <!-- //online-fonts -->

</head>
<body>
<!-- main -->
<div class="center-container">
    <!--header-->
    <div class="header-w3l">
        <h1>ĐĂNG NHẬP QUẢN TRỊ VIÊN</h1>
    </div>
    <!--//header-->
    <div class="main-content-agile">
        <div class="sub-main-w3">
            <div class="wthree-pro">
                <?php
                $message = Session()->get('message');
                if ($message){ ?>
                <p id="alert alert-error"><h2><?php echo $message ?></h2></p>;
                <?php  Session()->put('message',null);
                }
                ?>
            </div>
            <form action="{{route('admin.confirm')}}" method="post" enctype="multipart/form-data">@csrf
                <div class="pom-agile">
                    <input placeholder="E-mail" name="email" class="user" type="email" required="">
                </div>
                <div class="pom-agile">
                    <input  placeholder="Password" name="password" class="pass" type="password" required="">
                </div>

                <div class="sub-w3l">
                    {{--                    <h6><a href="#">Forgot Password?</a></h6>--}}
                    <div class="right-w3l">
                        <input type="submit" name="login" value="Đăng nhập">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--//main-->
    <!--footer-->
    <div class="footer">
        {{--        <p>&copy; 2017 Online Login Form. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>--}}
    </div>
    <!--//footer-->
</div>
<script>
    window.setTimeout(function() {
        $("#alert").fadeTo(1000, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 500);
</script>
</body>
</html>
