<?php
  require "config.php";
	

  try  {
    
    //connexion
    $connection = new PDO($dsn, $username, $password, $options);
    $url = 'patient0507.json'; 
	$data = file_get_contents($url);  	// We load it
	$patient = json_decode($data);	// We encode it
	var_dump ($patient);
	// we go through the array
	foreach ($patient as $user) {
		$new_user = array(
							"nom_patient" => $user->nom_patient,
              "nom_jeunefille"  => $user->nom_jeunefille,
              "nom_patient" => $user->nom_patient,
              "prenom_patient" => $user->prenom_patient,
              "date_naissance" => $user->date_naissance,
              "sexe" => $user->sexe,
              "photo_profil" => $user->photo_profil,
              "code_patient"  => $user->code_patient,
              "mdp_patient" => $user->mdp_patient,
              "nom_secu" => $user->nom_secu,
              "num_secu" => $user->num_secu,
              "nom_mutuelle" => $user->nom_mutuelle,
              "num_mutuelle" => $user->num_mutuelle,
              "tel_fixe_patient" => $user->tel_fixe_patient,
              "tel_mobile_patient" => $user->tel_mobile_patient,
              "mail_patient" => $user->mail_patient,
              "nom_assure" => $user->nom_assure,
              "prenom_assure" => $user->prenom_assure,
              "autorisation" => $user->autorisation,
              "id_photo_patient" => $user->id_photo_patient,
              "id_devis" => $user->id_devis,
              "id_facture" => $user->id_facture,
              "id_compte_rendus" => $user->id_compte_rendus,
              "id_adresse" => $user->id_adresse,
              "id_cabinet" => $user->id_cabinet,
              "date_creation_patient" => $user->date_creation_patient
    );
    //we prepare the query with a helper
    $sql = sprintf("INSERT INTO %s (%s) values (%s)","patient",
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