<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenGift extends Model
{
    use HasFactory;

    protected $searchable = [
//        'sender_address',
//        'recipient_address',
        'recipient_id',
        'sender_id',
        'circle_id',
        'id',
        'epoch_id'
    ];
    protected $fillable = [
        'sender_address',
        'recipient_address',
        'recipient_id',
        'sender_id',
        'tokens',
        'circle_id',
        'note',
        'dts_created',
        'epoch_id'
    ];

    public function scopeFilter($query, $filters) {
        foreach($filters as $key=>$filter) {
            if(in_array($key,$this->searchable)) {
                $query->where($key, $filter);
            }
        }
        return $query;
    }
}
