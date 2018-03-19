<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Employee extends Model
{
    protected $fillable = [
        'employees_first_name',	
        'employees_last_name',	
        'company_id',	
        'employees_email',
        'employees_phone'
    ];

    public function getCompany(){
        return $this->company = DB::table('companies')->where('id', $this->company_id)->value('company_name');
    }

    
}
