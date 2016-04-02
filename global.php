<?php

function datalink ( ) {
	$link = mysql_connect( 'localhost', 'root', 'vertrigo' );
	if ( !$link ) {
		die( 'Could not connect: ' . mysql_error( ) );
	}
	$db =mysql_select_db( 'prague college', $link);
	if ( !$db ) {
		die( 'No such database: ' . mysql_error( ) );
	}
}
?>