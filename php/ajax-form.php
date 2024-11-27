<?php
if((isset($_POST['name'])&&$_POST['name']!="")&&(isset($_POST['phone'])&&$_POST['phone']!="")&&(isset($_POST['phone'])&&$_POST['phone']!="")){
    //удаляем ненужные пробелы функцией trim и превращаем html-символы в спецсимволы в целях
    //безопасности
    $name = htmlspecialchars(trim($_POST['name']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $email = htmlspecialchars(trim($_POST['email']));
    $agree = htmlspecialchars(trim($_POST['agree']));
    $to = 'tdakiv@mail.ru'; //Почта получателя, через запятую можно указать сколько угодно адресов
    $subject = 'Обратный звонок'; //Заголовок сообщения
    $message = '
             <html>
                <head>
                   <title>'.$subject.'</title>
                </head>
                <body>
                   <p>Имя: '.$name.'</p>
                   <p>Телефон: '.$phone.'</p>
                   <p>Email: '.$email.'</p>
                   <p>Согласии на обработку персональных данных: '.$agree.'</p>
                 </body>
              </html>'; //В тексте отправляемого сообщения можно использовать HTML теги
     $headers  = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
     $headers .= "From: Отправитель <admin@gazoblokufa.ru>\r\n"; //Наименование и почта отправителя
     mail($to, $subject, $message, $headers); //Отправка письма с помощью php-функции mail
     echo "Письмо отправлено"; // необязательная стока, которая будет видна потом в консоли или
     //выведется пользователю, если в браузере будет отключен JS
}
else echo '<p>Заполните, пожалуйста, поля <a href="./index.html">формы</a></p>'; // будет выведено, если
//поля формы заполнены неверно. index.html - это файл с вашей формой. Подставьте сюда нужное имя файла.


/*
//Для начала проверим есть ли данные в полях name и email, что бы не слать совсем пустые формы :)
//Если всё в порядке, то работаем дальше
if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone"]) ) {

//Принимаем данные POST-запроса и записываем значения в переменные

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$sub = $_POST['sub'];
$agree = $_POST['agree'];

//Теперь давайте настроем куда отправляем и откуда

$my_email = 'tdakiv@mail.ru'; // Куда отправляем
$sender_email = '<admin@gazoblokufa.ru>' // От кого отправляем
$title="Заголовок сообщения";

//Сообщение, которое приходит на почту со всеми нужными нам данными:

$mes = "
 Имя: $name\n
 Телефон: $phone\n
 E-mail: $email\n
 Тема обращения: $sub\n
 Чекбокс отмечен: $agree\n
";

//Всё, теперь можно отправлять письмо на почту

$send = mail ($my_email,$title,$mes,"Content-type:text/plain; charset = utf-8\r\nFrom:$sender_email");

}
*/

?>