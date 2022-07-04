<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black-translucent" name="apple-mobile-web-app-status-bar-style">
    <meta content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover"
          name="viewport"/>
    <title>Hortus siccus</title>

    <link href="styles/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="styles/style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700;800&family=Roboto:wght@400;500;600;700&display=swap"
          rel="stylesheet">
    <link href="fonts/css/fontawesome-all.min.css" rel="stylesheet" type="text/css">
    <link data-pwa-version="set_in_manifest_and_pwa_js" href="_manifest.json" rel="manifest">
    <link href="app/icons/icon-192x192.png" rel="apple-touch-icon" sizes="180x180">
    <link rel="icon" type="image/png" href="images/favicon.png" sizes="32x32" />
    <style>
        @import url("https://use.typekit.net/hxx3rxy.css");
        ol, ul {
            list-style: none;
        }
        blockquote, q {
            quotes: none;
        }
        blockquote:before, blockquote:after,
        q:before, q:after {
            content: '';
            content: none;
        }
        table {
            border-spacing: 2px;
        }
        .clearfix:before,
        .clearfix:after {
            content: " "; /* 1 */
            display: table; /* 2 */
        }

        .clearfix:after {
            clear: both;
        }
        /**
         * For IE 6/7 only
         * Include this rule to trigger hasLayout and contain floats.
         */
        .clearfix {
            *zoom: 1;
        }
        a, a:hover {
            text-decoration: none;
        }
        .img-responsive {
            max-width: 100%;
            height: auto;
        }

        .elegant-calencar {

            height: 20em;
            text-align: center;
            margin: 1em auto;
            position: relative;
        }


        .pre-button, .next-button {

            font-size: 3em;
            -webkit-transition: -webkit-transform 0.5s;
            transition: transform 0.5s;
            cursor: pointer;
            width: 1em;
            height: 1em;
            line-height: 1em;
            color: #2b2b2b;
            border-radius: 50%;
        }

        .pre-button:hover, .next-button:hover {
            -webkit-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            transform: rotate(360deg);
        }

        .pre-button:active,.next-button:active{
            -webkit-transform: scale(0.7);
            -ms-transform: scale(0.7);
            transform: scale(0.7);
        }

        .pre-button {
            float: left;
            margin-left: 0.5em;
        }

        .next-button {
            float: right;
            margin-right: 0.5em;
        }

        .head-info {
            float: left;
            width: 16em;
        }

        .head-day {
            margin-top: 70px;
            font-size: 7em;
            line-height: 1;
            color: #2b2b2b;
            margin-left: 260px;
            font-family: gopher, sans-serif;
        }

        .head-month {
            margin-top: 20px;
            font-size: 3em;
            line-height: 1;
            color: #9b8035;
        }

        #calendar {
            width: 90%;
            margin: 0 auto;
        }

        #calendar tr {
            height: 2em;
            line-height: 2em;
        }

        thead tr {
            color: #2b2b2b;
            font-weight: 700;
            text-transform: uppercase;
        }

        tbody tr {
            color: #252a25;
        }

        tbody td{
            width: 14%;

            cursor: pointer;
            -webkit-transition:all 0.2s ease-in;
            transition:all 0.2s ease-in;
            height: 50px;
            border: 1px solid;
        }

        tbody td:hover, .selected {
            color: #fff;
            background-color: #2b2b2b;
            border: none;
        }

        tbody td:active {
            -webkit-transform: scale(0.7);
            -ms-transform: scale(0.7);
            transform: scale(0.7);
        }

        #today {
            background-color: #2b2b2b;
            color: #fff;
            font-family: serif;

        }

        #disabled {
            cursor: default;
            border:none;
        }

        #disabled:hover {
            background: #fff;
            color: #c9c9c9;
        }

        #reset {
            display: block;
            position: absolute;
            right: 0.5em;
            top: 0.5em;
            z-index: 999;
            color: #fff;
            font-family: serif;
            cursor: pointer;
            padding: 0 0.5em;
            height: 1.5em;
            border: 0.1em solid #fff;
            border-radius: 4px;
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }

        #reset:hover {
            color: #e66b6b;
            border-color: #e66b6b;
        }

        #reset:active{
            -webkit-transform: scale(0.8);
            -ms-transform: scale(0.8);
            transform: scale(0.8);
        }

    </style>
</head>
<body class="theme-light feed-7">

