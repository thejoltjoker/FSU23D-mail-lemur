<?php

namespace App\Controllers;

class Newsletters extends BaseController
{
  public function index(): string
  {
    return view("newsletters");
  }
}
