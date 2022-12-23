<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Student Portal</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-lg text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-lg text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-lg text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="1090.000000pt" height="236.000000pt" viewBox="0 0 1090.000000 236.000000" preserveAspectRatio="xMidYMid meet">
                        <g transform="translate(0.000000,236.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                            <path d="M935 2299 c-141 -34 -227 -79 -310 -163 -89 -90 -142 -201 -161 -331 -4 -33 -16 -61 -35 -82 -33 -38 -52 -101 -43 -140 19 -82 88 -143 163 -143 26 0 30 -5 46 -57 23 -74 48 -119 91 -163 19 -20 34 -39 34 -43 0 -4 -22 -7 -48 -7 -72 0 -196 -35 -269 -76 -85 -47 -174 -139 -217 -224 -58 -115 -66 -174 -66 -484 l0 -276 -30 0 c-27 0 -30 -3 -30 -30 l0 -30 980 0 980 0 0 30 c0 29 -2 30 -45 30 l-45 0 0 278 c0 306 -7 355 -61 470 -40 82 -143 192 -224 238 -71 39 -196 74 -267 74 -26 0 -48 4 -48 8 0 19 27 32 64 32 54 1 123 36 159 82 24 30 30 49 35 105 4 55 10 74 32 100 60 69 60 159 0 223 -20 21 -30 45 -34 83 -22 171 -111 315 -254 408 -76 50 -102 60 -212 85 -73 16 -126 16 -185 3z m204 -80 c160 -36 308 -176 356 -336 21 -69 20 -103 -4 -103 -15 0 -24 15 -40 61 -50 147 -155 249 -310 298 -50 16 -185 13 -246 -4 -138 -41 -252 -156 -300 -302 -13 -41 -21 -53 -37 -53 -19 0 -20 4 -15 53 19 163 190 345 363 386 53 12 180 13 233 0z m-31 -151 c135 -33 243 -138 278 -270 22 -83 20 -88 -25 -88 -22 0 -71 7 -109 15 -153 32 -250 88 -284 163 -11 26 -24 54 -28 62 -4 8 -17 15 -30 15 -26 0 -37 -15 -45 -67 -6 -41 -56 -97 -107 -123 -30 -14 -108 -32 -108 -24 0 2 7 26 15 53 59 193 256 311 443 264z m-153 -293 c77 -70 225 -125 379 -140 l68 -7 -4 -111 c-4 -91 -9 -120 -27 -157 -42 -82 -37 -80 -198 -80 l-143 0 0 -35 0 -35 108 0 c107 0 107 0 83 -19 -76 -58 -249 -67 -353 -19 -76 35 -138 95 -179 170 -32 61 -33 68 -37 193 l-4 130 56 13 c72 17 129 47 175 94 20 21 37 38 37 38 1 0 18 -16 39 -35z m-385 -165 c0 -112 -5 -118 -67 -80 -39 23 -54 79 -32 119 13 23 70 61 92 61 4 0 7 -45 7 -100z m978 73 c55 -34 54 -120 -1 -153 -62 -38 -67 -32 -67 81 0 99 0 100 23 94 12 -4 32 -14 45 -22z m-31 -283 c-7 -51 -30 -88 -64 -101 -30 -11 -41 -5 -25 13 5 7 18 39 27 71 14 50 19 57 42 57 24 0 25 -2 20 -40z m-632 -451 l76 -150 -33 3 c-31 3 -36 9 -104 145 -39 78 -69 145 -66 148 3 3 16 5 29 5 20 0 34 -21 98 -151z m405 139 c0 -7 -31 -74 -68 -148 -64 -129 -69 -135 -100 -138 l-33 -3 76 150 c67 134 78 151 100 151 14 0 25 -6 25 -12z m-563 -128 c35 -68 65 -132 68 -141 5 -16 -11 -17 -177 -21 -177 -3 -184 -4 -220 -29 -92 -63 -98 -87 -98 -400 l0 -259 -50 0 -50 0 0 293 c0 322 4 348 65 453 61 104 194 201 308 224 86 17 85 17 154 -120z m829 94 c139 -56 256 -197 284 -344 5 -29 10 -176 10 -327 l0 -274 -52 3 -53 3 -5 281 c-5 275 -5 281 -29 315 -13 19 -40 46 -60 59 -34 24 -44 25 -222 28 l-186 4 66 131 c37 73 70 138 75 145 11 19 93 7 172 -24z m-473 -99 c-31 -60 -56 -111 -57 -112 -1 -1 -27 48 -58 110 l-56 112 113 0 113 0 -55 -110z m531 -258 c51 -34 56 -63 56 -337 l0 -250 -646 0 -645 0 3 270 3 270 26 26 c15 14 42 30 60 34 19 5 277 8 574 7 505 -2 543 -3 569 -20z"/>
                            <path d="M850 1584 c-41 -14 -60 -30 -75 -59 -21 -45 -20 -45 24 -45 25 0 41 5 45 15 3 8 17 15 31 15 14 0 28 -7 31 -15 4 -9 19 -15 40 -15 29 0 34 4 34 23 0 45 -83 96 -130 81z"/>
                            <path d="M1145 1583 c-31 -8 -75 -54 -75 -80 0 -19 5 -23 34 -23 21 0 36 6 40 15 3 8 17 15 31 15 14 0 28 -7 31 -15 6 -14 84 -23 84 -9 0 16 -32 71 -48 80 -23 15 -72 23 -97 17z"/>
                            <path d="M1510 570 l0 -40 40 0 40 0 0 40 0 40 -40 0 -40 0 0 -40z"/>
                            <path d="M965 556 c-72 -32 -109 -114 -84 -188 40 -121 217 -138 275 -27 22 43 20 126 -4 158 -46 61 -125 86 -187 57z m109 -87 c34 -27 35 -71 1 -104 -13 -14 -36 -25 -50 -25 -35 0 -75 42 -75 79 0 34 39 71 75 71 12 0 34 -9 49 -21z"/>
                            <path d="M1517 453 c-4 -3 -7 -64 -7 -135 l0 -128 40 0 40 0 0 135 0 135 -33 0 c-19 0 -37 -3 -40 -7z"/>
                            <path d="M1860 1930 c0 -39 1 -40 35 -40 34 0 35 1 35 40 0 39 -1 40 -35 40 -34 0 -35 -1 -35 -40z"/>
                            <path d="M1860 1780 c0 -28 3 -30 35 -30 32 0 35 2 35 30 0 28 -3 30 -35 30 -32 0 -35 -2 -35 -30z"/>
                            <path d="M10550 1161 c0 -595 0 -601 20 -601 20 0 20 5 18 597 -3 560 -4 598 -20 601 -17 3 -18 -31 -18 -597z"/>
                            <path d="M4880 1489 l0 -261 -42 36 c-96 82 -250 100 -370 42 -73 -35 -149 -117 -179 -194 -51 -130 -31 -325 44 -424 127 -166 365 -199 508 -70 l49 44 0 -51 0 -51 95 0 95 0 0 595 0 595 -100 0 -100 0 0 -261z m-121 -335 c171 -86 172 -340 2 -426 -85 -43 -163 -33 -231 28 -50 46 -75 111 -74 194 2 174 156 277 303 204z"/>
                            <path d="M2600 1694 c-121 -32 -203 -95 -246 -187 -34 -73 -34 -191 0 -262 45 -97 101 -137 271 -195 198 -68 239 -102 239 -196 0 -99 -75 -159 -199 -158 -83 0 -142 23 -203 79 l-42 37 -70 -62 c-38 -35 -70 -66 -70 -71 0 -14 74 -69 127 -94 148 -71 350 -73 484 -5 109 56 170 152 177 281 6 105 -10 158 -65 219 -59 66 -90 84 -238 136 -151 53 -177 66 -204 100 -51 65 -27 160 52 204 85 48 218 28 297 -45 l25 -23 64 69 c62 68 63 70 46 89 -25 27 -107 66 -180 85 -74 19 -192 18 -265 -1z"/>
                            <path d="M7570 1121 c0 -554 0 -561 20 -561 20 0 20 7 20 274 l0 274 198 4 c187 3 200 4 252 29 114 53 165 135 165 264 0 94 -21 143 -84 196 -74 64 -111 72 -353 77 l-218 4 0 -561z m464 504 c62 -23 127 -87 144 -141 32 -110 -3 -226 -88 -286 -62 -45 -134 -58 -317 -58 l-163 0 0 256 0 256 188 -4 c147 -4 198 -9 236 -23z"/>
                            <path d="M1860 1625 c0 -33 2 -35 35 -35 33 0 35 2 35 35 0 33 -2 35 -35 35 -33 0 -35 -2 -35 -35z"/>
                            <path d="M3130 1430 l0 -110 -70 0 -70 0 0 -80 0 -80 70 0 70 0 0 -217 c0 -129 5 -234 11 -258 15 -55 82 -120 139 -135 46 -12 186 -10 208 4 8 4 12 34 12 80 l0 73 -71 -1 c-109 -1 -109 -2 -109 250 l0 204 95 0 95 0 0 80 0 80 -95 0 -95 0 0 110 0 110 -95 0 -95 0 0 -110z"/>
                            <path d="M6790 1430 l0 -110 -70 0 -70 0 0 -80 0 -80 70 0 70 0 0 -217 c0 -129 5 -234 11 -258 15 -55 82 -120 139 -135 46 -12 186 -10 208 4 8 4 12 34 12 80 l0 73 -71 -1 c-109 -1 -109 -2 -109 250 l0 204 95 0 95 0 0 80 0 80 -95 0 -95 0 0 110 0 110 -95 0 -95 0 0 -110z"/>
                            <path d="M120 1475 c0 -33 2 -35 35 -35 33 0 35 2 35 35 0 33 -2 35 -35 35 -33 0 -35 -2 -35 -35z"/>
                            <path d="M9560 1401 l0 -111 -80 0 c-64 0 -80 -3 -80 -15 0 -12 16 -15 80 -15 l80 0 0 -300 c0 -324 2 -342 53 -389 42 -38 197 -43 197 -5 0 12 -9 13 -49 8 -66 -9 -117 9 -142 50 -18 29 -19 53 -19 334 l0 302 105 0 c87 0 105 3 105 15 0 12 -18 15 -105 15 l-104 0 -3 107 c-3 93 -5 108 -20 111 -16 3 -18 -7 -18 -107z"/>
                            <path d="M120 1325 c0 -33 2 -35 35 -35 33 0 35 2 35 35 0 33 -2 35 -35 35 -33 0 -35 -2 -35 -35z"/>
                            <path d="M5388 1321 c-76 -25 -119 -53 -172 -112 -60 -66 -88 -141 -94 -251 -11 -202 85 -343 271 -400 95 -29 229 -22 310 15 52 24 147 100 147 118 0 5 -27 31 -61 59 l-60 50 -31 -30 c-49 -49 -86 -64 -163 -64 -78 -1 -129 20 -177 71 -25 26 -48 71 -48 94 0 5 117 9 290 9 l290 0 0 58 c-1 170 -72 302 -197 364 -57 28 -78 33 -157 35 -68 2 -105 -2 -148 -16z m212 -143 c53 -27 90 -78 90 -124 l0 -34 -191 0 -191 0 7 28 c29 119 174 186 285 130z"/>
                            <path d="M6254 1324 c-23 -8 -62 -35 -88 -60 l-46 -46 0 51 0 51 -95 0 -95 0 0 -380 0 -380 100 0 100 0 0 240 c0 219 2 244 20 279 59 116 206 133 265 31 18 -32 20 -55 23 -292 l3 -258 95 0 94 0 0 273 c0 309 -6 345 -66 415 -20 24 -55 52 -78 64 -54 28 -173 34 -232 12z"/>
                            <path d="M3532 1048 c5 -307 12 -344 74 -416 47 -56 104 -83 181 -90 93 -7 147 12 210 73 l53 51 0 -53 0 -53 95 0 95 0 0 380 0 380 -100 0 -100 0 0 -237 c0 -209 -3 -243 -19 -278 -54 -119 -206 -139 -266 -35 -18 32 -20 55 -23 293 l-3 257 -101 0 -100 0 4 -272z"/>
                            <path d="M8418 1291 c-112 -37 -201 -126 -233 -235 -22 -72 -19 -200 5 -270 56 -164 198 -254 386 -244 67 4 94 10 147 36 80 40 147 111 178 190 33 82 33 234 1 314 -32 79 -99 150 -179 190 -57 28 -78 33 -157 35 -68 2 -105 -2 -148 -16z m288 -51 c72 -35 116 -81 153 -160 23 -48 26 -68 26 -155 0 -93 -2 -105 -33 -167 -52 -107 -146 -171 -268 -184 -154 -16 -301 72 -354 213 -28 75 -28 202 1 279 37 98 134 183 230 204 78 16 176 4 245 -30z"/>
                            <path d="M9212 1284 c-59 -29 -105 -80 -126 -139 l-14 -40 -1 93 c-1 85 -2 92 -21 92 -20 0 -20 -7 -20 -365 0 -358 0 -365 20 -365 19 0 20 7 20 198 0 234 9 295 52 382 40 79 102 126 179 136 32 4 49 11 49 20 0 24 -80 17 -138 -12z"/>
                            <path d="M10045 1292 c-55 -20 -79 -33 -109 -57 -15 -11 -17 -17 -7 -29 10 -12 19 -9 61 19 123 83 300 64 368 -38 22 -33 28 -54 31 -117 l3 -77 -143 -6 c-114 -4 -157 -9 -208 -27 -119 -42 -182 -132 -167 -240 29 -218 388 -244 499 -36 l22 41 3 -60 c3 -78 9 -105 25 -105 20 0 11 536 -9 601 -16 49 -59 96 -114 125 -53 27 -190 30 -255 6z m345 -405 c0 -138 -50 -238 -145 -286 -40 -21 -63 -26 -125 -26 -65 0 -82 4 -123 29 -114 66 -115 223 -1 295 64 41 143 56 307 59 l87 2 0 -73z"/>
                            <path d="M120 1175 c0 -33 2 -35 35 -35 33 0 35 2 35 35 0 33 -2 35 -35 35 -33 0 -35 -2 -35 -35z"/>
                        </g>
                    </svg>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Posts</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                The application allows Teachers and Students to login and create Posts in the Student Portal which are visible to anyone who registers and logs in.   
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Photos</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Teachers and Students will be able to upload Photos as Profile Pictures. The also have access to upload photos when creating new Posts. 
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Comments & Notifications</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Students and teachers can create Comments on Posts which will be visible along with the corresponding posts. Users will also get notifications when someone interacts with the Posts. 
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Student & Teacher Login</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Separate acess levels for Teachers and Students allows Teachers to delete all Posts and Comments. Students will only be allowed to delete the Posts or Comments they have created.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
