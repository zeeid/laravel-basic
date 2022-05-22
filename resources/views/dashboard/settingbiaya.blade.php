<div class="row" style="margin-top: -25px!important;">
    <!-- [ Form Validation ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Setting Jenis & Biaya</h5>
            </div>
            <div class="card-body">
                <input type="hidden" name="_token" id="token_form" value="{{ csrf_token() }}">
                <button type="button" class="btn btn-primary" onclick="fmenu('Tambah Jenis dan Biaya')">Tambah Jenis & Biaya</button>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <div class="cardx">
                        <div class="card-body">
                            <div class="dt-responsive table-responsive" id="tabel_tarif">
                                <table id="table-style-hover" data-show-export="true"  class="table table-striped table-hover table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>jenis</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END CARD -->
                </div>
                <!--  -->
            </div>
        </div>
    </div>
    <!-- [ Form Validation ] end -->
</div>

<!-- datatable Js -->
<script src="assets/js/plugins/jquery.dataTables.min.js"></script>
<script src="assets/js/plugins/dataTables.bootstrap4.min.js"></script>
<script src="assets/js/pages/data-styling-custom.js"></script>

<script>
    $(document).ready(function () {
        getbiaya()
    });

    function getbiaya() {
        var tokennya = $("#tokenku").val()
        $.ajax({
            type: "get",
            url: "api/proses/get-tarif",
            // data: "_token="+tokennya,
            beforeSend: function() {
                // $('#konten').html('')
                // $("#loading_konten").html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i><b> Mohon Tunggu Sedang Memuat Data</b>') 
            },
            success: function (hasil) {
                $("#tabel_tarif").html(hasil)
            }
        });
    }

    function hapus_tarif(id) {
        var tokennya = $("#tokenku").val()
        swal({
            title: "Apakah Anda Yakin?",
            text: "Setelah terhapus, Data tidak dapat dikembalikan!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "post",
                    url: "api/proses/hapus-tarif",
                    data: "id="+id+"&_token="+tokennya,
                    beforeSend: function() {
                        notify('top', 'right', 'feather icon-loader', 'primary', '', '','Mohon Tunggu...','Info Sedang diproses');
                    },
                    success: function (hasil) {
                        $('#notifnya').remove(); 
                        if (hasil !='') {
                            const obj   = JSON.parse(hasil); 
                            var status  = obj.status
                            var pesan   = obj.pesan

                            if (status==200) {
                                swal({
                                    title: "Berhasil",
                                    text: "Sukses Menyimpan data",
                                    icon: "success",
                                    buttons: [false,'OKE'],
                                    dangerMode: false,
                                })
                                .then((willDelete) => {
                                    if (willDelete) {
                                        getbiaya()
                                    }
                                });
                            }else{
                                swal({
                                    title: "Error",
                                    text: pesan,
                                    icon: "error",
                                    button: "OKE",
                                });
                            }
                        }

                        // menu('Setting Biaya')

                    },
                    error: function(xhr) { // if error occured
                        notify('top', 'right', 'feather icon-loader', 'error', '', '',xhr.statusText + xhr.responseText,'error');
                    }
                });
            } 
        });

        
    }
</script>