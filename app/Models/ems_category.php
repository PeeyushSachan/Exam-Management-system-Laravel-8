<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ems_category extends Model
{
    protected $table="ems_categories";
    protected $primaryKey="id";
    protected $fillable=['tittle','category','exam_date','status'];

    use HasFactory;
    
}
