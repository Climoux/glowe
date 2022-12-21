<?php

	if (file_exists('pages/visibility/' . $f . '.php')) {

		$dir_nom = "pages/upload/" . sha1($f);

?>

	<section>
			
		<div id="panel-div-stockage" style="min-height: 100vh; height: auto;">

			<br><div id="stockage-panel-div-menu">

				<button id="btn-access" style="margin-left: 2em; margin-top: 1em;"><a href="index.php?p=browse" id="link-panel">Retour</a></button>

				<center><h2 style="margin-left: 2em; margin-top: -1.2em;">Dossier Publique de <?php echo $f; ?></h2></center>
					
				<img src="./img/dl-zip.png" alt="DLZIP" name="Download" style="float:right;position:relative;margin-top:-3em;margin-right:1em;" href="#dl" class="js-modal"></img>
				<img src="./img/report.png" alt="report" name="Report" style="float:right;position:relative;margin-top:-3em;margin-right:5em;" href="#report" class="js-modal"></img> 

			</div>

			<br><br><br><br><br>
				
			<?php

				include 'pages/visibility/'.$f.'.php';

			?>

		</div>

	</section>
	
	<aside id="dl" class="modal" aria-hidden="true" aria-modal="false" style="display:none;">

		<div class="modal-wrapper js-modal-stop">

			<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

			<br><br>

			<form method="post" class="form-upload" enctype="multipart/form-data">
			    
			    <?php

    				if(isLogged() == 1) {
    					$user = $_SESSION['name_crypted'];
    				} else {
    				    $user = "Anonymous";
    				}
    					
    			?>

				<button type="submit" name="submit" id="button-upload"><a href="pages/upload/tmp/<?php echo $user."/".$f.".zip"; 
				
				if(file_exists('pages/upload/tmp/'.$user.'/'.$f.'.zip')) { 
						
					unlink("pages/upload/tmp/".$user."/".$f.".zip");

				}else{

					$zip_name = $f.".zip";
					$zip = new ZipArchive;
					$dirname = "pages/upload/".sha1($f)."/";
					$path = "pages/upload/tmp/readme/";
						
					if($zip->open("pages/upload/tmp/".$user."/".$zip_name, ZipArchive::CREATE ) === TRUE)
					{
						$dir = opendir($dirname);
						$path_read = opendir($path);

						while($fichier = readdir($dir)) 
						{
							if(is_file($dirname.$fichier)) 
							{
							    if (strpos($fichier, ".txt")) {  
							        $file = str_replace(".txt", "", $fichier);
							    	$zip->addFile($dirname.$fichier, $file); 
							    }
							}
						}

						// -------------------------------------------------------- //

						while($readme = readdir($path_read)) 
						{
							if(is_file($path.$readme)) 
							{
								$zip->addFile($path.$readme, $readme); 
							}
						}

						// -------------------------------------------------------- //

						$zip->close();							
					}

				}?>">Télécharger</a></button>

			</form>

		</div>

	</aside>

	<aside id="report" class="modal" aria-hidden="true" aria-modal="false" style="display:none;">

		<div class="modal-wrapper js-modal-stop">

			<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

			<br><br>

			<?php
			
				if (isset($_POST['submit'])) {
					$email = htmlspecialchars(trim($_POST['email']));
					$details = htmlspecialchars(trim($_POST['details']));
					$sujet = htmlspecialchars(trim($_POST['checkbox']));

					function send($email, $details, $sujet)
					{
						global $db;
						$r = array(
							'email'=>$email,
							'details'=>$details,
							'sujet'=>$sujet
						);
						$sql = "INSERT INTO report(email,details,sujet) VALUES(:email,:details,:sujet)";
						$req = $db->prepare($sql);
						$req->execute($r);
					}

					send($email, $details, $sujet);

					$mail = 'climixytb@gmail.com';
                    $subject = '=?UTF-8?B?' . base64_encode('Glowe - Nouveau signalement') . '?=';
                    $message = '<!DOCTYPE html>
					<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" class="dj_gecko dj_ff91 dj_contentbox"><head>
					<!-- NAME: ANNOUNCE -->
					<!--[if gte mso 15]>
					<xml>
						<o:OfficeDocumentSettings>
						<o:AllowPNG/>
						<o:PixelsPerInch>96</o:PixelsPerInch>
						</o:OfficeDocumentSettings>
					</xml>
					<![endif]-->
					<meta charset="UTF-8">
					<meta http-equiv="X-UA-Compatible" content="IE=edge">
					<meta name="viewport" content="width=device-width, initial-scale=1">
					<title>Nouveau Signalement</title>
					
				<style type="text/css">
					p{
						margin:10px 0;
						padding:0;
					}
					table{
						border-collapse:collapse;
					}
					h1,h2,h3,h4,h5,h6{
						display:block;
						margin:0;
						padding:0;
					}
					img,a img{
						border:0;
						height:auto;
						outline:none;
						text-decoration:none;
					}
					body,#bodyTable,#bodyCell{
						height:100%;
						margin:0;
						padding:0;
						width:100%;
					}
					.mcnPreviewText{
						display:none !important;
					}
					#outlook a{
						padding:0;
					}
					img{
						-ms-interpolation-mode:bicubic;
					}
					table{
						mso-table-lspace:0pt;
						mso-table-rspace:0pt;
					}
					.ReadMsgBody{
						width:100%;
					}
					.ExternalClass{
						width:100%;
					}
					p,a,li,td,blockquote{
						mso-line-height-rule:exactly;
					}
					a[href^=tel],a[href^=sms]{
						color:inherit;
						cursor:default;
						text-decoration:none;
					}
					p,a,li,td,body,table,blockquote{
						-ms-text-size-adjust:100%;
						-webkit-text-size-adjust:100%;
					}
					.ExternalClass,.ExternalClass p,.ExternalClass td,.ExternalClass div,.ExternalClass span,.ExternalClass font{
						line-height:100%;
					}
					a[x-apple-data-detectors]{
						color:inherit !important;
						text-decoration:none !important;
						font-size:inherit !important;
						font-family:inherit !important;
						font-weight:inherit !important;
						line-height:inherit !important;
					}
					.templateContainer{
						max-width:600px !important;
					}
					a.mcnButton{
						display:block;
					}
					.mcnImage,.mcnRetinaImage{
						vertical-align:bottom;
					}
					.mcnTextContent{
						word-break:break-word;
					}
					.mcnTextContent img{
						height:auto !important;
					}
					.mcnDividerBlock{
						table-layout:fixed !important;
					}
					h1{
						color:#222222;
						font-family:Helvetica;
						font-size:40px;
						font-style:normal;
						font-weight:bold;
						line-height:150%;
						letter-spacing:normal;
						text-align:center;
					}
					h2{
						color:#222222;
						font-family:Helvetica;
						font-size:34px;
						font-style:normal;
						font-weight:bold;
						line-height:150%;
						letter-spacing:normal;
						text-align:left;
					}
					h3{
						color:#444444;
						font-family:Helvetica;
						font-size:22px;
						font-style:normal;
						font-weight:bold;
						line-height:150%;
						letter-spacing:normal;
						text-align:left;
					}
					h4{
						color:#949494;
						font-family:Georgia;
						font-size:20px;
						font-style:italic;
						font-weight:normal;
						line-height:125%;
						letter-spacing:normal;
						text-align:center;
					}
					#templateHeader{
						background-color:#ffffff;
						background-image:none;
						background-repeat:no-repeat;
						background-position:center;
						background-size:cover;
						border-top:0;
						border-bottom:0;
						padding-top:54px;
						padding-bottom:54px;
					}
					.headerContainer{
						background-color:transparent;
						background-image:none;
						background-repeat:no-repeat;
						background-position:center;
						background-size:cover;
						border-top:0;
						border-bottom:0;
						padding-top:0;
						padding-bottom:0;
					}
					.headerContainer .mcnTextContent,.headerContainer .mcnTextContent p{
						color:#757575;
						font-family:Helvetica;
						font-size:16px;
						line-height:150%;
						text-align:left;
					}
					.headerContainer .mcnTextContent a,.headerContainer .mcnTextContent p a{
						color:#007C89;
						font-weight:normal;
						text-decoration:underline;
					}
					#templateBody{
						background-color:#FFFFFF;
						background-image:none;
						background-repeat:no-repeat;
						background-position:center;
						background-size:cover;
						border-top:0;
						border-bottom:0;
						padding-top:36px;
						padding-bottom:54px;
					}
					.bodyContainer{
						background-color:transparent;
						background-image:none;
						background-repeat:no-repeat;
						background-position:center;
						background-size:cover;
						border-top:0;
						border-bottom:0;
						padding-top:0;
						padding-bottom:0;
					}
					.bodyContainer .mcnTextContent,.bodyContainer .mcnTextContent p{
						color:#757575;
						font-family:Helvetica;
						font-size:16px;
						line-height:150%;
						text-align:left;
					}
					.bodyContainer .mcnTextContent a,.bodyContainer .mcnTextContent p a{
						color:#007C89;
						font-weight:normal;
						text-decoration:underline;
					}
					#templateFooter{
						background-color:#333333;
						background-image:none;
						background-repeat:no-repeat;
						background-position:center;
						background-size:cover;
						border-top:0;
						border-bottom:0;
						padding-top:45px;
						padding-bottom:63px;
					}
					.footerContainer{
						background-color:transparent;
						background-image:none;
						background-repeat:no-repeat;
						background-position:center;
						background-size:cover;
						border-top:0;
						border-bottom:0;
						padding-top:0;
						padding-bottom:0;
					}
					.footerContainer .mcnTextContent,.footerContainer .mcnTextContent p{
						color:#FFFFFF;
						font-family:Helvetica;
						font-size:12px;
						line-height:150%;
						text-align:center;
					}
					.footerContainer .mcnTextContent a,.footerContainer .mcnTextContent p a{
						color:#FFFFFF;
						font-weight:normal;
						text-decoration:underline;
					}
				@media only screen and (min-width:768px){
					.templateContainer{
						width:600px !important;
					}

			}	@media only screen and (max-width: 480px){
					body,table,td,p,a,li,blockquote{
						-webkit-text-size-adjust:none !important;
					}

			}	@media only screen and (max-width: 480px){
					body{
						width:100% !important;
						min-width:100% !important;
					}

			}	@media only screen and (max-width: 480px){
					.mcnRetinaImage{
						max-width:100% !important;
					}

			}	@media only screen and (max-width: 480px){
					.mcnImage{
						width:100% !important;
					}

			}	@media only screen and (max-width: 480px){
					.mcnCartContainer,.mcnCaptionTopContent,.mcnRecContentContainer,.mcnCaptionBottomContent,.mcnTextContentContainer,.mcnBoxedTextContentContainer,.mcnImageGroupContentContainer,.mcnCaptionLeftTextContentContainer,.mcnCaptionRightTextContentContainer,.mcnCaptionLeftImageContentContainer,.mcnCaptionRightImageContentContainer,.mcnImageCardLeftTextContentContainer,.mcnImageCardRightTextContentContainer,.mcnImageCardLeftImageContentContainer,.mcnImageCardRightImageContentContainer{
						max-width:100% !important;
						width:100% !important;
					}

			}	@media only screen and (max-width: 480px){
					.mcnBoxedTextContentContainer{
						min-width:100% !important;
					}

			}	@media only screen and (max-width: 480px){
					.mcnImageGroupContent{
						padding:9px !important;
					}

			}	@media only screen and (max-width: 480px){
					.mcnCaptionLeftContentOuter .mcnTextContent,.mcnCaptionRightContentOuter .mcnTextContent{
						padding-top:9px !important;
					}

			}	@media only screen and (max-width: 480px){
					.mcnImageCardTopImageContent,.mcnCaptionBottomContent:last-child .mcnCaptionBottomImageContent,.mcnCaptionBlockInner .mcnCaptionTopContent:last-child .mcnTextContent{
						padding-top:18px !important;
					}

			}	@media only screen and (max-width: 480px){
					.mcnImageCardBottomImageContent{
						padding-bottom:9px !important;
					}

			}	@media only screen and (max-width: 480px){
					.mcnImageGroupBlockInner{
						padding-top:0 !important;
						padding-bottom:0 !important;
					}

			}	@media only screen and (max-width: 480px){
					.mcnImageGroupBlockOuter{
						padding-top:9px !important;
						padding-bottom:9px !important;
					}

			}	@media only screen and (max-width: 480px){
					.mcnTextContent,.mcnBoxedTextContentColumn{
						padding-right:18px !important;
						padding-left:18px !important;
					}

			}	@media only screen and (max-width: 480px){
					.mcnImageCardLeftImageContent,.mcnImageCardRightImageContent{
						padding-right:18px !important;
						padding-bottom:0 !important;
						padding-left:18px !important;
					}

			}	@media only screen and (max-width: 480px){
					.mcpreview-image-uploader{
						display:none !important;
						width:100% !important;
					}

			}	@media only screen and (max-width: 480px){
					h1{
						font-size:30px !important;
						line-height:125% !important;
					}

			}	@media only screen and (max-width: 480px){
					h2{
						font-size:26px !important;
						line-height:125% !important;
					}

			}	@media only screen and (max-width: 480px){
					h3{
						font-size:20px !important;
						line-height:150% !important;
					}

			}	@media only screen and (max-width: 480px){
					h4{
						font-size:18px !important;
						line-height:150% !important;
					}

			}	@media only screen and (max-width: 480px){
					.mcnBoxedTextContentContainer .mcnTextContent,.mcnBoxedTextContentContainer .mcnTextContent p{
						font-size:14px !important;
						line-height:150% !important;
					}

			}	@media only screen and (max-width: 480px){
					.headerContainer .mcnTextContent,.headerContainer .mcnTextContent p{
						font-size:16px !important;
						line-height:150% !important;
					}

			}	@media only screen and (max-width: 480px){
					.bodyContainer .mcnTextContent,.bodyContainer .mcnTextContent p{
						font-size:16px !important;
						line-height:150% !important;
					}

			}	@media only screen and (max-width: 480px){
					.footerContainer .mcnTextContent,.footerContainer .mcnTextContent p{
						font-size:14px !important;
						line-height:150% !important;
					}

			}</style><!--[if !mso]><!--><link href="https://fonts.googleapis.com/css?family=Arvo:400,400i,700,700i|Cabin:400,400i,700,700i|Catamaran:400,400i,700,700i|Hind+Guntur:400,400i,700,700i|Karla:400,400i,700,700i|Lato:400,400i,700,700i|Lora:400,400i,700,700i|Merriweather:400,400i,700,700i|Merriweather+Sans:400,400i,700,700i|Noticia+Text:400,400i,700,700i|Open+Sans:400,400i,700,700i|Playfair+Display:400,400i,700,700i|Roboto:400,400i,700,700i|Rubik:400,400i,700,700i|Source+Sans+Pro:400,400i,700,700i|Source+Serif+Pro:400,400i,700,700i|Work+Sans:400,400i,700,700i" rel="stylesheet"><!--<![endif]--><link rel="stylesheet" type="text/css" href="https://us5.admin.mailchimp.com/release/1.1.17cf7e0245b97bbc5ebc8924c66f05759f8cce711/css/less/template-editor.css">
							<script src="https://polyfill.mailchimp.com/v3/polyfill.min.js?features=es2015,es2016,es2017,es2018,fetch,AbortController,Array.prototype.flat,Element.prototype.inert,ResizeObserver,IntersectionObserver,Intl,Intl.DateTimeFormat,Intl.DateTimeFormat.prototype.formatToParts,Intl.NumberFormat" crossorigin="anonymous"></script><style id="inert-style">
			[inert] {
			pointer-events: none;
			cursor: default;
			}

			[inert], [inert] * {
			user-select: none;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			}
			</style>
							<script type="text/javascript" src="/release/1.1.17cf7e0245b97bbc5ebc8924c66f05759f8cce711/js-legacy/js/dojo/dojo.js " data-dojo-config="parseOnLoad: true, usePlainJson: true, isDebug: false"></script><script type="text/javascript" src="/release/1.1.17cf7e0245b97bbc5ebc8924c66f05759f8cce711/js-legacy/js/mojo/mcnpreview.js"></script><script>var _mcVariants = {};</script><script>dojo.require("mojo.neapolitan.Preview");</script><style type="text/css">/* Enable image placeholders */@-moz-document url-prefix(http), url-prefix(file) { img:-moz-broken{-moz-force-broken-image-icon:1; width:24px;height:24px;
			}
			}</style>
								<script async="" src="https://ds-aksb-a.akamaihd.net/aksb.min.js"></script><script>var w=window;if(w.performance||w.mozPerformance||w.msPerformance||w.webkitPerformance){var d=document;AKSB=w.AKSB||{},AKSB.q=AKSB.q||[],AKSB.mark=AKSB.mark||function(e,_){AKSB.q.push(["mark",e,_||(new Date).getTime()])},AKSB.measure=AKSB.measure||function(e,_,t){AKSB.q.push(["measure",e,_,t||(new Date).getTime()])},AKSB.done=AKSB.done||function(e){AKSB.q.push(["done",e])},AKSB.mark("firstbyte",(new Date).getTime()),AKSB.prof={custid:"162687",ustr:"",originlat:"0",clientrtt:"49",ghostip:"104.89.116.219",ipv6:false,pct:"10",clientip:"82.142.21.8",requestid:"947dd068",region:"39685",protocol:"h2",blver:14,akM:"x",akN:"ae",akTT:"O",akTX:"1",akTI:"947dd068",ai:"199322",ra:"false",pmgn:"",pmgi:"",pmp:"",qc:""},function(e){var _=d.createElement("script");_.async="async",_.src=e;var t=d.getElementsByTagName("script"),t=t[t.length-1];t.parentNode.insertBefore(_,t)}(("https:"===d.location.protocol?"https:":"http:")+"//ds-aksb-a.akamaihd.net/aksb.min.js")}</script>
								</head>
				<body>
					<!--*|IF:MC_PREVIEW_TEXT|*-->
					<!--[if !gte mso 9]><!----><span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;">*|MC_PREVIEW_TEXT|*</span><!--<![endif]-->
					<!--*|END:IF|*-->
					<center>
						<table id="bodyTable" width="100%" height="100%" cellspacing="0" cellpadding="0" border="0" align="center">
							<tbody><tr>
								<td id="bodyCell" valign="top" align="center">
									<!-- BEGIN TEMPLATE // -->
									<table width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody><tr>
											<td id="templateHeader" data-template-container="" valign="top" align="center">
												<!--[if (gte mso 9)|(IE)]>
												<table align="center" border="0" cellspacing="0" cellpadding="0" width="600" style="width:600px;">
												<tr>
												<td align="center" valign="top" width="600" style="width:600px;">
												<![endif]-->
												<table class="templateContainer" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
													<tbody><tr>
														<td class="headerContainer tpl-container" mc:container="header_container" mccontainer="header_container" valign="top"><div mc:block="13715218" mc:blocktype="image" mcblock="13715218" mcblocktype="image" class="tpl-block"><table class="mcnImageBlock" style="min-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
				<tbody class="mcnImageBlockOuter">
						<tr>
							<td style="padding:9px" class="mcnImageBlockInner" valign="top">
								<table class="mcnImageContentContainer" style="min-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
									<tbody><tr>
										<td class="mcnImageContent" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;" valign="top">
											
												
													<img alt="" src="https://mcusercontent.com/6785a4b03c282f5353f914f85/images/273681ee-cf45-a6da-45f3-e8ae4b405100.jpg" style="max-width:200px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage" width="140" align="middle">
												
											
										</td>
									</tr>
								</tbody></table>
							</td>
						</tr>
				</tbody>
			</table></div></td>
													</tr>
												</tbody></table>
												<!--[if (gte mso 9)|(IE)]>
												</td>
												</tr>
												</table>
												<![endif]-->
											</td>
										</tr>
										<tr>
											<td id="templateBody" data-template-container="" valign="top" align="center">
												<!--[if (gte mso 9)|(IE)]>
												<table align="center" border="0" cellspacing="0" cellpadding="0" width="600" style="width:600px;">
												<tr>
												<td align="center" valign="top" width="600" style="width:600px;">
												<![endif]-->
												<table class="templateContainer" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
													<tbody><tr>
														<td class="bodyContainer tpl-container" mc:container="body_container" mccontainer="body_container" valign="top"><div mc:block="13715222" mc:blocktype="text" mcblock="13715222" mcblocktype="text" class="tpl-block"><table class="mcnTextBlock" style="min-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
				<tbody class="mcnTextBlockOuter">
					<tr>
						<td class="mcnTextBlockInner" style="padding-top:9px;" valign="top">
							<!--[if mso]>
							<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
							<tr>
							<![endif]-->
							
							<!--[if mso]>
							<td valign="top" width="600" style="width:600px;">
							<![endif]-->
							<table style="max-width:100%; min-width:100%;" class="mcnTextContentContainer" width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
								<tbody><tr>
									
									<td class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;" valign="top">
									
										<h1>Nouveau signalement</h1>

									</td>
								</tr>
							</tbody></table>
							<!--[if mso]>
							</td>
							<![endif]-->
							
							<!--[if mso]>
							</tr>
							</table>
							<![endif]-->
						</td>
					</tr>
				</tbody>
			</table></div><div mc:block="13715226" mc:blocktype="divider" mcblock="13715226" mcblocktype="divider" class="tpl-block"><table class="mcnDividerBlock" style="min-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
				<tbody class="mcnDividerBlockOuter">
					<tr>
						<td class="mcnDividerBlockInner" style="min-width: 100%; padding: 27px 18px 0px;">
							<table class="mcnDividerContent" style="min-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
								<tbody><tr>
									<td>
										<span></span>
									</td>
								</tr>
							</tbody></table>
			<!--            
							<td class="mcnDividerBlockInner" style="padding: 18px;">
							<hr class="mcnDividerContent" style="border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;" />
			-->
						</td>
					</tr>
				</tbody>
			</table></div><div mc:block="13715234" mc:blocktype="divider" mcblock="13715234" mcblocktype="divider" class="tpl-block"><table class="mcnDividerBlock" style="min-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
				<tbody class="mcnDividerBlockOuter">
					<tr>
						<td class="mcnDividerBlockInner" style="min-width: 100%; padding: 9px 18px 0px;">
							<table class="mcnDividerContent" style="min-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
								<tbody><tr>
									<td>
										<span></span>
									</td>
								</tr>
							</tbody></table>
			<!--            
							<td class="mcnDividerBlockInner" style="padding: 18px;">
							<hr class="mcnDividerContent" style="border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;" />
			-->
						</td>
					</tr>
				</tbody>
			</table></div><div mc:block="13715238" mc:blocktype="text" mcblock="13715238" mcblocktype="text" class="tpl-block"><table class="mcnTextBlock" style="min-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
				<tbody class="mcnTextBlockOuter">
					<tr>
						<td class="mcnTextBlockInner" style="padding-top:9px;" valign="top">
							<!--[if mso]>
							<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
							<tr>
							<![endif]-->
							
							<!--[if mso]>
							<td valign="top" width="600" style="width:600px;">
							<![endif]-->
							<table style="max-width:100%; min-width:100%;" class="mcnTextContentContainer" width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
								<tbody><tr>
									
									<td class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;" valign="top">
									
										Un nouveau signalement à été recensé, ce signalement à été créé par : '.$email.'
									</td>
								</tr>
							</tbody></table>
							<!--[if mso]>
							</td>
							<![endif]-->
							
							<!--[if mso]>
							</tr>
							</table>
							<![endif]-->
						</td>
					</tr>
				</tbody>
			</table></div><div mc:block="13715242" mc:blocktype="divider" mcblock="13715242" mcblocktype="divider" class="tpl-block"><table class="mcnDividerBlock" style="min-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
				<tbody class="mcnDividerBlockOuter">
					<tr>
						<td class="mcnDividerBlockInner" style="min-width: 100%; padding: 9px 18px;">
							<table class="mcnDividerContent" style="min-width: 100%;border-top: 1px solid #E0E0E0;" width="100%" cellspacing="0" cellpadding="0" border="0">
								<tbody><tr>
									<td>
										<span></span>
									</td>
								</tr>
							</tbody></table>
			<!--            
							<td class="mcnDividerBlockInner" style="padding: 18px;">
							<hr class="mcnDividerContent" style="border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;" />
			-->
						</td>
					</tr>
				</tbody>
			</table></div><div mc:block="13715250" mc:blocktype="divider" mcblock="13715250" mcblocktype="divider" class="tpl-block"><table class="mcnDividerBlock" style="min-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
				<tbody class="mcnDividerBlockOuter">
					<tr>
						<td class="mcnDividerBlockInner" style="min-width: 100%; padding: 18px 18px 0px;">
							<table class="mcnDividerContent" style="min-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
								<tbody><tr>
									<td>
										<span></span>
									</td>
								</tr>
							</tbody></table>
			<!--            
							<td class="mcnDividerBlockInner" style="padding: 18px;">
							<hr class="mcnDividerContent" style="border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;" />
			-->
						</td>
					</tr>
				</tbody>
			</table></div><div mc:block="13715254" mc:blocktype="button" mcblock="13715254" mcblocktype="button" class="tpl-block"><table class="mcnButtonBlock" style="min-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
				<tbody class="mcnButtonBlockOuter">
					<tr>
						<td style="padding-top:0; padding-right:18px; padding-bottom:18px; padding-left:18px;" class="mcnButtonBlockInner" valign="top" align="center">
							<table class="mcnButtonContentContainer" style="border-collapse: separate !important;border: 1px solid #292929;border-radius: 3px;background-color: #292929;" cellspacing="0" cellpadding="0" border="0">
								<tbody>
									<tr>
										<td class="mcnButtonContent" style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 20px; padding: 10px;" valign="middle" align="center">
											<a class="mcnButton " title="Accéder" href="https://glowe.fr/fr-FR/?p=login" target="_blank" style="font-weight: normal;letter-spacing: -0.5px;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;">Accéder</a>
										</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table></div></td>
													</tr>
												</tbody></table>
												<!--[if (gte mso 9)|(IE)]>
												</td>
												</tr>
												</table>
												<![endif]-->
											</td>
										</tr>
										<tr>
											<td id="templateFooter" data-template-container="" valign="top" align="center">
												<!--[if (gte mso 9)|(IE)]>
												<table align="center" border="0" cellspacing="0" cellpadding="0" width="600" style="width:600px;">
												<tr>
												<td align="center" valign="top" width="600" style="width:600px;">
												<![endif]-->
												<table class="templateContainer" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
													<tbody><tr>
														<td class="footerContainer tpl-container" mc:container="footer_container" mccontainer="footer_container" valign="top"><div mc:block="13715258" mc:blocktype="socialFollow" mcblock="13715258" mcblocktype="socialFollow" class="tpl-block"><table class="mcnFollowBlock" style="min-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
				<tbody class="mcnFollowBlockOuter">
					<tr>
						<td style="padding:9px" class="mcnFollowBlockInner" valign="top" align="center">
							<table class="mcnFollowContentContainer" style="min-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
				<tbody><tr>
					<td style="padding-left:9px;padding-right:9px;" align="center">
						<table style="min-width:100%;" class="mcnFollowContent" width="100%" cellspacing="0" cellpadding="0" border="0">
							<tbody><tr>
								<td style="padding-top:9px; padding-right:9px; padding-left:9px;" valign="top" align="center">
									<table cellspacing="0" cellpadding="0" border="0" align="center">
										<tbody><tr>
											<td valign="top" align="center">
												<!--[if mso]>
												<table align="center" border="0" cellspacing="0" cellpadding="0">
												<tr>
												<![endif]-->
												
													<!--[if mso]>
													<td align="center" valign="top">
													<![endif]-->
													
													
														<table style="display:inline;" cellspacing="0" cellpadding="0" border="0" align="left">
															<tbody><tr>
																<td style="padding-right:10px; padding-bottom:9px;" class="mcnFollowContentItemContainer" valign="top">
																	<table class="mcnFollowContentItem" width="100%" cellspacing="0" cellpadding="0" border="0">
																		<tbody><tr>
																			<td style="padding-top:5px; padding-right:10px; padding-bottom:5px; padding-left:9px;" valign="middle" align="left">
																				<table width="" cellspacing="0" cellpadding="0" border="0" align="left">
																					<tbody><tr>
																						
																							<td class="mcnFollowIconContent" width="24" valign="middle" align="center">
																								<a href="http://glowe.fr" target="_blank"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/outline-light-link-48.png" alt="Glowe Inc." style="display:block;" class="" width="24" height="24"></a>
																							</td>
																						
																						
																					</tr>
																				</tbody></table>
																			</td>
																		</tr>
																	</tbody></table>
																</td>
															</tr>
														</tbody></table>
													
													<!--[if mso]>
													</td>
													<![endif]-->
												
													<!--[if mso]>
													<td align="center" valign="top">
													<![endif]-->
													
													
														<table style="display:inline;" cellspacing="0" cellpadding="0" border="0" align="left">
															<tbody><tr>
																<td style="padding-right:0; padding-bottom:9px;" class="mcnFollowContentItemContainer" valign="top">
																	<table class="mcnFollowContentItem" width="100%" cellspacing="0" cellpadding="0" border="0">
																		<tbody><tr>
																			<td style="padding-top:5px; padding-right:10px; padding-bottom:5px; padding-left:9px;" valign="middle" align="left">
																				<table width="" cellspacing="0" cellpadding="0" border="0" align="left">
																					<tbody><tr>
																						
																							<td class="mcnFollowIconContent" width="24" valign="middle" align="center">
																								<a href="https://discord.com/JNQzESy6Au" target="_blank"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/outline-light-instagram-48.png" alt="Discord" style="display:block;" class="" width="24" height="24"></a>
																							</td>
																						
																						
																					</tr>
																				</tbody></table>
																			</td>
																		</tr>
																	</tbody></table>
																</td>
															</tr>
														</tbody></table>
													
													<!--[if mso]>
													</td>
													<![endif]-->
												
												<!--[if mso]>
												</tr>
												</table>
												<![endif]-->
											</td>
										</tr>
									</tbody></table>
								</td>
							</tr>
						</tbody></table>
					</td>
				</tr>
			</tbody></table>

						</td>
					</tr>
				</tbody>
			</table></div><div mc:block="13715262" mc:blocktype="divider" mcblock="13715262" mcblocktype="divider" class="tpl-block"><table class="mcnDividerBlock" style="min-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
				<tbody class="mcnDividerBlockOuter">
					<tr>
						<td class="mcnDividerBlockInner" style="min-width:100%; padding:18px;">
							<table class="mcnDividerContent" style="min-width: 100%;border-top: 2px solid #505050;" width="100%" cellspacing="0" cellpadding="0" border="0">
								<tbody><tr>
									<td>
										<span></span>
									</td>
								</tr>
							</tbody></table>
			<!--            
							<td class="mcnDividerBlockInner" style="padding: 18px;">
							<hr class="mcnDividerContent" style="border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;" />
			-->
						</td>
					</tr>
				</tbody>
			</table></div><div mc:block="13715266" mc:blocktype="footer" mcblock="13715266" mcblocktype="footer" class="tpl-block"><table class="mcnTextBlock" style="min-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
				<tbody class="mcnTextBlockOuter">
					<tr>
						<td class="mcnTextBlockInner" style="padding-top:9px;" valign="top">
							<!--[if mso]>
							<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
							<tr>
							<![endif]-->
							
							<!--[if mso]>
							<td valign="top" width="600" style="width:600px;">
							<![endif]-->
							<table style="max-width:100%; min-width:100%;" class="mcnTextContentContainer" width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
								<tbody><tr>
									
									<td class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;" valign="top">
									
										© Copyright '.$currentYear.',  Glowe Inc.
									</td>
								</tr>
							</tbody></table>
							<!--[if mso]>
							</td>
							<![endif]-->
							
							<!--[if mso]>
							</tr>
							</table>
							<![endif]-->
						</td>
					</tr>
				</tbody>
			</table></div></td>
													</tr>
												</tbody></table>
												<!--[if (gte mso 9)|(IE)]>
												</td>
												</tr>
												</table>
												<![endif]-->
											</td>
										</tr>
									</tbody></table>
									<!-- // END TEMPLATE -->
								</td>
							</tr>
						</tbody></table>
					</center>
				

			</body></html>
                    ';
                    $from = 'Glowe Team\'s <no-reply@glowe.fr>';
                      
                    // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
                    $headers[] = 'MIME-Version: 1.0';
                    $headers[] = 'Content-type: text/html; charset=utf-8';
                  
                    // En-têtes additionnels
                    $headers[] = 'To: '.$mail;
                    $headers[] = 'From: '.$from;
                    $headers[] .= 'Reply-To: support@glowe.fr';
                  
                    mail($mail, $subject, $message, implode("\r\n", $headers));
				}
			
			?>
						
			<form method="post" enctype="multipart/form-data" id="formReport">

				<div class="sujet">
					<div>
						<input type="radio" name="checkbox" id="checkbox_1" onclick="openNew('reason', 'sujet', 'Non respect des CGU');" value="Non respect des CGU">
						<label for="checkbox_1">Fichier(s) ne respectant(s) pas l'article 4.</label>
					</div>

					<div>
						<input type="radio" name="checkbox" id="checkbox_2" onclick="openNew('reason', 'sujet', 'Violation de la propriété intellectuelle');" value="Violation de la propriété intellectuelle">
						<label for="checkbox_2">Violation de la propriété intellectuelle.</label>
					</div>
								
					<div>
						<input type="radio" name="checkbox" id="checkbox_3" onclick="openNew('reason', 'sujet', 'Pseudo inapproprié');" value="Pseudo inapproprié">
						<label for="checkbox_3">Pseudonyme inapproprié.</label>
					</div>
				</div>
				<div class="reason" style="display:none;">
					<div class="user-box">
						<input type="email" name="email" id="email" required>
						<label>Votre adresse mail</label>
					</div>

					<div class="user-box">
						<input type="text" name="details" id="details" required>
						<label>Détails</label>
					</div>

					<center><button type="button" id="send_report" onclick="openNew('thanks', 'reason', 'Remerciement'); before_send();">Envoyer</button></center>
				</div>
				<div class="thanks" style="display:none;">
					<center>
						<h1 id="report" class="font_h1">Merci pour ce signalement.</h1>
						<h3 id="report" class="font_h3">Nous allons examiner votre demande, nous vous<br> donnerons des informations une fois<br> la sanction tombée ou non.</h3>
					</center>
				</div>

				<button type="submit" name="submit" id="perfClick" style="display:none;">Send</button>

			</form>

			<script type="text/javascript">
				function openNew(div, divHide, value) {
					let checkbox = document.querySelector('.'+div);
					checkbox.style.display = null;

					let sujet = document.querySelector('.'+divHide);
					sujet.style.display = "none";

					let trace = document.createElement("p");
					trace.className = "paragraphe-1";
					trace.innerText = "Signaler > "+value;
					checkbox.append(trace);
				}

				function before_send() {
					setTimeout(() => {
						send();
					}, 5000);
				}

				function send(){
					document.getElementById('perfClick').click();
				}
			</script>

		</div>

	</aside>

<?php

	}else{

?>

	<section>
			
		<div id="panel-div-stockage" style="min-height: 100vh; height: auto;">

			<center><br><br><br><br><br>
				
				<h1 style="color: #2a2a2a;">Dossier non disponible.</h1>

			</center>

		</div>

	</section>

<?php

	}

?>