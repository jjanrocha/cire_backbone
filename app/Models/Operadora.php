<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operadora extends Model
{
    use HasFactory;

    protected $table = 'cire_backbone_operadoras';

    protected $fillable = ['nome'];

    public $timestamps = false;
}
