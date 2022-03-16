<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected  $table='tickets';
    protected  $fillable=['DisplayTicketID','Subject','Description'];
    /*'RequestTypeID','StatusID','PriorityID','UrgentID','CategoryID','SubCategoryID','ItemID','ImpactID','DepartmentID','LevelID','LocationID','TicketModeID','CreatedUser','UpdatedUser','CreatedDate','UpdatedDate','RequestedUser','AssignedUser','AssignedDate','DueDate','SolutionDescription','IPAddress','ClosedDate','TicketCloseModelID','StatusCloseReason','Is_FCR','Is_Active','TicketStatusMessage','EstimatedTime','SpentTime','Is_Validate_EstimatedTime'*/
    public function comments()
    {
        return $this->hasMany('App\Comments');
    }
    public function levels()
    {
        return $this->belongsTo('App\Levels');
    }
    public function impacts()
    {
        return $this->belongsTo('App\Impacts');
    }
    public function ticket_attachments() //1
    {
        return $this->hasMany('App\TicketAttachements');
    }
    public function urgency() //*
    {
        return $this->belongsTo('App\Urgency');
    }
    public function priority() //*
    {
        return $this->belongsTo('App\Priority');
    }
    public function request_types() //*
    {
        return $this->belongsTo('App\Request_type');
    }
    public function ticket_models() //*
    {
        return $this->belongsTo('App\TicketModels');
    }
    public function category() //*
    {
        return $this->belongsTo('App\Category');
    }
    public function sub_category() //*
    {
        return $this->belongsTo('App\SubCategory');
    }
    public function items() //*
    {
        return $this->belongsTo('App\Items');
    }
    public function status() //*
    {
        return $this->belongsTo('App\Status');
    }
    public function locations() //*
    {
        return $this->belongsTo('App\Locations');
    }
    public function ticket_close_models() //*
    {
        return $this->belongsTo('App\TicketCloseModel');
    }
    public function departments() //*
    {
        return $this->belongsTo('App\Departments');
    }
}
