<?php
    namespace Drupal\custom_contact_data\Form;
    use Drupal\Core\Form\FormBase;
    use Drupal\Core\Form\FormStateInterface;
    use Drupal\Code\Database\Database;

    class custom_contact_dataForm extends FormBase{

        /**
         * {@inheritdoc}
         */

         public function getFormid(){
             return 'create_data';
         }

         /**
          * {@inheritdoc}
          */

          public function buildForm(array $form, FormStateInterface $form_state)
          {
              $genderOptions = array(
                  '0'=>'Select Gender',
                  'Male'=>'Male',
                  'Female'=>'Female',
                  'Other'=>'Other',
              );

              $cityOptions = array(
                 // '0'=>'Select City',
                  'Shimla'=>'Shimla',
                  'Chandigarh'=>'Chandigrah'
              );


              $form['name'] = array(
                  '#type'=>'textfield',
                  '#title'=>t('Name'),
                  '#default_value'=>'',
                  //'#required'=>True
              );

              $form['gender'] = array(
                '#type'=>'select',
                '#title'=>t('Gender'),
                '#options'=>$genderOptions
              );

              $form['phone'] = array(
                '#type'=>'textfield',
                '#title'=>t('Phone No'),
                '#default_value'=>'',
                //'#required'=>True

              );

              $form['email'] = array(
                '#type'=>'textfield',
                '#title'=>t('Email'),
                '#default_value'=>'',
                //'#required'=>True
              );

               $form['address'] = array(
                '#type'=>'textfield',
                '#title'=>t('Address'),
                '#default_value'=>'',
                //'#required'=>True
               );

               $form['city'] = array(
                '#type'=>'select',
                '#title'=>t('City'),
                '#options'=>$cityOptions,
               // '#required'=>True
               );

              $form['save'] = array(
                '#type'=>'submit',
                '#value'=>'Save',
                '#button_type'=>'primary'
              );

              return $form;
          }

          /**
           * {@inheritdoc}
           */
          
           public function validateForm(array &$form, FormStateInterface $form_state)
           {
               $name = $form_state->getValue('name');
               if(trim($name)==''){
                   $form_state->setErrorByName('name',$this->t('Name field is required'));
               }

               $phone = $form_state->getValue('phone');
               if(trim($name)==''){
                $form_state->setErrorByName('phone',$this->t('Phone No field is required'));
               }

               $email = $form_state->getValue('email');
                if(trim($email)==''){
                $form_state->setErrorByName('email',$this->t('Email field is required'));
               }

               $address = $form_state->getValue('address');
               if(trim($address)==''){
                $form_state->setErrorByName('address',$this->t('Address field is required'));
               }
               $city = $form_state->getValue('city');
               if(trim($city)==''){
                $form_state->setErrorByName('City',$this->t('City field is required'));
               }
            //    $c = 0;
            //    $n = $phone;
            //    for($i=0;$i<10;$i++)
            //    {
            //        if($n[$i] == 1||2||3||4||5||6||7||8||9||0){
            //         $c++;
            //        }
            //        else{
            //         $form_state->setErrorByName('phone',$this->t('Enter number only'));
            //        }
            //    }
            //    if($c!=10)
            //    $form_state->setErrorByName('phone',$this->t('Enter 10 digit number'));
            //    if($phone==1){
            //     $form_state->setErrorByName('phone',$this->t('Phone no field is required'));
                
            }
           /**
            * {@inheritdoc}
            */

           public function submitForm(array &$form, FormStateInterface $form_state)
           {
               $postData = $form_state->getValues();

               unset($postData['save'],$postData['form_build_id'],$postData['form_token'],$postData['form_id'],$postData['op']);


               $query = \Drupal::database();
               $query->insert('contact')->fields($postData)->execute();

               //drupal_set_message(t("Contsct data saved successfully"),'status',TRUE);
        

            //    echo "<pre>";

            //    print_r($postData);

            //    echo "</pre>";

            //    exit;
           }

    }
    