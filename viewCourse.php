<?php include("index.php");
?>
<html>
<head>
</head>
<body>
<p class="viewDpt">View All Course</p>
<hr/>
<div class="container"  style="font-size: 20px;">
<br/>
<?php
	try{
					
		$con = new PDO ("mysql:host=localhost;dbname=universitym","root","");
		$select=$con->prepare("SELECT * FROM savecourse"); 
		$select->setFetchMode(PDO::FETCH_ASSOC);
		$select->execute();		
		
			?>

<table id="table" class="display" width="100%">
    <thead>
<tr><td>Course Code</td>
<td>Course Name</td>
<td>Semester</td>
</tr>
    </thead>
    <tbody>
<?php while($p=$select->fetch()){?>
<tr><td><?php echo $p['saveCourseCode']?></td>
<td><?php echo $p['saveDptName']?></td>
<td><?php echo $p['semester']?></td>
</tr>
		<?php }
		echo "</tbody>";
		echo "</table>";
		}
		catch(PDOException $e)
				{echo "error" . $e->getMessage();
					}
	?>

<br/>
    </div>
<hr/>
<P class="foter">©copyright by<br/> 'X' University(1999-2020)</p>
<script src="assests/plugins/datatables/jquery.dataTables.js"></script>
<script>
    $(document).ready(function () {
        $('#table').DataTable();
    });
</script>
</body>
</html>