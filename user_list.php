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
                    <h4>แสดงรายชื่อนักศึกษา</h4>
                    <a href="user_add.php" class="btn btn-link">เพิ่มข้อมูลพนักงาน</a>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>รหัสพนักงาน</th>
                                    <th >ชื่อ-สกุล</th>
                                    <th >ที่อยู่</th>
                                    <th >เบอร์โทร</th>
                                    <th >อีเมล์</th>
                                    <th >แผนก</th>
                                    <th colspan="2">ตำแหน่ง</th>
                                </tr>
                            </thead>
                            <tbody>
                    <?php
                        include 'connectdb.php';                        
                        $sql =  'SELECT * FROM  user_detaill order by usr_id';
                        $result = mysqli_query($conn,$sql);
                        while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                            echo '<tr>';
                            echo '<td>' . $row['usr_id'] . '</td>';
                            echo '<td>' . $row['usr_sid'] . '</td>';
                            echo '<td>' . $row['ttl_name'] .' '.$row['usr_fname']
                                    .' '.$row['usr_lname'].'</td>';
                             echo '<td>' . $row['usr_add'] . '</td>'; 
                             echo '<td>' . $row['usr_tel'] . '</td>';
                             echo '<td>' . $row['usr_email'] . '</td>';       
                            echo '<td>' . $row['dpm_name'] . '</td>';
                            echo '<td>' . $row['pst_name'] . '</td>';
                            echo '<td>';
                            ?>
                                <a href="user_edit.php?usr_id=<?php echo $row['usr_id'];?>" class="btn btn-warning">แก้ไข</a>
                                <a href="JavaScript:if(confirm('ยืนยันการลบ')==true)
                                   {window.location='user_delete.php?usr_id=<?php echo $row["usr_id"];?>'}" class="btn btn-danger">ลบ</a>
                            <?php
                                    echo '</td>';                            
                            echo '</tr>';
                        }
                        mysqli_free_result($result);
                        echo '</table>';
                        mysqli_close($conn);
                    ?>
                            </tbody>
                        </table>    
                </div>    
            </div>
            <div class="row">
            <address>บริษัท NareeratI จำกัด(มหาชน)</address>
            </div>
        </div>    
    </body>
</html>