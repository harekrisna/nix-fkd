<?php

use Nette\Application\UI\Form;
use Nette\Diagnostics\Debugger;

/**
 * Search presenter.
 */
class SearchPresenter extends BasePresenter
{    
  protected function startup()  {
    parent::startup();

    if (!$this->getUser()->isLoggedIn()) {
        $this->redirect('Sign:in');
    }
  }  
  
  public function beforeRender() {
    $this->template->menu = array();
  }
  
  public function actionForm() {
    $this->template->persons = array();
    $this->template->address = "";
  }
  
  
  protected function createComponentSearchForm()
	{
	    $centrePairs = $this->centres
	    			        ->findAll()
	    					->fetchPairs('id', 'title');

  		$zonePairs = $this->zones
						  ->findAll()
						  ->fetchPairs('id', 'title');

  		$membershipLvlPairs = $this->membershipLvls
								   ->findAll()
								   ->fetchPairs('id', 'title');												

			$spiritualLvlPairs = $this->spiritualLvls
															  ->findAll()
																->fetchPairs('id', 'title');												
																
  		$membershipCatPairs = $this->membershipCats
																 ->findAll()
																 ->fetchPairs('id', 'title');	

 			$leaderPairs = $this->persons
													->getLeaders()
													->fetchPairs('id', 'subject');																 
																 
  		$careTypePairs = $this->careTypes
								 					  ->findAll()
														->fetchPairs('id', 'title');	
														
			$developPotentialPairs = $this->developPotentials
								 					  				->findAll()
																		->fetchPairs('id', 'title');	
			
			$regionPairs = $this->regions
			                    ->findAll()
													->fetchPairs('id', 'title');	
			
	   	$form = new Nette\Application\UI\Form();
      $form->getElementPrototype()->name('personForm');
      
	    $form->addText('text_name', 'Jméno:', 30, 255);
			
			$form->addText('text_surname', 'Příjmení:', 30, 255);
	    
	    $form->addText('text_spiritual_name', 'Duchovní jméno:', 30, 255);
	    		 	    
	    $form->addSelect('select_leadership_id', 'Vedení:', $leaderPairs)
	         ->setPrompt('- Vyberte -');
	              
	    $form->addSelect('select_centre_id', 'Centrum:', $centrePairs)
	         ->setPrompt('- Vyberte -');
			
			$form->addSelect('select_zone_id', 'Kazatelská zóna:', $zonePairs)
	         ->setPrompt('- Vyberte -');
			
			$form->addText('text_email', 'Email:', 30, 255)
    			 ->setType('email')
    			 ->setEmptyValue('@');
    			 
			$form->addSelect('select_membership_lvl_id', 'Úroveň členství:', $membershipLvlPairs)
	         ->setPrompt('- Vyberte -');

			$form->addSelect('select_spiritual_lvl_id', 'Duchovní stádium:', $spiritualLvlPairs)
	         ->setPrompt('- Vyberte -');

			$form->addSelect('select_membership_cat_id', 'Kategorie členství:', $membershipCatPairs)
	         ->setPrompt('- Vyberte -');

			$form->addSelect('select_care_type_id', 'Druh péče:', $careTypePairs)
	         ->setPrompt('- Vyberte -');
	         
	    $form->addSelect('select_develop_potential_id', 'Potenciál rozvoje:', $developPotentialPairs)
	         ->setPrompt('- Vyberte -');    			 	 

		    $form->addCheckbox('checkbox_bv_active', 'BV Aktivní');
			$form->addText('text_phone', 'Mobil:', 9, 9);
			$form->addText('text_city', 'Město:', 30, 255);
			$form->addText('text_street', 'Ulice:', 30, 255);
			$form->addText('text_zip', 'PSČ:', 6, 6);
			$form->addSelect('select_region_id', 'Kraj:', $regionPairs)
					 ->setPrompt('- Vyberte -');
            
      $form->addSubmit('search', 'Hledat');
			
			$form->onSuccess[] = $this->searchFormSubmit;
	    return $form;
	}

