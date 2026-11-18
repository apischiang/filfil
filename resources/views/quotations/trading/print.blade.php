<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quotation {{ $quotation->quotation_number }}</title>
    <style>
        :root { color: #181818; font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
        * { box-sizing: border-box; }
        body { margin: 0; background: #f1f3f5; }
        .toolbar { width: 210mm; margin: 18px auto 10px; text-align: right; }
        .toolbar button { border: 0; border-radius: 5px; background: #2868d7; color: white; cursor: pointer; font-size: 14px; padding: 10px 16px; }
        .sheet { width: 210mm; min-height: 297mm; margin: 0 auto 24px; padding: 17mm 14mm 12mm; background: white; }
        .header { display: flex; justify-content: space-between; align-items: flex-start; margin: 0 2mm 19mm; }
        .company { font-size: 27px; font-weight: 700; letter-spacing: -.5px; }
        .document-title { text-align: right; font-size: 20px; font-weight: 700; letter-spacing: 5px; color: #2868d7; }
        .document-copy { margin-top: 4px; font-size: 13px; font-weight: 700; letter-spacing: 2px; }
        .email { margin: 0 2mm 8mm; font-size: 15px; }
        .email strong { font-weight: 700; }
        .details { display: grid; grid-template-columns: 1fr 1fr; border: 1.5px solid #222; margin-bottom: 0; }
        .customer { min-height: 100px; padding: 10px 12px; border-right: 1px solid #222; font-size: 14px; line-height: 1.45; }
        .customer strong, .meta strong { display: block; }
        .customer .company-name { font-weight: 700; }
        .meta { display: grid; grid-template-columns: 1fr 1fr; }
        .meta > div { padding: 9px 11px; border-bottom: 1px solid #222; line-height: 1.4; font-size: 14px; }
        .meta > div:nth-child(odd) { border-right: 1px solid #222; }
        .meta .validity { grid-column: 1 / -1; border-right: 0; }
        .meta .status { grid-column: 1 / -1; border-bottom: 0; }
        table { width: 100%; border: 1.5px solid #222; border-collapse: collapse; table-layout: fixed; }
        th, td { border: 1px solid #222; padding: 8px 9px; vertical-align: top; }
        th { font-size: 14px; text-align: left; }
        th.number, td.number { width: 7%; }
        th.item { width: 45%; }
        th.rate, th.quantity, th.amount { text-align: right; }
        th.rate { width: 18%; }
        th.quantity { width: 12%; }
        th.amount { width: 18%; }
        td.item-name { font-weight: 700; }
        td.item-name p { margin: 4px 0 0; font-weight: 400; white-space: pre-line; }
        td.numeric { text-align: right; white-space: nowrap; }
        .sub-value { margin-top: 4px; color: #555; font-size: 10px; }
        .summary { display: grid; grid-template-columns: 1.35fr 1fr; border: 1.5px solid #222; border-top: 0; }
        .summary-note { padding: 12px; border-right: 1px solid #222; line-height: 1.55; }
        .totals > div { display: flex; justify-content: space-between; gap: 12px; padding: 7px 10px; border-bottom: 1px solid #222; }
        .totals > div:last-child { border-bottom: 0; }
        .totals .grand { font-size: 19px; font-weight: 700; }
        .signature { display: flex; justify-content: flex-end; min-height: 95px; border: 1.5px solid #222; border-top: 0; }
        .sign-box { width: 34%; padding: 12px; border-left: 1px solid #222; display: flex; flex-direction: column; justify-content: space-between; text-align: right; }
        .sign-line { color: #555; }
        .terms { margin-top: 18px; display: grid; grid-template-columns: 1fr 1fr; gap: 8px 24px; }
        .terms h3 { margin: 0 0 4px; font-size: 12px; }
        .terms p { margin: 0; white-space: pre-line; line-height: 1.4; }
        .notes { grid-column: 1 / -1; }
        .footer { margin-top: 16px; padding-top: 8px; border-top: 1px solid #999; font-size: 10px; }
        @page { size: A4 portrait; margin: 0; }
        @media print {
            body { background: white; }
            .toolbar { display: none; }
            .sheet { width: 210mm; min-height: 297mm; margin: 0; padding: 15mm 12mm 10mm; }
            tr { break-inside: avoid; }
        }
        @media screen and (max-width: 760px) {
            .toolbar, .sheet { width: 100%; }
            .sheet { min-height: 100vh; padding: 24px 16px; }
            .header { margin: 0 0 40px; gap: 20px; }
            .company { font-size: 19px; }
            .document-title { font-size: 15px; letter-spacing: 3px; }
            .document-copy { font-size: 9px; letter-spacing: 1px; }
            .customer, .meta > div { font-size: 11px; }
            .summary { grid-template-columns: 1fr; }
            .summary-note { border-right: 0; border-bottom: 1px solid #222; }
            .sign-box { width: 50%; }
            table { font-size: 10px; }
            th, td { padding: 6px 4px; overflow-wrap: anywhere; }
            th { font-size: 10px; }
        }
    </style>
</head>
<body>
    <div class="toolbar"><button type="button" onclick="window.print()">Cetak quotation</button></div>
    <main class="sheet">
        <header class="header">
            <div class="company">PT. PUTRAMAS MULIA JAYA</div>
            <div>
                <div class="document-title">QUOTATION</div>
                <div class="document-copy">ORIGINAL FOR RECIPIENT</div>
            </div>
        </header>

        <p class="email"><strong>Email:</strong> ptputramasmuliajaya@gmail.com</p>

        <section class="details">
            <div class="customer">
                <strong>Customer Details:</strong>
                <div class="company-name">{{ $quotation->customer_company }}</div>
                @if ($quotation->customer_name)
                    <div>{{ $quotation->customer_name }}</div>
                @endif
                @if ($quotation->customer_email)
                    <div>{{ $quotation->customer_email }}</div>
                @endif
                @if ($quotation->customer_phone)
                    <div>{{ $quotation->customer_phone }}</div>
                @endif
            </div>
            <div class="meta">
                <div><strong>Quotation #:</strong>{{ $quotation->quotation_number }}</div>
                <div><strong>Date:</strong>{{ $quotation->quotation_date?->format('d M Y') }}</div>
                <div class="validity"><strong>Validity:</strong>{{ $quotation->valid_until?->format('d M Y') ?? 'Tidak ditentukan' }}</div>
                <div class="status"><strong>Status:</strong>{{ ucfirst($quotation->status) }}</div>
            </div>
        </section>

        <table>
            <thead>
                <tr>
                    <th class="number">#</th>
                    <th class="item">Item</th>
                    <th class="rate">Rate / Item</th>
                    <th class="quantity">Qty</th>
                    <th class="amount">Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quotation->items as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td class="item-name">
                            {{ $item->item_name }}
                            @if ($item->description)
                                <p>{{ $item->description }}</p>
                            @endif
                        </td>
                        <td class="numeric">
                            {{ $quotation->currency }} {{ number_format((float) $item->unit_price, 2, ',', '.') }}
                            @if ((float) $item->discount_amount > 0)
                                <div class="sub-value">Diskon: {{ $quotation->currency }} {{ number_format((float) $item->discount_amount, 2, ',', '.') }}</div>
                            @endif
                        </td>
                        <td class="numeric">{{ rtrim(rtrim(number_format((float) $item->quantity, 3, ',', '.'), '0'), ',') }} {{ $item->unit }}</td>
                        <td class="numeric">{{ $quotation->currency }} {{ number_format((float) $item->line_total, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <section class="summary">
            <div class="summary-note">
                Total Items / Qty: {{ $quotation->items->count() }} / {{ rtrim(rtrim(number_format((float) $quotation->items->sum('quantity'), 3, ',', '.'), '0'), ',') }}
            </div>
            <div class="totals">
                <div><strong>Subtotal</strong><span>{{ $quotation->currency }} {{ number_format((float) $quotation->subtotal, 2, ',', '.') }}</span></div>
                @if ((float) $quotation->discount_total > 0)
                    <div><strong>Total Discount</strong><span>{{ $quotation->currency }} {{ number_format((float) $quotation->discount_total, 2, ',', '.') }}</span></div>
                @endif
                @if ((float) $quotation->tax_total > 0)
                    <div><strong>Total Tax</strong><span>{{ $quotation->currency }} {{ number_format((float) $quotation->tax_total, 2, ',', '.') }}</span></div>
                @endif
                <div class="grand"><strong>Total</strong><span>{{ $quotation->currency }} {{ number_format((float) $quotation->grand_total, 2, ',', '.') }}</span></div>
            </div>
        </section>

        <section class="signature">
            <div class="sign-box">
                <span>For PT. PUTRAMAS MULIA JAYA</span>
                <span class="sign-line">Authorized Signatory</span>
            </div>
        </section>

        <section class="terms">
            @if ($quotation->payment_terms)
                <div><h3>Syarat Pembayaran</h3><p>{{ $quotation->payment_terms }}</p></div>
            @endif
            @if ($quotation->delivery_terms)
                <div><h3>Syarat Pengiriman</h3><p>{{ $quotation->delivery_terms }}</p></div>
            @endif
            @if ($quotation->notes)
                <div class="notes"><h3>Catatan</h3><p>{{ $quotation->notes }}</p></div>
            @endif
        </section>

        <footer class="footer">Dokumen ini dibuat secara elektronik dan tidak memerlukan tanda tangan.</footer>
    </main>
</body>
</html>
