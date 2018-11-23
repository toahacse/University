<?php include("index.php");
?>

<html>
<head>
</head>
<body>
<p class="saveDpt">Save Student Result</p>
<hr /><br/>
<br/>
<br/>
<form method="post">
<table class="saveDptTable">
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
<tr><td class="tr"></td>
<td class="tr"><input type="submit" name="ok" value="Search"/></td>
</tr>
</table>
</form>
<hr />
<div class="container"  style="font-size: 20px;">
    <?php
    try{
    $con = new PDO ("mysql:host=localhost;dbname=universitym","root","");
    if(isset($_POST["ok"])){
        $dpt=$_POST["dpt"];

    $select=$con->prepare("SELECT * FROM allocateRoom WHERE dpt='$dpt'");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();

    ?>
    <table id="table" class="display" width="100%">
        <thead>
        <tr><td >Room Number</td>
            <td >Course Name</td>
            <td>Time</td>
        </tr>
        </thead>
        <tbody>
        <?php while($p=$select->fetch()){?>
            <tr><td><?php echo $p['roomNumber']?></td>
                <td><?php echo $p['course']?></td>
                <td>
                    <?php echo $p['startTime']?> to
                    <?php echo $p['endTime']?>
                </td>
            </tr>
        <?php }
        echo " </tbody>";
        echo "</table>";
        }
    }
        catch(PDOException $e)
        {echo "error" . $e->getMessage();
        }
        ?>
</div>
<script src="assests/plugins/datatables/jquery.dataTables.js"></script>
<script>
    $(document).ready(function () {
        $('#table').DataTable();
    });
</script>
<hr />
<P class="foter">©copyright by<br/> 'X' University(1999-2020)</p>
</body>
</html>