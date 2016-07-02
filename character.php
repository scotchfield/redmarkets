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
		'unarmed'		=> array( 'str', 0 ),
		'melee'			=> array( 'str', 0 ),
		'resistance'	=> array( 'str', 0 ),
		'shoot'			=> array( 'spd', 0 ),
		'stealth'		=> array( 'spd', 0 ),
		'athletics'		=> array( 'spd', 0 ),
		'awareness'		=> array( 'adp', 0 ),
		'self-control'	=> array( 'adp', 0 ),
		'scavenging'	=> array( 'adp', 0 ),
		'drive'			=> array( 'adp', 0 ),
		'criminality'	=> array( 'adp', 0 ),
		'foresight'		=> array( 'int', 0 ),
		'research'		=> array( 'int', 0 ),
		'mechanics'		=> array( 'int', 0 ),
		'firstaid'		=> array( 'int', 0 ),
		'profession'	=> array( 'int', 0 ),
		'networking'	=> array( 'cha', 0 ),
		'persuasion'	=> array( 'cha', 0 ),
		'sensitivity'	=> array( 'cha', 0 ),
		'deception'		=> array( 'cha', 0 ),
		'intimidation'	=> array( 'cha', 0 ),
		'leadership'	=> array( 'cha', 0 ),
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

for ( $i = 0; $i < 5; $i += 1 ) {
	$pot = choose( array_keys( $taker[ 'potential' ] ) );
	$taker[ 'potential' ][ $pot ] += 1;
}

$i = 0;
$skill_spend = 20;
while ( $i < $skill_spend ) {
	$key = choose( array_keys( $taker[ 'skills' ] ) );
	$skill = $taker[ 'skills' ][ $key ];
	$n = $skill[ 1 ] + 1;

	if ( $taker[ 'potential' ][ $skill[ 0 ] ] < $n ) {
		continue;
	}

	$cost = ( $n * ( $n + 1 ) ) / 2;

	if ( $i + $cost > $skill_spend ) {
		continue;
	}

	$taker[ 'skills' ][ $key ][ 1 ] += 1;

	if ( $cost < 1 ) {
		$cost = 1;
	}

	$i += $cost;
}

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
		<td class="skill">Unarmed: <?php echo $taker['skills']['unarmed'][1]; ?></td>
	</tr>
	<tr>
		<td class="skill">Melee: <?php echo $taker['skills']['melee'][1]; ?></td>
	</tr>
	<tr>
		<td class="skill">Resistance: <?php echo $taker['skills']['resistance'][1]; ?></td>
	</tr>

	<tr>
		<td rowspan="3">SPD: <?php echo $taker['potential']['spd']; ?></td>
		<td class="skill">Shoot: <?php echo $taker['skills']['shoot'][1]; ?></td>
	</tr>
	<tr>
		<td class="skill">Stealth: <?php echo $taker['skills']['stealth'][1]; ?></td>
	</tr>
	<tr>
		<td class="skill">Athletics: <?php echo $taker['skills']['athletics'][1]; ?></td>
	</tr>

	<tr>
		<td rowspan="5">ADP: <?php echo $taker['potential']['adp']; ?></td>
		<td class="skill">Awareness: <?php echo $taker['skills']['awareness'][1]; ?></td>
	</tr>
	<tr>
		<td class="skill">Self-Control: <?php echo $taker['skills']['self-control'][1]; ?></td>
	</tr>
	<tr>
		<td class="skill">Scavenging: <?php echo $taker['skills']['scavenging'][1]; ?></td>
	</tr>
	<tr>
		<td class="skill">Drive: <?php echo $taker['skills']['drive'][1]; ?></td>
	</tr>
	<tr>
		<td class="skill">Criminality: <?php echo $taker['skills']['criminality'][1]; ?></td>
	</tr>

	<tr>
		<td rowspan="5">INT: <?php echo $taker['potential']['int']; ?></td>
		<td class="skill">Foresight: <?php echo $taker['skills']['foresight'][1]; ?></td>
	</tr>
	<tr>
		<td class="skill">Research: <?php echo $taker['skills']['research'][1]; ?></td>
	</tr>
	<tr>
		<td class="skill">Mechanics: <?php echo $taker['skills']['mechanics'][1]; ?></td>
	</tr>
	<tr>
		<td class="skill">First Aid: <?php echo $taker['skills']['firstaid'][1]; ?></td>
	</tr>
	<tr>
		<td class="skill">Profession: <?php echo $taker['skills']['profession'][1]; ?></td>
	</tr>

	<tr>
		<td rowspan="6">CHA: <?php echo $taker['potential']['cha']; ?></td>
		<td class="skill">Networking: <?php echo $taker['skills']['networking'][1]; ?></td>
	</tr>
	<tr>
		<td class="skill">Persuasion: <?php echo $taker['skills']['persuasion'][1]; ?></td>
	</tr>
	<tr>
		<td class="skill">Sensitivity: <?php echo $taker['skills']['sensitivity'][1]; ?></td>
	</tr>
	<tr>
		<td class="skill">Deception: <?php echo $taker['skills']['deception'][1]; ?></td>
	</tr>
	<tr>
		<td class="skill">Intimidation: <?php echo $taker['skills']['intimidation'][1]; ?></td>
	</tr>
	<tr>
		<td class="skill">Leadership: <?php echo $taker['skills']['leadership'][1]; ?></td>
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