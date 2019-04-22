<?php

namespace Drupal\drupalup_simple_form\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class SimpleForm extends FormBase{

    public function getFormId() {
        return 'drupalup_simple_form';
    }
    public function buildForm(array $form, FormStateInterface $form_state) {

        $form['title'] = array(
            '#type' => 'textfield',
            '#title' => t('First Name'),
            '#default_value' => \Drupal::state()->get('title'),
            '#required' => TRUE,
        );
        $form['title2'] = array(
            '#type' => 'textfield',
            '#title' => t('Second Name'),
            '#default_value' =>\Drupal::state()->get('title2'),
            '#required' => TRUE,
        );
        $form['email'] = array(
            '#type' => 'textfield',
            '#title' => t('email'),
            '#default_value' => \Drupal::state()->get('email'),
            '#required' => TRUE,
        );
        $form['submit'] = array(
            '#type' => 'submit',
            '#value' => t('Submit'),
        );
        return $form;
    }
    public function validateForm(array &$form, FormStateInterface $form_state) {
        if (strlen($form_state->getValue('title2')) < 5) {
            $form_state->setErrorByName('title2', $this->t('SEcond Name is too short.'));
        }
    }
    public function submitForm(array &$form, FormStateInterface $form_state) {
        $values = array(
            'title' => $form_state->getValue('title'),
            'title2' => $form_state->getValue('title2'),
            'email' => $form_state->getValue('email')
        );
          \Drupal::state()->setMultiple($values);
//          var_dump($values);
//          die();

    }

}
