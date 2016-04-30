<?php
// Create connection
$conn = new mysqli("localhost", "root","", "promopagedb");
function connectToDB($conn){
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
}

function sendFormsToDB($conn, $name, $email, $message){
	$addMessage = "INSERT INTO contact (`username`, `email`, `message`)
	VALUES ('$name', '$email', '$message')";

	if ($conn->query($addMessage) === TRUE) {
	    echo "<br><br><br><center><p>Your message has been recorded!</p></center>";
	    echo "<center><a href='index.html'>Go Back!</a></center>";
	} else {
	    echo "Error: " . $addMessage . "<br>" . $conn->error;
	}
	$conn->close();
}

function sendPollToDB($conn, $userSelection){

	$sql = "SELECT `screen`, `water`, `newDesign`,`charging` FROM poll";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    $col = $result->fetch_assoc();
	    $voteUpdate = $col[$userSelection];
	    $voteUpdate++;
	    $sql = "UPDATE poll SET $userSelection='$voteUpdate' WHERE id=0";
	    $conn->query($sql);
	} else {
	    echo "Failed to send to database";
	}
}

function showPollResults($conn){
$sql = "SELECT `screen`, `water`, `newDesign`,`charging` FROM poll";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    $col = $result->fetch_assoc();
	    $total = 0;

	    foreach ($col as $key => $value) {
	    	$total = $value+$total;
	    }

	    $questionArray = array(
	    	"screen" => "5.5 inches for the edge version? I miss small screens",
	    	"water" => "It's cool they brought back water resistance, without going back to plastic",
	    	"newDesign" => "Would have liked to see bold new design",
	    	"charging" => "Nice to see wireless charging is faster now"
	    );  

	    arsort($col);
	    $i = 0;
		echo("<br><br>br><br><br><center><p>Passion Poll 1: What's your opinion on the Galaxy s7?</p></center>");
	    echo ("<br><br><br><br><br><center><p>RESULTS</p></center>");

	    foreach($col as $x => $x_value) {
	    	$i++;
		    echo "<center><p>"."$i. " . $questionArray[$x]. " - ".round(($x_value/$total)*100, 1)."%"."</p></center>";
		}

		echo "<center><a href='index.html'>Go Back!</a></center>";

	} else {
	    echo "0 results";
	}
	$conn->close();
}

function printMessages($conn){
	$sql = "SELECT `username`, `email`, `message` FROM contact";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        echo "User: " . $row["username"]. "<br> E-mail: " . $row["email"]. " <br>Message: " . $row["message"]. "<br><br>";
	    }
	} else {
	    echo "0 results";
	}
	$conn->close();
}
?>