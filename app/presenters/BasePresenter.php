<?php

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{

	protected $persons;
	protected $centres;
	protected $zones;
	protected $users;
	protected $membershipLvls;
	protected $spiritualLvls;
	protected $membershipCats;
	protected $careTypes;	
	protected $developPotentials;	
	protected $bhaktiVriksaLevel;
    protected $regions; 
    protected $guru; 
    protected $category;
    protected $firstContact;
    protected $firstContactHow;
	
	protected function startup()	{
		parent::startup();
    
		$this->persons = $this->context->persons;
		$this->centres = $this->context->centres;
		$this->zones = $this->context->zones;
		$this->users = $this->context->users;
		$this->membershipLvls = $this->context->membershipLvls;
		$this->membershipCats = $this->context->membershipCats;
		$this->spiritualLvls = $this->context->spiritualLvls;
		$this->careTypes = $this->context->careTypes;		
		$this->developPotentials = $this->context->developPotentials;
		$this->bhaktiVriksaLevel = $this->context->bhaktiVriksaLevel;
        $this->regions = $this->context->regions;
        $this->guru = $this->context->guru;
        $this->category = $this->context->category;
        $this->firstContact = $this->context->firstContact;
        $this->firstContactHow = $this->context->firstContactHow;
  
	}
  
  public function handleSignOut() {
    $this->getUser()->logout();
    $this->redirect('Sign:in');
  }
  
}
