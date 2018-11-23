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
<form method="post" action="pdf.php">
<table class="saveDptTable">
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
<tr><td class="tr">Name:</td>
<td class="tr" id="studentName"><input type="text" required="required" name="studentName" placeholder="Name" /></td>
</tr>
<tr><td class="tr">Email:</td>
<td class="tr" id="email"><input type="text" required="required" name="email" placeholder="Email" /></td>
</tr>
<tr><td class="tr">Department:</td>
<td class="tr" id="dpt"><input type="text" required="required" name="dpt" placeholder="Department" /></td>
</tr>
<tr><td class="tr"></td>
<td class="tr"><input type="submit" name="ok" value="Make PDF"/></td>
</tr>
</table>
</form>
<div style="font-size: 20px; width: 75%; padding-top: 50px; margin: auto;">
<table id="table" class="display table" width="100%">
    <thead>
    <tr><td>Course Name</td>
        <td>Grade</td>
    </tr>
    </thead>
    <tbody id="tableData">

    </tbody>
  </table>
</div>
<br/>
<hr />
<P class="foter">©copyright by<br/> 'X' University(1999-2020)</p>
<script src="assests/plugins/datatables/jquery.dataTables.js"></script>
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
        var value55=$("#studentRegNo").val();
        if(value55){
            $.ajax({
                type:'POST',
                url:'Ajex.php',
                data:'value55='+ value55,
                success:function (html) {
                    $("#tableData").html(html);
                }
            });
        }
    });

    $(document).ready(function () {
        $('#table').DataTable();
    });
</script>
</body>
</html>