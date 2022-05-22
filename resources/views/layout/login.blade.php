<!DOCTYPE html>
<html lang="en">
<head>
	<title>LOGIN</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="assets/css/style.css">
    {{-- <script src='https://www.google.com/recaptcha/api.js' async defer></script> --}}
	
<?php 
    session_start();
    if(isset($_SESSION['status']) && !empty($_SESSION['status'])) {
        header('location:index.php');
    }
?>

</head>

@yield('konten')

<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/ripple.js"></script>
<script src="assets/js/pcoded.min.js"></script>

<script src="assets/js/plugins/bootstrap-notify.min.js"></script>
<script src="assets/js/pages/ac-notification.js"></script>

<script>

    function admin() {
        window.location.replace("admin.php");
    }

    $('#loginf').submit(function (e) { 
        e.preventDefault();
        var data = $('#loginf').serialize()
        $('#notifnya').remove(); 
        $.ajax({
            type: "post",
            url: "api/kontrol.php?mode=login",
            data: data,
            beforeSend: function() {
                // setting a timeout
                // toastr["info"]("Sedang Menyimpan", "info")
                notify('top', 'right', 'feather icon-loader', 'primary', '', '','Mohon Tunggu...','Info Sedang diproses');
            },
            success: function (hasil) {
                $('#notifnya').remove(); 
                if (hasil=='OKE') {
                    notify('top', 'right', 'feather icon-loader', 'success', '', '','Mohon Tunggu...','Berhasil Login');
                    window.setTimeout(function(){
                        window.location.href = "index.php";
                    }, 500);
                    
                }else{
                    notify('top', 'right', 'feather icon-loader', 'danger', '', '','Mohon Cek Email / Password Anda! '+hasil,'GAGAL LOGIN');
                }

            }
        });
    });
</script>

</body>
</html>
