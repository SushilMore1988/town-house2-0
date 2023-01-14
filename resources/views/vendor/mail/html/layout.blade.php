<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="color-scheme" content="light">
<meta name="supported-color-schemes" content="light">
</head>
<body>
<style>
/* @media only screen and (max-width: 600px) {
.inner-body {
width: 100% !important;
}

.footer {
width: 100% !important;
}
}

@media only screen and (max-width: 500px) {
.button {
width: 100% !important;
}
} */
@font-face {
		font-family: "HankenBook";
		src: url("http://www.burstoralcare.com/css/fonts/Hanken_400_normal_1484218299.eot");
		src: url("http://www.burstoralcare.com/css/fonts/Hanken_400_normal_1484218299.eot?#iefix") format("embedded-opentype"), url("http://www.burstoralcare.com/css/fonts/Hanken_400_normal_1484218299.svg#HankenBook") format("svg"), url("http://www.burstoralcare.com/css/fonts/Hanken_400_normal_1484218299.woff") format("woff"), url("http://www.burstoralcare.com/css/fonts/Hanken_400_normal_1484218299.ttf") format("truetype");
		font-weight: 400;
		font-style: normal;
	}
	
	p {
		margin: 10px 0;
		padding: 0;
	}
	
	table {
		border-collapse: collapse;
	}
	
	h1,
	h2,
	h3,
	h4,
	h5,
	h6 {
		display: block;
		margin: 0;
		padding: 0;
	}
	
	img,
	a img {
		border: 0;
		height: auto;
		outline: none;
		text-decoration: none;
	}
	
	body,
	#bodyTable,
	#bodyCell {
		height: 100%;
		margin: 0;
		padding: 0;
		width: 100%;
	}
	
	#outlook a {
		padding: 0;
	}
	
	img {
		-ms-interpolation-mode: bicubic;
	}
	
	table {
		mso-table-lspace: 0;
		mso-table-rspace: 0;
	}
	
	.ReadMsgBody {
		width: 100%;
	}
	
	.ExternalClass {
		width: 100%;
	}
	
	p,
	a,
	li,
	td,
	blockquote {
		mso-line-height-rule: exactly;
	}
	
	a[href^=tel],
	a[href^=sms] {
		color: inherit;
		cursor: default;
		text-decoration: none;
	}
	
	p,
	a,
	li,
	td,
	body,
	table,
	blockquote {
		-ms-text-size-adjust: 100%;
		-webkit-text-size-adjust: 100%;
	}
	
	.ExternalClass,
	.ExternalClass p,
	.ExternalClass td,
	.ExternalClass div,
	.ExternalClass span,
	.ExternalClass font {
		line-height: 100%;
	}
	
	a[x-apple-data-detectors] {
		color: inherit !important;
		text-decoration: none !important;
		font-size: inherit !important;
		font-family: inherit !important;
		font-weight: inherit !important;
		line-height: inherit !important;
	}
	
	a.mcnButton {
		display: block;
	}
	
	.mcnImage {
		vertical-align: bottom;
	}
	
	.mcnTextContent {
		word-break: break-word;
	}
	
	.mcnTextContent img {
		height: auto !important;
	}
	
	.mcnDividerBlock {
		table-layout: fixed !important;
	}
	
	#bodyCell {
		border-top: 0;
	}
	
	h1 {
		/* color: #543680 !important; */
		font-family: Helvetica;
		font-size: 40px;
		font-style: normal;
		font-weight: bold;
		line-height: 100%;
		letter-spacing: -1px;
		text-align: center;
	}
	
	h2 {
		color: #404040 !important;
		font-family: Helvetica;
		font-size: 26px;
		font-style: normal;
		font-weight: bold;
		line-height: 125%;
		letter-spacing: -.75px;
		text-align: left;
	}
	
	h3 {
		color: #606060 !important;
		font-family: Helvetica;
		font-size: 18px;
		font-style: normal;
		font-weight: bold;
		line-height: 125%;
		letter-spacing: -.5px;
		text-align: left;
	}
	
	h4 {
		color: #808080 !important;
		font-family: Helvetica;
		font-size: 16px;
		font-style: normal;
		font-weight: bold;
		line-height: 125%;
		letter-spacing: normal;
		text-align: left;
	}
	
	#templatePreheader {
		background-color: #FFFFFF;
		border-top: 0;
		border-bottom: 1px solid #D5D5D5;
	}
	
	.preheaderContainer .mcnTextContent,
	.preheaderContainer .mcnTextContent p {
		color: #606060;
		font-family: Helvetica;
		font-size: 11px;
		line-height: 125%;
		text-align: left;
	}
	
	.preheaderContainer .mcnTextContent a {
		color: #26ABE2;
		font-weight: normal;
		text-decoration: underline;
	}
	
	#templateHeader {
		background-color: #00ffe5;
		border-top: 0;
		border-bottom: 0;
	}
	
	.headerContainer .mcnTextContent,
	.headerContainer .mcnTextContent p {
		color: #606060;
		font-family: Helvetica;
		font-size: 15px;
		line-height: 150%;
		text-align: left;
	}
	
	.headerContainer .mcnTextContent a {
		color: #26ABE2;
		font-weight: normal;
		text-decoration: underline;
	}
	
	#templateBody {
		background-color: #fff;
		border-top: 0;
		border-bottom: 0;
	}
	
	#bodyBackground {
		background-color: #FFFFFF;
		border: 1px none #D5D5D5;
	}
	
	.bodyContainer .mcnTextContent,
	.bodyContainer .mcnTextContent p {
		color: #606060;
		font-family: Helvetica;
		font-size: 15px;
		line-height: 150%;
		text-align: left;
	}
	
	.bodyContainer .mcnTextContent a {
		color: #26ABE2;
		font-weight: normal;
		text-decoration: underline;
	}
	
	#templateFooter {
		background-color: #dbdade;
		border-top: 1px none #000000;
		border-bottom: 0;
	}
	
	.footerContainer .mcnTextContent,
	.footerContainer .mcnTextContent p {
		color: #CCCCCC;
		font-family: Helvetica;
		font-size: 11px;
		line-height: 125%;
		text-align: center;
	}
	
	.footerContainer .mcnTextContent a {
		color: #CCCCCC;
		font-weight: normal;
		text-decoration: underline;
	}
	
	button {
		padding: 15px 20px 12px;
		color: #FFFFFF;
		background: #6809e1;
		text-transform: uppercase;
		border: 0px;
		letter-spacing: 1px;
		outline: 0;
		font-size: 16px;
		font-weight: lighter;
		font-family: 'HankenBook', 'Helvetica', sans-serif;
		cursor: pointer;
	}
	
	.em_cta:hover a {
		background-color: #7b3235 !important;
		color: #ffffff !important;
		line-height: 57px !important;
		border-radius: 4px !important;
	}
	
	.em_cta:hover {
		background-color: #28a7a7 !important;
		color: #ffffff !important;
		border-radius: 4px !important;
	}
	
	.em_cta_1:hover a {
		background-color: #28a7a7 !important;
		color: #ffffff !important;
		line-height: 44px !important;
		border-radius: 4px !important;
	}
	
	.em_cta_1:hover {
		background-color: #28a7a7 !important;
		color: #ffffff !important;
		border-radius: 4px !important;
	}
	
	@media only screen and (max-width: 480px) {
		body,
		table,
		td,
		p,
		a,
		li,
		blockquote {
			-webkit-text-size-adjust: none !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		body {
			width: 100% !important;
			min-width: 100% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		.templateContainer {
			max-width: 600px !important;
			width: 100% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		.mcnImage {
			height: auto !important;
			width: 100% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		.mcnCartContainer,
		.mcnCaptionTopContent,
		.mcnRecContentContainer,
		.mcnCaptionBottomContent,
		.mcnTextContentContainer,
		.mcnBoxedTextContentContainer,
		.mcnImageGroupContentContainer,
		.mcnCaptionLeftTextContentContainer,
		.mcnCaptionRightTextContentContainer,
		.mcnCaptionLeftImageContentContainer,
		.mcnCaptionRightImageContentContainer,
		.mcnImageCardLeftTextContentContainer,
		.mcnImageCardRightTextContentContainer {
			max-width: 100% !important;
			width: 100% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		.mcnBoxedTextContentContainer {
			min-width: 100% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		.mcnImageGroupContent {
			padding: 9px !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		.mcnCaptionLeftContentOuter .mcnTextContent,
		.mcnCaptionRightContentOuter .mcnTextContent {
			padding-top: 9px !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		.mcnImageCardTopImageContent,
		.mcnCaptionBlockInner .mcnCaptionTopContent:last-child .mcnTextContent {
			padding-top: 18px !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		.mcnImageCardBottomImageContent {
			padding-bottom: 9px !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		.mcnImageGroupBlockInner {
			padding-top: 0 !important;
			padding-bottom: 0 !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		.mcnImageGroupBlockOuter {
			padding-top: 9px !important;
			padding-bottom: 9px !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		.mcnTextContent,
		.mcnBoxedTextContentColumn {
			padding-right: 10px !important;
			padding-left: 10px !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		.mcnImageCardLeftImageContent,
		.mcnImageCardRightImageContent {
			padding-right: 18px !important;
			padding-bottom: 0 !important;
			padding-left: 18px !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		.mcpreview-image-uploader {
			display: none !important;
			width: 100% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		h1 {
			font-size: 24px !important;
			line-height: 125% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		h2 {
			font-size: 20px !important;
			line-height: 125% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		h3 {
			font-size: 18px !important;
			line-height: 125% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		h4 {
			font-size: 16px !important;
			line-height: 125% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		.mcnBoxedTextContentContainer .mcnTextContent,
		.mcnBoxedTextContentContainer .mcnTextContent p {
			font-size: 18px !important;
			line-height: 125% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		#templatePreheader {
			display: block !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		.preheaderContainer .mcnTextContent,
		.preheaderContainer .mcnTextContent p {
			font-size: 14px !important;
			line-height: 115% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		.headerContainer .mcnTextContent,
		.headerContainer .mcnTextContent p {
			font-size: 18px !important;
			line-height: 125% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		.bodyContainer .mcnTextContent,
		.bodyContainer .mcnTextContent p {
			font-size: 18px !important;
			line-height: 125% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		.footerContainer .mcnTextContent,
		.footerContainer .mcnTextContent p {
			font-size: 14px !important;
			line-height: 115% !important;
		}
		hr {
			width: 100%!important;
			float: none!important;
		}
		div {
			width: 100%!important;
			padding: 5px 0px!important;
		}
		center {
			font-size: 20px;
			padding: 10px 10px;
		}
		div center {
			text-align: center!important;
		}
		div span {
			font-size: 15px!important;
		}
	}
	
	@media only screen and (max-width:599px) {
		.em_main_table {
			width: 100% !important;
		}
		.em_wrapper {
			width: 100% !important;
		}
		.em_hide {
			display: none !important;
		}
		.em_full_img img {
			width: 100% !important;
			height: auto !important;
		}
		.em_center {
			text-align: center !important;
		}
		.em_side10 {
			width: 10px !important;
		}
		.em_aside10 {
			padding-left: 10px !important;
			padding-right: 10px !important;
		}
		.em_side15 {
			width: 15px !important;
		}
		.em_side15_2 {
			width: 25px !important;
		}
		.em_aside15 {
			padding-left: 15px !important;
			padding-right: 15px !important;
		}
		.em_ptop {
			padding-top: 20px !important;
		}
		.em_pbottom {
			padding-bottom: 20px !important;
		}
		.em_pbottom_30 {
			padding-bottom: 30px !important;
		}
		.em_h20 {
			height: 20px !important;
			font-size: 1px !important;
			line-height: 1px !important;
		}
		.em_h30 {
			height: 30px !important;
		}
		.em_mob_block {
			display: block !important;
		}
		.em_hauto {
			height: auto !important;
		}
		.em_clear {
			clear: both !important;
			width: 100% !important;
			display: block !important;
		}
		u+.em_body .em_full_wrap {
			width: 100vw !important;
		}
		.em_pad_all {
			padding: 20px 15px !important;
		}
		.em_pad_all_2 {
			padding: 30px 15px !important;
		}
		.em_pad {
			padding: 0px 15px 20px !important;
		}
		.em_pad_none {
			padding-left: 0px !important;
			padding-right: 0px !important;
		}
	}
	
	@media screen and (max-width: 480px) {
		.em_ptop5 {
			padding-top: 0px !important;
		}
		table td {
			border: 0px !important;
		}
		table tr {
			border: 0px !important;
		}
		table th {
			border: 0px !important;
		}
		table {
			border: 0px !important;
		}
		.mn_aside20 {
			padding: 0 15px !important;
		}
		.em_icon img {
			width: 45px !important;
			height: auto !important;
			max-width: none !important;
		}
		.em_side_20 {
			width: 20px !important;
		}
		.em_side15_2 {
			width: 20px !important;
		}
	}
	
	@media screen and (max-width: 374px) {
		.em_ptop5 {
			padding-top: 5px !important;
		}
		.em_icon img {
			width: 40px !important;
			height: auto !important;
			max-width: none !important;
		}
		.em_side_20 {
			width: 20px !important;
		}
		.em_side15_2 {
			width: 15px !important;
		}
	}
</style>

<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="center">
<table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
{{ $header ?? '' }}

<!-- Email Body -->
<tr>
<td class="body" width="100%" cellpadding="0" cellspacing="0">
<table class="inner-body" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
<!-- Body content -->
<tr>
<td class="content-cell">
{{ Illuminate\Mail\Markdown::parse($slot) }}

{{ $subcopy ?? '' }}
</td>
</tr>
</table>
</td>
</tr>

{{ $footer ?? '' }}
</table>
</td>
</tr>
</table>
</body>
</html>
