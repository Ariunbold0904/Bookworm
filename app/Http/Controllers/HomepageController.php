<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller{
    public function index() {
        $books = \DB::table('books')->get();


        return view('home',[
            'books' => $books,
        ]);
    }
}
