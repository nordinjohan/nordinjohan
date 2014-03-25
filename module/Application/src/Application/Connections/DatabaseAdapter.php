<?php

//Databasadapter, används för samtliga SQL's
namespace Application\Connections;
use Zend\Db\Adapter\Adapter;


class DatabaseAdapter {

	public function dbadapter() {

	$dbAdapterConfig = array(
	'driver'   => 'Mysqli',
	'database' => 'zendtest',
	'username' => 'root',
	'password' => ''
	);

	$dbAdapter = new Adapter($dbAdapterConfig);
	return $dbAdapter;
	
	}

}