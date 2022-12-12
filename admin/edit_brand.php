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
                <h1>Thêm Loại Sản Phẩm</h1>
                <form action = "" method = "post">
                    <lable>Vui Lòng Chọn Danh Mục<span style = "color: red">*</span></lable><br>
                    <select name = "name_danh_muc">
                        <?php
                
                                $con = mysqli_connect("localhost", "root", "", "website_demo") or die("kết nối thất bại");
                                $sql = "select * from danh_muc";
                                $sq = mysqli_query($con, $sql);
                                while($row = mysqli_fetch_assoc($sq)){
                           
                           

                        ?>
                        <option value = "<?php echo $row['id_danh_muc']?>"> 
                            <?php
                                    echo $row['id_danh_muc']." ".$row['name_danh_muc'];  
                            ?>
                        </option>
                        <?php
                                }
                        ?>
                    </select><br>
                    <lable>Nhập Tên Loại Sản Phẩm Sửa<span style = "color: red">*</span></lable>
                    <?php
                        $con = mysqli_connect("localhost", "root", "", "website_demo") or die("kết nối thất bại");
                        if(isset($_GET['id_loai'])){
                            $id_loai = $_GET['id_loai'];
                            $sql = "select * from loai_san_pham where id_loai = '$id_loai'";
                            $sq = mysqli_query($con, $sql);
                            $rows = mysqli_fetch_assoc($sq);
                        }
                      
                    ?>
                    <input name = "brand_name" type = "text"  value = "<?php echo $rows['ten_loai']?>"/>
                    <button name = "click">Thêm</button>
                    <?php
                        if(isset($_POST['click'])){
                            $name_danh_muc = $_POST['name_danh_muc'];
                            $brand_name = $_POST['brand_name'];
                            $con = mysqli_connect("localhost", "root", "", "website_demo") or die("kết nối thất bại");
                            $sql = "update loai_san_pham set id_danh_muc = '$name_danh_muc', ten_loai = '$brand_name' where id_loai = '$id_loai'";
                            $sq = mysqli_query($con, $sql);
                            if($sq == true){
                                echo "<br>";
                                echo "<br>Sửa Thành Công Xem <a href = 'brand_list.php'>tại đây</a>";
                            }
                            else{
                                echo "Sửa Thất Bại";
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
                        




