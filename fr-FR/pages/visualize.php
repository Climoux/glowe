<?php
  
    if(isset($_GET['email']) && !empty($_GET['email'])){
		$email = $_GET['email'];
	}else{
		$email = 'confirmation';
    }
    
    if(isset($_GET['name']) && !empty($_GET['name'])){
		$name = $_GET['name'];
	}else{
		$name = '';
    }
    
    if ($email == "confirmation") {
  
?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
     <head> 
      <meta charset="UTF-8"> 
      <meta content="width=device-width, initial-scale=1" name="viewport"> 
      <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
      <meta content="telephone=no" name="format-detection">
      <title>Glowe - Confirm Email</title> 
      <!--[if (mso 16)]>
        <style type="text/css">
        a {text-decoration: none;}
        </style>
        <![endif]--> 
      <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]--> 
      <!--[if gte mso 9]>
    <xml>
        <o:OfficeDocumentSettings>
        <o:AllowPNG></o:AllowPNG>
        <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml>
    <![endif]--> 
      <!--[if !mso]><!-- --> 
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i" rel="stylesheet"> 
      <!--<![endif]-->
      <style type="text/css">
    .rollover:hover .rollover-first {
    	max-height:0px!important;
    	display:none!important;
    }
    .rollover:hover .rollover-second {
    	max-height:none!important;
    	display:block!important;
    }
    #outlook a {
    	padding:0;
    }
    .es-button {
    	mso-style-priority:100!important;
    	text-decoration:none!important;
    }
    a[x-apple-data-detectors] {
    	color:inherit!important;
    	text-decoration:none!important;
    	font-size:inherit!important;
    	font-family:inherit!important;
    	font-weight:inherit!important;
    	line-height:inherit!important;
    }
    .es-desk-hidden {
    	display:none;
    	float:left;
    	overflow:hidden;
    	width:0;
    	max-height:0;
    	line-height:0;
    	mso-hide:all;
    }
    .es-button-border:hover {
    	border-style:solid solid solid solid!important;
    	background:#0b317e!important;
    	border-color:#42d159 #42d159 #42d159 #42d159!important;
    }
    .es-button-border:hover a.es-button, .es-button-border:hover button.es-button {
    	background:#0b317e!important;
    	border-color:#0b317e!important;
    }
    [data-ogsb] .es-button {
    	border-width:0!important;
    	padding:10px 20px 10px 20px!important;
    }
    [data-ogsb] .es-button.es-button-1 {
    	padding:10px 20px!important;
    }
    @media only screen and (max-width:600px) {.st-br { padding-left:10px!important; padding-right:10px!important } p, ul li, ol li, a { line-height:150%!important } h1 { font-size:30px!important; text-align:center; line-height:120%!important } h2 { font-size:26px!important; text-align:center; line-height:120%!important } h3 { font-size:20px!important; text-align:center; line-height:120%!important } h1 a { text-align:center } .es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a { font-size:30px!important } h2 a { text-align:center } .es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a { font-size:26px!important } h3 a { text-align:center } .es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a { font-size:20px!important } .es-menu td a { font-size:14px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:16px!important } .es-content-body p, .es-content-body ul li, .es-content-body ol li, .es-content-body a { font-size:16px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:14px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class="gmail-fix"] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:block!important } a.es-button, button.es-button { font-size:16px!important; display:block!important; border-left-width:0px!important; border-right-width:0px!important } .es-adaptive table, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0!important } .es-m-p0r { padding-right:0!important } .es-m-p0l { padding-left:0!important } .es-m-p0t { padding-top:0!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } tr.es-desk-hidden { display:table-row!important } table.es-desk-hidden { display:table!important } td.es-desk-menu-hidden { display:table-cell!important } .es-menu td { width:1%!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } .es-m-p5 { padding:5px!important } .es-m-p5t { padding-top:5px!important } .es-m-p5b { padding-bottom:5px!important } .es-m-p5r { padding-right:5px!important } .es-m-p5l { padding-left:5px!important } .es-m-p10 { padding:10px!important } .es-m-p10t { padding-top:10px!important } .es-m-p10b { padding-bottom:10px!important } .es-m-p10r { padding-right:10px!important } .es-m-p10l { padding-left:10px!important } .es-m-p15 { padding:15px!important } .es-m-p15t { padding-top:15px!important } .es-m-p15b { padding-bottom:15px!important } .es-m-p15r { padding-right:15px!important } .es-m-p15l { padding-left:15px!important } .es-m-p20 { padding:20px!important } .es-m-p20t { padding-top:20px!important } .es-m-p20r { padding-right:20px!important } .es-m-p20l { padding-left:20px!important } .es-m-p25 { padding:25px!important } .es-m-p25t { padding-top:25px!important } .es-m-p25b { padding-bottom:25px!important } .es-m-p25r { padding-right:25px!important } .es-m-p25l { padding-left:25px!important } .es-m-p30 { padding:30px!important } .es-m-p30t { padding-top:30px!important } .es-m-p30b { padding-bottom:30px!important } .es-m-p30r { padding-right:30px!important } .es-m-p30l { padding-left:30px!important } .es-m-p35 { padding:35px!important } .es-m-p35t { padding-top:35px!important } .es-m-p35b { padding-bottom:35px!important } .es-m-p35r { padding-right:35px!important } .es-m-p35l { padding-left:35px!important } .es-m-p40 { padding:40px!important } .es-m-p40t { padding-top:40px!important } .es-m-p40b { padding-bottom:40px!important } .es-m-p40r { padding-right:40px!important } .es-m-p40l { padding-left:40px!important } button.es-button { width:100% } }
    </style> 
     </head> 
     <body style="width:100%;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0"> 
      <div class="es-wrapper-color" style="background-color:#F8F9FD"> 
       <!--[if gte mso 9]>
    			<v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
    				<v:fill type="tile" color="#f8f9fd"></v:fill>
    			</v:background>
    		<![endif]--> 
       <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top"> 
         <tr> 
          <td valign="top" style="padding:0;Margin:0"> 
           <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%"> 
             <tr> 
              <td style="padding:0;Margin:0;background-color:#F8F9FD" bgcolor="#f8f9fd" align="center"> 
               <table class="es-content-body" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px"> 
                 <tr> 
                  <td align="left" style="Margin:0;padding-top:10px;padding-bottom:15px;padding-left:30px;padding-right:30px"> 
                   <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                     <tr> 
                      <td valign="top" align="center" style="padding:0;Margin:0;width:540px"> 
                       <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                         <tr> 
                          <td style="padding:0;Margin:0;font-size:0px" align="center"><a target="_blank" href="https://glowe.fr/" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#2CB543;font-size:16px"><img src="https://piyash.stripocdn.email/content/guids/c42480cc-23bc-4017-9c7d-2894fe9fbf58/images/20101620233024863.jpg" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="130"></a></td>
                         </tr> 
                       </table></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table></td> 
             </tr> 
           </table> 
           <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%"> 
             <tr> 
              <td style="padding:0;Margin:0;background-color:#F8F9FD" bgcolor="#f8f9fd" align="center"> 
               <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px" cellspacing="0" cellpadding="0" bgcolor="transparent" align="center"> 
                 <tr> 
                  <td align="left" style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px"> 
                   <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                     <tr> 
                      <td valign="top" align="center" style="padding:0;Margin:0;width:560px"> 
                       <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                         <tr> 
                          <td align="center" style="padding:0;Margin:0;padding-bottom:10px"><h1 style="Margin:0;line-height:36px;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:30px;font-style:normal;font-weight:bold;color:#212121">Confirmation<br></h1></td> 
                         </tr> 
                         <tr> 
                          <td style="padding:0;Margin:0"> 
                           <center> 
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#131313;font-size:16px">Pour confirmer votre compte cliquez <a href="https://glowe.fr/pages/verification.php?user=<?php $_SESSION['name'] ?>" id="a-here" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#2CB543;font-size:16px">ici.</a></p> 
                           </center></td> 
                         </tr> 
                       </table></td> 
                     </tr>
                   </table></td> 
                 </tr> 
                 <tr> 
                  <td class="es-m-p15t es-m-p0b es-m-p0r es-m-p0l" align="left" style="padding:0;Margin:0;padding-top:15px"> 
                   <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                     <tr> 
                      <td valign="top" align="center" style="padding:0;Margin:0;width:600px"> 
                       <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                         <tr> 
                          <td style="padding:0;Margin:0"> 
                           <center> 
                            <svg id="a1446b94-79a8-45dc-beee-b314ae1acdc1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="505.46625" height="596.94537" viewbox="0 0 505.46625 596.94537" style="width:150px;height:150px"> 
                             <path d="M706.73312,652.47268l5,96S500.239,547.178,473.89063,488.28153,497.13921,283.694,497.13921,283.694l110.04332,60.44633Z" transform="translate(-347.26688 -151.52732)" fill="#9f616a" /> 
                             <path d="M382.44618,243.39641l-32.548,3.09981s-17.049,37.19774,35.64783,40.29756Z" transform="translate(-347.26688 -151.52732)" fill="#9f616a" /> 
                             <path d="M382.44618,300.74293l-32.548,3.09981s-17.049,37.19774,35.64783,40.29755Z" transform="translate(-347.26688 -151.52732)" fill="#9f616a" /> 
                             <path d="M382.44618,362.73916l-32.548,3.09981s-17.049,37.19774,35.64783,40.29756Z" transform="translate(-347.26688 -151.52732)" fill="#9f616a" /> 
                             <path d="M391.74562,424.7354l-32.548,3.09981s-17.049,37.19774,35.64784,40.29755Z" transform="translate(-347.26688 -151.52732)" fill="#9f616a" /> 
                             <path d="M366.60044,258.3401h2.46966V190.68455a39.15718,39.15718,0,0,1,39.15715-39.15723H551.56477a39.15718,39.15718,0,0,1,39.15726,39.1571V561.84816a39.15719,39.15719,0,0,1-39.15715,39.15723H408.22744a39.1572,39.1572,0,0,1-39.15731-39.15708V306.49848h-2.46969Z" transform="translate(-347.26688 -151.52732)" fill="#3f3d56" /> 
                             <path d="M406.64739,161.71467h18.71028a13.8929,13.8929,0,0,0,12.86292,19.13985h82.1162a13.89286,13.89286,0,0,0,12.86291-19.13987h17.47545a29.24215,29.24215,0,0,1,29.24218,29.24211V561.57589a29.24216,29.24216,0,0,1-29.24214,29.24218H406.64739a29.24216,29.24216,0,0,1-29.24218-29.24214h0V190.95679A29.24214,29.24214,0,0,1,406.64739,161.71467Z" transform="translate(-347.26688 -151.52732)" fill="#fff" /> 
                             <rect x="100.53673" y="114.01642" width="61.71533" height="14.89247" fill="#6c63ff" style="isolation:isolate" /> 
                             <rect x="97.59857" y="178.00873" width="67.59164" height="14.89247" fill="#e5e5e5" /> 
                             <rect x="55.96534" y="209.9996" width="150.85812" height="14.89247" fill="#e5e5e5" /> 
                             <rect x="55.96534" y="241.99047" width="150.85812" height="14.89247" fill="#e5e5e5" /> 
                             <path d="M852.73312,702.47268l-173.48-197.91713-6.19962-127.09228-65.096-108.49341-18.59887-46.49718s-43.39736,4.64972-7.74953,92.99435l14.72411,47.27213,0,0a216.67408,216.67408,0,0,0-20.14876,91.24394v108.3237c0,25.50678,121.55,164.44287,135.69866,185.6658l0,0Z" transform="translate(-347.26688 -151.52732)" fill="#9f616a" /> 
                             <polygon points="247.195 126.636 260.136 120.276 259.695 119.378 247.738 125.255 229.688 77.932 228.754 78.289 247.195 126.636" opacity="0.2" /> 
                             <rect x="358.98404" y="239.81058" width="1.00012" height="20.43016" transform="translate(-346.65612 349.39987) rotate(-69.7779)" opacity="0.2" /> 
                             <rect x="358.98404" y="297.81058" width="1.00012" height="20.43016" transform="translate(-401.08099 387.35158) rotate(-69.7779)" opacity="0.2" /> 
                             <rect x="358.98404" y="359.81058" width="1.00012" height="20.43016" transform="translate(-459.25929 427.92066) rotate(-69.7779)" opacity="0.2" /> 
                             <rect x="364.06574" y="425.55799" width="0.99981" height="10.35283" transform="translate(-528.7721 421.49849) rotate(-64.36101)" opacity="0.2" /> 
                             <circle cx="131.47081" cy="342.17535" r="43.22999" fill="#6c63ff" /> 
                             <polygon points="127.351 360.424 114.413 343.787 121.937 337.935 128.063 345.812 148.76 323.964 155.681 330.521 127.351 360.424" fill="#fff" /> 
                            </svg> 
                           </center></td> 
                         </tr> 
                       </table></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table></td> 
             </tr> 
           </table> 
           <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%"> 
             <tr> 
              <td style="padding:0;Margin:0;background-color:#071F4F;background-image:url(https://piyash.stripocdn.email/content/guids/CABINET_1ce849b9d6fc2f13978e163ad3c663df/images/10801592857268437.png);background-repeat:no-repeat;background-position:center top" bgcolor="#071f4f" background="https://piyash.stripocdn.email/content/guids/CABINET_1ce849b9d6fc2f13978e163ad3c663df/images/10801592857268437.png" align="center"> 
               <table class="es-content-body" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px"> 
                 <tr> 
                  <td align="left" style="Margin:0;padding-left:30px;padding-right:30px;padding-top:40px;padding-bottom:40px"> 
                   <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                     <tr> 
                      <td valign="top" align="center" style="padding:0;Margin:0;width:540px"> 
                       <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                         <tr> 
                          <td height="20" align="center" style="padding:0;Margin:0"></td> 
                         </tr> 
                         <tr> 
                          <td align="left" style="padding:0;Margin:0;padding-bottom:10px"><h1 style="Margin:0;line-height:36px;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:30px;font-style:normal;font-weight:bold;color:#FFFFFF;text-align:center">Merci !<br></h1></td> 
                         </tr> 
                         <tr> 
                          <td align="center" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#FFFFFF;font-size:16px">Merci d'avoir choisi notre service d'hébergement, Glowe !<br> Grâce à vous, Glowe s'agrandit petit a petit.<br><br>Glowe - Fiable, Rapide, Sécrurisé<br></p></td> 
                         </tr> 
                       </table></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table></td> 
             </tr> 
           </table> 
           <table class="es-footer" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:#F6F6F6;background-repeat:repeat;background-position:center top"> 
             <tr> 
              <td style="padding:0;Margin:0;background-color:#FFFFFF" bgcolor="#fff" align="center"> 
               <table class="es-footer-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center"> 
                 <tr> 
                  <td style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px;background-color:#FFFFFF" bgcolor="#ffffff" align="left"> 
                   <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                     <tr> 
                      <td valign="top" align="center" style="padding:0;Margin:0;width:560px"> 
                       <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                         <tr> 
                          <td style="padding:0;Margin:0;font-size:0" align="center"> 
                           <table class="es-table-not-adapt es-social" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                             <tr> 
                              <td valign="top" align="center" style="padding:0;Margin:0"><a target="_blank" href="https://discord.gg/JNQzESy6Au" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#FFFFFF;font-size:16px"><img src="https://piyash.stripocdn.email/content/guids/c42480cc-23bc-4017-9c7d-2894fe9fbf58/images/20441620233510930.png" alt="discord" title="Discord" width="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td> 
                             </tr> 
                           </table></td> 
                         </tr> 
                       </table></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
                 <tr> 
                  <td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px"> 
                   <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                     <tr> 
                      <td valign="top" align="center" style="padding:0;Margin:0;width:560px"> 
                       <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                         <tr> 
                          <td style="padding:0;Margin:0"> 
                           <center> 
                            <h3 style="Margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:20px;font-style:normal;font-weight:normal;color:#212121">Glowe:</h3> 
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#131313;font-size:16px"><a href="https://glowe.fr/" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#000000;font-size:16px">À Propos du Site</a></p> 
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#131313;font-size:16px"><a href="https://glowe.fr/?p=stockage-panel" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#000000;font-size:16px">Uploader un Fichier</a></p> 
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#131313;font-size:16px"><a href="https://glowe.fr/?p=recruitment" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#000000;font-size:16px">Recrutements</a></p> 
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#131313;font-size:16px"><a href="https://glowe.fr/?p=cgu" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#000000;font-size:16px">Conditions Générales d'Utilisation</a></p> 
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#131313;font-size:16px"><a href="https://glowe.fr/index.php" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#000000;font-size:16px">Nous contacter</a></p> 
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#131313;font-size:16px"><a href="https://discord.gg/pPDAJECP9d" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#000000;font-size:16px">Discord</a></p> 
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#131313;font-size:16px"><a href="https://glowe.fr/pages/visualize.php" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#000000;font-size:16px">Si vous ne pouvez pas voir ceci cliquez</a></p>
                            <small>© Copyright 2021, Glowe Inc.</small> 
                           </center></td> 
                         </tr> 
                       </table></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table></td> 
             </tr> 
           </table></td> 
         </tr> 
       </table> 
      </div>  
     </body>
    </html>
    
