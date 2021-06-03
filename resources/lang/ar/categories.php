<?php

use App\Models\Category;

$categories = Category::loadArabic();
return ['data' => $categories];
