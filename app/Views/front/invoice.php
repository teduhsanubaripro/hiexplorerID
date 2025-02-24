<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Pembayaran</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .invoice-container {
            width: 90%;
            max-width: 1000px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            position: relative;
        }
        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            border-bottom: 2px solid #ddd;
            padding-bottom: 15px;
            position: relative;
        }
        .company-identifier {
            position: absolute;
            top: 0;
            right: 0;
            padding: 10px;
            font-size: 14px;
            font-weight: bold;
            color: #555;
        }
        .company-name {
            color: #333;
            text-align: center;
        }
        .customer-details {
            margin-top: 15px;
            display: table;
            width: 100%;
        }
        .customer-details p {
            margin: 3px 0;
            font-size: 14px;
            color: #555;
            display: table-row;
        }
        .customer-details p strong {
            display: table-cell;
            padding-right: 10px;
            width: 170px;
        }
        .customer-details p span {
            display: table-cell;
        }
        .invoice-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        .invoice-table th, .invoice-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .invoice-table th {
            background: #fff;
            color: #000;
            font-weight: bold;
        }
        .total-amount {
            margin-top: 10px;
            text-align: right;
            font-size: 16px;
            font-weight: bold;
            color: #000;
        }
        .invoice-footer {
            text-align: center;
            border-top: 2px solid #ddd;
            padding-top: 15px;
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }
        .btn-print {
            width: 100%;
            background: #007bff;
            color: white;
            padding: 12px;
            border: none;
            cursor: pointer;
            margin-top: 15px;
            border-radius: 5px;
            font-size: 18px;
            transition: 0.3s;
        }
        .btn-print:hover {
            background: #0056b3;
            transform: scale(1.05);
        }
        @media (max-width: 600px) {
            .invoice-table th, .invoice-table td {
                font-size: 14px;
                padding: 8px;
            }
        }
    </style>
</head>
<body>

<div class="invoice-container">
    <div class="company-identifier">
        PT. Hi Explorer Indonesia
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="header">
        <div class="company-name">
            <h2><?= esc($booking['hotel_name']); ?></h2>
            <i>Alamat : <?= $booking['address']; ?></i>
        </div>
    </div>

    <?php
        $checkIn = strtotime($booking['check_in_date']);
        $checkOut = strtotime($booking['check_out_date']);
        $stayDuration = ($checkOut - $checkIn) / (60 * 60 * 24);
        $totalPrice = $stayDuration * $booking['price_per_night'];
    ?>

    <div class="customer-container">
        <div class="customer-details">
            <p><strong>Invoice No</strong> <span>: <?= esc($booking['invoice_id']); ?></span></p>
            <p><strong>Nama</strong> <span>: <?= esc($booking['user_name']); ?></span></p>
            <p><strong>Email</strong> <span>: <?= esc($booking['email_user']); ?></span></p>
            <p><strong>Check-in → Check-out</strong> <span>: <?= date('d M Y', strtotime($booking['check_in_date'])); ?> → <?= date('d M Y', strtotime($booking['check_out_date'])); ?></span></p>
        </div>
    </div>

    <table class="invoice-table">
        <tr>
            <th>Nama Hotel</th>
            <th>Room Type</th>
            <th>Total Tamu</th>
            <th>Lama Menginap</th>
            <th>Harga Per Malam</th>
        </tr>
        <tr>
            <td><?= esc($booking['hotel_name']); ?></td>
            <td><?= esc($booking['room_name']); ?></td>
            <td><?= esc($booking['number_of_guests']); ?></td>
            <td><?= $stayDuration; ?> malam</td>
            <td>Rp <?= number_format($booking['price_per_night'], 0, ',', '.'); ?></td>
        </tr>
    </table>

    <p class="total-amount">Sub Total: Rp <?= number_format($totalPrice, 0, ',', '.'); ?></p>
    <p class="total-amount">PPN: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 10 %</p>
    <p class="total-amount">---------------------------- +</p>
    <p class="total-amount">Total: Rp <?= number_format($booking['total_amount'], 0, ',', '.'); ?></p>
    
    <div class="invoice-footer">
        <p><em>Terima kasih atas pemesanan Anda!</em></p>
        <p>Selamat menikmati liburan! 🌴😊</p>
    </div>

    <button class="btn-print" onclick="window.print()">🖨 Cetak Invoice</button>
</div>

</body>
</html>
