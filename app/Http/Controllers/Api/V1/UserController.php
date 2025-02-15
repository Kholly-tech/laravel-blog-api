<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UserCollection;
use App\Http\Resources\V1\UserResource;
use App\Models\Blog;
use App\Filters\V1\UserFilter;
use App\Http\Requests\V1\StoreUserRequest;
use App\Http\Requests\V1\UpdateUserRequest;

class UserController extends Controller
{
    // @return \Illuminate\Http\Response
    public function index(Request $request) {

        $filter = new UserFilter();
        $filterItems = $filter->transform($request); // [['column', 'operator', 'value']]

        $includeBlogs = $request->query('includeBlogs');

        $users = User::where($filterItems);

        if($includeBlogs) {
            $users = $users->with('blogs');
        }
            
        return new UserCollection($users->paginate()->appends($request->query()));
    }

    // Create new User
    public function store(StoreUserRequest $request) {
        return new UserResource(User::create($request->all()));
    }

    public function show(User $user) {
        $includeBlogs = request()->query('includeBlogs');
        if($includeBlogs) {
            return new UserResource($user->loadMissing('blogs'));
        }

        return new UserResource(($user));
    }

    public function update(UpdateUserRequest $request, User $user) {
        $user->update($request->all());
    }
}
