<div>
    <div class="container">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow border-0">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top">
                        <h4 class="mb-0">📄 Laporan Transaksi</h4>
                        <a href="{{ url('/cetak') }}" target="_blank" class="btn btn-light btn-sm shadow-sm">
                            <i class="bi bi-printer-fill"></i> Cetak
                        </a>
                    </div>
                    <div class="card-body pt-4"> <!-- padding top ditambah -->
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered align-middle mb-0">
                                <thead class="table-primary text-center">
                                    <tr>
                                        <th style="width: 5%;">No</th>
                                        <th style="width: 25%;">Tanggal</th>
                                        <th style="width: 40%;">No Inv.</th>
                                        <th style="width: 30%;">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($semuaTransaksi as $transaksi)
                                        <tr style="height: 60px;"> <!-- tinggi baris diperbesar -->
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $transaksi->created_at->format('d-m-Y H:i') }}</td>
                                            <td class="text-primary fw-bold">{{ $transaksi->kode }}</td>
                                            <td class="text-end text-success fw-semibold">
                                                Rp. {{ number_format($transaksi->total, 2, '.', ',') }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted">Belum ada transaksi</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- <div class="card-footer text-muted text-end small">
                        Diperbarui terakhir: {{ now()->format('d M Y H:i') }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
