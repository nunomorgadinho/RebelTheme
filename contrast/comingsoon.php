<?php
/**
 * Template Name: Coming Soon
 */
?>
<?php 
global $options;
//foreach ($options as $value) {
//if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); } }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>> 
  <head profile="http://gmpg.org/xfn/11">
 	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
	<title><?php bloginfo('name'); ?><?php wp_title('-'); ?><?php if(is_home()){echo ' - '; bloginfo('description');} ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=7" />  	
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/comingsoon.css" type="text/css" media="screen"/>
  <link href="<?php bloginfo('template_directory'); ?>/favicon.ico" rel="icon" type="image/x-icon" />
    <script type="text/javascript" language="JavaScript">
    TargetDate = "04/04/2011 03:00 PM GMT";
    FinishMessage = "<span class='finish-mss'><?php echo $rdy_finish_mssg; ?></span>";
    </script>
<style type="text/css">

#block{left: 95px; }
#access {background-color: #<?php echo $rdy_color_topmenu ?>; opacity: 0.7;}
h1{color:#<?php echo $rdy_color_head ?>;}
h2 {color:<?php if ($rdy_color_count == "Default") echo "#414141";elseif ($rdy_color_count == "White") echo "#fff";elseif ($rdy_color_count == "Light Grey") echo "#F3F3F3";elseif ($rdy_color_count == "Black") echo "#000";?>;}
.alt-heading{color:#<?php echo $rdy_color_alt_head ?>;}
.text {color:#<?php echo $rdy_color_text ?>;}
.second-head  {color:#<?php echo $rdy_color_second ?>;}
#cntdwn {color:#<?php echo $rdy_color_cntdwn ?>;}
#rocket{background-repeat:no-repeat;}
#footer, #footer a:visited, #footer a{color:<?php if($rdy_theme == "cloud" or $rdy_theme == "cloud-no_rocket" or $rdy_theme == "cloud2") echo "#646464";else echo "#b4b4b4";?>;}
.twitter{visibility:<?php echo $rdy_twitter;?>}
.mail{visibility:<?php echo $rdy_mail;?>}
<?php if($rdy_theme == "stripe-grey") { ?>
body {background:#626262;}
#access {background:#3F3F3F}
#block {background-color:#fff;width:100%;padding-top:55px!important;top:100px;}
.alt-heading {top:135px}
.second-head {top:70px;left:30px}
#cntdwn {position:absolute;top:70px;width:420px;left:-40px}
#contact-left, #contact-right {margin-top:20px}
#footer a:visited, #footer a {color:#ccc}
#mail {width:500px;position:relative; top:-100px;}
#mail p {clear:both;position:relative; top:120px;}
<?php }; ?>
<?php if($rdy_theme == "stripe-vicious") { ?>
body {background:#154a4c;}
#access {background:#092E2F;}
#block {background-color:#fff;width:100%;padding-top:55px!important;top:100px;}
.alt-heading {top:135px}
.second-head {top:70px;left:30px}
#cntdwn {position:absolute;top:70px;width:420px;left:-40px}
#contact-left, #contact-right {margin-top:20px}
#footer a:visited, #footer a {color:#ccc}
#mail {width:500px;position:relative; top:-100px;}
#mail p {clear:both;position:relative; top:120px;}
<?php }; ?>
<?php if($rdy_theme == "stripe-red") { ?>
body {background:#3a1114;}
#access {background:#2c0a0d;}
#block {background-color:#fff;width:100%;padding-top:55px!important;top:100px;}
.alt-heading {top:135px}
.second-head {top:70px;left:30px}
#cntdwn {position:absolute;top:70px;width:420px;left:-40px}
#contact-left, #contact-right {margin-top:20px}
#footer a:visited, #footer a {color:#ccc}
#mail {width:500px;position:relative; top:-100px;}
#mail p {clear:both;position:relative; top:120px;}
<?php }; ?>
</style>

<script src="http://cufon.shoqolate.com/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php echo get_bloginfo('template_url')."/js/pf-tempesta-seven.cufonfonts.js"; ?>"  type="text/javascript"></script>
<script type="text/javascript">
Cufon.replace('.pf_tempesta_seven_extended', { fontFamily: 'PF Tempesta Seven Extended', hover: true }); 
Cufon.replace('.pf_tempesta_seven_extended_bold', { fontFamily: 'PF Tempesta Seven Extended Bold', hover: true }); 
Cufon.replace('.pf_tempesta_seven_condensed', { fontFamily: 'PF Tempesta Seven Condensed', hover: true }); 
Cufon.replace('.pf_tempesta_seven_condensed_bold', { fontFamily: 'PF Tempesta Seven Condensed Bold', hover: true }); 
Cufon.replace('.pf_tempesta_seven_compressed', { fontFamily: 'PF Tempesta Seven Compressed', hover: true }); 
Cufon.replace('.pf_tempesta_seven_compressed_bold', { fontFamily: 'PF Tempesta Seven Compressed Bold', hover: true }); 
Cufon.replace('.pf_tempesta_seven_bold', { fontFamily: 'PF Tempesta Seven Bold', hover: true }); 
</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-22426440-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>

<?php

$newmail = false;
if(isset($_POST['enter-email']))
	{
		$mail = $_POST['enter-email'];
		if($mail !="ENTER YOUR EMAIL..." && strpos($mail,'@'))
		{	$newmail = true;
			mail('ana.aires@gmail.com', "This email wants to receive your newsletter", $mail);
		}
	}

?>
  <div id="background">
  
  	 <img src="<?php bloginfo('template_directory'); ?>/images/cloud-bg.gif" class="stretch" alt="" />
  
    <div id="block">
           <?php include "Count.html";?> 
              <form id="form_id" method="POST" onsubmit="javascript:return validate('form_id','enter-email');">
    			<input id="enter-email" name="enter-email" type="text" value="<?php if(isset($_POST['enter-email'])) echo "THANK YOU FOR SUBSCRIBING!"; else echo "ENTER YOUR EMAIL...";?>"></input>
    			<input type="submit" value="" id="botao" />
		    </form>
    </div>
 
    </div>  
<?php 

?>

<script type="text/javascript">
	
function validate(form_id,email) {
	   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	   var address = document.forms[form_id].elements[email].value;
	   if(reg.test(address) == false) {
	      alert('Invalid Email Address');
	      return false;
	   }
	}
</script>

</body>
</html>