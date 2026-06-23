<?php

namespace App\Http\Controllers;

use App\Models\Clothes;
use App\Models\Outfit;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OutfitController extends Controller
{
    public function index()
    {
        $outfits = Outfit::with('clothes.category')
            ->where('user_id', auth()->id())
            ->latest('tanggal')
            ->paginate(10);

        return view('outfits.index', compact('outfits'));
    }

    public function create()
    {
        $clothes = Clothes::with('category')
            ->where('user_id', auth()->id())
            ->orderBy('nama_pakaian')
            ->get();

        return view('outfits.create', compact('clothes'));
    }

    public function store(Request $request)
    {
        $ownedClothesIds = Clothes::where('user_id', auth()->id())->pluck('id')->toArray();

        $validated = $request->validate([
            'nama_outfit' => ['required', 'string', 'max:150'],
            'tanggal' => ['required', 'date'],
            'clothes_ids' => ['required', 'array', 'min:1'],
            'clothes_ids.*' => ['required', 'integer', Rule::in($ownedClothesIds)],
        ], [
            'clothes_ids.required' => 'Pilih minimal satu pakaian untuk membuat outfit.',
        ]);

        $outfit = Outfit::create([
            'user_id' => auth()->id(),
            'nama_outfit' => $validated['nama_outfit'],
            'tanggal' => $validated['tanggal'],
        ]);

        $outfit->clothes()->attach($validated['clothes_ids']);

        return redirect()->route('outfits.index')->with('success', 'Outfit berhasil dibuat.');
    }

    public function show(Outfit $outfit)
    {
        $this->authorizeOwner($outfit);
        $outfit->load('clothes.category');

        return view('outfits.show', compact('outfit'));
    }

    public function edit(Outfit $outfit)
    {
        $this->authorizeOwner($outfit);
        $outfit->load('clothes');

        $clothes = Clothes::with('category')
            ->where('user_id', auth()->id())
            ->orderBy('nama_pakaian')
            ->get();

        return view('outfits.edit', compact('outfit', 'clothes'));
    }

    public function update(Request $request, Outfit $outfit)
    {
        $this->authorizeOwner($outfit);

        $ownedClothesIds = Clothes::where('user_id', auth()->id())->pluck('id')->toArray();

        $validated = $request->validate([
            'nama_outfit' => ['required', 'string', 'max:150'],
            'tanggal' => ['required', 'date'],
            'clothes_ids' => ['required', 'array', 'min:1'],
            'clothes_ids.*' => ['required', 'integer', Rule::in($ownedClothesIds)],
        ]);

        $outfit->update([
            'nama_outfit' => $validated['nama_outfit'],
            'tanggal' => $validated['tanggal'],
        ]);

        $outfit->clothes()->sync($validated['clothes_ids']);

        return redirect()->route('outfits.index')->with('success', 'Outfit berhasil diperbarui.');
    }

    public function destroy(Outfit $outfit)
    {
        $this->authorizeOwner($outfit);
        $outfit->clothes()->detach();
        $outfit->delete();

        return redirect()->route('outfits.index')->with('success', 'Outfit berhasil dihapus.');
    }

    private function authorizeOwner(Outfit $outfit): void
    {
        if ($outfit->user_id !== auth()->id()) {
            abort(403, 'Akses ditolak.');
        }
    }
}
