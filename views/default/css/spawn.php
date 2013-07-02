<?php 
	$graphics_path = elgg_get_site_url() . 'mod/' . basename(dirname(dirname(dirname(dirname(__FILE__))))) . '/_graphics/';
?>

<?php if (false): ?><style><?php endif; ?>

div.spawn-list {
    border: 1px solid #CCCCCC;
    display: block;
}

div.spawn-entity {
    float: left;
    margin: 5px;
    width: 100%;
}

div.spawn-entity div {
	margin: 0px 5px;
}


div.spawn-info span {
	float: right;
	margin: 0px 5px;
}

div.spawn-info span.spawn-name {
	float: left;
	color: #9A0000;
	font-weight: bold;
	margin: 0px;
}

div.spawn-info span.spawn-count {
	background: url(<?php echo $graphics_path ?>sum.png) no-repeat left center;
	padding-left: 18px;
}

div.spawn-info span.spawn-spawned-count {
	background: url(<?php echo $graphics_path ?>spawn.png) no-repeat left center;
	padding-left: 18px;
}

div.spawn-info a.spawn-inspect {
	background: url(<?php echo $graphics_path ?>zoom.png) no-repeat left center;
	width: 16px;
	height: 16px;
	padding-left: 16px;
	margin-left: 4px;
}


div.spawn-entity input[type="button"] {
	font-size: 0.9em;
}

div.spawn-entity > div.spawn-left {
    float: left;
}

div.spawn-entity > div.spawn-info {
    width: 30%;
}

div.spawn-entity div.spawn-actions {
    float: right;
    margin-right: 5px;
}

div.spawn-entity div.spawn-actions label {
	font-style: italic;
	font-size: 0.9em;
}

div.spawn-entity div.spawn-actions a, div.spawn-entity div.spawn-settings a {
	border-radius: 5px;
	background-color: #FFDAD0;
	padding: 5px 5px 5px 0px;
	font-weight: bold;
}

div.spawn-actions * {
    margin: 0 5px;
}

div.spawn-actions input[type="text"] {
    width: 64px;
}

div.spawn-entity div.spawn-settings {
    display: none;
    width: 100%;
    clear: both;
}

div.spawn-entity-property {
	height: auto;
}

div.spawn-entity-property div {
	float: left;
	margin: 3px 0px;
}

div.spawn-entity-property-name {
	width: 15%
}

div.spawn-entity-property-type {
	width: 30%
}

div.spawn-entity-property-actions {
	height: auto;
}

div.spawn-entity-property-settings {
	display: none;
}


<?php if (false): ?></style><?php endif; ?>
