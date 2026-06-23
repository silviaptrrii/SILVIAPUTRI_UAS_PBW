<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Clothes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ClothesController extends Controller
{
    public function index()
    {
        $clothes = Clothes::with('category')
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(9);

        return view('clothes.index', compact('clothes'));
    }

    public function create()
    {
        $categories = Category::orderBy('nama_kategori')->get();
        return view('clothes.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'nama_pakaian' => ['required', 'string', 'max:150'],
            'warna' => ['required', 'string', 'max:80'],
            'foto' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'keterangan' => ['nullable', 'string', 'max:1000'],
        ], [
            'category_id.required' => 'Kategori wajib dipilih.',
            'foto.image' => 'File foto harus berupa gambar.',
            'foto.mimes' => 'Format foto harus JPG, JPEG, PNG, atau WEBP.',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $this->uploadFoto($request->file('foto'));
        }

        $validated['user_id'] = auth()->id();

        Clothes::create($validated);

        return redirect()
            ->route('clothes.index')
            ->with('success', 'Data pakaian berhasil ditambahkan.');
    }

    public function show(Clothes $clothes)
    {
        $this->authorizeOwner($clothes);
        return view('clothes.show', ['clothes' => $clothes->load('category')]);
    }

    public function edit(Clothes $clothes)
    {
        $this->authorizeOwner($clothes);
        $categories = Category::orderBy('nama_kategori')->get();
        return view('clothes.edit', ['clothes' => $clothes, 'categories' => $categories]);
    }

    public function update(Request $request, Clothes $clothes)
    {
        $this->authorizeOwner($clothes);

        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'nama_pakaian' => ['required', 'string', 'max:150'],
            'warna' => ['required', 'string', 'max:80'],
            'foto' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'keterangan' => ['nullable', 'string', 'max:1000'],
        ], [
            'category_id.required' => 'Kategori wajib dipilih.',
            'foto.image' => 'File foto harus berupa gambar.',
            'foto.mimes' => 'Format foto harus JPG, JPEG, PNG, atau WEBP.',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
        ]);

        if ($request->hasFile('foto')) {
            $this->deleteFoto($clothes->foto);
            $validated['foto'] = $this->uploadFoto($request->file('foto'));
        }

        $clothes->update($validated);

        return redirect()
            ->route('clothes.index')
            ->with('success', 'Data pakaian berhasil diperbarui.');
    }

    public function destroy(Clothes $clothes)
    {
        $this->authorizeOwner($clothes);

        $this->deleteFoto($clothes->foto);
        $clothes->delete();

        return redirect()
            ->route('clothes.index')
            ->with('success', 'Data pakaian berhasil dihapus.');
    }

    private function uploadFoto($file): string
    {
        $folder = public_path('uploads/clothes');

        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
        $file->move($folder, $filename);

        return 'uploads/clothes/' . $filename;
    }

    private function deleteFoto(?string $path): void
    {
        if ($path && File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }

    private function authorizeOwner(Clothes $clothes): void
    {
        if ($clothes->user_id !== auth()->id()) {
            abort(403, 'Akses ditolak.');
        }
    }
}
