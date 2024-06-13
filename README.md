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
-   buktiPengiriman -> disk('public/storage/buktiPengiriman')
-   desain -> disk('public/storage/desain')
-   produk -> disk('public/storage/produk')
-   user -> disk('public/storage/user')
-   detail Transaksi -> disk('public/storage/Pesanan')
