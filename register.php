<?php include("class_lib/db_conf.php"); ?>
<?php include("class_lib/database.php"); ?>
<?php
$sql_provinces = "SELECT * FROM provinces  ORDER BY `provinces`.`name_th` ASC";
$query = mysqli_query($connection, $sql_provinces);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>สมัครสมาชิก</title>
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
        function do_regis() {
            var cid = $("#cid").val();
            var action = $("#action").val();
            var password = $('#password').val();
            var tel = $("#tel").val();
            var gender = $("input[name='gender']:checked").val();
            var fname = $("#fname").val();
            var lname = $("#lname").val();
            var birthdayDate = $("#birthdayDate").val();
            var provinces = $("#provinces").val();
            var amphures = $("#amphures").val();
            var districts = $("#districts").val();
            var accept = $("#accept").val();

            if (cid != "") {
                $("#loading_spinner").css({
                    "display": "block"
                });
                $.ajax({
                    type: 'post',
                    url: 'regisform.php',
                    data: {
                        do_regis: "do_regis",
                        cid: cid,
                        password: password,
                        tel: tel,
                        gender: gender,
                        fname: fname,
                        lname: lname,
                        birthdayDate: birthdayDate,
                        provinces: provinces,
                        amphures: amphures,
                        districts: districts,
                        accept: accept,
                    },
                    success: function(response) {
                        if (response == "success") {
                            Swal.fire({
                                title: 'สมัครสมาชิกสำเร็จ',
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
                <form class="login100-form validate-form" name="bmrform" action="regisform.php" onsubmit="return do_regis();">
                    <span class="login100-form-title p-b-60">
                        สมัครสมาชิก
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

                    <div class="wrap-input100 validate-input m-b-23" data-validate="กรุณากรอกเบอร์โทรศัพท์มือถือ">
                        <span class="label-input100">เบอร์เบอร์โทรศัพท์มือถือ</span>
                        <input class="input100" type="text" name="tel" id="tel" placeholder="กรอกเบอร์โทรศัพท์มือถือของท่าน" maxlength="10" minlength="10" pattern="[0-9]+" required>
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="กรุณาเลือกเพศ">
                        <span class="label-input100">เพศของคุณ</span><br>
                        <div class="wrapper">
                            <input type="radio" name="gender" id="option-1" value="1" checked required>
                            <input type="radio" name="gender" id="option-2" value="2">
                            <label for="option-1" class="option option-1">
                                <div class="dot"></div>
                                <span>ชาย</span>
                            </label>
                            <label for="option-2" class="option option-2">
                                <div class="dot"></div>
                                <span>หญิง</span>
                            </label>
                        </div>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="กรุณากรอกชิ้อ">
                        <span class="label-input100">ชื่อ</span>
                        <input class="input100" type="text" name="fname" id="fname" placeholder="กรอกชื่อ" required>
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="กรุณากรอกนามสกุล">
                        <span class="label-input100">นามสกุล</span>
                        <input class="input100" type="text" name="lname" id="lname" placeholder="กรอกนามสกุล" required>
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="กรุณากรอกนามสกุล">
                        <span class="label-input100">วันเกิด</span>
                        <input id="startDate" class="input100" type="date" name="birthdayDate" id="birthdayDate" required />
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="จังหวัด">
                        <span class="label-input100">จังหวัด</span>
                        <select class="input200" name="Ref_prov_id" id="provinces" required>
                            <option value="" selected disabled>-กรุณาเลือกจังหวัด-</option>
                            <?php foreach ($query as $value) { ?>
                                <option value="<?= $value['id'] ?>"><?= $value['name_th'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="อำเภอ">
                        <span class="label-input100">อำเภอ</span>
                        <select class="input200" name="Ref_dist_id" id="amphures">
                        </select>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="ตำบล">
                        <span class="label-input100">ตำบล</span>
                        <select class="input200" name="Ref_subdist_id" id="districts">
                        </select>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="ยอมรับข้อตกลง">
                        <br>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="accept" name="accept" value="1" checked required>
                            <label class="form-check-label" for="flexSwitchCheckChecked">ยอมรับข้อตกลงความเป็นส่วนตัว <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><u>อ่าน</u></a></label>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">นโยบายความเป็นส่วนตัว</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <?php include "pdpa.php" ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">ปิด</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
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
                                สมัครสมาชิก
                            </button>
                        </div>
                    </div>

                    <div class="flex-col-c p-t-50">
                        <span class="txt1 p-b-17">
                            ไปเข้าสู่ระบบ
                        </span>

                        <a href="Login.php" class="txt2">
                            <u>เข้าสู่ระบบ</u>
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