<div class="spawn-property-templates spawn-templates hidden">
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

<div class="spawn-property-templates advanced-settings hidden">
<?php
/**
 * Auto parse and include once all template views within the "advanced_settings" subdirectory
 */

$path = dirname(__FILE__) . '/advanced_settings';
foreach (glob("$path/*.php") as $filename) {
	include $filename;
}

?>
</div>
