<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contratada extends Model
{
    use HasFactory;

    protected $table = 'cire_backbone_contratadas';

    protected $fillable = ['nome'];

    public $timestamps = false;
}
