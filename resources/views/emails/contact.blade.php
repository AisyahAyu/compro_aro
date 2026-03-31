<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesan Baru dari Formulir Hubungi Kami</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f7f7f7; margin: 0; padding: 0; }
        .email-container { background: #fff; max-width: 480px; margin: 32px auto; border-radius: 12px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); padding: 32px 28px; }
        .email-header { text-align: center; margin-bottom: 18px; }
        .email-title { color: #f78b00; font-size: 1.4rem; font-weight: 700; margin-bottom: 2px; }
        .email-caption { color: #222; font-size: 1.08rem; margin-bottom: 18px; }
        .email-table { width: 100%; border-collapse: collapse; margin-bottom: 18px; }
        .email-table td { padding: 7px 0; vertical-align: top; font-size: 1rem; }
        .label { color: #888; font-size: 0.97rem; width: 140px; }
        .value { color: #222; font-weight: 500; }
        .email-footer { text-align: center; color: #888; font-size: 0.93rem; margin-top: 18px; }
        .highlight { color: #f78b00; font-weight: 700; }
        a { color: #0a0055; text-decoration: underline; }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <div class="email-title">Pesan Baru dari Formulir Hubungi Kami</div>
            <div class="email-caption">Ada pesan baru dari website PT ARO BASKARA ESA</div>
        </div>
        <table class="email-table">
            <tr>
                <td class="label">Nama</td>
                <td class="value">{{ $data['full_name'] }}</td>
            </tr>
            <tr>
                <td class="label">Perusahaan</td>
                <td class="value">{{ $data['company_name'] }}</td>
            </tr>
            <tr>
                <td class="label">Email</td>
                <td class="value"><a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a></td>
            </tr>
            <tr>
                <td class="label">Telepon</td>
                <td class="value">{{ $data['phone'] }}</td>
            </tr>
            <tr>
                <td class="label">Kategori Produk</td>
                <td class="value">{{ $data['product_category'] }}</td>
            </tr>
            <tr>
                <td class="label">Estimasi Unit</td>
                <td class="value">{{ $data['estimated_units'] }}</td>
            </tr>
            <tr>
                <td class="label">Pesan</td>
                <td class="value">{{ $data['message'] }}</td>
            </tr>
        </table>
        <div class="email-footer">
            Email ini dikirim otomatis dari website <span class="highlight">PT ARO BASKARA ESA</span>.<br>
            Silakan balas langsung ke pengirim jika perlu.
        </div>
    </div>
</body>
</html>
