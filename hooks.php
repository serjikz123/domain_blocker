<?php
/**
 *  DomainBlocker hook that
 *  prevents registering offensive/fraudulent domains
 *  @return Array $errors if domain is fraudelent
 * */
function hook_domain_blocker($vars) {
    require_once dirname(__FILE__).'/DomainBlocker.php';

    $blocker = DomainBlocker::getInstance();

    $errors = $blocker::checkDomain($vars);

    if($errors['status'] == 0) {
	return [];
    } else {
	return $errors['msg'];
    }
}

add_hook('ShoppingCartValidateDomain', '2', 'hook_domain_blocker');
?>
