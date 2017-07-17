<?php

use Nette\Diagnostics\Debugger;

/**
 * Map presenter.
 */
class MapPresenter extends BasePresenter  {    
  protected function startup()  {
    parent::startup();

    if (!$this->getUser()->isLoggedIn()) {
        $this->redirect('Sign:in');
    }
  }  
  
  public function beforeRender() {
    $this->template->menu = array();
  }
  
  public function renderMap() {
    $markers = array();
    
    $points = $this->persons
                   ->findAll()
                   ->select("DISTINCT latitude, longitude")
                   ->where("latitude IS NOT NULL AND longitude IS NOT NULL");
    

                  
    foreach($points as $point) {                     
      $marker = array();
      $marker['latitude'] = $point->latitude;
      $marker['longitude'] = $point->longitude;
      
      $persons = $this->persons
                      ->findAll()
                      ->where("latitude = '{$point->latitude}' AND longitude = '{$point->longitude}'");
      $title = "";
      
      foreach($persons as $person) {
        $address = $person->city;
        if($person->street != "")
          $address .= ", ".$person->street;
  
        $marker['address'] = $address;
        
        if($title == "") {
          $title .= $person->subject;
          $center = $this->centres->find($person->centre_id);
          if($center)
            $marker['color'] = $center->color;
          else
            $marker['color'] = "blue";
        }
        else 
          $title .= "<br />".$person->subject;  
      }
      $marker['title'] = $title;
      
      $markers[] = $marker;  
    }

    $this->template->markers = $markers;
  }
}
