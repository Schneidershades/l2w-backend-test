<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SpatiePermissions;
use App\Http\Resources\Admin\Permission\PermissionResource;
use App\Http\Resources\Admin\Permission\PermissionCollection;

class Permission extends SpatiePermissions
{
	use HasFactory;

	public static function defaultPermissions()
	{
	    return [
	        'take_quiz',
	        'show_quiz',
	        'edit_quiz',
	        'show_quiz',
	        'delete_quiz',

	        'show_score',
	        'edit_score',
	        'show_score',
	        'delete_score',

	        'show_user',
	        'edit_user',
	        'show_user',
	        'delete_user',

	        'show_role',
	        'edit_role',
	        'show_role',
	        'delete_role',
	    ];
	}
}
