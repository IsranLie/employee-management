<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['nik', 'name', 'department_id', 'shift_id'];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id');
    }

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