<!-- PRELOADER-->
<?php
include_once "components/cp_preloader.php";
?>


<div id="page" style="background-image: url('images/DECO/evento.png');  background-size: 90%;background-repeat: no-repeat; background-position: 20px 490px;" class="has-footer-menu">

    <!-- FOOTER MENU-->
    <?php
    include_once "components/cp_footer_menu.php";
    ?>

    <!-- Global Menus-->
    <div class="menu menu-box-modal menu-gradient" data-menu-height="cover" data-menu-load="menu-color.html"
         data-menu-width="cover" id="menu-color"></div>
    <div class="menu menu-box-bottom menu-box-detached" data-menu-effect="menu-parallax" data-menu-height="390"
         data-menu-load="menu-share.html" id="menu-share"></div>

    <!--HEADER: LOGO E MENU DE CIMA-->
    <div class="header-logo-app header mt-4 mb-4 ">
        <a class="header-icon header-icon-1" href="herbario-UA.php"><i><img class="icons"
                                                                               src="images/icons/undo.png"></i></a>

        <p class="header-icon font-barra font-31 margem-eventos mt-1 ">EVENTOS</p>
    </div>

    <!-- CALENDÁRIO --->
    <div class="elegant-calencar mb-5 "                                       >

        <div class="head-info mb-1">
            <div class="head-month"></div>
        </div>

        <table id="calendar" class="mb-0" >

            <thead>
            <tr >
                <th>D</th>
                <th>S</th>
                <th>T</th>
                <th>Q</th>
                <th>Q</th>
                <th>S</th>
                <th>S</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            </tbody>
        </table>
        <div class="pre-button"><</div>
        <div class="next-button">></div>

    </div>


    <div  class="clearfix ">
        <div class="head-info ">
            <div class=" head-day"></div>
            <div class="margemright">JUN</div>
            <div class="margemright">22</div>
        </div>
        <div class=" head-MONTH"></div>
    </div>


    <p class="ms-3 atividade font-40 mb-2">UARIUM</p>
    <p class="ms-3  font-20">Local</p>
    <p class="ms-3  font-20 me-4">Vem connosco encontrar e aprender a registar plantas no campus da Universiade de Aveiro. Em grupos, coleta a maior quantidade de plantas que conseguires para depois, aprendendo os processos de sacagem, arquivar o que coletaste.
        A atividade vai ocupar um dia, com almoço na Universidade, terminando o dia com uma palestra sobre as espécies invasoras da região de Aveiro e como podes ajudar a preservação das espécies em extinção. </p>

    <div class="form-group mb-5">
        <button type="button" class="float-right contato me-4  "><a href="about.html" class="font-22  p-2 color-dark-dark " >contactos</a></button> <br><br>
        <button type="button"  class="float-right inscrever  me-4 font-22  p-2">Inscrever</button>
    </div>

    <!--INSCRIÇÃO-->
    <div class="card card-style  feed-a">
        <div class="content pb-0">
            <p class="font-34 mt-3 color-a">Inscrição</p>
            <p class="color-a">This is a full width content. It only has 1 column per row. All contents are styled like this by default</p>
            <div class="input-style no-borders has-icon validate-field color-a">
                <i class="fa fa-user"></i>
                <input type="username"  class="" id="form1a" placeholder="Email">
                <label for="form1a" class=" font-10 mt-1">Email </label>
                <i class="fa fa-times disabled invalid color-dark"></i>
                <i class="fa fa-check disabled valid color-dark"></i>
            </div>
            <div class="input-style no-borders has-icon validate-field mt-2 color-a">
                <i class="fa fa-lock"></i>
                <input  class="color-a" id="form3a" placeholder="Nome completo">
                <label for="form3a" class="font-16 mt-1">Nome completo</label>
                <i class="fa fa-times disabled invalid color-dark"></i>
                <i class="fa fa-check disabled valid colo-dark"></i>
                <button type="submit"  class="float-right submit  me-4 font-22 mt-4  p-2">Do it</button>
            </div>
        </div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        var today = new Date(),
            year = today.getFullYear(),
            month = today.getMonth(),
            monthTag =["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
            day = today.getDate(),
            days = document.getElementsByTagName('td'),
            selectedDay,
            setDate,
            daysLen = days.length;
// options should like '2014-01-01'
        function Calendar(selector, options) {
            this.options = options;
            this.draw();
        }

        Calendar.prototype.draw  = function() {
            this.getCookie('selected_day');
            this.getOptions();
            this.drawDays();
            var that = this,
                reset = document.getElementById('reset'),
                pre = document.getElementsByClassName('pre-button'),
                next = document.getElementsByClassName('next-button');

            pre[0].addEventListener('click', function(){that.preMonth(); });
            next[0].addEventListener('click', function(){that.nextMonth(); });
            reset.addEventListener('click', function(){that.reset(); });
            while(daysLen--) {
                days[daysLen].addEventListener('click', function(){that.clickDay(this); });
            }
        };

        Calendar.prototype.drawHeader = function(e) {
            var headDay = document.getElementsByClassName('head-day'),
                headMonth = document.getElementsByClassName('head-month');

            e?headDay[0].innerHTML = e : headDay[0].innerHTML = day;
            headMonth[0].innerHTML = monthTag[month] +" - " + year;
        };

        Calendar.prototype.drawDays = function() {
            var startDay = new Date(year, month, 1).getDay(),
//      下面表示这个月总共有几天
                nDays = new Date(year, month + 1, 0).getDate(),

                n = startDay;
//      清除原来的样式和日期
            for(var k = 0; k <42; k++) {
                days[k].innerHTML = '';
                days[k].id = '';
                days[k].className = '';
            }

            for(var i  = 1; i <= nDays ; i++) {
                days[n].innerHTML = i;
                n++;
            }

            for(var j = 0; j < 42; j++) {
                if(days[j].innerHTML === ""){

                    days[j].id = "disabled";

                }else if(j === day + startDay - 1){
                    if((this.options && (month === setDate.getMonth()) && (year === setDate.getFullYear())) || (!this.options && (month === today.getMonth())&&(year===today.getFullYear()))){
                        this.drawHeader(day);
                        days[j].id = "today";
                    }
                }
                if(selectedDay){
                    if((j === selectedDay.getDate() + startDay - 1)&&(month === selectedDay.getMonth())&&(year === selectedDay.getFullYear())){
                        days[j].className = "selected";
                        this.drawHeader(selectedDay.getDate());
                    }
                }
            }
        };

        Calendar.prototype.clickDay = function(o) {
            var selected = document.getElementsByClassName("selected"),
                len = selected.length;
            if(len !== 0){
                selected[0].className = "";
            }
            o.className = "selected";
            selectedDay = new Date(year, month, o.innerHTML);
            this.drawHeader(o.innerHTML);
            this.setCookie('selected_day', 1);

        };

        Calendar.prototype.preMonth = function() {
            if(month < 1){
                month = 11;
                year = year - 1;
            }else{
                month = month - 1;
            }
            this.drawHeader(1);
            this.drawDays();
        };

        Calendar.prototype.nextMonth = function() {
            if(month >= 11){
                month = 0;
                year =  year + 1;
            }else{
                month = month + 1;
            }
            this.drawHeader(1);
            this.drawDays();
        };

        Calendar.prototype.getOptions = function() {
            if(this.options){
                var sets = this.options.split('-');
                setDate = new Date(sets[0], sets[1]-1, sets[2]);
                day = setDate.getDate();
                year = setDate.getFullYear();
                month = setDate.getMonth();
            }
        };

        Calendar.prototype.reset = function() {
            month = today.getMonth();
            year = today.getFullYear();
            day = today.getDate();
            this.options = undefined;
            this.drawDays();
        };

        Calendar.prototype.setCookie = function(name, expiredays){
            if(expiredays) {
                var date = new Date();
                date.setTime(date.getTime() + (expiredays*24*60*60*1000));
                var expires = "; expires=" +date.toGMTString();
            }else{
                var expires = "";
            }
            document.cookie = name + "=" + selectedDay + expires + "; path=/";
        };

        Calendar.prototype.getCookie = function(name) {
            if(document.cookie.length){
                var arrCookie  = document.cookie.split(';'),
                    nameEQ = name + "=";
                for(var i = 0, cLen = arrCookie.length; i < cLen; i++) {
                    var c = arrCookie[i];
                    while (c.charAt(0)==' ') {
                        c = c.substring(1,c.length);

                    }
                    if (c.indexOf(nameEQ) === 0) {
                        selectedDay =  new Date(c.substring(nameEQ.length, c.length));
                    }
                }
            }
        };
        var calendar = new Calendar();


    }, false);
</script>
</body>
</html>