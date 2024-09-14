<?php 
include "database.php";

if(isset($_POST["s"])) {
    $search_term = $_POST["s"];

    $sql = "SELECT * FROM staff WHERE TNAME LIKE '{$search_term}%' ";
    $res = $db->query($sql);

    if($res->num_rows > 0) {
        echo "<table border='1px' class='table'>
		<tr>
		<th>S.No</th>
		<th>Name</th>
		<th>Qualification</th>
		<th>Salary</th>
		<th>View</th>
		<th>Delete</th>
	</tr>
	";

        $i = 0;
        while($row = $res->fetch_assoc()) {
            $i++;
            echo "<tr>
			<td>{$i}</td>
			<td>{$row["TNAME"]}</td>
			<td>{$row["QUAL"]}</td>
			<td>{$row["SAL"]}</td>
			<td><a href='staff_view.php?id={$row["TID"]}' class='btnb'>View</a></td>
			<td><a href='staff_delete.php?id={$row["TID"]}' class='btnr'>Delete</a></td>
            </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No Record Found</p>";
    }
}
?>