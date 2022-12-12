<?php
    if(isset($_GET['id_loai'])){
        $id_loai = $_GET['id_loai'];
        $con = mysqli_connect("localhost", "root", "", "website_demo") or die("kết nối thất bại");
        $sql = "delete from loai_san_pham where id_loai = '$id_loai'";
        $sq = mysqli_query($con, $sql);
        if($sq == true){
            header("location: brand_list.php");
        }
        else{
            echo "xóa thất bại";
        }
    }
?>