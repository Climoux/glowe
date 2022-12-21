<?php
    if(isLogged() == 1){
        header("Location:index.php?p=profil");
    }
    
    // Fonctions

    if (!function_exists('str_contains')) {
        function str_contains($haystack, $needle) {
            return $needle !== '' && mb_strpos($haystack, $needle) !== false;
        }
    }
    
    function getIp(){
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    
    // END fonctions
    
    // Start verification
    
    if(isset($_POST['submit'])){
        
        if(isset($_POST['h-captcha-response']) && !empty($_POST['h-captcha-response']))
        {
            $secret = '0x*********************************';
            $verifyResponse = file_get_contents('https://hcaptcha.com/siteverify?secret='.$secret.'&response='.$_POST['h-captcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR']);
            $responseData = json_decode($verifyResponse);
            if($responseData->success)
            {
                
                if (isset($_POST['submit'])){
                    $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
                    $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8');
                    $password = hash('sha256', (htmlspecialchars(trim($_POST['password']), ENT_QUOTES, 'UTF-8')));
                    $confirm_password = hash('sha256', (htmlspecialchars(trim($_POST['confirm-password']), ENT_QUOTES, 'UTF-8')));
    
                    if(email_taken($email) == 1){
    
                        $error = "Cette adresse e-mail est déjà utilisée...";
    
                    } elseif(pseudo_taken($name) == 1) {
    
                        $error = "Ce nom est déjà utilisé...";
    
                    } elseif ($confirm_password == $password) {
    
                        /* Petit bout de code permettant de créer un dossier */
    
                        $id = sha1(htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8'));
            
                        /* On vérifie si le dossier existe déjà */
    
                        $folder = "projects/hébergeur/pages/upload/" . $id . "/";
                        $folder2 = "projects/hébergeur/pages/visibility/save/" . $id . "/";
                        
                        if (file_exists($folder) && file_exists($folder2)) {
    
                            /* Rien... */
                        
                        }else{
    
                            mkdir($folder);
                            mkdir($folder2);
                            
                            fwrite(fopen($folder.'index.php', "w"), "<?php header('Location:https://glowe.fr/fr-FR/projects/hébergeur/'); ?>");
                            fwrite(fopen($folder2.'index.php', "w"), "<?php header('Location:https://glowe.fr/fr-FR/projects/hébergeur/'); ?>");
                            
                        }
    
                        /* creator($name, $email); */
    
                        function random($car){
                            $string = "";
                            $chaine = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
                            srand((double)microtime()*1000000);
                            for($i=0; $i<$car; $i++) {
                                $string .= $chaine[rand()%strlen($chaine)];
                            }
                            return $string;
                        }
                                  
                        $key = random(20);
    
                        register($name, $email, $password, "Non", hash('sha256', $_SERVER['REMOTE_ADDR']), $key);
                        header("Location:index.php?p=email");
    
                        // Mail
    
                        $mail = $email;
                        $subject = '=?UTF-8?B?' . base64_encode('Vérification du compte') . '?=';
                        $message = '
                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                        <html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
                         <head> 
                          <meta charset="UTF-8"> 
                          <meta content="width=device-width, initial-scale=1" name="viewport"> 
                        <meta name="x-apple-disable-message-reformatting"> 
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
                         <body style="width:100%;font-family:roboto, \'helvetica neue\', helvetica, arial, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0"> 
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
                                              <td align="center" style="padding:0;Margin:0;padding-bottom:10px"><h1 style="Margin:0;line-height:36px;mso-line-height-rule:exactly;font-family:roboto, \'helvetica neue\', helvetica, arial, sans-serif;font-size:30px;font-style:normal;font-weight:bold;color:#212121">Confirmation<br></h1></td> 
                                             </tr> 
                                             <tr> 
                                              <td style="padding:0;Margin:0"> 
                                               <center> 
                                                <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, \'helvetica neue\', helvetica, arial, sans-serif;line-height:24px;color:#131313;font-size:16px">Pour confirmer votre compte cliquez <a href="https://glowe.fr/fr-FR/?p=verification&user='.hash("sha256", getIp()).'&key='.$key.'" id="a-here" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#2CB543;font-size:16px">ici.</a></p> 
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
                                              <td align="left" style="padding:0;Margin:0;padding-bottom:10px"><h1 style="Margin:0;line-height:36px;mso-line-height-rule:exactly;font-family:roboto, \'helvetica neue\', helvetica, arial, sans-serif;font-size:30px;font-style:normal;font-weight:bold;color:#FFFFFF;text-align:center">Merci !<br></h1></td> 
                                             </tr> 
                                             <tr> 
                                              <td align="center" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, \'helvetica neue\', helvetica, arial, sans-serif;line-height:24px;color:#FFFFFF;font-size:16px">Merci d\'avoir choisi Glowe !<br> Grâce à vous, Glowe grandit petit à petit.<br><br>Glowe - Fiable, Rapide, Sécurisé<br></p></td> 
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
                                                <h3 style="Margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:roboto, \'helvetica neue\', helvetica, arial, sans-serif;font-size:20px;font-style:normal;font-weight:normal;color:#212121">Glowe:</h3> 
                                                <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, \'helvetica neue\', helvetica, arial, sans-serif;line-height:24px;color:#131313;font-size:16px"><a href="https://glowe.fr/fr-FR" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#000000;font-size:16px">A propos du site</a></p> 
                                                <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, \'helvetica neue\', helvetica, arial, sans-serif;line-height:24px;color:#131313;font-size:16px"><a href="https://glowe.fr/fr-FR/projects/hébergeur/?p=stockage-panel" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#000000;font-size:16px">Uploader un Fichier</a></p> 
                                                <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, \'helvetica neue\', helvetica, arial, sans-serif;line-height:24px;color:#131313;font-size:16px"><a href="https://glowe.fr/fr-FR/?p=recruitment" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#000000;font-size:16px">Recrutements</a></p> 
                                                <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, \'helvetica neue\', helvetica, arial, sans-serif;line-height:24px;color:#131313;font-size:16px"><a href="https://glowe.fr/fr-FR/?p=cgu" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#000000;font-size:16px">Conditions Générales d\'Utilisation</a></p> 
                                                <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, \'helvetica neue\', helvetica, arial, sans-serif;line-height:24px;color:#131313;font-size:16px"><a href="https://glowe.fr/fr-FR/index.php" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#000000;font-size:16px">Contactez nous</a></p> 
                                                <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, \'helvetica neue\', helvetica, arial, sans-serif;line-height:24px;color:#131313;font-size:16px"><a href="https://discord.gg/pPDAJECP9d" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#000000;font-size:16px">Discord</a></p> 
                                                <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, \'helvetica neue\', helvetica, arial, sans-serif;line-height:24px;color:#131313;font-size:16px"><a href="https://glowe.fr/en-US/pages/visualize.php" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#000000;font-size:16px">Si vous ne pouvez pas voir ceci cliquez</a></p>
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
                    
                    }else {
    
                        $error_confirm_pass = 'Les deux mots de passe ne correspondent pas !';
    
                    }
    
                    $found;
    
                    if ($found = true){
                    $_SESSION['email'] = $_POST['email'];
    
                    }
    
                    if ($found = true){
                    $_SESSION['name'] = $_POST['name'];
    
                    }
    
                    if ($found = true){
                    $_SESSION['password'] = $_POST['password'];
    
                    }
    
                    if ($found = true){
                    $_SESSION['name_crypted'] = sha1(htmlspecialchars(trim($_POST['name'])));
    
                    }
    
                }
                
            } 
            else {
                $error = "Le hCaptcha n'est pas valide.";
            }
        }
        
    }

?>

<div class="container">
    <div class="left">
       <div class="header">
            <h2 class="animation a1">Bienvenue!</h2>
            <h4 class="animation a2">Inscrivez-vous et profitez de l'hébergement et du tchat !</h4>
        </div>
        <form method="post">
            <div class="form">
                <input type="text" name="name" class="form-field animation a3" placeholder="Pseudo" required>
                <input type="email" name="email" class="form-field animation a4" placeholder="Email Address" required>
                <input type="password" name="password" class="form-field animation a5" placeholder="Password" required>
                <input type="password" name="confirm-password" class="form-field animation a6" placeholder="Confirm Password" required>
                <br>
                <li class="animation a7" style="color:black;">
                  <input id="c1" type="checkbox">
                  <label for="c1" style="font-size:14px;margin-top:-1.7em;margin-left:2em;">En vous inscrivant vous acceptez les <a href="?p=cgu" id="label-link" style="font-size: 14px;">conditions d'utilisations</a>.</label>
                </li>
                <br>
                <p class="error"><?php echo (isset($error)) ? $error : ''; ?></p><br>
                <div class="h-captcha animation a7" data-sitekey="20942ecc-9479-4440-a946-d4ec97ed107b"></div><br>
                <button class="animation a7" type="submit" name="submit">S'INSCRIRE</button>
            </div>
        </form>
        </div>
    <div class="right"></div>
</div>