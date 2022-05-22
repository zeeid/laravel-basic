
<table id="table-style-hover" data-show-export="true"  class="table table-striped table-hover table-bordered nowrap">
    <thead>
        <tr>
            <th>NO</th>
            <th>Jenis Kendaraan</th>
            <th>Tarif</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $no=1;
            foreach ($list_tarif as $datax) {
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $datax['jenis_kendaraan'] ?></td>
                    <td><?= $datax['tarif'] ?></td>
                    <td>
                        <button type="button" onclick="hapus_tarif('<?=$datax['id']?>')" class="btn btn-danger btn-sm">Hapus</button>
                        <button type="button" onclick="fmenu('Tambah Jenis dan Biaya','<?=$datax['id']?>')" class="btn btn-warning btn-sm">Edit</button>
                    </td>
                </tr>
                <?php
            }
        ?>
    </tbody>
    
</table>