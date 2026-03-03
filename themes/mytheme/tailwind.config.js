const colors = require('tailwindcss/colors');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './templates/**/*.ss'
    ],
    theme: {
        colors: {
            white: colors.white,
            black: colors.black,
            gray: colors.gray,
            red: colors.red,
            primary: colors.red,
            secondary: colors.blue
        },
        fontFamily: {
        },
        letterSpacing: {
            tightest: '-.075em',
            tighter: '-.05em',
            tight: '-.025em',
            normal: '0',
            wide: '.025em',
            wider: '.05em',
            widest: '.25em',
        },
        extend: {
            typography: {
                DEFAULT: {
                    css: {
                        '--tw-prose-body': '#000',
                        '--tw-prose-bullets': '#000',
                        '--tw-prose-invert-body': '#fff',
                        '--tw-prose-invert-bullets': '#fff',
                    }
                },
                primary: {
                    css: {
                        '--tw-prose-headings': '#fff',
                        '--tw-prose-body': '#fff',
                        '--tw-prose-bullets': '#fff',
                        '--tw-prose-invert-headings': '#fff',
                        '--tw-prose-invert-body': '#fff',
                        '--tw-prose-invert-bullets': '#fff',
                    }
                }
            },
            aspectRatio: {
                'cinema': '21 / 10',
                'extra-wide': '27 / 10'
            },
            rotate: {
                '225': '225deg'
            },
            dropShadow: {
                'white': '0 1px 2px rgba(255,255,255,0.25)'
            }
        },
    },
    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms')
    ],
}
