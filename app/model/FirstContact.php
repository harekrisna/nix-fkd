<?php

namespace PBData;
use Nette\Diagnostics\Debugger;

/**
 * Model starající se o tabulku region
 */
class FirstContact extends Table
{
  /** @var string */
  protected $tableName = 'first_contact';

    public function save($id, $data) {
        $data['person_id'] = $id;
        $data['contact_when'] = $this->convertToSQLDate($data['contact_when']);
        
        try{
            $this->getTable()
                 ->insert($data);            
        }catch(\PDOException $e){
            if($e->getCode() == 23000) { // záznam již existuje, tak ho updatujem
                $this->getTable()
                     ->where(array('person_id' => $id))
                     ->update($data);
            }
            else
                throw $e;
        }     
    }

    
}