<?php

use Nette\Application\UI,
	Nette\Security as NS;
use Nette\Application\UI\Form;

/**
 * Sign in/out presenters.
 */
class SignPresenter extends BasePresenter
{

    protected function startup()
    {
      parent::startup(); 
      $this->setLayout('layout.login');
    }
	/**
	 * Sign in form component factory.
	 * @return Nette\Application\UI\Form
	 */
protected function createComponentSignInForm()
{
    $form = new Form();
    $form->addText('username', 'Uživatelské jméno:', 30, 20);
    $form->addPassword('password', 'Heslo:', 30);
    $form->addCheckbox('persistent', 'Pamatovat si mě na tomto počítači');
    $form->addSubmit('login', 'Connect');
    $form->onSuccess[] = $this->signInFormSubmitted;
    return $form;
}



public function signInFormSubmitted(Form $form)
{
    try {
        $user = $this->getUser();
        $values = $form->getValues();
        if ($values->persistent) {
            $user->setExpiration('+30 days', FALSE);
        }
        $user->login($values->username, $values->password);
        //$this->flashMessage('Přihlášení bylo úspěšné.', 'success');
        $this->redirect('Persons:list');
    } catch (NS\AuthenticationException $e) {
        $form->addError('Neplatné uživatelské jméno nebo heslo.');
    }
}


	public function actionOut()
	{
		$this->getUser()->logout();
		$this->flashMessage('You have been signed out.');
		$this->redirect('in');
	}

}
