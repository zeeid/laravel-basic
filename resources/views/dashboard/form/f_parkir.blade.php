<style>
    .huruf_besar {
        text-transform: capitalize;
    }
</style>
<div class="row" style="margin-top: -25px!important;">
    <!-- [ Form Validation ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Form {{ $judul }}</h5>
                <?php 
                    // echo $list_tarif[0]['jenis_kendaraan'];
                    // if ($list_tarif != '') {
                    //     $jenis_kendaraan = 
                    // }
                ?>
            </div>
            <div class="card-body">
                <form id="form_parkir">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Jenis Kendaraan</label>
                                <div class="col-sm-10">
                                    <select required name="jenis_kendaraan" id="jenis_kendaraan" class="form-control">
                                        <option value="" selected disabled>--Pilih salah satu--</option>
                                        <?php 
                                            foreach ($list_tarif as $data) {
                                                ?>
                                                    <option data-tarif='<?= $data['tarif'] ?>'><?= $data['jenis_kendaraan'] ?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                                                
                        <div class="col-lg-12 col-md-6">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">No Polisi</label>
                                <div class="col-sm-10">
                                    <input required type="text" id="no_polisi" class="form-control readonlyc" name="no_polisi" value="<?php if(isset($list_tarif[0]['no_polisi'])){echo $list_tarif[0]['no_polisi'];} ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Waktu Masuk</label>
                                <div class="col-sm-10">
                                    <input required type="text" id="waktu_masuk" class="form-control readonlyc" name="waktu_masuk" value="<?php if(isset($list_tarif[0]['waktu_masuk'])){echo $list_tarif[0]['waktu_masuk'];} ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Waktu Keluar</label>
                                <div class="col-sm-10">
                                    <input readonly placeholder="Di Isi Saat Keluar" type="text" id="waktu_keluar" class="form-control readonlyc" name="waktu_keluar" value="<?php if(isset($list_tarif[0]['waktu_keluar'])){echo $list_tarif[0]['waktu_keluar'];} ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Parkir</label>
                                <div class="col-sm-10">
                                    <input readonly placeholder="Auto By System" type="text" id="tanggal_parkir" class="form-control readonlyc" name="tanggal_parkir" value="<?php if(isset($list_tarif[0]['tanggal_parkir'])){echo $list_tarif[0]['tanggal_parkir'];} ?>">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <button type="submit" id="simpan" class="btn  btn-primary">SIMPAN</button>
                    <input type="hidden" readonly name="mode" value="">
                    <input type="hidden" readonly name="id" value="">
                    <input type="hidden" id="is_new" name="is_new" value="" readonly>

                </form>
            </div>
        </div>
    </div>
    <!-- [ Form Validation ] end -->
</div>
<!-- notification Js -->
<script src="assets/js/plugins/bootstrap-notify.min.js"></script>
<script src="assets/js/pages/ac-notification.js"></script>

<script>
    $(document).ready(function () {
        var waktu = generate_waktu();
        $("#waktu_masuk").val(waktu)
        setInterval(function(){ 
            var waktu = generate_waktu();
            $("#waktu_masuk").val(waktu)
        }, 1000);
    });
</script>

<script>
    $("#form_parkir").submit(function (e) { 
        e.preventDefault();
        var data = $("#form_parkir").serialize()
        $.ajax({
            type: "POST",
            url: "api/proses/simpan-parkir",
            data: data,
            beforeSend: function() {
                toastr["info"]("Mohon Tunggu...", "Info")

                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "3001111111",
                    "hideDuration": "10001111111",
                    "timeOut": "50001111111",
                    "extendedTimeOut": "10001111111",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }

                $("#simpan").prop('disabled', true);
            },
            success: function (hasil) {
                // Remove current toasts using animation
                toastr.remove()
                toastr.clear()

                const obj = JSON.parse(hasil); 
                
                var status = obj.status
                var pesan = obj.pesan

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
                            menu('Parkir')
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

                $("#simpan").prop('disabled', false);
            },
            error: function(xhr) { 
                $("#simpan").prop('disabled', false);
                // Remove current toasts using animation
                toastr.remove()
                toastr.clear()
                // if error occured
                // alert(xhr.statusText + xhr.responseText);
                console.log(xhr.responseText)
                const obj = JSON.parse(xhr.responseText); 
                console.log(obj)

                var pesan = obj.message
                var error = obj.errors
                // alert(error['jenis_kendaraan'])

                // GET JUMLAH ERROR
                var count = Object.keys(error).length;
            
                // let errornya = "";
                // for (let i = 0; i < count; i++) {
                //     errornya += cars[i] + "\n";
                // } 
                // alert(obj)

                swal({
                    title: "Error",
                    text: "Silahkan periksa kembali kolom inputan \n Error: "+pesan,
                    icon: "error",
                    button: "OKE",
                });
            },
        });
    });
</script>