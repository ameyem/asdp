<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTasks extends Model
{
    protected $fillable = ['worktitle', 'worktitle','whatinitforme','usercredits','guide_id','reviewer_id','assigned_date','completion_date','uploads'];
}
