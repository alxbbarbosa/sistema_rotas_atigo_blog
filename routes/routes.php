<?php

use Src\Route as Route;

Route::get('/', function(){
	echo "Página inicial";
});

Route::get(['set' => '/cliente', 'as' => 'clientes.index'], 'Controller@index');

Route::get(['set' => '/cliente/{id}/show', 'as' => 'clientes.show'], 'Controller@show');


Route::delete(['set' => 'cliente/delete', 'as' => 'clientes.delete'], 'Controller@teste');