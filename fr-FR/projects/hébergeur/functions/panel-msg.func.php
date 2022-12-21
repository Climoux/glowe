<?php

    function messages_contact(){
		global $db;
		$req = $db->query("SELECT * FROM contact");
		$results = array();
		while($rows = $req->fetchObject()){
			$results[] = $rows;
		}
		return $results;
	}