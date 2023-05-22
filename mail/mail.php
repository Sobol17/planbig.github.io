<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['name'])) {$name = '<br><b>Имя заказчика : </b>' . $_POST['name'];}
  if (isset($_POST['tel'])) {$tel = '<br><b>Телефон заказчика : </b>' . $_POST['tel'];}
  if (isset($_POST['site'])) {$site = '<br><b>Сайт компании заказчика : </b>' . $_POST['site'];}
  if (isset($_POST['link'])) {$link = '<br><b>Ссылка на пример видео : </b>' . $_POST['link'];}
  if (isset($_POST['step1'])) {$step1 = '<br><b>Ответ на вопрос - О чём вы хотите рассказать : </b>' . $_POST['step1'];}
  if (isset($_POST['step2'])) {$step2 = '<br><b>Ответ на вопрос - Какая длительность ролика : </b>' . $_POST['step2'];}
  if (isset($_POST['step3'])) {$step3 = '<br><b>Ответ на вопрос - Какой вид анимации больше подходит : </b>' . $_POST['step3'];}
  if (isset($_POST['step4'])) {$step4 = '<br><b>Ответ на вопрос - Когда нужен готовый ролик : </b>' . $_POST['step4'];}
  // if (isset($_POST['textarea'])) {$textarea = '<br><b>Вопрос заказчика : </b>' . $_POST['textarea'];}
  // if (isset($_POST['form_name'])) {$form_name = '<br><b>Форма из которой была отправка - : </b>' . $_POST['form_name'];}
  // if (isset($_POST['location_url'])) {$location_url = '<br><b>Страница из которой была отправка - : </b>' . $_POST['location_url'];}

  $emails__arr = array(
    'sobolinskii@mail.ru'
// 		'welcome@plan-big.ru'
//		'welcome@plan-big.art',
//		'mkrasikov7@gmail.com',
//		'planbig@mail.amocrm.ru'
  );
  $headers = "Content-type: text/html; charset=utf-8 \r\n";
  $headers .= "From:  Заявка с сайта plan-big.com <welcome@plan-big.ru>\r\n";
  $headers .= "Reply-To: welcome@plan-big.ru\r\n";
  $subject = "Заявка с сайта";
  $message = " $name $tel $site $link $step1 $step2 $step3 $step4 $textarea $form_name $location_url";

  foreach ($emails__arr as $email__arr) {
    $send = mail($email__arr, $subject, $message, $headers);
  }
  if ($send == 'true'){
		$json['error'] = 0;
		echo json_encode($json);
  }
  else{
    echo '<center><p class="fail"><b>Ошибка. Сообщение не отправлено!</b></p></center>';
  }
}
else {
  http_response_code(403);
  echo "Попробуйте еще раз";
}
