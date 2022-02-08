<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!doctype html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="<?=site_url('assets/img/logo.png')?>">
        <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1">
        <title><?=$title?></title>
        <?=link_tag('assets/css/bootstrap.css?ver=3.3.7')?>
        <?=link_tag('assets/css/style.css?ver=1.0.0')?>
    </head>
    <body onload="window.print()">
            <div class="tc">
                <table id="status" class="table table-bordered table-striped">
                <thead>
                 <tr>
                    <th>No.</th>
                    <th>Nama BS</th>
                    <th>Tanggal</th>
                    <th>Plastik/kg</th>
                    <th>Besi/kg</th>
                    <th>Kertas/kg</th>
                    <th>Total/Kg</th>
                    <th>Total Perolehan/Rp</th>
                    <th>Status Pembayaran</th>
                    <th>Options</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                    $no = 1; 
                    foreach($data_cetak as $hasil){ 
                ?>

                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $hasil->nama_bs ?></td>
                    <td><?php echo $hasil->tgl ?></td>
                    <td><?php echo $hasil->plas ?></td>
                    <td><?php echo $hasil->bes ?></td>
                    <td><?php echo $hasil->ker ?></td>
                    <td><?php echo $hasil->tot ?></td>
                    <td><?php echo $hasil->h_tot ?></td>
                    <td><?php echo $hasil->p_status ?></td>
                    <td>
                        <a href="" class="btn btn-sm btn-danger">Cetak</a>
                        <a href="" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                  </tr>

                <?php } ?>

                </tbody>
                <tfoot>
                <tr>
                  <th></th>
                  <th></th>
                  <th class="bg-navy color-palette">Total Seluruh Sampah:</th>
                  <th class="bg-navy color-palette">  <!-- Plastik -->
                    <?php
                  $sum = 0;
                  foreach($data_cetak as $row){
                   $sum += $row->plas;
                  }
                  echo number_format($sum, 0);
                  ?> Kg</th>
                  <th class="bg-navy color-palette">  <!-- Besi -->
                    <?php
                  $sum = 0;
                  foreach($data_cetak as $row){
                   $sum += $row->bes;
                  }
                  echo number_format($sum, 0);
                  ?> Kg</th>
                  <th class="bg-navy color-palette">  <!-- Kertas -->
                    <?php
                  $sum = 0;
                  foreach($data_cetak as $row){
                   $sum += $row->plas;
                  }
                  echo number_format($sum, 0);
                  ?> Kg</th>
                  <th class="bg-navy color-palette">  <!-- Total -->
                    <?php
                  $sum = 0;
                  foreach($data_cetak as $row){
                   $sum += $row->tot;
                  }
                  echo number_format($sum, 0);
                  ?> Kg</th>
                  <th class="bg-navy color-palette"> Rp. <!-- Total -->
                    <?php
                  $sum = 0;
                  foreach($data_cetak as $row){
                   $sum += $row->h_tot;
                  }
                  echo number_format($sum, 0);
                  ?>;</th>
                </tr>
                </tfoot>
              </table>
            </div>
        </div>
    </body>
</html>
