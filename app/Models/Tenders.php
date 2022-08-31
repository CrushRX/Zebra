<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenders extends Model
{
    use HasFactory;

    protected $table = 'test_task_data_csv';

    protected $guarded = '*';

    public $timestamps = false;

    public function scopeSetTender($query)
    {
        return $query->create('...')->get();
    }
}
