<!-- HTML file -->
<html lang="en">
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<br>

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">
      <i class="fa fa-edit"></i> Tambah Data Pemesanan</h3>
  </div>
  
    <div class="panel-body">
      <form action="admin/pemesanan/proses.php" method="POST">
        <div class="control-group after-add-more">

          <label>NO Invoice</label>

          <?php
            // Include database connection file
            include 'config/database.php';

            // Fetch the last invoice number from the database
            $sql_last_invoice = "SELECT MAX(kd_pemesanan) AS last_invoice FROM pemesanan";
            $result_last_invoice = $mysqli->query($sql_last_invoice);

            $last_invoice_number = 1; // Default value if there are no existing invoices

            if ($result_last_invoice->num_rows > 0) {
                $row_last_invoice = $result_last_invoice->fetch_assoc();
                $last_invoice_number = $row_last_invoice['last_invoice'] + 1;
            }

            // Concatenate "INV" prefix
            $invoice_with_prefix = $last_invoice_number;
          ?>

          <input type="text" name="no[]" class="form-control" value="<?php echo $invoice_with_prefix; ?>" readonly>
          <label>Nama Produk</label>
          <select name="nama[]" class="form-control">
            <?php
              // Fetch data from tb_barang
              $sql = "SELECT kd_barang, nama FROM tb_barang";
              $result = $mysqli->query($sql);

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo '<option value="' . $row['kd_barang'] . '">' . $row['nama'] . '</option>';
                }
              } else {
                echo "No data found";
              }
            ?>
          </select>
          <label>Jumlah</label>
          <input type="text" name="jumlah[]" class="form-control">
          
          <label>Satuan</label>
          <select name="satuan[]" class="form-control">
            <option value="Pcs">Pcs</option>
            <option value="Unit">Unit</option>
            <option value="Box">Box</option>
            <!-- Add other unit options as needed -->
          </select>

          <br>
          <button class="btn btn-success add-more" type="button">
            <i class="glyphicon glyphicon-plus"></i> Add
          </button>
          <hr>
        </div>
        <button class="btn btn-success" type="submit">Submit</button>
        <a href="?page=pemesanan-pengawas2" title="Kembali" class="btn btn-secondary">Batal</a>
      </form>

      <div class="copy hide">
        <div class="control-group">
          <label>NO Invoice</label>
          <?php
            // Include database connection file
            include 'config/database.php';

            // Fetch the last invoice number from the database
            $sql_last_invoice = "SELECT MAX(kd_pemesanan) AS last_invoice FROM pemesanan";
            $result_last_invoice = $mysqli->query($sql_last_invoice);

            $last_invoice_number = 1; // Default value if there are no existing invoices

            if ($result_last_invoice->num_rows > 0) {
                $row_last_invoice = $result_last_invoice->fetch_assoc();
                $last_invoice_number = $row_last_invoice['last_invoice'] + 1;
            }

            // Concatenate "INV" prefix
            $invoice_with_prefix = $last_invoice_number;
          ?>

          <input type="text" name="no[]" class="form-control" value="<?php echo $invoice_with_prefix; ?>" readonly>
          <label>Nama Produk</label>
          <select name="nama[]" class="form-control">
            <?php
              // Output options for the cloned section
              $result = $mysqli->query($sql);

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo '<option value="' . $row['kd_barang'] . '">' . $row['nama'] . '</option>';
                }
              } else {
                echo "No data found";
              }
            ?>
          </select>
          <label>Jumlah</label>
          <input type="text" name="jumlah[]" class="form-control">

          <label>Satuan</label>
          <select name="satuan[]" class="form-control">
            <option value="Pcs">Pcs</option>
            <option value="Unit">Unit</option>
            <option value="Box">Box</option>
            <!-- Add other unit options as needed -->
          </select>

          <br>
          <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
          <hr>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {
    $(".add-more").click(function () {
      var html = $(".copy").html();
      $(".after-add-more").after(html);
    });

    // Remove functionality remains the same
    $("body").on("click", ".remove", function () {
      $(this).parents(".control-group").remove();
    });
  });
</script>
</body>
</html>
