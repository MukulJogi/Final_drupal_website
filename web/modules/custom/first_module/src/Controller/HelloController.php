<?php
namespace Drupal\first_module\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * 
 */
class HelloController extends ControllerBase {
    /**
     * 
     */
    public function sayHelloWorld() {

        $currentUser = \Drupal::currentUser();
        $id = $currentUser->id();
        $roles = $currentUser->getRoles();
        $email = $currentUser->getEmail();

       // kint($id,$roles,$email);
        return [
            "#type" => "markup",
            "#markup" => $this->t("Hello world"),
            '#cache' => [
                'max-age' => 0,
            ],
        ];
    }
}