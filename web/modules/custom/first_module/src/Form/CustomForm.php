<?php

namespace Drupal\first_module\Form;

use Drupal\Core\Form\Formbase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;

/**
 * 
 */
class CustomForm extends FormBase
{


    public function getFormId()
    {

        return "our_custom_form";
    }


    /**
     * 
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['user_name'] = [
            '#type' => 'textfield',
            '#title' => ('User Name:'),
            '#required' => TRUE,
        ];
        $form['email'] = [
            '#type' => 'textfield',
            '#title' => ('email:'),
            '#required' => TRUE,
        ];
        $form['id'] = [
            '#type' => 'textfield',
            '#title' => ('id:'),
            '#required' => TRUE,
        ];

        return $form;
    }
    /**
     * 
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
    }
}
