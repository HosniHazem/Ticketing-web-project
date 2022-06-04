<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Ticket extends Model
{
    protected  $table='tickets';

    protected $with =['priority','levels','status','request_types','category','users','sub_category'];


    use HasFactory;

    /*'RequestTypeID','StatusID','PriorityID','UrgentID','CategoryID','SubCategoryID','ItemID','ImpactID','DepartmentID','LevelID','LocationID','TicketModeID','CreatedUser','UpdatedUser','CreatedDate','UpdatedDate','RequestedUser','AssignedUser','AssignedDate','DueDate','SolutionDescription','IPAddress','ClosedDate','TicketCloseModelID','StatusCloseReason','Is_FCR','Is_Active','TicketStatusMessage','EstimatedTime','SpentTime','Is_Validate_EstimatedTime'*/
    public function comments()
    {
        return $this->hasMany('App\Models\Comments');
    }
    public function levels()
    {
        return $this->belongsTo(Levels::class,'LevelID','id');
    }
    public function users()
    {
        return $this->belongsTo(User::class,'AssignedUser','id');
    }
    public function impacts()
    {
        return $this->belongsTo('App\Models\Impacts');
    }

    public function urgency() //*
    {
        return $this->belongsTo('App\Models\Urgency');
    }
    public function priority() //*
    {
        return $this->belongsTo(Priority::class,'PriorityID','id');
    }
    public function request_types() //*
    {
        return $this->belongsTo(Request_type::class,'RequestTypeID','id');
    }
    public function ticket_models() //*
    {
        return $this->belongsTo('App\Models\TicketModels');
    }
    public function category() //*
    {
        return $this->belongsTo(Category::class,'CategoryID','id');
    }
    public function sub_category() //*
    {
        return $this->belongsTo(SubCategory::class,'SubCategoryID','id');
    }
    public function status() //*
    {
        return $this->belongsTo(Status::class,'StatusID','id');
    }
    public function locations() //*
    {
        return $this->belongsTo('App\Models\Locations');
    }
    public function ticket_close_models() //*
    {
        return $this->belongsTo('App\Models\TicketCloseModel');
    }
    public function departments() //*
    {
        return $this->belongsTo('App\Models\Departments');
    }
}
