<?php

namespace App\Http\Controllers;

use App\Models\Respon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data aktivitas dengan tipe "Closed" selama seminggu terakhir
        $activities = Respon::where('tipe', 'Closed')
            ->whereBetween('created_at', [now()->subDays(7), now()])
            ->get();

        // Buat array untuk menyimpan jumlah aktivitas per hari
        $activityCounts = [];

        // Inisialisasi tanggal awal
        $startDate = now()->subDays(7);

        // Loop untuk menghitung jumlah aktivitas per hari
        for ($i = 0; $i < 7; $i++) {
            // Hitung jumlah aktivitas dengan tipe "Closed" pada tanggal tertentu
            $count = $activities->where('created_at', '>=', $startDate)->where('created_at', '<', $startDate->copy()->addDay())->count();

            // Tambahkan jumlah aktivitas ke dalam array
            $activityCounts[] = $count;

            // Geser tanggal ke hari berikutnya
            $startDate->addDay();
        }

        // Buat respons JSON
        $response = [
            'labels' => $this->generateDateLabels(7), // Fungsi untuk menghasilkan label tanggal
            'series' => [
                [
                    'name' => 'Closed',
                    'data' => $activityCounts,
                ]
            ]
        ];

        // Kembalikan respons dalam format JSON
        $chart = json_encode($response);

        // echo json_encode($this->generateDateLabels(7), JSON_UNESCAPED_UNICODE);
        // die();

        // return json_encode($this->generateDateLabels(7));

        return view('dashboard.index', [
            'title' => 'Dashboard',
            // 'chart' => $chart
            'labels'    => json_encode($this->generateDateLabels(7), JSON_UNESCAPED_UNICODE),
            'series'    => json_encode([
                [
                    'name' => 'Closed',
                    'data' => $activityCounts,
                ]
            ])
        ]);
    }

    public function chart()
    {
        // Ambil data aktivitas dengan tipe "Closed" selama seminggu terakhir
        $activities = Respon::where('tipe', 'Closed')
            ->whereBetween('created_at', [now()->subDays(7), now()])
            ->get();

        // Buat array untuk menyimpan jumlah aktivitas per hari
        $activityCounts = [];

        // Inisialisasi tanggal awal
        $startDate = now()->subDays(7);

        // Loop untuk menghitung jumlah aktivitas per hari
        for ($i = 0; $i < 7; $i++) {
            // Hitung jumlah aktivitas dengan tipe "Closed" pada tanggal tertentu
            $count = $activities->where('created_at', '>=', $startDate)->where('created_at', '<', $startDate->copy()->addDay())->count();

            // Tambahkan jumlah aktivitas ke dalam array
            $activityCounts[] = $count;

            // Geser tanggal ke hari berikutnya
            $startDate->addDay();
        }

        // Buat respons JSON
        $response = [
            'labels' => $this->generateDateLabels(7), // Fungsi untuk menghasilkan label tanggal
            'series' => [
                [
                    'name' => 'Closed',
                    'data' => $activityCounts,
                ]
            ]
        ];

        // Kembalikan respons dalam format JSON
        return response()->json($response);
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

    // public function chart(Request $request)
    // {
    //     $range = $request->input('range');
    //     $startDate = Carbon::now()->subDays(7); // default: 7 hari yang lalu

    //     if ($range == '30') {
    //         $startDate = Carbon::now()->subDays(30);
    //     } elseif ($range == '90') {
    //         $startDate = Carbon::now()->subMonths(3);
    //     } elseif ($range == '365') {
    //         $startDate = Carbon::now()->subYear();
    //     }

    //     $responData = Respon::where('created_at', '>=', $startDate)
    //         ->orderBy('created_at')
    //         ->get();

    //     $chartData = $this->processChartData($responData);

    //     return response()->json($chartData);
    // }

    // private function processChartData($responData)
    // {
    //     $categories = ['Overdue', 'Assigned', 'Updated', 'Closed', 'Reopened'];
    //     $data = [];

    //     foreach ($categories as $category) {
    //         $data[$category] = $responData->where('tipe', $category)->count();
    //     }

    //     return $data;
    // }
}
