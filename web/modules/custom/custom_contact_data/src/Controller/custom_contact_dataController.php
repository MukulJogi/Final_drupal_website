<?php
    namespace Drupal\custom_contact_data\Controller;
    use Drupal\Core\Controller\ControllerBase;

    use Drupal\Code\Database\Database;

    class custom_contact_dataController extends ControllerBase{
        public function createContact(){
            $form = \Drupal::formBuilder()->getForm('Drupal\custom_contact_data\Form\custom_contact_dataForm');
            $renderFrom = \Drupal::service('renderer')->render($form);

            return [
                '#type'=>'markup',
                '#markup'=>$renderFrom
            ];
        }

        public function getcontact(){

            $query = \Drupal::database();
            $result = $query->select('contact','e')
                    ->fields('e',['id','name','gender','phone','email','address','city'])
                    ->execute()->fetchAll(\PDO::FETCH_OBJ);

            $data = [];

            foreach($result as $row){
                $data[] = [
                   # 'id' => $row->id,
                    'name' => $row->name,
                    'gender' => $row->gender,
                    'phone' => $row->phone,
                    'email' => $row->email,
                    'address' => $row->address,
                    'city' => $row->city
                ];
            }

            $header = array('Name','Gender','Phone','Email','Address','City');

            $build['table'] = [
                '#type'=>'table',
                '#header'=>$header,
                '#rows'=>$data
            ];

            return [
                $build,
                '#title' => 'Contact List'
            ];
        }
        
    }