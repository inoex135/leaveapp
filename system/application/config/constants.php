<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ', 							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 					'ab');
define('FOPEN_READ_WRITE_CREATE', 				'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 			'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/*
 * CUSTOM CONSTANTS
 */
define('SUBMITTED','1');
define('APPROVED','2');
define('KEPT','3');
define('REJECTED','0');

define('SUBMITTED_LABEL','Submitted');
define('APPROVED_LABEL','Approved');
define('KEPT_LABEL','Kept');
define('REJECTED_LABEL','Rejected');

define('ADMIN','admin');
define('STAFF','staff');
define('SUPERVISOR','supervisor');
define('MANAGER','manager');
define('HR','hr');

define('EMAIL_FROM','noreply@javan.co.id');
define('EMAIL_FROM_NAME','No Reply');
/* End of file constants.php */
/* Location: ./system/application/config/constants.php */