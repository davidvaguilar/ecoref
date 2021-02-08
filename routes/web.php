<?php

  Route::get('/', function () {
    $url = "https://ecoref.davidaguilar.cl/login";
    return Redirect::to($url);
  });