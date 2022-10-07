<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';
    protected $fillable = ['country_id','name','email','phone','address','city','nid','supplier_type','company_name','image'];

    public function country() : BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
