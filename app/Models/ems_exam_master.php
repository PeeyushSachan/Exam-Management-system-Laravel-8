<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ems_exam_master extends Model
{
    use HasFactory;

    protected $table="ems_exam_master";
    protected $primaryKey="id";
    protected $fillable=['tittle','status'];
}
