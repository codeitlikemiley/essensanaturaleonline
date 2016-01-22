<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
	// This Return All Category
    public function index()
  	{
    return $category = Category::with(["products"])->get();
  	}
}