  public function searchFormSubmit(Form $form) {
	  $values = $form->getValues();
    $persons = $this->persons
										->searchPersons($values);
    
    $this->template->persons = $persons;
  }
  
protected function createComponentPersonForm()
	{
	    $centrePairs = $this->centres->findAll()->fetchPairs('id', 'title');
  		$zonePairs = $this->zones->findAll()->fetchPairs('id', 'title');
 		$membershipLvlPairs = $this->membershipLvls->findAll()->fetchPairs('id', 'title');												
        $spiritualLvlPairs = $this->spiritualLvls->findAll()->fetchPairs('id', 'title');												
  		$membershipCatPairs = $this->membershipCats->findAll()->fetchPairs('id', 'title');	
 		$leaderPairs = $this->persons->getLeaders()->fetchPairs('id', 'subject');
 		$guruPairs = $this->guru->findAll()->fetchPairs('id', 'name');
 		$categoryPairs = $this->category->findAll()->fetchPairs('id', 'category');
  		$careTypePairs = $this->careTypes->findAll()->fetchPairs('id', 'title');	
		$developPotentialPairs = $this->developPotentials->findAll()->fetchPairs('id', 'title');	
        $bhaktiVriksaPairs = $this->bhaktiVriksaLevel->findAll()->fetchPairs('id', 'title');
		$regionPairs = $this->regions->findAll()->order('title')->fetchPairs('id', 'title');
		$howPairs = $this->firstContactHow->findAll()->fetchPairs('id', 'way');
        $personPairs = $this->persons->findAll()->order('subject')->fetchPairs('id', 'subject');

	   	$form = new Nette\Application\UI\Form();
	    $data = $form->addContainer('data');
	    $first_contact = $form->addContainer('first_contact');
        $form->getElementPrototype()->name('personForm');
      
	    $data->addText('name', 'Jméno:', 30, 255);	
        $data->addText('surname', 'Příjmení:', 30, 255);
	    $data->addText('subject', 'Subjekt:', 30, 255)
             ->setDisabled();
	    
	    $data->addText('spiritual_name', 'Duchovní jméno:', 30, 255);		 
	    $form->addSelect('birth_day', 'Datum narození:', $this->persons->generateNumberArray(1, 31));
	    
        $form->addSelect('birth_month', 'Měsíc narození:', $this->persons->generateNumberArray(1, 12));
        
	    $form->addSelect('birth_year', 'Rok narození:', $this->persons->generateNumberArray(1950, 2010));
	    																												 
	    $data->addSelect('das', 'Dás(í):', array('d' => "das", 'dd' => "dasi"));
	    
	    $data->addSelect('leadership_id', 'Vedení:', $leaderPairs)
	         ->setPrompt('- nezadáno -');

	    $data->addSelect('guru_id', 'Guru:', $guruPairs)
	         ->setPrompt('- nezadáno -');
	         
   	    $data->addSelect('category_id', 'Kategorie:', $categoryPairs);
	         //->addRule(Form::FILLED, 'Je nutné vybrat vedení.');
	              
	    $data->addSelect('centre_id', 'Centrum:', $centrePairs)
	         ->setPrompt('- nezadáno -');
			
		$data->addSelect('zone_id', 'Kazatelská zóna 1:', $zonePairs)
	         ->setPrompt('- nezadáno -');

		$data->addSelect('zone2_id', 'Kazatelská zóna 2:', $zonePairs)
	         ->setPrompt('- nezadáno -');

		$data->addSelect('zone3_id', 'Kazatelská zóna 3:', $zonePairs)
	         ->setPrompt('- nezadáno -');
			
		$data->addText('email', 'Email:', 30, 255)
   			 ->setEmptyValue('@')
   			 ->addCondition($form::FILLED)
		 	 ->addRule(Form::EMAIL, 'Zadejte platnou emailovou adresu');

		$data->addSelect('membership_lvl_id', 'Úroveň členství:', $membershipLvlPairs)
	         ->setPrompt('- nezadáno -');
	         //->addRule(Form::FILLED, 'Je nutné vybrat úroveň členství.');    			 	 

		$data->addSelect('spiritual_lvl_id', 'Duchovní stádium:', $spiritualLvlPairs)
	         ->setPrompt('- nezadáno -');
	         //->addRule(Form::FILLED, 'Je nutné vybrat Duchovní stádium.');    			 	 

		$data->addSelect('membership_cat_id', 'Kategorie členství:', $membershipCatPairs)
	         ->setPrompt('- nezadáno -');
	         //->addRule(Form::FILLED, 'Je nutné vybrat kategorii členství.');    			 	 

		$data->addSelect('care_type_id', 'Druh péče:', $careTypePairs)
	         ->setPrompt('- nezadáno -');
	         //->addRule(Form::FILLED, 'Je nutné vybrat druh péče.');    			 	 
	         
	    $data->addSelect('develop_potential_id', 'Potenciál rozvoje:', $developPotentialPairs)
	         ->setPrompt('- nezadáno -');    			 	 

	    $data->addSelect('bhakti_vriksa_lvl_id', 'Bhakti vrikša úroveň:', $bhaktiVriksaPairs)
	         ->setPrompt('- nezadáno -');

	    $data->addCheckbox('bv_active', 'BV Aktivní');

	    $first_contact->addSelect('contact_how', 'Jak:', $howPairs)
            	      ->setPrompt('- nezadáno -');
            	      
	    $first_contact->addSelect('contact_id', 'Přes koho:', $personPairs)
            	      ->setPrompt('- nezadáno -');
        
   	    $first_contact->addText('contact_when', 'Kdy:');

   	    $first_contact->addSelect('contact_where', 'Kde:', $regionPairs)
               	      ->setPrompt('- nezadáno -');
	         	         	         			
		$data->addText('phone', 'Mobil:', 9, 9);
		$data->addText('city', 'Město:', 30, 255);
		$data->addText('street', 'Ulice:', 30, 255);
		$data->addText('zip', 'PSČ:', 6, 6);
		$data->addText('latitude', 'Latitude:', 20, 20);
		$data->addText('longitude', 'Longitude:', 20, 20);
		$data->addTextArea('note', 'Poznámka:');
        $form->addButton('calc_location', 'Zjistit polohu');
		$data->addSelect('region_id', 'Kraj:', $regionPairs)
			 ->setPrompt('- nezadáno -');
			
		$data->addCheckbox('leader', 'Vedoucí');
		$data->addText('created', 'Vytvořeno:')
	    	 ->setDisabled();

	    $data->addText('user_created_id', 'Vytvořil:', 30, 255)
	    	 ->setDisabled();
	    		 
		$data->addText('last_update', 'Poslední aktualitzace:')
	    	 ->setDisabled();	

        $data->addCheckbox('send_news', 'Zasílat novinky?');           
      
        $form->addUpload('image', 'Fotka:')
             ->addCondition($form::FILLED)
             ->addRule(Form::IMAGE, 'Fotka musí být JPEG, PNG nebo GIF.')
             ->addRule(Form::MAX_FILE_SIZE, 'Maximální velikost souboru je 512 kB.', 512 * 1024);
      
        $form->addHidden('person_id');     
        $form->addSubmit('create', 'Vytvořit');
        $form->addSubmit('update', 'Uložit');
        	
		$form->onSuccess[] = $this->personFormSubmit;
	    return $form;
	}

