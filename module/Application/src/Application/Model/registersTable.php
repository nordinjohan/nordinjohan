<?php

namespace Application\Model;

use Zend\Db\Sql\Sql;
use Application\Connections\DatabaseAdapter;


class registersTable {

	public function showAll() 
	{

	$sql = new Sql($this->GetAdapter()->dbadapter(),'registers');
	$select = $sql->select()->order('reg_id DESC'); 
	$statement = $sql->prepareStatementForSqlObject($select);
	$results = $statement->execute();

	return $results;

	}

	public function SaveRegister($data) 
	{

	$sql = new Sql($this->GetAdapter()->dbadapter());
	$insert = $sql->insert('registers');

	$date = new \Zend\Db\Sql\Expression('NOW()');

	$Newdata = array(
    'reg_name'=> $data['reg_name'],
    'reg_desc'=> $data['reg_desc'], 
    'reg_date'=> $date,
    );

    $insert->values($Newdata);
	$statement = $sql->prepareStatementForSqlObject($insert);
	$results = $statement->execute();

	}

	public function DeleteRegister($id) 
	{

	$sql = new Sql($this->GetAdapter()->dbadapter(),'registers');
	$delete = $sql->delete()
		->where(array('reg_id' => $id));

	$statement = $sql->prepareStatementForSqlObject($delete);
	$results = $statement->execute();

	}

	public function GetAdapter() 
	{

        $Adapter = new DatabaseAdapter;
        return $Adapter;

	}

}