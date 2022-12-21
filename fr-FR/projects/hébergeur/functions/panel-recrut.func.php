<?php

    function sender(){
		global $db;
		$req = $db->query("SELECT * FROM recruitment");
		$results = array();
		while($rows = $req->fetchObject()){
			$results[] = $rows;
		}
		return $results;
	}