<?php

class UserModel
{
  protected $id;
  protected $login;
  protected $password_hash;

  function __construct($new_id, $new_login, $new_password_hash)
  {
    $this->id = $new_id;
    $this->login = $new_login;
    $this->password_hash = $new_password_hash;
  }

  function setId($new_id)
  {
    $this->id = (int)$new_id;
  }

  function getId()
  {
    return $this->id;
  }

  function setLogin($new_login)
  {
    $this->login = $new_login;
  }

  function getLogin()
  {
    return $this->login;
  }

  function setPasswordHash($new_password_hash)
  {
    $this->password_hash = $new_password_hash;
  }

  function getPasswordHash()
  {
    return $this->password_hash;
  }
}
?>