<?php

    } else if ($email == "new_ip") {
        
?>
        
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
     <head> 
      <meta charset="UTF-8"> 
      <meta content="width=device-width, initial-scale=1" name="viewport"> 
      <meta name="x-apple-disable-message-reformatting"> 
      <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
      <meta content="telephone=no" name="format-detection"> 
      <title>Glowe - New Location</title> 
      <!--[if (mso 16)]>
        <style type="text/css">
        a {text-decoration: none;}
        </style>
        <![endif]--> 
      <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]--> 
      <!--[if gte mso 9]>
    <xml>
        <o:OfficeDocumentSettings>
        <o:AllowPNG></o:AllowPNG>
        <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml>
    <![endif]--> 
      <!--[if !mso]><!-- --> 
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i" rel="stylesheet"> 
      <!--<![endif]--> 
      <style type="text/css">
    .rollover:hover .rollover-first {
    	max-height:0px!important;
    	display:none!important;
    }
    .rollover:hover .rollover-second {
    	max-height:none!important;
    	display:block!important;
    }
    #outlook a {
    	padding:0;
    }
    .es-button {
    	mso-style-priority:100!important;
    	text-decoration:none!important;
    }
    a[x-apple-data-detectors] {
    	color:inherit!important;
    	text-decoration:none!important;
    	font-size:inherit!important;
    	font-family:inherit!important;
    	font-weight:inherit!important;
    	line-height:inherit!important;
    }
    .es-desk-hidden {
    	display:none;
    	float:left;
    	overflow:hidden;
    	width:0;
    	max-height:0;
    	line-height:0;
    	mso-hide:all;
    }
    .es-button-border:hover {
    	border-style:solid solid solid solid!important;
    	background:#0b317e!important;
    	border-color:#42d159 #42d159 #42d159 #42d159!important;
    }
    .es-button-border:hover a.es-button, .es-button-border:hover button.es-button {
    	background:#0b317e!important;
    	border-color:#0b317e!important;
    }
    [data-ogsb] .es-button {
    	border-width:0!important;
    	padding:10px 20px 10px 20px!important;
    }
    [data-ogsb] .es-button.es-button-1 {
    	padding:10px 20px!important;
    }
    @media only screen and (max-width:600px) {.st-br { padding-left:10px!important; padding-right:10px!important } p, ul li, ol li, a { line-height:150%!important } h1 { font-size:30px!important; text-align:center; line-height:120%!important } h2 { font-size:26px!important; text-align:center; line-height:120%!important } h3 { font-size:20px!important; text-align:center; line-height:120%!important } h1 a { text-align:center } .es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a { font-size:30px!important } h2 a { text-align:center } .es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a { font-size:26px!important } h3 a { text-align:center } .es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a { font-size:20px!important } .es-menu td a { font-size:14px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:16px!important } .es-content-body p, .es-content-body ul li, .es-content-body ol li, .es-content-body a { font-size:16px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:14px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class="gmail-fix"] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:block!important } a.es-button, button.es-button { font-size:16px!important; display:block!important; border-left-width:0px!important; border-right-width:0px!important } .es-adaptive table, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0!important } .es-m-p0r { padding-right:0!important } .es-m-p0l { padding-left:0!important } .es-m-p0t { padding-top:0!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } tr.es-desk-hidden { display:table-row!important } table.es-desk-hidden { display:table!important } td.es-desk-menu-hidden { display:table-cell!important } .es-menu td { width:1%!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } .es-m-p5 { padding:5px!important } .es-m-p5t { padding-top:5px!important } .es-m-p5b { padding-bottom:5px!important } .es-m-p5r { padding-right:5px!important } .es-m-p5l { padding-left:5px!important } .es-m-p10 { padding:10px!important } .es-m-p10t { padding-top:10px!important } .es-m-p10b { padding-bottom:10px!important } .es-m-p10r { padding-right:10px!important } .es-m-p10l { padding-left:10px!important } .es-m-p15 { padding:15px!important } .es-m-p15t { padding-top:15px!important } .es-m-p15b { padding-bottom:15px!important } .es-m-p15r { padding-right:15px!important } .es-m-p15l { padding-left:15px!important } .es-m-p20 { padding:20px!important } .es-m-p20t { padding-top:20px!important } .es-m-p20r { padding-right:20px!important } .es-m-p20l { padding-left:20px!important } .es-m-p25 { padding:25px!important } .es-m-p25t { padding-top:25px!important } .es-m-p25b { padding-bottom:25px!important } .es-m-p25r { padding-right:25px!important } .es-m-p25l { padding-left:25px!important } .es-m-p30 { padding:30px!important } .es-m-p30t { padding-top:30px!important } .es-m-p30b { padding-bottom:30px!important } .es-m-p30r { padding-right:30px!important } .es-m-p30l { padding-left:30px!important } .es-m-p35 { padding:35px!important } .es-m-p35t { padding-top:35px!important } .es-m-p35b { padding-bottom:35px!important } .es-m-p35r { padding-right:35px!important } .es-m-p35l { padding-left:35px!important } .es-m-p40 { padding:40px!important } .es-m-p40t { padding-top:40px!important } .es-m-p40b { padding-bottom:40px!important } .es-m-p40r { padding-right:40px!important } .es-m-p40l { padding-left:40px!important } button.es-button { width:100% } }
    </style> 
     </head> 
     <body style="width:100%;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0"> 
      <div class="es-wrapper-color" style="background-color:#F8F9FD"> 
       <!--[if gte mso 9]>
    			<v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
    				<v:fill type="tile" color="#f8f9fd"></v:fill>
    			</v:background>
    		<![endif]--> 
       <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top"> 
         <tr> 
          <td valign="top" style="padding:0;Margin:0"> 
           <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%"> 
             <tr> 
              <td style="padding:0;Margin:0;background-color:#F8F9FD" bgcolor="#f8f9fd" align="center"> 
               <table class="es-content-body" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px"> 
                 <tr> 
                  <td align="left" style="Margin:0;padding-top:10px;padding-bottom:15px;padding-left:30px;padding-right:30px"> 
                   <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                     <tr> 
                      <td valign="top" align="center" style="padding:0;Margin:0;width:540px"> 
                       <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                         <tr> 
                          <td style="padding:0;Margin:0;font-size:0px" align="center"><img src="https://piyash.stripocdn.email/content/guids/c42480cc-23bc-4017-9c7d-2894fe9fbf58/images/20101620233024863.jpg" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="130"></td> 
                         </tr> 
                       </table></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table></td> 
             </tr> 
           </table> 
           <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%"> 
             <tr> 
              <td style="padding:0;Margin:0;background-color:#F8F9FD" bgcolor="#f8f9fd" align="center"> 
               <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px" cellspacing="0" cellpadding="0" bgcolor="transparent" align="center"> 
                 <tr> 
                  <td align="left" style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px"> 
                   <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                     <tr> 
                      <td valign="top" align="center" style="padding:0;Margin:0;width:560px"> 
                       <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                         <tr> 
                          <td align="center" style="padding:0;Margin:0;padding-bottom:10px"><h1 style="Margin:0;line-height:36px;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:30px;font-style:normal;font-weight:bold;color:#212121">Nouveau lieu de connexion détécté<br></h1></td> 
                         </tr> 
                         <tr> 
                          <td style="padding:0;Margin:0"> 
                           <center> 
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#131313;font-size:16px">Pour confirmer que c'est bien vous merci de cliquer <a href="https://glowe.fr/fr-FR/pages/location.php?user=<?php echo $name; ?>" id="a-here" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#2CB543;font-size:16px">ici.</a></p> 
                           </center></td> 
                         </tr> 
                       </table></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
                 <tr> 
                  <td class="es-m-p15t es-m-p0b es-m-p0r es-m-p0l" align="left" style="padding:0;Margin:0;padding-top:15px"> 
                   <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                     <tr> 
                      <td valign="top" align="center" style="padding:0;Margin:0;width:600px"> 
                       <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                         <tr> 
                          <td style="padding:0;Margin:0"> 
                           <center> 
                            <svg id="ff41f38c-6ef4-4d72-b305-d437d63a9edd" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="819.07045" height="584" viewbox="0 0 819.07045 584" style="width:250px;height:250px" class="injected-svg modal__media modal__lg_media" data-src="https://42f2671d685f51e10fc6-b9fcecea3e50b3b59bdc28dead054ebc.ssl.cf5.rackcdn.com/illustrations/Security_on_re_e491.svg" xmlns:xlink="httpa://www.w3.org/1999/xlink"> 
                             <path d="M938.36645,683.35934c7.18382,12.69813,1.0921,55.58546,1.0921,55.58546s-39.89068-16.88557-47.07316-29.57842a26.41318,26.41318,0,0,1,45.98106-26.007Z" transform="translate(-190.46477 -158)" fill="#f1f1f1" /> 
                             <path d="M940.037,738.8895l-.84744.17853c-8.16221-38.77834-36.66552-65.075-36.95246-65.33607l.58274-.64064C903.1088,673.35408,931.81545,699.82958,940.037,738.8895Z" transform="translate(-190.46477 -158)" fill="#fff" /> 
                             <path d="M1003.63788,697.81816c-9.74789,17.68309-64.70648,41.63828-64.70648,41.63828s-9.06086-59.2631.68177-76.94077a36.55622,36.55622,0,1,1,64.02471,35.30249Z" transform="translate(-190.46477 -158)" fill="#f1f1f1" /> 
                             <path d="M939.41646,740.09789l-.82555-.869c39.76932-37.7685,50.06448-90.44509,50.16385-90.97274l1.17793.2216C989.83286,649.009,979.47454,702.05508,939.41646,740.09789Z" transform="translate(-190.46477 -158)" fill="#fff" /> 
                             <path d="M383.03037,563.91909a75.18955,75.18955,0,0,1-18.63955-2.41115l-1.19992-.332-1.11309-.55768c-40.242-20.17656-74.192-46.827-100.90712-79.21137a299.86458,299.86458,0,0,1-50.94916-90.47014,348.20978,348.20978,0,0,1-19.69086-122.66453c.017-.87611.03139-1.55256.03139-2.01861,0-20.28912,11.262-38.0913,28.69121-45.35357,13.33947-5.55813,134.45539-55.30526,143.20632-58.89963,16.48038-8.25772,34.062-1.36535,36.87554-.16006,6.31094,2.58025,118.2752,48.375,142.47062,59.89621,24.93578,11.87415,31.5889,33.20566,31.5889,43.93787,0,48.58822-8.415,93.99778-25.01129,134.9674a312.51684,312.51684,0,0,1-56.16213,90.51087c-45.84677,51.59381-91.7057,69.8841-92.14828,70.0453A50.11,50.11,0,0,1,383.03037,563.91909Zm-10.78453-26.71374c3.97586.89138,13.12949,2.22845,19.0957.052,7.57929-2.76408,45.96243-22.668,81.83036-63.03189,49.55709-55.769,74.70242-125.87542,74.73919-208.37177-.08852-1.67134-1.27542-13.59188-17.06153-21.10867C507.12331,233.44669,390.746,185.86014,389.5732,185.38052l-.32154-.13631c-2.43886-1.022-10.20055-3.1747-15.55082-.371l-1.07124.49943c-1.2972.53279-129.86317,53.33754-143.57481,59.05064-9.59168,3.99651-13.00917,13.89729-13.00917,21.83037,0,.57973-.015,1.423-.03619,2.51294C214.91358,325.21375,227.97577,464.11262,372.24584,537.20535Z" transform="translate(-190.46477 -158)" fill="#3f3d56" /> 
                             <path d="M367.78865,173.58611S238.05415,226.86992,224.154,232.66164s-20.85019,19.69184-20.85019,33.592S192.87875,461.53177,367.78865,549.22768c0,0,15.87478,4.39241,27.91882,0s164.9454-78.52642,164.9454-283.55325c0,0,0-20.85018-24.32522-32.43362s-141.93358-59.6547-141.93358-59.6547S379.95125,167.21522,367.78865,173.58611Z" transform="translate(-190.46477 -158)" fill="#299cbb" /> 
                             <path d="M381.68877,215.28648V499.53673S250.79593,436.53013,251.95428,270.887Z" transform="translate(-190.46477 -158)" opacity="0.1" /> 
                             <polygon points="192.931 261.581 151.235 207.969 175.483 189.11 195.226 214.494 261.921 144.088 284.224 165.219 192.931 261.581" fill="#fff" /> 
                             <path d="M1008.53523,742h-381a1,1,0,0,1,0-2h381a1,1,0,0,1,0,2Z" transform="translate(-190.46477 -158)" fill="#cacaca" /> 
                             <polygon points="547.206 568.237 562.671 568.236 570.029 508.583 547.203 508.584 547.206 568.237" fill="#ffb8b8" /> 
                             <path d="M733.72532,721.18754l30.45762-.00123h.00123a19.411,19.411,0,0,1,19.41,19.40966v.63075l-49.86791.00185Z" transform="translate(-190.46477 -158)" fill="#2f2e41" /> 
                             <polygon points="599.206 568.237 614.671 568.236 622.029 508.583 599.203 508.584 599.206 568.237" fill="#ffb8b8" /> 
                             <path d="M785.72532,721.18754l30.45762-.00123h.00123a19.411,19.411,0,0,1,19.41,19.40966v.63075l-49.86791.00185Z" transform="translate(-190.46477 -158)" fill="#2f2e41" /> 
                             <polygon points="571.514 358.75 575.224 548 545.213 546.139 524.393 425.597 517.817 343.408 571.514 358.75" fill="#2f2e41" /> 
                             <path d="M813.48315,484.9709,817.68877,709l-35-1-7.56-133.17025-13.15012-48.21688-53.6962-25.20436,8.76674-60.27119,78.90049-1.09584Z" transform="translate(-190.46477 -158)" fill="#2f2e41" /> 
                             <circle cx="562.67565" cy="99.59389" r="26.83826" fill="#ffb8b8" /> 
                             <polygon points="584.936 137.738 589.047 143.966 600.006 174.649 591.239 294.095 539.734 295.192 533.16 158.211 546.933 140.995 584.936 137.738" fill="#ccc" /> 
                             <path d="M702.80325,319.499l-8.76674-1.09584s-2.19169,1.09584-3.2875,8.76671-14.24592,75.613-14.24592,75.613l17.53342,83.28385,19.7251-26.30016-12.05417-46.02526,12.05424-46.0253Z" transform="translate(-190.46477 -158)" fill="#2f2e41" /> 
                             <polygon points="624.114 160.404 630.689 160.404 647.127 249.166 631.785 318.204 616.443 293 620.826 265.604 618.635 241.496 610.964 227.249 624.114 160.404" fill="#2f2e41" /> 
                             <path d="M768.99945,257.59388l-4.87969-1.21993s-3.65974-20.73866-12.19924-18.29882-30.498,4.8797-30.498-4.87969,20.73867-18.29882,32.93783-17.0789,27.77947,5.267,31.71794,23.17848c6.31357,28.713-13.02638,35.96549-13.02638,35.96549l.32185-1.04544a16.28235,16.28235,0,0,0-4.37432-16.62119Z" transform="translate(-190.46477 -158)" fill="#2f2e41" /> 
                             <path d="M695.13238,318.40319l35.06691-14.24592,8.2188-6.02712,24.65642,109.03608,11.5063-112.32365,45.47733,23.56058L804.7164,392.92027l-2.19168,28.49185,6.57505,23.01263s23.0126,16.43761,15.34174,33.971-16.43761,18.6293-16.43761,18.6293-37.25859-35.06688-39.45021-43.83362-5.47918-24.10847-5.47918-24.10847-18.6293,70.13377-40.546,69.0379-21.91679-24.10848-21.91679-24.10848l5.47918-24.10848,8.76674-25.20432-4.38337-41.64192Z" transform="translate(-190.46477 -158)" fill="#2f2e41" /> 
                            </svg> 
                           </center></td> 
                         </tr> 
                       </table></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table></td> 
             </tr> 
           </table> 
           <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%"> 
             <tr> 
              <td style="padding:0;Margin:0;background-color:#071F4F;background-image:url(https://piyash.stripocdn.email/content/guids/CABINET_1ce849b9d6fc2f13978e163ad3c663df/images/10801592857268437.png);background-repeat:no-repeat;background-position:center top" bgcolor="#071f4f" background="https://piyash.stripocdn.email/content/guids/CABINET_1ce849b9d6fc2f13978e163ad3c663df/images/10801592857268437.png" align="center"> 
               <table class="es-content-body" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px"> 
                 <tr> 
                  <td align="left" style="Margin:0;padding-left:30px;padding-right:30px;padding-top:40px;padding-bottom:40px"> 
                   <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                     <tr> 
                      <td valign="top" align="center" style="padding:0;Margin:0;width:540px"> 
                       <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                         <tr> 
                          <td height="20" align="center" style="padding:0;Margin:0"></td> 
                         </tr> 
                         <tr> 
                          <td align="left" style="padding:0;Margin:0;padding-bottom:10px"><h1 style="Margin:0;line-height:36px;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:30px;font-style:normal;font-weight:bold;color:#FFFFFF;text-align:center">Ce n'est pas vous ?<br></h1></td> 
                         </tr> 
                         <tr> 
                          <td align="center" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#FFFFFF;font-size:16px">Si cette nouvelle connexion ne vient pas de vous,<br>merci de contacter le service de Glowe depuis un service tiers.<br><br>Glowe - Fiable, Rapide, Sécrurisé</p></td> 
                         </tr> 
                       </table></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table></td> 
             </tr> 
           </table> 
           <table class="es-footer" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:#F6F6F6;background-repeat:repeat;background-position:center top"> 
             <tr> 
              <td style="padding:0;Margin:0;background-color:#FFFFFF" bgcolor="#fff" align="center"> 
               <table class="es-footer-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center"> 
                 <tr> 
                  <td style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px;background-color:#FFFFFF" bgcolor="#ffffff" align="left"> 
                   <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                     <tr> 
                      <td valign="top" align="center" style="padding:0;Margin:0;width:560px"> 
                       <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                         <tr> 
                          <td style="padding:0;Margin:0;font-size:0" align="center"> 
                           <table class="es-table-not-adapt es-social" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                             <tr> 
                              <td valign="top" align="center" style="padding:0;Margin:0"><a target="_blank" href="https://discord.gg/JNQzESy6Au" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#FFFFFF;font-size:16px"><img src="https://piyash.stripocdn.email/content/guids/c42480cc-23bc-4017-9c7d-2894fe9fbf58/images/20441620233510930.png" alt="discord" title="Discord" width="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td> 
                             </tr> 
                           </table></td> 
                         </tr> 
                       </table></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
                 <tr> 
                  <td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px"> 
                   <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                     <tr> 
                      <td valign="top" align="center" style="padding:0;Margin:0;width:560px"> 
                       <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                         <tr> 
                          <td style="padding:0;Margin:0"> 
                           <center> 
                            <h3 style="Margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:20px;font-style:normal;font-weight:normal;color:#212121">Glowe:</h3> 
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#131313;font-size:16px"><a href="https://glowe.fr/" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#000000;font-size:16px">À Propos du Site</a></p> 
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#131313;font-size:16px"><a href="https://glowe.fr/?p=stockage-panel" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#000000;font-size:16px">Uploader un Fichier</a></p> 
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#131313;font-size:16px"><a href="https://glowe.fr/?p=recruitment" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#000000;font-size:16px">Recrutements</a></p> 
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#131313;font-size:16px"><a href="https://glowe.fr/?p=cgu" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#000000;font-size:16px">Conditions Générales d'Utilisation</a></p> 
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#131313;font-size:16px"><a href="https://glowe.fr/index.php" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#000000;font-size:16px">Nous contacter</a></p> 
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#131313;font-size:16px"><a href="https://discord.gg/pPDAJECP9d" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#000000;font-size:16px">Discord</a></p> 
                            <small>© Copyright 2021, Glowe Inc.</small> 
                           </center></td> 
                         </tr> 
                       </table></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table></td> 
             </tr> 
           </table></td> 
         </tr> 
       </table> 
      </div>  
     </body>
    </html>
        
