<?php
    include "../admin/header.php";
    include "../admin/left_side.php";
?>
<style>
    table{
        width: 100%;
        margin-top: 10px;
        text-align: center;
        border-collapse: collapse;
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
                <h1>Danh Sách Màu Sắc</h1>
                <form action = "" method = "post">
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>Id_màu</th>
                            <th>Tên_màu</th>
                            <th>Ảnh_màu</th>
                            <th>Cập Nhập</th>
                        </tr>
                        <?php
                            $con = mysqli_connect($servername, $username, $password, $database) or die("kết nối thất bại");
                            $sql = "select * from mau_sac";
                            $sq = mysqli_query($con, $sql);
                            $i = 0;
                            while($row = mysqli_fetch_assoc($sq)){
                                $i++;

                        ?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $row['id_mau']?></td>
                            <td><?php echo $row['ten_mau']?></td>
                            <td>
                                <img src = "<?php echo $row['anh_mau']?>">
                            </td>
                            <td><a href = "edit_color.php?id_mau=<?php echo $row['id_mau']?>">Sửa || </a><a  href = "delete_mau.php?id_mau=<?php echo $row['id_mau']?>">Xóa</a></td>
                        <?php
                            }
                        ?>
                        </tr>
                    </table>

                </form>
            </div>
         </div>
     </section>
     <section>
     </section>
     <script src="js/script.js"></script>
 </body>
 </html>  
                        




