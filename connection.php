<?php
require_once 'vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/secret/php1-ac58e-b519c5d5fada.json');

$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->create();

$database = $firebase->getDatabase();
$ref=$database->getReference();
/*post_id
post_category_id
post_title
author
datepost_image
post_content
post_tag
post_comment_count
post_status
*/
?>
