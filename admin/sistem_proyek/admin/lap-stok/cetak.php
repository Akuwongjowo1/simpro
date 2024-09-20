<?php
session_start();
ob_start();
require_once "../../config/database.php";
// Panggil koneksi database.php untuk koneksi database
// panggil fungsi untuk format tanggal
include "../../config/fungsi_tanggal.php";
// panggil fungsi untuk format rupiah
include "../../config/fungsi_rupiah.php";

$hari_ini = date("d-m-Y");

// ambil data hasil submit dari form
$jekel1    = $_GET['no_kk'];

$no = 1;
if (isset($_GET['no_kk'])) {
    $query = mysqli_query($mysqli, "SELECT * from tb_barang where supplier='$jekel1'") 
                                    or die('Ada kesalahan pada query tampil  : '.mysqli_error($mysqli));
    $count  = mysqli_num_rows($query);

}
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>LAPORAN STOK BARANG</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
    </head>
    <body>
        <div id="title">
            LAPORAN DATA STOK BARANG
        </div>
    <?php  
    if ($tgl_awal==$tgl_akhir) { ?>
    <?php
    } else { ?>
        <div id="title-tanggal">
            Tanggal <?php echo tgl_eng_to_ind($tgl1); ?> s.d. <?php echo tgl_eng_to_ind($tgl2); ?>
        </div>
    <?php
    }
    ?>
        
        <hr><br>
        <div id="isi">
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">
                        <th height="20" align="center" valign="middle">NO.</th>
                        <th height="20" align="center" valign="middle">KODE BARANG</th>
                        <th height="20" align="center" valign="middle">NAMA BARANG</th>
                       
                        <th height="20" align="center" valign="middle">HARGA</th>
                             <th height="20" align="center" valign="middle">SATUAN</th>
                           <th height="20" align="center" valign="middle">STOK</th>
                   
                     <th height="20" align="center" valign="middle">SUPPLIER</th>
                      
                    </tr>
                </thead>
                <tbody>
<?php
    // jika data ada
    if($count == 0) {
        echo "  <tr>
                    <td width='40' height='13' align='center' valign='middle'></td>
                    <td width='120' height='13' align='center' valign='middle'></td>
                    <td width='150' height='13' align='center' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>
                    <td style='padding-left:5px;' width='155' height='13' valign='middle'></td>
					<td style='padding-left:5px;' width='155' height='13' valign='middle'></td>
					<td style='padding-left:5px;' width='155' height='13' valign='middle'></td>
                   
                   
					 
                </tr>";
    }
    // jika data tidak ada
    else {
        // tampilkan data
        while ($data = mysqli_fetch_assoc($query)) {
            

            // menampilkan isi tabel dari database ke tabel di aplikasi
            echo "  <tr>
                       <td width='40' height='13' align='center' valign='middle'>$no</td>
                        <td width='100' height='13' align='center' valign='middle'>$data[kd_barang]</td>
                        <td style='padding-left:5px;' width='150' height='13' valign='middle'>$data[nama]</td>
                       
                        <td width='80' height='13' align='center' valign='middle'>$data[harga]</td>
						 <td style='padding-left:5px;' width='100' height='13' valign='middle'>$data[satuan]</td>
						  <td width='50' height='13' align='center' valign='middle'>$data[stok]</td>
						  <td width='80' height='13' align='center' valign='middle'>$data[supplier]</td>
                       
                      
						
                    </tr>";
            $no++;
        }
    }
?>	
                </tbody>
            </table>
        </div>
    </body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="LAPORAN DATA STOK.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.($content).'</page>';
// panggil library html2pdf
require_once('../../assets/plugins/html2pdf_v4.03/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('P','F4','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>