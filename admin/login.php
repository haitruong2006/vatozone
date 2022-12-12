<?php session_start() ?>
<html>
    <head>
        <script src="https://kit.fontawesome.com/54f0cb7e4a.js" crossorigin="anonymous"></script>
        <style>
            :root{
                --bg1: #9b59b6;
                --bg2: #3498db; 
            }
            *{
                margin : 0;
                padding: 0;
                outline : none;
            }
            .container{
                display: flex;
                width: 100vw;
                height: 100vh;
                text-align: center;
                align-items: center;
                justify-content: center;
               
            }
            .form-login{
                width: 300px;
                height: 400px;
                background: #fff;
                border-radius: 10px;
                padding: 40px 30px;
                border: 2px solid #ddd;
            }
            .form-login button{
                height: 35px;
                width: 100%;
                margin-bottom: 50px;
                background: linear-gradient(to bottom right, var(--bg1), var(--bg2));
                border: none;
                color: #fff;
            }
            .form-text{
                margin-bottom: 60px;
                position: relative;
                margin-top: 30px;
            }
            .form-text input::placeholder{
                color: #909090;
            }
            .form-text input{
                width: 100%;
                height: 45px;
                padding-left: 30px;
               border: none;
                border-bottom: 2px solid var(--bg2);
                outline: none;
                font-size: 16px;
            }

            .form-text i {
                position: absolute;
                font-size: 20px;
                line-height: 45px;
               
            }
        </style>
    </head>
    <body>
        <div class="container">
            <form action = "" method = "post" class = "form-login">
                <h1>ĐĂNG NHẬP</h1>
                <div class="form-text">
                    <i class="fas fa-user"></i>
                    <input type = "username" placeholder = "Nhập tài khoản" name = "username" value = "<?php if(isset($_POST["username"])) echo $_POST["username"]?>"/>
                </div>
                <div class="form-text">
                    <i class="fas fa-lock"></i>
                    <input type = "password" placeholder = "Nhập mật khẩu" name = "password" value = "<?php if(isset($_POST["password"])) echo $_POST["password"]?>">
                </div>
                <button name = "click">Đăng Nhập</button>
                <?php
                     if(isset($_POST['click'])){
                         $user = $_POST['username'];
                         $pass = $_POST['password'];
                         if($user == ''){
                             echo "vui lòng nhập tài khoản";
                         }
                         else{
                             $con = mysqli_connect("localhost", "root", "", "website_demo") or die("truy cập sai");
                             $sql = "select * from user where username = '$user'";
                             $kq = mysqli_query($con, $sql);
                             $dem = mysqli_num_rows($kq);
                             if($dem <= 0){
                                echo "<br>Tài Khoản Không Tồn Tại";
                             }
                             else{
                                 $row = mysqli_fetch_assoc($kq);
                                 if($pass == $row['password']){
                                    $_SESSION['user'] = $_POST['username'];
                                    header("location: index.php");
                                 }
                                 else{
                                     echo "sai mật khẩu";
                                 }
                             }
                         }
                     }
                ?>  
            </form>
            
        </div>
    </body>
</html>