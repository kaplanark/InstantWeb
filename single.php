<?php require("libs/fetch_data.php");?>
<?php //code to get the item using its id
include("database/conn.php");//database config file
$id=$_REQUEST['id']; $query="SELECT * from blogs where id='".$id."'"; $result=mysqli_query($GLOBALS["___mysqli_ston"],$query) or die ( ((is_object($GLOBALS["___mysqli_ston"]))? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ?$___mysqli_res : true))); 
$row = mysqli_fetch_assoc($result);
//Sayfa görüntüleme sayısı sorgusu
$page=$row['title'];
$count="SELECT * FROM page_hits WHERE page='".$page."'";$feedback=mysqli_query($GLOBALS["___mysqli_ston"],$count) or die ( ((is_object($GLOBALS["___mysqli_ston"]))? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ?$___mysqli_res : true))); 
$roo=mysqli_fetch_assoc($feedback);?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<title><?php echo $row['title']; ?>|<?php getwebname("titles");?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<link id="browser_favicon" rel="shortcut icon" href="blogadmin/images/<?php geticon("titles"); ?>">
	<meta charset="utf-8" name="description" content="<?php getshortdescription("titles");?>">
	<meta name="keywords" content="<?php getkeywords("titles");?>" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/single.css">
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/fontawesome-all.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	rel="stylesheet">
	<!--Buraya ek javascriptler yerleştirilecek-->
	<?php getjavascripts("links"); ?>
</head>

<body>
	<!--Header dahil et-->
	<?php include("header.php");?> 
	<!-- -->
	<!--Sayfa görünümlerinde veritabanını güncelle-->
	<?php  require_once('adminstats/conn.php');
	require_once('counter.php');
	$pn=updateCounter(''.$row['title'].''); // Popüler gönderileri güncelle
	echo $pn;
	updateInfo(); // Popüler göncerileri günceleme yardımı?>
	<div class="banner-inner">
	</div>
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.php">Anasayfa</a>
		</li>
		<li class="breadcrumb-item active">Blog</li>
	</ol>

	<!--//Afiş-->
	<section class="banner-bottom">
		<!--/Blog-->
		<div class="container">
			<div class="row">
				<!--sol-->
				<div class="col-lg-8 left-blog-info-w3layouts-agileits text-left">
					<div class="blog-grid-top">
						<div class="b-grid-top">
							<div class="blog_info_left_grid">
								<a href="#">
									<img src="blogadmin/images/<?php echo $row['photo']; ?>" class="img-fluid" alt="görüntü mevcut değil" style="width:900px;height:300px">
								</a>
							</div>
							<div class="blog-info-middle">
								<ul>
									<li>
										<a href="#">
											<i class="far fa-calendar-alt"></i><?php echo $row['date']; ?></a>
										</li>
										<li class="mx-2">
											<a href="#">
												<i class="far fa-user"></i><?php echo $row['author']; ?></a>
											</li>
											<li>
												<a href="#">
													<i class="far fa-tags"></i> <?php echo $row['tags']; ?></a>
												</li>
												<li>
													<a href="#">
														<i class="far fa-eye fa-x2"></i> <?php echo $roo['count']; ?></a>
													</li>

												</ul>
											</div>
										</div>

										<h3>
											<a href="single.html"><?php echo $row['title']; ?></a>
										</h3>
										<!--Script paylaşımı-->
										<?php getsharingscript("links"); ?>
										<?php echo $row['content']; ?>
									</div>
									<!--Script komut dosyası buraya gelecek-->
									<?php getcommentsscript("links"); ?>
								</div>

								<!--//sol-->
								<!--sağ-->
								<aside class="col-lg-4 agileits-w3ls-right-blog-con text-right">
									<div class="right-blog-info text-left">
										<h4><strong>Ktegoriler</strong></h4>
										<ul class="list-group single">
											<?php countcategories();?>
										</ul>
										<div class="tech-btm widget_social">
											<h4>Bağlı Kalın</h4>
											<ul>

												<li>
													<a class="twitter" href="<?php getlinks("links","twitter");?>">
														<i class="fab fa-twitter"></i>
														<span class="count"></span> Twitter</a>
													</li>
													<li>
														<a class="facebook" href="<?php getlinks("links","facebook");?>">
															<i class="fab fa-facebook-f"></i>
															<span class="count"></span> Facebook</a>
														</li>
														<li>
															<a class="dribble" href="<?php getlinks("links","dribble");?>">
																<i class="fab fa-dribbble"></i>

																<span class="count"></span> Dribble</a>
															</li>
															<li>
																<a class="pin" href="<?php getlinks("links","pinterest");?>">
																	<i class="fab fa-pinterest"></i>
																	<span class="count"></span> Pinterest</a>
																</li>

															</ul>
														</div>
														<div class="tech-btm">
															<h4>Editörün Seçimi</h4>
															<?php geteditorschoice("editors_choice");?>
															<!--Daha eski gönderiler burada-->
														</div>
													</div>
												</aside>
												<!--//sağ-->
											</div>
										</div>
									</section>
									<!--//main-->
									<!--Sayfa altbilgisi dahil etme-->
									<?php include("footer.php");?>
									<!---->
									<!-- js dosyası-->
									<script src="js/jquery-2.2.3.min.js"></script>
									<!-- //js -->
									<!--/ start-smoth-scrolling -->
									<script src="js/move-top.js"></script>
									<script src="js/easing.js"></script>
									<script>
										jQuery(document).ready(function ($) {
											$(".scroll").click(function (event) {
												event.preventDefault();
												$('html,body').animate({
													scrollTop: $(this.hash).offset().top
												}, 900);
											});
										});
									</script>
									<!--// end-smoth-scrolling -->

									<script>
										$(document).ready(function () {
			/*
									var defaults = {
							  			containerID: 'toTop', // solma öğesi id
										containerHoverID: 'toTopHover', // solma öğesi vurgulu id
										scrollSpeed: 1200,
										easingType: 'linear' 
							 		};
							 		*/

							 		$().UItoTop({
							 			easingType: 'easeOutQuart'
							 		});

							 	});
							 </script>
							 <a href="#home" class="scroll" id="toTop" style="display: block;">
							 	<span id="toTopHover" style="opacity: 1;"> </span>
							 </a>

							 <!-- //Custom-JavaScript-File-Links -->
							 <script src="js/bootstrap.js"></script>


							</body>

							</html>