<?php
    session_start();

    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    
?>  
<?php
    include "../admin/header.php";
    include "../admin/left_side.php";
?>
 
 <div class="admin-content-right">
    <div class="admin-content-right-bg">
        <img src="icon/bg.png" alt="">
    </div>
 </div>
</section>

<section>
</section>
<script src="js/script.js"></script>
</body>
</html>  
<?php
    }
    else{
         header("location: login.php");
    }
?> 
            