<?php

use Nette\Application\UI\Form;           
use Nette\Diagnostics\Debugger;
use Nette\Image;

/**
 * Persons presenter.
 */
class PersonsPresenter extends BasePresenter
{  
  /** @persistent */
  public $page = 1;
  /** @persistent */
  public $order_by = "subject";
  /** @persistent */
  public $order_by_direction = "ASC";
  
  protected function startup()  {
    parent::startup();

    if (!$this->getUser()->isLoggedIn()) {
        $this->redirect('Sign:in');
    }
  }  
    
  public function beforeRender() {
    $this->template->menu = array(
      "add" => "Vložit záznam",
    );
  }
  
  public function actionAdd($detail_id){	    
		
  }

  public function handleDeletePerson($person_id) {
    $person = $this->persons
                   ->delete($person_id);
    
    $this->payload->pid = $person_id;
    $this->payload->action = "deletePerson";
	  $this->flashMessage('Záznam odstraněn.', 'success');
    $this->invalidateControl('flashes');
  }

  public function actionDetailPerson($person_id) {
      $this["personForm"]->onSuccess[] = $this->personFormUpdate;
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
      $this["pictureForm"]["person_id"]->setValue($person_id);
      $this["personForm"]['birth_day']->setValue($person['birth_day']);
      $this["personForm"]['birth_month']->setValue($person['birth_month']);
      $this["personForm"]['birth_year']->setValue($person['birth_year']);
      $this["personForm"]->onSuccess[] = $this->personFormUpdate;
      $this->template->person_id = $person_id;
      $this->template->address = $address;
      $this->payload->pid = $person_id;
      $this->payload->leader_flag = $person["leader"];
      $this->invalidateControl('personInfo');
  }  

    public function actionList() {
        $this->template->text = "";
        $this->template->page = 0;
        $this->template->address = "";
    }
    
	public function renderList() {
    	if(!$this->isAjax()) {            
            $paginator = $this->persons
                              ->preparePaginator($this->page, $first, $last);
            
            $persons = $this->persons
                            ->findAll()
                            ->order($this->order_by." ".$this->order_by_direction)
            								->limit($paginator->getLength(), $paginator->getOffset());
            
            $this->template->order_by = $this->order_by;
            $this->template->order_by_direction = $this->order_by_direction;
            $this->template->persons = $persons;
          	     
            $this->template->columns = $this->persons
                                            ->prepareTableHead($this->order_by, $this->order_by_direction);
                  
            $this->template->order_directions = array("ASC" => "DESC", "DESC" => "ASC");;
      		$this->template->min = $first;
      		$this->template->max = $last;
            $this->template->paginator = $paginator;
            $this->template->page = $this->page;
        }
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
	    
	    $data->addCheckbox('bv_active', 'BV Aktivní');
	              
	    $data->addSelect('centre_id', 'Centrum:', $centrePairs)
	         ->setDefaultValue(2);
			
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
		$data->addSelect('region_id', 'Kraj:', $regionPairs);
			
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

    public function uploadImageSubmit(\Nette\Forms\Controls\SubmitButton $button)
    {
        $form = $button->form;
        $values = $form->getValues();
        
        Debugger::fireLog($values);
        
    }

  protected function createComponentPictureForm()  {
    $form = new Nette\Application\UI\Form();
    //$form->getElementPrototype()->name('pictureForm');
    
    $form->addUpload('image', 'Fotka:')
           ->addCondition($form::FILLED)
              ->addRule(Form::IMAGE, 'Fotka musí být JPEG, PNG nebo GIF.')
              ->addRule(Form::MAX_FILE_SIZE, 'Maximální velikost souboru je 512 kB.', 512 * 1024);
    
    $form->addHidden('person_id');
    $form->addSubmit('upload_image', 'Nahrát fotku');
    $form->addSubmit('delete_image', 'Odstranit fotku');              
    $form->onSuccess[] = $this->pictureFormSubmit;
    return $form; 
  }
  
  public function pictureFormSubmit(Form $form) {
    $values = $form->getValues();
    $person_id = $values['person_id'];
    
    if($form['upload_image']->isSubmittedBy()) {
      if($values['image']->isOk()) {                   
        $image = $values['image']->toImage();
        $image->resize(132, 192);
        
        $path_parts = pathinfo($values['image']->name);
        $file_name = $person_id.".".$path_parts['extension'];
        
        $image->save(WWW_DIR . "/images/persons/{$file_name}");
      
        $this->persons
             ->update($person_id, array('image' => $file_name));
      }
      
      $this->flashMessage('Záznam aktualizován.', 'success');
      $this->redirect('detailPerson!', $person_id);
    }
    elseif($form['delete_image']->isSubmittedBy()) {
      $person = $this->persons
                     ->find($person_id);
      
      $this->persons
           ->update($person_id, array('image' => NULL));
      
      unlink(WWW_DIR . "/images/persons/{$person['image']}");
      $this->redirect('detailPerson!', $person_id);
    }
  }
  
	public function personFormSubmit(Form $form) {
    if($form['create']->isSubmittedBy()) {
        $values = $form->getValues();
			
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
      $values['data']['user_created_id'] = $this->getUser()->getId();

		  $id = $this->persons
		             ->createPerson($values['data'], 1);
		  
		  if($values['image']->isOk()) {                   
		  	$image = $values['image']->toImage();
        $image->resize(100, 100);
        
		  	$path_parts = pathinfo($values['image']->name);
		  	$file_name = $id.".".$path_parts['extension'];
		  	$image->save(WWW_DIR . "/images/persons/{$file_name}");
      
      	$this->persons
		  			 ->update($id, array('image' => $file_name));
			}
      
		  $this->flashMessage('Záznam přidán.', 'success');

		  $this->redirect('this');
    }
    else {
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
        
        //auktualizace listu osob
        $count = $this->persons->findAll()->count();
        
        $paginator = new Nette\Utils\Paginator;
        $paginator->setItemCount($count);
        $paginator->setItemsPerPage(50);
        $paginator->setPage($this->page);
        
        $persons = $this->persons
                        ->findAll()
                        ->order($this->order_by)
                        ->limit($paginator->getLength(), $paginator->getOffset());

        
        $this->template->persons = $persons;
        $this->invalidateControl('personsList');
        $this->invalidateControl('flashes');
      }
    }
}
	
	public function personFormUpdate(Form $form) {
			/*
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
      
      if($values['image']->isOk()) {  
       	$image = $values['image']->toImage();
       	$image->resize(100, 100);
        
		  	$path_parts = pathinfo($values['image']->name);
		  	$file_name = $person_id.".".$path_parts['extension'];
		  	$image->save(WWW_DIR . "/images/persons/{$file_name}");
        
       	$values['data']['image'] = $file_name;
                         
      }
			$this->persons
		  	 	 ->updatePerson($person_id, $values['data']);
		  
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
        $form["data"]->setValues($person, TRUE);
        $this->template->detail_person = $person;
        $this->invalidateControl('personForm');
        $this->invalidateControl('flashes');
      }  
    /*
		elseif($form['delete_image']->isSubmittedBy()) {
			
      $id = (int) $this->getParam('detail_id');
      
      $person = $this->persons
	       						 ->find($id)
	       						 ->toArray();
      
      $this->persons
	   ->update($id, array('image' => NULL));
			
					  		 
      unlink(WWW_DIR . "/images/persons/{$person['image']}");
      $this->redirect('this');
    }     
    */
	}
}
