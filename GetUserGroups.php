<?php

if( !defined( 'MEDIAWIKI' ) ) die();

// Register file with magic word
$wgExtensionMessagesFiles['GetUserGroups'] = dirname(__FILE__) . '/GetUserGroups.i18n.magic.php';

// Assign value/function to variable
$wgHooks['ParserGetVariableValueSwitch'][] = 'efGetUserGroups';

function efGetUserGroups( &$parser, &$cache, &$magicWordId, &$ret ) {
	if( 'get_user_groups' == $magicWordId ) {
		global $wgUser;
		$ret = implode(',', $wgUser->getGroups());
	}

	return true;
}

// Register custom variable 
$wgExtensionCredits['variable'][] = array(
	'name' => 'GetUserGroups',
	'author' => 'Matt Yeh',
	'version' => '0.1',
	'description' => 'Use {{USERGROUPS}} to list groups to which user belongs',
);

// Register wiki markup word as a variable
$wgHooks['MagicWordwgVariableIDs'][] = 'efRegisterVariable';

function efRegisterVariable( &$customVariableIds ) {
	$customVariableIds[] = 'get_user_groups';

	return true;
}
