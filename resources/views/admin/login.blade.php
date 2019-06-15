<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
    <title>Đăng nhập</title>
	<base href="{{asset('')}}">
    <!-- Font Icon -->
    <link rel="stylesheet" href="admin/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="admin/css/style.css">
</head>
<body>
<!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
				
                    <div class="signin-image">
                        <figure><img src="admin/images/signin-image.jpg" alt="sing up image"></figure>
						<a href="{{route('signin')}}" class="signup-image-link">Đăng ký</a>
						<a href="{{route('trang-chu')}}" class="signup-image-link">Trang chủ</a>
                    </div>

                    <div class="signin-form">
					@if(Session::has('message'))
						<div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
					@endif
                        <h2 class="form-title">Đăng nhập</h2>
                        <form method="POST" class="register-form" id="login-form" action="{{route('login')}}">
			            <input type="hidden" name="_token" value="{{csrf_token()}}" >
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                Tên đăng nhập <input type="text" name="username" required placeholder="Email"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                Mật khẩu <input type="password" name="password" required placeholder="Mật khẩu"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Đăng nhập"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    <!-- JS -->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>