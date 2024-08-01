<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'>
		<title></title>
		<style type="text/css">
			* {
				margin: 0;
				padding: 0;
			}

			.header, .body, .footer {
				width: 600px;
				margin: 0 auto;
			}

			.header img, .footer img {
				width: 600px;
			}

			.body {
				background: #FFF;
				color: #000;
				padding-top: 10px;
			}

			.body div {
				padding: 10px 20px;
			}

			.body div p {
				text-align: justify;
				margin-top: 15px;
			}

			@media screen and (max-width: 768px) {
				.header, .header img, .footer, .footer img, .body {
					width: 100%;
				}

				.header, .footer {
					border-radius: 0;
				}
			}

            .table {
                display: table;
                width: 100%;
                max-width: 100%;
                background-color: transparent;
                border-collapse: collapse;
            }

            .table-bordered {
                border: 1px solid #B5B5C3;
            }

            thead {
                display: table-header-group;
                vertical-align: middle;
                border-color: inherit;
            }

            tr {
                display: table-row;
                vertical-align: inherit;
                border-color: inherit;
            }

            .table th,
            .table td {
                padding: 0.40rem;
                /*  padding: 0.75rem; */
                vertical-align: top;
                /* border-top: 1px solid #c2cfd6; */
            }

            .table thead th {
                vertical-align: bottom;
                /*  border-bottom: 2px solid #c2cfd6; */
            }

            .table-bordered thead th,
            .table-bordered thead td {
                border-bottom-width: 2px;
            }

            .table-bordered th,
            .table-bordered td {
                /*border: 1px solid #B5B5C3;*/
                /* border: 2px solid #000000; */
            }

            th,
            td {
                display: table-cell;
                vertical-align: inherit;
                font-size: 18px;
            }

            th {
                font-weight: normal !important;
                text-align: -internal-center;
                text-align: left;
            }

            tbody {
                display: table-row-group;
                vertical-align: middle;
                border-color: inherit;
            }

            tr {
                display: table-row;
                vertical-align: inherit;
                border-color: inherit;
            }

            .detalle-header {
                /*background-color: #E4E6EF;*/
                color: #000000;
                font-size: 16px;
                border-right: 0;
                text-align: left !important;
                padding-left: 15px !important;
            }

            .detalle-respuesta {
                font-size: 16px;
                color: #5E6278;
            }            

		</style>
	</head>
	<body>
		<div class='wrapper'>
			<div class='header'></div>
			<div class='body'>
				<div>
					<h3>CARTAS DE GARANTÍA PENDIENTES DE FACTURAS</h3><br>

                    <h4>Estimados </h4><br>

					<h5>Le recordamos que a la fecha cuenta con las siguientes cartas de garantía que se encuentran pendientes de ser liquidadas:</h5><br>

                    <section>
                        <table class="table  table-striped table-sm" cellspacing="0">
                            <tr>
                                <th class="detalle-header" style="width:50%;">Solicitudes: </th>
                                
                            </tr>  
                            

                        
                        </table>
                    </section>

				</div>
			</div>
			<div class='footer'></div>
		</div>
	</body>
</html>