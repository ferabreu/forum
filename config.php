<?php
define ('DB_HOST',  'localhost');
define ('DB_NAME',  'forum');
define ('DB_USER',  'forumuser');
define ('DB_PASS',  't&st&_d0_f0rum');

// Base-2 logarithm of the iteration count used for password stretching
$hash_cost_log2 = 8;
// Do we require the hashes to be portable to older systems (less secure)?
$hash_portable = FALSE;
