<?php
// Pipeline insert_head public
function sarkaspip_insert_head($flux) {

	include_spip('inc/config');
	
	// Recuperation des parametres cfg sur le menu des rubriques
	$position = lire_config('sarkaspip_menus/position_rubriques', 1);
	$modele = lire_config('sarkaspip_menus/modele_rubriques', 1);
	// Si le menu des rubriques est deroulant dans le bandeau
	if (($position == 5) && ($modele == 1))
		$flux .='<script src="'.url_absolue(find_in_path('scripts/menu_deroulant_horizontal.js')).'" type="text/javascript"></script>';
	// Si le menu des rubriques est deroulant dans la colonne navigation
	if (($position == 1) && ($modele == 1))
		$flux .='<script src="'.url_absolue(find_in_path('scripts/menu_deroulant_vertical.js')).'" type="text/javascript"></script>';

	// Insertion de la librairie jCarouselLite et des librairies connexes
	$position = lire_config('sarkaspip_album/position_carrousel', 1);
	$modele = lire_config('sarkaspip_album/modele_carrousel', 1);
	if (($position != 0) && ($modele == 1)) {
		$flux .='<script src="'.url_absolue(find_in_path('scripts/jcarousellite_1.0.1.js')).'" type="text/javascript"></script>';
		$flux .='<script src="'.url_absolue(find_in_path('scripts/jquery.mousewheel.js')).'" type="text/javascript"></script>';
	}

	// Insertion de la librairie Innerfade pour la noisette des sites favoris
	$position = lire_config('sarkaspip_noisettes/position_herbier', 0);
	$modele = lire_config('sarkaspip_noisettes/liste_herbier', 2);
	if (($position != 0) && ($modele == 2)) {
		$flux .='<script src="'.url_absolue(find_in_path('scripts/jquery.innerfade.js')).'" type="text/javascript"></script>';
	}
	
	// Insertion de la librairie jquery.corner pour la noisette cfg_sarkaspip_coins
	$coins_arrondis = lire_config('sarkaspip_coins/avec_arrondis', 0);
	if (($coins_arrondis == 1)) {
		$flux .= '<script src="'.url_absolue(find_in_path('scripts/jquery.corner.js')).'" type="text/javascript"></script>';
		$flux .= '<script src="'.generer_url_public('sarkaspip_coins.js').'" type="text/javascript"></script>';
	}
	
	return $flux;
}

// Pipeline "mes_fichiers_a_sauver" permettant de rajouter des fichiers � sauvegarder dans le plugin Mes Fichiers 2
function sarkaspip_mes_fichiers_a_sauver($flux){
	$tmp_fonds = defined('_DIR_TMP') ? _DIR_TMP.'fonds/': _DIR_RACINE.'tmp/fonds/';
	$tmp_styles = defined('_DIR_TMP') ? _DIR_TMP.'cfg/': _DIR_RACINE.'tmp/cfg/';

	// le repertoire des images de fonds pour les styles
	if (@is_dir($tmp_fonds))
		$flux[] = $tmp_fonds;
	// le repertoire sauvegardes du cfg des styles
	if (@is_dir($tmp_styles))
		$flux[] = $tmp_styles;

	spip_log('*** sarkaspip_mes_fichiers_a_sauver ***');
	spip_log($flux);
	return $flux;
}

// Pipeline "zengarden_activer_theme" permettant d'effectuer les traitements d'activation d'un theme lies � Sarka-SPIP
function sarkaspip_zengarden_activer_theme($flux){
	$dir = $flux['args']['dir'];
	$action = $flux['args']['action'];

	$dir_cfg = $dir . '/cfg';
	$cfg = preg_files($dir_cfg);

	include_spip('inc/config');

	if ($action == 'activer') {
		// On sauvegarde des valeurs actuelles pour un eventuel rappel
		$dir_cfg = sous_repertoire(_DIR_TMP,"cfg");
		$dir_cfg = sous_repertoire(_DIR_TMP,"themes");
		$fonds = array();
		foreach ($cfg as $_fichier_cfg) {
			$fonds[] = basename($_fichier_cfg, '.txt');
		}
		include_spip('inc/sarkaspip_filtres');
		$ok = sauvegarder_fonds($fonds, $dir_cfg, 'theme');

		// On ecrit la nouvelle configuration n�cessaire au theme choisi
		$flux['data'] = true;
		foreach ($cfg as $_fichier_cfg) {
			lire_fichier($_fichier_cfg, $tableau);
			$fond = basename($_fichier_cfg, '.txt');
			ecrire_config($fond, $tableau);
		}
	}
	else if ($action == 'effacer') {
		$fichiers = array();
		$flux['data'] = true;
		foreach ($cfg as $_fichier_cfg) {
			$fond = basename($_fichier_cfg, '.txt');
			effacer_config($fond);
			$fichiers[] = _DIR_TMP . 'themes/cfg/' . $fond . '.txt';
		}
		include_spip('inc/sarkaspip_filtres');
		$ok = restaurer_fonds($fichiers);
	}
	else {
		// action apercevoir : on ne fait rien, on sait pas faire..
	}

	return $flux;
}

