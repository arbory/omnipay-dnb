<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>iNORD Order Request</title>
<style type="text/css">
	input[type="text"],
	textarea{
		width:100%;
	}
</style>
</head>
<body>
	<form action="action.php" method="post">
		Первоначальные данные:
		<br/>
		<br/>
		<table>
			<colgroup>
				<col/>
				<col width="300px"/>
			</colgroup>
			<tbody>
			<tr>
				<td>Идентификатор торговца</td>
				<td><input type="text" name="vk_snd_id" value="10028"/></td>
			</tr>
			<tr>
				<td>Идентификатор запроса (уникальный номер - не используется
					банком)</td>
				<td><input type="text" name="vk_stamp" value="<?php echo rand(10000, 20000);?>" maxlength="32"/></td>
			</tr>
			<tr>
				<td>Сумма платежа + Валюта платежа</td>
				<td>
					<input type="text" name="vk_amount" value="1.99" size="7" style="width:50%;"/>
					<select name="vk_curr">
						<option value="LVL">LVL</option>
						<option value="EUR">EUR</option>
						<option value="USD">USD</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Счёт получателя</td>
				<td><input type="text" name="vk_acc" value="LV22RIKO0002013146536"/></td>
			</tr>
			<tr>
				<td>Имя получателя</td>
				<td><input type="text" name="vk_name" value="VeikalsJauns"/></td>
			</tr>
			<tr>
				<td>Merchants registration Number</td>
				<td><input type="text" name="vk_reg_id" value="16019212345"/></td>
			</tr>
			<tr>
				<td>Merchants bank Code</td>
				<td><input type="text" name="vk_swift" value="RIKOLV2X"/></td>
			</tr>
			<tr>
				<td>Номер платежа у торговца</td>
				<td><input type="text" name="vk_ref" value="<?php echo rand(10000, 20000);?>" maxlength="2"/></td>
			</tr>
			<tr>
				<td>Детали платежа</td>
				<td><input type="text" name="vk_msg" value="inord-diablo-test"/></td>
			</tr>
			<tr>
				<td>Дата и время истечения запроса</td>
				<td><input type="text" name="vk_time_limit" value="18.06.2012 21:00:00"/></td>
			</tr>
			<tr>
				<td>URL возврата 1</td>
				<td><input type="text" name="vk_return" value="http://192.168.64.30/diablo/shop/result.php"/></td>
			</tr>
			<tr>
				<td>URL возврата 2</td>
				<td><input type="text" name="vk_return2" value="http://192.168.64.30/diablo/shop/result.php"/></td>
			</tr>
			</tbody>
		</table>
		<br/>
		<input type="submit" value="Отправить на обработку данных" title="Отправить" name="submit"/>
	</form>
</body>
</html>
