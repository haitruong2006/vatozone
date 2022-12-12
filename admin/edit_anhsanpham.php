<?php
    include "../admin/header.php";
    include "../admin/left_side.php";
?>
<?php
    $servername = "localhost";
    $database = "website_demo";
    $username = "root";
    $password = "";
    $con = mysqli_connect($servername, $username, $password, $database) or die("kết nối thất bại");
    
?>
        <div class="admin-content-right">
            <div class="cartegory-content-right-bg">
                <h1>Sửa Ảnh Mô Tả Cho Sản Phẩm</h1>
                <form action = "" method = "post" enctype="multipart/form-data">
                    <label for="">Id sản phẩm<span style="color: red;">*</span></label>
                    <?php
                        if(isset($_GET['id_anh_san_pham'])){
                            $id_anh_san_pham = $_GET['id_anh_san_pham'];
                        }
                        $sql = "select * from anh_san_pham where id_anh_san_pham = '$id_anh_san_pham'";
                        $sq = mysqli_query($con, $sql);
                        while($row = mysqli_fetch_assoc($sq)){
                    ?>
                    <input readonly = 'true' type = "text" name = "id_san_pham" value = "<?php echo $row['product_id']?>"/>
                    <label for="">Ảnh hiện tại<span style="color: red;">*</span></label><br>
                    <img src = "<?php echo $row['ten_anh']?>" width = 100px>
                    <?php
                        }
                    ?>
                    <input required type="file" name="sanpham_anhs">
                    <button name = "click">Cập Nhập</button>
                    <?php
                         if(isset($_POST['click'])){

                            $file = $_FILES['sanpham_anhs'];
                            $ten_anh = $file['name'];
                            if($ten_anh != ''){
                                $id_san_pham = $_POST['id_san_pham'];
                                $sql = "update anh_san_pham set  product_id = '$id_san_pham', ten_anh = 'hinhanh_sanpham/$ten_anh' where id_anh_san_pham = '$id_anh_san_pham'" or die("truy vấn sai");
                                $kiem_tra_sql = mysqli_query($con, $sql);
                                if($kiem_tra_sql == true){  
                                    move_uploaded_file($file['tmp_name'], "hinhanh_sanpham/".$ten_anh);    
                                    echo "<br>cập nhập thành công xem <a href = 'anhsanpham_lists.php'>TẠI ĐÂY</a>";
                                }
                                else{
                                    echo "<br>cập nhập thất bại";
                                }
                            }
                            else{
                                $id_san_pham = $_POST['id_san_pham'];
                                $sql = "update anh_san_pham set product_id = '$id_san_pham' where id_anh_san_pham = '$id_anh_san_pham'" or die("truy vấn sai");
                                $kiem_tra_sql = mysqli_query($con, $sql);
                                if($kiem_tra_sql == true){    
                                    echo "<br>cập nhập thành công xem <a href = 'anhsanpham_lists.php'>TẠI ĐÂY</a>";
                                }
                                else{
                                    echo "<br>cập nhập thất bại";
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
                        




