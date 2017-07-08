<?php

namespace App\Repositories;

use App\User;


class Users {

  public function searchFreeStudents($name){
      return User::doesntHave('proyectos')
        ->where('role', 'student')
        ->where('name', 'like', "%$name%")
        ->limit(5)
        ->get();
  }

}
