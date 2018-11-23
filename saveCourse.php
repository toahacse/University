<?php include("index.php");
?>
<?php
//session_start();
$mass="";
$db=mysqli_connect("localhost","root","","universitym");
	try{
	$con = new PDO ("mysql:host=localhost;dbname=universitym","root","");
	if(isset($_POST['ok'])){
	$saveCourseCode=  	$_POST['saveCourseCode'];
	$saveDptName=	$_POST['saveDptName'];
	$saveDptcredit=	$_POST['saveDptcredit'];
	$saveDptDes=	$_POST['saveDptDes'];
	$dpt=	$_POST['dpt'];
	$semester=	$_POST['semester'];

	$sql = "SELECT * FROM savecourse WHERE saveCourseCode='$saveCourseCode' OR saveDptName='$saveDptName'";
        $res = mysqli_query($db, $sql);

        if (mysqli_num_rows($res) > 0) {
            $mass = "Data Already Save!!";
        }
        else{
	$insert=$con->prepare("INSERT INTO savecourse(saveCourseCode,saveDptName,saveDptcredit,saveDptDes,dpt,semester)
	VALUES(:saveCourseCode,:saveDptName,:saveDptcredit,:saveDptDes,:dpt,:semester)");
	$insert->bindparam(':saveCourseCode',$saveCourseCode);
	$insert->bindparam(':saveDptName',$saveDptName);
	$insert->bindparam(':saveDptcredit',$saveDptcredit);
	$insert->bindparam(':saveDptDes',$saveDptDes);
	$insert->bindparam(':dpt',$dpt);
	$insert->bindparam(':semester',$semester);
    if($insert->execute()){
            $mass="Save Successfully";
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
<p class="saveDpt">Save Course</p>
<hr />
<div class="bg-light">
<br/>
<form method="post">
<table class="saveDptTable">
    <tr>
        <td colspan="2" class="text-center text-danger"><?php echo $mass;?></td>
    </tr>
<tr><td class="tr">Code:</td>
<td class="tr"><input type="text" required="required" name="saveCourseCode" placeholder="Course Code" /></td>
</tr>
<tr><td class="tr">Name:</td>
<td class="tr"><input type="text" required="required" name="saveDptName" placeholder="Course Name" /></td>
</tr>
<tr><td class="tr">Credit:</td>
<td class="tr"><input type="text" required="required" name="saveDptcredit" placeholder="Course Credit" /></td>
</tr>
<tr><td class="tr">Description:</td>
<td class="tr"><input type="text" required="required" name="saveDptDes" placeholder="Course Description" /></td>
</tr>
<tr><td class="tr">Department:</td>
<td class="tr"><select name="dpt" style="width:320px;">
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
<tr><td class="tr">Semester:</td>
<td class="tr"><select name="semester"  style="width:320px;">
<option>Select</option>
<option>1st Semester</option>
<option>2nd Semester</option>
<option>3rd Semester</option>
<option>4th Semester</option>
<option>5th Semester</option>
<option>6th Semester</option>
<option>7th Semester</option>
<option>8th Semester</option>
</select></td>
</tr>
<tr><td class="tr"></td>
<td class="tr"><input type="submit" name="ok" value="Save"/></td>
</tr>
</table>
</form>
<br/>
<br/>
<br/>
<br/>
<hr />
<P class="foter">©copyright by<br/> 'X' University(1999-2020)</p>
</body>
</html>