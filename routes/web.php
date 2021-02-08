<?php

  Route::get('/', function () {
    $url = "https://ecoref.davidaguilar.cl/login";
    return Redirect::to($url);
  });

  Route::get('login', function () {
    $url = "https://ecoref.davidaguilar.cl/login";
    return Redirect::to($url);
  });