	public function personFormSubmit(Form $form) {
      $values = $form->getValues();
      $person_id = $values['person_id'];
      $birth_day = $values['birth_day'];
      $birth_month = $values['birth_month'];
      $birth_year = $values['birth_year'];
      
      if(empty($birth_day))
        $birth_day = "00";

      if(empty($birth_month))
        $birth_month = "00";
      
      if(empty($birth_year))
        $birth_year = "0000";  
        
      $values['data']['birth_date'] = $birth_year."-".$birth_month."-".$birth_day;
      
      $this->persons
           ->updatePerson($person_id, $values['data']);
      
      $this->firstContact
           ->save($person_id, $values->first_contact);      
      
      $this->flashMessage('Záznam aktualizován.', 'success');

      if (!$this->isAjax()) {                   
        $this->redirect('this');
      } else {
        $person = $this->persons
                       ->find($person_id);
        
        $timestamp = strtotime($person["created"]);
        $person["created"] = date("d.m.Y H:i:s", $timestamp);
        
        $timestamp = strtotime($person["last_update"]);
        $person["last_update"] = date("d.m.Y H:i:s", $timestamp);
        
        $user = $this->users
                     ->find($person["user_created_id"]);
        
        $person["user_created_id"] = $user->fullname;
        
        if($person['image'] == "") {
          //$this['personForm']['delete_image']->setDisabled();
          if($person['das'] == "d")
            $person['image'] = "universalnimuz.jpg";
          elseif($person['das'] == "dd")
            $person['image'] = "universalnizena.jpg";
        }
        
        $address = $person['street'];
        if($person['street'] != "" && $person['city'] != "")
            $address .= ", ";
        
        $address .= $person['city'];
        
        $form["data"]->setValues($person, TRUE);
        $this->template->detail_person = $person;
        $this->template->address = $address;
        $this->template->person_id = $person_id;
        $this->invalidateControl('personInfo');
        
        $this->invalidateControl('flashes');
    }
}
  
