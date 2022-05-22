<div class="row" style="margin-top: -25px!important;">
    <!-- [ Form Validation ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Transaksi Parkir Sistem</h5>
            </div>
            <div class="card-body">
                <input type="hidden" name="_token" id="token_form" value="{{ csrf_token() }}">
                <button type="button" class="btn btn-primary" onclick="fmenu('Tambah Transaksi Parkir')">Tambah
                    Transaksi Parkir</button>
            </div>
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-1 col-md-1 col-xs-1">
                        <label style="margin-top: 8px;">Filter</label>
                    </div>
                    <div class="col-lg-2 col-md-2 col-xs-2">
                        <input type="date" class="form-control" id="tgl1" value="<?=date('Y-m-d')?>">
                    </div>
                    <div class="col-lg-2 col-md-2 col-xs-2">
                        <input type="date" class="form-control" id="tgl2" value="<?=date('Y-m-d')?>">
                    </div>
                    <div class="col-lg-2 col-md-2 col-xs-2">
                        <button type="button" class="btn btn-primary" onclick="cari_parkir()">Cari</button>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <div class="cardx">
                        <div class="card-body">
                            <div class="dt-responsive table-responsive" id="tabel_parkir">
                                <table id="table-style-hover" data-show-export="true"
                                    class="table table-striped table-hover table-bordered nowrap">
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


<!-- Modal -->
<div class="modal fade" id="parkirModalBS" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="parkirModalBSLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="parkirModalBSLabel">Bayar & Keluar Parkir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_bayar_parkir">
                    @csrf
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Kode Parkir</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" id="kode_parkir" name="kode_parkir">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">No Polisi</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" id="no_polisi" name="no_polisi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" id="jenis_kendaraan" name="jenis_kendaraan">
                            </div>
                        </div>
                        
                        
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Parkir Tanggal</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" id="tanggal_parkir" name="tanggal_parkir">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Parkir Status</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" id="status" name="status">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Waktu Masuk</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" id="waktu_masuk_xx" name="waktu_masuk">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Waktu Keluar</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" id="waktu_keluar_xx" name="waktu_keluar">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Biaya</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" id="biaya" name="biaya">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Pegawai</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" id="pegawai" name="pegawai">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger">Proses</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
            </div>
        </div>
    </div>
</div>

<!-- datatable Js -->
<script src="assets/js/plugins/jquery.dataTables.min.js"></script>
<script src="assets/js/plugins/dataTables.bootstrap4.min.js"></script>
<script src="assets/js/pages/data-styling-custom.js"></script>



<script>
    $(document).ready(function () {
        cari_parkir()
    });

    function cari_parkir() {
        var tokennya = $("#tokenku").val()
        var tgl1 = $("#tgl1").val();
        var tgl2 = $("#tgl2").val();

        $.ajax({
            type: "get",
            url: "api/proses/get-parkir",
            data: "tgl1=" + tgl1 + "&tgl2=" + tgl2,
            beforeSend: function () {
                // $('#konten').html('')
                // $("#loading_konten").html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i><b> Mohon Tunggu Sedang Memuat Data</b>') 
            },
            success: function (hasil) {
                $("#tabel_parkir").html(hasil)
            }
        });
    }

    function keluar_parkir(kode) {

        var no_polisi = $("#"+kode).data('no_polisi')
        var jenis_kendaraan = $("#"+kode).data('jenis_kendaraan')
        var waktu_masuk = $("#"+kode).data('waktu_masuk')
        var waktu_keluar = $("#"+kode).data('waktu_keluar')
        var tanggal_parkir = $("#"+kode).data('tanggal_parkir')
        var status = $("#"+kode).data('status')
        var biaya = $("#"+kode).data('biaya')
        var pegawai = $("#"+kode).data('pegawai')

        if (status==1) {
            status = 'MASIH PARKIR';
        }else{
            status = 'Keluar PARKIR';
        }
        
        $("#kode_parkir").val(kode)
        $("#no_polisi").val(no_polisi)
        $("#jenis_kendaraan").val(jenis_kendaraan)
        $("#waktu_masuk_xx").val(waktu_masuk)
        $("#tanggal_parkir").val(tanggal_parkir)
        $("#status").val(status)
        $("#biaya").val(biaya)
        $("#pegawai").val(pegawai)

        var waktu = generate_waktu();
        $("#waktu_keluar_xx").val(waktu)
        setInterval(function(){ 
            var waktu = generate_waktu();
            $("#waktu_keluar_xx").val(waktu)
        }, 1000);


        var data = $("#form_bayar_parkir").serialize()
        $.ajax({
            type: "POST",
            url: "api/proses/bayar-parkir",
            data: data+"&mode=get-biaya",
            beforeSend: function () {
                // $('#konten').html('')
                // $("#loading_konten").html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i><b> Mohon Tunggu Sedang Memuat Data</b>') 
            },
            success: function (hasil) {
                // $("#tabel_parkir").html(hasil)
                const obj = JSON.parse(hasil);
                
                $("#biaya").val(obj.totaltarif)
                $("#parkirModalBS").modal('show')
            }
        });

    }

    $("#form_bayar_parkir").submit(function (e) { 
        e.preventDefault();
        var data = $("#form_bayar_parkir").serialize()
        $.ajax({
            type: "POST",
            url: "api/proses/bayar-parkir",
            data: data+"&mode=bayar",
            beforeSend: function () {
                // $('#konten').html('')
                // $("#loading_konten").html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i><b> Mohon Tunggu Sedang Memuat Data</b>') 
            },
            success: function (hasil) {
                // $("#tabel_parkir").html(hasil)
                const obj = JSON.parse(hasil);

                var status = obj.status
                var pesan  = obj.pesan

                if(status==200){
                    $("#parkirModalBS").modal('hide')

                    swal({
                        title: "Berhasil",
                        text: pesan,
                        icon: "success",
                        buttons: [false, "OKE"],
                        dangerMode: false,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            cari_parkir()
                        } 
                    });
                }

            }
        });
    });
</script>