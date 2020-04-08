<!DOCTYPE html>
<html lang="ru">
<head>

<meta charset="utf-8">
<title>Задание 3</title>
<link rel="stylesheet" href="new.css">
</head>
<body>
<div class="forma">
<h1>Форма</h1>

<?php
if (!empty($messages)) {
  print('<div id="messages">');
  // Выводим все сообщения.
  foreach ($messages as $mess) {
	print($mess);
  }
  print('</div><br/><br/>');
}
?>


<form action="" method="post">
<label> 
Имя:
<br/>
<input type="text" name="field-name" <?php if ($errors['field-name']) {print 'class="error"';} ?> value="<?php print $values['field-name']; ?>">
</label>
<br/>
<label> 
Email:
<br/>
<input type="email" name="field-email" <?php if ($errors['field-email']) {print 'class="error"';} ?> value="<?php print $values['field-email']; ?>">
</label>
<br/>
<label> 
Дата рождения:
<br/>
<input type="date" name="field-date" <?php if ($errors['field-date']) {print 'class="error"';} ?> value="<?php print $values['field-date']; ?>" >
</label>
<br/>
Пол:
<br/>
<label>
<input type="radio" checked="checked" name="radio-sex" value="male" <?php if ($values['radio-sex'] == 'male') {print 'checked="checked"';} ?>/>
Мужской
</label>
<label>
<input type="radio" name="radio-sex" value="female" <?php if ($values['radio-sex'] == 'female') {print 'checked="checked"';} ?>/>
Женский
</label>
<br/>
Количество конечностей:
<br/>
<label>
<input type="radio" checked="checked" name="radio-kon" <?php if ($errors['radio-kon']) {print 'class="error"';} ?> value="0" <?php if ($values['radio-kon'] == '0') {print 'checked="checked"';} ?> />
0
</label>
<label>
<input type="radio"  name="radio-kon" <?php if ($errors['radio-kon']) {print 'class="error"';} ?> value="1" <?php if ($values['radio-kon'] == '1') {print 'checked="checked"';} ?> />
1
</label>
<label>
<input type="radio"  name="radio-kon" <?php if ($errors['radio-kon']) {print 'class="error"';} ?> value="2" <?php if ($values['radio-kon'] == '2') {print 'checked="checked"';} ?> />
2
</label>
<label>
<input type="radio"  name="radio-kon" <?php if ($errors['radio-kon']) {print 'class="error"';} ?> value="3" <?php if ($values['radio-kon'] == '3') {print 'checked="checked"';} ?> />
3
</label>
<label>
<input type="radio"  name="radio-kon" <?php if ($errors['radio-kon']) {print 'class="error"';} ?> value="4" <?php if ($values['radio-kon'] == '4') {print 'checked="checked"';} ?> />
4
</label>
<br/>
<label>
Сверхспособности:
<br/>
<select name="field-superpowers" multiple="multiple">
<option value="бессмертие" name="super1" value="бессмертие" <?php if ($values['super1'] != '') {print 'checked="checked"';} ?> >Бессмертие</option>
<option value="прохождение"name="super2" value="прохождение сквозь стены" <?php if ($values['super2'] != '') {print 'checked="checked"';} ?> />Прохождение сквозь стены</option>
<option value="левитация" name="super3" value="левитация" <?php if ($values['super3'] != '') {print 'checked="checked"';} ?> />Левитация</option>
</select>
</label>
<br>
<label>
Биография:
<br/>
<textarea name="field-name-2" value="<?php print $values['field-name-2']; ?>"> </textarea>
</label>
<br/>
<label>
<input type="checkbox" name="check" <?php if ($values['check'] != '') {print 'checked="checked"';} ?>/>
C контрактом ознакомлен
</label>
<br/>
<input type="submit" name="send" value="Отправить">
</form>
</div>
</body> 
</html>