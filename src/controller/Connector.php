<?php

class Connector//класс взаимодействия с БД
{
  protected $user;
  protected $password;
  protected $database;
  protected $table;

  function Connector($new_user, $new_password)
  {
    $this->$user = mysql_real_escape_string($new_user);
    $this->$password = mysql_real_escape_string($new_password);
  }


}
?>
