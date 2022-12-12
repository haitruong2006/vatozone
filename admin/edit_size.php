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
                <h1>Cập Nhập Size Sản Phẩm</h1>
                <form action = "" method = "post" enctype="multipart/form-data">
                    <?php
                        if(isset($_GET['id_size'])){
                            $id_size = $_GET['id_size'];
                        }
                        $sql = "select * from size where id_size = '$id_size'";
                        $sq = mysqli_query($con, $sql);
                        while($row = mysqli_fetch_assoc($sq)){
                    ?>
                    <input readonly = 'true' ype = "text" name = "id_san_pham" value = "<?php echo $row['product_id']?>"/>
                    <input required type="text" name="size" value = "<?php echo $row['ten_size']?>" />
                    <?php
                        }
                    ?>
                    <button name = "click">Thêm</button>
                    <?php
                        if(isset($_POST['click'])){
                           $id_san_pham = $_POST['id_san_pham'];
                           $size = $_POST['size'];
                           if($size != ''){
                                $sql = "update size set  product_id = '$id_san_pham', ten_size = '$size' where id_size = '$id_size'" or die("truy vấn sai");
                                $kiem_tra_sql = mysqli_query($con, $sql);
                                if($kiem_tra_sql == true){  
                                    echo "<br>cập nhập thành công xem <a href = 'sizesanpham_lists.php'>TẠI ĐÂY</a>";
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
                        




