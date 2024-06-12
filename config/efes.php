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
            'transaksi' => [
                'title' => 'transaksi',
                'url' => 'transaksi',
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
    ],
    'user' => [
        'navbar' => [
            'dashboard' => [
                'title' => 'Produk',
                'url' => 'index',
                'sub' => [],
                'icon' => 'ri-dashboard-line'
            ],
        ],
    ],

    'wilayah' => [
        'provinsi' => [
            'banten' => [
                'kota' => [
                    'Serang' => [
                        'kecamatan' => [
                            'nama' => ['Curug', 'Kasemen', 'Taktakan', 'Walantaka', 'Cipocok Jaya']
                        ]
                    ],
                    'Tangerang' => [
                        'kecamatan' => [
                            'nama' => ['Ciledug', 'Cipondoh', 'Karawaci', 'Tangerang', 'Periuk']
                        ]
                    ]
                ]
            ],
            'jawa_barat' => [
                'kota' => [
                    'Bandung' => [
                        'kecamatan' => [
                            'nama' => ['Cibiru', 'Cicendo', 'Lengkong', 'Regol', 'Ujung Berung']
                        ]
                    ],
                    'Bogor' => [
                        'kecamatan' => [
                            'nama' => ['Bogor Barat', 'Bogor Selatan', 'Bogor Tengah', 'Bogor Timur', 'Bogor Utara']
                        ]
                    ]
                ]
            ],
            'jawa_tengah' => [
                'kota' => [
                    'Semarang' => [
                        'kecamatan' => [
                            'nama' => ['Banyumanik', 'Gajah Mungkur', 'Pedurungan', 'Semarang Barat', 'Semarang Timur']
                        ]
                    ],
                    'Surakarta' => [
                        'kecamatan' => [
                            'nama' => ['Banjarsari', 'Jebres', 'Laweyan', 'Serengan', 'Surakarta']
                        ]
                    ]
                ]
            ],
            // Daftar provinsi, kota, dan kecamatan lainnya dapat ditambahkan di sini
        ]
    ],

];
