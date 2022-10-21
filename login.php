<!DOCTYPE html>
<html lang="en">

<head>
    <title>เข้าสู่ระบบ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="img/logo/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="css/login.css">
    <!--===============================================================================================-->
    <script type="text/javascript">
        function do_login() {
            var cid = $("#cid").val();
            var password = $('#password').val();

            if (cid != "") {
                $("#loading_spinner").css({
                    "display": "block"
                });
                $.ajax({
                    type: 'post',
                    url: 'regisform.php',
                    data: {
                        do_login: "do_login",
                        cid: cid,
                        password: password,
                       
                    },
                    success: function(response) {
                        if (response == "success") {
                            Swal.fire({
                                title: 'เข้าสู่ระบบสำเร็จ',
                                icon: 'success',
                                confirmButtonText: 'Ok'
                            })
                            window.setTimeout('window.location="index.php"; ', 2000);
                        } else {
                            $("#loading_spinner").css({
                                "display": "none"
                            });
                            Swal.fire({
                                title: 'Error!',
                                text: 'ข้อมูล ผิดพลาด',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            })
                        }
                    }
                });
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: 'กรุณาใส่ข้อมูลให้ครบถ้วน',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
            }

            return false;
        }
    </script>
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form class="login100-form validate-form" name="bmrform" action="regisform.php" onsubmit="return do_login();">
                    <span class="login100-form-title p-b-60">
                        เข้าสู่ระบบ
                    </span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="กรุณากรอกเลขบัตรประชาชน">
                        <span class="label-input100">เลขบัตรประชาชน</span>
                        <input class="input100" type="text" name="cid" id="cid" placeholder="กรอกหมายเลขบัตรประชาชน" maxlength="13" minlength="13" pattern="[0-9]+" required>
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="กรุณากรอก Password">
                        <span class="label-input100">รหัสเข้าใช้งาน</span>
                        <input class="input100" type="password" name="password" id="password" placeholder="กรอกรหัสผ่านของท่าน" required>
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>

                   

                    <div class="text-right p-t-8 p-b-31">
                        <a href="#">
                            ลืมรหัสผ่าน?
                        </a>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" name="btnRegis" value="Login">
                                เข้าสู่ระบบ
                            </button>
                        </div>
                    </div>

                    
                    <div class="flex-col-c p-t-50">
                        <span class="txt1 p-b-17">
                            สำหรับผู้ที่ยังไม่ได้ลงทะเบียน
                        </span>

                        <a href="register.php" class="txt2">
                            <u>สมัครสมาชิก</u>
                        </a>
                    </div>
                   
                    <div class="flex-col-c p-t-50">
                        <span class="txt1 p-b-17">
                            สำหรับเจ้าหน้าที่
                        </span>

                        <a href="#" class="txt2">
                            <u>เข้าสู่ระบบเจ้าหน้าที่</u>
                        </a>
                    </div>
                   
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <?php include('script.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
</body>

</html>