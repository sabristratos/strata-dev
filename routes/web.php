<?php

use App\Livewire\Demo;
use App\Livewire\SidebarDemo;
use Illuminate\Support\Facades\Route;

Route::get('/', Demo::class);
Route::get('/sidebar-demo', SidebarDemo::class);
