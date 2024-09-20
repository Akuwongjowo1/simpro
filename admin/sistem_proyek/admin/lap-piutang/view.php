<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../../assets/datepicker/js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" href="../../assets/datepicker/css/datepicker.css">
</head>
<body>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-file-text-o icon-title"></i> Laporan Data KK
  </h1>
  <ol class="breadcrumb">
  
   
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">

      <!-- Form Laporan -->
      <div class="box box-primary">
        <!-- form start -->
        <form role="form" class="form-horizontal" method="GET" action="cetak.php" target="_blank">
          <div class="box-body">

             <div class="form-group">
            <label>Periode:</label>
            <input type="text"  name="tgl_awal"  class="form-control datepicker"  required/>
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
           </div>
           <label>SD:</label>
            <input type="text"  name="tgl_akhir"  class="form-control datepicker"  required/>
        
          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-1 col-sm-11">
                <button type="submit" class="btn btn-primary btn-social btn-submit">
                  <i class="fa fa-print"></i> Cetak
                </button>
              </div>
            </div>
          </div>
        </form>
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content -->