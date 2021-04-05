<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RFID Manpower System </title>

    <!-- Bootstrap -->
    <link href="{{asset('AdminLTE/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('AdminLTE/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('AdminLTE/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset('AdminLTE/vendors/animate.css/animate.min.css')}}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{asset('AdminLTE/build/css/custom.min.css')}}" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>
  
        <div class="login_wrapper">
          <div class="animate form login_form">
            <section class="login_content">
            <form action="{{ url('login') }}" method="post">
                    {{ csrf_field() }}
                <h1>RFID LOGIN</h1>
                <div>
                  <input type="text" class="form-control" placeholder="Username" required="" name="username" style="font-size: 14px!important;"/>
                </div>
                <div>
                  <input type="password" class="form-control" placeholder="Password" required="" name="password" style="font-size: 14px!important;"/>
                </div>
                <div>
                <button type="submit" class="btn btn-info btn-sm">
                    MASUK
                </button>
                </div>
                <div class="clearfix"></div>
              </form>
            </section>
          </div>
  
          
        </div>
      </div>
    
</body>
</html>