<?php
/**
 * Created by PhpStorm.
 * User: David Arakelyan
 * Email: rotokan2@gmail.com
 * Date: 15.12.2017
 * Time: 12:35
 */

class Db
{

    /**
     * @return PDO
     */
    public static function getConnection()
    {

        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO ($dsn, $params['user'], $params['password']);

        return $db;
    }
}