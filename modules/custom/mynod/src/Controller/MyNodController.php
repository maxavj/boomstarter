<?php
namespace Drupal\mynod\Controller;

use Drupal\Core\Controller\ControllerBase;

class MyNodController extends ControllerBase {

  public function nod() {
  	$manager = \Drupal::entityTypeManager();
    $query = \Drupal::entityQuery('node')
     ->condition('type', 'promotions')
     ->sort('nid', 'DESC')
     ->range(0, 1);
    $nids = $query->execute();

    $nodes = $manager->getStorage('node')->loadMultiple($nids);
    $build = $manager->getViewBuilder('node')->viewMultiple($nodes, 'promo');
    return [
      '#title' => 'promo',
    ] + $build;

  }
}