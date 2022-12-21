<?php

    include_once "recup.func.php";

	function messages(){
		global $db;
		$req = $db->query("SELECT * FROM messages");
		$results = array();
		while($rows = $req->fetchObject()){
			$results[] = $rows;
		}
		return $results;
	}
                    
    foreach(messages() as $user){
        
        $date = $user->date;
        $message = decode($user->message);

?>

<span><?= $user->sender ?> - <?= $date ?></span><br>
<span><?= $message ?></span><br><br>

<?php

    }

?>