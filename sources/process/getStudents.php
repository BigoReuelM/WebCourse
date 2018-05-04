<?php 
	include('fragments/db.php');

	$query = "SELECT * FROM users WHERE user_role like 'student'";

	$result = $con->query($query);

	if ($result->num_rows > 0) {
		echo "<table class='table'>	
			<thead>
				<tr>
					<th scope='col'>#</th>
					<th scope='col'>First Name</th>
					<th	scope='col'>Middle Name</th>
					<th	scope='col'>Last Name</th>
				</tr>
			</thead>
			<tbody>";
		$colIndex = 1;
		while($data = $result->fetch_assoc()){
			echo "<tr>";
			echo "<th scope='row'>" . $colIndex . "</th>";
			echo "<td>" . $data['firstName'] . "</td>";
			echo "<td>" . $data['middleName'] . "</td>";
			echo "<td>" . $data['lastName'] . "</td>"; 
			echo "</tr>";
			$colIndex++;
		}
		echo "</tbody>
			</table>";	
	}else{
		echo "0 results";
	}
?>