<?php
    if(isset($_GET['id_san_pham'])){
        $id_san_pham = $_GET['id_san_pham'];
        $con = mysqli_connect("localhost", "root", "", "website_demo") or die("kết nối thất bại");
        $sql = "delete from san_pham where product_id = '$id_san_pham'";
        $sq = mysqli_query($con, $sql);
        if($sq == true){
            header("location: product_list.php");
        }
        else{
            echo "xóa thất bại";
        }
    }
?>