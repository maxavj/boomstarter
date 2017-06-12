<?php
/**
 * @file
 * Contains \Drupal\blockpromo\Plugin\Block\blockpromo.
 */
namespace Drupal\blockpromo\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\node\NodeInterface;
  /**
 * @Block(
 *   id = "blockpromo",
 *	 admin_label = @Translation("blockpromo")
 * )
 */
class BlockPromo extends BlockBase {
/**
* {@inheritdoc}
*/
  public function build() {
  	$node = node_load(64);
    $manager = \Drupal::entityTypeManager();
    $query = \Drupal::entityQuery('node')->condition('type', 'promotions')->sort('nid', 'DESC')->range(0, 1);
    $nids = $query->execute();
    $nodes = $manager->getStorage('node')->loadMultiple($nids);
    $build = $manager->getViewBuilder('node')->viewMultiple($nodes, 'promo');
    // debag($node);
    return $build; 
  }

}

