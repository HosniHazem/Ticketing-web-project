<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function search(Request $request)
    {
        $query = Ticket::query();

        if ($s = $request->input('s')) {
            $query->whereRaw("Subject LIKE '%" . $s . "%'")
                ->orWhereRaw("Description LIKE '%" . $s . "%'");
        }

        if ($sort = $request->input('sort')) {
            $query->orderBy('PriorityID', $sort);
        }

        $perPage = 2;
        $page = $request->input('page', 1);
        $total = $query->count();

        $result = $query->offset(($page - 1) * $perPage)->limit($perPage)->get();

        return [
            'data' => $result,
            'total' => $total,
            'page' => $page,
            'last_page' => ceil($total / $perPage)
        ];
    }
}
