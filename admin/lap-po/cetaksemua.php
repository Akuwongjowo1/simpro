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
$jekel1    = $_GET['no_kk'];
// ambil data hasil submit dari form

 $sql = mysqli_query($mysqli, "SELECT * from profil ") 
  or die('Ada kesalahan pada query tampil  : '.mysqli_error($mysqli));
  while ($data= $sql->fetch_assoc()) {
	  $logo=$data['foto'];
    $nama=$data['nama'];
	$alamat=$data['alamat'];
	 $direktur=$data['direktur'];
	  $telpon=$data['telpon'];
	   $fax=$data['fax'];
	    $email=$data['email'];
		 $npwp=$data['npwp'];
		  $rek=$data['rek'];
  

$no = 1;
if (isset($_GET['no_kk'])) {
       $query = mysqli_query($mysqli, "SELECT a.kode,a.nama,a.po, b.kproyek,b.material,b.kebutuhan,b.qty,b.harga,b.total,b.satuan
                                            FROM proyek as a INNER JOIN pekerjaan as b ON b.kproyek=a.kode where b.kproyek='$jekel1'") 
                                    or die('Ada kesalahan pada query tampil  : '.mysqli_error($mysqli));
       $count  = mysqli_num_rows($query);
}
  }
?>

<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>PURCHASE ORDER</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
    </head>
    <body>
        <div id="title">
          <?php echo $nama; ?>        </div>
<hr><br>
    <table border="0.3" cellspacing="0" cellpadding="0">
      <tr>
        <td width="213" valign="top"><p>PURCHASE ORDER TO:<br>
          Perkasa Teknik Jln.Hayam Wuruk Gedung HWI Lantai 1<br>
          Jakarta Pusat</p>
          <p>Phone: <?php echo $telpon; ?><br>
        Email: <?php echo $email; ?></p></td>
        <td width="107" valign="top"><p>PO NUMBER:<?php echo $data['po']; ?><br>
          DATE:<?php echo tgl_eng_to_ind("$hari_ini"); ?></p></td>
        <td width="160" valign="top"><p>SHIP TO:</p></td>
        <td width="160" valign="top"><p>PAYMENT TO:<br>
        <?php echo $rek; ?></p></td>
      </tr>
      <tr>
        <td colspan="4" valign="top"><p>TERM OF DELIVERY 21Days</p></td>
      </tr>
    </table>
<div id="isi">
        <table width="100%" border="0.3" cellpadding="0" cellspacing="0">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">
                        <th height="20" align="center" valign="middle">NO.</th>
                        <th height="20" align="center" valign="middle">Kebutuhan</th>
                        <th height="20" align="center" valign="middle">Qty</th>
                        <th height="20" align="center" valign="middle">Unit</th>
                      <th height="20" align="center" valign="middle">Price</th>
                        <th height="20" align="center" valign="middle">Total Price</th>
                        <th height="20" align="center" valign="middle">Material</th>
                       
                       
                    </tr>
                </thead>
                <tbody>
<?php
    // jika data ada
    if($count == 0) {
        echo "  <tr>
                    <td width='40' height='13' align='center' valign='middle'></td>
                    <td width='100' height='13' align='center' valign='middle'></td>
                     <td width='80' height='13' align='center' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>
                    <td style='padding-left:5px;' width='155' height='13' valign='middle'></td>
                    <td style='padding-right:10px;' width='100' height='13' align='right' valign='middle'></td>
					  <td style='padding-right:10px;' width='149' height='13' align='right' valign='middle'></td>
                    
					 
                </tr>";
    }
    // jika data tidak ada
    else {
        // tampilkan data
        while ($data = mysqli_fetch_assoc($query)) {
            

            // menampilkan isi tabel dari database ke tabel di aplikasi
            echo "  <tr>
                       <td width='40' height='13' align='center' valign='middle'>$no</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[material]</td>
                        <td style='padding-left:5px;' width='80' height='13' valign='middle'>$data[qty]</td>
                        <td style='padding-left:5px;' width='80' height='13' valign='middle'>$data[satuan]</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[harga]</td>
                        <td width='100' height='13' align='center' valign='middle'>$data[total]</td>
						  <td width='149' height='13' align='center' valign='middle'>$data[kebutuhan]</td>
                      
						
                    </tr>";
					
											$no1++;
											
											$total_masuk3=$data[total];
                                            $hitung3+=$total_masuk3;
											
										
            $no++;
        }
    }
?>	
                </tbody>
      </table>
        <table width="501" border="0.3" cellpadding="0" cellspacing="0">
          
          <tr>
            <td width="406" valign="top"><p align="right">DP </p></td>
            <td width="89" valign="top"><p>&nbsp;</p></td>
          </tr>
          <tr>
            <td width="406" valign="top"><p align="right">GRAND TOTAL</p></td>
            <td width="89" valign="top"><p>Rp.<?php echo number_format($hitung3);?></p></td>
          </tr>
        </table>
</div>
    <form name="form1" method="post" action="">
      <p>Note:</p>
      <p style="text-align: justify">1. Apabila  barang tidak sesuai dengan pesanan maka dilakukan pengembalian/penggantian  barang sesuai dengan PO sebagaimana mestinya<br>
        2. Teknis pembayaran dilakukan DP 70% dan pelunasan ketika  barang diterima<br>
        3. Mohon PO ini setelah ditanda tatangani dikembalikan ke<br>
        4. Apabila  barang dikirim melebihi waktu yang telah disepakati (21hari) dan barang tidak  sesuai dengan spesifikasi yang kita minta maka besedia kena pinalty sebesar 50%  dari total PO</p>
<p style="text-align: justify">&nbsp;</p>
    </form>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p><?php echo tgl_eng_to_ind("$hari_ini"); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;signature:<br>
Sgnature:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $nama; ?></p>
    <p>&nbsp;</p>
    <p>Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <?php echo $direktur; ?><br>
      Position:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Direktur:</p>
    </body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="LAPORAN PO.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
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
