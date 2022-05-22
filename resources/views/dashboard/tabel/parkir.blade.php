<link rel="stylesheet" href="assets/datatables/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="assets/datatables/css/buttons.dataTables.min.css">

<h5><i class="fa fa-info-circle" aria-hidden="true"></i> Ketik/Scan <b><u>Kode Parkir</u></b> di Kolom Search Laku tekan Tombol Bayar</h5>
<table id="cobaeks" data-show-export="true"  class="table table-striped table-hover table-bordered nowrap">
    <thead>
        <tr>
            <th>NO</th>
            <th>AKSI</th>
            <th>Kode Parkir</th>
            <th>No Polisi</th>
            <th>Jenis Kendaraan</th>
            <th>Waktu Masuk</th>
            <th>Waktu Keluar</th>
            <th>Status Parkir</th>
            <th>Tarif</th>
            <th>Lama Parkir</th>
            <th>Petugas</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $no=1;
            foreach ($list_parkir as $datax) {
                $status = $datax['status'];
                if ($status==1) {
                    $statusnya = "MASIH PARKIR";
                    $warna = "#ffb0b0";
                }else{
                    $warna = "#4fdd4f";
                    $statusnya = "Keluar PARKIR";
                }

                if ($datax['lama_parkir']!='') {
                    $lama   = $datax['lama_parkir']." JAM";
                }else{
                    $lama   = '-';
                }
                ?>
                <tr id="<?=$datax['kode_parkir']?>" data-no_polisi='<?= $datax['no_polisi'] ?>' data-jenis_kendaraan='<?= $datax['jenis_kendaraan'] ?>' data-waktu_masuk='<?= $datax['waktu_masuk'] ?>' data-waktu_keluar='<?= $datax['waktu_keluar'] ?>' data-pegawai='<?= $datax['pegawai'] ?>' data-biaya='<?= $datax['biaya'] ?>' data-status='<?= $datax['status'] ?>' data-tanggal_parkir='<?= $datax['tanggal_parkir'] ?>'  >
                    <td><?= $no++; ?></td>
                    <td>
                        <button <?php if ($status!=1) {echo "disabled";} ?> type="button" class="btn btn-success btn-sm" onclick="keluar_parkir('<?=$datax['kode_parkir']?>')"> Bayar & Keluar</button>
                    </td>
                    <td><?= $datax['kode_parkir'] ?></td>
                    <td><?= $datax['no_polisi'] ?></td>
                    <td><?= $datax['jenis_kendaraan'] ?></td>
                    <td><?= $datax['waktu_masuk'] ?></td>
                    <td><?= $datax['waktu_keluar'] ?></td>
                    <td style="background-color: <?=$warna?>"><?= $statusnya ?></td>
                    <td><?= $datax['biaya'] ?></td>
                    <td><?= $lama ?></td>
                    <td><?= $datax['pegawai'] ?></td>
                </tr>
                <?php
            }
        ?>
    </tbody>
    
</table>



<script src="assets/datatables/js/jquery.dataTables.min.js"></script>
<script src="assets/datatables/js/dataTables.buttons.min.js"></script>
<script src="assets/datatables/js/jszip.min.js"></script>
<script src="assets/datatables/js/pdfmake.min.js"></script>
<script src="assets/datatables/js/vfs_fonts.js"></script>
<script src="assets/datatables/js/buttons.html5.min.js"></script>
<script src="assets/datatables/js/buttons.print.min.js"></script>

<script>
    $('#cobaeks').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
</script>