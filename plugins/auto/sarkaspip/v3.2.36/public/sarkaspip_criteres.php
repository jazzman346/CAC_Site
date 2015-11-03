<?php
// =======================================================================================================================================
// Critere : tout_voir
// =======================================================================================================================================
// Auteur: SarkASmeL
// Fonction : permet d'éviter une erreur quand le plugin ACCES RESTREINT n'est pas actif. Le critère ne fait rien
// =======================================================================================================================================
//
if (!defined('_DIR_PLUGIN_ACCESRESTREINT')) {
	function critere_tout_voir($idb, &$boucles, $crit) {
		return NULL;
	}
}
?>