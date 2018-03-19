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

}
