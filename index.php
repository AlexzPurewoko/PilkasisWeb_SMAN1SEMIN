<html>
	<head>
		<title>E-Voting SMA Negeri 1 SEMIN</title>
		<link rel="shortcut icon" href="gambar/logokecil.png">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/zero.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<script src="assets/js/jquery.2.1.1.min.js"></script>
		<script src="assets/js/bootstrap.js"></script>
		<script src="assets/js/zero.js"></script>
		<style>
		.login__submit {
		  width: 25%;
		  height: 4rem;
		  margin: 5rem 0 2.2rem;
		  color: #fff;
		  background: #0080ff;
		  font-size: 1.5rem;
		  border-radius: 3rem;
		  cursor: pointer;
		  overflow: hidden;

		}
		.login__submit_admin {
		  width: 25%;
		  height: 4rem;
		  margin: 5rem 0 2.2rem;
		  color: #fff;
		  background: #ff0000;
		  font-size: 1.5rem;
		  border-radius: 3rem;
		  cursor: pointer;
		  overflow: hidden;

		}
		</style>
	</head>
	<body id="home" class="content danger">
		<!-- Cover -->
		<div class="cover">
			<div class="cover-overlay">
				<div class="col-lg-7 col-sm-7 col-xs-12 box-title">
					<h1>E-Voting|<span class="color-title"> SMAN 1 SEMIN</span></h1>
					<h2>Pemilihan Ketua OSIS SMA Negeri 1 Semin</h2>
					<div class="list-inline">
						<button value="Login" class="login__submit" onclick="window.location.href='pemilih/index.php'">Login Pemilih</button>
						<button value="Login" class="login__submit_admin" onclick="window.location.href='admin/index.php'">Login Admin</button>

				</div>
				</div>
			</div>
		</div>
		<!-- End Cover -->

		<script type="text/javascript" src="assets/js/jquery.easypiechart.min.js"></script>
		<script>
			var img = ['gambar/galeri1.jpg', 'gambar/galeri3.JPG','gambar/_DSC0315.JPG', 'gambar/galeri2.jpg'];
			$(".cover").zeroSlide(img, 5000);

			// ANIMATE
			//$("#title-about").zeroAnimate('fadein');
			$("#img-about1").zeroAnimate('slideFromLeft');
			$("#img-about2").zeroAnimate('slideFromRight');
			$("#about-service .col-md-4").each(function() {
				//$(this).zeroAnimate('fadein');
			})
			$(".gallery .gallery-link").each(function() {
				$(this).zeroAnimate('slideFromLeft');
			});
			$("#box-contact").zeroAnimate('slideFromLeft');
			$("#box-map").zeroAnimate('fadein');
			$("#chart-skill li").each(function() {
				$(this).zeroAnimate('slideFromRight');
			})
			$("#our-process .media-border").each(function() {
				$(this).zeroAnimate("slideFromLeft");
			});
			$(".gallery-author").zeroAnimate('slideFromRight');
			// ENABLE LOADING ANIMATE
			$.zeroLoading("circle-simple");

			// SKILL CHART
			var oldie = /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase());
			$('.easy-pie-chart.percentage').each(function(){
				$(this).easyPieChart({
					barColor: $(this).data('color'),
					trackColor: '#DDD',
					scaleColor: false,
					lineCap: 'butt',
					lineWidth: 30,
					animate: oldie ? false : 1000,
					size:264
				}).css('color', $(this).data('color'));
			});

		</script>
	</body>
</html>
