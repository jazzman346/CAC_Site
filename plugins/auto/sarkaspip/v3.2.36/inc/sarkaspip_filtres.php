<?php
// =======================================================================================================================================
// Filtre : typo_couleur
// =======================================================================================================================================
// Auteur : Smellup, inspire du filtre original de A. Pierard
// Fonction : permettant de modifier la couleur du texte ou de l'introduction d'un article
// Utilisation :                  
// 	- pour le redacteur : [rouge]xxxxxx[/rouge]
// 	- pour le webmaster : [(#TEXTE|typo_couleur)]
// =======================================================================================================================================
//
function typo_couleur($texte) {

	// Variables personnalisables par l'utilisateur
	// --> Activation (oui) ou desactivation (non) de la fonction
	$typo_couleur_active = 'oui';
	// --> Nuances personnalisables par l'utilisateur
	$couleur = array(
		'noir' => "#000000",
		'blanc' => "#FFFFFF",
	    'rouge' => "#FF0000",
		'vert' => "#00FF00",
		'bleu' => "#0000FF",
		'jaune' => "#FFFF00",
		'gris' => "#808080",
		'marron' => "#800000",
		'violet' => "#800080",
		'rose' => "#FFC0CB",
		'orange' => "#FFA500"
	);

	$recherche = array(
		'noir' => "/(\[noir\])(.*?)(\[\/noir\])/",
		'blanc' => "/(\[blanc\])(.*?)(\[\/blanc\])/",
	    'rouge' => "/(\[rouge\])(.*?)(\[\/rouge\])/",
		'vert' => "/(\[vert\])(.*?)(\[\/vert\])/",
		'bleu' => "/(\[bleu\])(.*?)(\[\/bleu\])/",
		'jaune' => "/(\[jaune\])(.*?)(\[\/jaune\])/",
		'gris' => "/(\[gris\])(.*?)(\[\/gris\])/",
		'marron' => "/(\[marron\])(.*?)(\[\/marron\])/",
		'violet' => "/(\[violet\])(.*?)(\[\/violet\])/",
		'rose' => "/(\[rose\])(.*?)(\[\/rose\])/",
		'orange' => "/(\[orange\])(.*?)(\[\/orange\])/"
	);

	$remplace = array(
		'noir' => "<span style=\"color:".$couleur['noir'].";\">\\2</span>",
		'blanc' => "<span style=\"color:".$couleur['blanc'].";\">\\2</span>",
	    'rouge' => "<span style=\"color:".$couleur['rouge'].";\">\\2</span>",
		'vert' => "<span style=\"color:".$couleur['vert'].";\">\\2</span>",
		'bleu' => "<span style=\"color:".$couleur['bleu'].";\">\\2</span>",
		'jaune' => "<span style=\"color:".$couleur['jaune'].";\">\\2</span>",
		'gris' => "<span style=\"color:".$couleur['gris'].";\">\\2</span>",
		'marron' => "<span style=\"color:".$couleur['marron'].";\">\\2</span>",
		'violet' => "<span style=\"color:".$couleur['violet'].";\">\\2</span>",
		'rose' => "<span style=\"color:".$couleur['rose'].";\">\\2</span>",
		'orange' => "<span style=\"color:".$couleur['orange'].";\">\\2</span>"
	);

	$supprime = "\\2";


	if ($typo_couleur_active == 'non') {
		$texte = preg_replace($recherche, $supprime, $texte);
	}
	else {
		$texte = preg_replace($recherche, $remplace, $texte);
	}
	return $texte;
}

// =======================================================================================================================================
// Filtre : premier_jour_annee
// =======================================================================================================================================
// Auteur: Smellup
// Fonction : Retourne la date du premier jour de l'annee passe en argument
// =======================================================================================================================================
//
function premier_jour_annee($annee) {
	if (!$annee) return;
	
	$jour = date("Y-m-d H:i:s", mktime(0,0,0,1,1,$annee));
	return $jour;
}
// FIN du Filtre : premier_jour_annee

// =======================================================================================================================================
// Filtre : dernier_jour_annee
// =======================================================================================================================================
// Auteur: Smellup
// Fonction : Retourne la date du dernier jour de l'annee passe en argument
// =======================================================================================================================================
//
function dernier_jour_annee($annee) {
	if (!$annee) return;
	
	$jour = date("Y-m-d H:i:s", mktime(23,59,59,12,31,$annee));
	return $jour;
}
// FIN du Filtre : dernier_jour_annee

// =======================================================================================================================================
// Filtre : debut_journee
// =======================================================================================================================================
// Auteur: Smellup
// Fonction : Retourne la date-heure de debut de la journee passee en argument
// =======================================================================================================================================
//
function debut_journee($date) {
	if (!$date) return;
	
	$jour = date('d', strtotime($date));
	$mois = date('m', strtotime($date));
	$annee = date('Y', strtotime($date));
	$jour = date("Y-m-d H:i:s", mktime(0,0,0,$mois,$jour,$annee));
	return $jour;
}
// FIN du Filtre : debut_journee

