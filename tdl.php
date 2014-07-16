#!/usr/bin/php
<?php
	/**
		Quentin BALCEREK
	*/
	date_default_timezone_set('Europe/Paris');
	include('./autoload.php');
	$timer = new DateTime();

	while (1)
	{
		if (file_exists($root_load.$folder_name))
		{
			echo timer($timer)."suppréssion de l'ancient dossier:\n";
			delTree($root_load.$folder_name);
		}
		echo timer($timer)."Création du nouveau dossier:\n";
		mkdir($root_load.$folder_name, 0777);

		echo timer($timer)."Importation des donnée du svn dans le dossier:\n";
		exec('svn co --username '.$name.' --password '.$pwd.' "'.$link_svn.'" '.$root_load.$folder_name.'');

		echo timer($timer)."Copiage du dossier importer:\n";
		copy_dir($root_load.$folder_name.'/', $root_load.$folder_name.'_old/');

		echo timer($timer)."Commencement de la prise en compte du temps de log:\n";
		exec('svn up --username '.$name.' --password '.$pwd.' '.$root_load.$folder_name.'');
		echo timer($timer)."svn up\n";

		exec('svn del --username '.$name.' --password '.$pwd.' '.$root_load.$folder_name.'/'.$del_file.'');
		echo timer($timer)."svn del\n";

		echo timer($timer)."-- ATTENTE --\n";
		sleep($tmp_sleep);
		echo timer($timer)."-- REPRISE --\n";

		copy($root_load.$folder_name.'_old/'.$del_file, $root_load.$folder_name.'/'.$del_file);
		echo timer($timer)."copie du fichier supprimer\n";

		exec('svn add --username '.$name.' --password '.$pwd.' '.$root_load.$folder_name.'/'.$del_file.'');
		echo timer($timer)."svn add\n";

		exec('svn commit --username '.$name.' --password '.$pwd.' '.$root_load.$folder_name.'/'.$del_file.' -m"mise à jour du projet '.$folder_name.'"');
		echo timer($timer)."svn commit\n";

		delTree($root_load.$folder_name.'_old');
		echo timer($timer)."Suppréssion du dossier 'old'\n";
	}
?>