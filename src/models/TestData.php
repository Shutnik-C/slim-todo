<?php
include("ToDoItem.php");
include("UserModel.php");

class TestData
{
  function TestToDo()
  {
    $array_items = array();
    $item1 = new ToDoItem("0","0","Что-то 1");
    $item2 = new ToDoItem("1","0","Что-то 2");
    $item3 = new ToDoItem("2","0","Что-то 3");

    array_push($array_items, $item1, $item2, $item3);

    return $array_items;
  }

  static function TestUsers()
  {
    $array_users = array();
    $root = new UserModel("0","root",'$2y$10$OEZfXF3xgb.6nnMqmceL5OZ4ZdnoCRQsJG.GUVQzCStUoJre31i8i');//1234
    $user1 = new UserModel("1","user1",'$2y$10$sMsJ77n7K/.oCS7XP4CNa.oqgN9KMveErAG1ebmvKZxUn6PVQdl9u');//1234
    $user2 = new UserModel("2","user2",'$2y$10$usyFWpqXi9ine8awL2Beg.r5kQafbXPUcMUGe262O1OqNB52bLPla');//5678
    $user3 = new UserModel("3","user3",'$2y$10$z8.BAmQKEM8DBc6zOdmu8OpUkWVDUXGXNXGfSZIYX9QVqbv5N23kK');//1111

    array_push($array_users, $root, $user1, $user2, $user3);

    return $array_users;
  }

}
?>
