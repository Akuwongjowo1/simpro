<!-- HTML file -->
<html lang="en">
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<br>
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">Tambah Data Produk</div>
    <div class="panel-body">
      <!-- membuat form  -->
      <!-- gunakan tanda [] untuk menampung array  -->
      <form action="modules/produk/proses.php" method="POST">
        <div class="control-group after-add-more">
          <label>NO Invoice</label>
          <input type="text" name="no[]" class="form-control">
          <label>Nama Produk</label>
          <select name="nama[]" class="form-control">
            <!-- Options will be dynamically populated here -->
          </select>
          <label>Jumlah</label>
          <input type="text" name="jumlah[]" class="form-control">
          <div class="form-group row">
            
        <label class="col-sm-2 col-form-label">Satuan</label>
        <div class="col-sm-4">
          <select name="kategori" id="level" class="form-control">
            <option>- Pilih -</option>
            <option>Pcs</option>
                        <option>Unit</option>
                        <option>Box</option>
                        <option>Botol</option>
                        <option>Kotak</option>
            <option selected="selected">Pcs</option>
          </select>
          <br>
          <button class="btn btn-success add-more" type="button">
            <i class="glyphicon glyphicon-plus"></i> Add
          </button>
          <hr>
        </div>
        <button class="btn btn-success" type="submit">Submit</button>
      </form>

      <!-- class hide membuat form disembunyikan  -->
      <!-- hide adalah fungsi bootstrap 3, klo bootstrap 4 pake invisible  -->
      <div class="copy hide">
        <div class="control-group">
          <label>NO Invoice</label>
          <input type="text" name="no[]" class="form-control">
          <label>Nama Produk</label>
          <select name="nama[]" class="form-control">
            <!-- Options will be dynamically populated here -->
          </select>
          <label>Jumlah</label>
          <input type="text" name="jumlah[]" class="form-control">
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
      fetchNamaProdukOptions();
    });

    fetchNamaProdukOptions();

    function fetchNamaProdukOptions() {
      $.ajax({
        url: 'get_barang.php', // Update with the correct path to your server-side script
        type: 'GET',
        dataType: 'json',
        success: function (data) {
          $("select[name='nama[]']").empty();
          $.each(data, function (index, item) {
            $("select[name='nama[]']").append('<option value="' + item.id + '">' + item.nama + '</option>');
          });
        },
        error: function (xhr, status, error) {
          console.error('Error fetching data:', error);
        }
      });
    }

    $("body").on("click", ".remove", function () {
      $(this).parents(".control-group").remove();
    });
  });
</script>
</body>
</html>