// Pipelines specifiques a Sarka-SPIP
// -- Fonction d'insertion en debut de colonne extra
function sarkaspip_colonne_extra_debut($flux){
	if (defined('_PERSO_COLONNE_EXTRA_DEBUT'))
		return afficher_noisettes(_PERSO_COLONNE_EXTRA_DEBUT, $flux, true);
}
// -- Fonction d'insertion en fin de colonne extra
function sarkaspip_colonne_extra_fin($flux){
	if (defined('_PERSO_COLONNE_EXTRA_FIN'))
		return afficher_noisettes(_PERSO_COLONNE_EXTRA_FIN, $flux, true);
}
// -- Fonction d'insertion en debut de colonne navigation
function sarkaspip_colonne_navigation_debut($flux){
	if (defined('_PERSO_COLONNE_NAVIGATION_DEBUT'))
		return afficher_noisettes(_PERSO_COLONNE_NAVIGATION_DEBUT, $flux, true);
}
// -- Fonction d'insertion en fin de colonne navigation
function sarkaspip_colonne_navigation_fin($flux){
	if (defined('_PERSO_COLONNE_NAVIGATION_FIN'))
		return afficher_noisettes(_PERSO_COLONNE_NAVIGATION_FIN, $flux, true);
}
// -- Fonction d'insertion en fin de menu des pages speciales
function sarkaspip_menu_pages_speciales_fin($flux){
	if (defined('_PERSO_MENU_PAGES_SPECIALES_FIN'))
		return afficher_noisettes(_PERSO_MENU_PAGES_SPECIALES_FIN, $flux, false);
}
// -- Fonction d'insertion en debut de bandeau haut
function sarkaspip_bandeau_haut_debut($flux){
	if (defined('_PERSO_BANDEAU_HAUT_DEBUT'))
		return afficher_noisettes(_PERSO_BANDEAU_HAUT_DEBUT, $flux, false);
}
// -- Fonction d'insertion en fin de bandeau haut
function sarkaspip_bandeau_haut_fin($flux){
	if (defined('_PERSO_BANDEAU_HAUT_FIN'))
		return afficher_noisettes(_PERSO_BANDEAU_HAUT_FIN, $flux, false);
}
// -- Fonction d'insertion en debut de bandeau bas
function sarkaspip_bandeau_bas_debut($flux){
	if (defined('_PERSO_BANDEAU_BAS_DEBUT'))
		return afficher_noisettes(_PERSO_BANDEAU_BAS_DEBUT, $flux, false);
}
// -- Fonction d'insertion en fin de bandeau bas
function sarkaspip_bandeau_bas_fin($flux){
	if (defined('_PERSO_BANDEAU_BAS_FIN'))
		return afficher_noisettes(_PERSO_BANDEAU_BAS_FIN, $flux, false);
}
// -- Fonction d'insertion en debut de pied
function sarkaspip_pied_debut($flux){
	if (defined('_PERSO_PIED_DEBUT'))
		return afficher_noisettes(_PERSO_PIED_DEBUT, $flux, false);
}
// -- Fonction d'insertion en fin de pied
function sarkaspip_pied_fin($flux){
	if (defined('_PERSO_PIED_FIN'))
		return afficher_noisettes(_PERSO_PIED_FIN, $flux, false);
}

// -- Fonction d'affichage des noisettes
function afficher_noisettes($define, $flux, $ajax=true){
	$noisettes = explode(':', $define);
	foreach ($noisettes as $_fond) {
		if (find_in_path($_fond.'.html')) {
			$contexte = $ajax ? array_merge($flux['args'], array('ajax' => true)) : $flux['args'];
			$html = recuperer_fond($_fond, $contexte);
			$flux['data'] .= $html;
		}
		else
			$flux['data'] .= '<div class="noisette avertissement" style="margin-top: 0; font-size: 0.95em">' . _T('sarkaspip:msg_fichier_introuvable', array('fichier' => $_fond . '.html')) . '</div>';
	}
	return $flux;
}

?>
