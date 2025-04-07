<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Http\Requests\LivreRequest;

class LivreController extends Controller
{
    public function index()
    {
        $livres = Livre::paginate(5);
        return view('index', compact('livres'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(LivreRequest $request)
    {
        Livre::create($request->all());
        return redirect()->route('livres.create')->with('success', 'Book added successfully!');
    }

    public function show(Livre $livre)
    {
        //
    }

    public function edit($id)
    {
        $book = Livre::find($id);

        if (!$book) {
            return redirect()->route('livres.index')->with('error', 'Book not found');
        }

        return view('edit', compact('book'));
    }

    public function update(LivreRequest $request, $id)
    {
        $book = Livre::find($id);

        if (!$book) {
            return redirect()->route('livres.index')->with('error', 'Book not found');
        }

        $book->update($request->all());

        return redirect()->route('livres.index')->with('success', 'Book updated successfully!');
    }

    public function destroy($id)
    {
        $book = Livre::find($id);
        if (!$book) {
            return redirect()->route('livres.index')->with('error', 'Book not found.');
        }
        $book->delete();
        return redirect()->route('livres.index')->with('success', 'Book deleted successfully!');
    }
}