  public function handleDetailPerson($person_id) 
  {   

    $person = $this->persons
                   ->getPerson($person_id);    
           
    $leaderPairs = $this->persons
                        ->getLeaders($person_id)
                        ->fetchPairs('id', 'subject');
    
    $person["user_created_id"] = $this->getUser()
                                      ->getIdentity()
                                      ->fullname;
    
    $first_contact = $this->firstContact
                          ->findBy(array('person_id' => $person_id))
                          ->fetch();
    
    if($first_contact) {
        $first_contact->toArray();
        $timestamp = strtotime($first_contact["contact_when"]->__toString());
        $first_contact["contact_when"] = date("d.m.Y", $timestamp);
        $this["personForm"]["first_contact"]->setDefaults($first_contact);   
    } 

    $this->template->person_image = $person['image'];
        
    $address = $person['street'];
    if($person['street'] != "" && $person['city'] != "")
        $address .= ", ";
    $address .= $person['city'];

      $personPairs = $this->persons->findAll()->order('subject')->fetchPairs('id', 'subject');
      unset($personPairs[$person_id]);
      $this["personForm"]['first_contact']['contact_id']->setItems($personPairs);
    
      $this->template->detail_person = $person;                                   
      $this["personForm"]["data"]["leadership_id"]->setItems($leaderPairs);
      $this["personForm"]["data"]->setDefaults($person);
      $this["personForm"]["person_id"]->setValue($person_id);
      $this["personForm"]['birth_day']->setValue($person['birth_day']);
      $this["personForm"]['birth_month']->setValue($person['birth_month']);
      $this["personForm"]['birth_year']->setValue($person['birth_year']);
      $this->template->person_id = $person_id;
      $this->template->address = $address;
      $this->payload->pid = $person_id;
      $this->payload->leader_flag = $person["leader"];
      $this->invalidateControl('personInfo');
  }  

  public function handleDeletePerson($person_id) {
    $person = $this->persons
                   ->delete($person_id);
    
    $this->payload->pid = $person_id;
    $this->payload->action = "deletePerson";
	  $this->flashMessage('Záznam odstraněn.', 'success');
    $this->invalidateControl('flashes');
  }


}
