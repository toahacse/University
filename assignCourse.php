<?php include("index.php");
?>


<?php
$db=mysqli_connect("localhost","root","","universitym");
$mass=" ";
try{
    $con = new PDO ("mysql:host=localhost;dbname=universitym","root","");
    if(isset($_POST['ok'])){

        $department=  	    $_POST['department'];
        $teacher=	        $_POST['teacher'];
        $token=	            $_POST['token'];
        $remaningCredit=	$_POST['remaningCredit'];
        $courseCode=	    $_POST['courseCode'];
        $name=	            $_POST['name'];
        $credit=	        $_POST['credit'];

        $sql = "SELECT * FROM assignCourse WHERE name='$name' AND teacher='$teacher'";
        $res = mysqli_query($db, $sql);

        if (mysqli_num_rows($res) > 0) {
            $mass = "Course Already Exist!!";
        } else {

        $insert=$con->prepare("INSERT INTO assignCourse(department,teacher,token,remaningCredit,courseCode,name,credit)
	    VALUES(:department,:teacher,:token,:remaningCredit,:courseCode,:name,:credit)");
        $insert->bindparam(':department',$department);
        $insert->bindparam(':teacher',$teacher);
        $insert->bindparam(':token',$token);
        $insert->bindparam(':remaningCredit',$remaningCredit);
        $insert->bindparam(':courseCode',$courseCode);
        $insert->bindparam(':name',$name);
        $insert->bindparam(':credit',$credit);
        if($insert->execute()){
            $mass="Course Assign Successfully!!";
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
<p class="saveDpt">Assign Teacher</p>
<hr /><br/>
<form method="post">
<table class="saveDptTable">
    <tr>
        <td colspan="2" class="text-center text-danger"><?php echo $mass;?></td>
    </tr>
    <tr><td class="tr">Department:</td>
        <td class="tr"><select name="department" id="dpt" style="width:320px;">
                <?php
                try{

                    $con = new PDO ("mysql:host=localhost;dbname=universitym","root","");
                    $select=$con->prepare("SELECT * FROM savedepartment");
                    $select->setFetchMode(PDO::FETCH_ASSOC);
                    $select->execute();

                    ?>
                    <option>Select</option>
                    <?php while($p=$select->fetch()){?>
                        <option value="<?php echo $p['saveDptName']?>"><?php echo $p['saveDptName']?></option>

                    <?php }
                }
                catch(PDOException $e)
                {echo "error" . $e->getMessage();
                }
                ?>
            </select></td>
    </tr>
    <tr><td class="tr">Teacher:</td>
        <td class="tr"><select name="teacher" id="teacher" style="width:320px;">
                <option>Select</option>
            </select>
                </td>
    </tr>
<tr><td class="tr">Credit To Be Taken:</td>
<td class="tr" id="token"><input type="text" required="required" name="token" placeholder="Credit To Be Taken" /></td>
</tr>
<tr><td class="tr">Remaning Credit:</td>
<td class="tr"><input type="text" required="required" name="remaningCredit" placeholder="Remaning Credit" /></td>
</tr>
<tr><td class="tr">Course Code:</td>
<td class="tr"><select name="courseCode" id="course" style="width:320px;">
        <option>Select</option>
    </select></td>
</tr>
<tr><td class="tr">Name:</td>
<td class="tr" id="name"><input type="text" required="required" name="name" placeholder="Name" /></td>
</tr>
<tr><td class="tr">Credit:</td>
<td class="tr" id="credit"><input type="text" required="required" name="credit" placeholder="Credit" /></td>
</tr>
<tr><td class="tr"></td>
<td class="tr"><input type="submit" name="ok" value="Save"/></td>
</tr>
</table>
</form>
<br/>
<hr />
<P class="foter">©copyright by<br/> 'X' University(1999-2020)</p>


<script>
    $("#dpt").click(function () {
        var value=$("#dpt").val();
        if(value){
            $.ajax({
                type:'POST',
                url:'Ajex.php',
                data:'value='+ value,
                success:function (html) {
                    $("#teacher").html(html);
                }
            });
        }
    });
    $("#teacher").click(function () {
        var value1=$("#teacher").val();
        if(value1){
            $.ajax({
                type:'POST',
                url:'Ajex.php',
                data:'value1='+ value1,
                success:function (html) {
                    $("#token").html(html);
                }
            });
        }
    });
    $("#dpt").click(function () {
        var value3=$("#dpt").val();
        if(value3){
            $.ajax({
                type:'POST',
                url:'Ajex.php',
                data:'value3='+ value3,
                success:function (html) {
                    $("#course").html(html);
                }
            });
        }
    });
    $("#course").click(function () {
        var value4=$("#course").val();
        if(value4){
            $.ajax({
                type:'POST',
                url:'Ajex.php',
                data:'value4='+ value4,
                success:function (html) {
                    $("#name").html(html);
                }
            });
        }
    });
    $("#course").click(function () {
        var value5=$("#course").val();
        if(value5){
            $.ajax({
                type:'POST',
                url:'Ajex.php',
                data:'value5='+ value5,
                success:function (html) {
                    $("#credit").html(html);
                }
            });
        }
    });
    $("#course").click(function () {
        var value44=$("#course").val();
        if(value44){
            $.ajax({
                type:'POST',
                url:'Ajex.php',
                data:'value44='+ value44,
                success:function (html) {
                    $("#credit").html(html);
                }
            });
        }
    });
</script>

</body>
</html>