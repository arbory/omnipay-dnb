<?php
	require_once "../CustomerDataRequest.php";

	$customer = new CustomerDataRequest(
								"../certs/Diablo_cert_priv_key.pem",
								$_POST['vk_snd_id'],
								$_POST['vk_stamp'], 
								$_POST['vk_return'],
								'LAT'
							);
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>iNORD Customer Data Request</title>
<style type="text/css">
	input[type="text"],
	textarea{
		width:100%;
	}
</style>
</head>

<body>
	<form action="http://ib-t.dnb.lv/login/index.php" method="post">
		<br/> 
		<input type="hidden" name="vk_service" value="<?php echo $customer->getVK_SERVICE(); ?>"/>
		<input type="hidden" name="vk_version" value="<?php echo $customer->getVK_VERSION(); ?>"/> 
		<input type="hidden" name="vk_snd_id" value="<?php echo $customer->getVK_SND_ID(); ?>" />
		<input type="hidden" name="vk_stamp" value="<?php echo $customer->getVK_STAMP(); ?>"/> 
		<input type="hidden" name="vk_return" value="<?php echo $customer->getVK_RETURN(); ?>"/> 
		<input type="hidden" name="vk_lang" value="<?php echo $customer->getVK_LANG(); ?>"/>
		<input type="hidden" name="vk_mac" value="<?php echo $customer->getVK_MAC(); ?>"/> 
		<input type="submit" value="Отправить в iNORD-Link" title="Отправить" name="submit"/> 
		<br/>
		<br/>
		<textarea><?php echo $customer->getData(); ?></textarea>
		<br/>
		<textarea><?php echo $customer->getVK_MAC(); ?></textarea>
	</form>
</body>
</html>
