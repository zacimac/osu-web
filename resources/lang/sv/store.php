<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

return [
    'admin' => [
        'warehouse' => 'Lager',
    ],

    'cart' => [
        'checkout' => 'Checka ut',
        'info' => ':count_delimited föremål i varukorgen ($:subtotal)|:count_delimited föremål i varukorgen ($:subtotal)',
        'more_goodies' => 'Jag vill ta en titt på fler godsaker innan jag fullbordar beställningen',
        'shipping_fees' => 'fraktavgifter',
        'title' => 'Varukorg',
        'total' => 'totalt',

        'errors_no_checkout' => [
            'line_1' => 'Oj då, det är problem med din varukorg som hindrar en utcheckning!',
            'line_2' => 'Ta bort eller uppdatera produkterna ovan för att fortsätta.',
        ],

        'empty' => [
            'text' => 'Din varukorg är tom.',
            'return_link' => [
                '_' => 'Återvänd till :link för att hitta några godsaker!',
                'link_text' => 'butikslista',
            ],
        ],
    ],

    'checkout' => [
        'cart_problems' => 'Oj då, det finns problem med din varukorg!',
        'cart_problems_edit' => 'Klicka här för att redigera den.',
        'declined' => 'Betalningen avbröts.',
        'delayed_shipping' => 'Vi är för nuvarande överväldigad med ordrar! Du får gärna placera din order, men kommer kanske få en **extra 1-2 veckors försening** medan vi kommer ikapp alla ordrar.',
        'old_cart' => 'Din varukorg verkar vara inaktuell och har blivit återladdad, var god försök igen.',
        'pay' => 'Betala med Paypal',
        'title_compact' => 'kassan',

        'has_pending' => [
            '_' => 'Du har ofullbordade transaktioner, klicka :link för att se dem.',
            'link_text' => 'här',
        ],

        'pending_checkout' => [
            'line_1' => 'En tidigare transaktion startades men avslutades inte.',
            'line_2' => 'Välj en betalmetod för att återuppta din tidigare transaktion.',
        ],
    ],

    'discount' => 'spara :percent%',

    'invoice' => [
        'echeck_delay' => 'Eftersom din betalning var en eCheck, vänligen tillåt upp till 10 extra dagar för betalningen att rensas via PayPal! ',
        'title_compact' => 'faktura',

        'status' => [
            'processing' => [
                'title' => 'Din betalning har ännu inte bekräftats!',
                'line_1' => 'Om du redan har betalat, kan vi fortfarande vänta på att få bekräftelse på din betalning. Vänligen uppdatera denna sida om en minut eller två!',
                'line_2' => [
                    '_' => 'Om du stötte på ett problem i kassan, :link',
                    'link_text' => 'klicka här för att återuppta din transaktion',
                ],
            ],
        ],
    ],

    'order' => [
        'cancel' => 'Avbryt beställning',
        'cancel_confirm' => '',
        'cancel_not_allowed' => '',
        'invoice' => 'Visa faktura',
        'no_orders' => 'Inga beställningar att visa.',
        'paid_on' => 'Beställning slutförd :date',
        'resume' => 'Återuppta transaktionen',
        'shopify_expired' => '',

        'item' => [
            'display_name' => [
                'supporter_tag' => ':name för :username (:duration)',
            ],
            'quantity' => 'Antal',
        ],

        'not_modifiable_exception' => [
            'cancelled' => 'Du kan inte ändra din beställning då den har blivit avbruten.',
            'checkout' => 'Du kan inte ändra din beställning när den bearbetas.', // checkout and processing should have the same message.
            'default' => 'Beställningen kan inte ändras',
            'delivered' => 'Du kan inte ändra din beställning då den redan har blivit levererad.',
            'paid' => 'Du kan inte ändra din beställning då den redan har betalats.',
            'processing' => 'Du kan inte ändra din beställning när den bearbetas.',
            'shipped' => 'Du kan inte ändra din beställning då den redan har skeppats.',
        ],

        'status' => [
            'cancelled' => 'Avbruten',
            'checkout' => 'Förbereder',
            'delivered' => 'Levererad',
            'paid' => 'Betalt',
            'processing' => 'Väntar på bekräftelse',
            'shipped' => 'Skickad',
        ],
    ],

    'product' => [
        'name' => 'Namn',

        'stock' => [
            'out' => 'Detta föremål är för närvarande slut. Kom tillbaka senare!',
            'out_with_alternative' => 'Denna typ är för närvarande slut i lager :(. Testa andra typer eller kolla igen snart.',
        ],

        'add_to_cart' => 'Lägg till i varukorgen',
        'notify' => 'Notifiera mig när den är tillgänglig!',

        'notification_success' => 'du kommer bli notifierad när vi har mer i lager. klicka :link för att avbryta',
        'notification_remove_text' => 'här',

        'notification_in_stock' => 'Denna produkt är redan i lager!',
    ],

    'supporter_tag' => [
        'gift' => 'present till spelare',
        'require_login' => [
            '_' => 'Du behöver vara :link för att kunna få en osu!supporter tagg!',
            'link_text' => 'inloggad',
        ],
    ],

    'username_change' => [
        'check' => 'Skriv in ett användarnamn för att kontrollera tillgänglighet!',
        'checking' => 'Kontrollerar om :username är tillgängligt...',
        'require_login' => [
            '_' => 'Du behöver var :link för att ändra ditt namn!',
            'link_text' => 'inloggad',
        ],
    ],

    'xsolla' => [
        'distributor' => '',
    ],
];
