<?php
	require_once "../AuthorizationRequest.php";
	$authorization = new AuthorizationRequest(
					"../certs/DNB_X509_for_ext_system_and_merchant_10028.crt",
					$_POST['VK_SND_ID'],
					$_POST['VK_REC_ID'],
					$_POST['VK_STAMP'], 
					$_POST['VK_T_NO'], 
					$_POST['VK_PER_CODE'], 
					$_POST['VK_PER_FNAME'], 
					$_POST['VK_PER_LNAME'], 
					$_POST['VK_COM_CODE'], 
					$_POST['VK_COM_NAME'], 
					$_POST['VK_TIME'],
					$_POST['VK_MAC'],
					$_POST['VK_LANG']);
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>iNORD Data Response</title>
</head>
<body>
	Полученные данные:
	<br/>
	<br/>
	<table>
		<tr>
			<td>Тип запроса</td>
			<td>
				<?php echo $authorization->getVK_SERVICE(); ?>
			</td>
		</tr>
		<tr>
			<td>Используемый алгоритм цифровой подписи</td>
			<td>
				<?php echo $authorization->getVK_VERSION(); ?>
			</td>
		</tr>
		<tr>
			<td>Идентификатор банка</td>
			<td>
				<?php echo $authorization->getVK_SND_ID(); ?>
			</td>
		</tr>
		<tr>
			<td>Идентификатор торговца</td>
			<td>
				<?php echo $authorization->getVK_REC_ID(); ?>
			</td>
		</tr>
		<tr>
			<td>Идентификатор запроса - уникальный номер (не используется
				банком)</td>
			<td>
				<?php echo $authorization->getVK_STAMP(); ?>
			</td>
		</tr>
		<tr>
			<td>Идентификатор ответа - уникальный номер. Формируется банком (уникальный для каждого запроса)</td>
			<td>
				<?php echo $authorization->getVK_T_NO(); ?>
			</td>
		</tr>
		<tr>
			<td>Персональный код</td>
			<td>
				<?php echo $authorization->getVK_PER_CODE(); ?>
			</td>
		</tr>
		<tr>
			<td>Имя клиента</td>
			<td>
				<?php echo $authorization->getVK_PER_FNAME(); echo $authorization->getVK_PER_LNAME(); ?>
			</td>
		</tr>
		<tr>
			<td>Регистрационный номер предприятия</td>
			<td>
				<?php echo $authorization->getVK_COM_CODE(); ?>
			</td>
		</tr>
		<tr>
			<td>Название предприятния</td>
			<td>
				<?php echo $authorization->getVK_COM_NAME(); ?>
			</td>
		</tr>
		<tr>
			<td>Предпочтаемый язык</td>
			<td>
				<?php echo $authorization->getVK_LANG(); ?>
			</td>
		</tr>
		<tr>
			<td>MAC</td>
			<td><textarea name="vk_mac" rows="10" cols="40"><?php echo $authorization->getVK_MAC(); ?></textarea></td>
		</tr>
		<tr>
			<td>MAC-Check Status</td>
			<td>
				<?php echo $authorization->decode()?"OK":"NOT OK"; ?>
			</td>
		</tr>
	</table>
</body>
</html>
