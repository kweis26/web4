<?php


header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

  $messages = array(); 

  if (!empty($_COOKIE['save'])) { 
    setcookie('save', '', 100000);
    $messages[] = 'Спасибо, результаты сохранены.';
  }

  
  $errors = array();
  $errors['field-name'] = !empty($_COOKIE['field-name_error']);
  $errors['field-email'] = !empty($_COOKIE['field-email_error']);
  $errors['field-date'] = !empty($_COOKIE['field-date_error']);
  $errors['radio-sex'] = !empty($_COOKIE['radio-sex_error']);
  $errors['radio-kon'] = !empty($_COOKIE['radio-kon_error']);
  $errors['field-superpowers'] = !empty($_COOKIE['field-superpowers_error']);
  $errors['check'] = !empty($_COOKIE['check_error']);

  
  if ($errors['field-name']) {
    setcookie('field-name_error', '', 100000);
    $messages[] = '<div class="error">Укажите имя.</div>';
  }

  if ($errors['field-email']) {
    setcookie('field-email_error', '', 100000);
    $messages[] = '<div class="error">Адрес эл.почты указан неверно. Образец: exp@mail.ru</div>';
  }

  if ($errors['field-date']) {
    setcookie('field-date_error', '', 100000);
    $messages[] = '<div class="error">Дата рождения указана неверно. Образец: ДД.ММ.ГГГГ</div>';
  }
  
  if ($errors['radio-sex']) {
    setcookie('radio-sex_error', '', 100000);
    $messages[] = '<div class="error">Укажите пол</div>';
  }

  if ($errors['radio-kon']) {
    setcookie('radio-kon_error', '', 100000);
    $messages[] = '<div class="error">Укажите число конечностей</div>';
  }

  if ($errors['field-superpowers']) {
    setcookie('field-superpowers_error', '', 100000);
    $messages[] = '<div class="error">Укажите суперспособности</div>';
  }

  if ($errors['check']) {
    setcookie('check_error', '', 100000);
    $messages[] = '<div class="error">Пожалуйста, ознакомьтесь с контрактом</div>';
  }

  
  $values = array();
  $values['field-name'] = empty($_COOKIE['field-name_value']) ? '' : $_COOKIE['field-name_value'];
  $values['field-email'] = empty($_COOKIE['field-email_value']) ? '' : $_COOKIE['field-email_value'];
  $values['field-date'] = empty($_COOKIE['field-date_value']) ? '' : $_COOKIE['field-date_value'];
  $values['radio-sex'] = empty($_COOKIE['radio-sex_value']) ? '' : $_COOKIE['radio-sex_value'];
  $values['radio-kon'] = empty($_COOKIE['radio-kon_value']) ? '' : $_COOKIE['radio-kon_value'];
  $values['super1'] = empty($_COOKIE['super1_value']) ? '' : $_COOKIE['super1_value'];
  $values['super2'] = empty($_COOKIE['super2_value']) ? '' : $_COOKIE['super2_value'];
  $values['super3'] = empty($_COOKIE['super3_value']) ? '' : $_COOKIE['super3_value'];
  $values['field-name-2'] = empty($_COOKIE['field-name-2_value']) ? '' : $_COOKIE['field-name-2_value'];
  $values['check'] = empty($_COOKIE['check_value']) ? '' : $_COOKIE['check_value'];

  
  include('web.php');
}


else {

  $errors = FALSE;
  if (empty($_POST['field-name'])) {

    setcookie('field-name_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {

    setcookie('name_value', $_POST['field-name'], time() + 365 * 30 * 24 * 60 * 60);
  }

  if (!preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", $_POST['field-email'])) {
    setcookie('field-email_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('field-email_value', $_POST['field-email'], time() + 365 * 30 * 24 * 60 * 60);
  }

  if (!preg_match('/^(\d{1,2})\.(\d{1,2})(?:\.(\d{4}))?$/', $_POST['field-date'])) {
    setcookie('field-date_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('field-date_value', $_POST['field-date'], time() + 365 * 30 * 24 * 60 * 60);
  }

  if (empty($_POST['radio-sex'])) {
    setcookie('radio-sex_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('radio-sex_value', $_POST['radio-sex'], time() + 365 * 30 * 24 * 60 * 60);
  }

  if (empty($_POST['radio-kon'])) {
    setcookie('radio-kon_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('radio-kon_value', $_POST['radio-kon'], time() + 365 * 30 * 24 * 60 * 60);
  }

  if (!isset($_POST['super1']) && !isset($_POST['super2']) && !isset($_POST['super3'])) {
    setcookie('field-superpowers_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('super1_value', isset($_POST['super1']) ? $_POST['super1'] : '', time() + 365 * 30 * 24 * 60 * 60);
    setcookie('super2_value', isset($_POST['super2']) ? $_POST['super2'] : '', time() + 365 * 30 * 24 * 60 * 60);
    setcookie('super3_value', isset($_POST['super3']) ? $_POST['super3'] : '', time() + 365 * 30 * 24 * 60 * 60);
  }

  if (!empty($_POST['field-name-2'])) {
    setcookie('field-name-2_value', $_POST['field-name-2'], time() + 365 * 30 * 24 * 60 * 60);
  }

  if (empty($_POST['check'])) {
    setcookie('check_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('check_value', $_POST['check'], time() + 365 * 30 * 24 * 60 * 60);
  }

  if ($errors) {
    
    header('Location: index.php');
    exit();
  }
  else {
    
    setcookie('field-name_error', '', 100000);
    setcookie('field-email_error', '', 100000);
    setcookie('field-date_error', '', 100000);
    setcookie('radio-sex_error', '', 100000);
    setcookie('radio-kon_error', '', 100000);
    setcookie('field-superpowers_error', '', 100000);
    setcookie('check_error', '', 100000);
    
    
    $user = 'u20292';
    $pass = '1232183';
    $db = new PDO('mysql:host=localhost;dbname=u20292', $user, $pass);

    $name = $_POST['field-name'];
    $email = $_POST['field-email'];
    $date = $_POST['field-date'];
    $gender = $_POST['radio-sex'];
    $limb = $_POST['radio-kon'];
    $super = $_POST['super1'].
      (isset($_POST['super2']) ? (' '. $_POST['super2']) : '').
      (isset($_POST['super3']) ? (' '. $_POST['super3']) : '').
    $message = $_POST['field-name-2'];

    try {
      $stmt = $db->prepare("INSERT INTO anketa (name, email, date, gender, limb, super, message) VALUES (:name, :email, :date, :gender, :limb, :super, :message)");
      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':date', $date);
      $stmt->bindParam(':gender', $gender);
      $stmt->bindParam(':limb', $limb);
      $stmt->bindParam(':super', $super);
      $stmt->bindParam(':message', $message);
      $stmt->execute();
    }
    catch(PDOException $e){
      print('Error : ' . $e->getMessage());
      exit();
    }
  }
  setcookie('save', '1');

  header('Location: index.php');
}
