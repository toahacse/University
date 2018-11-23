<!DOCTYPE html>
<html>

	<head>
			<title>This is Title</title>
			<link href="style.css" rel="stylesheet" />
			<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
			<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
			<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">
			<link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">
			<link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">
            <link rel="stylesheet" href="css/bootstrap.css">
            <script src="js/bootstrap.js"></script>
            <script src="js/jquery-3.2.1.min.js"></script>
			<script src="assests/jquery/jquery.min.js"></script> 
			<link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
			<script src="assests/jquery-ui/jquery-ui.min.js"></script>
			<script src="assests/bootstrap/js/bootstrap.min.js"></script>
			<style>
			.dropdown-menu{
                background:#585858;
                padding:5px;
			}
			</style>
	
	</head>
	<body>
		<div class="navber">
		<div class="allA">
		<p style="float:left; padding:10px; font-size:18px;color:white;" >University Manegment</p>
		<ul>
		<li><a href="home.php">Home</a></li>
		<li class="dropdown">
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Department</a>
		<div class="dropdown-menu">
      <a class="dropdown-item" href="saveDpt.php">Save Dpt</a><br/>
      <a class="dropdown-item" href="viewDpt.php">View Dpt</a>
		</div>
		</li>
		<li class="dropdown">
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Course</a>
		<div class="dropdown-menu">
      <a class="dropdown-item" href="saveCourse.php">Save Course</a><br/>
      <a class="dropdown-item" href="viewCourse.php">View Course</a>
		</div>
		</li>
		<li class="dropdown">
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Teacher</a>
		<div class="dropdown-menu">
      <a class="dropdown-item" href="saveTeacher.php">Save Teacher</a><br/>
      <a class="dropdown-item" href="assignCourse.php">Assignn Course</a>
		</div>
		</li>
		<li class="dropdown">
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Student</a>
		<div class="dropdown-menu">
      <a class="dropdown-item" href="regStudent.php">Reg Student</a><br/>
      <a class="dropdown-item" href="courseEnroll.php">Course Enroll</a>
		</div>
		</li>
		<li class="dropdown">
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Result</a>
		<div class="dropdown-menu">
      <a class="dropdown-item" href="saveResult.php">Save Result</a><br/>
      <a class="dropdown-item" href="viewResult.php">View Result</a>
		</div>
		</li>
		<li class="dropdown">
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Classroom</a>
		<div class="dropdown-menu">
      <a class="dropdown-item" href="allocateRoom.php">Allocate Room</a><br/>
      <a class="dropdown-item" href="viewClass.php">Class Shedule</a>
		</div>
		</li>
		<li><a href="">About</a></li>
		</ul>
		</div>
		</div>
	   
 
	</body>
</html> 