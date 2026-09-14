<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="<?php echo base_url(); ?>themes/backend/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Kiara Battery Clinic</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>themes/backend/images/fav-icon.png" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/backend/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/backend/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/backend/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/backend/css/demo.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/backend/css/toast.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/backend/css/sweetalert.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/backend/vendor/css/page-auth.css" />

    <script src="<?php echo base_url(); ?>themes/backend/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/js/validate.js"></script>
</head>

<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">
                        <div class="login-logo-img mx-auto mb-4" style="background-image: url('<?php echo base_url(); ?>themes/backend/images/logo.png');"></div>
                        <h4 class="my-2 text-center">Welcome 👋</h4>
                        <p class="mb-4 text-center">Please Login to Your Account.</p>
                        <form action="#" method="post" id="login" class="login">
                            <div class="form-group mb-50">
                                <div class="mb-3">
                                    <p class="mb-1">Email or Mobile Number</p>
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Email or Mobile Number">
                                </div>
                                <div class="mb-3 position-relative">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <p class="mb-0">Password</p>
                                        <a href="javascript:void(0);" onclick="togglePasswordVisibility()">
                                            <i class="fs-12 bx bx-hide"></i>
                                            <i class="fs-12 bx bx-show-alt" style="display: none;"></i>
                                        </a>
                                    </div>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                </div>
                                <button class="btn px-4 btn-danger mt-2" id="loginform">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // View Password
        function togglePasswordVisibility() {
        var passwordInput = $('#password');
        var eyeIcon = $('.bx-hide');
        var eyeSlashIcon = $('.bx-show-alt');

        if (passwordInput.attr('type') === 'password') {
            passwordInput.attr('type', 'text');
            eyeIcon.hide();
            eyeSlashIcon.show();
        } else {
            passwordInput.attr('type', 'password');
            eyeIcon.show();
            eyeSlashIcon.hide();
        }
        }

        //Login Form Submission 
        $("#login").validate({
            rules: {
                username: {
                    required: true
                },
                password: {
                    required: true
                }
            },
            messages: {
                username: {
                    required: "Please Enter Email or Mobile no",
                },
                password: {
                    required: "Please Enter Password",
                }
            },
            submitHandler: function (form) {
                var data = new FormData($('form').get(0));
                $.ajax({
                    url: '<?php echo base_url(); ?>login/checklogin',
                    data: data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    method: 'POST',
                    dataType: 'json',
                    beforeSend: function () {
                        $(".loader").show();
                    },
                    success: function (data) {
                        $(".loader").hide();
                        toastr.options = {
                            'closeButton': true,
                            'debug': false,
                            'newestOnTop': false,
                            'progressBar': false,
                            'positionClass': 'toast-top-right',
                            'preventDuplicates': false,
                            'showDuration': '1000',
                            'hideDuration': '1000',
                            'timeOut': '5000',
                            'extendedTimeOut': '1000',
                            'showEasing': 'swing',
                            'hideEasing': 'linear',
                            'showMethod': 'fadeIn',
                            'hideMethod': 'fadeOut',
                        }
                        if (data['isError']) {
                            toastr.error(data['message']);
                        } else {
                            toastr.success(data['message']);
                            setTimeout(function () {
                                window.location = '<?php echo base_url(); ?>admin';
                            }, 1500);

                        }
                    }
                });
                return false;
            }
        });
    </script>

    <script src="<?php echo base_url(); ?>themes/backend/js/toastr.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/js/jquery.sweet-alert.custom.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/js/sweetalert.min.js"></script>

    <script src="<?php echo base_url(); ?>themes/backend/vendor/js/helpers.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/js/config.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/js/jquery.ajax.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/vendor/js/menu.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/js/main.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/vendor/libs/jquery/jquery.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/vendor/libs/popper/popper.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/vendor/js/bootstrap.js"></script>
</body>

</html>