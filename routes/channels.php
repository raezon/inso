<?php

use App\Models\Vacation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat', function ($user) {
    return Auth::check();
});

Broadcast::channel('channel.{vacationId}', function ($user, $vacationId) {

    $user_id = auth('api')->user()->id;
    $vacation = Vacation::find($vacationId);
    if($vacation->id and $vacation->user_id=$user_id and
    $vacation->status = 1){
            return true;
    }else{
        $query = "WITH RECURSIVE categories_tree AS (
            SELECT id, name, parent_id FROM categories WHERE id =  $user_id
            
            UNION ALL
            SELECT c.id, c.name, c.parent_id FROM categories c, categories_tree WHERE c.id = categories_tree.parent_id and c.id =  $user_id

        )
        SELECT * FROM categories_tree";

        $result = DB::select(DB::raw($query));
        $parent_id = $result[0]->id;

        if ($parent_id == $user_id) {
            return true;
        }

      
    }
    return false;
    

});
