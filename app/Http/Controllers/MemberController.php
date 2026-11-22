<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    protected $fillable = [
        'member_code',
        'name',
        'email',
        'phone',
        'address',
    ];

    public function index()
    {
        $title = 'Daftar Anggota';
        $description = 'Anggota yang terdaftar';
        $members = Member::orderBy('name')->get();

        return view('members.index', compact('title', 'description', 'members'));
    }

    public function create()
    {
        return view('members.create', [
            'title'       => 'Tambah Anggota',
            'description' => 'Daftarkan anggota perpustakaan baru.',
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255|unique:members,name',
            'description' => 'nullable|string',
        ]);

        Member::create($data);

        return redirect()->route('members.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function borrowings(Member $member)
    {
        return Borrowing::where('member_id', $member->id)->get();
    }

    public function edit(Member $member)
    {
        return view('members.edit', [
            'title'       => 'Edit Anggota',
            'description' => 'Perbarui informasi data anggota perpustakaan.',
            'member'      => $member,
        ]);
    }

    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'member_code' => 'required|string|max:50|unique:members,member_code,' . $member->id,
            'name'        => 'required|string|max:255',
            'email'       => 'nullable|email|max:255',
            'phone'       => 'nullable|string|max:30',
            'address'     => 'nullable|string',
        ]);

        $member->update($validated);

        return redirect()->route('members.index')
            ->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('members.index')
            ->with('success', 'Anggota berhasil dihapus.');
    }
}
