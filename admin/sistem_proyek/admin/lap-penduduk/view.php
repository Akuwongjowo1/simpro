<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha256-916EbMg70RQy9LHiGkXzG8hSg9EdNy97GazNG/aiY1w=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha256-siyOpF/pBWUPgIcQi17TLBkjvNgNQArcmwJB8YvkAgg=" crossorigin="anonymous" />




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha256-bqVeqGdJ7h/lYPq6xrPv/YGzMEb6dNxlfiTUHSgRCp8=" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <br>
    <h4>Laporan Data Penduduk</h4>
<form role="form" class="form-horizontal" method="GET" action="index.php" target="_blank">
        <div class="form-group">
            <label>Tanggal:</label>
            <input type="text"  name="tgl_awal"  class="form-control datepicker"  required/>
            
        </div>
        <div class="form-group">
            <label>S/D:</label>
            <input type="text"  name="tgl_akhir"  class="form-control datepicker"  required/>
            
        </div>
    <script type="text/javascript">
        $(function(){
            $(".datepicker").datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
                todayHighlight: true,
            });
        });
    </script>
    
  <div class="form-group">
              
                <button type="submit" class="btn btn-primary btn-social btn-submit">
                  <i class="fa fa-print"></i> Cetak
                </button>
              </div>
</form>

</body>
</html>