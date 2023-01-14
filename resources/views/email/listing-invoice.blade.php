<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,400;1,700&display=swap" rel="stylesheet">
	<link href="http://fonts.cdnfonts.com/css/nevis" rel="stylesheet">
    <title>Invoice</title>
    <style>
        body{
			padding: 0px;
			margin: 0px;
			font-family:'nevis', sans-serif;
			color: #989898;
		}
        @page {
            margin: 10px;   
        }
		table{
			border:none;
		}
		tr{
			border: none;
		}
		td{
			border: none;
		}
    </style>
</head>
<body style="width: 100%;">
    <table style="width: 100%;" cellspacing="0" cellpadding="0">
		<tr>
			<td style="width:33.33%;"></td>
			<td style="width:33.33%;text-align:center;"><a href="#" title="" target="_blank"> <img alt="" src="{{url('/img/logo-with-name.png')}}" width="200" style="max-width:84px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage"> </a></td>
			<td style="width:33.33%;"></td>
		</tr>
		<tr>
			<td></td>
			<td><br></td>
			<td></td>
		</tr>
		<tr>
			<td style="border-top:1px solid #989898;border-bottom:1px solid #989898;"></td>
			<td style="border-top:1px solid #989898;border-bottom:1px solid #989898;ont-family: 'nevis', sans-serif;font-size:15px; text-align:center;padding-top:5px;padding-bottom:5px;"> INVOICE</td>
			<td style="border-top:1px solid #989898;border-bottom:1px solid #989898;"></td>
		</tr>
		<tr>
			<td></td>
			<td><br/></td>
			<td></td>
		</tr>
		<tr>
			<td style="font-family:'nevis', sans-serif;font-size:14px;">{{$name}}</td>
			<td style=""></td>
			<td style="font-family: 'nevis', sans-serif; font-size: 14px;color: #989898;">INVOICE DATE : {{$date}}</td>
		</tr>
		<tr>
			<td style="font-family: 'Roboto', sans-serif;font-style: italic;font-size: 12px;line-height: 1em;padding-top:5px;padding-bottom:5px;"><strong>Email ID</strong> : {{$email}}</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td style="font-family: 'Roboto', sans-serif;font-style: italic;font-size: 12px;line-height: 1em;padding-top:5px;padding-bottom:5px;"><strong>Contact No</strong> : {{$phone}}</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td style="font-family: 'Roboto', sans-serif;font-style: italic;font-size: 12px;line-height: 1em;padding-top:5px;padding-bottom:5px;"><strong>Booking Reference</strong> : {{$txnid}}</td>
			<td></td>
			<td rowspan="3" style="font-family: 'Roboto', sans-serif;font-style: italic;font-size: 12px;line-height: 1.5em;"><strong>Billing Address</strong> : {!!$billing_address!!}</td>
		</tr>
		<tr>
			<td style="font-family: 'Roboto', sans-serif;font-style: italic;font-size: 12px;line-height: 1em;padding-top:5px;padding-bottom:5px;"><strong>Invoice Number</strong> : {{$txnid}}</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td style="font-family: 'Roboto', sans-serif;font-style: italic;font-size: 12px;line-height: 1em;padding-top:5px;padding-bottom:5px;"><strong>Transactio ID </strong> : {{$txnid}}</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td><br></td>
			<td></td>
		</tr>
		<tr style="border-top:1px solid #989898; border-bottom:1px solid #989898; margin-top:10px;margin-bottom:10px;background-color:#e8e6e6;">
			<td style="border-top:1px solid #989898;border-bottom:1px solid #989898;"></td>
			<td style="border-top:1px solid #989898;border-bottom:1px solid #989898;text-align: center; font-family:'nevis', sans-serif;font-size:15px;padding-top:5px;padding-bottom:5px;">TH2.0 SERVICES</td>
			<td style="border-top:1px solid #989898;border-bottom:1px solid #989898;"></td>
		</tr>
		<tr>
			<td style="padding-top:10px;padding-bottom:10px;font-size:14px;line-height:1.5em;">1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$payment_for}}<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!!$package_name!!}</td>
			<td></td>
			<td style="text-align: end; padding-right:10px;">{{$package_currency}} {{$package_amount}}</td>
		</tr>
		<tr style="border-top:1px solid #989898; border-bottom:1px solid #989898; margin-top:10px;margin-bottom:10px;background-color:#e8e6e6;">
			<td style="border-top:1px solid #989898;border-bottom:1px solid #989898;"></td>
			<td style="border-top:1px solid #989898;border-bottom:1px solid #989898;text-align: center;padding-top:10px;padding-bottom:10px;">Total</td>
			<td style="border-top:1px solid #989898;border-bottom:1px solid #989898;text-align: end;padding-right:10px;">{{$package_currency}} {{$package_amount}}</td>
		</tr>
		<tr>
			<td colspan="3" style="text-align: center;border-collapse: collapse; mso-line-height-rule: exactly;font-family: 'Roboto', sans-serif;font-style: italic;font-size: 12px;line-height: 1em;color: #989898;padding-top:30px;">Digitally Approved No Signature Required</td>
		</tr>
	</table>
</body>