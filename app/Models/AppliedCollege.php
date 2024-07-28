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
  public function status()
  {
    return $this->hasOne(ApplicationStatus::class, 'id', 'application_status_id');
  }
  public function notes()
  {
    return $this->hasMany(ApplicationNote::class, 'application_id', 'id');
  }
}
