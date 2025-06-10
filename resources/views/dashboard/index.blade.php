@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>

    
<div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Selamat Datang ! 🎉</h5>
                          <p class="mb-4">
                            Kamu bisa <span class="fw-bold">Memantau</span> Dashboard secara real time.
                          </p>

                          <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="../assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>

    <div class="row mt-4">
        <!-- Total Stok Barang Masuk -->
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-box-open fa-2x me-3"></i>
                    <div>
                        <h5 class="card-title">Total Stok Barang Masuk</h5>
                        <p class="card-text">{{ $totalBarangMasuk }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Barang Keluar -->
        <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-box fa-2x me-3"></i>
                    <div>
                        <h5 class="card-title">Total Barang Keluar</h5>
                        <p class="card-text">{{ $totalBarangKeluar }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Supplier -->
        <div class="col-md-3">
            <div class="card bg-warning text-dark">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-truck fa-2x me-3"></i>
                    <div>
                        <h5 class="card-title">Total Supplier</h5>
                        <p class="card-text">{{ $totalSupplier }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Barang -->
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-cogs fa-2x me-3"></i>
                    <div>
                        <h5 class="card-title">Total Barang</h5>
                        <p class="card-text">{{ $totalBarang }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
