<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('home',[
        "title" => "HOME",
        "myname" => "yunjii",
        "email" => "yuhuu@ciputra.ac.id",
        "line" => "uuhuyyy"
    ]);
});
