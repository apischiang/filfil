<?php

namespace App\Http\Controllers;

use App\Models\QuotationTrading;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class QuotationTradingPrintController extends Controller
{
    public function __invoke(QuotationTrading $quotationTrading): View
    {
        Gate::authorize('view', $quotationTrading);

        return view('quotations.trading.print', [
            'quotation' => $quotationTrading->load(['items', 'customerTrading']),
        ]);
    }
}
