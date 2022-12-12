<?php
    if(isset($_GET['id_size'])){
        $id_size = $_GET['id_size'];
        $con = mysqli_connect("localhost", "root", "", "website_demo") or die("kết nối thất bại");
        $sql = "delete from size where id_size = '$id_size'";
        $sq = mysqli_query($con, $sql);
        if($sq == true){
            header("location: sizesanpham_lists.php");
        }
        else{
            echo "xóa thất bại";
        }
    }
?>