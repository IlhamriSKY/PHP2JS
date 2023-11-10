import {defineConfig} from 'vitepress'

export default defineConfig({
    title: "PHP2JS",
    description: "Share PHP-defined variables directly with the JavaScript files you want to use in your system.",
    lang: 'en-US',
    lastUpdated: true,
    base: '/PHP2JS',
    themeConfig: {
        logo: '/public/php2js.png',
        nav: [
            {
                text: 'Docs ^4.0',
                link: '/v4/',
            },
            {
                text: 'Versions',
                items: [
                  { text: 'Docs => ^4.0', link: '/v4/' },
                  { text: 'Docs => ^3.8', link: '/v3/' },
                  { text: 'Docs => ^2.6', link: '/v2/' }
                ]
            }
        ],
        sidebar: {
            '/v2/': [
                {
                    text: 'Getting Started',
                    collapsed: false,
                    items: [
                        {text: 'Introduction', link: '/v2/'},
                        {text: 'Installation', link: '/v2/installation'},
                        {text: 'Usage', link: '/v2/usage'},
                        {text: 'Methods', link: '/v2/methods'},
                        {text: 'Contribute', link: '/v2/contribute'},
                    ]
                }
            ],
            '/v3/': [
                {
                    text: 'Getting Started',
                    collapsed: false,
                    items: [
                        {text: 'Introduction', link: '/v3/'},
                        {text: 'Installation', link: '/v3/getting-started/installation'},
                        {text: 'Versions', link: '/v3/getting-started/versions'},
                    ]
                }, {
                    text: 'Controllers',
                    collapsed: true,
                    items: [
                        {text: 'View Return', link: '/v3/controllers/view-return'},
                        {text: 'Share with JavaScript', link: '/v3/controllers/share-with-js'},
                        {text: 'Assign a Custom Alias', link: '/v3/controllers/assign-custom-alias'},
                        {text: 'Share Specific Variables', link: '/v3/controllers/share-specific-vars'},
                        {text: 'Prebuilt Blocks', link: '/v3/controllers/prebuild-blocks'},
                    ]
                }, {
                    text: 'Blade Directives',
                    collapsed: true,
                    items: [
                        {text: 'Everything', link: '/v3/blade-directives/everything'},
                        {text: 'Specific Variables', link: '/v3/blade-directives/specific-variables'}
                    ]
                }, {
                    text: 'Blade Blocks',
                    collapsed: true,
                    items: [
                        {text: 'Agent Data', link: '/v3/blade-blocks/agent-data'},
                        {text: 'URL Data', link: '/v3/blade-blocks/url-data'},
                        {text: 'CSRF Token', link: '/v3/blade-blocks/csrf-token'},
                        {text: 'Laravel Data', link: '/v3/blade-blocks/laravel-data'},
                        {text: 'PHP Data', link: '/v3/blade-blocks/php-data'},
                        {text: 'User in Session', link: '/v3/blade-blocks/user-in-session'},
                    ]
                }, {
                    text: 'JavaScript Methods',
                    collapsed: true,
                    items: [
                        {text: 'Clear', link: '/v3/javascript-methods/clear'},
                        {text: 'Assign', link: '/v3/javascript-methods/assign'},
                        {text: 'Only', link: '/v3/javascript-methods/only'},
                        {text: 'Except', link: '/v3/javascript-methods/except'},
                        {text: 'Check', link: '/v3/javascript-methods/check'},
                        {text: 'Get', link: '/v3/javascript-methods/get'},
                        {text: 'Set', link: '/v3/javascript-methods/set'},
                    ]
                }, {
                    text: 'Contribute',
                    collapsed: true,
                    items: [
                        {text: 'Bug Report', link: '/v3/contribute/report-bugs'},
                        {text: 'Contribution', link: '/v3/contribute/contribution'}
                    ]
                }
            ]
        },

        socialLinks: [
            {icon: 'github', link: 'https://github.com/rmunate/PHP2JS'}
        ],
        search: {
            provider: 'local'
        }
    },
    head: [
        ['link', {
                rel: 'icon',
                href: '/PHP2JS/php2js.png',
                type: 'image/png'
            }
        ],
        ['meta', {
                property: 'og:image',
                content: '/PHP2JS/logo-github.png' 
            }
        ],
        ['meta', {
                property: 'og:image:secure_url',
                content: '/PHP2JS/logo-github.png'
            }
        ],
        ['meta', {
                property: 'og:image:width',
                content: '600'
            }
        ],
        ['meta', {
                property: 'og:image:height',
                content: '400'
            }
        ],
        ['meta', {
                property: 'og:title',
                content: 'PHP2JS'
            }
        ],
        ['meta', {
                property: 'og:description',
                content: 'Share PHP-defined variables directly with the JavaScript files you want to use in your system.'
            }
        ],
        ['meta', {
                property: 'og:url',
                content: 'https://rmunate.github.io/PHP2JS/'
            }
        ],
        ['meta', {
                property: 'og:type',
                content: 'website'
            }
        ],
        ['script', {async: '', src: '/.vitepress/page.js'}]
    ]
})