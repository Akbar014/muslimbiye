<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function update(Request $request)
    {
        try {
            $user_id = Auth::guard('user')->user()->id;

            if ($user_id) {
                Favorite::updateOrCreate(
                    ["user_id" => $user_id],
                    [
                        "user_id" => $user_id,
                        "biodata_id" => $request->id,
                    ]
                );
                return response()->json([
                    'status'  => 'success',
                    'message' => "Added To Favourites",
                ], 200);
            } else {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'You\'re Not Logged In',
                    'errors'  => [],
                ], 403);
            }

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Favourite not found',
                'errors'  => [],
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Couldn\'t Add To The Favourite List',
                'errors'  => $e->getMessage(),
            ], 500);
        }
    }


    public function destroy(Request $request)
    {
        try {
            $user_id = Auth::guard('user')->user()->id;
            if ($user_id) {
                $favourite = Favorite::where("biodata_id",$request->id)->first();
                if ($favourite) {
                    $favourite->delete();
                    return response()->json([
                        'status'  => 'success',
                        'message' => "Removed From Favourites",
                    ], 200);
                } else {
                    return response()->json([
                        'status'  => 'error',
                        'message' => 'Favourite not found',
                        'errors'  => [],
                    ], 404);
                }
            } else {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'You\'re Not Logged In',
                    'errors'  => [],
                ], 403);
            }
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Favourite not found',
                'errors'  => [],
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Couldn\'t Add To The Favourite List',
                'errors'  => $e->getMessage(),
            ], 500);
        }
    }
}
