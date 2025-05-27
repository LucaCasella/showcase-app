import 'vanilla-cookieconsent/dist/cookieconsent.css';
import 'vanilla-cookieconsent';

window.addEventListener('load', function () {
    const cc = initCookieConsent();
    window.CC = cc;

    function loadGA() {
        if (window.gaLoaded) return;
        let gaScript = document.createElement('script');
        gaScript.src = 'https://www.googletagmanager.com/gtag/js?id=G-40WTWKS9TN';
        gaScript.async = true;
        document.head.appendChild(gaScript);

        window.dataLayer = window.dataLayer || [];
        function gtag(){ window.dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-40WTWKS9TN');

        window.gaLoaded = true;
    }

    function loadClarity() {
        if (window.clarityInitialized) return;
        (function(c,l,a,r,i,t,y){
            c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
            t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
            y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
        })(window, document, "clarity", "script", "rp3ceytfuu");

        window.clarityInitialized = true;
    }

    cc.run({
        current_lang: 'it',
        autoclear_cookies: true,
        page_scripts: true,

        languages: {
            it: {
                consent_modal: {
                    title: `Utilizziamo i cookie! 🍪`,
                    description:
                        'Salve, questo sito web utilizza cookie essenziali per garantirne il corretto funzionamento e cookie di monitoraggio per capire come interagite con esso. Questi ultimi saranno impostati solo dopo il consenso. <button type="button" data-cc="c-settings" class="cc-link">Lasciatemi scegliere</button>',
                    primary_btn: {
                        text: 'Accettare tutti',
                        role: 'accept_all', // 'accept_selected' or 'accept_all'
                    },
                    secondary_btn: {
                        text: 'Rifiutare tutti',
                        role: 'accept_necessary', // 'settings' or 'accept_necessary'
                    },
                },
                settings_modal: {
                    title: 'Impostazioni dei cookie',
                    save_settings_btn: 'Salva impostazioni',
                    accept_all_btn: 'Accettare tutti',
                    reject_all_btn: 'Rifiutare tutti',
                    close_btn_label: 'Chiudi',
                    cookie_table_headers: [
                        {col1: 'Nome'},
                        {col2: 'Dominio'},
                        {col3: 'Scadenza'},
                        {col4: 'Descrizione'},
                    ],
                    blocks: [
                        {
                            title: 'Uso dei cookie 📢',
                            description:
                                'Utilizzo i cookie per garantire le funzionalità di base del sito e per migliorare la vostra esperienza online. Per ogni categoria è possibile scegliere l\'opt-in/out ogni volta che lo si desidera. Per ulteriori dettagli relativi ai cookie e ad altri dati sensibili, si prega di leggere l\'intero documento politica sulla privacy.',
                        },
                        {
                            title: 'Cookie strettamente necessari',
                            description:
                                'Questi cookie sono essenziali per il corretto funzionamento del mio sito web. Senza questi cookie, il sito web non funzionerebbe correttamente.',
                            toggle: {
                                value: 'necessary',
                                enabled: true,
                                readonly: true, // cookie categories with readonly=true are all treated as "necessary cookies"
                            },
                            cookie_table: [
                                {
                                    col1: 'preferredLanguage',
                                    col2: 'anastasiakabakova.com',
                                    col3: '2 anni',
                                    col4: "Utilizzato per memorizzare la lingua preferita dell'utente, per fornire contenuti in quella lingua.",
                                },
                                {
                                    col1: 'cc_cookie',
                                    col2: 'anastasiakabakova.com',
                                    col3: '12 mesi',
                                    col4: 'Memorizza le preferenze dell’utente riguardo all’uso dei cookie sul sito.',
                                },
                                {
                                    col1: 'XSRF-TOKEN',
                                    col2: 'anastasiakabakova.com',
                                    col3: '2 ore',
                                    col4: 'Utilizzato da Laravel per proteggere il sito da attacchi CSRF (Cross-Site Request Forgery).',
                                },
                                {
                                    col1: 'AEC',
                                    col2: '.google.com',
                                    col3: '6 mesi',
                                    col4: 'Garantisce che le richieste all’interno di una sessione provengano effettivamente dall’utente e impedisce accessi fraudolenti.',
                                },
                                {
                                    col1: 'DV',
                                    col2: '.google.com',
                                    col3: '1 giorno',
                                    col4: 'Memorizza le preferenze dell’utente e altre informazioni come la lingua o il numero di risultati da mostrare.',
                                },
                            ],
                        },
                        {
                            title: 'Cookie di performance e di analisi',
                            description:
                                "Questi cookie consentono al sito web di ricordare le scelte effettuate dall'utente in passato",
                            toggle: {
                                value: 'analytics',
                                enabled: true,
                                readonly: false,
                            },
                            cookie_table: [
                                // list of all expected cookies
                                {
                                    col1: '^_ga',
                                    col2: 'google.com',
                                    col3: '2 anni',
                                    col4: 'Utilizzato per distinguere gli utenti unici tramite un identificatore generato casualmente. Questo cookie è incluso in ogni richiesta di pagina in un sito e viene utilizzato per calcolare i dati dei visitatori, delle sessioni e delle campagne per i rapporti di analisi dei siti.',
                                    is_regex: true,
                                },
                                {
                                    col1: '_gid',
                                    col2: 'google.com',
                                    col3: '1 giorno',
                                    col4: "Utilizzato per memorizzare e aggiornare un valore univoco per ogni pagina visitata. Questo cookie tiene traccia del comportamento dell'utente.",
                                },
                                {
                                    col1: '_clck',
                                    col2: 'anastasiakabakova.com',
                                    col3: '1 anno',
                                    col4: 'Utilizzato da Microsoft Clarity per conservare un identificativo utente anonimo tra sessioni.',
                                },
                                {
                                    col1: '_clsk',
                                    col2: 'anastasiakabakova.com',
                                    col3: '1 giorno',
                                    col4: 'Utilizzato da Microsoft Clarity per collegare più pagine viste da parte dello stesso utente in una singola sessione.',
                                },
                                {
                                    col1: 'CLID',
                                    col2: '.clarity.ms',
                                    col3: '1 anno',
                                    col4: 'Impostato da Microsoft Clarity per identificare il visitatore su più siti che utilizzano Clarity.',
                                },
                                {
                                    col1: 'DV',
                                    col2: '.google.com',
                                    col3: '1 giorno',
                                    col4: 'Memorizza le preferenze dell’utente e altre informazioni come la lingua o il numero di risultati da mostrare.',
                                },
                                {
                                    col1: 'NID',
                                    col2: '.google.com',
                                    col3: '6 mesi',
                                    col4: 'Utilizzato da Google per personalizzare gli annunci pubblicitari e ricordare le preferenze degli utenti.',
                                },
                                /* {
                                  col1: 'MUID',
                                  col2: '.bing.com',
                                  col3: '13 mesi',
                                  col4: 'Cookie pubblicitario di Microsoft, utilizzato per identificare l’utente nei servizi Microsoft Ads.',
                                }, */
                            ],
                        },
                        {
                            title: 'Ulteriori informazioni',
                            description:
                                'Per qualsiasi domanda relativa alla nostra politica sui cookie e alle vostre scelte, vi preghiamo di <a class="cc-link" href="/contacts">contattarci</a>',
                        },
                    ],
                },
            },

            // ENGLISH
            en: {
                consent_modal: {
                    title: 'We use cookies! 🍪',
                    description:
                        'Hi, this website uses essential cookies to ensure it works properly and tracking cookies to understand how you interact with it. The latter will be set only after consent. <button type="button" data-cc="c-settings" class="cc-link">Let me choose</button>',
                    primary_btn: {
                        text: 'Accept all',
                        role: 'accept_all',
                    },
                    secondary_btn: {
                        text: 'Reject all',
                        role: 'accept_necessary',
                    },
                },
                settings_modal: {
                    title: 'Cookie settings',
                    save_settings_btn: 'Save settings',
                    accept_all_btn: 'Accept all',
                    reject_all_btn: 'Reject all',
                    close_btn_label: 'Close',
                    cookie_table_headers: [
                        {col1: 'Name'},
                        {col2: 'Domain'},
                        {col3: 'Expiration'},
                        {col4: 'Description'},
                    ],
                    blocks: [
                        {
                            title: 'Use of cookies 📢',
                            description:
                                'I use cookies to ensure the basic functionality of the site and to improve your online experience. For each category, you can choose to opt-in/out whenever you want. For more details regarding cookies and other sensitive data, please read the entire document privacy policy.',
                        },
                        {
                            title: 'Strictly necessary cookies',
                            description:
                                'These cookies are essential for the proper functioning of my website. Without these cookies, the website would not function correctly.',
                            toggle: {
                                value: 'necessary',
                                enabled: true,
                                readonly: true,
                            },
                            cookie_table: [
                                {
                                    col1: 'preferredLanguage',
                                    col2: 'anastasiakabakova.com',
                                    col3: '2 years',
                                    col4: "Used to store the user's preferred language to provide content in that language.",
                                },
                                {
                                    col1: 'cc_cookie',
                                    col2: 'anastasiakabakova.com',
                                    col3: '12 months',
                                    col4: 'Stores the user’s cookie preferences and consent status for this website.',
                                },
                                {
                                    col1: 'XSRF-TOKEN',
                                    col2: 'anastasiakabakova.com',
                                    col3: '2 hours',
                                    col4: 'Used by Laravel to protect the website from Cross-Site Request Forgery (CSRF) attacks.',
                                },
                                {
                                    col1: 'AEC',
                                    col2: '.google.com',
                                    col3: '6 months',
                                    col4: 'Ensures that requests during a session are made by the user and prevents malicious sites from impersonating them.',
                                },
                                {
                                    col1: 'SOCS',
                                    col2: '.google.com',
                                    col3: '13 months',
                                    col4: 'Stores the user’s cookie consent status for compliance with EU privacy laws.',
                                },
                            ],
                        },
                        {
                            title: 'Performance and analytics cookies',
                            description:
                                'These cookies allow the website to remember the choices made by the user in the past.',
                            toggle: {
                                value: 'analytics',
                                enabled: true,
                                readonly: false,
                            },
                            cookie_table: [
                                // list of all expected cookies
                                {
                                    col1: '^_ga',
                                    col2: 'google.com',
                                    col3: '2 years',
                                    col4: 'Used to distinguish unique users by means of a randomly generated identifier. This cookie is included in every page request in a site and used to calculate visitor, session, and campaign data for site analytics reports.',
                                    is_regex: true,
                                },
                                {
                                    col1: '_gid',
                                    col2: 'google.com',
                                    col3: '1 day',
                                    col4: 'Used to store and update a unique value for each page visited. This cookie tracks user behavior.',
                                },
                                {
                                    col1: '_clck',
                                    col2: 'anastasiakabakova.com',
                                    col3: '1 year',
                                    col4: 'Used by Microsoft Clarity to preserve an anonymous user ID across sessions.',
                                },
                                {
                                    col1: '_clsk',
                                    col2: 'anastasiakabakova.com',
                                    col3: '1 day',
                                    col4: 'Used by Microsoft Clarity to link multiple pageviews by the same user into a single session.',
                                },
                                {
                                    col1: 'CLID',
                                    col2: '.clarity.ms',
                                    col3: '1 year',
                                    col4: 'Set by Microsoft Clarity to identify users across websites using Clarity.',
                                },
                                {
                                    col1: 'DV',
                                    col2: '.google.com',
                                    col3: '1 day',
                                    col4: 'Stores user preferences and information such as language and search result count.',
                                },
                                {
                                    col1: 'NID',
                                    col2: '.google.com',
                                    col3: '6 months',
                                    col4: 'Used by Google to personalize ads and remember user preferences.',
                                },
                                /* {
                                  col1: 'MUID',
                                  col2: '.bing.com',
                                  col3: '13 months',
                                  col4: 'Microsoft advertising cookie used to identify users across Microsoft services.',
                                }, */
                            ],
                        },
                        {
                            title: 'Further information',
                            description:
                                'For any questions regarding our cookie policy and your choices, please <a class="cc-link" href="/contacts">contact us</a>.',
                        },
                    ],
                },
            },

            // RUSSIAN
            ru: {
                consent_modal: {
                    title: 'Мы используем файлы cookie! 🍪',
                    description:
                        'Здравствуйте! Этот сайт использует необходимые файлы cookie для корректной работы и аналитические cookie для понимания вашего взаимодействия с сайтом. Последние устанавливаются только после вашего согласия. Настроить',
                    primary_btn: {
                        text: 'Принять все',
                        role: 'accept_all',
                    },
                    secondary_btn: {
                        text: 'Отклонить все',
                        role: 'accept_necessary',
                    },
                },
                settings_modal: {
                    title: 'Настройки файлов cookie',
                    save_settings_btn: 'Сохранить настройки',
                    accept_all_btn: 'Принять все',
                    reject_all_btn: 'Отклонить все',
                    close_btn_label: 'Закрыть',
                    cookie_table_headers: [
                        {col1: 'Имя'},
                        {col2: 'Домен'},
                        {col3: 'Срок действия'},
                        {col4: 'Описание'},
                    ],
                    blocks: [
                        {
                            title: 'Использование файлов cookie 📢',
                            description:
                                'Мы используем файлы cookie для обеспечения базовой функциональности сайта и улучшения пользовательского опыта. Вы можете в любое время изменить свой выбор по каждой категории. Для получения дополнительной информации о файлах cookie и других данных, пожалуйста, прочтите <a href="/privacy" class="cc-link">политику конфиденциальности</a>.',
                        },
                        {
                            title: 'Строго необходимые файлы cookie',
                            description:
                                'Эти файлы cookie необходимы для корректной работы сайта. Без них сайт не будет функционировать должным образом.',
                            toggle: {
                                value: 'necessary',
                                enabled: true,
                                readonly: true,
                            },
                            cookie_table: [
                                {
                                    col1: 'preferredLanguage',
                                    col2: 'anastasiakabakova.com',
                                    col3: '2 года',
                                    col4: 'Используется для хранения предпочтительного языка пользователя для отображения контента на выбранном языке.',
                                },
                                {
                                    col1: 'cc_cookie',
                                    col2: 'anastasiakabakova.com',
                                    col3: '12 месяцев',
                                    col4: 'Сохраняет предпочтения пользователя в отношении использования файлов cookie на сайте.',
                                },
                                {
                                    col1: 'XSRF-TOKEN',
                                    col2: 'вашсайт.ком',
                                    col3: '2 часа',
                                    col4: 'Используется Laravel для защиты сайта от атак типа подделки межсайтовых запросов (CSRF).',
                                },
                                {
                                    col1: 'AEC',
                                    col2: '.google.com',
                                    col3: '6 месяцев',
                                    col4: 'Обеспечивает, что запросы в рамках сессии исходят от пользователя и предотвращает подделку действий.',
                                },
                                {
                                    col1: 'SOCS',
                                    col2: '.google.com',
                                    col3: '13 месяцев',
                                    col4: 'Сохраняет статус согласия пользователя с использованием cookie согласно законодательству ЕС о конфиденциальности.',
                                },
                            ],
                        },
                        {
                            title: 'Файлы cookie для производительности и аналитики',
                            description:
                                'Эти файлы cookie позволяют сайту запоминать сделанные пользователем ранее выборы и анализировать поведение для улучшения работы сайта.',
                            toggle: {
                                value: 'analytics',
                                enabled: true,
                                readonly: false,
                            },
                            cookie_table: [
                                {
                                    col1: '^_ga',
                                    col2: 'google.com',
                                    col3: '2 года',
                                    col4: 'Используется для различения уникальных пользователей с помощью случайно сгенерированного идентификатора. Применяется для аналитики посещаемости.',
                                    is_regex: true,
                                },
                                {
                                    col1: '_gid',
                                    col2: 'google.com',
                                    col3: '1 день',
                                    col4: 'Хранит уникальное значение для каждой посещённой страницы. Используется для отслеживания поведения пользователя.',
                                },
                                {
                                    col1: '_clck',
                                    col2: 'anastasiakabakova.com',
                                    col3: '1 год',
                                    col4: 'Используется Microsoft Clarity для сохранения анонимного идентификатора пользователя между сессиями.',
                                },
                                {
                                    col1: '_clsk',
                                    col2: 'anastasiakabakova.com',
                                    col3: '1 день',
                                    col4: 'Используется Microsoft Clarity для объединения нескольких просмотров страниц в одну сессию.',
                                },
                                {
                                    col1: 'CLID',
                                    col2: '.clarity.ms',
                                    col3: '1 год',
                                    col4: 'Устанавливается Microsoft Clarity для идентификации пользователей на разных сайтах.',
                                },
                                {
                                    col1: 'DV',
                                    col2: '.google.com',
                                    col3: '1 день',
                                    col4: 'Сохраняет предпочтения пользователя, такие как язык и количество результатов поиска.',
                                },
                                {
                                    col1: 'NID',
                                    col2: '.google.com',
                                    col3: '6 месяцев',
                                    col4: 'Используется Google для персонализации рекламы и запоминания пользовательских настроек.',
                                },
                                /*
                                {
                                    col1: 'MUID',
                                    col2: '.bing.com',
                                    col3: '13 месяцев',
                                    col4: 'Файл cookie Microsoft для идентификации пользователей в сервисах Microsoft.',
                                },
                                */
                            ],
                        },
                        {
                            title: 'Дополнительная информация',
                            description:
                                'Если у вас есть вопросы по поводу нашей политики использования cookie и ваших выборов, пожалуйста, <a class="cc-link" href="/contacts">свяжитесь с нами</a>.',
                        },
                    ],
                },
            },
        },

        onFirstAction: function(user_preferences, cookie) {
            if (window.CC.allowedCategory('analytics')) {
                loadGA();
                loadClarity();
            }
        },

        onAccept: function(cookie) {
            if (cookie.categories.includes('analytics')) {
                loadGA();
                loadClarity();
            }
        },
    });

    // Reopen the banner by a button in the footer
    window.openCookieSettings = () => cc.showSettings(600);
});
