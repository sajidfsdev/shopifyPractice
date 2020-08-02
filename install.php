<?php

// Set variables for our request
$shop = $_GET['shop'];
$api_key = "c989c2e6c3fe8b05df59a7b8af541d12";
$scopes = "read_orders,write_products";
$redirect_uri = "https://sopifyproject.herokuapp.com/generate_token.php";

// Build install/approval URL to redirect to
$install_url = "https://" . $shop . ".myshopify.com/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect comment
header("Location: " . $install_url);
die();