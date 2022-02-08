<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">

<thead>

<tr>

 <th>No</th>

 <th>Nama Bank Sampah</th>

 <th>Tanggal</th>

 <th>Plastik</th>

 <th>Besi</th>

 <th>Kertas</th>

 <th>Total</th>

 <th>Total Perolehan</th>

 <th>Pembayaran</th>

 </tr>

</thead>

<tbody>

<?php $i=1; foreach($excel as $excel) { ?>

<tr>

 <td><?php echo $i++ ?></td>

 <td><?php echo $excel->nama_bs ?></td>

 <td><?php echo $excel->tgl ?></td>

 <td><?php echo $excel->plas ?></td>

 <td><?php echo $excel->bes ?></td>

 <td><?php echo $excel->ker ?></td>

 <td><?php echo $excel->tot ?></td>

 <td><?php echo $excel->h_tot ?></td>

 <td><?php echo $excel->p_status ?></td>

 </tr>

<?php $i++; } ?>

</tbody>


</table>