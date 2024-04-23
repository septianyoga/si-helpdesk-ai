<?php

namespace App\Http\Controllers;

use App\Models\Respon;
use App\Models\Tiket;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $day_ticket = Request()->days;

        if (!$day_ticket) {
            $day_ticket = 7;
        }

        $chart = $this->getTiketData($day_ticket);
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'chart' => $chart,
            'tiket' => [
                'opened'    => Tiket::where('status', 'Open')->count(),
                'assigned'  => Respon::where('tipe', 'Assigned')->count(),
                'overdue'   => Respon::where('tipe', 'Overdue')->count(),
                'closed'    => Respon::where('tipe', 'Closed')->count(),
                'reopened'  => Respon::where('tipe', 'Reopened')->count(),
            ]
        ]);
    }

    public function getTiketData($days)
    {
        $data = [
            'Closed'    => $this->getTiketClosed($days),
            'Reopened'    => $this->getTiketReopened($days),
            'Assigned'    => $this->getTiketAssigned($days),
            'Overdue'    => $this->getTiketOverdue($days),
            'Updated'    => $this->getTiketUpdated($days),
            'label'     => $this->generateDateLabels($days)
        ];

        return $data;
    }

    public function getTiketClosed($days)
    {
        $today = now()->startOfDay(); // Mengambil tanggal hari ini tanpa jamnya
        $yesterdayEnd = now()->subDay()->endOfDay(); // Mengambil akhir hari dari kemarin (pukul 23:59:59)
        // Ambil data aktivitas dengan tipe "Closed" selama seminggu terakhir
        $activities = Respon::where('tipe', 'Closed')
            ->whereBetween('created_at', [$today->subDays($days)->startOfDay(), $yesterdayEnd])
            ->get();

        // dd($activities);

        // Buat array untuk menyimpan jumlah aktivitas per hari
        $activityCounts = [];

        // Inisialisasi tanggal awal
        $startDate = now()->subDays($days - 1)->startOfDay(); // Mengambil tanggal awal tanpa jamnya

        // Loop untuk menghitung jumlah aktivitas per hari
        for ($i = 0; $i < $days; $i++) {
            // Hitung jumlah aktivitas dengan tipe "Closed" pada rentang tanggal tertentu
            $endDate = $startDate->copy()->endOfDay(); // Akhir hari dari tanggal tersebut (pukul 23:59:59)
            $count = $activities->where('created_at', '>=', $startDate)->where('created_at', '<=', $endDate)->count();

            // Tambahkan jumlah aktivitas ke dalam array
            $activityCounts[] = $count;

            // Geser tanggal ke hari berikutnya
            $startDate->addDay();
        }

        // Buat respons JSON
        return $activityCounts;
    }

    public function getTiketReopened($days)
    {
        $today = now()->startOfDay(); // Mengambil tanggal hari ini tanpa jamnya
        $yesterdayEnd = now()->subDay()->endOfDay(); // Mengambil akhir hari dari kemarin (pukul 23:59:59)
        // Ambil data aktivitas dengan tipe "Closed" selama seminggu terakhir
        $activities = Respon::where('tipe', 'Reopened')
            ->whereBetween('created_at', [$today->subDays($days)->startOfDay(), $yesterdayEnd])
            ->get();

        // dd($activities);

        // Buat array untuk menyimpan jumlah aktivitas per hari
        $activityCounts = [];

        // Inisialisasi tanggal awal
        $startDate = now()->subDays($days - 1)->startOfDay(); // Mengambil tanggal awal tanpa jamnya

        // Loop untuk menghitung jumlah aktivitas per hari
        for ($i = 0; $i < $days; $i++) {
            // Hitung jumlah aktivitas dengan tipe "Closed" pada rentang tanggal tertentu
            $endDate = $startDate->copy()->endOfDay(); // Akhir hari dari tanggal tersebut (pukul 23:59:59)
            $count = $activities->where('created_at', '>=', $startDate)->where('created_at', '<=', $endDate)->count();

            // Tambahkan jumlah aktivitas ke dalam array
            $activityCounts[] = $count;

            // Geser tanggal ke hari berikutnya
            $startDate->addDay();
        }

        // Buat respons JSON
        return $activityCounts;
    }

    public function getTiketAssigned($days)
    {
        $today = now()->startOfDay(); // Mengambil tanggal hari ini tanpa jamnya
        $yesterdayEnd = now()->subDay()->endOfDay(); // Mengambil akhir hari dari kemarin (pukul 23:59:59)
        // Ambil data aktivitas dengan tipe "Closed" selama seminggu terakhir
        $activities = Respon::where('tipe', 'Assigned')
            ->whereBetween('created_at', [$today->subDays($days)->startOfDay(), $yesterdayEnd])
            ->get();

        // dd($activities);

        // Buat array untuk menyimpan jumlah aktivitas per hari
        $activityCounts = [];

        // Inisialisasi tanggal awal
        $startDate = now()->subDays($days - 1)->startOfDay(); // Mengambil tanggal awal tanpa jamnya

        // Loop untuk menghitung jumlah aktivitas per hari
        for ($i = 0; $i < $days; $i++) {
            // Hitung jumlah aktivitas dengan tipe "Closed" pada rentang tanggal tertentu
            $endDate = $startDate->copy()->endOfDay(); // Akhir hari dari tanggal tersebut (pukul 23:59:59)
            $count = $activities->where('created_at', '>=', $startDate)->where('created_at', '<=', $endDate)->count();

            // Tambahkan jumlah aktivitas ke dalam array
            $activityCounts[] = $count;

            // Geser tanggal ke hari berikutnya
            $startDate->addDay();
        }

        // Buat respons JSON
        return $activityCounts;
    }

    public function getTiketOverdue($days)
    {
        $today = now()->startOfDay(); // Mengambil tanggal hari ini tanpa jamnya
        $yesterdayEnd = now()->subDay()->endOfDay(); // Mengambil akhir hari dari kemarin (pukul 23:59:59)
        // Ambil data aktivitas dengan tipe "Closed" selama seminggu terakhir
        $activities = Respon::where('tipe', 'Overdue')
            ->whereBetween('created_at', [$today->subDays($days)->startOfDay(), $yesterdayEnd])
            ->get();

        // dd($activities);

        // Buat array untuk menyimpan jumlah aktivitas per hari
        $activityCounts = [];

        // Inisialisasi tanggal awal
        $startDate = now()->subDays($days - 1)->startOfDay(); // Mengambil tanggal awal tanpa jamnya

        // Loop untuk menghitung jumlah aktivitas per hari
        for ($i = 0; $i < $days; $i++) {
            // Hitung jumlah aktivitas dengan tipe "Closed" pada rentang tanggal tertentu
            $endDate = $startDate->copy()->endOfDay(); // Akhir hari dari tanggal tersebut (pukul 23:59:59)
            $count = $activities->where('created_at', '>=', $startDate)->where('created_at', '<=', $endDate)->count();

            // Tambahkan jumlah aktivitas ke dalam array
            $activityCounts[] = $count;

            // Geser tanggal ke hari berikutnya
            $startDate->addDay();
        }

        // Buat respons JSON
        return $activityCounts;
    }


    public function getTiketUpdated($days)
    {
        $today = now()->startOfDay(); // Mengambil tanggal hari ini tanpa jamnya
        $yesterdayEnd = now()->subDay()->endOfDay(); // Mengambil akhir hari dari kemarin (pukul 23:59:59)
        // Ambil data aktivitas dengan tipe "Closed" selama seminggu terakhir
        $activities = Respon::where('tipe', 'Updated')
            ->whereBetween('created_at', [$today->subDays($days)->startOfDay(), $yesterdayEnd])
            ->get();

        // dd($activities);

        // Buat array untuk menyimpan jumlah aktivitas per hari
        $activityCounts = [];

        // Inisialisasi tanggal awal
        $startDate = now()->subDays($days - 1)->startOfDay(); // Mengambil tanggal awal tanpa jamnya

        // Loop untuk menghitung jumlah aktivitas per hari
        for ($i = 0; $i < $days; $i++) {
            // Hitung jumlah aktivitas dengan tipe "Closed" pada rentang tanggal tertentu
            $endDate = $startDate->copy()->endOfDay(); // Akhir hari dari tanggal tersebut (pukul 23:59:59)
            $count = $activities->where('created_at', '>=', $startDate)->where('created_at', '<=', $endDate)->count();

            // Tambahkan jumlah aktivitas ke dalam array
            $activityCounts[] = $count;

            // Geser tanggal ke hari berikutnya
            $startDate->addDay();
        }

        // Buat respons JSON
        return $activityCounts;
    }


    // Fungsi untuk menghasilkan label tanggal
    private function generateDateLabels($days)
    {
        $labels = [];

        // Inisialisasi tanggal awal
        $startDate = now()->subDays($days - 1);

        // Loop untuk menghasilkan label tanggal
        for ($i = 0; $i < $days; $i++) {
            $labels[] = $startDate->toDateString(); // Tambahkan tanggal ke dalam array
            $startDate->addDay(); // Geser tanggal ke hari berikutnya
        }

        return $labels;
    }
}
