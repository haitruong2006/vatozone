<?php
    include "../admin/header.php";
    include "../admin/left_side.php";
?>
<?php
    if(isset($_GET['id_danh_muc'])){
        $id = $_GET['id_danh_muc'];
        $con = mysqli_connect("localhost", "root", "", "website_demo") or die("kết nối thất bại");
        $sql = "select * from danh_muc where id_danh_muc = '$id'";
        $qr = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($qr);
    } 
?>
        <div class="admin-content-right">
            <div class="cartegory-content-right-bg">
                <h1>Sửa Danh Mục</h1>
                <form action = "" method = "post">
                    <input name = "cartegory_name" type = "text" value = "<?php echo $row['name_danh_muc']?>"/>
                    <button name = "click">Cập Nhập</button>
                    <?php
                        if(isset($_POST['click'])){
                            $cartegory_name = $_POST['cartegory_name'];
                            $sql = "update danh_muc set name_danh_muc = '$cartegory_name' where id_danh_muc = '$id'";
                            $qr = mysqli_query($con, $sql);
                            if($qr == true){
                                echo "<br>";
                                echo "<br>update thành công xem <a href = 'cartegory_list.php'>Tại Đây</a>";
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
                        




