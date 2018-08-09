<?php
  require '../vendor/autoload.php';
  include("../controller/AuthorizationController.php");
  include("../controller/ToDoController.php");
  include("../middleware/AuthorizationMiddleware.php");
  include("../middleware/ToDoMiddleware.php");

  $app->get('/', 'AuthorizationController:Home')->add('AuthoriaztionMiddleware:Check');

  $app->get('/auth', 'AuthorizationController:Auth')->add('AuthoriaztionMiddleware:Check');

  $app->group('/auth', function(){
    $this->post('/login','AuthorizationController:Login');//вход с помощью логина и пароля
    $this->get('/logout', 'AuthorizationController:Logout');//выход
    $this->get('/registration','AuthorizationController:Registration');//страница регистрации
    $this->post('/registrate','AuthorizationController:Registrate');//добавление нового пользователя
    $this->get('/error','AuthorizationController:Error');//страница-уведомление об ошибке авторизации/регистрации
  })->add('AuthoriaztionMiddleware:Check')->add('AuthoriaztionMiddleware:Logout');

  $app->get('/todo', 'ToDoController:Home')->add('AuthoriaztionMiddleware:Home');

  $app->group('/todo', function(){//группа todo
    $this->get('/get', 'ToDoController:Get');//отображение таблицы при переходе с помощью верхней панели
    $this->post('/get', 'ToDoController:Get');//отображение таблицы

    $this->get('/add', 'ToDoController:Add');//страница добавления элементов в таблицу при переходе с помощью верхней панели
    $this->post('/add', 'ToDoController:Add');//страница добавления элементов в таблицу

    $this->post('/adding', 'ToDoController:Adding');//добавление элементов в таблицу

    $this->get('/edit', 'ToDoController:Edit');//редактирование таблицы при переходе с помощью верхней панели
    $this->post('/edit', 'ToDoController:Edit');//редактирование таблицы
  })->add('AuthoriaztionMiddleware:Home');

?>