// =======================================================================================================================================
// Filtre : fin_mois_precedent
// =======================================================================================================================================
// Auteur: Smellup
// Fonction : Calcul la date au format demande correspondant au dernier jour du mois precedent celui du timestamp en argument
// =======================================================================================================================================
//
function fin_mois_precedent($timestamp, $format) {
	if (!$timestamp) return;

	$date = mktime(0, 0, 0, date('m', $timestamp), 0, date('Y', $timestamp));
	return date($format, $date);
}
// FIN du Filtre : premier_jour_mois

// =======================================================================================================================================
// Filtre : fin_journee
// =======================================================================================================================================
// Auteur: Smellup
// Fonction : Retourne la date-heure de fin de la journee passee en argument
// =======================================================================================================================================
//
function fin_journee($date) {
	if (!$date) return;
	
	$jour = date('d', strtotime($date));
	$mois = date('m', strtotime($date));
	$annee = date('Y', strtotime($date));
	$jour = date("Y-m-d H:i:s", mktime(23,59,59,$mois,$jour,$annee));
	return $jour;
}
// FIN du Filtre : fin_journee

// =======================================================================================================================================
// Filtre : libelle_statut
// =======================================================================================================================================
// Auteur: Smellup
// Fonction : Retourne le libelle multilangue du statut d'un auteur
// =======================================================================================================================================
//
function libelle_statut($statut) {
	return _T('sarkaspip:statut_'.$statut);
}
// FIN du Filtre : libelle_statut

// =======================================================================================================================================
// Filtre : lister_fonds
// =======================================================================================================================================
// Auteur: Smellup
// Fonction : Retourne la chaine des options du select de la liste des fonds
// =======================================================================================================================================
//
function lister_fonds($bidon, $image, $suffixe){
	if (function_exists('lire_config'))
		$f_selected = lire_config('sarkaspip_styles/fond_'.$image.$suffixe);

	$dir = sous_repertoire(_DIR_TMP, 'fonds');
	$saves = preg_files($dir);
	$options = '<option value="">--</option>';
	foreach ($saves as $_fichier) {
		$nom = basename($_fichier);
		$selected = ($_fichier == $f_selected) ? ' selected="selected"' : ''; 
		$options .= '<option value="' . $_fichier . '"' . $selected . '>' . $nom . '</option>';
	}

	return $options;
}
// FIN du Filtre : lister_fonds

// =======================================================================================================================================
// Filtre : afaire_liste_par_jalon
// =======================================================================================================================================
// Auteur: Smellup
// Fonction : Retourne les blocs d'affichage des tickets par jalon dans la page afaire
// =======================================================================================================================================
//
function afaire_liste_par_jalon($jalons) {
	$page = NULL;
	if (($jalons) && defined('_SARKASPIP_AFAIRE_JALONS_AFFICHES')) {
		$liste = explode(":", $jalons);
		$i =0;
		foreach($liste as $_jalon) {
			$i += 1;
			$page .= recuperer_fond('noisettes/afaire/inc_afaire_jalon', 
				array('jalon' => $_jalon, 'ancre' => 'ancre_jalon_'.strval($i)));
		}
	}
	return $page;
}
// FIN du Filtre : afaire_liste_par_jalon

// =======================================================================================================================================
// Filtre : afaire_tdm_par_jalon
// =======================================================================================================================================
// Auteur: Smellup
// Fonction : Retourne les blocs d'affichage des tickets par jalon dans la page afaire
// =======================================================================================================================================
//
function afaire_tdm_par_jalon($jalons) {
	$page = NULL;
	if (($jalons) && defined('_SARKASPIP_AFAIRE_JALONS_AFFICHES')) {
		$liste = explode(":", $jalons);
		$i =0;
		foreach($liste as $_jalon) {
			$i += 1;
			$nb = afaire_compteur_jalon($_jalon);
			$nb_str = ($nb == 0) ? _T('sarkaspip:0_ticket') : (($nb == 1) ? strval($nb).' '._T('sarkaspip:1_ticket') : strval($nb).' '._T('sarkaspip:n_tickets'));
			$page .= '<li><a href="#ancre_jalon_'.strval($i).'" title="'._T('sarkaspip:afaire_aller_jalon').'">'
				._T('sarkaspip:afaire_colonne_jalon').'&nbsp;&#171;&nbsp;'.$_jalon.'&nbsp;&#187;, '.$nb_str
				.'</a></li>';
		}
	}
	$nb = afaire_compteur_jalon();
	if ($nb > 0) {
		$nb_str = ($nb == 1) ? strval($nb).' '._T('sarkaspip:1_ticket') : strval($nb).' '._T('sarkaspip:n_tickets');
		$page .= '<li><a href="#ancre_jalon_non_planifie" title="'._T('sarkaspip:afaire_aller_jalon').'">&#171;&nbsp;'
			._T('sarkaspip:afaire_non_planifies').'&nbsp;&#187;, '.$nb_str
			.'</a></li>';
	}
	return $page;
}
// FIN du Filtre : afaire_tdm_par_jalon

