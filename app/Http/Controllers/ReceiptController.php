<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{

    public function generateReceipt(Request $request)
    {

        $pdf = Pdf::loadView('receipt');

        return $pdf->download('receipt.pdf');
    }

    public function storeTransaction(Request $request)
    {
        // Simpan data ke session Laravel
        session(['transactionData' => json_encode($request->all())]);

        return response()->json(['message' => 'Data transaksi berhasil disimpan!']);
    }
}
