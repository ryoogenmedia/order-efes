EFES

# app\model\transaksi

## status

-   const STATUS = [
    'sukses',
    'menunggu konfirmasi',
    'menunggu pembayaran',
    'pembuatan',
    'dibatalkan',
    'pengiriman'
    ];

## FILE STORAGE

-   resit -> disk('public/storage/resit')
-   buktiPembayaran -> disk('public/storage/buktiPembayaran')
-   desain -> disk('public/storage/desain')
-   produk -> disk('public/storage/produk')
-   detail Transaksi -> disk('public/storage/Pesanan')
