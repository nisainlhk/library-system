@csrf

<div class="row g-3">
    <div class="col-md-8">
        <label for="title" class="form-label">Judul buku</label>
        <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}"
               class="form-control @error('title') is-invalid @enderror" required>
        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label for="category_id" class="form-label">Kategori</label>
        <select id="category_id" name="category_id" class="form-select @error('category_id') is-invalid @enderror">
            <option value="">Pilih kategori</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $book->category_id) == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="author" class="form-label">Penulis</label>
        <input type="text" id="author" name="author" value="{{ old('author', $book->author) }}"
               class="form-control @error('author') is-invalid @enderror" required>
        @error('author') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="publisher" class="form-label">Penerbit</label>
        <input type="text" id="publisher" name="publisher" value="{{ old('publisher', $book->publisher) }}"
               class="form-control @error('publisher') is-invalid @enderror">
        @error('publisher') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="year" class="form-label">Tahun terbit</label>
        <input type="number" id="year" name="year" value="{{ old('year', $book->year) }}" placeholder="Contoh: 2024"
               class="form-control @error('year') is-invalid @enderror">
        @error('year') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="stock" class="form-label">Jumlah stok</label>
        <input type="number" id="stock" name="stock" min="0" value="{{ old('stock', $book->stock ?? 1) }}"
               class="form-control @error('stock') is-invalid @enderror" required>
        @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <label for="description" class="form-label">Deskripsi</label>
        <textarea id="description" name="description" rows="4"
                  class="form-control @error('description') is-invalid @enderror">{{ old('description', $book->description) }}</textarea>
        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <label for="cover_image" class="form-label">Sampul buku</label>
        <input type="file" id="cover_image" name="cover_image" accept="image/*"
               class="form-control @error('cover_image') is-invalid @enderror">
        <div class="form-text">JPG, PNG, atau GIF, maksimal 2 MB.</div>
        @error('cover_image') <div class="invalid-feedback">{{ $message }}</div> @enderror

        @if ($book->cover_image)
            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Sampul {{ $book->title }}" class="cover-preview mt-3">
            <div class="form-text">Sampul saat ini. Pilih file baru untuk menggantinya.</div>
        @endif
    </div>
</div>

<div class="d-flex gap-2 mt-4">
    <button type="submit" class="btn btn-primary">{{ $submitLabel }}</button>
    <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">Batal</a>
</div>
