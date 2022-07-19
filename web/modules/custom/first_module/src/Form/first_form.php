<?php
    
    namespace Drupal\first_module\Form;

    use Drupal\Core\Form\FormBase; // this baseclass have some inbuilt methods that's why we extends this
    use Drupal\Core\Form\FormStateInterface;

    class first_form extends FormBase{

        /**
        *  {@inheritdoc}
        */

        public function getFormId()
        {
            return 'select_rows';
        }

        public static function afterBuild(array $form, FormStateInterface $form_state) 
        {
            unset($form['form_token']);
            unset($form['form_build_id']);
            unset($form['form_id']);
            // unset($form['search']);
            
            return $form;
        }

        /** 
        *  {@inheritdoc}
        */

        public function buildForm(array $form, FormStateInterface $form_state)
        {
            $form_state->setMethod('GET');

            // $form_state
            // ->setAlwaysProcess(TRUE)
            // ->setCached(FALSE)
            // ->disableRedirect();  

            $form['#cache'] = [
            'max-age' => 0,
            ];

            // $searching = \Drupal::request()->query->get('search');   // to get from url 
            // // $form_state->set('search', $searching);

            $rowOptions = array(
                '0' => 'Select rows',
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5,
                '6' => 6,
                '7' => 7,
                '8' => 8,
                '9' => 9,
                '10' => 10
            );

            $form['search'] = array(
                '#type' => 'textfield',
                "#title" => 'Search by Name',
                '#default_value' => '',
                // '#value' => $searching
            );

            $form['searchbtn'] = array(
                '#type' => 'submit',
                '#value' => 'Search',
                '#button_type' => 'primary',
                '#name' => ''
            ); 

            $form['Rows'] = array(
                '#type' => 'select',
                '#title' => 'Rows',
                '#options' => $rowOptions
            );

            $form['save'] = array(
                '#type' => 'submit',
                '#value' => 'set row',
                '#button_type' => 'primary',
                '#name' => ''
            ); 

            // Add an after build step.
            $form['#after_build'][] = [get_class($this), 'afterBuild'];

            return $form;
        }

        /**
         *  {@inheritdoc}
         */

        public function submitform(array &$form, FormStateInterface $form_state)
        {
            // $postData = $form_state->getValues();
        

            // echo "<pre>";

            // ksm($postData);

            // echo "</pre>";

            // exit;

            // ksm($form_state->getValue('search'));
            // ksm($form_state->getValue('Rows'));
            // die();
        }
    }