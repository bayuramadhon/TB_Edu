<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 20px;
            display: flex;
            justify-content: center;
        }
        .receipt-container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        .total-section {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .text-center {
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <h2>Receipt</h2>

        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody id="receipt-body">
                <!-- Data dari JavaScript akan masuk di sini -->
            </tbody>
        </table>

        <div class="total-section" id="grand-total">Grand Total: Rp 0</div>
        <div class="total-section" id="payment">Payment: Rp 0</div>
        <div class="total-section" id="change">Change: Rp 0</div>

        <p class="text-center">Terima kasih telah berbelanja!</p>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let transactionData = sessionStorage.getItem('transactionData');

            if (!transactionData) {
                alert("Data transaksi tidak ditemukan!");
                window.history.back();
                return;
            }

            transactionData = JSON.parse(transactionData);

            let receiptBody = document.getElementById('receipt-body');
            let grandTotalElement = document.getElementById('grand-total');
            let paymentElement = document.getElementById('payment');
            let changeElement = document.getElementById('change');

            let html = "";
            transactionData.orders.forEach((order, index) => {
                html += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${order.title}</td>
                        <td>${order.price}</td>
                        <td>${order.quantity}</td>
                        <td>${order.total}</td>
                    </tr>
                `;
            });

            receiptBody.innerHTML = html;
            grandTotalElement.innerText = `Grand Total: ${transactionData.grandTotal}`;
            paymentElement.innerText = `Payment: Rp ${parseInt(transactionData.payment).toLocaleString('id-ID')}`;
            changeElement.innerText = `Change: ${transactionData.change}`;

            // Cetak otomatis setelah loading selesai
            setTimeout(() => {
                window.print();
            }, 500);
        });
    </script>
</body>
</html>
