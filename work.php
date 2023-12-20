<?php

	$mylogin='s.abdrafikova';
	$mypassword='supermax';
	
	$auth=0;
	
	if (((isset($_COOKIE['login']))and(empty($_COOKIE['login'])==false)) and ((isset($_COOKIE['password']))and(empty($_COOKIE['password'])==false))) {
		if (($_COOKIE['login']==$mylogin)&&($_COOKIE['password']==$mypassword)) {
			$auth=1;
		}
	}
	
	if (($auth==0)&&((isset($_GET['t']))and(empty($_GET['t'])==false)) and ((isset($_GET['key']))and(empty($_GET['key'])==false))) {
		if (($_GET['key']==crypt($_GET['t'],'max'))&&(time()<$_GET['t'])) {
			$auth=$_GET['t'];
		}
	}
	
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Ясная речка - Прайс</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- <link rel="manifest" href="site.webmanifest"> -->
	<link rel="shortcut icon" type="image/x-icon" href="fav.png">
	<!-- Place favicon.ico in the root directory -->

	<!-- CSS here -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/gijgo.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/slicknav.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<!-- <link rel="stylesheet" href="css/responsive.css"> -->
	
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
	
</head>

<body>
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a style="padding-bottom:5px;" href="page1.html">Нейродиагностика</a></li>
                                        <li><a style="padding-bottom:5px;" href="page2.html">Нейрокоррекция</a></li>
                                        <li><a style="padding-bottom:5px;" href="page3.html">Нейройога</a></li>
                                        <li><a style="padding-bottom:5px;" href="page4.html">Мама + ребенок</a></li>
										<br>
                                        <li><a style="padding-top:5px;" href="page5.html">Сенсорная интеграция</a></li>
                                        
										<li><a style="padding-top:5px;" href="spec.html">Наши специалисты</a></li>
										<li><a style="padding-top:5px;" href="stats.html">Статьи</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-12 col-md-12">
                    <div class="section_title text-center mb-95">
                        <h2>Учебный курс</h2>
					</div>
					
					<?php
					
						if ($auth==0) {
							
							?>	<center>
									<input id="myLogin" type="text" class="form-control" style="width:300px; margin-bottom:5px;" placeholder="Логин">
									<input id="myPassword" type="password" class="form-control" style="width:300px; margin-bottom:10px;" placeholder="Пароль">
									<button class="btn btn-primary btn-block" style="width:200px; margin-bottom:10px;" id="passlogok"><i class="fa fa-lock"></i> Вход</button>
								</center>
								
								<script>
									$("#passlogok").click(function(){ if ($("#myLogin").val()=="") { alert("Укажите логин"); return false; } if ($("#myPassword").val()=="") { alert("Укажите пароль"); return false; } ajax("passlogok.php",{login:$("#myLogin").val(),password:$("#myPassword").val()}); });
								</script>
							<?php
							
						} else {
							
							if ($auth==1) {
								
								?>
								
								<p style="cursor:pointer; text-align:right;" onclick="$(this).next().toggle('500');">Создать вход до</p>
								<div id="timeLinkInput" style="display:none;">
									<input id="timeLink" type="date" class="form-control" style="width:300px; margin-bottom:5px;" placeholder="Логин">
									<button class="btn btn-primary btn-block" style="width:200px; margin-bottom:10px;" id="timeLinkOk"><i class="fa fa-lock"></i> Создать</button>
								</div>
								
								<div id="timeLinkDiv"></div>
								
								<script>
									$("#timeLinkOk").click(function(){ if ($("#timeLink").val()=="") { alert("Укажите срок"); return false; } ajax("timeLinkOk.php",{time:$("#timeLink").val()}); });
								</script>								
								
								<?php
								
							} else {
								
								echo '<p style="text-align:right;">Доступ до: '.date('d.m.Y',$auth).'</p>';
								
							}
						
							$f=unserialize(file_get_contents('https://reg.moyput13.ru/module/roman/get_yar/'));
							
							$i=0;
							
							function foreach_array($array,&$i,$url){
								foreach($array as $title=>$value){
									if (is_array($value)) {
										echo '<div style="margin-left:10px; border:1px solid #88acff; background:rgba(185,206,255,0.3);"><p style="padding:3px 10px; font-weight:700; text-decoration:underline;color: #191d34; margin-bottom:2px; font-family: "Poppins", sans-serif;">'.$title.'</p>';
										$i++;
										foreach_array($value,$i,$url.'/'.$title);
										echo '</div>';
									} else {
										if (strpos($value,'.pdf')) {
											echo '<p style="padding-left:30px; cursor:pointer; color:#2a5885; margin-bottom:2px;" class="get_file"><a href="" data-fancybox data-type="iframe" data-src="https://reg.moyput13.ru/yar'.$url.'/'.$value.'"><i><i class="fa fa-file-pdf-o"></i> &nbsp;&nbsp; '.$value.'</i></a></p>';
										} elseif (strpos($value,'.mp4')) {
											echo '<p style="padding-left:30px; cursor:pointer; color:#2a5885; margin-bottom:2px;" class="get_file"><a href="" data-fancybox data-type="iframe" data-src="https://reg.moyput13.ru/yar'.$url.'/'.$value.'"><i><i class="fa fa-file-video-o"></i> &nbsp;&nbsp; '.$value.'</i></a></p>';
										} else {
											echo '<p style="padding-left:30px; cursor:pointer; color:#2a5885; margin-bottom:2px;" class="get_file"><a href="" data-fancybox data-type="iframe" data-src="https://reg.moyput13.ru/yar'.$url.'/'.$value.'"><i>'.$value.'</i></a></p>';
										}
										
										$i++;
									}
								}
							}
							
							foreach_array($f,$i,'');
						
						}
						
					?>
					
                </div>
            </div>
		</div>
	</div>
	
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Контакты
                            </h3>
                            <ul class="address_line">
                                <li>+7 (917) 473-76-54</li>
                                <li>yasnayarechka@mail.ru</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3  col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Мы в соцсетях
                            </h3>
                            <ul class="links">
                                <li><a href="https://vk.com/yasnayarechka">vk.com/yasnayarechka</a></li>
                                <li>yasnayarechka@mail.ru</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3  col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Адрес
                            </h3>
                            <ul class="links">
                                <li>ул. Гоголя 63/1</li>
                                <li>Ежедневно с 11:00 до 20:00</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3 ">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                            <p class="address_text">Ул. Гоголя 63/1 <br>+7(917)473-76-54</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="bordered_1px"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
							<p>Организация Некоммерческий фонд развития детей "С любовью".</p>
							<p>ОГРН 1200200032614</p>
							<p>ИП Абдрафикова Светлана Ильфатовна</p>
							<p>ИНН 026816835590 </p>
							<p>ОГРНИП 319028000199840, </p>
							<p>г.Стерлитамак, ул.Садовая, д.48. Т. 89625338880</p>
                            <!--<p>Copyright ©2022 All rights reserved</p>-->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
	
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>


    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            disableDaysOfWeek: [0, 0],
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }

        });
        var timepicker = $('#timepicker').timepicker({
			 format: 'HH.MM'
		});
		
		function ajax(url,data){
			$.ajax({
				url: url,
				type: 'POST',
				data: data,
				error: function(){
					//alert('Ошибка!');
				},
				success: function(html){
					$('body').append(delBr (html));
				}
			});
		}
		
		function delBr (s) { return s.replace (/[\n\r]/g, ' ').replace (/\s{2,}/g, ' '); }
    </script>
</body>

</html>