<?php
    if(isset($_GET['id_mau'])){
        $id_mau = $_GET['id_mau'];
        $con = mysqli_connect("localhost", "root", "", "website_demo") or die("kết nối thất bại");
        $sql = "delete from mau_sac where id_mau = '$id_mau'";
        $sq = mysqli_query($con, $sql);
        if($sq == true){
            header("location: color_list.php");
        }
        else{
            echo "xóa thất bại";
        }
    }
?>