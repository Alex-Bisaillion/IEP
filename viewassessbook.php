<?
require($_SERVER['DOCUMENT_ROOT'] . '/login/classes/api.php');
require("functions.php");
require("fpdf.php");
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>IEP Database</title>

	    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

		<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
	    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">

	    <script>
	    	$(document).ready(function(){
			    $("#bulkassessmentpdf").submit(function(){
					$.ajax({
					    type: 'POST',
					    url: 'bulkassessbook.php',
					    data: $('#bulkassessmentpdf').serialize(),
					    success: function(response)
					    {
        					$(location).attr('href', 'viewassessment.php')

					    },
					    error : function(XMLHttpRequest, textStatus, errorThrown) 
        				{
        					alert ("Error Occured");
        				}
					});
					return false;
			    });
			});
		    $(document).ready(function() {
			    $('#multiselect').click(function(event) {
			        if (this.checked) {
			            $('.array').each(function() {
			                this.checked = true;
			            });
			        }
			        else {
			            $('.array').each(function() {
			                this.checked = false;
			             });
			        }
			    });
			});
		</script>
	</head>

	<? if(null !== $user->getUserName()): ?>
		<? 
			navbar();
		?>
		<body background="images/background.jpg" style="background-size:cover;">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-blue" style="background:#FFF">
						<div class="panel-heading" align="center">Students Enrolled in <? echo $_POST['course']; ?></div>
							<table class="table table-hover-color">
								<tr><th><input type="checkbox" name="multiselect" id="multiselect" value="" /></th><th>Name</th><th>Room</th><th>Teacher</th><th>Room</th><th>Date</th><th>Time</th><th>Accommodations</th></tr>
								<form name="bulkassessmentpdf" id="bulkassessmentpdf" method="post" action="bulkassessbook.php">
								<input type="hidden" name="chosenassessment" value="<?php echo $_POST['chosenassessment']; ?>" />
								<?
									foreach ($newinfoArray as $index => $row) {
										if ($_POST['semester']=="semester1") {
											if (stristr($row['s1p1'], $_POST['course'])) {
												?>
													<tr>
													<td>
														<input type="checkbox" class="array" name="details[<?=$index;?>][check]" />
													</td>
												<?
												echo "<td>".$row['student']."</td>";
												$fields = array('room','code','teacher');
												$arr = array_combine ( $fields, explode(":", $row['s1p1']) );
												echo "<td>".$arr['room']."</td>";
												
												$fields = array('lname','fname');
												$arr = array_combine ( $fields, explode(",",$arr['teacher']) );
												$teachername = $arr['fname'] . ' ' . $arr['lname'];
												echo "<td>$teachername</td>";
												?>
													<input type="hidden" name="details[<?=$index;?>][id]" value="<?php echo $index; ?>" />
													<td><input type="text" id="room" name="details[<?=$index;?>][room]" /></td>
													<td><input type="date" id="date" name="details[<?=$index;?>][date]" /></td>
													<td><input type="time" id="time" name="details[<?=$index;?>][time]" /></td>
													<td>
														<ul>
														<?
															$separated = explode(":", $row['accommodations']);
															foreach ($separated as $item) {
																?>
																	<input type="checkbox" name="details[<?=$index;?>][accommodations][]" value="<?php echo $item; ?>"/> <?php echo $item; ?><br>
																<?
															}
														?>
														</ul>
													</td>
												<?
												echo "</tr>";
											}
											elseif (stristr($row['s1p2'], $_POST['course'])) {
												?>
													<tr>
													<td>
														<input type="checkbox" class="array" name="details[<?=$index;?>][check]" />
													</td>
												<?
												echo "<td>".$row['student']."</td>";
												$fields = array('room','code','teacher');
												$arr = array_combine ( $fields, explode(":", $row['s1p2']) );
												echo "<td>".$arr['room']."</td>";
												
												$fields = array('lname','fname');
												$arr = array_combine ( $fields, explode(",",$arr['teacher']) );
												$teachername = $arr['fname'] . ' ' . $arr['lname'];
												echo "<td>$teachername</td>";
												?>
													<input type="hidden" name="details[<?=$index;?>][id]" value="<?php echo $index; ?>" />
													<td><input type="text" id="room" name="details[<?=$index;?>][room]" /></td>
													<td><input type="date" id="date" name="details[<?=$index;?>][date]" /></td>
													<td><input type="time" id="time" name="details[<?=$index;?>][time]" /></td>
													<td>
														<ul>
														<?
															$separated = explode(":", $row['accommodations']);
															foreach ($separated as $item) {
																?>
																	<input type="checkbox" name="details[<?=$index;?>][accommodations][]" value="<?php echo $item; ?>"/> <?php echo $item; ?><br>
																<?
															}
														?>
														</ul>
													</td>
												<?
												echo "</tr>";
											}
											elseif (stristr($row['s1p3'], $_POST['course'])) {
												?>
													<tr>
													<td>
														<input type="checkbox" class="array" name="details[<?=$index;?>][check]" />
													</td>
												<?
												echo "<td>".$row['student']."</td>";
												$fields = array('room','code','teacher');
												$arr = array_combine ( $fields, explode(":", $row['s1p3']) );
												echo "<td>".$arr['room']."</td>";
												
												$fields = array('lname','fname');
												$arr = array_combine ( $fields, explode(",",$arr['teacher']) );
												$teachername = $arr['fname'] . ' ' . $arr['lname'];
												echo "<td>$teachername</td>";
												?>
													<input type="hidden" name="details[<?=$index;?>][id]" value="<?php echo $index; ?>" />
													<td><input type="text" id="room" name="details[<?=$index;?>][room]" /></td>
													<td><input type="date" id="date" name="details[<?=$index;?>][date]" /></td>
													<td><input type="time" id="time" name="details[<?=$index;?>][time]" /></td>
													<td>
														<ul>
														<?
															$separated = explode(":", $row['accommodations']);
															foreach ($separated as $item) {
																?>
																	<input type="checkbox" name="details[<?=$index;?>][accommodations][]" value="<?php echo $item; ?>"/> <?php echo $item; ?><br>
																<?
															}
														?>
														</ul>
													</td>
												<?
												echo "</tr>";
											}
											elseif (stristr($row['s1p4'], $_POST['course'])) {
												?>
													<tr>
													<td>
														<input type="checkbox" class="array" name="details[<?=$index;?>][check]" />
													</td>
												<?
												echo "<td>".$row['student']."</td>";
												$fields = array('room','code','teacher');
												$arr = array_combine ( $fields, explode(":", $row['s1p4']) );
												echo "<td>".$arr['room']."</td>";
												
												$fields = array('lname','fname');
												$arr = array_combine ( $fields, explode(",",$arr['teacher']) );
												$teachername = $arr['fname'] . ' ' . $arr['lname'];
												echo "<td>$teachername</td>";
												?>
													<input type="hidden" name="details[<?=$index;?>][id]" value="<?php echo $index; ?>" />
													<td><input type="text" id="room" name="details[<?=$index;?>][room]" /></td>
													<td><input type="date" id="date" name="details[<?=$index;?>][date]" /></td>
													<td><input type="time" id="time" name="details[<?=$index;?>][time]" /></td>
													<td>
														<ul>
														<?
															$separated = explode(":", $row['accommodations']);
															foreach ($separated as $item) {
																?>
																	<input type="checkbox" name="details[<?=$index;?>][accommodations][]" value="<?php echo $item; ?>"/> <?php echo $item; ?><br>
																<?
															}
														?>
														</ul>
													</td>
												<?
												echo "</tr>";
											}
										}
										elseif ($_POST['semester']=="semester2") {
											if (stristr($row['s2p1'], $_POST['course'])) {
												?>
													<tr>
													<td>
														<input type="checkbox" class="array" name="details[<?=$index;?>][check]" />
													</td>
												<?
												echo "<td>".$row['student']."</td>";
												$fields = array('room','code','teacher');
												$arr = array_combine ( $fields, explode(":", $row['s2p1']) );
												echo "<td>".$arr['room']."</td>";

												$fields = array('lname','fname');
												$arr = array_combine ( $fields, explode(",",$arr['teacher']) );
												$teachername = $arr['fname'] . ' ' . $arr['lname'];
												echo "<td>$teachername</td>";
												?>
													<input type="hidden" name="details[<?=$index;?>][id]" value="<?php echo $index; ?>" />
													<td><input type="text" id="room" name="details[<?=$index;?>][room]" /></td>
													<td><input type="date" id="date" name="details[<?=$index;?>][date]" /></td>
													<td><input type="time" id="time" name="details[<?=$index;?>][time]" /></td>
													<td>
														<ul>
														<?
															$separated = explode(":", $row['accommodations']);
															foreach ($separated as $item) {
																?>
																	<input type="checkbox" name="details[<?=$index;?>][accommodations][]" value="<?php echo $item; ?>"/> <?php echo $item; ?><br>
																<?
															}
														?>
														</ul>
													</td>
												<?
												echo "</tr>";
											}
											elseif (stristr($row['s2p2'], $_POST['course'])) {
												?>
													<tr>
													<td>
														<input type="checkbox" class="array" name="details[<?=$index;?>][check]" />
													</td>
												<?
												echo "<td>".$row['student']."</td>";
												$fields = array('room','code','teacher');
												$arr = array_combine ( $fields, explode(":", $row['s2p2']) );
												echo "<td>".$arr['room']."</td>";
												
												$fields = array('lname','fname');
												$arr = array_combine ( $fields, explode(",",$arr['teacher']) );
												$teachername = $arr['fname'] . ' ' . $arr['lname'];
												echo "<td>$teachername</td>";
												?>
													<input type="hidden" name="details[<?=$index;?>][id]" value="<?php echo $index; ?>" />
													<td><input type="text" id="room" name="details[<?=$index;?>][room]" /></td>
													<td><input type="date" id="date" name="details[<?=$index;?>][date]" /></td>
													<td><input type="time" id="time" name="details[<?=$index;?>][time]" /></td>
													<td>
														<ul>
														<?
															$separated = explode(":", $row['accommodations']);
															foreach ($separated as $item) {
																?>
																	<input type="checkbox" name="details[<?=$index;?>][accommodations][]" value="<?php echo $item; ?>"/> <?php echo $item; ?><br>
																<?
															}
														?>
														</ul>
													</td>
												<?
												echo "</tr>";
											}
											elseif (stristr($row['s2p3'], $_POST['course'])) {
												?>
													<tr>
													<td>
														<input type="checkbox" class="array" name="details[<?=$index;?>][check]" />
													</td>
												<?
												echo "<td>".$row['student']."</td>";
												$fields = array('room','code','teacher');
												$arr = array_combine ( $fields, explode(":", $row['s2p3']) );
												echo "<td>".$arr['room']."</td>";
												
												$fields = array('lname','fname');
												$arr = array_combine ( $fields, explode(",",$arr['teacher']) );
												$teachername = $arr['fname'] . ' ' . $arr['lname'];
												echo "<td>$teachername</td>";
												?>
													<input type="hidden" name="details[<?=$index;?>][id]" value="<?php echo $index; ?>" />
													<td><input type="text" id="room" name="details[<?=$index;?>][room]" /></td>
													<td><input type="date" id="date" name="details[<?=$index;?>][date]" /></td>
													<td><input type="time" id="time" name="details[<?=$index;?>][time]" /></td>
													<td>
														<ul>
														<?
															$separated = explode(":", $row['accommodations']);
															foreach ($separated as $item) {
																?>
																	<input type="checkbox" name="details[<?=$index;?>][accommodations][]" value="<?php echo $item; ?>"/> <?php echo $item; ?><br>
																<?
															}
														?>
														</ul>
													</td>
												<?
												echo "</tr>";
											}
											elseif (stristr($row['s2p4'], $_POST['course'])) {
												?>
													<tr>
													<td>
														<input type="checkbox" class="array" name="details[<?=$index;?>][check]" />
													</td>
												<?
												echo "<td>".$row['student']."</td>";
												$fields = array('room','code','teacher');
												$arr = array_combine ( $fields, explode(":", $row['s2p4']) );
												echo "<td>".$arr['room']."</td>";
												
												$fields = array('lname','fname');
												$arr = array_combine ( $fields, explode(",",$arr['teacher']) );
												$teachername = $arr['fname'] . ' ' . $arr['lname'];
												echo "<td>$teachername</td>";
												?>
													<input type="hidden" name="details[<?=$index;?>][id]" value="<?php echo $index; ?>" />
													<td><input type="text" id="room" name="details[<?=$index;?>][room]" /></td>
													<td><input type="date" id="date" name="details[<?=$index;?>][date]" /></td>
													<td><input type="time" id="time" name="details[<?=$index;?>][time]" /></td>
													<td>
														<ul>
														<?
															$separated = explode(":", $row['accommodations']);
															foreach ($separated as $item) {
																?>
																	<input type="checkbox" name="details[<?=$index;?>][accommodations][]" value="<?php echo $item; ?>"/> <?php echo $item; ?><br>
																<?
															}
														?>
														</ul>
													</td>
												<?
												echo "</tr>";
											}
										}
									}
								?>
								<tr><td colspan="8" align="center"><input type="submit" id="student" class="btn btn-primary" value="Book Selected Students for Assessment"/></td></tr>
								</form>
							</table>
						</div>
					</div>
				</div>
			</div>
		</body>

	<? elseif(null== $user->getUserName()): ?>
	 	<? login(); ?>

	<? else:
		echo "Error";
		endif;
	?>
</html>