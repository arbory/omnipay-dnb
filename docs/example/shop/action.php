<?php
	require_once "../OrderRequest.php";

	$order = new OrderRequest(
								"../certs/Diablo_cert_priv_key.pem",
								$_POST['vk_snd_id'],
								$_POST['vk_stamp'], 
								$_POST['vk_amount'],
								$_POST['vk_curr'], 
								$_POST['vk_acc'],
								$_POST['vk_name'], 
								$_POST['vk_reg_id'],
								$_POST['vk_swift'], 
								$_POST['vk_ref'], 
								$_POST['vk_msg'], 
								$_POST['vk_return'],
								$_POST['vk_return2'], 
								$_POST['vk_time_limit'], 
								'LAT'
							);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>iNORD Order Request</title>
<style type="text/css">
	input[type="hidden"],
	textarea{
		width:100%;
	}
</style>
</head>
<body>
<form action="http://ib-t.dnb.lv/login/index.php" method="post">
		<br/>
		<input type="hidden" name="vk_service" value="<?php echo $order->getVK_SERVICE(); ?>"/>
		<input type="hidden" name="vk_version" value="<?php echo $order->getVK_VERSION(); ?>"/>
		<input type="hidden" name="vk_snd_id" value="<?php echo $order->getVK_SND_ID(); ?>"/>
		<input type="hidden" name="vk_stamp" value="<?php echo $order->getVK_STAMP(); ?>"/>
		<input type="hidden" name="vk_amount" value="<?php echo $order->getVK_AMOUNT(); ?>"/>
		<input type="hidden" name="vk_curr" value="<?php echo $order->getVK_CURR(); ?>"/>
		<input type="hidden" name="vk_acc" value="<?php echo $order->getVK_ACC(); ?>"/>
		<input type="hidden" name="vk_name" value="<?php echo $order->getVK_NAME(); ?>"/>
		<input type="hidden" name="vk_reg_id" value="<?php echo $order->getVK_REG_ID(); ?>"/>
		<input type="hidden" name="vk_swift" value="<?php echo $order->getVK_SWIFT(); ?>"/>
		<input type="hidden" name="vk_ref" value="<?php echo $order->getVK_REF(); ?>"/>
		<input type="hidden" name="vk_msg" value="<?php echo $order->getVK_MSG(); ?>"/>
		<input type="hidden" name="vk_return" value="<?php echo $order->getVK_RETURN(); ?>"/>
		<input type="hidden" name="vk_return2" value="<?php echo $order->getVK_RETURN2(); ?>"/>
		<input type="hidden" name="vk_mac" value="<?php echo $order->getVK_MAC(); ?>">
		<input type="hidden" name="vk_time_limit" value="<?php echo $order->getVK_TIME_LIMIT(); ?>"/>
		<input type="submit" value="Отправить в iNORD-Link" title="Отправить" name="submit"/>
		<br/>
		<br/>
		<textarea><?php echo $order->getData(); ?></textarea>
		<br/>
		<textarea><?php echo $order->getVK_MAC(); ?></textarea>
</form>
</body>
</html>
