<?php
/**
 * @file
 * Contains \Drupal\myblock\Plugin\Block\myblock.
 */
 
namespace Drupal\myblock\Plugin\Block;
use Drupal\Core\Url;
use Drupal\Core\Link;
use Drupal\Core\Block\BlockBase;
 /**
 * @Block(
 *   id = "myblock"
 * )
 */
class MyBlock extends BlockBase {
 /**
 * (inher)
 */
  public function build() {
  	$url = Url::fromRoute('node.add', ['node_type' => 'post']);
   	$link = Link::fromTextAndUrl(t('link'), $url)->toString();
    return array('#markup' => t('You may add new post by ' . $link));
  }

}
