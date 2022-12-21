<?php

    function messages(){
		global $db;
		$req = $db->query("SELECT * FROM messages");
		$results = array();
		while($rows = $req->fetchObject()){
			$results[] = $rows;
		}
		return $results;
	}

?>