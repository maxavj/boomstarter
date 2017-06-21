<?php
/**
 * @file
 * Contains \Drupal\connect_vk\Plugin\Block\connect_vk.
 */
 
namespace Drupal\connect_vk\Plugin\Block;
use Drupal\Core\Url;
use Drupal\Core\Link;
use Drupal\Core\Block\BlockBase;
  /**
 * @Block(
 *   id = "connect_vk_block",
 *	 admin_label = @Translation("connect_vk")
 * )
 */
class connect_vk extends BlockBase {
 /**
 * (@inheritdoc)
 */
  public function build() {
    return array('#markup' => t('<h3 id="title_id_vk">Узнай какие проекты поддeржали твои друзья</h3></br><p>Войди с VK и открой для себя новые интересные проекты</p><br><button id="connect_vk">Подключить Vk.com</button><p id="after_butt_vk">Мы никогда не будем публиковать что-либо на VK от вашего имени.</p> '));
  }

}
