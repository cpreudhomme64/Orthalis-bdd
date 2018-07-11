<?php
  require "config.php";
	

  try  {
    
    //connexion
    $connection = new PDO($dsn, $username, $password, $options);
    $url = 'cabinet.json'; 
	$data = file_get_contents($url);  	// We load it
	$cabinet = json_decode($data);	// We encode it
	var_dump ($cabinet);
	// we go through the array
	foreach ($cabinet as $user) {
		$new_user = array(
			  "nom_cabinet" => $user->nom_cabinet,
              "code_cabinet"  => $user->code_cabinet,
              "id_adresse" => $user->id_adresse,
              "id_contact" => $user->id_contact,
              "id_photo_cabinet" => $user->id_photo_cabinet,
              "date_creation_cabinet" => $user->date_creation_cabinet
    );
    //we prepare the query with a helper
    $sql = sprintf("INSERT INTO %s (%s) values (%s)","cabinet",
      implode(", ", array_keys($new_user)),
      ":" . implode(", :", array_keys($new_user))

    );
    var_dump ($sql);
    $statement = $connection->prepare($sql);
    $statement->execute($new_user);
}
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }

?>