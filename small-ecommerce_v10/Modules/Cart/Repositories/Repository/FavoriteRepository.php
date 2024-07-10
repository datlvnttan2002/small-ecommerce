<?php
namespace Modules\Cart\Repositories\Repository;

use App\Repositories\EloquentRepository;
use Carbon\Carbon;
use Modules\Cart\Repositories\Interface\FavoriteRepositoryInterface;

class FavoriteRepository extends EloquentRepository implements FavoriteRepositoryInterface
{
    public function getModel()
    {
        return \Modules\Cart\Entities\Favorite::class;
    }
    
}
