<div class="spawn-entity-templates spawn-templates">
<?php
/**
 * Auto parse and include once all template views within the "templates" subdirectory
 */

$path = dirname(__FILE__) . '/templates';
foreach (glob("$path/*.php") as $filename) {
	include_once $filename;
}

?>
</div>
