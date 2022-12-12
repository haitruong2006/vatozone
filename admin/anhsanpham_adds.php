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
                <h1>Thêm Ảnh Mô Tả Cho Sản Phẩm</h1>
                <form action = "" method = "post" enctype="multipart/form-data">
                    <input type = "text" name = "id_san_pham" placeholder = "nhập id sản phẩm" value = "<?php if(isset($_POST['id_san_pham'])) echo $_POST['id_san_pham']?>"/>
                    <input required type="file" multiple  name="sanpham_anhs[]">
                    <button name = "click">Thêm</button>
                    <?php
                        if(isset($_POST['click'])){
                           $id_san_pham = $_POST['id_san_pham'];
                           $sql = "select * from anh_san_pham where product_id = '$id_san_pham'";
                           $sq = mysqli_query($con, $sql);
                           $dem = mysqli_num_rows($sq);
                           if($dem <= 0){
                               echo "<br>Không có mã sản phẩm trên";
                           }
                           else{
                                if(isset($_FILES['sanpham_anhs'])){
                                    $files = $_FILES['sanpham_anhs'];
                                    $file_name = $files['name'];
                                    foreach($file_name as $key => $value){
                                        move_uploaded_file($files['tmp_name'][$key], "hinhanh_sanpham/".$value);
                                        $sql1 = "INSERT INTO anh_san_pham(product_id, ten_anh) VALUES('$id_san_pham', 'hinhanh_sanpham/$value')";
                                        $sq1 = mysqli_query($con, $sql1);
                                    }

                                }
                                if($sq1 == true){
                                    echo "<br>Thêm thành công <a href = 'anhsanpham_lists.php'>Xem</a>";
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
                        




