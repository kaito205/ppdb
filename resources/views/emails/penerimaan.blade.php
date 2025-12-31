<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Diterima</title>
    <style>
        /* Reset styles */
        body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important; background-color: #f4f6f9; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; -webkit-font-smoothing: antialiased; }
        table { border-spacing: 0; border-collapse: collapse; }
        td { padding: 0; vertical-align: top; }
        img { border: 0; }
        a { text-decoration: none; }
        
        /* Container */
        .email-wrapper { width: 100%; table-layout: fixed; background-color: #f4f6f9; padding: 40px 0; }
        .email-body { width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        
        /* Header */
        .email-header { background: linear-gradient(135deg, #0E2E72 0%, #1d4ed8 100%); padding: 30px 40px; text-align: center; }
        .email-title { color: #ffffff; margin: 0; font-size: 24px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; }
        .email-subtitle { color: #ffd700; margin: 5px 0 0; font-size: 14px; font-weight: 500; letter-spacing: 2px; }

        /* Content */
        .content-cell { padding: 40px; color: #333333; line-height: 1.6; font-size: 16px; }
        .greeting { font-size: 18px; font-weight: bold; color: #0E2E72; margin-bottom: 20px; display: block; }
        .message-content { color: #4a5568; margin-bottom: 30px; }
        
        /* Highlight Box */
        .status-box { background-color: #ecfdf5; border-left: 4px solid #10b981; padding: 15px 20px; margin: 20px 0; border-radius: 4px; color: #065f46; }

        /* Features/Social */
        .features-row { background-color: #f8fafc; padding: 25px 40px; text-align: center; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; }
        .social-link { display: inline-block; margin: 0 10px; text-decoration: none; }
        
        /* Footer */
        .email-footer { background-color: #f4f6f9; padding: 30px 40px; text-align: center; color: #718096; font-size: 12px; line-height: 1.5; }
        .footer-address { margin-bottom: 15px; }

        /* Mobile Responsive */
        @media only screen and (max-width: 600px) {
            .email-body { width: 100% !important; border-radius: 0; }
            .content-cell { padding: 25px !important; }
            .email-header { padding: 25px 20px !important; }
        }
    </style>
</head>
<body>
    <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table class="email-body" width="600" cellpadding="0" cellspacing="0">
                    <!-- Header -->
                    <tr>
                        <td class="email-header">
                            <h1 class="email-title">SMA ERHA JATINAGARA</h1>
                            <p class="email-subtitle">UNGGUL DALAM PRESTASI</p>
                        </td>
                    </tr>
                    
                    <!-- Main Content -->
                    <tr>
                        <td class="content-cell">
                            <span class="greeting">Halo, {{ $nama }}!</span>
                            
                            <div class="message-content">
                                <p>Terima kasih telah mendaftar di SMA ERHA Jatinagara. Berdasarkan hasil verifikasi kelengkapan berkas administrasi:</p>
                                
                                <div class="status-box">
                                    <strong style="font-size: 18px; display: block; margin-bottom: 5px;">INFO STATUS:</strong>
                                    Silahkan lakukan <strong>DAFTAR ULANG</strong> untuk menjadi siswa baru Tahun Ajaran 2025/2026.
                                </div>
                                
                                <p>Kami telah melampirkan <strong>Surat Pemberitahuan (PDF)</strong> dan <strong>Formulir Pendaftaran (PDF)</strong> pada email ini.</p>
                                <p>Harap mencetak kedua dokumen tersebut dan membawanya saat melakukan daftar ulang sesuai jadwal yang tertera.</p>
                            </div>
                            
                            <!-- Signature -->
                            <div style="margin-top: 30px; padding-top: 20px; border-top: 1px dashed #e2e8f0; color: #718096; font-size: 14px;">
                                Salam Hangat,<br>
                                <strong style="color: #0E2E72;">Panitia PPDB SMA ERHA Jatinagara</strong>
                            </div>
                        </td>
                    </tr>

                    <!-- Social Media Links -->
                    <tr>
                        <td class="features-row">
                            <p style="margin: 0 0 15px; font-size: 13px; font-weight: 600; color: #64748b; text-transform: uppercase;">Sosial Media Kami</p>
                            <a href="https://web.facebook.com/smaerhajatinagara" class="social-link" style="margin: 0 5px;">
                                <img src="{{ $message->embed(public_path('img/icons8-facebook.webp')) }}" alt="Facebook" width="30" height="30" style="width: 30px; height: 30px;">
                            </a>
                            <a href="https://www.instagram.com/smaerhajatinagara/" class="social-link" style="margin: 0 5px;">
                                <img src="{{ $message->embed(public_path('img/icons8-instagram.webp')) }}" alt="Instagram" width="30" height="30" style="width: 30px; height: 30px;">
                            </a>
                            <a href="https://www.youtube.com/@smaerhajatinagara" class="social-link" style="margin: 0 5px;">
                                <img src="{{ $message->embed(public_path('img/icons8-youtube.webp')) }}" alt="YouTube" width="30" height="30" style="width: 30px; height: 30px;">
                            </a>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td class="email-footer">
                            <div class="footer-address">
                                <strong>SMA ERHA JATINAGARA</strong><br>
                                Jl. Raya Jatinagara No. 123, Ciamis, Jawa Barat<br>
                                Email: ppdb@smaerhajatinagara.sch.id | WhatsApp: +62 813-9406-0612
                            </div>
                            <p>&copy; {{ date('Y') }} SMA ERHA Jatinagara. All rights reserved.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
