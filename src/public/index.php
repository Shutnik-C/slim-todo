<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../boodstrap.php';//сборка приложения
require '../routing.php';//осуществляет роутинг

$app->run();//запуск приложения

#$todo1 = ["0","0","Что-то 1"];
#$todo2 = ["0","0","Что-то 2"];
#$todo3 = ["0","0","Что-то 3"];
#$results = [$todo1, $todo2, $todo3];


/*$app = new \Slim\App;
$app->get('/', function (Request $request, Response $response, $args) {
    $name = $request->getAttribute('name');
    $todo1 = [0,"0","Что-то 1"];
    $todo2 = [1,"0","Что-то 2"];
    $todo3 = [2,"1","Что-то 3"];
    $results = [$todo1, $todo2, $todo3];
    $res_count = count($results);

    $response->getBody()->write("<div>");
    //$response->getBody()->write("Hello, $name");
    $response->getBody()->write('<table border="1" width="100%" cellpadding="5">');
    $response->getBody()->write('<tr>');
    $response->getBody()->write('<th>№</th>');
    $response->getBody()->write('<th>Статус</th>');
    $response->getBody()->write('<th>ToDo</th>');
    $response->getBody()->write('<th>Удалить</th>');
    $response->getBody()->write('</tr>');

    for($i = 1; $i <= $res_count; $i++)
    {
      $row = $results[$i-1];//строка бд
      $response->getBody()->write('<tr>');//начало строки

      $response->getBody()->write('<td>');
      $response->getBody()->write("$row[0]");
      $response->getBody()->write('</td>');//строка номера строки

      $response->getBody()->write("<td><form method='get'>");
      $response->getBody()->write("<input type='hidden' name='id' value='$row[0]'>");
      if($row[1] == "0")
        $response->getBody()->write("<input type='submit' name='status_btn' value='Не сделано'>");
      else
        $response->getBody()->write("<input type='submit' name='status_btn' value='Сделано'>");
      $response->getBody()->write("</form></td>");//строка статуса todo

      $response->getBody()->write("<td><form method='get'>");
      $response->getBody()->write("<input type='hidden' name='id' value='$row[0]'>");
      if(isset($_GET['id']) && $row[0] == $_GET['id'] && isset($_GET['edit_btn']))
      {
        $response->getBody()->write("<input type='test' value='$row[2]' name='text_block'>");
        $response->getBody()->write("<input type='submit' value='Сохранить' name='save_btn'>");
        $response->getBody()->write("<input type='submit' value='Отменить' name='cancel_btn'>");
      }

      else
      {
        if($row[1] == "0")
          $response->getBody()->write("<s>$row[2]</s>");
        else
          $response->getBody()->write("$row[2]");

        $response->getBody()->write("<input type='submit' value='Редактировать' name='edit_btn'>");
      }
      $response->getBody()->write("</form></td>");//строка действия todo

      $response->getBody()->write("<td><form method='get'>");
      $response->getBody()->write("<input type='hidden' name='id' value='$row[0]'>");
      $response->getBody()->write("<input type='submit' value='Удалить' name='delete_btn'>");
      $response->getBody()->write("</form></td>");//строка удаления todo

      $response->getBody()->write('</tr>');//конец строки

    }



    $response->getBody()->write('');
    $response->getBody()->write('');
    $response->getBody()->write('');
    $response->getBody()->write('');
    $response->getBody()->write('');
    $response->getBody()->write('');
    $response->getBody()->write('');
    $response->getBody()->write('</table>');
    $response->getBody()->write("</div>");

    return $response;
});

$app->get('/?id={id}&delete_btn=Удалить', function (Request $request, Response $response, $args) {
  $response->getBody()->write('<div>');
  $response->getBody()->write('yt');
  $response->getBody()->write('</div>');
  return $response;

});
$app->run();*/
?>
