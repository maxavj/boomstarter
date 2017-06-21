<?php
/**
 * @file
 * Contains \Drupal\connect_face\Plugin\Block\connect_face.
 */
 
namespace Drupal\connect_face\Plugin\Block;
use Drupal\Core\Url;
use Drupal\Core\Link;
use Drupal\Core\Block\BlockBase;
  /**
 * @Block(
 *   id = "connect_face_block",
 *	 admin_label = @Translation("connect_face")
 * )
 */
class connect_face extends BlockBase {
 /**
 * (@inheritdoc)
 */
  public function build() {
    return array('#markup' => t('<h3 id="title_id">Узнай какие проекты поддeржали твои друзья</h3></br><p>Войди с Facebook и открой для себя новые интересные проекты</p><br><button id="connect_face">Подключить Facebook</button><p id="after_butt">Мы никогда не будем публиковать что-либо на Facebook от вашего имени.</p> '));
  }

}
