<?php
# sumber dari - https://isitoktocode.com/post/create-a-simple-php-mvc-framework
$url = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'https';
$url .= '://'. $_SERVER['HTTP_HOST'];
$url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

header('Location: ' . $url . 'public/');