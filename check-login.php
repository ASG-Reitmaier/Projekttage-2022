<?php  
 require_once('search.php');
 $db = new DB();
session_start();


if (isset($_POST['benutzername']) && isset($_POST['passwort'])) {

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$username = test_input($_POST['benutzername']);
	$password = test_input($_POST['passwort']);
	

	if (empty($username)) {
		header("Location: login.php?error=Bitte Benutzername eingeben!");
    }
    else if (empty($password)) {
        header("Location: login.php?error=Bitte Passwort eingeben!");
    }
    else {

                // Verschlüsselung des Passworts
                $password = md5($password);
                $result = $db->loginAusgeben($username, $password);
            
            if (count($result) === 1 && $result['0']['password'] === $passwort && $result['0']['name'] === $username) {
                    // Der Benutzername muss einzigartig sein

                    $_SESSION['name'] = $result['0']['name'];
                    $_SESSION['benutzer_id'] = $result['0']['benutzer_id'];
                    $_SESSION['klasse'] = $result['0']['klasse'];
                    $_SESSION['rolle'] = $result['0']['rolle'];

                    header("Location: index.php");

                }else {
                    header("Location: login.php?error=Incorect User name or password");
                }
            }

}else {
    header("Location: login.php");
    }
?>