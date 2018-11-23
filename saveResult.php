<?php include("index.php");
?>

<?php
$db=mysqli_connect("localhost","root","","universitym");
$mass=" ";
try{
    $con = new PDO ("mysql:host=localhost;dbname=universitym","root","");
    if(isset($_POST['ok'])){
        $studentRegNo=   $_POST['studentRegNo'];
        $studentName=	 $_POST['studentName'];
        $email=	         $_POST['email'];
        $department=	 $_POST['department'];
        $selectCourse=	 $_POST['selectCourse'];
        $grade=	         $_POST['grade'];

        $sql = "SELECT * FROM saveResult WHERE studentRegNo='$studentRegNo' AND selectCourse='$selectCourse'";
        $res = mysqli_query($db, $sql);

        if (mysqli_num_rows($res) > 0) {
            $mass = "Result Already Exist!!";
        } else {
        $insert=$con->prepare("INSERT INTO saveResult(studentRegNo,studentName,email,department,selectCourse,grade)
	    VALUES(:studentRegNo,:studentName,:email,:department,:selectCourse,:grade)");
        $insert->bindparam(':studentRegNo',$studentRegNo);
        $insert->bindparam(':studentName',$studentName);
        $insert->bindparam(':email',$email);
        $insert->bindparam(':department',$department);
        $insert->bindparam(':selectCourse',$selectCourse);
        $insert->bindparam(':grade',$grade);
        if($insert->execute()){
            $mass="Result Save Successfully!!";
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
<p class="saveDpt">Save Student Result</p>
<hr />
<br/>
<form method="post">
<table class="saveDptTable">
    <tr>
        <td colspan="2" class="text-center text-danger"><?php echo $mass;?></td>
    </tr>
<tr><td class="tr">Student Reg.No:</td>
<td class="tr"><select name="studentRegNo" id="studentRegNo" style="width:320px;">
        <?php
        try{
            $con = new PDO ("mysql:host=localhost;dbname=universitym","root","");
            $select=$con->prepare("SELECT * FROM regstudent");
            $select->setFetchMode(PDO::FETCH_ASSOC);
            $select->execute();

            ?>
            <option>Select</option>
            <?php while($p=$select->fetch()){?>
                <option><?php echo $p['reg']?></option>

            <?php }
        }
        catch(PDOException $e)
        {echo "error" . $e->getMessage();
        }
        ?>
    </select></td>
</tr>
    <tr><td class="tr">Student Name:</td>
        <td class="tr" id="studentName"><input type="text" required="required"  name="studentName" placeholder="Student Name" /></td>
    </tr>
    <tr><td class="tr">Email:</td>
        <td class="tr" id="email"><input type="text" required="required" name="email" placeholder="Email" /></td>
    </tr>
    <tr><td class="tr">Department:</td>
        <td class="tr" id="dpt"><input type="text" required="required" name="department" placeholder="Department" /></td>
    </tr>
<tr><td class="tr">Select Course:</td>
<td class="tr"><select name="selectCourse" id="selectCourse" style="width:320px;">
        <option>Select</option>
    </select></td>
</tr>
<tr><td class="tr">Select Grade Letter:</td>
<td class="tr"><select name="grade"  style="width:320px;">
        <option>Select</option>
        <option>A+</option>
        <option>A</option>
        <option>A-</option>
        <option>B</option>
        <option>C</option>
        <option>D</option>
        <option>F</option>
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

<script>
    $("#studentRegNo").click(function () {
        var value8=$("#studentRegNo").val();
        if(value8){
            $.ajax({
                type:'POST',
                url:'Ajex.php',
                data:'value8='+ value8,
                success:function (html) {
                    $("#studentName").html(html);
                }
            });
        }
    });
    $("#studentRegNo").click(function () {
        var value9=$("#studentRegNo").val();
        if(value9){
            $.ajax({
                type:'POST',
                url:'Ajex.php',
                data:'value9='+ value9,
                success:function (html) {
                    $("#email").html(html);
                }
            });
        }
    });
    $("#studentRegNo").click(function () {
        var value10=$("#studentRegNo").val();
        if(value10){
            $.ajax({
                type:'POST',
                url:'Ajex.php',
                data:'value10='+ value10,
                success:function (html) {
                    $("#dpt").html(html);
                }
            });
        }
    });
    $("#studentRegNo").click(function () {
        var value11=$("#studentRegNo").val();
        if(value11){
            $.ajax({
                type:'POST',
                url:'Ajex.php',
                data:'value11='+ value11,
                success:function (html) {
                    $("#selectCourse").html(html);
                }
            });
        }
    });
</script>
</body>
</html>