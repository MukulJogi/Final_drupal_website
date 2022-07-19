<?php

namespace Drupal\my_module;

class MyService {

    public function myLogic() {

            $currentUser = \Drupal::currentUser();
            $id = $currentUser->id();
            $roles = $currentUser->getRoles();
            $email = $currentUser->getEmail();
        

        return [
            $email,
        ];
    }

}