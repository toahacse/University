<?php include("index.php");
?>


<?php
$db=mysqli_connect("localhost","root","","universitym");
$mass=" ";
$reg=" ";
$number=" ";
    if(isset($_POST['ok'])){

        session_start();

        if(isset($_SESSION['views']))
            $_SESSION['views']=$_SESSION['views']+1;
        else
            $_SESSION['views']=1;
        $no = $_SESSION['views'];

        $studentName=  	$_POST['studentName'];
        $email=	        $_POST['email'];
        $contactNo=	    $_POST['contactNo'];
        $date=	        $_POST['date'];
        $address=	    $_POST['address'];
        $department=	$_POST['department'];
        $reg=           $department.'-'.$no;

    $sql = "SELECT * FROM regStudent WHERE email='$email'";
    $res = mysqli_query($db, $sql);

    if (mysqli_num_rows($res) > 0) {
        $mass = "Email Already Use!!";
    } else {
        $query="INSERT INTO regStudent(studentName,email,contactNo,date,address,department,reg)
        VALUES ('$studentName','$email','$contactNo','$date','$address','$department','$reg')";
        if(mysqli_query($db,$query)){
            $mass="Register Successfully";
            $number="Your Registation Number :".$reg;
        }
    }
}

?>

<html>
<head>
</head>
<p class="saveDpt">Register Student</p>
<hr />
    <div class="bg-light">
<br/>
<form method="post">
<table class="saveDptTable">
    <tr>
        <td colspan="2" class="text-center text-danger"><?php echo $mass;?></td>
    </tr>
    <tr>
        <td colspan="2" class="text-center text-info"><?php echo $number;?></td>
    </tr>
<tr><td class="tr">Student Name:</td>
<td class="tr"><input type="text" required="required" name="studentName" placeholder="Student Name" /></td>
</tr> 
<tr><td class="tr">Email:</td>
<td class="tr"><input type="text" required="required" name="email" placeholder="Email" /></td>
</tr>
<tr><td class="tr">Contact No:</td>
<td class="tr"><input type="text" required="required" name="contactNo" placeholder="Contact No" /></td>
</tr>
<tr><td class="tr">Date:</td>
<td class="tr"><input type="text" required="required" name="date" placeholder="Date" /></td>
</tr>
<tr><td class="tr">Address:</td>
<td class="tr"><input type="text" required="required" name="address" placeholder="Address" /></td>
</tr>
    <tr><td class="tr">Department:</td>
        <td class="tr"><select name="department" style="width:320px;">
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
<tr><td class="tr"></td>
<td class="tr"><input type="submit" name="ok" value="Register"/></td>
</tr>
</table>
</form>
<br/>
</div>
<hr />
<P class="foter">©copyright by<br/> 'X' University(1999-2020)</p>
</body>
</html>