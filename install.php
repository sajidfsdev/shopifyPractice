<?php

// Set variables for our request
$shop = $_GET['shop'];
$api_key = "d5ff3af301bf36725e6e686b5076752a";
$scopes = "read_orders,write_products";
$redirect_uri = "https://shopifypeoject.herokuapp.com/generate_token.php";

// Build install/approval URL to redirect to
$install_url = "https://" . $shop . ".myshopify.com/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect comment
header("Location: " . $install_url);
die();