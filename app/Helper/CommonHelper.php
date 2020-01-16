<?php

use App\Category;

function getCategories($quantity = 999999){

        return Category::latest()->take($quantity)->get();
    }


