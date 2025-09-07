<?php

use App\Livewire\Demo;
use App\Livewire\SidebarDemo;
use Illuminate\Support\Facades\Route;

Route::get('/', Demo::class);
Route::get('/sidebar-demo', SidebarDemo::class);
Route::view('/data-attributes-test', 'data-attributes-test');
Route::view('/text-component-test', 'test-text-component');
