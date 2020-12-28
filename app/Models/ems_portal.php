<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ems_portal extends Model
{

    protected $table="ems_portals";
    protected $primaryKey="id";
    protected $fillable=['name','email', 'mobile','password','status'];

    use HasFactory;
}
