<?php
// Supprimer systematiquement les numeros des titres et noms
$GLOBALS['table_des_traitements']['TITRE'][]= 'typo(supprimer_numero(%s), "TYPO", $connect)';
$GLOBALS['table_des_traitements']['NOM'][]= 'typo(supprimer_numero(%s), "TYPO", $connect)';

// Liste des rubriques specialisees standard du squelette
// Pour ajouter des rubriques perso, definir de la meme facon les constantes _PERSO_XXX
// dans le fichier mes_options.php
define('_SARKASPIP_MOT_SECTEURS_SPECIALISES', 'agenda:galerie:squelette:forum');
define('_SARKASPIP_TYPE_SECTEURS_SPECIALISES', 'config:config:config:config');
define('_SARKASPIP_FOND_SECTEURS_SPECIALISES', 'sarkaspip_agenda:sarkaspip_galerie:sarkaspip_accueil:sarkaspip_forum');

// Modes de debug du squelette
define('_SARKASPIP_DEBUG_CSS', 'non');
define('_SARKASPIP_DEBUG_CFG_ARBO', 'non');
define('_SARKASPIP_DEBUG_CFG_BOUTON', 'non');
define('_SARKASPIP_DEBUG_CFG_FONDS', 'non');

// Liste des pages de configuration dans l'ordre de presentation
define('_SARKASPIP_PAGES_CONFIG', 'accueil:header:plugins:backend:layout:bandeau:pied:noisettes:menus:sommaire:rubrique:article:auteur:breve:site:forum:agenda:herbier:galerie:album:plan:formulaires:recherche:styles:coins:modeles:maintenance');

// Liste des donnees de configuration du squelette non CFG
// -- Pour les meta
define('_SARKASPIP_CONFIG_INTRO_META', 150);
// -- Pour les documents joints et portfolio d'images
define('_SARKASPIP_CONFIG_LARGEUR_DOCUMENT', 115);
define('_SARKASPIP_CONFIG_LARGEUR_IMAGE', 115);
define('_SARKASPIP_CONFIG_TAILLE_TITRE_DOCUMENT', 50);
define('_SARKASPIP_CONFIG_TAILLE_TITRE_IMAGE', 50);
define('_SARKASPIP_CONFIG_TAILLE_DESCR_DOCUMENT', 100);
define('_SARKASPIP_CONFIG_TAILLE_DESCR_IMAGE', 100);
// -- Pour les modeles d'inscrustation de documents et d'images
define('_SARKASPIP_CONFIG_IMG_TAILLE_MAX_EMBED', 500);
define('_SARKASPIP_CONFIG_DOC_LARGEUR_MIN', 120);
define('_SARKASPIP_CONFIG_DOC_LARGEUR_MAX', 350);
// -- Pour les vignettes de la galerie et des albums
define('_SARKASPIP_CONFIG_LARGEUR_GALERIE', 80);
define('_SARKASPIP_CONFIG_TAILLE_MAX_VIGNETTE_1', 80);
define('_SARKASPIP_CONFIG_TAILLE_MAX_VIGNETTE_2', 40);
define('_SARKASPIP_CONFIG_TAILLE_MAX_VIGNETTE_3', 100);
define('_SARKASPIP_CONFIG_TAILLE_MAX_VIGNETTE_4', 120);
define('_SARKASPIP_CONFIG_TAILLE_MAX_PHOTO', 400);
// -- Pour les icones de rainette
define('_SARKASPIP_CONFIG_LARGEUR_ICONE_METEO', 80);
// -- Pour le contact du site
define('_SARKASPIP_CONFIG_AUTORISATION_CONTACT', '0minirezo');
// -- Pour la fenetre de dialgue utilisant le plugin SHOUTBOX
define('_SARKASPIP_CONFIG_SHOUTBOX_PAGE', 'dialogue');
define('_SARKASPIP_CONFIG_SHOUTBOX_TAILLE', 50);
// -- Pour le chemin du bandeau
define('_SARKASPIP_CONFIG_SYMBOLE_CHEMIN', '&gt;');
// -- Pour la pagination
define('_SARKASPIP_CONFIG_SYMBOLE_PAGINATION', '&nbsp;|&nbsp;');
// -- Pour l'agenda
define('_SARKASPIP_CONFIG_AGENDA_ANCRE_PAGINATION', 'evenement');
define('_SARKASPIP_CONFIG_AGENDA_SYMBOLE_SUIVANT', '&gt;&gt;');
define('_SARKASPIP_CONFIG_AGENDA_SYMBOLE_PRECEDENT', '&lt;&lt;');
// -- Pour la page afaire (plugin Tickets)
define('_SARKASPIP_AFAIRE_JALONS_AFFICHES', '');
define('_SARKASPIP_AFAIRE_ID_ARTICLE', '0');
define('_SARKASPIP_AFAIRE_TAILLE_LOGO', '150');
// Configuration minimale des plugins utilises par le squelette
// -- Plugin BOUTONS TEXTE
define('_SARKASPIP_CONFIG_BOUTONSTEXTE_SELECTOR', '#wrapper');
define('_SARKASPIP_CONFIG_BOUTONSTEXTE_TXTONLY', '_');
// -- Plugin MEDIABOX
define('_SARKASPIP_CONFIG_MEDIABOX_ACTIF', 'oui');
define('_SARKASPIP_CONFIG_MEDIABOX_TOUT', 'non');
define('_SARKASPIP_CONFIG_MEDIABOX_IMAGE', '.mediabox');
define('_SARKASPIP_CONFIG_MEDIABOX_GALERIE', '.galerie .mediabox');
define('_SARKASPIP_CONFIG_MEDIABOX_SKIN', 'white-shadow');
// -- Plugin SOCIALTAGS
define('_SARKASPIP_CONFIG_SOCIALTAGS_SELECTOR', '#socialtags');
define('_SARKASPIP_CONFIG_SOCIALTAGS_TAGS', 'delicious:facebook:google:netvibes');
// -- Plugin ZEN GARDEN
// --- Filtrer les thèmes pour obtenir que ceux de Sarka-SPIP
define('_ZENGARDEN_FILTRE_THEMES', 'sarkaspip');

?>
