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
                <h1>Danh Sách Loại Sản Phẩm</h1>
                <form action = "" method = "post">
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>Id_loại</th>
                            <th>Tên_danh_muc</th>
                            <th>Tên_loại</th>
                            <th>Cập Nhập</th>
                        </tr>
                        <?php
                            $con = mysqli_connect($servername, $username, $password, $database) or die("kết nối thất bại");
                            $sql = "select * from danh_muc, loai_san_pham where danh_muc.id_danh_muc = loai_san_pham.id_danh_muc";
                            $sq = mysqli_query($con, $sql);
                            $i = 0;
                            while($row = mysqli_fetch_assoc($sq)){
                                $i++;

                        ?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $row['id_loai']?></td>
                            <td><?php echo $row['name_danh_muc']?></td>
                            <td><?php echo $row['ten_loai']?></td>
                            <td><a href = "edit_brand.php?id_loai=<?php echo $row['id_loai']?>">Sửa || </a><a  href = "delete_brand.php?id_loai=<?php echo $row['id_loai']?>">Xóa</a></td>
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
                        




