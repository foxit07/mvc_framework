<?php
/**
 * Created by PhpStorm.
 * User: David Arakelyan
 * Email: rotokan2@gmail.com
 * Date: 14.12.2017
 * Time: 15:55
 */

//Front Controller

//1. Общие настройки
/*ini_set('display_errors',1);
error_reporting(E_ALL);*/

//2.Подключение файлов системы
define('ROOT', dirname( __FILE__));
require_once (ROOT . '/components/Router.php');
//3. Подключение к базе данных
require_once (ROOT . '/components/Db.php');

//4. Вызов Router
$router = new Router();
$router->run();