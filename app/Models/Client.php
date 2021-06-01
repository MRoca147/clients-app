<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'clients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cod',
        'name',
        'city'
    ];

    public function getCity(){
        return $this->belongsTo(City::class, 'city');
    }

    public function scopeCityFilter($query, $city){
        if(trim($city)){
            $query->whereHas('getCity', function($q) use($city) {
                $q->where('id', $city);
            });
        }
    }
}
