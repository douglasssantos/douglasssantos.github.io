<?php
//Start Project
require 'vendor/autoload.php';
require 'Controller.php';

$controller = new Controller();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>API GITHUB</title>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
            integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk"
            crossorigin="anonymous"></script>
    <link href="assets/css/fontawesome.css" rel="stylesheet">
    <link href="assets/css/brands.css" rel="stylesheet">
    <link href="assets/css/solid.css" rel="stylesheet">
    <meta name="theme-color" content="#712cf9">
    <script type="text/javascript">
        $(document).ready(function () {
            $("body").on("input", "input[name=pesquisar]", function () {
                var str = $(this).val().toLowerCase();
                $("tr.hide-show").hide();
                var result = $(".search-keyword:contains('" + str + "')").closest("tr.hide-show")
                //alert($)
                if (result.length > 0) {
                    result.show();
                } else {
                    $("tr.noresult").show();
                }
            });

            $("body").on("click", "button.btn-set-filter", function () {
                    window.location = "<?=$_SERVER['remote_addr';?>?arquived="+$("select[name=arquived]").val()+"&private="+$("select[name=private]").val()+<?=(isset($_GET['sort']) ?
                    "'&sort=".$_GET['sort']."&order=".$_GET['order']."'\n" : "");?>;
            });
        })
    </script>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>
</head>
<body>

<div class="col-lg-8 mx-auto p-4 py-md-5">
    <header class="d-flex align-items-center pb-3 mb-5 border-bottom">
        <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="me-2" viewBox="0 0 118 94" role="img">
                <title>API GITHUB - Douglas S. Santos</title>
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"
                      fill="currentColor"></path>
            </svg>
            <span class="fs-4">API GITHUB</span>
        </a>
    </header>

    <main>
        <h1>Busca</h1>
        <p class="fs-5 col-md-8"><input type="text" name="pesquisar" id="pesquisar"></p>
        <h1>Filtro</h1>
        <p class="fs-5 col-md-8">
            <select name="arquived" id="arquived">
                <option <?=($_GET['arquived'] == null ? "selected" : "");?>></option>
                <option value="off" <?=($_GET['arquived'] === "off" ? "selected" : "");?>>Repos Ativos</option>
                <option value="on" <?=($_GET['arquived'] ==="on" ? "selected" : "");?>>Repos Arquivados</option>
            </select>
            <select name="private" id="private">
                <option <?=($_GET['private'] == null ? "selected" : "");?>></option>
                <option value="off" <?=($_GET['private'] === "off" ? "selected" : "");?>>Repos Publico</option>
                <option value="on" <?=($_GET['private'] === "on" ? "selected" : "");?>>Repos Privado</option>
            </select>
            <button class="btn btn-info btn-set-filter">Filtrar</button>
        </p>

        <hr class="col-3 col-md-2 mb-5">

        <div class="row g-5">
            <div class="col-md-8">
                <h2>Repositorios</h2>
                <table class="table table-striped table-hover">
                    <thead>
                    <th style="display: none;"></th>
                    <th>ID</th>
                    <th>Projeto</th>
                    <th>Visibilidade</th>
                    <th>Status</th>
                    <th><a style="display: flex;align-items: center" href="?sort=created_at&order=<?=(@$_GET['order'] === "asc" ? "desc": "asc");?>" target="_self">Created<?=(@$_GET['sort'] === "created_at" ? $controller->ico_sort(@$_GET['order']): "");?>
                            </a></th>
                    <th><a style="display: flex;align-items: center" href="?sort=updated_at&order=<?=(@$_GET['order'] === "asc" ? "desc": "asc");?>" target="_self">Updated<?=(@$_GET['sort'] === "updated_at" ? $controller->ico_sort(@$_GET['order']): "");?>
                        </a></th>
                    </thead>
                    <tbody>
                    <?php
                    foreach($controller->sort(json_decode($controller->getRepositories(), true),"asc") as $k ){
                    //foreach($controller->sort(json_decode(file_get_contents("data.json"), true),"asc") as $k ){
                        if($controller->filter($k, $_GET['arquived'], $_GET['private'])) {
                            echo '<tr class="hide-show">';
                            echo '<td class="search-keyword" style="display: none;">' . strtolower($k['id'] . $k['name']
                                    . ($k['private'] ? "Privado" : "Publico") .
                                    ($k['archived'] ? "Arquivado" : "Ativo")) . '</td>';
                            echo '<td>' . $k['id'] . '</td>';
                            echo '<td><a href="' . $k['html_url'] . '" target="_blank">' . $k['name'] . '</a></td>';
                            echo "<td>" . ($k['private'] ? "<b class='badge text-bg-danger'>Privado</b>" : "<b class='badge text-bg-primary'>Publico</b>") . "</td>";
                            echo "<td>" . ($k['archived'] ? "<b class='badge text-bg-danger'>Arquivado</b>" : "<b class='badge text-bg-success'>Ativo</b>") . "</td>";
                            echo '<td>' . $k['created_at'] . '</td>';
                            echo '<td>' . $k['updated_at'] . '</td>';
                            echo '</tr>';
                        }elseif(!isset($k['private']) && !isset($k['visibility'])){
                            echo '<tr class="hide-show">';
                            echo '<td class="search-keyword" style="display: none;">' . strtolower($k['id'] . $k['name']
                                    . ($k['private'] ? "Privado" : "Publico") .
                                    ($k['archived'] ? "Arquivado" : "Ativo")) . '</td>';
                            echo '<td>' . $k['id'] . '</td>';
                            echo '<td><a href="' . $k['html_url'] . '" target="_blank">' . $k['name'] . '</a></td>';
                            echo "<td>" . ($k['private'] ? "<b class='badge text-bg-danger'>Privado</b>" : "<b class='badge text-bg-primary'>Publico</b>") . "</td>";
                            echo "<td>" . ($k['archived'] ? "<b class='badge text-bg-danger'>Arquivado</b>" : "<b class='badge text-bg-success'>Ativo</b>") . "</td>";
                            echo '<td>' . $k['created_at'] . '</td>';
                            echo '<td>' . $k['updated_at'] . '</td>';
                            echo '</tr>';
                        }
                     }

                     ?>
                    <tr class="hide-show noresult" style="display: none;"><td colspan="7">Sem Resultados!</td></tr>
                    </tbody>
                </table>
            </div>

        </div>
    </main>
</div>


<div id="torrent-scanner-popup" style="display: none;"></div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>
