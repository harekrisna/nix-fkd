          /*
        $first = $paginator->page - 3;
        $last = $paginator->page + 4;
         
        if($first <= 1) {
          $first = 1;
          $last = 8;
        }
        if($paginator->getPageCount() < $last)
          $last = $paginator->getPageCount() + 1; 
        */
  
  /*
  public function actionList($detail_id) 
  {   
    if($detail_id) {
      $person = $this->persons
                      ->findBy(array('id' => $detail_id))
                      ->fetch()
                      ->toArray();
      
      $this->template->detail_person = $person;
      if($person["last_update"] != "") {
        $timestamp = strtotime($person["last_update"]->__toString());
        $person["last_update"] = date("d.m.Y H:i:s", $timestamp);
      }
      
      $timestamp = strtotime($person["created"]->__toString());
      $person["created"] = date("d.m.Y H:i:s", $timestamp);
      
      $timestamp = strtotime($person["birth_date"]->__toString());
      $birth_date["birth_day"] = date("d", $timestamp);
      $birth_date["birth_month"] = date("m", $timestamp);
      $birth_date["birth_year"] = date("Y", $timestamp);
      
       $leaderPairs = $this->persons
                           ->getLeaders($detail_id)
                           ->fetchPairs('id', 'subject');
      
      $person["user_created_id"] = $this->getUser()
                                        ->getIdentity()
                                        ->fullname;
                                        
      $this["personForm"]["data"]["leadership_id"]->setItems($leaderPairs);
      $this["personForm"]["data"]->setDefaults($person);
      $this["personForm"]->setDefaults($birth_date);
      $this["personForm"]->addSubmit('update', 'Uložit');
      $this["personForm"]->onSuccess[] = $this->personFormUpdate;
    }
  }  
  */