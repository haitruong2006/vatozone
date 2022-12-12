<?php
    if(isset($_GET['id_danh_muc'])){
        $id_danh_muc = $_GET['id_danh_muc'];
        $con = mysqli_connect("localhost", "root", "", "website_demo") or die("kết nối thất bại");
        $sql = "delete from danh_muc where id_danh_muc = '$id_danh_muc'";
        $sq = mysqli_query($con, $sql);
        if($sq == true){
            header("location: cartegory_list.php");
        }
        else{
            echo "xóa thất bại";
        }
    }
?>