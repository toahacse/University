<?php


 $conntect = mysqli_connect("localhost", "root", "", "universitym");
 $mass=" ";
  if(isset($_POST["add"])){

    if(!empty($_POST["brand"])) {
        $brand=$_POST["brand"];
        $sql = "INSERT INTO brand (brand_name)
        SELECT '.$brand.' FROM brand
        WHERE NOT EXIST(SELECT brand_name FROM brand WHERE brand_name='.$brand.') LIMIT 1";
        if(mysqli_query($conntect, $sql)) {
            $insert_id = mysqli_insert_id($conntect);
            if ($insert_id != '') {
                header("location:data_already_inserted.php?inserted=1");
            } else {
                header("location:data_already_inserted.php?already=1");

            }
        }
    }

    else{
        header("location:data_already_inserted.php?required=1");
    }
}
    if(isset($_GET["inserted"])){
    $mass="Brand Inserted";
    }

    if(isset($_GET["already"])){
    $mass="Brand Already Inserted";
    }

    if(isset($_GET["required"])){
    $mass = "Brand Name Requiered";
}

?>

<html>
<head>
    <title></title>
    <link href="style.css" rel="stylesheet" />
    <link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">
    <script src="assests/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
    <script src="assests/jquery-ui/jquery-ui.min.js"></script>
    <script src="assests/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div class="jumbotron">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <label class="text-danger">
                <?php
                if($mass != "")
                {
                    echo $mass;
                }
                ?>
            </label>
            <form action="" method="post">
    <input type="text" name="brand" class="form-control" placeholder="Input Data" />
    <input type="submit" name="add" class="btn btn-info btn-block" value="Save"/>

            </form>
    </div>
</div>
</div>
</div>
</body>
</html>
