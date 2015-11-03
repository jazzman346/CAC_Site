<?php
function formulaires_sauvegarde_cfg_charger_dist() {

	$options = '';
	$pages_cfg = explode(':', _SARKASPIP_PAGES_CONFIG);
	foreach ($pages_cfg as $_page) {
		if ($_page != 'maintenance') {
			$fond = "sarkaspip_{$_page}";
			$options .= '<option value="' . $fond . '">' . _T("sarkaspip:$fond") . '</option>';
		}
	}

	$valeurs = array('_fonds' => $options);

	return $valeurs;
}

function formulaires_sauvegarde_cfg_verifier_dist() {
	return array();
}

function formulaires_sauvegarde_cfg_traiter_dist() {
	$message=array();
	
	$fonds = array();
	$mode = _request('mode');
	if ($mode == 'page')
		$fonds[] = _request('fond_a_sauvegarder');
	else {
		$pages_cfg = explode(':', _SARKASPIP_PAGES_CONFIG);
		foreach ($pages_cfg as $_page) {
			if ($_page != 'maintenance') {
				$fonds[] = "sarkaspip_{$_page}";
			}
		}
	}
	$dir_cfg = sous_repertoire(_DIR_TMP,"cfg");
	include_spip('inc/sarkaspip_filtres');
	$ok = sauvegarder_fonds($fonds, $dir_cfg, 'maintenance');
	
	if (!$ok) $message['message_nok'] = _T('sarkaspip:cfg_msg_fichier_sauvegarde_nok');
	if ($ok) 
		if ($mode == 'page')
			$message['message_ok'] = _T('sarkaspip:cfg_msg_fichier_sauvegarde_ok', array('nom_fichier' => $nom));
		else
			$message['message_ok'] = _T('sarkaspip:cfg_msg_fichiers_sauvegardes_ok');
	return $message;
}
?>
