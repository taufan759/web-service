<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Mahasiswa</title>

    <!-- Tambahkan CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .container {
            margin: 20px auto;
            max-width: 1200px;
            padding: 20px;
            background: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .greeting {
            font-size: 20px;
            margin-bottom: 20px;
        }
        .statistic {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .stat-card {
            background: #e9ecef;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            flex: 1;
            margin: 0 10px;
        }
        .stat-card h3 {
            margin: 0;
            font-size: 24px;
            color: #007bff;
        }
        .stat-card p {
            margin: 5px 0 0;
            font-size: 16px;
        }
        .motivasi-list {
            margin-top: 20px;
        }
        .motivasi-item {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }
        .motivasi-item:last-child {
            border-bottom: none;
        }
        .motivasi-item h4 {
            margin: 0 0 10px;
        }
        .motivasi-item p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Dashboard Mahasiswa</h1>
        <p>Selamat datang di platform motivasi mahasiswa</p>
    </div>

    <div class="container">
        <!-- Greeting -->
        <div class="greeting">
            Halo, {{ Auth::guard('customer')->user()->name }}! Berikut motivasi untuk kamu hari ini.
        </div>

        <!-- Statistik -->
        <div class="statistic">
            <div class="stat-card">
                <h3>10</h3>
                <p>Motivasi Harian</p>
            </div>
            <div class="stat-card">
                <h3>5</h3>
                <p>Motivasi Fa
