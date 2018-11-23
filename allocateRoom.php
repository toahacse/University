<?php include("index.php");
?>

<?php
$db=mysqli_connect("localhost","root","","universitym");
$mass=" ";
if(isset($_POST['ok'])) {
    $dpt =          $_POST['dpt'];
    $course =       $_POST['course'];
    $roomNumber =   $_POST['roomNumber'];
    $day =          $_POST['day'];
    $startTime =    $_POST['startTime'];
    $endTime =      $_POST['endTime'];

    $sql1 = "SELECT * FROM allocateRoom WHERE roomNumber='$roomNumber'";
    $sql2 = "SELECT * FROM allocateRoom WHERE day='$day'";
    $sql3 = "SELECT * FROM allocateRoom WHERE startTime='$startTime'";
    $sql4 = "SELECT * FROM allocateRoom WHERE endTime='$endTime'";

    $res1 = mysqli_query($db, $sql1);
    $res2 = mysqli_query($db, $sql2);
    $res3 = mysqli_query($db, $sql3);
    $res4 = mysqli_query($db, $sql4);

    if ((mysqli_num_rows($res1) > 0) AND (mysqli_num_rows($res2) > 0) AND (mysqli_num_rows($res3) > 0) AND (mysqli_num_rows($res4) > 0)) {
        $mass = "Room Already Allocate This Shedule!!";
    } else {
        $query="INSERT INTO allocateRoom(dpt,course,roomNumber,day,startTime,endTime) 
            VALUES ('$dpt','$course','$roomNumber','$day','$startTime','$endTime')";

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
<p class="saveDpt">Allocate Room</p>
<hr /><br/>
<form method="post">
<table class="saveDptTable">
    <tr>
        <td colspan="2" class="text-center text-danger"><?php echo $mass;?></td>
    </tr>
    <tr><td class="tr">Department:</td>
        <td class="tr"><select name="dpt" id="dpt" style="width:320px;">
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
    <tr><td class="tr">Course:</td>
        <td class="tr"><select name="course" id="course" style="width:320px;">
                <?php
                try{

                    $con = new PDO ("mysql:host=localhost;dbname=universitym","root","");
                    $select=$con->prepare("SELECT * FROM savecourse");
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
<tr><td class="tr">Class Room:</td>
<td class="tr"><input type="text" required="required" name="roomNumber" placeholder="Room Number" /></td>
</tr>
<tr><td class="tr">Day:</td>
    <td class="tr"><select name="day"  style="width:320px;">
            <option>Select</option>
            <option>Saturday</option>
            <option>Sunday</option>
            <option>Monday</option>
            <option>Tuesday</option>
            <option>Wednesday</option>
            <option>Thursday</option>
        </select></td>
</tr>
<tr><td class="tr">From:</td>
<td class="tr"><input type="text" required="required" name="startTime" placeholder="Start Course Time" /></td>
</tr>
<tr><td class="tr">To:</td>
<td class="tr"><input type="text" required="required" name="endTime" placeholder="End Course Time" /></td>
</tr>
<tr><td class="tr"></td>
<td class="tr"><input type="submit" name="ok" value="Allocate"/></td>
</tr>
</table>
</form>
<br/>
<hr />
<P class="foter">©copyright by<br/> 'X' University(1999-2020)</p>
<script>
    $("#dpt").click(function () {
        var value66=$("#dpt").val();
        if(value66){
            $.ajax({
                type:'POST',
                url:'Ajex.php',
                data:'value66='+ value66,
                success:function (html) {
                    $("#course").html(html);
                }
            });
        }
    });
</script>
</body>
</html>