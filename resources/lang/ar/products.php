<?php

use App\Models\Product;

$products = Product::loadArabic();
return ['data' => $products];
