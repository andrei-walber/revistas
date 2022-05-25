<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css" rel="stylesheet">

    <title>Revistas Acadêmicas</title>
</head>

<body>
    <div class="container">
        <h2 style="text-align: center">Lista Revistas Acadêmicas</h2>

        <h5>Nome</h5>
        <input type="text" name="nome_revista" id="nome_revista">

        <!------------------------------------------------------------------------------------------------------------>
        <h5>Área/Escopo</h5>
        <select name="multi_search_area_escopo" id="multi_search_area_escopo" class="form-control selectpicker" multiple>
            <?php
            include('dbcon.php');

            $query = $mysql->query("SELECT DISTINCT area_escopo FROM rv_area_escopo ORDER BY area_escopo ASC");
            while ($row = $query->fetch_object()) {
                $area_escopo = $row->area_escopo;
                echo '<option value="' . $area_escopo . '">' . $area_escopo . '</option>';
            }
            ?>
        </select>

        <!-------------------------------------------------------------------------------------------------------------->
        <h5>Localização</h5>
        <select name="multi_search_localizacao" id="multi_search_localizacao" class="form-control selectpicker" multiple>
            <?php
            include('dbcon.php');

            $query = $mysql->query("SELECT DISTINCT sigla FROM rv_estados ORDER BY sigla ASC");
            while ($row = $query->fetch_object()) {
                $localizacao = $row->sigla;
                echo '<option value="' . $localizacao . '">' . $localizacao . '</option>';
            }
            ?>
        </select>

        <!-------------------------------------------------------------------------------------------------------------->
        <h5>Qualis</h5>
        <select name="multi_search_qualis" id="multi_search_qualis" class="form-control selectpicker" multiple>
            <?php
            include('dbcon.php');

            $query = $mysql->query("SELECT DISTINCT qualis FROM rv_qualis ORDER BY qualis ASC");
            while ($row = $query->fetch_object()) {
                $qualis = $row->qualis;
                echo '<option value="' . $qualis . '">' . $qualis . '</option>';
            }
            ?>
        </select>

        <!-------------------------------------------------------------------------------------------------------------->
        <h5>Status</h5>
        <select name="multi_search_status" id="multi_search_status" class="form-control selectpicker" multiple>
            <?php
            include('dbcon.php');

            $query = $mysql->query("SELECT DISTINCT status FROM rv_revistas ORDER BY status ASC");
            while ($row = $query->fetch_object()) {
                $status = $row->status;
                echo '<option value="' . $status . '">' . $status . '</option>';
            }
            ?>
        </select><br><br>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <th style="text-align: center">Nome</th>
                    <th style="text-align: center">Área / Escopo</th>
                    <th style="text-align: center">Localização</th>
                    <th style="text-align: center">Qualis</th>
                    <th style="text-align: center">Status</th>
                    <th style="text-align: center">Tempo médio aceitação</th>
                </thead>

                <tbody></tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            load_data()

            $('#nome_revista').change(function() {
                load_data()
            })

            $('#multi_search_area_escopo').change(function() {
                load_data()
            })

            $('#multi_search_localizacao').change(function() {
                load_data()
            })

            $('#multi_search_qualis').change(function() {
                load_data()
            })

            $('#multi_search_status').change(function() {
                load_data()
            })

            function load_data() {
                let query_universal = "SELECT * FROM rv_revistas WHERE 1"

                if ($('#nome_revista').val() != '') {
                    query_universal = query_universal + " AND nome LIKE '%" + $('#nome_revista').val() + "%'"
                }

                if ($('#multi_search_localizacao').val() != null) {
                    query_universal = query_universal + " AND localizacao in ("

                    let localizacao_selecionada = $('#multi_search_localizacao').val()
                    for (let i = 0; i < localizacao_selecionada.length; i++) {
                        if (i == localizacao_selecionada.length - 1) {
                            query_universal = query_universal + '"' + localizacao_selecionada[i] + '"'
                        } else {
                            query_universal = query_universal + '"' + localizacao_selecionada[i] + '",'
                        }
                    }

                    query_universal = query_universal + ")"
                }

                if ($('#multi_search_qualis').val() != null) {
                    query_universal = query_universal + " AND qualis in ("

                    let qualis_selecionada = $('#multi_search_qualis').val()
                    for (let i = 0; i < qualis_selecionada.length; i++) {
                        if (i == qualis_selecionada.length - 1) {
                            query_universal = query_universal + '"' + qualis_selecionada[i] + '"'
                        } else {
                            query_universal = query_universal + '"' + qualis_selecionada[i] + '",'
                        }
                    }

                    query_universal = query_universal + ")"
                }

                if ($('#multi_search_status').val() != null) {
                    query_universal = query_universal + " AND status in ("

                    let status_selecionada = $('#multi_search_status').val()
                    for (let i = 0; i < status_selecionada.length; i++) {
                        if (i == status_selecionada.length - 1) {
                            query_universal = query_universal + '"' + status_selecionada[i] + '"'
                        } else {
                            query_universal = query_universal + '"' + status_selecionada[i] + '",'
                        }
                    }

                    query_universal = query_universal + ")"
                }

                if ($('#multi_search_area_escopo').val() != null) {
                    query_universal = query_universal + " AND ("

                    let area_escopo_selecionada = $('#multi_search_area_escopo').val()
                    for (let i = 0; i < area_escopo_selecionada.length; i++) {
                        if (i == area_escopo_selecionada.length - 1) {
                            query_universal = query_universal + "area_escopo LIKE '%" + area_escopo_selecionada[i] + "%'"
                        } else {
                            query_universal = query_universal + "area_escopo LIKE '%" + area_escopo_selecionada[i] + "%' OR "
                        }
                    }

                    query_universal = query_universal + " OR area_escopo LIKE '%institucional%')"
                }

                query_universal = query_universal + " ORDER BY qualis ASC, tempo_medio_aceitacao ASC"
                console.log(query_universal)
                $.ajax({
                    url: "wp-content/themes/revistas/fetch.php",
                    method: "POST",
                    data: {
                        query: query_universal
                    },
                    success: function(data) {
                        $('tbody').html(data)
                    }
                })
            }
        })
    </script>
</body>

</html>