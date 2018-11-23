<?php

try{
    $con = new PDO ("mysql:host=localhost;dbname=tuts","root","");
    if(isset($_POST['value'])){
        $value= $_POST['value'];
        $con = new PDO ("mysql:host=localhost;dbname=universitym","root","");
        $select=$con->prepare("SELECT * FROM saveteacher WHERE TeacherDpt='$value'");
        $select->setFetchMode(PDO::FETCH_ASSOC);
        $select->execute();
        ?>
        <option>Select</option>
        <?php while($p=$select->fetch()){?>
            <option><?php echo $p['TeacherName']?></option>
<?php
        }
        }
    }
catch(PDOException $e)
                {echo "error" . $e->getMessage();
                }


if(isset($_POST['value1'])) {
    $db=mysqli_connect("localhost","root","","universitym");
    $value = $_POST['value1'];
        $con = new PDO ("mysql:host=localhost;dbname=universitym","root","");
        $select=$con->prepare("SELECT * FROM saveteacher WHERE TeacherName='$value'");
        $select->setFetchMode(PDO::FETCH_ASSOC);
        $select->execute();
        while($p=$select->fetch()){?>
            <input type="text" name="token" value="<?php echo $p['Credit']?>"/>
            <?php
        }
    }



try{
    $con = new PDO ("mysql:host=localhost;dbname=tuts","root","");
    if(isset($_POST['value4'])){
        $value= $_POST['value4'];
        $con = new PDO ("mysql:host=localhost;dbname=universitym","root","");
        $select=$con->prepare("SELECT * FROM savecourse WHERE saveCourseCode ='$value'");
        $select->setFetchMode(PDO::FETCH_ASSOC);
        $select->execute();
        while($p=$select->fetch()){?>
            <input type="text" name="name"  value="<?php echo $p['saveDptName']?>"/>
            <?php
        }
    }
}
catch(PDOException $e)
{echo "error" . $e->getMessage();
}

try{
    $con = new PDO ("mysql:host=localhost;dbname=tuts","root","");
    if(isset($_POST['value5'])){
        $value= $_POST['value5'];
        $con = new PDO ("mysql:host=localhost;dbname=universitym","root","");
        $select=$con->prepare("SELECT * FROM savecourse WHERE saveCourseCode ='$value'");
        $select->setFetchMode(PDO::FETCH_ASSOC);
        $select->execute();
        while($p=$select->fetch()){?>
            <input type="text" name="credit"  value="<?php echo $p['saveDptcredit']?>"/>
            <?php
        }
    }
}
catch(PDOException $e)
{echo "error" . $e->getMessage();
}
                ?>


<?php
try{

    $con = new PDO ("mysql:host=localhost;dbname=universitym","root","");
if(isset($_POST['value3'])){
    $value= $_POST['value3'];
    $select=$con->prepare("SELECT * FROM savecourse WHERE dpt='$value'");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();

    ?>
    <option>Select</option>
    <?php while($p=$select->fetch()){?>
        <option value="<?php echo $p['saveCourseCode']?>"><?php echo $p['saveCourseCode']?></option>

    <?php }
}
}
catch(PDOException $e)
{echo "error" . $e->getMessage();
}


try{

    $con = new PDO ("mysql:host=localhost;dbname=universitym","root","");
    if(isset($_POST['value8'])){
        $value= $_POST['value8'];
        $select=$con->prepare("SELECT * FROM regstudent WHERE reg='$value'");
        $select->setFetchMode(PDO::FETCH_ASSOC);
        $select->execute();
         while($p=$select->fetch()){?>
            <input type="text" name="studentName"  value="<?php echo $p['studentName']?>"/>
        <?php }
    }
}
catch(PDOException $e)
{echo "error" . $e->getMessage();
}

try{

    $con = new PDO ("mysql:host=localhost;dbname=universitym","root","");
    if(isset($_POST['value9'])){
        $value= $_POST['value9'];
        $select=$con->prepare("SELECT * FROM regstudent WHERE reg='$value'");
        $select->setFetchMode(PDO::FETCH_ASSOC);
        $select->execute();
         while($p=$select->fetch()){?>
            <input type="text" name="email"  value="<?php echo $p['email']?>"/>
        <?php }
    }
}
catch(PDOException $e)
{echo "error" . $e->getMessage();
}
try{

    $con = new PDO ("mysql:host=localhost;dbname=universitym","root","");
    if(isset($_POST['value10'])){
        $value= $_POST['value10'];
        $select=$con->prepare("SELECT * FROM regstudent WHERE reg='$value'");
        $select->setFetchMode(PDO::FETCH_ASSOC);
        $select->execute();
         while($p=$select->fetch()){?>
            <input type="text" name="department"  value="<?php echo $p['department']?>"/>
        <?php }
    }
}
catch(PDOException $e)
{echo "error" . $e->getMessage();
}



try{

    $con = new PDO ("mysql:host=localhost;dbname=universitym","root","");
    if(isset($_POST['value11'])){
        $db=mysqli_connect("localhost","root","","universitym");
        $value= $_POST['value11'];

        $sql = "SELECT * FROM regstudent WHERE reg='$value'";
        $res = mysqli_query($db, $sql);
        while ($res=mysqli_fetch_array($res)){
            $h=$res['department'];
        }
                $select=$con->prepare("SELECT * FROM savecourse WHERE dpt ='$h'");
                $select->setFetchMode(PDO::FETCH_ASSOC);
                $select->execute();
        ?>
        <option>Select</option>
        <?php while($p=$select->fetch()){?>
            <option value="<?php echo $p['saveDptName']?>"><?php echo $p['saveDptName']?></option>

        <?php }
            }
        }
catch(PDOException $e)
{echo "error" . $e->getMessage();
}


try{

    $con = new PDO ("mysql:host=localhost;dbname=universitym","root","");
    if(isset($_POST['value55'])){
        $value= $_POST['value55'];
                $select=$con->prepare("SELECT * FROM saveResult WHERE studentRegNo='$value'");
                $select->setFetchMode(PDO::FETCH_ASSOC);
                $select->execute();
                    while($p=$select->fetch()){?>
                    <tr>
                        <td><?php echo $p['selectCourse']?></td>
                        <td><?php echo $p['grade']?></td>
                    </tr>
          <?php  }
        }
        }
catch(PDOException $e)
{echo "error" . $e->getMessage();
}

try{
    $con = new PDO ("mysql:host=localhost;dbname=tuts","root","");
    if(isset($_POST['value66'])){
        $value= $_POST['value66'];
        $con = new PDO ("mysql:host=localhost;dbname=universitym","root","");
        $select=$con->prepare("SELECT * FROM savecourse WHERE dpt='$value'");
        $select->setFetchMode(PDO::FETCH_ASSOC);
        $select->execute();
        ?>
        <option>Select</option>
        <?php while($p=$select->fetch()){?>
            <option><?php echo $p['saveDptName']?></option>
            <?php
        }
    }
}
catch(PDOException $e)
{echo "error" . $e->getMessage();
}
?>
