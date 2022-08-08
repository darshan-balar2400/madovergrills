<?php
    include "../conn.php";

    if(isset($_GET["table_no"])){
        $sql = "select * from tables where table_no = ".$_GET['table_no'];
        $result = mysqli_query($conn,$sql);

        while($row = mysqli_fetch_array($result)){
            $table_no = $row[0];
            $total_chairs = $row[1];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="Admin_.css" rel="stylesheet">
    <title>Admin Panel</title>
</head>
<?php
    if(isset($_POST['updatebtn'])){
        $table_no = $_POST['table_no'];
        $total_chairs = $_POST['total_chairs'];
        

        $sql = "update tables set total_chairs = $total_chairs, table_no = $table_no  where table_no = ".$table_no;
        if(mysqli_query($conn,$sql)){
            header("Location:tables.php");
        }
    }
?>
<body>
    <div class="admin_container">
        <div class="admin_content">
            <?php include "menu.php" ?>
            <div class="admin_body">
                <div class="admin_body_content">
                    <div class="top mb-5">
                        <a href="tables.php" style="color:#EC3F22;">BACk to tables</a>
                    </div>
                    <form action="" method="POST" autocomplete="false" id="updateForm" enctype="multipart/form-data">
                         <!-- item id -->
                         <div class="input">
                            <p>table no</p>
                            <input type="text" value="<?php echo $table_no; ?>" name="table_no" id="table_no" required>
                        </div>
                        <!-- item name -->
                        <div class="input">
                            <p>total chairs</p>
                            <input type="text" value="<?php echo $total_chairs; ?>" name="total_chairs" id="total_chairs" required>
                        </div>
                        
                    </form>
                    <button type="submit" class="button mt-4" name="updatebtn" form="updateForm">Update</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>