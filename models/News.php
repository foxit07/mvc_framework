<?php
/**
 * Created by PhpStorm.
 * User: David Arakelyan
 * Email: rotokan2@gmail.com
 * Date: 15.12.2017
 * Time: 12:10
 */

class News
{

    /**
     * @param $id
     * @return mixed
     */
    public static function getNewsItemById($id)
    {

        $id = intval($id);

        if($id){
            $db = Db::getConnection();
            $result = $db->query('SELECT * FROM news WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $newsItem = $result->fetch();
            return $newsItem;
        }
    }


    /**
     * @return array
     */
    public static function getNewsList()
    {
        $db = Db::getConnection();
        $newsList = array();

        $result = $db->query('SELECT * FROM news');

        $i=0;
        while($row=$result->fetch()){
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        }

        return  $newsList;
    }
}