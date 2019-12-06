<?php

use App\Category;

function getCategories(){

        return Category::latest()->get();
    }


