<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = ['name','email','phone','address','city','nid','customer_type','country_id','company_name'];

    public function country() : BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
