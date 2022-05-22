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
	<!-- sweet alert Js -->
	<script src="assets/js/plugins/sweetalert.min.js"></script>
	<script src="assets/js/pages/ac-alert.js"></script>
	<!-- vendor css -->
	<link rel="stylesheet" href="assets/css/style.css">
    {{-- <script src='https://www.google.com/recaptcha/api.js' async defer></script> --}}

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
	$("#loginwoi").submit(function (e) { 
		e.preventDefault();
		var data = $("#loginwoi").serialize()
		$.ajax({
			type: "POST",
			url: "api/login",
			data: data,
			success: function (hasil) {
				if (hasil=='MASOOK') {
					window.location.href = "dashboard";
				}else{
					swal({
						title: "Gagal Login",
						text: "Silahkan periksa username dan password anda !",
						icon: "warning",
						button: "OKE",
					});
				}
			}
		});
	});
</script>

</body>
</html>
