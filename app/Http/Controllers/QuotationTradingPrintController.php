<?php

namespace App\Http\Controllers;

use App\Models\QuotationTrading;
use chillerlan\QRCode\QRCode;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class QuotationTradingPrintController extends Controller
{
    public function __invoke(QuotationTrading $quotationTrading): View
    {
        Gate::authorize('view', $quotationTrading);

        return $this->renderDocument($quotationTrading);
    }

    public function showPublic(string $publicToken): View
    {
        $quotation = QuotationTrading::query()
            ->where('public_token', $publicToken)
            ->firstOrFail();

        return $this->renderDocument($quotation);
    }

    private function renderDocument(QuotationTrading $quotation): View
    {
        $publicUrl = route('quotation.public', $quotation->public_token);

        return view('quotations.trading.print', [
            'quotation' => $quotation->load(['items', 'customerTrading']),
            'publicUrl' => $publicUrl,
            'qrCode' => (new QRCode)->render($publicUrl),
        ]);
    }
}
