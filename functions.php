<?
	include( "database.php");

	if($query=$pdo->prepare("SHOW COLUMNS FROM assessments")) {
		$query->execute();
		while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
			$assessments[]=$result['Field'];
		}
	}
	else {
		$error = $query->errorInfo();
		echo 'MySQL Error: ' . $error;
	}

	$newassessments=array();
	if($query=$pdo->prepare("SELECT * FROM assessments")) {
		$query->execute();
		while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
            foreach ($assessments as $index => $row) {
            	$newassessments[$row][]=$result[$row];
            }
		}
	}
	else {
		$error = $query->errorInfo();
		echo 'MySQL Error: ' . $error;
	}

	$newinfoArray=array();
	if($query=$pdo->prepare("SELECT * FROM studentinfo")) {
		$query->execute();
		while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
            $infoID = $result['Student_No'];
            $newinfoArray[$infoID] = array('ID'=>$result['Student_No'],'student'=>$result['Student'],'dob'=>$result['Date_of_Birth'],'mailingaddress'=>$result['Mailing_Address'],'grade'=>$result['Grade'],'s1p1'=>$result['A'],'s1p2'=>$result['B'],'s1p3'=>$result['C'],'s1p4'=>$result['D'],'s2p1'=>$result['E'],'s2p2'=>$result['F'],'s2p3'=>$result['G'],'s2p4'=>$result['H'],'accommodations'=>$result['Accommodations'],'exceptionalities'=>$result['Exceptionalities'],'iprc'=>$result['IPRC'],'sea'=>$result['SEA']);
		}
	}
	else {
		$error = $query->errorInfo();
		echo 'MySQL Error: ' . $error;
	}

	$appointmentsArray=array();
	if($query=$pdo->prepare("SELECT * FROM appointments")) {
		$query->execute();
		while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
			$studentID = $result['ID'];
            $appointmentsArray[$studentID] = array('ID'=>$result['ID'],'date'=>$result['date'],'time'=>$result['time'],'student'=>$result['student'],'roomNumber'=>$result['roomNumber'],'homeroomTeacher'=>$result['homeroomTeacher'],'teacher'=>$result['teacher']);
		}
	}
	else {
		$error = $query->errorInfo();
		echo 'MySQL Error: ' . $error;
	}

/** FUNCTIONS */
function navbar() {
    echo ''?>
    	<style>
    		.navbar-custom {
    		    background-color:#0A819C;
    		    color:#ffffff;
    		    border-radius:0;
    		}

    		.navbar-custom .navbar-nav > li > a {
    		    color:#fff;
    		}
    		.navbar-custom .navbar-nav > .active > a, .navbar-nav > .active > a:hover, .navbar-nav > .active > a:focus {
    		    color: #ffffff;
    		    background-color:transparent;
    		}
    		.navbar-custom .navbar-brand {
    		    color:#eeeeee;
    		}

    	</style>
		<div class="page-header-topbar">
			<nav role="navigation" class="navbar navbar-custom navbar-static-top">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="index.php">S.I.E.P. Database</a>
					</div>
					
					
					<ul class="nav navbar-nav navbar-right">
	  					<li><a href="/login/?p=logout&l=/login/"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
	  				</ul>
				</div>
			</nav>
		</div>
    <?
}
function login() {
	echo ''?>
		<body background="images/background.jpg" style="background-size:cover;">
			<div class="container">
				<div class="jumbotron">
					<h1 class="text-center">Welcome To S.I.E.P</h1>
				    <p class="text-center">System for Individualized Education Plan</p> 
				    <center>
				    <a href="/login/?p=login&l=/iep/index.php" class="btn btn-info" role="button">Press to Login</a>
				    </center>
			    </div>
			</div>
		</body>
	<?
}
function addToLog() {
	if (func_num_args() == 4) {
		$func = func_get_args(0);
		$id = func_get_args(1);
		$fname = func_get_args(2);
		$lname = func_get_args(3);
	}
	else if (func_num_args() == 2) {
		$func = func_get_args(0);
		$id = func_get_args(1);
	}

	/*switch($func) {
	case 'add': 
		writeLog("ADD - ".$id." - ".$fname." ".$lname);
		return;
	case 'del':
		writeLog("DEL - ".$id);
		return;
	}*/

}

function writeLog($text) {
	//not yet implremented
	echo $text;
}
?>
