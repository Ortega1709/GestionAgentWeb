<?php 

	require("../models/ConnexionDatabase.php");
	require("../models/Evaluation.php");
	require("../models/Agent.php");

	$result = evaluations($connection);
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title></title>
	<meta name="generator" content="LibreOffice 7.2.3.2 (Linux)"/>
	<meta name="created" content="2022-04-05T15:23:47.110077747"/>
	<meta name="changed" content="2022-04-05T18:01:25.833456572"/>
	<style type="text/css">
		@page { margin-left: 1cm; margin-right: 1cm; margin-top: .20cm; margin-bottom: .10cm }
		p { line-height: 115%; margin-bottom: 0.20cm; background: transparent }
		td p { line-height: 115%; orphans: 0; widows: 0; margin-bottom: 0.25cm; background: transparent }
	</style>
</head>
<?php  while($lignes = $result->fetch_array()) {
	$result1 = rechercherAgent($lignes['idAgent'], $connection);
	$lignes1 = $result1->fetch_array();
?>
<body lang="fr-FR" dir="ltr"><p align="center" style="line-height: 100%; margin-bottom: 0cm">
<br/>

</p>
<p align="center" style="line-height: 100%; margin-bottom: 0cm"><font color="#3465a4"><font size="4" style="font-size: 18pt"><u><b>
	RÉSULTAT DE L'ÉVALUATION N°: <?=$lignes['id']; ?></b></u></font></font></p>

<p align="center" style="line-height: 100%; margin-bottom: 0cm"><br/>

</p>
<p align="left" style="line-height: 100%; margin-bottom: 0cm"><font color="#3465a4"><font size="4" style="font-size: 17pt"><u><b>Informations</b></u></font></font></p>
<p align="left" style="line-height: 100%; margin-bottom: 0cm"><br/>

</p>

<p align="left" style="line-height: 100%; margin-bottom: 0cm; text-decoration: none">
<font size="3" style="font-size: 14pt"><b>N°: </b><?=$lignes['idAgent']; ?></font>
</p>

<p align="left" style="line-height: 100%; margin-bottom: 0cm; text-decoration: none">
<font size="3" style="font-size: 14pt"><b>Nom Complet: </b><?=$lignes1['nom']."-".$lignes1['postNom']."-".$lignes1['prenom']; ?></font></p>

<p align="left" style="line-height: 100%; margin-bottom: 0cm; text-decoration: none">
<font size="3" style="font-size: 14pt"><b>Adresse: </b><?=$lignes1['adresse']; ?></font></p>

<p align="left" style="line-height: 100%; margin-bottom: 0cm; text-decoration: none">
<font size="3" style="font-size: 14pt"><b>E-mail: </b><?=$lignes1['email']; ?></font></p>

<p align="left" style="line-height: 100%; margin-bottom: 0cm; text-decoration: none">
<font size="3" style="font-size: 14pt"><b>Fonction: </b><?=$lignes1['fonction']; ?></font></p>

<p align="left" style="line-height: 100%; margin-bottom: 0cm; text-decoration: none">
<font size="3" style="font-size: 14pt"><b>Téléphone: </b><?=$lignes1['telephone']; ?></font></p>

<p align="left" style="line-height: 100%; margin-bottom: 0cm; text-decoration: none">
<font size="3" style="font-size: 14pt"><b>Date de Naissance: </b><?=$lignes1['dateNaissance']; ?></font></p>

<p align="left" style="line-height: 100%; margin-bottom: 0cm"><br/>
</p>

<p align="left" style="line-height: 100%; margin-bottom: 0cm"><font color="#3465a4"><font size="5" style="font-size: 18pt"><u><b>Évaluations</b></u></font></font></p>
<p align="left" style="line-height: 100%; margin-bottom: 0cm"><br/>

</p>
<p align="left" style="line-height: 100%; margin-bottom: 0cm"><br/>

</p>
<table width="100%" cellpadding="2" cellspacing="0" style="background: transparent; page-break-inside: auto">
	<col width="128*"/>

	<col width="128*"/>

	<tr style="background: transparent" valign="top">
		<td width="50%" style="background: transparent; border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm"><p align="left" style="font-variant: normal; font-style: normal; text-decoration: none">
			<font color="#000000"><font face="Liberation Serif, serif"><font size="3" style="font-size: 14pt"><b>Motif</b></font></font></font></p>
		</td>
		<td width="50%" style="background: transparent; border: 1px solid #000000; padding: 0.1cm"><p align="left" style="font-variant: normal; font-style: normal; text-decoration: none">
			<font color="#000000"><font face="Liberation Serif, serif"><font size="3" style="font-size: 14pt"><b>Mention</b></font></font></font></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="50%" style="background: transparent; border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm"><p align="left" style="font-variant: normal; font-style: normal; text-decoration: none">
			<font color="#000000"><font face="Liberation Serif, serif"><font size="3" style="font-size: 14pt"><b>Quantité
			de travail</b></font></font></font></p>
		</td>
		<td width="50%" style="background: transparent; border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm" sdnum="1036;0;#&nbsp;##0,00 [$€-40C];[RED]-#&nbsp;##0,00 [$€-40C]"><p align="left">
			<br/>
				<?=$lignes['quantiteTravail']; ?>
			</p>
		</td>
	</tr>
	<tr valign="top">
		<td width="50%" style="background: transparent; border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm"><p align="left" style="font-variant: normal; font-style: normal; text-decoration: none">
			<font color="#000000"><font face="Liberation Serif, serif"><font size="4" style="font-size: 14pt"><b>Qualité
			de travail</b></font></font></font></p>
		</td>
		<td width="50%" style="background: transparent; border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm" sdnum="1036;0;#&nbsp;##0,00 [$€-40C];[RED]-#&nbsp;##0,00 [$€-40C]"><p align="left">
			<br/>
				<?=$lignes['qualiteTravail']; ?>
			</p>
		</td>
	</tr>
	<tr valign="top">
		<td width="50%" style="background: transparent; border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm"><p align="left" style="font-variant: normal; font-style: normal; text-decoration: none">
			<font color="#000000"><font face="Liberation Serif, serif"><font size="4" style="font-size: 14pt"><b>Autonomie
			de travail</b></font></font></font></p>
		</td>
		<td width="50%" style="background: transparent; border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm" sdnum="1036;0;#&nbsp;##0,00 [$€-40C];[RED]-#&nbsp;##0,00 [$€-40C]"><p align="left">
			<br/>
				<?=$lignes['autonomie']; ?>
			</p>
		</td>
	</tr>
	<tr valign="top">
		<td width="50%" style="background: transparent; border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm"><p align="left" style="font-variant: normal; font-style: normal; text-decoration: none">
			<font color="#000000"><font face="Liberation Serif, serif"><font size="4" style="font-size: 14pt"><b>Motivation
			de travail</b></font></font></font></p>
		</td>
		<td width="50%" style="background: transparent; border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm" sdnum="1036;0;#&nbsp;##0,00 [$€-40C];[RED]-#&nbsp;##0,00 [$€-40C]"><p align="left">
			<br/>
				<?=$lignes['motivation']; ?>
			</p>
		</td>
	</tr>
	<tr valign="top">
		<td width="50%" style="background: transparent; border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm"><p align="left" style="font-variant: normal; font-style: normal; text-decoration: none">
			<font color="#000000"><font face="Liberation Serif, serif"><font size="4" style="font-size: 14pt"><b>Prise
			d’initiative</b></font></font></font></p>
		</td>
		<td width="50%" style="background: transparent; border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm" sdnum="1036;0;#&nbsp;##0,00 [$€-40C];[RED]-#&nbsp;##0,00 [$€-40C]"><p align="left">
			<br/>
				<?=$lignes['priseInitiative']; ?>
			</p>
		</td>
	</tr>
	<tr valign="top">
		<td width="50%" style="background: transparent; border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm"><p align="left" style="font-variant: normal; font-style: normal; text-decoration: none">
			<font color="#000000"><font face="Liberation Serif, serif"><font size="4" style="font-size: 14pt"><b>Relation
			</b></font></font></font>
			</p>
		</td>
		<td width="50%" style="background: transparent; border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm" sdnum="1036;0;#&nbsp;##0,00 [$€-40C];[RED]-#&nbsp;##0,00 [$€-40C]"><p align="left">
			<br/>
				<?=$lignes['relation']; ?>
			</p>
		</td>
	</tr>
</table>
<p></p>


<p align="right"><font size="4" style="font-size: 14pt"><b>Évaluateur:</b>
	<?=$lignes['nomDrh']; ?>
</font></p>
<p align="right"><font size="4" style="font-size: 14pt"><b>Date
d’évaluation:</b>
	<?=$lignes['dateEvaluation']; ?>
</font></p>
</body>
<?php } ?>
</html>