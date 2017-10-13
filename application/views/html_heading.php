<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php echo $MetaTitle;?></title>
<?php echo meta($meta);?>
<meta charset="UTF-8" />
<meta name="author" content="">
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
<link href="<?php echo SchoolSiteResourcesURL;?>bower_components/Materialize/dist/css/materialize.css" rel="stylesheet" type="text/css" />
<link href="<?php echo SchoolSiteResourcesURL;?>bower_components/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="<?php echo SchoolSiteResourcesURL;?>bower_components/code-prettify/src/prettify.css" rel="stylesheet" type="text/css" />

<link href="<?php echo SchoolSiteCSSURL;?>themes/light.css" id="ssThemeColor" rel="stylesheet" type="text/css" />
<link href="<?php echo SchoolSiteCSSURL;?>themes/main/materialize-red.css" id="ssMainColor" rel="stylesheet" type="text/css" />
<link href="<?php echo SchoolSiteCSSURL;?>themes/alternative/red.css" id="ssAlternativeColor" rel="stylesheet" type="text/css" />

<link href="<?php echo SchoolSiteCSSURL;?>theme-switcher.css" rel="stylesheet" type="text/css" />
<?php if($this->session->userdata('LOGEDIN')==''):?>
<link href="<?php echo SchoolSiteCSSURL;?>login.css" rel="stylesheet" type="text/css" />
<?php else:?>
<link href="<?php echo SchoolSiteCSSURL;?>pages/dashboard.css" rel="stylesheet" type="text/css" />
<link href="<?php echo SchoolSiteCSSURL;?>admin.css" rel="stylesheet" type="text/css" />
<?php endif;?>
<link rel="shortcut icon" href="<?php echo SchoolSiteImgURL;?>favicon.ico" type="image/x-icon">
<script type="text/javascript">
//<![CDATA[
    // URL for access ajax data
    myJsMain = window.myJsMain || {};
    myJsMain.baseURL = '<?php echo BASE_URL;?>';
    myJsMain.showHowItWorksBoxLoaded =0;
    //myJsMain.securityCode='<?php //echo $this->session->userdata("secret");?>';
    <?php if($this->session->userdata('LOGEDIN')==''):?>
    myJsMain.isLogedIn=false;
    <?php else:?>
    myJsMain.isLogedIn=true;
    <?php endif;?>
    <?php /*if($isMobile=='yes'):?>
        myJsMain.isMobile='yes';
    <?php else: ?>
        myJsMain.isMobile='no';
    <?php endif; */?>    
    myJsMain.SecretTextSetAjaxURL='<?php echo BASE_URL.'ajax/reset_secret/'?>';
    myJsMain.CaptchaCookeName='<?php //echo $this->config->item('CAPTCHA_COOKIE_NAME');?>';     
    myJsMain.messageBoxTitle='<?php echo $messageBoxTitle;?>';
//]]>
manualClick=false;
    var searchurl = '<?php echo BASE_URL;?>';
    var dialog=null;
</script>
</head>
<body>