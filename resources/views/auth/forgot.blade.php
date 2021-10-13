<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style>
    .main-head {
        height: 150px;
        background: #FFF;

    }

    .sidenav {
        height: 100%;
        background-image: url('/asset/image/backgroud.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        overflow-x: hidden;
        padding-top: 20px;
    }


    .main {
        padding: 0px 10px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }
    }

    @media screen and (max-width: 450px) {
        .login-form {
            margin-top: 10%;
        }

        .register-form {
            margin-top: 10%;
        }
    }

    @media screen and (min-width: 768px) {
        .main {
            margin-left: 40%;
        }

        .sidenav {
            width: 40%;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
        }

        .login-form {
            margin-top: 50%;
        }

        .register-form {
            margin-top: 20%;
        }
    }


    .login-main-text {
        margin-top: 20%;
        padding: 60px;
        color: #fff;
    }

    .login-main-text h2 {
        font-weight: 300;
    }

    .btn-black {
        background-color: #000 !important;
        color: #fff;
    }
</style>

<div class="sidenav">
    <div class="login-main-text">
        <img src="{{asset('asset/image/logo.png')}}" alt="" style="width: 70%;">
    </div>
</div>
<div class="main">
    <div class="col-md-6 col-sm-12">
        <h1 class="mt-5" >Forgot password</h1>

        <div class="login-form">
            <form>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" placeholder="User Name">
                </div>
                <button type="submit" class="btn btn-black">Check email</button>
            </form>
        </div>
    </div>
</div>