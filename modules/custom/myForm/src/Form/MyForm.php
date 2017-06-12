<?php
/**
 * @file
 * Contains \Drupal\myForm\Form\MyForm.
 *
 */
namespace Drupal\myForm\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\NodeInterface;
use Drupal\node\Entity\Node;

class MyForm extends FormBase {
 /**
  * {@inheritdoc}
  */
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
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
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

}