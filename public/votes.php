<?php

require dirname(__DIR__).'/src/votes.php';

# Votes controller (this file)
# Route: /votes?color=$1
#
# If multiple colors are provided, the result depends on how PHP
# parses the URL query string.
#
# (1)  ?color=Red                   << the intended format
# (2)  ?color=Red&Color=Blue
# (3)  ?color=Red,Blue

$result = all_city_votes_for_color( $_GET['color'] );

print( json_encode($result) );