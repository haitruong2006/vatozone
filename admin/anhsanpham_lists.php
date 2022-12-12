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
                <h1>Danh Sách Ảnh Sản Phẩm</h1>
                <form action = "" method = "post">
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>Id_sản_phẩm</th>
                            <th>Ảnh_mô_tả</th>
                            <th>Cập_nhập</th>
                        </tr>
                        <?php
                            $con = mysqli_connect($servername, $username, $password, $database) or die("kết nối thất bại");
                            $sql = "select * from san_pham, anh_san_pham
                                where anh_san_pham.product_id = san_pham.product_id ";
                            $sq = mysqli_query($con, $sql);
                            $i = 0;
                            while($row = mysqli_fetch_assoc($sq)){
                                $i++;

                        ?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $row['product_id']?></td>
                            <td>
                                <img src = "<?php echo $row['ten_anh']?>" width = 100px>
                            </td>
                            <td>
                                <a href = 'edit_anhsanpham.php?id_anh_san_pham=<?php echo $row['id_anh_san_pham']?>'>Sửa || </a> <a href = "delete_anhsanpham.php?stt=<?php echo $row['id_anh_san_pham']?>">Xóa</a>
                            </td>
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
                        




