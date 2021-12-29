@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="marge-top"></div>
            <div class="col-12">
                <div class="containers">
                    <form method="POST" action="">
                    <div class="rows1">
                        <h4>Paramètre de connexion</h4>
                        <div class="input-group input-group-icon">
                            <input type="text" placeholder="Matricule Scolaire" required/>
                            <div class="input-icon"><i class="fa fa-user"></i></div>
                        </div>
                        <div class="input-group input-group-icon">
                            <input type="password" placeholder="Mot de Passe" required/>
                            <div class="input-icon"><i class="fa fa-key"></i></div>
                        </div>
                    </div>
                    <div class="rows1">
                        <div class="col-12">
                            <div class="footer-newsletter text-center">
                                <input type="submit" value="Se connecter"/>
                            </div>
                            <br>
                            <div class="text-center">
                                <label for="terms">Pas encore membre ? <a href="{{ route('register')}}"> s'inscrire ici</a></label>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="marge-bottom"></div>
        </div>
    </div>

    <script>
        let status1 = document.getElementById("status1");
        let status2 = document.getElementById("status2");
        let member = document.getElementById("member");
        let beneficiaire = document.getElementById("beneficiaire");
        status1.addEventListener("click", () => {
            if (getComputedStyle(member).display != "none") {
                member.style.display = "none";
            } else {
                member.style.display = "block";
                beneficiaire.style.display = "none";
            }
        })

        status2.addEventListener("click", () => {
            if (getComputedStyle(beneficiaire).display != "none") {
                beneficiaire.style.display = "none";
            } else {
                beneficiaire.style.display = "block";
                member.style.display = "none";
            }
        })

        /*function status(){
            if (getComputedStyle(beneficiaire).display != "none") {
                beneficiaire.style.display = "none";
            } else {
                beneficiaire.style.display = "block";
            }
        };

        beneficiaire.onclick = status;*/
    </script>

    <style>

        .hide{
            display: none;
        }

        .footer-newsletter input[type=submit] {
        border: 0;
        background: none;
        font-size: 16px;
        padding: 10px 20px;
        background: #009970;
        color: #fff;
        transition: 0.3s;
        border-radius: 50px;
        box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
        }
        .footer-newsletter input[type=submit]:hover {
        background: #00664b;
        }

        .marge-bottom{
            margin-bottom: 2em;
        }

        .marge-top{
            margin-top: 7em;
        }

        /* 64ac15 */
        body {
        padding: 0;
        font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 15px;
        color: #b9b9b9;
        background-color: #e3e3e3;
        }
        h4 {
        color: #009970;
        }
        input,
        input[type="radio"] + label,
        input[type="checkbox"] + label:before,
        select option,
        select {
        width: 100%;
        padding: 1em;
        line-height: 1.4;
        background-color: #f9f9f9;
        border: 1px solid #e5e5e5;
        border-radius: 3px;
        -webkit-transition: 0.35s ease-in-out;
        -moz-transition: 0.35s ease-in-out;
        -o-transition: 0.35s ease-in-out;
        transition: 0.35s ease-in-out;
        transition: all 0.35s ease-in-out;
        }
        input:focus {
        outline: 0;
        border-color: #bd8200;
        }
        input:focus + .input-icon i {
        color: #009970;
        }
        input:focus + .input-icon:after {
        border-right-color: #009970;
        }
        input[type="radio"] {
        display: none;
        }
        input[type="radio"] + label,
        select {
        display: inline-block;
        width: 50%;
        text-align: center;
        float: left;
        border-radius: 0;
        }
        input[type="radio"] + label:first-of-type {
        border-top-left-radius: 3px;
        border-bottom-left-radius: 3px;
        }
        input[type="radio"] + label:last-of-type {
        border-top-right-radius: 3px;
        border-bottom-right-radius: 3px;
        }
        input[type="radio"] + label i {
        padding-right: 0.4em;
        }
        input[type="radio"]:checked + label,
        input:checked + label:before,
        select:focus,
        select:active {
        background-color: #009970;
        color: #fff;
        border-color: #bd8200;
        }
        input[type="checkbox"] {
        display: none;
        }
        input[type="checkbox"] + label {
        position: relative;
        display: block;
        padding-left: 1.6em;
        }
        input[type="checkbox"] + label:before {
        position: absolute;
        top: 0.2em;
        left: 0;
        display: block;
        width: 1em;
        height: 1em;
        padding: 0;
        content: "";
        }
        input[type="checkbox"] + label:after {
        position: absolute;
        top: 0.45em;
        left: 0.2em;
        font-size: 0.8em;
        color: #fff;
        opacity: 0;
        font-family: FontAwesome;
        content: "\f00c";
        }
        input:checked + label:after {
        opacity: 1;
        }
        select {
        height: 3.4em;
        line-height: 2;
        }
        select:first-of-type {
        border-top-left-radius: 3px;
        border-bottom-left-radius: 3px;
        }
        select:last-of-type {
        border-top-right-radius: 3px;
        border-bottom-right-radius: 3px;
        }
        select:focus,
        select:active {
        outline: 0;
        }
        select option {
        background-color: #009970;
        color: #fff;
        }
        .input-group {
        margin-bottom: 1em;
        zoom: 1;
        }
        .input-group:before,
        .input-group:after {
        content: "";
        display: table;
        }
        .input-group:after {
        clear: both;
        }
        .input-group-icon {
        position: relative;
        }
        .input-group-icon input {
        padding-left: 4.4em;
        }
        .input-group-icon .input-icon {
        position: absolute;
        top: 0;
        left: 0;
        width: 3.4em;
        height: 3.4em;
        line-height: 3.4em;
        text-align: center;
        pointer-events: none;
        }
        .input-group-icon .input-icon:after {
        position: absolute;
        top: 0.6em;
        bottom: 0.6em;
        left: 3.4em;
        display: block;
        border-right: 1px solid #e5e5e5;
        content: "";
        -webkit-transition: 0.35s ease-in-out;
        -moz-transition: 0.35s ease-in-out;
        -o-transition: 0.35s ease-in-out;
        transition: 0.35s ease-in-out;
        transition: all 0.35s ease-in-out;
        }
        .input-group-icon .input-icon i {
        -webkit-transition: 0.35s ease-in-out;
        -moz-transition: 0.35s ease-in-out;
        -o-transition: 0.35s ease-in-out;
        transition: 0.35s ease-in-out;
        transition: all 0.35s ease-in-out;
        }
        .containers {
        max-width: 25em;
        padding: 1em 3em 2em 3em;
        margin: 0em auto;
        background-color: #fff;
        border-radius: 4.2px;
        box-shadow: 0px 3px 10px -2px rgba(0, 0, 0, 0.2);
        }
        .rows1 {
        zoom: 1;
        }
        .rows1:before,
        .rows1:after {
        content: "";
        display: table;
        }
        .rows1:after {
        clear: both;
        }
        .col-half {
        padding-right: 10px;
        float: left;
        width: 50%;
        }
        .col-half:last-of-type {
        padding-right: 0;
        }
        .col-third {
        padding-right: 10px;
        float: left;
        width: 33.33333333%;
        }
        .col-third:last-of-type {
        padding-right: 0;
        }
        @media only screen and (max-width: 540px) {
        .col-half {
            width: 100%;
            padding-right: 0;
        }
        }

    </style>

@endsection