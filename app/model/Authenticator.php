<?php

namespace PBData;
use Nette;
use Nette\Security as NS;


/**
 * Users authenticator.
 */
class Authenticator extends Nette\Object implements NS\IAuthenticator
{
	/** @var Nette\Database\Connection */
	private $database;

  /** @var UserRepository */
  private $users;


	public function __construct(Users $users)
	{
    $this->users = $users;
	}



	/**
	 * Performs an authentication
	 * @param  array
	 * @return Nette\Security\Identity
	 * @throws Nette\Security\AuthenticationException
	 */
	public function authenticate(array $credentials)	{
    list($username, $password) = $credentials;
    $row = $this->users->findByName($username);
    
    /*
    echo $password."<br />";
    echo $row->password."<br />";
    echo self::calculateHash($password, "hash");
    exit;
    */
    
    if (!$row) {
        throw new NS\AuthenticationException("User '$username' not found.", self::IDENTITY_NOT_FOUND);
    }

    if ($row->password !== self::calculateHash($password, "hash")) {
        throw new NS\AuthenticationException("Invalid password.", self::INVALID_CREDENTIAL);
    }
    
    unset($row->password);
    return new NS\Identity($row->id, NULL, $row->toArray());
	}



	/**
	 * Computes salted password hash.
	 * @param  string
	 * @return string
	 */
	public static function calculateHash($password, $salt = null)	{
    if ($salt === null) {
        $salt = '$2a$07$' . Nette\Utils\Strings::random(32) . '$';
    }
    
    return crypt($password, $salt);
	}

}
