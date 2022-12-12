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
    $con = mysqli_connect("localhost", "root", "", "website_demo") or die("kết nối thất bại");
?>
        <div class="admin-content-right">
            <div class="cartegory-content-right-bg">
                <h1>Danh Sách Danh Mục</h1>
                <form action = "" method = "post">
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>Id_danh_muc</th>
                            <th>Tên_danh_muc</th>
                            <th>Cập Nhập</th>
                        </tr>
                        <?php
                            $con = mysqli_connect("localhost", "root", "", "website_demo") or die("kết nối thất bại");
                            $sql = "select * from danh_muc";
                            $sq = mysqli_query($con, $sql);
                            $i = 0;
                            while($row = mysqli_fetch_assoc($sq)){
                                $i++;

                        ?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $row['id_danh_muc']?></td>
                            <td><?php echo $row['name_danh_muc']?></td>
                            <td><a href = "edit_cartegory.php?id_danh_muc=<?php echo $row['id_danh_muc']?>">Sửa || </a><a  href = "delete_cartegory.php?id_danh_muc=<?php echo $row['id_danh_muc']?>">Xóa</a></td>
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
                        




