<?php

namespace App\Models;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
protected $guarded = [];
// [TAMBAHKAN INI] Satu kategori memiliki banyak acara
public function events()
{
return $this->hasMany(Event::class);
}
}