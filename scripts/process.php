<?php
	exec("ldapsearch -h ldap.mit.edu -p 389 -u -b 'dc=mit,dc=edu' -x '(&(eduPersonAffiliation=student)(!(|(ou=NON-INSTITUTE  HARVARD)(ou=NON-INSTITUTE  WELLESLEY)))(&(uid=*n*)))'", $output1);
	echo(implode("\n", $output1) . "\n");
	exec("ldapsearch -h ldap.mit.edu -p 389 -u -b 'dc=mit,dc=edu' -x '(&(eduPersonAffiliation=student)(!(|(ou=NON-INSTITUTE  HARVARD)(ou=NON-INSTITUTE  WELLESLEY)(ou=CENTER FOR REAL ESTATE DEVELOP)(ou=UND)(ou=NIH)))(&(!(uid=*n*))))'", $output2);
	echo(implode("\n", $output2) . "\n");


?>
