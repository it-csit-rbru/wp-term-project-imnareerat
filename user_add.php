<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>php-6015261016-w13</title>
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
                <div class="jumbotron" style="background-color: #3CB371;">
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
                    <h4>เพิ่มข้อมูลพนักงาน</h4>
                    <?php
                        if(isset($_GET['submit'])){
                            $usr_ttl_id = $_GET['usr_ttl_id'];
                            $usr_dpm_id = $_GET['usr_dpm_id'];
                            $usr_pst_id = $_GET['usr_pst_id'];
                            $usr_sid = $_GET['usr_sid'];
                            $usr_fname = $_GET['usr_fname'];
                            $usr_lname = $_GET['usr_lname'];
                            $usr_add = $_GET['usr_add'];
                            $usr_tel = $_GET['usr_tel'];
                            $usr_email = $_GET['usr_email'];
                            $sql = "insert into user";
                            $sql .= " values (null,'$usr_sid','$usr_fname','$usr_lname',' $usr_add',' $usr_tel',' $usr_email','$usr_ttl_id','$usr_dpm_id','$usr_pst_id')";
                            include 'connectdb.php';
                            mysqli_query($conn,$sql);
                            mysqli_close($conn);
                            echo "เพิ่มพนักงาน $usr_sid $usr_fname $usr_lname เรียบร้อยแล้ว<br>";
                            echo '<a href="user_list.php">แสดงรายชื่อพนักงานทั้งหมด</a>';
                        }else{
                    ?>
                    <form class="form-horizontal" role="form" name="user_add" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="form-group">
                            <label for="usr_sid" class="col-md-2 col-lg-2 control-label">รหัส</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="usr_sid" id="usr_sid" class="form-control">
                            </div>    
                        </div>    
                        <div class="form-group">
                            <label for="usr_ttl_id" class="col-md-2 col-lg-2 control-label">คำนำหน้าชื่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="usr_ttl_id" id="usr_ttl_id" class="form-control">
                                <?php
                                    include 'connectdb.php';
                                    $sql =  'SELECT * FROM title order by ttl_id';
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['ttl_id'] . '">';
                                        echo $row['ttl_name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    echo '</table>';
                                    mysqli_close($conn);
                                ?>
                                </select>
                           </div>    
                        </div>
                        
                        <div class="form-group">
                            <label for="usr_fname" class="col-md-2 col-lg-2 control-label">ชื่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="usr_fname" id="usr_fname" class="form-control">
                            </div>    
                        </div>    
                        <div class="form-group">
                            <label for="usr_lname" class="col-md-2 col-lg-2 control-label">นามสกุล</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="usr_lname" id="usr_lname" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="usr_add" class="col-md-2 col-lg-2 control-label">ที่อยู่</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="usr_add" id="usr_add" class="form-control">
                            </div>    
                        </div>    
                        <div class="form-group">
                            <label for="usr_tel" class="col-md-2 col-lg-2 control-label">เบอร์โทร</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="usr_tel" id="usr_tel" class="form-control">
                            </div>    
                        </div>    
                        <div class="form-group">
                            <label for="usr_email" class="col-md-2 col-lg-2 control-label">อีเมล์</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="usr_email" id="usr_email" class="form-control">
                            </div>    
                        </div>    
                       
                        <div class="form-group">
                        <label for="usr_dpm_id" class="col-md-2 col-lg-2 control-label">แผนก</label>
                            <div class="col-md-10 col-lg-10">
                                 <select name="usr_dpm_id" id="usr_dpm_id" class="form-control">
                                <?php
                                    include 'connectdb.php';
                                    $sql =  'SELECT * FROM department order by dpm_id';
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['dpm_id'] . '">';
                                        echo $row['dpm_name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    echo '</table>';
                                    mysqli_close($conn);
                                ?>
                                </select>
                            </div>    
                        </div> 

                        <div class="form-group">
                        <label for="usr_pst_id" class="col-md-2 col-lg-2 control-label">ตำแหน่ง</label>
                            <div class="col-md-10 col-lg-10">
                                 <select name="usr_pst_id" id="usr_pst_id" class="form-control">
                                <?php
                                    include 'connectdb.php';
                                    $sql =  'SELECT * FROM position order by pst_id';
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['pst_id'] . '">';
                                        echo $row['pst_name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    echo '</table>';
                                    mysqli_close($conn);
                                ?>
                                </select>
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