<!DOCTYPE html>
<html lang="en">
<head>
<style>
        #container {
            height: 400px;
        }

        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 310px;
            max-width: 800px;
            margin: 1em auto;
        }

        #datatable {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #EBEBEB;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        #datatable caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        #datatable th {
            font-weight: 600;
            padding: 0.5em;
        }

        #datatable td,
        #datatable th,
        #datatable caption {
            padding: 0.5em;
        }

        #datatable thead tr,
        #datatable tr:nth-child(even) {
            background: #f8f8f8;
        }

        #datatable tr:hover {
            background: #f1f7ff;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survei</title>
</head>
<body>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <figure class="highcharts-figure">
        <div id="container"></div>
        <p class="highcharts-description" style="text-align: center;">
            Ini adalah hasil survei dari Tabel Pengujung Perpustakaan
        </p>
        <table id="datatable">

            <thead>
                <tr>
                    <th>Jenis Pengujung</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'koneksi.php';
                $jenis_kelamin="SELECT jk, COUNT(*) as jumlah FROM pengunjung GROUP by jk";
                $view = $koneksi->query($jenis_kelamin);
                while ($row = $view->fetch_array()) {

                ?>
                    <tr>
                        <td><?php echo $row['jk']; ?></td>
                        <td><?php echo $row['jumlah']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </figure>
    <script>
        Highcharts.chart('container', {
            data: {
                table: 'datatable'
            },
            chart: {
                type: 'column'
            },
            title: {
                text: 'Data extracted from a HTML table in the page'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Units'
                }
            },
            tooltip: {
                formatter: function() {
                    return '<b>' + this.series.name + '</b><br/>' +
                        this.point.y + ' ' + this.point.name.toLowerCase();
                }
            }
        });
    </script>
</body>
</html>