<?php
include __DIR__.'/../model/carga.php';

class cargaControl{
	function insert($obj){
		$carga = new carga();
		return $carga->insert($obj);		
	}

	function update($obj,$id){
		$carga = new carga();
		return $carga->update($obj,$id);
	}

	function delete($obj,$id){
		$carga = new carga();
		return $carga->delete($obj,$id);
	}

	function find($id = null){
		$carga = new carga();
		return $carga->find($id);
	}

	function findAll(){
		$carga = new carga();
		return $carga->findAll();
	}
}

?>