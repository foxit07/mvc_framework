<?php
/**
 * Created by PhpStorm.
 * User: David Arakelyan
 * Email: rotokan2@gmail.com
 * Date: 14.12.2017
 * Time: 16:35
 */

class Router
{

    private $routes;

    /**
     * Router constructor.
     */
    public  function __construct()
    {

        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    /**
     * @return string
     */
    private function getURI()
    {

        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'],'/');
        }
    }

    /**
     * Запуск приложения
     */
    public function run()
    {
        //Получить строку запроса
        $uri = $this->getURI();

        //Проверить наличие запроса в роутах
        foreach ($this->routes as $uriPattern => $path){
            //Сравниеваем $uriPattern с $uri
           if(preg_match("#$uriPattern#", $uri)){

               //Получаем внутренний путь
               $internalRoute = preg_replace("#$uriPattern#", $path, $uri);

               //Определить какой контроллер и экшн обрабатывают запрос и параметры
               $segment = explode('/',$internalRoute);

              $controllerName = array_shift($segment) . 'Controller';
              $controllerName = ucfirst($controllerName);

              $actionName = 'action' . ucfirst(array_shift($segment));

              $parameters=$segment;


              //Подключить файл класса контроллера
               $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
               if (file_exists($controllerFile)){
                   include_once ($controllerFile);
               }

               //Создать объект класса и вызвать метод
               $controllerObject = new $controllerName;

               //Вызвать экшн и передать параметры
               $result =call_user_func_array(array($controllerObject, $actionName),$parameters);

               if($result!=null){
                   break;
               }

           }
        }
    }
}