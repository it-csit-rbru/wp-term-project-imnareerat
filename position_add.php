<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>termproject</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="bootstrap/js/html5shiv.min.js"></script>
            <script src="bootstrap/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>        
        <div class="container">
            <div class="row"> 
                <div class="jumbotron" style="background-color: #6B8E23;">
                    <?php include 'topbanner.php';?>
                </div>
            </div>
            <div class="row">
                <?php include 'menu.php';?>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <p>Login Area</p>
                </div>  
                <div class="col-sm-12 col-md-9 col-lg-9">
                <h4>เพิ่มข้อมูลตำแหน่ง</h4>    
                <?php
                    if(isset($_GET['submit'])){
                        $pst_name = $_GET['pst_name'];
                        $sql = "insert into position (pst_name) values ('$pst_name')";
                       
                        include 'connectdb.php';
                        if (mysqli_query($conn,$sql)){
                            echo "เพิ่มตำแหน่ง $pst_name เรียบร้อยแล้ว<br>";
                        }else{
                            echo "เพิ่มตำแหน่ง $pst_name ผิดพลาด<br>";
                        }
                            mysqli_close($conn);
                        echo '<a href="position_list.php">แสดงตำแหน่งทั้งหมด</a>';
                    }else{
                ?>
                    <form class="form-horizontal" role="form" name="position_add" action="<?php echo $_SERVER['PHP_SELF']?>">
                        <div class="form-group">
                            <label for="pst_name" class="col-md-2 col-lg-2 control-label">ตำแหน่ง</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="pst_name" id="pst_name" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-lg-10">
                                <input type="submit" name="submit" value="ตกลง" class="btn btn-default">
                            </div>    
                        </div>
                    </form>
                <?php
                    }
                ?>
                </div>    
            </div>
            <div class="row">
            <address>บริษัท NareeratI จำกัด(มหาชน)</address>
            </div>
        </div>    
    </body>
</html>