<?php
        
    } else {
        
?>
      
     <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
     <head> 
      <meta charset="UTF-8"> 
      <meta content="width=device-width, initial-scale=1" name="viewport"> 
      <meta name="x-apple-disable-message-reformatting"> 
      <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
      <meta content="telephone=no" name="format-detection"> 
      <title>Glowe - New Location</title> 
      <!--[if (mso 16)]>
        <style type="text/css">
        a {text-decoration: none;}
        </style>
        <![endif]--> 
      <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]--> 
      <!--[if gte mso 9]>
    <xml>
        <o:OfficeDocumentSettings>
        <o:AllowPNG></o:AllowPNG>
        <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml>
    <![endif]--> 
      <!--[if !mso]><!-- --> 
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i" rel="stylesheet"> 
      <!--<![endif]--> 
      <style type="text/css">
    .rollover:hover .rollover-first {
    	max-height:0px!important;
    	display:none!important;
    }
    .rollover:hover .rollover-second {
    	max-height:none!important;
    	display:block!important;
    }
    #outlook a {
    	padding:0;
    }
    .es-button {
    	mso-style-priority:100!important;
    	text-decoration:none!important;
    }
    a[x-apple-data-detectors] {
    	color:inherit!important;
    	text-decoration:none!important;
    	font-size:inherit!important;
    	font-family:inherit!important;
    	font-weight:inherit!important;
    	line-height:inherit!important;
    }
    .es-desk-hidden {
    	display:none;
    	float:left;
    	overflow:hidden;
    	width:0;
    	max-height:0;
    	line-height:0;
    	mso-hide:all;
    }
    .es-button-border:hover {
    	border-style:solid solid solid solid!important;
    	background:#0b317e!important;
    	border-color:#42d159 #42d159 #42d159 #42d159!important;
    }
    .es-button-border:hover a.es-button, .es-button-border:hover button.es-button {
    	background:#0b317e!important;
    	border-color:#0b317e!important;
    }
    [data-ogsb] .es-button {
    	border-width:0!important;
    	padding:10px 20px 10px 20px!important;
    }
    [data-ogsb] .es-button.es-button-1 {
    	padding:10px 20px!important;
    }
    @media only screen and (max-width:600px) {.st-br { padding-left:10px!important; padding-right:10px!important } p, ul li, ol li, a { line-height:150%!important } h1 { font-size:30px!important; text-align:center; line-height:120%!important } h2 { font-size:26px!important; text-align:center; line-height:120%!important } h3 { font-size:20px!important; text-align:center; line-height:120%!important } h1 a { text-align:center } .es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a { font-size:30px!important } h2 a { text-align:center } .es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a { font-size:26px!important } h3 a { text-align:center } .es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a { font-size:20px!important } .es-menu td a { font-size:14px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:16px!important } .es-content-body p, .es-content-body ul li, .es-content-body ol li, .es-content-body a { font-size:16px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:14px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class="gmail-fix"] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:block!important } a.es-button, button.es-button { font-size:16px!important; display:block!important; border-left-width:0px!important; border-right-width:0px!important } .es-adaptive table, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0!important } .es-m-p0r { padding-right:0!important } .es-m-p0l { padding-left:0!important } .es-m-p0t { padding-top:0!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } tr.es-desk-hidden { display:table-row!important } table.es-desk-hidden { display:table!important } td.es-desk-menu-hidden { display:table-cell!important } .es-menu td { width:1%!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } .es-m-p5 { padding:5px!important } .es-m-p5t { padding-top:5px!important } .es-m-p5b { padding-bottom:5px!important } .es-m-p5r { padding-right:5px!important } .es-m-p5l { padding-left:5px!important } .es-m-p10 { padding:10px!important } .es-m-p10t { padding-top:10px!important } .es-m-p10b { padding-bottom:10px!important } .es-m-p10r { padding-right:10px!important } .es-m-p10l { padding-left:10px!important } .es-m-p15 { padding:15px!important } .es-m-p15t { padding-top:15px!important } .es-m-p15b { padding-bottom:15px!important } .es-m-p15r { padding-right:15px!important } .es-m-p15l { padding-left:15px!important } .es-m-p20 { padding:20px!important } .es-m-p20t { padding-top:20px!important } .es-m-p20r { padding-right:20px!important } .es-m-p20l { padding-left:20px!important } .es-m-p25 { padding:25px!important } .es-m-p25t { padding-top:25px!important } .es-m-p25b { padding-bottom:25px!important } .es-m-p25r { padding-right:25px!important } .es-m-p25l { padding-left:25px!important } .es-m-p30 { padding:30px!important } .es-m-p30t { padding-top:30px!important } .es-m-p30b { padding-bottom:30px!important } .es-m-p30r { padding-right:30px!important } .es-m-p30l { padding-left:30px!important } .es-m-p35 { padding:35px!important } .es-m-p35t { padding-top:35px!important } .es-m-p35b { padding-bottom:35px!important } .es-m-p35r { padding-right:35px!important } .es-m-p35l { padding-left:35px!important } .es-m-p40 { padding:40px!important } .es-m-p40t { padding-top:40px!important } .es-m-p40b { padding-bottom:40px!important } .es-m-p40r { padding-right:40px!important } .es-m-p40l { padding-left:40px!important } button.es-button { width:100% } }
    </style> 
     </head> 
     <body style="width:100%;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0"> 
      <div class="es-wrapper-color" style="background-color:#FFF;">
          <center>
              
              <h1 style="color: #000;">Email non disponible ou inexistant</h1>
              
          </center>
      </div>
     </body>
    </html>
        
<?php
    
    }

?>