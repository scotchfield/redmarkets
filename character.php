<?php

function choose( $obj ) {
	return $obj[ rand( 0, sizeof( $obj ) - 1 ) ];
}

$taker = array(
	'name' => '',
	'crew' => '',
	'weak_spot' => '',
	'soft_spot' => '',
	'tough_spot' => '',
	'potential' => array(
		'str' => 1, 'spd' => 1, 'adp' => 1,
		'int' => 1, 'cha' => 1, 'wil' => 1,
	),
	'skills' => array(
		'unarmed' => 1,
		'melee' => 1,
		'resistance' => 1,
		'shoot' => 1,
		'stealth' => 1,
		'athletics' => 1,
		'awareness' => 1,
		'self-control' => 1,
		'scavenging' => 1,
		'drive' => 1,
		'criminality' => 1,
		'foresight' => 1,
		'research' => 1,
		'mechanics' => 1,
		'firstaid' => 1,
		'profession' => 1,
		'networking' => 1,
		'persuasion' => 1,
		'sensitivity' => 1,
		'deception' => 1,
		'intimidation' => 1,
		'leadership' => 1,
	),
	'dependants' => array(),
);

$first_names = file( 'firstnames.txt' );
$last_names = file( 'lastnames.txt' );
$disadvantages = file( 'disadvantages.txt' );
$convictions = file( 'convictions.txt' );
$toughspots = file( 'toughspots.txt' );

$taker['name'] = choose( $first_names ) . ' ' . choose( $last_names );
$taker['weak_spot'] = choose( $disadvantages );
$taker['soft_spot'] = choose( $convictions );
$taker['tough_spot'] = choose( $toughspots );

?>
<html>
<head>
	<title>Red Markets: Character Generator</title>

<style type="text/css">
tr, td {
	vertical-align: top;
}
td.title {
	font-weight: 700;
}
table.stagger tr:nth-child(odd) {
	background-color: #f3f7e0;
}
table.stagger_skill tr:nth-child(odd) td.skill {
	background-color: #f3f7e0;
}
</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

</head>
<body>

<h1>RED MARKETS</h1>

<table class="table stagger">
	<tr>
		<td class="title">Taker</td>
		<td><?php echo $taker['name']; ?></td>
	</tr>
	<tr>
		<td class="title">Crew</td>
		<td><?php echo $taker['crew']; ?></td>
	</tr>
	<tr>
		<td class="title">Weak Spot</td>
		<td><?php echo $taker['weak_spot']; ?></td>
	</tr>
	<tr>
		<td class="title">Soft Spot</td>
		<td><?php echo $taker['soft_spot']; ?></td>
	</tr>
	<tr>
		<td class="title">Tough Spot</td>
		<td><?php echo $taker['tough_spot']; ?></td>
	</tr>
</table>

<table class="table stagger_skill">
	<tr>
		<td rowspan="3">STR: <?php echo $taker['potential']['str']; ?></td>
		<td class="skill">Unarmed: <?php echo $taker['skills']['unarmed']; ?></td>
	</tr>
	<tr>
		<td class="skill">Melee: <?php echo $taker['skills']['melee']; ?></td>
	</tr>
	<tr>
		<td class="skill">Resistance: <?php echo $taker['skills']['resistance']; ?></td>
	</tr>

	<tr>
		<td rowspan="3">SPD: <?php echo $taker['potential']['spd']; ?></td>
		<td class="skill">Shoot: <?php echo $taker['skills']['shoot']; ?></td>
	</tr>
	<tr>
		<td class="skill">Stealth: <?php echo $taker['skills']['stealth']; ?></td>
	</tr>
	<tr>
		<td class="skill">Athletics: <?php echo $taker['skills']['athletics']; ?></td>
	</tr>

	<tr>
		<td rowspan="5">ADP: <?php echo $taker['potential']['adp']; ?></td>
		<td class="skill">Awareness: <?php echo $taker['skills']['awareness']; ?></td>
	</tr>
	<tr>
		<td class="skill">Self-Control: <?php echo $taker['skills']['self-control']; ?></td>
	</tr>
	<tr>
		<td class="skill">Scavenging: <?php echo $taker['skills']['scavenging']; ?></td>
	</tr>
	<tr>
		<td class="skill">Drive: <?php echo $taker['skills']['drive']; ?></td>
	</tr>
	<tr>
		<td class="skill">Criminality: <?php echo $taker['skills']['criminality']; ?></td>
	</tr>

	<tr>
		<td rowspan="5">INT: <?php echo $taker['potential']['int']; ?></td>
		<td class="skill">Foresight: <?php echo $taker['skills']['foresight']; ?></td>
	</tr>
	<tr>
		<td class="skill">Research: <?php echo $taker['skills']['research']; ?></td>
	</tr>
	<tr>
		<td class="skill">Mechanics: <?php echo $taker['skills']['mechanics']; ?></td>
	</tr>
	<tr>
		<td class="skill">First Aid: <?php echo $taker['skills']['firstaid']; ?></td>
	</tr>
	<tr>
		<td class="skill">Profession: <?php echo $taker['skills']['profession']; ?></td>
	</tr>

	<tr>
		<td rowspan="6">CHA: <?php echo $taker['potential']['cha']; ?></td>
		<td class="skill">Networking: <?php echo $taker['skills']['networking']; ?></td>
	</tr>
	<tr>
		<td class="skill">Persuasion: <?php echo $taker['skills']['persuasion']; ?></td>
	</tr>
	<tr>
		<td class="skill">Sensitivity: <?php echo $taker['skills']['sensitivity']; ?></td>
	</tr>
	<tr>
		<td class="skill">Deception: <?php echo $taker['skills']['deception']; ?></td>
	</tr>
	<tr>
		<td class="skill">Intimidation: <?php echo $taker['skills']['intimidation']; ?></td>
	</tr>
	<tr>
		<td class="skill">Leadership: <?php echo $taker['skills']['leadership']; ?></td>
	</tr>

	<tr>
		<td>WIL: <?php echo $taker['potential']['wil']; ?></td>
		<td class="skill">&nbsp;</td>
	</tr>
</table>

<table class="table stagger">
	<tr>
		<th colspan="4">Dependants</th>
	</tr>
	<tr>
		<td>
	<tr>
		<td class="title">Taker</td>
		<td><?php echo $taker['name']; ?></td>
	</tr>


</body>
</html>