<?php

return [
    'production' => false,
    'baseUrl' => '',
    'siteName' => 'Finerdy',
    'siteDescription' => 'Contabilidad personal unificada para quienes cobran y gastan en múltiples monedas',
    'siteDescriptionEn' => 'Unified personal accounting for those who earn and spend in multiple currencies',

    // Formspree endpoint (create your form at formspree.io)
    'formspreeId' => 'mpwvjokz',

    // Multi-language support
    'languages' => [
        'es' => [
            'name' => 'Español',
            'url' => '/',
        ],
        'en' => [
            'name' => 'English',
            'url' => '/en/',
        ],
    ],

    // Content translations
    'translations' => [
        'es' => [
            'nav' => [
                'features' => 'Características',
                'waitlist' => 'Solicitar acceso',
            ],
            'hero' => [
                'title' => 'Una sola contabilidad, todas tus monedas',
                'subtitle' => 'Cobras en dólares, ahorras en euros, gastas en pesos. ¿Cuánto ganaste este mes? ¿Cuánto gastaste? Finerdy unifica todo en una moneda de referencia para que finalmente entiendas tus números.',
                'cta' => 'Solicitar acceso',
            ],
            'features' => [
                'title' => 'El problema de vivir en múltiples monedas, resuelto',
                'items' => [
                    [
                        'title' => 'Moneda de referencia',
                        'description' => 'Elegí tu moneda base (USD, EUR, lo que prefieras) y ve todos tus balances, ingresos y gastos convertidos automáticamente. Por fin, una foto clara de tus finanzas.',
                    ],
                    [
                        'title' => 'Cada cuenta en su moneda',
                        'description' => 'Tu cuenta en USA en dólares, la de Europa en euros, el efectivo en pesos. Cada una opera en su moneda nativa, sin forzar conversiones artificiales.',
                    ],
                    [
                        'title' => 'Conversiones reales',
                        'description' => 'Registrá cambios de moneda con el tipo de cambio real que conseguiste. Nada de tasas oficiales que no existen. Tus números reflejan tu realidad.',
                    ],
                    [
                        'title' => 'Reportes que tienen sentido',
                        'description' => '¿Cuánto gastaste en total este mes? ¿Cómo viene el año? Reportes unificados que suman peras con manzanas (convertidas a tu moneda base).',
                    ],
                ],
            ],
            'extras' => [
                'title' => 'Y también...',
                'items' => [
                    [
                        'title' => 'Simple para registrar',
                        'description' => 'Interfaz limpia y rápida. Registrar un gasto toma segundos, no minutos.',
                    ],
                    [
                        'title' => 'Reportes para nerds',
                        'description' => 'Después, los números como te gustan: detallados, filtrables, exportables.',
                    ],
                    [
                        'title' => 'Tus datos, tu control',
                        'description' => 'Sin conectar bancos ni compartir credenciales. Registro manual, privacidad total.',
                    ],
                ],
            ],
            'waitlist' => [
                'title' => 'Solicita acceso anticipado',
                'subtitle' => 'Estamos en beta privada. Dejanos tu email y te avisamos cuando haya lugar.',
                'placeholder' => 'tu@email.com',
                'button' => 'Solicitar invitación',
                'success' => '¡Gracias! Te contactaremos pronto.',
                'privacy' => 'No spam. Solo te escribimos cuando haya novedades.',
            ],
            'footer' => [
                'tagline' => 'Contabilidad personal para el mundo real',
                'copyright' => 'Todos los derechos reservados.',
            ],
        ],
        'en' => [
            'nav' => [
                'features' => 'Features',
                'waitlist' => 'Request access',
            ],
            'hero' => [
                'title' => 'One ledger, all your currencies',
                'subtitle' => 'You earn in dollars, save in euros, spend in pesos. How much did you make this month? How much did you spend? Finerdy unifies everything into a reference currency so you can finally understand your numbers.',
                'cta' => 'Request access',
            ],
            'features' => [
                'title' => 'The multi-currency problem, solved',
                'items' => [
                    [
                        'title' => 'Reference currency',
                        'description' => 'Choose your base currency (USD, EUR, whatever you prefer) and see all your balances, income, and expenses automatically converted. Finally, a clear picture of your finances.',
                    ],
                    [
                        'title' => 'Each account in its currency',
                        'description' => 'Your US account in dollars, the European one in euros, cash in pesos. Each operates in its native currency, no artificial conversions forced.',
                    ],
                    [
                        'title' => 'Real conversions',
                        'description' => 'Record currency exchanges with the actual rate you got. No official rates that don\'t exist. Your numbers reflect your reality.',
                    ],
                    [
                        'title' => 'Reports that make sense',
                        'description' => 'How much did you spend in total this month? How\'s the year going? Unified reports that add apples and oranges (converted to your base currency).',
                    ],
                ],
            ],
            'extras' => [
                'title' => 'And also...',
                'items' => [
                    [
                        'title' => 'Simple to log',
                        'description' => 'Clean and fast interface. Recording an expense takes seconds, not minutes.',
                    ],
                    [
                        'title' => 'Reports for nerds',
                        'description' => 'Then, the numbers the way you like them: detailed, filterable, exportable.',
                    ],
                    [
                        'title' => 'Your data, your control',
                        'description' => 'No connecting banks or sharing credentials. Manual logging, total privacy.',
                    ],
                ],
            ],
            'waitlist' => [
                'title' => 'Request early access',
                'subtitle' => "We're in private beta. Leave your email and we'll let you know when there's room.",
                'placeholder' => 'you@email.com',
                'button' => 'Request invitation',
                'success' => 'Thanks! We\'ll be in touch soon.',
                'privacy' => 'No spam. We only write when there\'s news.',
            ],
            'footer' => [
                'tagline' => 'Personal accounting for the real world',
                'copyright' => 'All rights reserved.',
            ],
        ],
    ],

    'collections' => [],
];
