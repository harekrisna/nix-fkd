<?php

namespace PBData;

/**
 * Model starající se o tabulku user
 */
class Users extends Table
{
	/** @var string */
  protected $tableName = 'user';
    
  public function findByName($username){
    return $this->findAll()
                ->where('username', $username)
                ->fetch();
  }    
}