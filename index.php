<?php
$api = [
    'key' => '20928',
    'secret' => 'I0cfTwfuICAzeLb8HFhJRvF7Ynrx3ghs',
    'flow_url' => 'https://leadrock.com/URL-0AFD4-C0FA3'
];

function send_the_order($post, $api)
{
    $params = [
        'flow_url' => $api['flow_url'],
        'user_phone' => $post['phone'],
        'user_name' => $post['name'],
        'other' => $post['other'],
        'ip' => $_SERVER['REMOTE_ADDR'],
        'ua' => $_SERVER['HTTP_USER_AGENT'],
        'api_key' => $api['key'],
        'sub1' => $post['sub1'],
        'sub2' => $post['sub2'],
        'sub3' => $post['sub3'],
        'sub4' => $post['sub4'],
        'sub5' => $post['sub5'],
        'ajax' => 1,
    ];
    $url = 'https://leadrock.com/api/v2/lead/save';

    $trackUrl = $params['flow_url'] . (strpos($params['flow_url'], '?') === false ? '?' : '&') . http_build_query($params);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $trackUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    $params['track_id'] = curl_exec($ch);

    $params['sign'] = sha1(http_build_query($params) . $api['secret']);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    curl_exec($ch);
    curl_close($ch);

    header('Location: ' . (empty($post['success_page']) ? 'confirm.html' : $post['success_page']));
}

if (!empty($_POST['phone'])) {
    send_the_order($_REQUEST, $api);
}

if (!empty($_GET)) {
?>
    <script type="text/javascript">
        window.onload = function() {
            let forms = document.getElementsByTagName("form");
            for(let i=0; i < forms.length; i++) {
                let form = forms[i];
                form.setAttribute('action', form.getAttribute('action') + "?<?php echo http_build_query($_GET)?>");
                form.setAttribute('method', 'post');
            }
        };
    </script>
<?php
}

?>
<!DOCTYPE html>
<html lang="bg">

