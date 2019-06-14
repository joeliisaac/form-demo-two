<!DOCTYPE html>
<html>
<head>
	<title>Team Peer Evaluation - Processor</title>

	<style>
		div {
			margin-top: 20px;
			margin-bottom: 20px;
		}
	</style>
</head>
<body>

<?php




$dbuser = 'root';
$dbpass = 'inst377inst377';
$dbname = 'evaluationform';

$conn = new mysqli("localhost", $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
  die('Connection Failed: ' . $conn->connect_error);
}

  $teamname = $_POST['teamname'];

 $starttime = $_POST['starttime'];

 $endtime = $_POST['endtime'];

$memberone = $_POST['memberone'];

$membertwo = $_POST['membertwo'];

 $memberthree = $_POST['memberthree'];

  $memberfour = $_POST['memberfour'];

  $memberfive = $_POST['memberfive'];

  $participationone = $_POST['participationone'];

 $participationtwo = $_POST['participationtwo'];

$participationthree = $_POST['participationthree'];

  $participationfour = $_POST['participationfour'];

$participationfive = $_POST['participationfive'];

 $note = $_POST['note'];

 $overall = $_POST['overall'];




/* SQL statement to save the values into the database. Using HEREDOC syntax
 * for multiline strings.
 */
 $sql = <<<SAVESQL

 INSERT INTO evaluationform
  (teamname, starttime, endtime, memberone,membertwo,memberthree,memberfour,memberfive, participationone,
   participationtwo,participationthree,
  participationfour,participationfive,note,overall)
  VALUES ('$teamname', '$starttime', '$endtime', '$memberone', '$membertwo', '$memberthree', '$memberfour', '$memberfive',
  '$participationone', '$participationtwo','$participationthree','$participationfour','$participationfive','$note','$overall');
SAVESQL;



if ($conn->query($sql)) {
  $last_id = $conn->insert_id;

  $t1 = strtotime($starttime);
  $t2 = strtotime($endtime);
$hours = ($t2 - $t1)/60;





  echo " Team name: ". $teamname.  "</br>";
  echo "overall grade: ". $overall."</br>";
  echo "duration: " .$hours. "</br>";
  echo "1st member: ". $memberone . ", participation: ". $participationone. ", final grade between ".$overall. " and " . $participationone. "</br>";
  echo "2nd member: ". $membertwo . ", participation: ". $participationtwo.", final grade between ".$overall. " and " . $participationtwo. "</br>";
  echo "3rd member: ". $memberthree .", participation: ". $participationthree. ", final grade between ".$overall. " and " . $participationthree. "</br>";
  echo "4th member: ". $memberfour . ", participation: ". $participationfour. ", final grade between ".$overall. " and " . $participationfour."</br>";
  echo "5th member: ". $memberfive . ", participation: ". $participationfive. ", final grade between ".$overall. " and " . $participationfive."</br>";
  echo "notes: ". $note;



} else {
  echo "Error: $conn->error<br /><pre>$sql</pre><br />";
}
/* close the database connection */
$conn->close();

 ?>
</body>
</html>
