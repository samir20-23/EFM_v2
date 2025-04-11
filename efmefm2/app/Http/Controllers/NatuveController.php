<?php

namespace App\Http\Controllers;

use App\Models\Natuve;
use Illuminate\Http\Request;
use App\Services\NatuveService;
use App\Http\Requests\NatuveRequest;
use App\Services\SaileService;

class NatuveController extends Controller
{
    public function __construct(protected NatuveService $service) {}


    public function index(Request $request)
    {
        $natuves = $this->service->list($request->search);
        return view('natuves.index', compact('natuves'));

    
        $NatuveQuery = Natuve::query();

    
        if ($request->has('natuve_id') && $request->natuve_id != '') {
            $NatuveQuery->where('natuve_id', $request->natuve_id);
        }
    
        $Natuve = $NatuveQuery->get();
    
        return view('natuves.index', compact( n'Natuve', 'natuves'));
    }
    
    public function create() {
        return view('natuves.create');
    }

    public function store(NatuveRequest $request) {
        $this->service->create($request->validated());
        return redirect()->route('natuves.index');
    }

    public function edit(Natuve $natuve) {
        return view('natuves.edit', compact('natuve'));
    }

    public function update(NatuveRequest $request, Natuve $natuve) {
        $this->service->update($natuve, $request->validated());
        return redirect()->route('natuves.index');
    }

    public function destroy(Natuve $natuve) {
        $this->service->delete($natuve);
        return redirect()->route('natuves.index');
    }
}