<head>




    <script src="js/jquery.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RevitaNaturalis</title>
    <link rel="shortcut icon" href="img/ic1.png" type="image/x-icon">
    <link href="css/css2.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <meta property="og:type" content="article">
    <meta property="og:title" content="RevitaNaturalis - ???????? ?????? ????????????????????">
    <meta property="og:description"
        content="?????????????????? ?? ???????? ?????????????????? ???????????? ????????????????. 100% ?????????????????????? ?? ?????????????????????????????? ??????????????, ?????????????? ?????????? ?????????????????????? ?????? ?????????????? ?? ???????????????????? ?????? ?? ??????????????????, ???????????????? ????????.">
    <meta property="og:url" content>
    <style type="text/css">
        .asd {
            font-size: 18px;
            line-height: 1.4;
            width: 600px;
            margin: 0 auto;
            position: relative;
            text-align: center;
        }

        @media (max-width: 800px) {
            .asd {
                width: 100%
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <section class="headerbg">
            <div class="section1">
                <div class="container">
                    <div class="section1__content">
                        <div class="section1__img"><img src="img/product.png" alt>
                        </div>
                        <h1 class="section1__title  white"> RevitaNaturalis </h1>
                        <div class="section1__text text white"> Goditi la bellezza e la giovinezza della tua pelle oggi
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section2">
            <div class="container">
                <div class="section2__content">
                    <div class="circle circle_1  bg-yellow"></div>
                    <div class="section2__block block block_1">
                        <div class="block__text-bg "> Umidificazione</div>
                        <div class="block__text-content">
                            <div class="block__title white"> Umidificazione</div>
                            <div class="block__text white"> Restituisca l'elasticit?? precedente e la luminosit?? sana</div>
                        </div>
                        <div class="block__img"><img src="img/s21.png" alt>
                            <div class="circle circle_3  bg-pink"></div>
                        </div>
                    </div>
                    <div class="section2__block block block_2">
                        <div class="block__text-bg "> Nutrizione</div>
                        <div class="block__text-content">
                            <div class="block__title white"> Nutrizione</div>
                            <div class="block__text white"> Riempi le cellule della pelle con sostanze utili</div>
                        </div>
                        <div class="block__img"><img src="img/s22.png" alt>
                            <div class="circle circle_4  bg-yellow"></div>
                            <div class="circle circle_5  bg-blue"></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="section2__block block block_3">
                        <div class="block__text-bg "> Recupero</div>
                        <div class="block__text-content">
                            <div class="block__title white"> Recupero</div>
                            <div class="block__text white"> Donare alla pelle morbidezza ed elasticit??</div>
                        </div>
                        <div class="block__img"><img src="img/s23.png" alt>
                            <div class="circle circle_6  bg-yellow"></div>
                            <div class="circle circle_7  bg-yellow"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section3">
            <div class="container">
                <div class="section3__content">
                    <div class="circle circle_8  bg-blue"></div>
                    <div class="circle circle_9  bg-pink"></div>
                    <div class="section3__img-bg">
                        <svg width="320" height="160" viewBox="0 0 320 160" fill="none">
                            <path
                                d="M320 0C320 21.0115 315.861 41.8173 307.821 61.2294C299.78 80.6414 287.994 98.2797 273.137 113.137C258.28 127.994 240.641 139.78 221.229 147.821C201.817 155.861 181.011 160 160 160C138.988 160 118.183 155.861 98.7706 147.821C79.3586 139.78 61.7203 127.994 46.8629 113.137C32.0055 98.2797 20.22 80.6414 12.1793 61.2293C4.13852 41.8172 -1.83688e-06 21.0115 0 -1.52588e-05L160 0H320Z"
                                fill="#F91987" />
                        </svg>
                    </div>
                    <div class="section3__img"><img src="img/product.png" alt></div>
                    <div class="section3__text text">
                        <p> Una rivoluzione nel mondo dei prodotti per la cura della pelle. Una formula naturale e ipoallergenica che metter?? il tempo in pausa e ti restituir?? un aspetto sano e
                            radioso. </p>
                        <p> Il bava di lumaca concentrata e l'acido ialuronico : questo ?? il solito mezzo di cosmetologia, ma ne abbiamo scelto la loro proporzione ideale e potenziato l'effetto usando
                            altri ingredienti attivi. </p>
                    </div>
                </div>
            </div>
        </section>

        <!--   <section class="label">
        <div class="container">
            <div class="label__content">
                <div class="label__text"> * Secondo i risultati dei test clinici condotti su 43 donne et?? da 30 a 50
                    anni. Il test ?? durato 12 settimane.
                </div>
            </div>
        </div>
    </section> -->

        <section class="section6">
            <div class="container">
                <div class="section6__content1">
                    <div class="section6__img"><img src="img/s6.png" alt></div>
                    <div class="circle circle_10  bg-pink"></div>
                    <h4 class="asd">La formula unica e intensa di REVITANATURALIS ?? stata appositamente formulata per migliorare l'aspetto e la consistenza della pelle secca. La pelle apparir?? giovane
                        e radiosa.</h4>
                    <br>
                    <h2 class="section6__title"> IINGREDIENTI </h2>
                </div>
            </div>
            <div class="section6__content2">
                <div class="container">
                    <div class="section6__slider row">
                        <div class="col-lg-3">
                            <div class="slider2__slide">
                                <div class="slider2__text-block"><img src="img/ingredients1.png" alt class="ings">
                                    <div class="slider2__title"> Bava di Lumaca Concentrata</div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="slider2__slide">
                                <div class="slider2__text-block"><img src="img/ingredients2.png" alt class="ings">
                                    <div class="slider2__title"> Acido<br> Ialuronico</div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="slider2__slide">
                                <div class="slider2__text-block"><img src="img/ingredients3.png" alt class="ings">
                                    <div class="slider2__title"> Estratto di Centella Asiatica</div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="slider2__slide">
                                <div class="slider2__text-block"><img src="img/ingredients4.png" alt class="ings">
                                    <div class="slider2__title"> Vitamine<br> C ed E</div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section7">
            <div class="container">
                <div class="section7__content">
                    <div class="section7__block-info">
                        <div class="section7__title white"> SOLUZIONE COMPLETA</div>

                    </div>
                </div>
            </div>
        </section>
        <section class="section8">
            <div class="container">
                <div class="section8__slider2 row">
                    <div class="col-md-4">
                        <div class="slider3-2__text-block"><img src="img/slide31.png" alt>
                            <div class="slider3-2__author"> Luisa</div>
                            <div class="slider3-2__label"> Insegnante di scuola elementare</div>
                            <div class="slider3-2__text text">

                                In appena un mese di utilizzo della crema, le rughe mimiche sono diventate meno evidenti! ?? un miracolo, mi sento di nuovo una donna desiderabile. sono molto
                                soddisfatto
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="slider3-2__text-block"><img src="img/slide32.png" alt>
                            <div class="slider3-2__author"> Enza</div>
                            <div class="slider3-2__label"> Avvocato</div>
                            <div class="slider3-2__text text">

                                ?? difficile vivere in una metropoli e rimanere bella allo stesso tempo, perch?? l'aria
                                inquinata rovina la pelle. Ma RevitaNaturalis - questo ?? qualcosa, la crema tonifica la
                                pelle cos?? bene che nel giro di una settimana la carnagione ?? completamente cambiata. Prima,
                                la mia pelle sembrava cos?? solo dopo aver visitato la spa! Un bel vantaggio : anche le
                                piccole rughe del viso sono scomparse.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="slider3-2__text-block"><img src="img/slide33.png" alt>
                            <div class="slider3-2__author"> Giulia</div>
                            <div class="slider3-2__label"> Visagiste</div>
                            <div class="slider3-2__text text">
                                In precedenza, sapevo solo come nascondere i cambiamenti legati all'et?? con il trucco giusto. Adesso so come prevenirli e renderli meno visibili con RevitaNaturalis. La
                                crema rimuove gli arrossamenti cutanei, la pigmentazione, rende la pelle elastica e idratata. Consiglio questo strumento a tutti i miei clienti.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="section9" class="section9">
            <div class="container">
                <div class="section9__content">
                    <div class="bottom_prod"><img src="img/product.png" alt></div>
                    <div class="circle circle_11  bg-yellow"></div>
                    <div class="section9__title white"> PROMOZIONE!</div>
                    <div class="section9__text text white"> Coccolatevi con un piacevole trattamento di bellezza al prezzo pi?? vantaggioso.
                    </div>
                    <div class="price">
                        <div class="circle-transparent circle-transparent_3  bg-white-transparent"></div>
                        <div id="sale-label" class="sale-label"></div>
                        <div id="sale" class="sale start bg-blue">
                            <p> -50% </p>
                        </div>
                        <div class="price__content">
                            <div class="price__old"><span class="sum"><span class="al-raw-cost-promo">93.9 <x-currency>???</x-currency></span></span>
                            </div>
                            <div class="price__new"><span class="sum"><span class="al-raw-cost">
                                        <x-newprice>46.95</x-newprice>
                                        <x-currency>???</x-currency>
                                    </span></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-form" id="form">
            <div class="container">
                <div class="section-form__content">
                    <form action="index.php"  action method="post" class="main-order-form form al-form">
                        <div class="form__input-wrap input-wrapper">
                            <input type="text" name="name" id="name" class="form__input order_data required" placeholder="Nome" required>
                        </div>
                        <div class="form__input-wrap input-wrapper">
                            <input type="tel" name="phone" id="phone" class="form__input order_data required" placeholder="Numero di telefono" required>
                        </div>
                        <div class="form__button-wrap">
                            <button id="button" type="submit" class="form__button button button_color buynow" data-pid="66" data-campaign-uri="308516"> ORDINARE
                            </button>
                        </div>
                    <input type="hidden" name="sub1" value="{subid}">
</form>
                    <div class="secure"><img class="secure__img" src="img/norton.png" alt> <img class="secure__img" src="img/mcafee.png" alt>
                    </div>
                    <p class="deliv"></p> <img src="img/gls.jpg" alt class="delivimg">
                </div>
            </div>
        </section>
        <div id="floatingBlock" class="floating-button active">
            <div class="container">
                <div class="floating-button__content"><a id="floatingButton" href="#section9" class="floating-button__button button button_white "> ORDINARE </a>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer_section">
        <center>
            <p>Galaxy Trade LTD</p>
            <p>16 George street, London, UK. skype: Galaxy-trade, email: Galaxy-trade2000@gmail.com</p>



            <p class="conf-link doclinks">
                <a class="nav-link" href onclick="window.open('./policy_it.html'); return false;">Privacy Policy</a>
            </p>


        </center>
    </footer>
    <style>
        .footer_section {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 0;
            color: #2f3a56;
        }

        .footer_section a {
            color: inherit;
            font-size: 15px;
            margin-top: 5px;
            text-decoration: none;
        }
    </style>

    <script src="js/main.js"></script>
    <!--    Feedback-->
    <div class="feedback">
        <img src="img/i-phone.png" alt="">
    </div>
    <div class="popup-window">
        <div class="close-popup"></div>
        <form action="index.php"  method="POST" >
            <label for="name2"> Ad esempio: Rossaro Enzo</label>
            <input id="name2" type="text" name="name" placeholder="Il tuo nome" required="">
            <label for="phone2"> Ad esempio: +39 88 521 801</label>
            <input id="phone2" type="tel" name="phone" placeholder="Il tuo numero di telefono" required="">
            <button type="submit">Ordinare</button>
        <input type="hidden" name="sub1" value="{subid}">
</form>
    </div>

    <style>
        .feedback {
            width: 75px;
            height: 70px;
            position: fixed;
            right: -15px;
            top: 15%;
            display: flex;
            align-items: center;
            background-color: #ffc000;
            ;
            padding-left: 10px;
            border-top-left-radius: 35px;
            border-bottom-left-radius: 35px;
            cursor: pointer;
            z-index: 1000;
            box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.3);
            transition: all .5s;
        }

        .feedback img {
            margin: 0;
        }

        .feedback:hover {
            right: 0;
        }

        .popup-window {
            font-family: inherit;
            display: none;
            width: 300px;
            position: fixed;
            right: 0;
            top: 15%;
            padding: 35px 10px;
            background: #fff;
            border-radius: 5px;
            z-index: 2000;
            border: 1px solid #000;
        }

        .popup-window form {
            width: 100%;
            min-height: auto;
            padding: 0;
            background: inherit;
            box-shadow: none;
        }

        .popup-window label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: #333;
            text-transform: uppercase;
        }

        .popup-window input {
            box-sizing: border-box;
            width: 100%;
            height: auto;
            margin-bottom: 10px;
            padding: 10px;
            border: none;
            font-family: inherit;
            font-size: 16px;
            margin-bottom: 15px;
            border: 1px solid #333;
        }

        .popup-window button {
            text-align: center;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #ffc000;
            color: #000;
            cursor: pointer;
            font-family: inherit;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 15px;
            border-radius: 20px;
        }

        .close-popup {
            position: absolute;
            right: 10px;
            top: 5px;
            width: 27px;
            height: 27px;
            background-color: #fff;
            cursor: pointer;
        }

        .close-popup:before {
            content: "";
            background: #333;
            width: 20px;
            height: 1px;
            position: absolute;
            top: 13px;
            left: 4px;
            transform: rotate(-45deg);
        }

        .close-popup:after {
            content: "";
            background: #333;
            width: 20px;
            height: 1px;
            position: absolute;
            top: 13px;
            left: 4px;
            transform: rotate(45deg);
        }
    </style>

    <script>
        $(document).ready(function () {

            $('.feedback').click(function () {
                $('.popup-window').show();
            });
            $('.close-popup').click(function () {
                $('.popup-window').hide();
            });

        });
    </script>
    <!-- end callback -->

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (m, e, t, r, i, k, a) {
            m[i] = m[i] || function () {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(88751655, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/88751655" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
<script type="text/javascript" src="https://cdn.ldrock.com/validator.js"></script>
<script type="text/javascript">
    LeadrockValidator.init({
        geo: {
            iso_code: 'IT'
        }
    });
</script>
</body>

</html>
