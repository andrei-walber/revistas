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
        <br>

        <h2 style="text-align: center">Lista Revistas Acadêmicas</h2>

        <h6>Nome</h6>
        <input type="text" name="nome_revista" id="nome_revista"><br><br>

        <!------------------------------------------------------------------------------------------------------------>
        <h6>Área/Escopo</h6>
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
        <input type="hidden" name="hidden_area_escopo" id="hidden_area_escopo"><br><br>

        <!-------------------------------------------------------------------------------------------------------------->
        <h6>Localização</h6>
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
        <input type="hidden" name="hidden_localizacao" id="hidden_localizacao"><br><br>

        <!-------------------------------------------------------------------------------------------------------------->
        <h6>Qualis</h6>
        <select name="multi_search_localizacao" id="multi_search_localizacao" class="form-control selectpicker" multiple>
            <?php
            include('dbcon.php');

            $query = $mysql->query("SELECT DISTINCT qualis FROM rv_qualis ORDER BY qualis ASC");
            while ($row = $query->fetch_object()) {
                $qualis = $row->qualis;
                echo '<option value="' . $qualis . '">' . $qualis . '</option>';
            }
            ?>
        </select>
        <input type="hidden" name="hidden_qualis" id="hidden_qualis"><br><br>

        <!-------------------------------------------------------------------------------------------------------------->
        <h6>Status</h6>
        <select name="multi_search_status" id="multi_search_status" class="form-control selectpicker" multiple>
            <?php
            include('dbcon.php');

            $query = $mysql->query("SELECT DISTINCT status FROM rv_revistas ORDER BY status ASC");
            while ($row = $query->fetch_object()) {
                $status = $row->status;
                echo '<option value="' . $status . '">' . $status . '</option>';
            }
            ?>
        </select>
        <input type="hidden" name="hidden_status" id="hidden_status"><br><br>

        <div style="clear:both"></div>
        <br>

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
            let query_universal = "SELECT * FROM rv_revistas WHERE 1"

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

            function load_data(query = '') {
                if ($('#multi_search_area_escopo').val() != null) {
                    $('#hidden_area_escopo').val($('#multi_search_area_escopo').val())
                    let query = $('#hidden_area_escopo').val()
                    console.log(query)
                }

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

            load_data(query_universal)
        })
    </script>
</body>

</html>