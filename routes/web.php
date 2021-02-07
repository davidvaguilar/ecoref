<?php

  Route::get('/', function () {
    $url = "https://ecoref.davidaguilar.cl";
    return Redirect::to($url);
  });