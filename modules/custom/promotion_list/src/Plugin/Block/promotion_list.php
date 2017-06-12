<?php
	/**
 * @file
 * Contains \Drupal\promotion_list\Plugin\Block\promotion_list.
 */
namespace Drupal\promotion_list\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\node\NodeInterface;
	/**
 * @Block(
 *   id = "promotion_list",
 *	 admin_label = @Translation("promotion_list")
 * )
 */
class Promotion_list extends BlockBase {
	/**
	* {@inheritdoc}
	*/
	public function build() {
		$manager = \Drupal::entityTypeManager();
		$query = \Drupal::entityQuery('node')->condition('type', 'promotions')->sort('nid', 'DESC')->range(0, 3);
		$nids = $query->execute();
		$nodes = $manager->getStorage('node')->loadMultiple($nids);
		return array(
		'#theme' => 'promotion_list',
		'#nodes' => $nodes,
		);
	}
	
}

