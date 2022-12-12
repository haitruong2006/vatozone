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
                <h1>Danh Sách Size Sản Phẩm</h1>
                <form action = "" method = "post">
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>Id_sản_phẩm</th>
                            <th>Size</th>
                            <th>Cập_nhập</th>
                        </tr>
                        <?php
                            $con = mysqli_connect($servername, $username, $password, $database) or die("kết nối thất bại");
                            $sql = "select * from size, san_pham where size.product_id = san_pham.product_id";
                            $sq = mysqli_query($con, $sql);
                            $i = 0;
                            while($row = mysqli_fetch_assoc($sq)){
                                $i++
                        ?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $row['product_id']?></td>
                            <td><?php echo $row['ten_size']?></td>
                            <td>
                                <a href = "edit_size.php?id_size=<?php echo $row['id_size']?>">Sửa || </a> <a href = "delete_size.php?id_size=<?php echo $row['id_size']?>">Xóa</a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
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
                        




