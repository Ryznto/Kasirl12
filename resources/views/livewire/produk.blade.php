<div>
    <div class="container">
        <div class="row my-4">
            <div class="col-12 d-flex gap-2 justify-content-start flex-wrap">
                <button wire:click="pilihMenu('lihat')"
                    class="btn {{ $pilihanMenu == 'lihat' ? 'btn-dark' : 'btn-outline-dark' }}">
                    📦 Semua produk
                </button>
                <button wire:click="pilihMenu('tambah')"
                    class="btn {{ $pilihanMenu == 'tambah' ? 'btn-success' : 'btn-outline-success' }}">
                    ➕ Tambah produk
                </button>
                <button wire:click="pilihMenu('excel')"
                    class="btn {{ $pilihanMenu == 'excel' ? 'btn-warning text-white' : 'btn-outline-warning' }}">
                    📁 Import produk
                </button>
                <button wire:loading class="btn btn-info">
                    ⏳ Loading...
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                @if ($pilihanMenu == 'lihat')
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-dark text-white fw-bold">
                            📦 Semua Produk
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover table-bordered align-middle">
                                <thead class="table-secondary text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($semuaProduk as $produk)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $produk->kode }}</td>
                                            <td>{{ $produk->nama }}</td>
                                            <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                                            <td>{{ $produk->stok }}</td>
                                            <td class="text-center">
                                                <button wire:click="pilihEdit({{ $produk->id }})"
                                                    class="btn btn-sm btn-outline-primary me-1">
                                                    ✏️ Edit
                                                </button>
                                                <button wire:click="pilihHapus({{ $produk->id }})"
                                                    class="btn btn-sm btn-outline-danger">
                                                    🗑️ Hapus
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @elseif ($pilihanMenu == 'tambah' || $pilihanMenu == 'edit')
                    <div class="card shadow border-0">
                        <div class="card-header bg-success text-white fw-bold">
                            {{ $pilihanMenu == 'tambah' ? '➕ Tambah Produk' : '✏️ Edit Produk' }}
                        </div>
                        <div class="card-body">
                            <form wire:submit="{{ $pilihanMenu == 'tambah' ? 'simpan' : 'simpanEdit' }}">
                                <div class="mb-3">
                                    <label class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control" wire:model="nama" />
                                    @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kode / Barcode</label>
                                    <input type="text" class="form-control" wire:model="kode" />
                                    @error('kode') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Harga</label>
                                    <input type="number" class="form-control" wire:model="harga" />
                                    @error('harga') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Stok</label>
                                    <input type="number" class="form-control" wire:model="stok" />
                                    @error('stok') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <button type="submit" class="btn btn-success mt-2">💾 SIMPAN</button>
                            </form>
                        </div>
                    </div>
                @elseif ($pilihanMenu == 'hapus')
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-danger text-white fw-bold">
                            🛑 Hapus Produk
                        </div>
                        <div class="card-body">
                            <p>Anda yakin ingin menghapus produk berikut?</p>
                            <ul class="list-unstyled mb-3">
                                <li><strong>Kode:</strong> {{ $produkTerpilih->kode }}</li>
                                <li><strong>Nama:</strong> {{ $produkTerpilih->nama }}</li>
                            </ul>
                            <button class="btn btn-danger me-2" wire:click='hapus'>✅ HAPUS</button>
                            <button class="btn btn-secondary" wire:click='batal'>❌ BATAL</button>
                        </div>
                    </div>
                @elseif ($pilihanMenu == 'excel')
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-warning text-white fw-bold">
                            📁 Import Produk dari Excel
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent="importExcel">
                                <input type="file" class="form-control mb-3" wire:model='fileExcel' />
                                <button class="btn btn-warning text-white" type="submit">📤 KIRIM</button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
