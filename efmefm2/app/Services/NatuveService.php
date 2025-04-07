<?php

namespace App\Services;

use App\Models\Natuve;

class NatuveService
{
    public function list($search = null) {
        return Natuve::when($search, fn($q) => $q->where('name', 'like', "%$search%"))
                     ->paginate(5);
    }

    public function create(array $data) {
        return Natuve::create($data);
    }

    public function update(Natuve $natuve, array $data) {
        return $natuve->update($data);
    }

    public function delete(Natuve $natuve) {
        return $natuve->delete();
    }
}