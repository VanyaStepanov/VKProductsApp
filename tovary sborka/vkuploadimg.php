<?php
/**
 */

 // Отладка
 ini_set('display_errors',1);
 error_reporting(E_ALL);

 // Загружаем картинку на сервер вконтакте
 if (isset($_POST["upload_url"])) {

     define('BASEPATH', str_replace('\\', '/', dirname(__FILE__)) . '/');

     // Слушаем upload_url, который шлем нам JS
     $upload_url = $_POST["upload_url"];

     // Будем использовать CURL
     $ch = curl_init();

     //Сюда надо подставить имя и путь к временному файлу, который мы будем сохранять с Ali
     $cfile = curl_file_create('/home/jokla/jokla.ru/docs/vktest/tempimg.jpg','image/jpg','image.jpg');
     $post_params = array(
    'file' => $cfile);

     curl_setopt($ch, CURLOPT_URL, $upload_url);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_POST, true);
     curl_setopt($ch, CURLOPT_POSTFIELDS, $post_params);
     curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
     $result = curl_exec($ch);
     curl_close($ch);

     echo ($result);


 }
?>
