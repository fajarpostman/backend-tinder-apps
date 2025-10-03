<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\Like;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    // Don't forget to pray before you start coding!

    /**
     * @OA\Get(
     *     path="/api/v1/people",
     *     tags={"People"},
     *     summary="Get list of people",
     *     @OA\Response(response=200, description="Successful operation")
     * )
     */
    public function index(Request $request)
    {
        $people = Person::orderBy('created_at', 'desc')->paginate(50);
        return response()->json($people);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/people/{id}/like",
     *     tags={"People"},
     *     summary="Like a person",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Liked successfully")
     * )
     */
    public function like($id, Request $request)
    {
        $person = Person::findOrFail($id);
        Like::updateOrCreate(
            ['person_id' => $person->id, 'actor_id' => $request->actor_id],
            ['type' => 'like']
        );
        return response()->json(['message' => 'Liked successfully']);
    }
    
        /**
     * @OA\Post(
     *     path="/api/v1/people/{id}/dislike",
     *     tags={"People"},
     *     summary="Dislike a person",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Dislike successfully")
     * )
     */
    public function dislike($id, Request $request)
    {
        $person = Person::findOrFail($id);
        Like::updateOrCreate(
            ['person_id' => $person->id, 'actor_id' => $request->actor_id],
            ['type' => 'dislike']
        );
        return response()->json(['message' => 'Disliked successfully']);
    }

    /**
     * Get people that the current actor has liked
     */
    public function likedList(Request $request)
    {
        $actorId = $request->query('actor_id', 1);
        $liked = Like::where('actor_id', $actorId)
            ->where('type', 'like')
            ->with('person')
            ->get();

        return response()->json($liked);
    }
}
