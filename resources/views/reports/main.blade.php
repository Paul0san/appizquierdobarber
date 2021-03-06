<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta charset="utf-8" />

		<title>A simple, clean, and responsive HTML invoice template</title>

		<!-- Favicon -->
		<link rel="icon" href="./images/favicon.png" type="image/x-icon" />

		<!-- Invoice styling -->
		<style>
			body {
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				text-align: center;
				color: #777;
			}

			body h1 {
				font-weight: 300;
				margin-bottom: 0px;
				padding-bottom: 0px;
				color: #000;
			}

			body h3 {
				font-weight: 300;
				margin-top: 10px;
				margin-bottom: 20px;
				font-style: italic;
				color: #555;
			}

			body a {
				color: #06f;
			}

			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
				border-collapse: collapse;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(3) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
				
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(3) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			.items-center{
				align-items: center;
			}
		</style>
	</head>

	<body>

		<div class="invoice-box">
			<table>
				<tr class="top">
					<td colspan="3">
						<table>
							<tr>
								<td class="title">
									<img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('\landing\assets\img\logo\logo2_footer.png'))) }}" alt="Company logo"  />
								</td>
								<td>
									
								</td>
								<td>
									Reporte de venta<br />
									Fecha: {{\Carbon\Carbon::now()}}<br />
									Creado por: {{Auth::user()->name}}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="3">
						<table>
							<tr>
								<td>
									Barber:<br />
									{{$barberName}}<br />
								</td>
								<td></td>
								<td>
									Rango de fecha.<br />
									Del: {{$fechaInicio}} <br />
									Al: {{$fechaFin}}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				

				<tr class="heading">
					<td>Venta</td>

					<td>Price</td>

					<td>Fecha</td>
				</tr>

				@foreach ($sales as $sale)

				<tr class="item">

					<td>
						<p class="h3">{{$sale->user->name}}</p>
						@foreach ($sale->services as $service)
						
                          <p>
                            {{$service->service_name}}
						  </p>
                    @endforeach
					</td>
					

					<td><p>$ {{ number_format($sale->total, 2) }}</p></td>

					<td><p>{{Date::parse($sale->created_at)->format('l j \\de F Y h:i A')}}</p></td>
				</tr>
					
				@endforeach

				<tr class="total">
					<td></td>
					<td></td>
					<td>Total: $ {{ number_format($total, 2) }}</td>
				</tr>
			</table>
		</div>
	</body>
</html>