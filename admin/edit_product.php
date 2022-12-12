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
    if(isset($_GET['id_san_pham'])){
        $id_danh_muc = $_GET['id_san_pham'];
        $pro = mysqli_query($con, "select * from san_pham where product_id = '$id_danh_muc'");
        $data = mysqli_fetch_assoc($pro);

        $img_pro = mysqli_query($con, "select * from anh_san_pham where product_id = '$id_danh_muc'");
    }
?>
 <div class="admin-content-right">
            <div class="product-add-content">
              
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Tên sản phẩm<span style="color: red;">*</span></label> <br>
                    <input required type="text" name="sanpham_tieude" value = "<?php echo $data['product_tieu_de']?>"> <br>
                  
                    <label for="">Mã sản phẩm<span style="color: red;">*</span></label> <br>
                    <input required readonly ='true' type="text" name="sanpham_ma" value = "<?php echo $data['product_ma']?>"> <br>  
                         
                    <label for="">Chọn danh mục<span style="color: red;">*</span></label> <br>
                    <select required="required" name="danhmuc_id" id="danhmuc_id">
                        <option>--chọn--</option>
                        <?php
                            $cartegory = mysqli_query($con, "select * from danh_muc");
                            foreach($cartegory as $key => $value){ ?>
                            <option value = "<?php echo $value['id_danh_muc']?>" <?php echo (($value['id_danh_muc'] == $data['id_danh_muc']) ? 'selected' : '')?> >
                            <?php echo $value['name_danh_muc']?> </option>
                        <?php
                            }
                        ?>              
                    </select>
                    <label for="">Chọn Loại sản phẩm<span style="color: red;">*</span></label> <br>
                    <select required="required" name="loaisanpham_id" id="loaisanpham_id">
                        <option>--chọn--</option>
                        <?php
                            $cartegory = mysqli_query($con, "select * from loai_san_pham");
                            foreach($cartegory as $key => $value){ ?>
                            <option value = "<?php echo $value['id_loai']?>" <?php echo (($value['id_loai'] == $data['id_loai']) ? 'selected' : '')?> >
                            <?php echo $value['ten_loai']?> </option>
                        <?php
                            }
                        ?>     
                    </select>
                    <label for="">Chọn Màu sản phẩm<span style="color: red;">*</span></label> <br>
                    <select required="required" name="color_id" id="">
                    <option>--chọn--</option>
                        <?php
                            $cartegory = mysqli_query($con, "select * from mau_sac");
                            foreach($cartegory as $key => $value){ ?>
                            <option value = "<?php echo $value['id_mau']?>" <?php echo (($value['id_mau'] == $data['id_color']) ? 'selected' : '')?> >
                            <?php echo $value['ten_mau']?> </option>
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
                    <input required type="text" name="sanpham_gia" value = "<?php echo $data['gia_san_pham']?>"> <br>  
                    <label for="">Chi tiết<span style="color: red;">*</span></label> <br>
                    <textarea class="ckeditor"  required name="sanpham_chitiet" cols="60" rows="5 " ><?php echo $data['chi_tiet_san_pham']?></textarea><br>  
                    <label  for="">Bảo quản<span style="color: red;">*</span></label> <br>
                    <textarea class="ckeditor" required name="sanpham_baoquan" cols="60" rows="5"><?php echo $data['bao_qun_san_pham']?></textarea><br> 
                    <label for="">Ảnh đại diện<span style="color: red;">*</span></label> <br>
                        <img src = "<?php echo $data['anh_san_pham']?>" width = 100px><br>
                    <input required type="file" name="sanpham_anh"> <br>
                         
                    <label for="">Ảnh Sản phẩm<span style="color: red;">*</span></label> <br>
                    <div class="row">
                            <?php foreach($img_pro as $key => $values){?>
                                <div class="col-md-4">
                                    <a href = "">
                                       <img src = "<?php echo $values['ten_anh']?>" width = 10px>
                                    </a>
                                </div>
                            <?php
                            }
                            ?>
                        </div> <br>
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
                            $files = $_FILES['sanpham_anhs'];
                            $ten_anhs = $files['name'];
                            
                        }
                    ?>
                </form>
            </div>           
        </div>
    </section>
    <script src="js/script.js"></script>
</body>
</html>  