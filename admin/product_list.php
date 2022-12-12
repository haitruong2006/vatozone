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
                <h1>Danh Sách Sản Phẩm</h1>
                <form action = "" method = "post">
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>Id_SP</th>
                            <th>Tiêu_đề</th>
                            <th>Mã</th>
                            <th>danh_mục</th>
                            <th>loại</th>
                            <th>Giá</th>
                            <th>Size</th>
                            <th>Chi_tiết</th>
                            <th>Ảnh_sản_phẩm</th>
                            <th>Ảnh_mô_tả</th>
                            <th>Cập Nhập</th>
                        </tr>
                        <?php
                            $con = mysqli_connect($servername, $username, $password, $database) or die("kết nối thất bại");
                            $sql = "select * from san_pham, danh_muc, loai_san_pham
                                where danh_muc.id_danh_muc = san_pham.id_danh_muc &&  loai_san_pham.id_loai  = san_pham.id_loai";
                            $sq = mysqli_query($con, $sql);
                            $i = 0;
                            while($row = mysqli_fetch_assoc($sq)){
                                $i++;

                        ?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $row['product_id']?></td>
                            <td><?php echo $row['product_tieu_de']?></td>
                            <td><?php echo $row['product_ma']?></td>
                            <td><?php echo $row['name_danh_muc']?></td>
                            <td><?php echo $row['ten_loai']?></td>
                            <td><?php echo $row['gia_san_pham']?></td>
                            <td><a href = 'sizesanpham_lists.php'>Xem</a></td>
                            <td><?php echo $row['chi_tiet_san_pham']?></td>
                            <td>
                                <img src = "<?php echo $row['anh_san_pham']?>" width = 70px>
                            </td>
                            <td>
                                <a href = 'anhsanpham_lists.php'>Xem</a>
                            </td>
                            <td>
                                <a href = 'edit_product.php?id_san_pham=<?php echo $row['product_id']?>'>Sửa ||</a><a href = 'xoa_product.php?id_san_pham=<?php echo $row['product_id']?>'> Xóa</a> 
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
                        




