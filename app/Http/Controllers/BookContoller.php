<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use Illuminate\Support\Facades\Auth;

class BookContoller extends Controller{
    public function store(Request $request) {
        $bookModel = new Books();
        $bookModel->title = $request->title;
        $bookModel->author = $request->author;
        $bookModel->isbn = $request->isbn;
        $bookModel->image_url = $request->image_url;
        $bookModel->save();
        error_log('message here.');
        return response()->json(array('success'=> 1), 200);
    }
}
