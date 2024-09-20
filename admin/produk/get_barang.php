<!-- PHP server-side script (get_barang.php) -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_proyek";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT kd_barang, nama FROM tb_barang"; // Change 'id' to 'kd_barang'
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $data = array();

  while ($row = $result->fetch_assoc()) {
    $data[] = $row;
  }

  header('Content-Type: application/json');
  echo json_encode($data);
} else {
  echo "No data found";
}

$conn->close();
?>