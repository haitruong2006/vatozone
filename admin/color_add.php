<?php
    include "../admin/header.php";
    include "../admin/left_side.php";
?>
<style>
    .cartegory-content-right-bg form{
        margin-top: 10px;
    }
    select{
        width: 200px;
        height: 30px;
        margin: 5px 0;
    }
</style>
<?php
    $servername = "localhost";
    $database = "website_demo";
    $username = "root";
    $password = "";
    $con = mysqli_connect($servername, $username, $password, $database) or die("kết nối thất bại");
    
?>
        <div class="admin-content-right">
            <div class="cartegory-content-right-bg">
                <h1>Thêm Màu Sản Phầm</h1>
                <form action = "" method = "post" enctype = "multipart/form-data">
                    <lable>Tên Màu<span style = "color: red">*</span></lable><br>
                    <input type = "text" name = "color_name" />
                    <lable>Vui Lòng Chọn Ảnh Màu<span style = "color: red">*</span></lable>
                    <input name = "hinhanh" type = "file">
                    <button name = "click">Thêm</button>
                   <?php
                       if(isset($_POST['click'])){
                            $color_name = $_POST['color_name'];
                            $hinh_anh_file = $_FILES['hinhanh'];
                            $ten_anh = $hinh_anh_file['name'];

                            $sql = "INSERT INTO mau_sac(ten_mau, anh_mau) VALUES('$color_name', 'mau_san_pham/$ten_anh')";
                            $sq = mysqli_query($con, $sql);
                            if($color_name == '' || $ten_anh == ''){
                                echo "<br>Điền Đầy Đủ Thông tin";
                            }
                            else{
                                if($sq == true){
                                    move_uploaded_file($hinh_anh_file['tmp_name'], "mau_san_pham/".$ten_anh);
                                    echo "<br>Thêm thành công xem <a href = 'color_list.php'>tại đây<a/>";
                                }
                                else{
                                    echo "<br>Thêm thất bại";
                                }
                            }
                       }
                            
                   ?>
                </form>
            </div>
         </div>
     </section>
     <section>
     </section>
     <script src="js/script.js"></script>
 </body>
 </html>  
                        




