<?php
include "header.php";
include "left_side.php";
?>
<style>
    button{
        height: 35px;
        width: 150px;
        cursor: pointer;
        transition: all 0.3s ease;
        outline: none;
        border: 1px solid #58257B;
    }
    button:hover{
        background-color: tomato;
        color: #fff;
        border: none;
    }
</style>
<?php
    $con = mysqli_connect("localhost", "root", "", "website_demo") or die("kết nối thất bại");
    $cartegory = mysqli_query($con, "select * from danh_muc");
    $brand = mysqli_query($con, "select * from loai_san_pham");
    $mau_sac = mysqli_query($con, "select * from mau_sac");
?>
 <div class="admin-content-right">
            <div class="product-add-content">
              
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Tên sản phẩm<span style="color: red;">*</span></label> <br>
                    <input required type="text" name="sanpham_tieude"> <br>
                    <label for="">Mã sản phẩm<span style="color: red;">*</span></label> <br>
                    <input required type="text" name="sanpham_ma"> <br>               
                    <label for="">Chọn danh mục<span style="color: red;">*</span></label> <br>
                    <select required="required" name="danhmuc_id" id="danhmuc_id">
                        <option>--chọn--</option>
                        <?php
                            
                            foreach($cartegory as $key => $value){
                        ?>
                            <option value = "<?php echo $value['id_danh_muc']?>"><?php echo $value['name_danh_muc']?></option>
                        <?php
                            }
                        ?>               
                    </select>
                    <label for="">Chọn Loại sản phẩm<span style="color: red;">*</span></label> <br>
                    <select required="required" name="loaisanpham_id" id="loaisanpham_id">
                        <?php
                           
                            foreach($brand as $key => $values){
                        ?>
                            <option value = "<?php echo $values['id_loai']?>" <?php echo (($value['id_danh_muc'] == $values['id_danh_muc']) ? 'selected' : '')?> > <?php echo $values['ten_loai']?></option>
                        <?php
                            }
                        ?>  
                    </select>
                    <label for="">Chọn Màu sản phẩm<span style="color: red;">*</span></label> <br>
                    <select required="required" name="color_id" id="">
                        <?php
                               foreach($mau_sac as $key => $valuess){
                        ?>           
                        <option value = "<?php echo $valuess['id_mau']?>">
                                <?php echo $valuess['ten_mau']?>
                        </option>
                        <?php
                        }
                        ?>                    
                    </select>
                    <label for="">Chọn Size sản phẩm<span style="color: red;">*</span></label> <br>
                    <div class="sanpham-size">
                    <p>S</p>    <input type="checkbox" name="sanpham-size[]" value="S"> 
                    <p>M</p>    <input type="checkbox" name="sanpham-size[]" value="M"> 
                    <p>L</p>    <input type="checkbox" name="sanpham-size[]" value="L">
                    <p>XL</p>   <input type="checkbox" name="sanpham-size[]" value="XL">  
                    <p>XXL</p>  <input type="checkbox" name="sanpham-size[]" value="XXL">  
                    </div>
                    <label for="">Giá sản phẩm<span style="color: red;">*</span></label> <br>
                    <input required type="text" name="sanpham_gia"> <br>  
                    <label for="">Chi tiết<span style="color: red;">*</span></label> <br>
                    <textarea class="ckeditor"  required name="sanpham_chitiet" cols="60" rows="5"></textarea><br>  
                    <label  for="">Bảo quản<span style="color: red;">*</span></label> <br>
                    <textarea class="ckeditor" required name="sanpham_baoquan" cols="60" rows="5"></textarea><br> 
                    <label for="">Ảnh đại diện<span style="color: red;">*</span></label> <br>
                    <input required type="file" name="sanpham_anh"> <br>   
                    <label for="">Ảnh Sản phẩm<span style="color: red;">*</span></label> <br>
                    <input required type="file" multiple  name="sanpham_anhs[]"> <br>   
                    <button name="click">Gửi</button>  
                    <?php
                        if(isset($_POST['click'])){
                            $sanpham_tieude = $_POST['sanpham_tieude'];
                            $anpham_ma = $_POST['sanpham_ma'];
                            $danhmuc_id = $_POST['danhmuc_id'];
                            $loaisanpham_id = $_POST['loaisanpham_id'];
                            $color_id = $_POST['color_id'];
                            $sanpham_gia = $_POST['sanpham_gia'];
                            $sanpham_chitiet = $_POST['sanpham_chitiet'];
                            $sanpham_baoquan = $_POST['sanpham_baoquan'];
                            $file = $_FILES['sanpham_anh'];
                            $ten_anh = $file['name'];
                            $sql = "INSERT INTO san_pham(product_tieu_de, product_ma, id_danh_muc, id_loai, id_color, gia_san_pham, 
                            chi_tiet_san_pham, bao_qun_san_pham, anh_san_pham) 
                            VALUES ('$sanpham_tieude', '$anpham_ma', '$danhmuc_id', '$loaisanpham_id', '$color_id', '$sanpham_gia', '$sanpham_chitiet',
                            '$sanpham_baoquan', 'hinhanh_sanpham/$ten_anh')";
                            $sq = mysqli_query($con, $sql);
                            $id_san_pham = mysqli_insert_id($con);
                            if(isset($_FILES['sanpham_anhs'])){
                                $files = $_FILES['sanpham_anhs'];
                                $file_name = $files['name'];
                                foreach($file_name as $key => $value){
                                   move_uploaded_file($files['tmp_name'][$key], "hinhanh_sanpham/".$value);
                                   $sql1 = "INSERT INTO anh_san_pham(product_id, ten_anh) VALUES('$id_san_pham', 'hinhanh_sanpham/$value')";
                                   $sq1 = mysqli_query($con, $sql1);
                                }

                            }
                            if(isset($_POST['sanpham-size'])){
                                $sanpham_size = $_POST['sanpham-size'];
                                foreach($sanpham_size as $key => $values){
                                    $sql2 = "INSERT INTO size(product_id, ten_size) VALUES('$id_san_pham', '$values')";
                                    $sq2 = mysqli_query($con, $sql2);
                                }
                                
                             }
                           
                            if($sq == true && $sq1 == true && $sq2 == true){
                                move_uploaded_file($file['tmp_name'], "hinhanh_sanpham/".$ten_anh);
                              
                                echo "<br>Thêm thành công";
                            }
                            else{
                                echo "<br>Thêm thất bại";
                            }

                        }
                    ?>
                </form>
            </div>           
        </div>
    </section>
    <script src="js/script.js"></script>
</body>
</html>  