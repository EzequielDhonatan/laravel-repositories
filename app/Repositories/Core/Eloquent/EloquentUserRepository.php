<?php

namespace App\Repositories\Core\Eloquent;

use Illuminate\Http\Request;
use App\Models\User\User;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Contracts\UserRepositoryInterface;

class EloquentUserRepository extends BaseEloquentRepository implements UserRepositoryInterface
{
    public function entity()
    {
        return User::class;
    }

    public function search(Request $request)
    {
        $filter = $request->filter;

        return $this->entity
                            ->where('name', 'LIKE', "%{$filter}%")
                            ->orWhere('email', "%{$filter}%")
                            ->paginate();
    }
}
