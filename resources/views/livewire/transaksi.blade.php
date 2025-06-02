<div>
    <div class="container my-2">

        {{-- Alert Message --}}
        @if ($alertMessage)
            @if (Str::contains($alertMessage, 'berhasil'))
                <div class="alert alert-success d-flex align-items-center border border-success rounded shadow-sm p-3" role="alert" style="background-color: #e6ffed;">
                    <span class="me-3" style="font-size: 1.8rem; color: green;">✔</span>
                    <div>
                        <h5 class="mb-1 fw-bold text-success">Transaksi Berhasil</h5>
                        <div class="text-success">{{ $alertMessage }}</div>
                    </div>
                </div>
            @else
                <div class="alert alert-warning d-flex align-items-center border border-warning rounded shadow-sm p-3" role="alert" style="background-color: #fff8e1;">
                    <span class="me-3" style="font-size: 1.8rem; color: #ff9800;">&#9888;</span>
                    <div>
                        <h5 class="mb-1 fw-bold text-warning">Peringatan</h5>
                        <div class="text-dark">{{ $alertMessage }}</div>
                    </div>
                </div>
            @endif
        @elseif (!$transaksiAktif)
            <div class="alert alert-warning d-flex align-items-center border border-warning rounded shadow-sm p-3" role="alert" style="background-color: #fff8e1;">
                <span class="me-3" style="font-size: 1.8rem; color: #ff9800;">&#9888;</span>
                <div>
                    <h5 class="mb-1 fw-bold text-warning">Belum Ada Transaksi</h5>
                    <div class="text-dark">Silakan mulai transaksi baru terlebih dahulu.</div>
                </div>
            </div>
        @endif

        {{-- Tombol transaksi baru / batal --}}
        <div class="row my-2">
            <div class="col-12">
                @if (!$transaksiAktif)
                    <button class="btn btn-primary" wire:click='transaksiBaru'>Transaksi Baru</button>
                @else
                    <button class="btn btn-danger" wire:click='batalTransaksi'>Batalkan Transaksi</button>
                @endif
                <button class="btn btn-info" wire:loading>Loading ...</button>
            </div>
        </div>

        {{-- Jika transaksi aktif --}}
        @if ($transaksiAktif)
            <div class="row mt-2">
                <div class="col-8">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h4 class="card-title">No Invoice : {{ $transaksiAktif->kode }}</h4>
                            <input type="string" class="form-control" placeholder="Masukkan kode invoice"
                                wire:model.live='kode'>
                            <table class="table table-bordered mt-2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($semuaProduk as $produk)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $produk->produk->kode }}</td>
                                            <td>{{ $produk->produk->nama }}</td>
                                            <td>{{ number_format($produk->produk->harga, 2, '.', ',') }}</td>
                                            <td>{{ $produk->jumlah }}</td>
                                            <td>{{ number_format($produk->produk->harga * $produk->jumlah, 2, '.', ',') }}</td>
                                            <td>
                                                <button wire:click="hapusProduk({{ $produk->id }})"
                                                    class="btn btn-danger">Hapus</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h4 class="card-title">Total Biaya</h4>
                            <div class="d-flex justify-content-between">
                                <span>Rp.</span>
                                <span>{{ number_format($totalSemuaBelanja, 2, '.', ',') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="card border-primary mt-2">
                        <div class="card-body">
                            <h4 class="card-title">Bayar</h4>
                            <input type="number" class="form-control" placeholder="Masukkan jumlah bayar"
                                wire:model.live='bayar'>
                        </div>
                    </div>

                    <div class="card border-primary mt-2">
                        <div class="card-body">
                            <h4 class="card-title">Kembalian</h4>
                            <div class="d-flex justify-content-between">
                                <span>Rp.</span>
                                <span>{{ number_format($kembalian ?? 0, 2, '.', ',') }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Alert jumlah bayar kurang --}}
                    @if ($bayar)
                        @if (($kembalian ?? 0) < 0)
                            <div class="alert alert-danger mt-2" role="alert">
                                Jumlah bayar kurang
                            </div>
                        @elseif (($kembalian ?? 0) >= 0)
                            <button class="btn btn-success w-100 mt-2" wire:click='transaksiSelesai'>Bayar</button>
                        @endif
                    @endif
                </div>
            </div>
        @endif

    </div>
</div>
