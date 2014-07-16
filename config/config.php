<?php 
	/*
		- link_svn    	: lien du dépot SVN.
		- folder_name 	: nom du dossier à créer.
		- name        	: nom d'utilisateur du compte SVN.
		- pwd 			: Password du compte SVN.
		- del_file 		: /!\ Fichier à supprimer sur le SVN /!\
							Ne prenner pas un fichier important, car si le programme se coupe 
							vous le perdez automatiquement sur le SVN.
		- root_load		: lien du dossier ou sera transmit les dossier/files pour le traitement.
		- tmp_sleep		: temps d'attente avant l'envoi su le SVN. (en secondes).
						  600 = 10 minutes | 1500 = 25 minutes | 1680 = 28 minutes
	*/

	/* ----------------------------------------------------- */ 
	$link_svn    = "**********************";
	$folder_name = "******";
	$name        = "********";
	$pwd         = "**********";
	$del_file    = "tdl.rb";
	$root_load	 = "./www/";
	$tmp_sleep   = 1500 ;
	/* ----------------------------------------------------- */
?>