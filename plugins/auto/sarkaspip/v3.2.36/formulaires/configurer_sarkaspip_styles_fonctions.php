<?php
function formulaires_configurer_sarkaspip_styles_traiter() {

	// On simule le traitement normal du cvt configurer
	include_spip('inc/cvt_configurer');
	$args = func_get_args();
	$trace = cvtconf_formulaires_configurer_enregistre('configurer_sarkaspip_styles', $args);

	// Post traitement de configuration des plugins concernes
	if (_SARKASPIP_DEBUG_CFG_FONDS == 'oui') {
		$dir = sous_repertoire(_DIR_RACINE,"squelettes");
		$dir = sous_repertoire($dir,"images");
		// Fond bg_site
		$f = $dir . 'bg_site' . _request('bi_extension_site');
		if ($fond=_request('fond_bi_site')) copy($fond, $f);
		else if (is_readable($f)) unlink($f);
		// Fond bg_bandeau_bas
		$f = $dir . 'bg_bandeau_bas' . _request('bi_extension_bandeau_bas');
		if ($fond=_request('fond_bi_bandeau_bas')) copy($fond, $f);
		else if (is_readable($f)) unlink($f);
		// Fond bg_bandeau_haut
		$f = $dir . 'bg_bandeau_haut' . _request('bi_extension_bandeau_haut');
		if ($fond=_request('fond_bi_bandeau_haut')) copy($fond, $f);
		else if (is_readable($f)) unlink($f);
		// Fond bg_body
		$f = $dir . 'bg_body' . _request('bi_extension_body');
		if ($fond=_request('fond_bi_body')) copy($fond, $f);
		else if (is_readable($f)) unlink($f);
		// Fond bg_chemin
		$f = $dir . 'bg_chemin' . _request('bi_extension_chemin');
		if ($fond=_request('fond_bi_chemin')) copy($fond, $f);
		else if (is_readable($f)) unlink($f);
		// Fond bi_extension_commentaire = .gif
		$f = $dir . 'bg_commentaire' . _request('bi_extension_commentaire');
		if ($fond=_request('fond_bi_commentaire')) copy($fond, $f);
		else if (is_readable($f)) unlink($f);
		// Fond bg_edito
		$f = $dir . 'bg_edito' . _request('bi_extension_edito');
		if ($fond=_request('fond_bi_edito')) copy($fond, $f);
		else if (is_readable($f)) unlink($f);
		// Fond bg_extrait
		$f = $dir . 'bg_extrait' . _request('bi_extension_extrait');
		if ($fond=_request('fond_bi_extrait')) copy($fond, $f);
		else if (is_readable($f)) unlink($f);
		// Fond bg_menu
		$f = $dir . 'bg_menu' . _request('bi_extension_menu');
		if ($fond=_request('fond_bi_menu')) copy($fond, $f);
		else if (is_readable($f)) unlink($f);
		// Fond bg_noisette_soustitre
		$f = $dir . 'bg_noisette_soustitre' . _request('bi_extension_noisette_soustitre');
		if ($fond=_request('fond_bi_noisette_soustitre')) copy($fond, $f);
		else if (is_readable($f)) unlink($f);
		// Fond bg_noisette_titre
		$f = $dir . 'bg_noisette_titre' . _request('bi_extension_noisette_titre');
		if ($fond=_request('fond_bi_noisette_titre')) copy($fond, $f);
		else if (is_readable($f)) unlink($f);
		// Fond bg_pied_bas
		$f = $dir . 'bg_pied_bas' . _request('bi_extension_pied_bas');
		if ($fond=_request('fond_bi_pied_bas')) copy($fond, $f);
		else if (is_readable($f)) unlink($f);
		// Fond bg_planche
		$f = $dir . 'bg_planche' . _request('bi_extension_planche');
		if ($fond=_request('fond_bi_planche')) copy($fond, $f);
		else if (is_readable($f)) unlink($f);
	}

	return array('message_ok'=>_T('config_info_enregistree').$trace,'editable'=>true);
}
?>
