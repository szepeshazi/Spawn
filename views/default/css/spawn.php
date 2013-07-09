<?php 
	$graphics_path = elgg_get_site_url() . 'mod/' . basename(dirname(dirname(dirname(dirname(__FILE__))))) . '/_graphics/';
?>

<?php if (false): ?><style><?php endif; ?>


/************* Global styles *************/

div.spawn-admin * {
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}

div.spawn-admin input[type="text"] {
    width: 64px;
}

div.spawn-admin div.spawn-entity-property-name input[type="text"] {
    width: auto;
    padding: 2px;
}

div.spawn-admin label {
	font-style: italic;
	font-size: 0.9em;
}

div.spawn-entity, div.spawn-entity-property {
	font-size: 0px;		/* Remove unwanted white space from inline-blocks */
	margin: 2px 0px;
}

div.spawn-entity *, div.spawn-entity-property * {
	font-size: 12px;	/* Restore font size for real content */
}

div.spawn-entity > div, div.spawn-details > *, div.spawn-entity-property > * {
	display: inline-block;
}

div.spawn-global-settings {
	border-bottom: 2px #9A0000 solid; 
	margin-bottom: 10px; 
	padding-bottom:10px;
}

/************* Entity grid *************/

div.spawn-entity div.spawn-name {
	width: 12%;
}

div.spawn-details {
	width: 18%;
}

div.spawn-delete {
	width: 27%;
}

div.spawn-entity div.spawn-actions {
	width: 43%;
	text-align: right;
}


div.spawn-details div.spawn-info {
	margin-left: 5px;
}

div.spawn-name, .spawn-settings-toggle {
	color: #9A0000;
	font-weight: bold;
}


div.spawn-entity div.spawn-settings, div.spawn-entity div.spawn-entity-property-settings {
	display: none;
}

div.spawn-entity div.spawn-settings {
    border-left: 3px solid #9A0000;
    margin-left: 10px;
    padding-left: 4px;
    width: 100%;
}

/************* Entity settings grid *************/

div.spawn-entity-property-name {
	width: 15%
}

div.spawn-entity-property-type {
	width: 25%
}

div.spawn-entity-property-actions {
	width: 15%
}

div.spawn-entity-property-type select {
	width: 100%;
}

div.spawn-settings-head {
	border-bottom: 1px solid #9A0000; 
	margin: 2px 0px 8px 0px;
}

div.spawn-settings-head-row * {
	display: inline-block;
}

div.spawn-settings-head-row label.short {
	width: 33%;
}

div.spawn-settings-head-row div.slider-block {
	width: 60%
}

div.slider {
	display: inline-block; 
	width: 50%;
	margin-left: 15px;
}

div.slider-block span {
	font-style: italic;
	font-size: 0.9em;
}

div.slider-overlay {
    color: #9A0000;
    font-weight: bold;
    left: -150px;
    position: relative;
    width: 25px;
    z-index: 50;
}

/************* Clonable templates **************/

div.spawn-templates {
	display: none;
}

/***************** Icons ******************/

span.spawn-icon {
	display: inline-block;
	background: url(<?php echo $graphics_path ?>spawn-sprites.png) no-repeat left;
	width: 16px;
	height: 16px;
	margin: 0 2px;
	vertical-align: text-bottom;
}

span.spawn-icon-spawned {
	background-position: 0px 0px;
}

span.spawn-icon-count {
	background-position: 0px -16px;
}

span.spawn-icon-inspect {
	background-position: 0px -32px;
}

span.spawn-icon-add {
	background-position: 0px -48px;
}

span.spawn-icon-empty {
	background: none;
}

<?php if (false): ?></style><?php endif; ?>