// =======================================================================================================================================
// Filtre : afaire_compteur_jalon
// =======================================================================================================================================
// Auteur: Smellup
// Fonction : Retourne le nombre de tickets pour le jalon ou pour le jalon et le statut choisis
// =======================================================================================================================================
//
function afaire_compteur_jalon($jalon='', $statut='') {
	$valeur = 0;
	// Nombre total de tickets pour le jalon
	$select = array('t1.id_ticket');
	$from = array('spip_tickets AS t1');
	$where = array('t1.jalon='.sql_quote($jalon));
	if ($statut)
		$where = array_merge($where, array('t1.statut='.sql_quote($statut)));
	$result = sql_select($select, $from, $where);
	$valeur = sql_count($result);
	return $valeur;
}
// FIN du Filtre : afaire_compteur_jalon

// =======================================================================================================================================
// Filtre : afaire_avancement_jalon
// =======================================================================================================================================
// Auteur: Smellup
// Fonction : Retourne le pourcetage de tickets termines sur le nombre de tickets total du jalon
// =======================================================================================================================================
//
function afaire_avancement_jalon($jalon='') {
	$valeur = 0;
	// Nombre total de tickets pour le jalon
	$select = array('t1.id_ticket');
	$from = array('spip_tickets AS t1');
	$where = array('t1.jalon='.sql_quote($jalon));
	$result = sql_select($select, $from, $where);
	$n1 = sql_count($result);
	// Nombre de tickets termines pour le jalon
	if ($n1 != 0) {
		$where = array_merge($where, array(sql_in('t1.statut', array('resolu','ferme'))));
		$result = sql_select($select, $from, $where);
		$n2 = sql_count($result);
		$valeur = floor($n2*100/$n1);
	}
	return $valeur;
}
// FIN du Filtre : afaire_avancement_jalon

// =======================================================================================================================================
// Filtre : afaire_ticket_existe
// =======================================================================================================================================
// Auteur: Smellup
// Fonction : Retourne l'info qu'au moins un ticket a ete cree
// =======================================================================================================================================
//
function afaire_ticket_existe($bidon) {
	$existe = false;
	// Test si la table existe
	$table = sql_showtable('spip_tickets', true);
	if ($table) {
		// Nombre total de tickets
		$from = array('spip_tickets AS t1');
		$where = array();
		$result = sql_countsel($from, $where);
		// Nombre de tickets termines pour le jalon
		if ($result >= 1)
			$existe = true;
	}
	return $existe;
}
// FIN du Filtre : afaire_ticket_existe

// =======================================================================================================================================
// Filtre : statut_forum
// =======================================================================================================================================
// Auteur: Smellup
// Fonction : Retourne le statut d'un forum cad non autorise, ouvert, ferme
// =======================================================================================================================================
//
function statut_forum($id_article) {

	$id = intval($id_article);
	$statut = 'non_autorise';

	// Forum active ou pas ?
	$accepter = 'non';
	$select = array('t1.accepter_forum');
	$from = array('spip_articles AS t1');
	$where = array('t1.id_article='.sql_quote($id));
	$result = sql_select($select, $from, $where);
	if ($row = sql_fetch($result)) 
		$accepter = $row['accepter_forum'];

	// Nombre messages de forum de l'article
	$from = array('spip_forum AS t1');
	$where = array('t1.id_objet='.sql_quote($id), 't1.objet='.sql_quote('article'));
	$nb = sql_countsel($from, $where);
	// Nombre de tickets termines pour le jalon
	if ($nb >= 1)
		$statut = ($accepter == 'non') ? 'ferme' : 'ouvert';
	else
		if ($accepter != 'non') $statut = 'ouvert';
	return $statut;
}
// FIN du Filtre : statut_forum

// =======================================================================================================================================
// Filtre : sauvegarder_fonds
// =======================================================================================================================================
// Auteur: Smellup
// Fonction : Cree les sauvegardes d'une liste de fonds suivant un format et dans un repertoire donne 
// =======================================================================================================================================
//
function sauvegarder_fonds($fonds, $ou, $mode='maintenance') {
	include_spip('inc/config');

	$dir = $ou;
	foreach ($fonds as $_fond) {
		if ($mode == 'maintenance') {
			$dir = sous_repertoire($ou, $_fond);
			$nom = $_fond . "_" . date("Ymd_Hi") . ".txt";
		}
		else {
			$nom = $_fond . ".txt";
		}
		$f = $dir . $nom;
		$ok = ecrire_fichier($f, serialize(lire_config($_fond)));
	}

	return $ok;
}
// FIN du Filtre : sauvegarder_fonds

