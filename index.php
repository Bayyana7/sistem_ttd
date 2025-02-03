<!DOCTYPE html>
<html>
<head>
	<title>Tanda Tangan Digital</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>
<body style="background: gray">
<div align="center" style="margin: 10px">
	<div class="wrapper">
			Silahkan TTD Dibawah ini :
	</div>
<canvas class="canvas" width="750" height="450"></canvas> <!--Atur ukuran Kanvas Disini-->
	<div class="wrapper">
		<center>	
			<button class="btn-primary">SIMPAN TTD </button>
		</center>
	</div>
	<div class="wrapper">
		<center>	
			<a href="index.php"><button class="btn btn-danger">BATAL</button></a>
		</center>
	</div>
	<style type="text/css">
	.canvas{
		background: #fff;border: 2px dashed #A0A0A4
		}
		.wrapper{
			background: #fff;width: 757px;padding: 10px;
		}
	</style>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
	<script type="text/javascript">
		var canvas = document.querySelector("canvas");

	var signaturePad = new SignaturePad(canvas);
		$(document).on('click','.btn-primary',function(){
			var signature =	signaturePad.toDataURL(); 
			$.ajax({
				url: "simpan.php",
				data :{
					foto: signature,
				},
				method: "POST",
				success:function(){
					//location.reload();
					window.location="show.php?pesan=sukses"; //
				}
			})
			$("#reset-btn").click(function() {
            context.clearRect(0, 0, window.innerWidth, window.innerWidth);
            clickX = [];
            clickY = [];
            clickDrag = [];
        });

		})
		
	</script>
</div>
</body>
</html>
