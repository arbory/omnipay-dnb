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
	<form action="action.php" method="post">

		<br /> Первоночальные данные:
		<br />
		<br />
		<table>
			<colgroup>
				<col />
				<col width="300px" />
			</colgroup>
			<tbody>
				<tr>
					<td>Идентификатор торговца</td>
					<td><input type="text" name="vk_snd_id" value="10028"/></td>
				</tr>
				<tr>
					<td>Идентификатор запроса (уникальный номер - не используется банком)</td>
					<td><input type="text" name="vk_stamp" value="<?php echo rand(10000, 20000);?>" maxlength="32"/></td>
				</tr>
				<tr>
					<td>VK_RETURN</td>
					<td>
						<input type="text" name="vk_return" value="http://192.168.64.30/diablo/data/result.php" maxlength="400" />
					</td>
				</tr>
			</tbody>
		</table>
		<br/> <input type="submit" value="Отправить на обработку данных" title="Отправить" name="submit" />
	</form>
</body>
</html>