// =======================================================================================================================================
// Filtre : restaurer_fonds
// =======================================================================================================================================
// Auteur: Smellup
// Fonction : Restaure les sauvegardes d'une liste de fonds suivant un format et dans un repertoire donne 
// =======================================================================================================================================
//
function restaurer_fonds($fichiers) {
	include_spip('inc/config');

	foreach ($fichiers as $_fichier) {
		lire_fichier($_fichier,$tableau);
		$fond = basename($_fichier, '.txt');
		$ok = ecrire_config($fond, $tableau);
	}

	return $ok;
}
// FIN du Filtre : restaurer_fonds

// =======================================================================================================================================
// Filtre : nettoyer_titre_sujet
// =======================================================================================================================================
// Auteur: Smellup 
// Fonction : Restaure le titre exact du sujet en supprimant le préfixe éventuel
// =======================================================================================================================================
//
function nettoyer_titre_sujet($titre, $resolu='') {
	$titre_nettoye = trim(preg_replace(',^\[(annonce|epingle)\](&nbsp;)*,UimsS', '', $titre));
	$titre_nettoye = trim(preg_replace(',_(verrouille|resolu)_,UimsS', '', $titre_nettoye));
	if ($resolu) $titre_nettoye = _T('sarkaspip:titre_sujet_resolu', array('titre' => $titre_nettoye)); 
	return $titre_nettoye;
}
// FIN du Filtre : nettoyer_titre_sujet



// =======================================================================================================================================
// Filtre : afficher_config
// =======================================================================================================================================
// Auteur: Smellup
// Fonction : Affiche la meta de configuration demandee sous un format lisible (remplace #CFG_ARBO)
// =======================================================================================================================================
//
function afficher_config($meta) {
	$texte ='';

	if (_SARKASPIP_DEBUG_CFG_ARBO == 'oui') {
		if ($meta) {
			include_spip('inc/config');
			$f = chercher_filtre('foreach');
			$config = $f(lire_config($meta));
			$texte = '<div id="bloc_debug">'
				   . '<p>Debug - Variables de configuration - Page ' . _T('sarkaspip:' . $meta) . '</p>'
				   . $config
				   . '</div>';
		}
	}

	return $texte;
}
// FIN du Filtre : afficher_config


function inscription_possible() {
	global $visiteur_session;

	// fournir le mode de la config ou tester si l'argument du formulaire est un mode accepte par celle-ci
	include_spip('inc/filtres');
	$mode = tester_config(0, '');

	// pas de formulaire si le mode est interdit
	if (!$mode)
		return false;

	// pas de formulaire si on a déjà une session avec un statut égal ou meilleur au mode
	if(isset($visiteur_session['statut']) && ($visiteur_session['statut'] <= $mode))
		return false;

	return true;
}


function abonnement_possible($plugin) {
	$retour = false;
	static $statuts_spipliste = array('liste','pub_jour','pub_hebdo','pub_7jours','pub_mensul','pub_mois','pub_an');

	$informer = chercher_filtre('info_plugin');
	$plugin_actif = ($informer($plugin, 'est_actif') == 1);

	if ($plugin_actif) {
		if (strtolower($plugin) == 'spiplistes') {
			$nb_listes = sql_countsel('spip_listes', array(sql_in('statut', $statuts_spipliste)));
			if ($nb_listes > 0)
				$retour = true;
		}
		else if (strtolower($plugin) == 'abomailmans') {
			$nb_listes = sql_countsel('spip_abomailmans', array('desactive=' . sql_quote('0')));
			if ($nb_listes > 0)
				$retour = true;
		}
		else if (strtolower($plugin) == 'mailsubscribers') {
			$retour = true;
		}
	}

	return $retour;
}

function ajuster_couleur_input($couleur, $type) {
	include_spip('filtres/couleurs');
	$transparent = ($type == 'background') ? '#ffffff' : '#000000';
	if (strtolower($couleur) == 'transparent')
		$couleur_calculee = $transparent;
	else
		if ($type == 'color')
			$couleur_calculee = '#' . couleur_extreme(couleur_inverser($couleur));
		else
			$couleur_calculee = $couleur;

	return $couleur_calculee;
}

// =======================================================================================================================================
// Filtres : module AGENDA
// =======================================================================================================================================
// Auteur: Smellup
// Fonction : regroupe les filtres permettant les affichages de l'agenda
// =======================================================================================================================================
//
include_spip('inc/sarkaspip_filtres_agenda');


?>
