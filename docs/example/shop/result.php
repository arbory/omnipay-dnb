<?php
	require_once "../OrderResponse.php";

	$order = new OrderResponse(
								"../certs/DNB_X509_for_ext_system_and_merchant_10028.crt",
								$_POST['VK_SND_ID'],
								$_POST['VK_REC_ID'],
								$_POST['VK_STAMP'],
								$_POST['VK_T_NO'],
								$_POST['VK_AMOUNT'],
								$_POST['VK_CURR'],
								$_POST['VK_REC_ACC'],
								$_POST['VK_REC_NAME'],
								$_POST['VK_REC_REG_ID'],
								$_POST['VK_REC_SWIFT'],
								$_POST['VK_SND_ACC'],
								$_POST['VK_SND_NAME'],
								$_POST['VK_REF'],
								$_POST['VK_MSG'],
								$_POST['VK_T_DATE'],
								$_POST['VK_T_STATUS'],
								$_POST['VK_MAC'],
								$_POST['VK_LANG']
							);
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>iNORD Order Response</title>
</head>
<body>
	<table>
		<colgroup>
			<col/>
			<col width="300px"/>
		</colgroup>
		<tbody>
		<tr>
			<td>Sender ID (bank’s)</td>
			<td><?php echo $order->getVK_SND_ID(); ?></td>
		</tr>
		<tr>
			<td>Recipient ID (merchant’s)</td>
			<td><?php echo $order->getVK_REC_ID(); ?></td>
		</tr>
		<tr>
			<td>Request ID – unique number – (not used by bank).</td>
			<td><?php echo $order->getVK_STAMP(); ?></td>
		</tr>
		<tr>
			<td>Number of payment order</td>
			<td><?php echo $order->getVK_T_NO(); ?></td>
		</tr>
		<tr>
			<td>Payment amount</td>
			<td><?php echo $order->getVK_AMOUNT(); ?></td>
		</tr>
		<tr>
			<td>Payment currency (LVL)</td>
			<td><?php echo $order->getVK_CURR(); ?></td>
		</tr>
		<tr>
			<td>Recipient’s account</td>
			<td><?php echo $order->getVK_REC_ACC(); ?></td>
		</tr>
		<tr>
			<td>Recipient’s name</td>
			<td><?php echo $order->getVK_REC_REG_ID(); ?></td>
		</tr>
		<tr>
			<td>Recipient’s bank code</td>
			<td><?php echo $order->getVK_REC_SWIFT(); ?></td>
		</tr>
		<tr>
			<td>Payer’s account</td>
			<td><?php echo $order->getVK_SND_ACC(); ?></td>
		</tr>
		<tr>
			<td>Payer’s name</td>
			<td><?php echo $order->getVK_SND_NAME(); ?></td>
		</tr>
		<tr>
			<td>Payment number on the merchant side</td>
			<td><?php echo $order->getVK_REF(); ?></td>
		</tr>
		<tr>
			<td>Payment details</td>
			<td><?php echo $order->getVK_MSG(); ?></td>
		</tr>
		<tr>
			<td>Payment processing date</td>
			<td><?php echo $order->getVK_T_DATE(); ?></td>
		</tr>
		<tr>
			<td>Payment processing status</td>
			<td><?php echo $order->getVK_T_STATUS(); ?></td>
		</tr>
		<tr>
			<td>MAC</td>
			<td><textarea rows="10" cols="40"><?php echo $order->getVK_MAC(); ?></textarea></td>
		</tr>
		</tbody>
	</table>
	<br/>MAC-Check Status:<?php echo $order->decode()?"OK":"NOT OK"; ?>
</body>
</html>
