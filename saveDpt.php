<?php include("index.php");
?>
<?php
$db=mysqli_connect("localhost","root","","universitym");
$mass=" ";
if(isset($_POST['ok'])) {
    $saveDptCode = $_POST['saveDptCode'];
    $saveDptName = $_POST['saveDptName'];

    $sql = "SELECT * FROM savedepartment WHERE saveDptName='$saveDptName' OR saveDptCode='$saveDptCode'";
    $res = mysqli_query($db, $sql);

    if (mysqli_num_rows($res) > 0) {
        $mass = "Data Already Save!!";
    } else {
        $query="INSERT INTO savedepartment(saveDptCode,saveDptName) VALUES ('$saveDptCode','$saveDptName')";
        if(mysqli_query($db,$query)){
            $mass="Save Successfully";
        }
    }
}

?>
<html>
<head>
</head>
<body>
<p class="saveDpt">Save Department</p>
<hr /><div class="bg-light">
    <br/>
<br/>
<br/>
<form method="post">
<table class="saveDptTable">
    <tr>
        <td colspan="2" class="text-center text-danger"><?php echo $mass;?></td>
    </tr>
<tr ><td class="tr">Department Code:</td>
<td class="tr"><input type="text" required="required" name="saveDptCode" placeholder="Department Code" /></td>
</tr> 
<tr ><td class="tr">Department Name:</td>
<td class="tr"><input type="text" required="required" name="saveDptName" placeholder="Department Name" /></td>
</tr>
<tr ><td class="tr"></td>
<td class="tr"><input type="submit" name="ok" value="Save"/></td>
</tr>
</table>
</form>
<br/>
<br/>
<br/>
<br/>
</div>
<hr />
<P class="foter">©copyright by<br/> 'X' University(1999-2020)</p>
</body>
</html>