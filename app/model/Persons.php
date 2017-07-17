<?php

namespace PBData;
use Nette;
use Nette\Diagnostics\Debugger; 

/**
 * Model starající se o tabulku person  
 */
class Persons extends Table
{
  /** @var string */
	protected $tableName = 'person';
 
  public function createPerson($data, $assigned_user_id)	{
  	$data['created'] = new \DateTime();
  	
  	$data['subject'] = $data['spiritual_name'];
  	if($data['spiritual_name'] == "")
			$data['subject'] = $data['surname']." ".$data['name'];
  	
		return $this->getTable()
	  	            ->insert($data);
	}  
	
 	public function updatePerson($id, $data)	{
		$data['last_update'] = new \DateTime();
		
  	$data['subject'] = $data['spiritual_name'];
  	if($data['spiritual_name'] == "")
			$data['subject'] = $data['surname']." ".$data['name'];
  	
		return $this->update($id, $data);
	}     
	
	public function getLeaders($except = NULL)	{
    $table = $this->getTable();
    $table->where(array("leader = ?" => "1"));
    
    if($except != NULL)
      $table->where(array("id != ?" => $except));
    
    return $table;
    
	}   
	
	public function find($id) {
		  return $this->getTable()->select("*")
                              ->where('id', $id)
                              ->fetch()
                              ->toArray();
	}
	
  function searchPersons($values) {
    $patterns = array(); // pole kriterii
    // iterace pres vsechny sloupce
    $result = $this->getTable()->select("*");
    $empty_flag = TRUE;
    
    foreach($values as $column => $pattern) {
    	
      // pokud neni zadane zadne kriterium pokracuj na dalsi sloupec
      if($pattern == "")
        continue;
      
      $empty_flag = FALSE;
      
      // sloupec je textove pole
      if(strpos($column, "text_") !== FALSE) {
        $column = str_replace("text_", "", $column);
        $result->where($column.' LIKE ?', '%'.$pattern.'%');      
      }

      // sloupec je select
      if(strpos($column, "select_") !== FALSE) {
        $column = str_replace("select_", "", $column);
        $result->where($column.' = ?', $pattern);      
      }
      
      // sloupec je checkbox
      if(strpos($column, "checkbox_") !== FALSE) {
        $column = str_replace("checkbox_", "", $column);
        $result->where($column.' = ?', $pattern);      
      }
    }  
    
    /*
    foreach($result as $person) {
      Debugger::fireLog($person);
    }
    */
    
    if($empty_flag)
      return array();
    else
      return $result;
  }
  
  function getPerson($id) {
      $person = $this->findBy(array('id' => $id))
                     ->fetch()
                     ->toArray();

      if($person["last_update"] != "") {
        $timestamp = strtotime($person["last_update"]->__toString());
        $person["last_update"] = date("d.m.Y H:i:s", $timestamp);
      }
    
      $timestamp = strtotime($person["created"]->__toString());
      $person["created"] = date("d.m.Y H:i:s", $timestamp);

      $timestamp = strtotime($person["birth_date"]->__toString());
      $person["birth_day"] = date("d", $timestamp);
      $person["birth_month"] = date("m", $timestamp);
      $person["birth_year"] = date("Y", $timestamp);

      $person['real_image'] = TRUE;
      
      if($person['image'] == "") {
        $person['real_image'] = FALSE;
        if($person['das'] == "d")
          $person['image'] = "universalnimuz.jpg";
        elseif($person['das'] == "dd")
          $person['image'] = "universalnizena.jpg";
      }
            
    return $person;
  }
  
  function prepareTableHead($order_by, $order_by_direction) {
      $order_directions = array("ASC" => "DESC", "DESC" => "ASC");

      $columns = array("last_update" => array("title" => "Aktualizace",
                                             "order" => "last_update"),
      
					   "leadership" => array("title" => "Vedení",
                                             "order" => "leadership_id.subject"),

                       "guru" => array("title" => "DM",
                                       "order" => "guru_id.name"),                             
                                       
                       "subject" => array("title" => "Subjekt",
                                          "order" => "person.subject"),
                             
                       "zone" => array("title" => "Zóna",
                                       "order" => "zone.title"),
                             
                       "region" => array("title" => "Kraj",
                                         "order" => "region.title")
                      );
           
      foreach ($columns as $name => $column) {
        if($order_by == $column['order']) {
            $columns[$name]['direction'] = $order_directions[$order_by_direction];
            $columns[$name]['arrow_d'] = $order_by_direction;
            $columns[$name]['visible'] = "visible";
        }
        else {
            $columns[$name]['direction'] = "ASC";
            $columns[$name]['arrow_d'] = "ASC";
            $columns[$name]['visible'] = "";
        }
    }
    return $columns;  
  }
  
  function preparePaginator($page, &$first, &$last) {
      $count = $this->findAll()->count();
      
      $paginator = new Nette\Utils\Paginator;
      $paginator->setItemCount($count);
      $paginator->setItemsPerPage(50);
      $paginator->setPage($page);
      
      if($paginator->getPageCount() > 7) {
        $first = $paginator->page - 3;
      	$last = $paginator->page + 4;
        			
          if($paginator->page <= 4) {
              $first = 1;
              $last = 8;
          }
      	   		
          if($last > $paginator->getPageCount() ) {
              $first -= $last - $paginator->getPageCount() - 1;
              $last = $paginator->getPageCount() + 1;
          }
      }
      else {
      	 $first = 1;
      	 $last = $paginator->getPageCount() + 1;
      }

      return $paginator;
  }
  
  function generateNumberArray($start, $end) {
      $array = array();
	  for($i = $start; $i <= $end; $i++) {
          $array[sprintf('%02d', $i)] = $i;
      }

      return $array;
  }
}