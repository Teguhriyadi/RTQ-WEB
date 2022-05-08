<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('code') @yield('title')</title>

    <style id="" media="all">/* latin */
        @font-face {
            font-family: 'Fredoka One';
            font-style: normal;
            font-weight: 400;
            src: url(/fonts.gstatic.com/s/fredokaone/v8/k3kUo8kEI-tA1RRcTZGmTlHGCac.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
    </style>
    <style id="" media="all">/* cyrillic-ext */
        @font-face {
            font-family: 'Raleway';
            font-style: normal;
            font-weight: 400;
            src: url(/fonts.gstatic.com/s/raleway/v22/1Ptug8zYS_SKggPNyCAIT5lu.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }
        /* cyrillic */
        @font-face {
            font-family: 'Raleway';
            font-style: normal;
            font-weight: 400;
            src: url(/fonts.gstatic.com/s/raleway/v22/1Ptug8zYS_SKggPNyCkIT5lu.woff2) format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }
        /* vietnamese */
        @font-face {
            font-family: 'Raleway';
            font-style: normal;
            font-weight: 400;
            src: url(/fonts.gstatic.com/s/raleway/v22/1Ptug8zYS_SKggPNyCIIT5lu.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }
        /* latin-ext */
        @font-face {
            font-family: 'Raleway';
            font-style: normal;
            font-weight: 400;
            src: url(/fonts.gstatic.com/s/raleway/v22/1Ptug8zYS_SKggPNyCMIT5lu.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
            font-family: 'Raleway';
            font-style: normal;
            font-weight: 400;
            src: url(/fonts.gstatic.com/s/raleway/v22/1Ptug8zYS_SKggPNyC0ITw.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        /* cyrillic-ext */
        @font-face {
            font-family: 'Raleway';
            font-style: normal;
            font-weight: 700;
            src: url(/fonts.gstatic.com/s/raleway/v22/1Ptug8zYS_SKggPNyCAIT5lu.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }
        /* cyrillic */
        @font-face {
            font-family: 'Raleway';
            font-style: normal;
            font-weight: 700;
            src: url(/fonts.gstatic.com/s/raleway/v22/1Ptug8zYS_SKggPNyCkIT5lu.woff2) format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }
        /* vietnamese */
        @font-face {
            font-family: 'Raleway';
            font-style: normal;
            font-weight: 700;
            src: url(/fonts.gstatic.com/s/raleway/v22/1Ptug8zYS_SKggPNyCIIT5lu.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }
        /* latin-ext */
        @font-face {
            font-family: 'Raleway';
            font-style: normal;
            font-weight: 700;
            src: url(/fonts.gstatic.com/s/raleway/v22/1Ptug8zYS_SKggPNyCMIT5lu.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
            font-family: 'Raleway';
            font-style: normal;
            font-weight: 700;
            src: url(/fonts.gstatic.com/s/raleway/v22/1Ptug8zYS_SKggPNyC0ITw.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            padding: 0;
            margin: 0;
        }

        #notfound {
            position: relative;
            height: 100vh;
        }

        #notfound .notfound {
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .notfound {
            max-width: 710px;
            width: 100%;
            text-align: center;
            padding: 0px 15px;
            line-height: 1.4;
        }

        .notfound .notfound-404 {
            height: 200px;
            line-height: 200px;
        }

        .notfound .notfound-404 h1 {
            font-family: 'Fredoka One', cursive;
            font-size: 168px;
            margin: 0px;
            color: #61ba6d;
            text-transform: uppercase;
        }

        .notfound h2 {
            font-family: 'Raleway', sans-serif;
            font-size: 22px;
            font-weight: 400;
            text-transform: uppercase;
            color: #222;
            margin: 0;
        }

        .notfound-search {
            position: relative;
            padding-right: 123px;
            max-width: 420px;
            width: 100%;
            margin: 30px auto 22px;
        }

        .notfound-search input {
            font-family: 'Raleway', sans-serif;
            width: 100%;
            height: 40px;
            padding: 3px 15px;
            color: #222;
            font-size: 18px;
            background: #f8fafb;
            border: 1px solid rgba(34, 34, 34, 0.2);
            border-radius: 3px;
        }

        .notfound-search button {
            font-family: 'Raleway', sans-serif;
            position: absolute;
            right: 0px;
            top: 0px;
            width: 120px;
            height: 40px;
            text-align: center;
            border: none;
            background: #61ba6d;
            cursor: pointer;
            padding: 0;
            color: #fff;
            font-weight: 700;
            font-size: 18px;
            border-radius: 3px;
        }

        .notfound a {
            font-family: 'Raleway', sans-serif;
            display: inline-block;
            font-weight: 700;
            border-radius: 15px;
            text-decoration: none;
            color: #39b1cb;
        }

        .notfound a>.arrow {
            position: relative;
            top: -2px;
            border: solid #39b1cb;
            border-width: 0 3px 3px 0;
            display: inline-block;
            padding: 3px;
            -webkit-transform: rotate(135deg);
            -ms-transform: rotate(135deg);
            transform: rotate(135deg);
        }

        @media only screen and (max-width: 767px) {
            .notfound .notfound-404 {
                height: 122px;
                line-height: 122px;
            }
            .notfound .notfound-404 h1 {
                font-size: 122px;
            }
        }
    </style>

</head>
<body>
    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h1>@yield('code')</h1>
            </div>
            <h2>Maaf, @yield('message')!</h2>
            <a onclick="history.back()" href="#"><span class="arrow"></span> Kembali</a>
        </div>
    </div>

</body>
</html>
