<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    protected $table = 'student_info';

    public $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'major',
        'units',
        'grad_date',
        'college',
        'bio',
        'research',
        'fun_facts',
        'academic_interest'
    ];

}
