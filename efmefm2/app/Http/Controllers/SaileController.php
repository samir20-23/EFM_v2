<?php

namespace App\Http\Controllers;

use App\Models\Saile;
use Illuminate\Http\Request;
use App\Services\SaileService;
use App\Http\Requests\SaileRequest;

class SaileController extends Controller
{
    public function __construct(protected SaileService $service) {}

    public function index(Request $request) {
        $sailes = $this->service->list($request->search);
        return view('sailes.index', compact('sailes'));
    }

    public function create() {
        return view('sailes.create');
    }

    public function store(SaileRequest $request) {
        $this->service->create($request->validated());
        return redirect()->route('sailes.index');
    }

    public function edit(Saile $saile) {
        return view('sailes.edit', compact('saile'));
    }

    public function update(SaileRequest $request, Saile $saile) {
        $this->service->update($saile, $request->validated());
        return redirect()->route('sailes.index');
    }

    public function destroy(Saile $saile) {
        $this->service->delete($saile);
        return redirect()->route('sailes.index');
    }
}