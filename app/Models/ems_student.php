<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ems_student extends Model
{

    protected $table="ems_students";
    protected $primaryKey="id";
    protected $fillable=['name','email', 'mobile','category','exam','password','status'];

    use HasFactory;
}
