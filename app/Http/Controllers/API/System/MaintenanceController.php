<?php

namespace App\Http\Controllers\API\System;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController as BaseController;
use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Models\Maintenance;
use App\Models\Page;
use Carbon\Carbon;

class MaintenanceController extends BaseController
{

    public function show(Request $request)
    {
        $validated = $request->validate([
            'html' => 'required',
            'css' => 'required',
        
        ]);
        $page = new Page();
        $page->html = $validated['html'];
        $page->css = $validated['css'];

        // Set the created_at and updated_at timestamps
        $now = Carbon::now();
    //    $page->created_at = $now;
      //  $page->updated_at = $now;

        if ($page->save()) {
           return response()->json(['message' => 'Page created successfully']);
         
        } else {
            return response()->json(['message' => 'Failed to create page'], 500);
        }
        return response()->json($validated);
       
    }


    public function fetch(Request $request)
    {
        $firstPage = Page::first();

        return response()->json($firstPage);
    }
}
