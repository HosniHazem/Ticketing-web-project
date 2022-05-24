<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Priority;

class Ticket extends Model
{
    use HasFactory;
    protected  $table='tickets';
    protected $with =['priority'];



    /*'RequestTypeID','StatusID','PriorityID','UrgentID','CategoryID','SubCategoryID','ItemID','ImpactID','DepartmentID','LevelID','LocationID','TicketModeID','CreatedUser','UpdatedUser','CreatedDate','UpdatedDate','RequestedUser','AssignedUser','AssignedDate','DueDate','SolutionDescription','IPAddress','ClosedDate','TicketCloseModelID','StatusCloseReason','Is_FCR','Is_Active','TicketStatusMessage','EstimatedTime','SpentTime','Is_Validate_EstimatedTime'*/
    public function comments()
    {
        return $this->hasMany('App\Models\Comments');
    }
    public function levels()
    {
        return $this->belongsTo('App\Models\Levels');
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
        return $this->belongsTo('App\Models\Priority');
    }
    public function request_types() //*
    {
        return $this->belongsTo('App\Models\Request_type');
    }
    public function ticket_models() //*
    {
        return $this->belongsTo('App\Models\TicketModels');
    }
    public function category() //*
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function User() //*
    {
        return $this->belongsTo('App\Models\User');
    }
    public function status() //*
    {
        return $this->belongsTo('App\Models\Status');
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
