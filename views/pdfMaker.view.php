<!--index.html-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title>HTML-to-PDF PDFMake Example</title>
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1"
		/>
		<!-- pdfmake CDN link -->
		<script
			src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.72/pdfmake.min.js"
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		></script>
		<!--vfs_fonts.js is essential for embedding fonts into PDF documents created with pdfmake-->
		<script
			src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.72/vfs_fonts.js"
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		></script>
        <?php
            $arr = [
                [
                    "hello", "world"
                ],
                [
                    'world', 'hello'
                ]
                ];
        ?>
	</head>
	<body>
		<button id="download-button" onclick="generatePDF()">Generate Invoice PDF</button>

		<script>
			// const button = document.getElementById('download-button');
			// button.addEventListener('click', generatePDF);

			function generatePDF() {
				const docDefinition = {
                    content: [
                        {
                            text: "Laporan transaksi",
                            style: 'header'
                        },
                        {
                            text: "26 November 2006",
                            style: 'transactionDate'
                        },
                        {
							canvas: [
								{
									type: 'line',
									x1: 0,
									y1: 5,
									x2: 515,
									y2: 5,
									lineWidth: 2.5,
									lineColor: 'black',
								},
							],
							margin: [0, 10, 0, 20],
						},
                        {
                            table:{
                                headerRows: 1,
                                widths: [ '*', '*'],
                                body: <?= json_encode($arr) ?>
                            }
                        }
                    ],
                    styles: {
                        header: {
                            fontSize: 22,
                            bold: true,
                            decoration: 'underline'
                        },
                        transactionDate: {
                            fontSize: 12,
                            italics: true,
                        }
                    }
				};

				pdfMake
					.createPdf(docDefinition)
					.download('Hello.pdf');
			}

		</script>
	</body>
</html>