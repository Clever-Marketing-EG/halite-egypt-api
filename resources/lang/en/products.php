<?php

use App\Models\Product;

$products = Product::loadEnglish();
return ['data' => $products];
