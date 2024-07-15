<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppliedCollege extends Model
{
  use HasFactory;
  public function college()
  {
    return $this->hasOne(University::class, 'id', 'university_id');
  }
}
