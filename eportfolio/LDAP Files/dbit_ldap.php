<?php
/*
	dbit_ldap.php
	LDAP authentication module for DBIT's LDAP infrastructure.

	Written by K. Sreepathi Pai. This file is in the public domain.
	No copyrights are asserted by the author over this work.

	REQUIRED CONSTANTS:
		LDAP_SERVER	=> 10.0.1.3
		LDAP_START_TLS => true
		LDAP_BASE_DN => dc=dbit,dc=in
*/

define('LDAP_SERVER', '10.0.1.3');
define('LDAP_START_TLS', true);
define('LDAP_BASE_DN', 'dc=dbit,dc=in');


$DBIT_LDAP_CONTAINERS = array("dc=dbit,dc=in",
	"ou=Staff,dc=dbit,dc=in",
	"ou=CE,dc=dbit,dc=in",
	"ou=BE,dc=dbit,dc=in",
	"ou=IT,dc=dbit,dc=in",
	"ou=EXTC,dc=dbit,dc=in"
);

$LDAP_CONTAINERS = &$DBIT_LDAP_CONTAINERS;

// authenticate a full DN, e.g. uid=username,dc=dbit,dc=in
// Fastest function.
function dldap_auth_dn($dn, $password)
{
	$ret = false;

	$lc = ldap_connect(LDAP_SERVER);
	if($lc)
		{
			if(LDAP_START_TLS) ldap_start_tls($lc);
		
			$ret = @ ldap_bind($lc, $dn, $password);

			ldap_close($lc);
		}

	return $ret;
}

// authenticate a partial DN which may be present in one of the LDAP
// containers. e.g. uid=username OR cn=XYZ
// Better than dldap_auth_search()
function dldap_auth_containers($uid_dn, $password, &$fdn)
{
	global $LDAP_CONTAINERS;

	$ret = false;

	$lc = ldap_connect(LDAP_SERVER);
	if($lc)
		{
			if(LDAP_START_TLS) ldap_start_tls($lc);

			//TODO: Check if multiple binds are okay over the same
			//connection.
			foreach($LDAP_CONTAINERS as $rdn)
	{
		if($ret = @ ldap_bind($lc, $uid_dn . "," . $rdn, $password))
			{
				$fdn = $uid_dn . "," . $rdn;
				break;
			}
	}

			ldap_close($lc);
		}

	return $ret;
}

// Given a username (e.g. uid=username), search for that in the entire
// LDAP tree, and obtain the DN. Then bind to that DN. Slowest
// function.
function dldap_auth_search($uid_dn, $password, &$fdn)
{
	$ret = false;

	$lc = ldap_connect(LDAP_SERVER);
	if($lc)
		{
		
			if(LDAP_START_TLS) ldap_start_tls($lc);
			
			$fdn = _dldap_search_uid($lc, $uid_dn);
			
			if($fdn)
			{
			$ret = @ldap_bind($lc, $fdn, $password);
			}
			ldap_close($lc);
		}

	return $ret;
}


// returns an keyed array of cn, displayName and ou attributes. Also
// returns a pseudo-attribute _NAME that identifies the object.
function dldap_read_details($fdn, $password)
{
	$lc = ldap_connect(LDAP_SERVER);
	$out = array();

	if($lc)
		{
			if(LDAP_START_TLS) ldap_start_tls($lc);

			if(@ldap_bind($lc, $fdn, $password))
	{
		// Injection vuln
		$sr = ldap_search($lc, $fdn, "(&(objectClass=*))");

		$entry = ldap_first_entry($lc, $sr);
		if($entry)
			{
				$dn = ldap_get_dn($lc, $entry);

				$temp = @ ldap_get_values($lc, $entry, "cn");
				$out['cn'] = $temp;

				$temp = @ ldap_get_values($lc, $entry, "ou");
				$out['ou'] = $temp;

				$temp = @ ldap_get_values($lc, $entry, "displayName");
				$out['displayName'] = $temp[0];

				if($out['displayName'])
		$out['_NAME'] = $out['displayName'];
				else
		$out['_NAME'] = $out['cn'][0];
			}
	}
			else
	return false;

			ldap_close($lc);
		}
	else
		return false;

	return $out;
}

// returns the full DN (uid=user,dc=Staff,dc=dbit,dc=in)
// for a given partial DN (uid=user)
function _dldap_search_uid($lc, $uid_dn)
{
	$dn = "";

	if(ldap_bind($lc))
		{
			// Injection vuln
			$sr = ldap_search($lc, LDAP_BASE_DN,
			"(&(objectClass=*)($uid_dn))", array("dn"));

			$entry = ldap_first_entry($lc, $sr);
			if($entry)
				$dn = ldap_get_dn($lc, $entry);
		}

	return $dn;
}

/*
	auth_ldap.php
	Authentication module for centralized LDAP authentication.

	Copyright (C) 2005 K. Sreepathi Pai
	Licensed under the GNU GPL. See the file COPYING for details.
*/
function auth_auth($username, $password, &$user)
{

	//TODO: Change to searching containers only

	if(dldap_auth_search("uid=$username", $password, $fdn))
		{
		
			$details = dldap_read_details($fdn, $password);
			
			$user['name'] = $details['_NAME'];
			$user['fdn'] = $fdn;

			return true;
		}

	return false;
}

?>
