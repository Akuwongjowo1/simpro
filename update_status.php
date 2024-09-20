<?php
// Deklarasi parameter koneksi database
$server   = "localhost";
$username = "root";
$password = "";
$database = "db_proyek";

// Koneksi database
$mysqli = new mysqli($server, $username, $password, $database);

// Cek koneksi
if ($mysqli->connect_error) {
    die('Koneksi Database Gagal : '.$mysqli->connect_error);
}

// Periksa apakah ada permintaan POST yang dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Persiapkan pernyataan SQL UPDATE
    $sql = "UPDATE nota SET tujuan = '0'";

    // Persiapkan pernyataan SQL
    $stmt = $mysqli->prepare($sql);

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
    // Jika permintaan bukan POST
    echo json_encode(array("status" => "error", "message" => "Invalid request method."));
}

// Tutup koneksi ke database
$mysqli->close();
?>
