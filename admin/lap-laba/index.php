<?php 
include "fungsi.php";
include "../../inc/koneksi.php";

$sql = $koneksi->query("SELECT * from anggaran order by kode asc") or die ($koneksi->error);

$sql1 = $koneksi->query("select * from hs order by kode_hs asc") or die ($koneksi->error);

$sql2 = $koneksi->query("select * from hb order by kode asc") or die ($koneksi->error);

$sql3 = $koneksi->query("select * from piutang order by kode_piutang asc") or die ($koneksi->error);
?>
    

<style type="text/css">
<!--
.style1 {font-size: 18px}
-->
</style>
<body onLoad="javascript:print()">   
                            <table width="100%">
							<tr>
							<td><div align="center">
							  <h4 align="center" class="style1">LAPORAN LABA RUGI</h4></td>
							</tr>
							</table>
                       
<form name="sda" role="form" method="post">
                        <div class="panel-body">
						 <div class="col-lg-12">
                        	<div class="row">
							
										<br>
						      <div class="dataTable_wrapper">
                                <table width="100%" border="1" class='table table-bordered table-striped'>
                                 <strong style="text-align: left">Data Kas Anggaran</strong>
                                    <thead>
                                        <tr>
                                            <th bgcolor="#CCCCCC">No</th>
                                            <th bgcolor="#CCCCCC">Kode</th>
											<th bgcolor="#CCCCCC">Jenis</th>
											
                                            <th bgcolor="#CCCCCC">Nominal</th>
                                            <th bgcolor="#CCCCCC">Keterangan</th>
											
											
											
                                      </tr>
                                    </thead>
                                    <tbody>
										<?php
										$no1=1;
										$total=0;
										
										while ($data= $sql->fetch_assoc()) {
										
											
										?>	
			   
										<tr>
											<td ><?php echo $no1; ?></td>
											 
										  <td><?php echo $data['kode']; ?></td>
											<td><?php echo $data['jenis'];?></td>
											 
											 <td><?php echo  "Rp.".number_format($data['nominal']).",-" ?></td>
											 <td><?php echo $data['ket']; ?></td>
											
										</tr>
										<?php
											$no1++;
											$total=$total+$data['jumlah'];
											$total_masuk=$data[nominal];
                                            $hitung+=$total_masuk;
										}
										?>
									</tbody>
                                </table>
                                <p>Total Kas Anggaran: <strong>Rp.<?php echo number_format($hitung);?>,-</strong></p>
<strong style="text-align: center">Data Hutang Supplier</strong>
<div class="dataTable_wrapper">
        <table width="100%" border="1" class='table table-bordered table-striped'>
                                    <thead>
                                        <tr>
                                            <th bgcolor="#CCCCCC">No</th>
                                            <th bgcolor="#CCCCCC">Kode Supplier</th>
											<th bgcolor="#CCCCCC">Jumlah</th>
											<th bgcolor="#CCCCCC">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										$no1=1;
										$total=0;
										while ($data1= $sql1->fetch_assoc()) {
										
										?>	
			   
										<tr>
											<td ><?php echo $no1; ?></td>
											
											  <td><?php echo $data1['ksupplier']; ?></td>
											
										
											 <td><?php echo  "Rp.".number_format($data1['nominal']).",-" ?></td>
											 <td><?php echo $data1['keterangan']; ?></td>
											
										</tr>
										<?php
											$no1++;
											$total=$total+$data['jumlah'];
											$total_masuk1=$data1[nominal];
                                            $hitung1+=$total_masuk1;
										}
										?>
									</tbody>
        </table>
                                Total 
						      Hutang Supplier: <strong>Rp.<?php echo number_format($hitung1);?>,-</strong></div>
                              <p>&nbsp;</p>
                              <strong style="text-align: center">Data Hutang Bank DLL</strong>
                              
                              <div class="dataTable_wrapper">
        <table width="100%" border="1" class='table table-bordered table-striped'>
                                    <thead>
                                        <tr>
                                            <th bgcolor="#CCCCCC">No</th>
                                            <th bgcolor="#CCCCCC">Kode</th>
											<th bgcolor="#CCCCCC">Nominal</th>
											<th bgcolor="#CCCCCC">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										$no1=1;
										$total=0;
										while ($data2= $sql2->fetch_assoc()) {
										
										?>	
			   
										<tr>
											<td ><?php echo $no1; ?></td>
											
											  <td><?php echo $data2['kode']; ?></td>
											
										
											 <td><?php echo  "Rp.".number_format($data2['nominal']).",-" ?></td>
											 <td><?php echo $data2['ket']; ?></td>
											
										</tr>
										<?php
											$no1++;
											$total=$total+$data['jumlah'];
											$total_masuk2=$data2[nominal];
                                            $hitung2+=$total_masuk2;
										}
										?>
									</tbody>
        </table>
                                Total 
						      Hutang Bank DLL:<strong>Rp.<?php echo number_format($hitung2);?>,-</strong>
                              
                               <p><strong style="text-align: center">Data Piutang</strong>
                                </p>
                                <div class="dataTable_wrapper">
        <table width="100%" border="1" class='table table-bordered table-striped'>
                                    <thead>
                                        <tr>
                                            <th bgcolor="#CCCCCC">No</th>
                                            <th bgcolor="#CCCCCC">Kode Proyek</th>
											<th bgcolor="#CCCCCC">Jumlah</th>
											<th bgcolor="#CCCCCC">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										$no1=1;
										$total=0;
										while ($data3= $sql3->fetch_assoc()) {
										
										?>	
			   
										<tr>
											<td ><?php echo $no1; ?></td>
											
											  <td><?php echo $data3['kproyek']; ?></td>
											
										
											 <td><?php echo  "Rp.".number_format($data3['nominal']).",-" ?></td>
											 <td><?php echo $data3['keterangan']; ?></td>
											
										</tr>
										<?php
											$no1++;
											$total=$total+$data['jumlah'];
											$total_masuk3=$data3[nominal];
                                            $hitung3+=$total_masuk3;
											$labarugi=$hitung-$hitung1-$hitung2+$hitung3;
										}
										?>
									</tbody>
        </table>
                                Total 
						      Hutang Supplier: <strong>Rp.<?php echo number_format($hitung3);?>,-</strong></div>
                              
							</div>
						  </div>
						
							
							 
							  <div class="col-lg-12 col-md-4" align="right">
							    <table width="100%" border="1">
							      <tr>
                                  
							        <td bgcolor="#00FF00">Total Laba/Rugi</td>
							        <td bgcolor="#00FF00"> <strong>Rp.<?php echo number_format($labarugi);?>,-</strong></td>
						          </tr>
						        </table>
							    
							  </div>
</form>
							
                            <!-- /.row (nested) -->
