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

        <select name="multi_search_filter" id="multi_search_filter" class="form-control selectpicker" multiple>
            <?php
            include('dbcon.php');

            $query = $mysql->query("SELECT DISTINCT area_escopo FROM rv_area_escopo ORDER BY area_escopo ASC");
            while ($row = $query->fetch_object()) {
                $area_escopo = $row->area_escopo;
                echo '<option value="' . $area_escopo . '">' . $area_escopo . '</option>';
            }
            ?>
        </select>

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
            load_data()

            function load_data(query = '') {
                $.ajax({
                    url: "wp-content/themes/revistas/fetch.php",
                    method: "POST",
                    data: {
                        query: query
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