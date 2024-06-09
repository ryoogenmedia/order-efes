<?php
return [
    'admin' => [
        'navbar' => [
            'dashboard' => [
                'title' => 'dashboard',
                'url' => 'index',
                'sub' => [],
                'icon' => 'ri-dashboard-line'
            ],
            'tentang' => [
                'title' => 'tentang',
                'url' => 'tentang',
                'sub' => [],
                'icon' => 'ri-global-line'

            ],
            'produk' => [
                'title' => 'produk',
                'url' => 'produk',
                'sub' => [
                    // 'kategori' => [
                    //     'title' => 'kategori',
                    //     'url' => 'kategori',
                    // ],
                    'List' => [
                        'title' => 'list produk',
                        'url' => 'produk',
                    ],
                    'Create' => [
                        'title' => 'Create Produk ',
                        'url' => 'produk.create',
                    ],
                ],
                'icon' => 'ri-shopping-cart-line'

            ],
            'metodePengiriman' => [
                'title' => 'Metode Pengiriman',
                'url' => 'metodePengiriman',
                'sub' => [],
                'icon' => 'ri-caravan-line'

            ],
            'user' => [
                'title' => 'user',
                'url' => 'userList',
                'sub' => [],
                'icon' => 'ri-folder-user-line'

            ],
            'pesanan' => [
                'title' => 'pesanan',
                'url' => 'pesanan',
                'sub' => [],
                'icon' => 'ri-file-list-3-line'

            ],
            'laporan' => [
                'title' => 'laporan',
                'url' => 'laporan',
                'sub' => [],
                'icon' => 'ri-megaphone-line'

            ],
            'testimoni' => [
                'title' => 'testimoni',
                'url' => 'testimoni',
                'sub' => [],
                'icon' => 'ri-chat-3-line'

            ],
            'kontak' => [
                'title' => 'kontak',
                'url' => 'kontak',
                'sub' => [],
                'icon' => 'ri-phone-line'

            ],
        ],
    ]
];
