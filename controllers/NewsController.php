<?php
/**
 * Created by PhpStorm.
 * User: David Arakelyan
 * Email: rotokan2@gmail.com
 * Date: 14.12.2017
 * Time: 19:06
 */

include_once (ROOT . '/models/News.php');

class NewsController
{


    public function actionIndex()
    {

        $newsList = array();
        $newsList = News::getNewsList();

        require_once (ROOT . '/views/news/index.php');

        return true;

    }

    public function actionView($id)
    {
        echo '<pre>';
        print_r(News::getNewsItemById($id));
        return true;
    }
}