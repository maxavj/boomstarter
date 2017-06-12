<?php 
/**
 * @file
 * Contains Drupal\ajax_example\AjaxExampleForm
 */

namespace Drupal\ajax_example\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\node\NodeInterface;
use Drupal\node\Entity\Node;

class AjaxExampleForm extends FormBase {

  public function getFormId() {
    return 'FormForNode';
  }
  /**
   * Create form.
   *
   * {@inheritdoc}.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['label'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Your label'),
      '#label' => $this->t('label'),
    );

    $node_types = \Drupal\node\Entity\NodeType::loadMultiple();
    $options = [];
    foreach ($node_types as $node_type) {
      $options[$node_type->id()] = $node_type->label();
    }   

    $form['select_list'] = array(
      '#type' => 'select',
      '#options' => $options,
      '#title' => $this->t('Choose your content type'),
    );

    $form['action']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save node'),
      '#button_type' => 'primary',
      '#ajax' => [
        'callback' => 'Drupal\ajax_example\Form\AjaxExampleForm::viewNode',
        'event' => 'click',
        'progress' => array(
          'type' => 'throbber',
        ),
      ],
      '#suffix' => '<div class="email-validation-message"></div>',
    );

    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (strlen($form_state->getValue('label')) < 4) {
      $form_state->setErrorByName('label', $this->t('label is too short.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    drupal_set_message($this->t('Thank you for @label', array(
      '@label' => $form_state->getValue('label')
    )));
    $node = Node::create([ 'title' => $form_state->getValue('label'), 'type' => $form_state->getValue('select_list')]);
    $node->save();
  }


  public function viewNode(array &$form, FormStateInterface $form_state) {
    $ajax_response = new AjaxResponse();
    $manager = \Drupal::entityTypeManager();
    $query = \Drupal::entityQuery('node')->sort('nid', 'DESC')->range(0, 1);
    $nids = $query->execute();
    $nodes = $manager->getStorage('node')->loadMultiple($nids);
    $build = $manager->getViewBuilder('node')->viewMultiple($nodes, 'promo');
    $ajax_response->addCommand(new HtmlCommand('.email-validation-message', $build));
    return $ajax_response; 
  }
 
}



