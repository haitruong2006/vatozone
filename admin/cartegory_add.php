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
                <h1>Thêm Danh Mục</h1>
                <form action = "" method = "post">
                    <input name = "cartegory_name" type = "text" placeholder="nhập tên danh mục" value = "<?php if(isset($_POST['cartegory_name'])) echo $_POST['cartegory_name']?>"/>
                    <button name = "click">Thêm</button>
                    <?php
                        if(isset($_POST['click'])){
                            $cartegory_name = $_POST['cartegory_name'];
                            $sql = "INSERT INTO danh_muc (name_danh_muc) VALUES ('$cartegory_name')";
                            if(mysqli_query($con, $sql)){

                                echo "<br>Thêm thành công";
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
                        




