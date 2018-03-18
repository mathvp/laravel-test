<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
   protected $fillable = [
       'company_name',	
       'company_email',	
       'company_logo',	
       'company_website'
   ];
   //protected $guarded = ['id', 'created_at', 'update_at'];
   //protected $table = 'companies';
}
