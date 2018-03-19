<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$this->group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){
    $this->get('/', 'AdminController@index')->name('admin.home');

    $this->group(['prefix' => 'companies'], function(){
        $this->get('/', 'CompanyController@index')->name('admin.companies');
        $this->get('create-company', 'CompanyController@create')->name('admin.companies.create-company');
        $this->post('create-company', 'CompanyController@store')->name('admin.companies.create-company');
    });

    $this->group(['prefix' => 'employees'], function(){
        $this->get('/', 'EmployeeController@index')->name('admin.employees');
        $this->get('create-employee', 'EmployeeController@create')->name('admin.employees.create-employee');
        $this->post('create-employee', 'EmployeeController@store')->name('admin.employees.store-employee');
    });

});

$this->get('/', 'Site\SiteController@index')->name('home');

Auth::routes();

