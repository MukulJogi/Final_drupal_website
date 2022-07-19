<?php

namespace Drupal\first_module\Plugin\Block;

use Drupal\Core\Block\BlockBase; 

/**
 * Provides a first block.
 *
 * @Block(
 *   id = "my_table_block",
 *   admin_label = @Translation("table Block"),
 *   category = "custom"
 * )
 */

 class tableBlock extends BlockBase
 {
    public function build()
    {

   /**
   * showdata.
   *
   * @return string
   *   Return Table format data.
   */

    $form = \Drupal::formBuilder()->getForm('Drupal\first_module\Form\first_form');
    $renderForm = \Drupal::service('renderer')->render($form);

    // $form2 =  \Drupal::formBuilder()->getForm('Drupal\first_module\Form\Insert_form');
    // $renderForm2 = \Drupal::service('renderer')->render($form2);

    //     $page = array($renderForm,$renderForm2);
        
        
//    function showContent()
//    {
        $query = \Drupal::database();
        $result = $query->select('dev','e')
                ->fields('e', ['uid','name','age'])
                ->execute()->fetchAll(\PDO::FETCH_OBJ);

        $data = [];

        $rows = \Drupal::request()->query->get('Rows');   // to get from url 
        $searching = \Drupal::request()->query->get('search');   // to get from url 

        // kint($searching);
        if($rows != 0)
        {
        $i = 0;
        foreach ($result as $row) 
        {
            if($i==$rows)   
            {
                break;
            }
            $data[] = [
                'uid' => $row->uid,
                'name' => $row->name,
                'age' => $row->age
            ];
            $i++;
        }
        }

        if($searching != "")
        {
        foreach ($result as $row) 
        {
            if($searching==$row->name)   
            { 
                $data[] = [
                    'uid' => $row->uid,
                    'name' => $row->name,
                    'age' => $row->age
                ];
            }
        }
    }
        $header = array('uid','Name','Age');
        $build['table'] = [
            '#type'=>'table',
            '#header'=>$header,
            '#rows'=>$data,
            '#empty' => $this->t('There is no data available.')
        ];

        return[

            // $renderFormArray,
            $build,
            "#type" => "markup",
            '#title' => 'developer list',
            "#markup" => $renderForm
           // "#markup" => $page[1]
        ];
}
 }