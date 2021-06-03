<?php

use App\Models\Category;

$categories = Category::loadEnglish();
return ['data' => $categories];
