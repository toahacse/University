<?php include("index.php");
?>
<?php
//session_start();
$mass="";
$db=mysqli_connect("localhost","root","","universitym");
try{
    $con = new PDO ("mysql:host=localhost;dbname=universitym","root","");
    if(isset($_POST['ok'])){
            $TeacherName=  	        $_POST['TeacherName'];
            $TeacherAdd=	        $_POST['TeacherAdd'];
            $TeacherEmail=	        $_POST['TeacherEmail'];
            $TeacherPhoneNo=	    $_POST['TeacherPhoneNo'];
            $TeacherDpt=	        $_POST['TeacherDpt'];
            $TeacherDesignation=	$_POST['TeacherDesignation'];
            $Credit=	            $_POST['Credit'];
        $sql = "SELECT * FROM saveTeacher WHERE TeacherEmail='$TeacherEmail'";
        $sql1 = "SELECT * FROM saveTeacher WHERE TeacherName='$TeacherName' AND TeacherDpt='$TeacherDpt'";

        $res = mysqli_query($db, $sql);
        $res1 = mysqli_query($db, $sql1);

        if (mysqli_num_rows($res) > 0) {
            $mass = "Email Already Exist!!";
        }
        elseif(mysqli_num_rows($res1) > 0) {
                $mass = "Please Change Teacher Name Or Department";
            }
         else {
        $insert=$con->prepare("INSERT INTO saveTeacher(TeacherName,TeacherAdd,TeacherEmail,TeacherPhoneNo,TeacherDpt,TeacherDesignation,Credit)
	    VALUES(:TeacherName,:TeacherAdd,:TeacherEmail,:TeacherPhoneNo,:TeacherDpt,:TeacherDesignation,:Credit)");
        $insert->bindparam(':TeacherName',$TeacherName);
        $insert->bindparam(':TeacherAdd',$TeacherAdd);
        $insert->bindparam(':TeacherEmail',$TeacherEmail);
        $insert->bindparam(':TeacherPhoneNo',$TeacherPhoneNo);
        $insert->bindparam(':TeacherDpt',$TeacherDpt);
        $insert->bindparam(':TeacherDesignation',$TeacherDesignation);
        $insert->bindparam(':Credit',$Credit);
       if($insert->execute()){
           $mass="Save Successfully!";
       }
       }
    }
    }


catch(PDOException $e)
{echo "error" . $e->getMessage();
}
?>

<html>
<head>
</head>
<body>
<p class="saveDpt">Save Teacher</p>
<hr/>
<div class="bg-light">
<br/>
<form method="post">
<table class="saveDptTable">
    <tr><td colspan="2" class="text-danger text-center"><?php echo $mass;?></td></tr>
<tr><td class="tr">Teacher Name:</td>
<td class="tr"><input type="text" required="required" name="TeacherName" placeholder="Teacher Name" /></td>
</tr> 
<tr><td class="tr">Address:</td>
<td class="tr"><textarea name="TeacherAdd" cols="19" rows="2"></textarea></td>
</tr>
    <tr><td class="tr">Email:</td>
        <td class="tr"><input type="email" required="required" name="TeacherEmail" placeholder="Teacher Email" /></td>
    </tr>
<tr><td class="tr">Contact No:</td>
<td class="tr"><input type="text" required="required" name="TeacherPhoneNo" placeholder="Teacher Contact No" /></td>
</tr>
    <tr><td class="tr">Department:</td>
        <td class="tr"><select name="TeacherDpt" style="width:320px;">
                <?php
                try{

                    $con = new PDO ("mysql:host=localhost;dbname=universitym","root","");
                    $select=$con->prepare("SELECT * FROM savedepartment");
                    $select->setFetchMode(PDO::FETCH_ASSOC);
                    $select->execute();

                    ?>
                    <option>Select</option>
                    <?php while($p=$select->fetch()){?>
                        <option><?php echo $p['saveDptName']?></option>

                    <?php }
                }
                catch(PDOException $e)
                {echo "error" . $e->getMessage();
                }
                ?>
            </select></td>
    </tr>
<tr><td class="tr">Designation:</td>
<td class="tr"><select name="TeacherDesignation" style="width:320px;">
        <option>Select</option>
        <option>Professor</option>
        <option>Associate Professor</option>
        <option>Assistant Professor</option>
        <option>Lacturer</option>
        <option>Assistant Lacturer</option>
    </select></td>
</tr>
<tr><td class="tr">Credit To Be Taken:</td>
<td class="tr"><input type="text" required="required" name="Credit" placeholder="Credit To Be Taken" /></td>
</tr>
<tr><td class="tr"></td>
<td class="tr"><input type="submit" name="ok" value="Save"/></td>
</tr>
</table>
</form>
<br/>
<br/>
</div>
<hr />
<P class="foter">©copyright by<br/> 'X' University(1999-2020)</p>
</body>
</html>