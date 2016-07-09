
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Lockscreen</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="{{{asset('assets/admin/bootstrap/css/bootstrap.min.css')}}}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{{ asset('assets/admin/css/AdminLTE.min.css') }}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .block-content {
            display: none;
        }
    </style>
</head>
<body class="lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
        <a href="../../index2.html"><b>Admin</b>VCar</a>
    </div>
    <!-- User name -->
    <div class="lockscreen-name">Anh Pham</div>

    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">

        <div class="lockscreen-image">
            <img src="https://scontent-hkg3-1.xx.fbcdn.net/v/t1.0-9/11210458_1440676122912460_2656603473842896949_n.jpg?oh=428187650ecfdbf12263483218c78ace&oe=582A98A1" alt="user image"/>
        </div>

        <div class="lockscreen-credentials">
            <div class="input-group inp-username">
                <input type="text" class="form-control" placeholder="username" name="username" />
                <div class="input-group-btn">
                    <button class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
                </div>
            </div>
            <div class="input-group inp-password block-content">
                <input type="password" class="form-control" placeholder="password" name="password" />
                <div class="input-group-btn">
                    <button class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
                </div>
            </div>
            <input type="hidden" name="token" value="{{ csrf_token() }}"/>
        </div>

    </div>
    <div class="help-block text-center">
        Enter your password to retrieve your session
    </div>
    <div class='text-center'>
        <a href="login.html">Or sign in as a different user</a>
    </div>

</div><!-- /.center -->

<!-- jQuery 2.1.4 -->
<script src="{{{asset('assets/admin/plugins/jQuery/jQuery-2.1.4.min.js')}}}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{{ asset('assets/admin/bootstrap/js/bootstrap.min.js') }}}" type="text/javascript"></script>


<script type="text/javascript">
    $(document).ready(function(){
        $("input").focus();
        $('input[name="username"]').keypress(function(e){
            if(e.keyCode == 13) {
                $(".inp-username").addClass('block-content');
                $(".inp-password").removeClass('block-content');
                $("input").focus();
            }
        });
        $('input[name="password"]').keypress(function(e){
            if(e.keyCode == 13) {

                $.ajax({
                    url: "../auth/login",
                    method: 'post',
                    beforeSend: function(request) {
                        request.setRequestHeader('X-CSRF-TOKEN', $('input[name="token"]').val());
                    },
                    data: "email="+$('input[name="username"]').val()+"&password="+$('input[name="password"]').val(),
                    success: function(response) {

                    }
                });
            }
        });
    });
</script>

</body>
</html>