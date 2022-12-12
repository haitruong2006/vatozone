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
                    <lable>Vui Lòng Nhập Loại Sản Phẩm<span style = "color: red">*</span></lable>
                    <input name = "brand_name" type = "text"  value = "<?php if(isset($_POST['cartegory_name'])) echo $_POST['cartegory_name']?>"/>
                    <button name = "click">Thêm</button>
                    <?php
                        if(isset($_POST['click'])){
                            $brand_name = $_POST['brand_name'];
                            $id_danh_muc =  $_POST['name_danh_muc'];
                            $sql = "INSERT INTO loai_san_pham (id_danh_muc,ten_loai) VALUES ('$id_danh_muc','$brand_name')";
                            if(mysqli_query($con, $sql)){

                                echo "<br>Thêm thành công xem <a href = 'brand_list.php'>tại đây</a>";
                            }
                            else{
                                echo "<br>Thêm Thất Bại";
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
                        




