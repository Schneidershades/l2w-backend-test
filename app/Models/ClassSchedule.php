<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Schedule\ClassScheduleResource;
use App\Http\Resources\Schedule\ClassScheduleCollection;

class ClassSchedule extends Model
{
    use HasFactory;
    
    public $oneItem = ClassScheduleResource::class;
    public $allItems = ClassScheduleCollection::class;
}
