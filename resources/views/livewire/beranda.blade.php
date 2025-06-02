<style>
    body {
        background-color: #f4f4f7;
        font-family: 'Segoe UI', sans-serif;
    }

    .dashboard-header {
        background-color: #495057;
        color: white;
        padding: 20px 30px;
        border-radius: 10px;
        margin-bottom: 30px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    }

    .dashboard-header h2 {
        margin: 0;
        font-weight: 600;
    }

    .card-dashboard {
        background-color: #ffffff;
        border: none;
        border-left: 6px solid #495057;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.07);
        transition: 0.3s;
    }

    .card-dashboard:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.12);
    }

    .card-dashboard h4 {
        font-size: 18px;
        color: #343a40;
        margin-bottom: 10px;
    }

    .card-dashboard p {
        font-size: 24px;
        font-weight: bold;
        color: #495057;
    }
</style>

<div class="container mt-4">
    <div class="dashboard-header">
        <h2>Selamat Datang di Dashboard</h2>
        <p class="mb-0">Pantau aktivitas dan data penting di sini</p>
    </div>

    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="card-dashboard">
                <h4>Total Pengguna</h4>
                <p>{{ $jumlahPengguna ?? '0' }}</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card-dashboard">
                <h4>Total Transaksi</h4>
                <p>{{ $jumlahTransaksi ?? '0' }}</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card-dashboard">
                <h4>Produk Tersedia</h4>
                <p>{{ $jumlahProduk ?? '0' }}</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card-dashboard">
                <h4>Laporan Hari Ini</h4>
                <p>{{ $laporanHariIni ?? '0' }}</p>
            </div>
        </div>
    </div>
</div>
