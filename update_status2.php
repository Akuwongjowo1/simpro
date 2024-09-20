<?php
// deklarasi parameter koneksi database
$server   = "localhost";
$username = "root";
$password = "";
$database = "db_proyek";

// koneksi database
$mysqli = new mysqli($server, $username, $password, $database);

// cek koneksi
if ($mysqli->connect_error) {
    die('Koneksi Database Gagal : '.$mysqli->connect_error);
}

// Periksa apakah ada permintaan POST yang dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pastikan data id_member tersedia
    if (isset($_POST['id_member'])) {
        // Tangkap data id_member dari permintaan POST
        $id_member = $_POST['id_member'];

        // Persiapkan pernyataan SQL UPDATE
        $sql = "UPDATE nota SET pesan = 0 WHERE id_member = ?";

        // Persiapkan pernyataan SQL dengan parameter
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $id_member);

        // Eksekusi pernyataan SQL
        if ($stmt->execute()) {
            // Berhasil memperbarui status
            echo json_encode(array("status" => "success", "message" => "Status updated successfully."));
        } else {
            // Gagal memperbarui status
            echo json_encode(array("status" => "error", "message" => "Failed to update status: " . $mysqli->error));
        }

        // Tutup statement
        $stmt->close();
    } else {
        // Jika data id_member tidak tersedia dalam permintaan POST
        echo json_encode(array("status" => "error", "message" => "Missing id_member parameter."));
    }
} else {
    // Jika permintaan bukan POST
    echo json_encode(array("status" => "error", "message" => "Invalid request method."));
}
?>
