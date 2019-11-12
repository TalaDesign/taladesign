<?php
session_start();

$errors = [];
// VERIFICATIONS ET DEFINITIONS DES MESSAGES D'ERREURS
if (!isset($_POST['name']) || $_POST['name'] == '') {
	$errors['name'] = "Vous n'avez pas précisé votre nom";
}
if (!isset($_POST['email']) || $_POST['email'] == '' || (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
	$errors['email'] = "Vous n'avez pas précisé votre email ou alors celui-ci n'est pas valide";
}
if (!isset($_POST['telephone']) || $_POST['telephone'] == '') {
	$errors['telephone'] = "Vous n'avez pas précisé votre numéro de téléphone";
}
if (!isset($_POST['message']) || $_POST['message'] == '') {
	$errors['message'] = "Vous n'avez pas précisé votre message";
}

// SI IL Y A DES ERREURS ON LES STOCKE POUR POUVOIR LES RECUPERER POUR LES AFFICHER ET ON STOCKE LES DONNEES QUE L'UTILISATEUR AVAIT SAISIES POUR LUI REAFFICHER POUR QU'IL PUISSE LES CORRIGER
if (!empty($errors)) {
  	$_SESSION['Entreprise Carnonaise']['errors'] = $errors;
  	$_SESSION['Entreprise Carnonaise']['data_memory'] = $_POST;
}
// SI PAS D'ERREURS ON ENVOIE LES INFORMATION PAR MAIL A L'ADRESSE CHOISIE
else{
	$email_destinataire = 'melanie.maugein@gmail.com'; // A CHANGER PAR VOTRE EMAIL 
	$name = $_POST['name'];
	$email = $_POST['email'];
	$telephone = $_POST['telephone'];
	$message = $_POST['message'];
	$headers = 'FROM :'. $email;

	if ( mail($name, $email_destinataire, $telephone, $message, $headers) ){
		$_SESSION['Entreprise Carnonaise']['success'] = 1;
		
	}else{
		$errors ['fail'] = "L'envoi a échoué ";
	}
}
// SI IL Y A DES ERREURS OU NON ON REDIRIGE VERS CETTE PAGE
header('Location: index.php');
exit();