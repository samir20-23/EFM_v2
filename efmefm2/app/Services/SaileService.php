<?php

namespace App\Services;

use App\Models\Saile;

class SaileService
{
    public function list($search = null) {
        return Saile::when($search, fn($q) => $q->where('name', 'like', "%$search%"))
                    ->paginate(5);
    }

    public function create(array $data) {
        return Saile::create($data);
    }

    public function update(Saile $saile, array $data) {
        return $saile->update($data);
    }

    public function delete(Saile $saile) {
        return $saile->delete();
    }
}