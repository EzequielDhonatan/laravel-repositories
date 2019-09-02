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
        return $this->entity
                            ->where(function ($query) use ($request) {
                                if ($request->name) {
                                    $filter = $request->name;
                                    $query->where(function ($querySub) use ($filter) {
                                        $querySub->where('name', 'LIKE', "%{$filter}%")
                                                    ->orWhere('description', 'LIKE', "%{$filter}%");
                                    });     
                                }

                                if ($request->price) {
                                    $query->where('price', $request->price);
                                }

                                if ($request->category) {
                                    $query->orWhere('category_id', $request->category);
                                }
                            })
                            ->paginate();
    }
}
