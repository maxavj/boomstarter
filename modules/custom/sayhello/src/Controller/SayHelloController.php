<?php

namespace Drupal\sayhello\Controller;

use Drupal\Core\Controller\ControllerBase;

class SayHelloController extends ControllerBase {

  public function sayhello() {
  $output = array();

    $output['#title'] = 'Hello World page title';

    $output['#markup'] = 'Hello World page text';

    return $output;
  }
}