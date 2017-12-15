<?php
/**
 * Created by PhpStorm.
 * User: David Arakelyan
 * Email: rotokan2@gmail.com
 * Date: 14.12.2017
 * Time: 19:06
 */

class NewsController
{

    public function actionIndex()
    {

        echo 'Список новостей';
        return true;
    }

    public function actionView($category, $id)
    {

        echo $category . $id;
        echo 'Просмотр одной новости';
        return true;
    }
}