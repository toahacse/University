<?php include("index.php");
?>
<html>
<head>

</head>
<body>
<p class="viewDpt">View All Departments</p>
<hr/>
<br/>
<div class="container"  style="font-size: 20px;">
<?php
	try{
					
		$con = new PDO ("mysql:host=localhost;dbname=universitym","root","");
		$select=$con->prepare("SELECT * FROM savedepartment"); 
		$select->setFetchMode(PDO::FETCH_ASSOC);
		$select->execute();		
		
			?>
    <table id="table" class="display" width="100%">
                    <thead>
				<tr><td >ID</td>
				<td >Department Code</td>
				<td>Department Name</td>
				</tr>
                    </thead>
                     <tbody>
				<?php while($p=$select->fetch()){?>
				<tr><td><?php echo $p['id']?></td>
				<td><?php echo $p['saveDptCode']?></td>
				<td><?php echo $p['saveDptName']?></td>
				</tr>
			<?php }
			echo " </tbody>";
			echo "</table>";
		}
		catch(PDOException $e)
				{echo "error" . $e->getMessage();
					}
	?>
</div>

<br/>
<hr />

<P class="foter">©copyright by<br/> 'X' University(1999-2020)</p>
                    <script src="assests/plugins/datatables/jquery.dataTables.js"></script>
                    <script>
                        $(document).ready(function () {
                            $('#table').DataTable();
                        });
                    </script>
</body>
</html>
