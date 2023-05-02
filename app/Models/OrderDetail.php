<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details';
    // protected $primaryKey = 'no_ic';
    // public $incrementing  = false;

    protected $cast = [
        // 'date' =>
    ];

    protected $fillable = [
        'rec_no',
        'user_id',
        'address',
        'tel_no',
        'email',
        'date',
    ];

    // protected $guarded = [
    //     'no_ic',
    // ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
