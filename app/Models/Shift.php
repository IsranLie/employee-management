<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function softDelete()
    {
        $this->status = 'inactive';
        return $this->save();
    }
}
