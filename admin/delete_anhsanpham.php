<?php
    if(isset($_GET['stt'])){
        $stt = $_GET['stt'];
        $con = mysqli_connect("localhost", "root", "", "website_demo") or die("kết nối thất bại");
        $sql = "delete from anh_san_pham where id_anh_san_pham = '$stt'";
        $sq = mysqli_query($con, $sql);
        if($sq == true){
            header("location: anhsanpham_lists.php");
        }
        else{
            echo "xóa thất bại";
        }
    }
?>