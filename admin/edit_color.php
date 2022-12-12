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
                    <?php
                        if(isset($_GET['id_mau'])){
                            $id_mau = $_GET['id_mau'];
                        }
                        $sql = "select * from mau_sac where id_mau = '$id_mau'";
                        $sq = mysqli_query($con, $sql);
                        while($row = mysqli_fetch_assoc($sq)){
                    ?>
                    <input type = "text" name = "color_name" value = "<?php echo $row['ten_mau']?>"/>
                    <lable>Ảnh Hiện Tại<span style = "color: red">*</span></lable><br>
                    <img src = "<?php echo $row['anh_mau']?>"><br>
                    <?php
                        }
                    ?>
                    <lable>Vui Lòng Chọn Ảnh Màu<span style = "color: red">*</span></lable>
                    <input name = "hinhanh" type = "file">
                    <button name = "click">Thêm</button>
                   <?php
                       if(isset($_POST['click'])){
                            $color_name = $_POST['color_name'];
                            $hinh_anh_file = $_FILES['hinhanh'];
                            $ten_anh = $hinh_anh_file['name'];

                            if($color_name == ''){
                                echo "<br>Điền Đầy Đủ Thông tin";
                            }
                            else{
                                if($ten_anh != ''){
                                    $sql = "UPDATE mau_sac set ten_mau = '$color_name', anh_mau = 'mau_san_pham/$ten_anh' where id_mau = '$id_mau'";
                                    $sq = mysqli_query($con, $sql) or die("truy vấn sai");
                                    if($sq == true){
                                        move_uploaded_file($hinh_anh_file['tmp_name'], "mau_san_pham/".$ten_anh);
                                        echo "<br>Cập nhập thành công xem <a href = 'color_list.php'>Tại đây</a>";
                                    }
                                    else{
                                        echo "<br>Cập nhập thất bại";
                                    }
                                }
                                else{
                                    $sql = "UPDATE mau_sac set ten_mau = '$color_name' where id_mau = '$id_mau'";
                                    $sq = mysqli_query($con, $sql) or die("truy vấn sai");
                                    if($sq == true){
                                        echo "<br>Cập nhập thành công xem <a href = 'color_list.php'>Tại đây</a>";
                                    }
                                    else{
                                        echo "<br>Cập nhập thất bại";
                                    }
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
                        




