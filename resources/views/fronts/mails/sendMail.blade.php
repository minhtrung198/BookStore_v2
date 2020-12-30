<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta name="viewport" content="width=device-width" /><!-- IMPORTANT -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Order Confirmed</title>

<!-- <link rel="stylesheet" type="text/css" href="stylesheets/email.css" /> -->
<style>
	/* -------------------------------------
			GLOBAL
	------------------------------------- */
	* {
		margin:0;
		padding:0;
	}
	* {
        font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
    }
	img {
		max-width: 100%;
	}
	.collapse {
		margin:0;
		padding:0;
	}
	body {
		-webkit-font-smoothing:antialiased;
		-webkit-text-size-adjust:none;
		width: 100% !important;
		height: 100%;
	}
	/* -------------------------------------
			ELEMENTS
	------------------------------------- */
	a { color: #2BA6CB;}
	.btn {
		text-decoration:none;
		color:#FFF;
		background-color:#666;
		width:80%;
		padding:15px 10%;
		font-weight:bold;
		text-align:center;
		cursor:pointer;
		display:inline-block;
	}
	p.callout {
		padding:15px;
		text-align:center;
		background-color:#ECF8FF;
		margin-bottom: 15px;
	}
	.callout a {
		font-weight:bold;
		color: #2BA6CB;
	}
	.column table { width:100%;}
	.column {
		width: 300px;
		float:left;
	}
	.column tr td { padding: 15px; }
	.column-wrap {
		padding:0!important;
		margin:0 auto;
		max-width:600px!important;
	}
	.columns .column {
		width: 280px;
		min-width: 279px;
		float:left;
	}
	table.columns, table.column, .columns .column tr, .columns .column td {
		padding:0;
		margin:0;
		border:0;
		border-collapse:collapse;
	}
	/* -------------------------------------
			HEADER
	------------------------------------- */
	table.head-wrap { width: 100%;}
	.header.container table td.logo {
        padding: 15px;
    }
	.header.container table td.label {
        padding: 15px;
        padding-left:0px;
    }
	/* -------------------------------------
			BODY
	------------------------------------- */
	table.body-wrap { width: 100%;}
	/* -------------------------------------
			FOOTER
	------------------------------------- */
	table.footer-wrap { width: 100%;	clear:both!important;
	}
	.footer-wrap .container td.content  p {
        border-top: 1px solid rgb(215,215,215);
        padding-top:15px;
    }
	.footer-wrap .container td.content p {
		font-size:10px;
		font-weight: bold;
	}
	/* -------------------------------------
			TYPOGRAPHY
	------------------------------------- */
	h1,h2,h3,h4,h5,h6 {
        font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
        line-height: 1.1;
        margin-bottom:15px;
        color:#000;
	}
	h1 small, h2 small, h3 small, h4 small, h5 small, h6 small {
        font-size: 60%;
        color: #6f6f6f;
        line-height: 0;
        text-transform: none;
    }
	h1 {
        font-weight:200;
        font-size: 44px;
    }
	h2 {
        font-weight:200;
        font-size: 37px;
    }
	h3 {
        font-weight:500;
        font-size: 27px;
    }
	h4 {
        font-weight:500;
        font-size: 23px;
    }
	h5 {
        font-weight:900;
        font-size: 17px;
    }
    h6 {
        font-weight:900;
        font-size: 14px;
        text-transform: uppercase;
        color:#444;
    }
	.collapse {
        margin:0!important;
    }
	p, ul {
		margin-bottom: 10px;
		font-weight: normal;
		font-size:14px;
		line-height:1.6;
	}
	p.lead {
        font-size:17px;
    }
	p.last {
        margin-bottom:0px;
    }
	ul li {
		margin-left:5px;
		list-style-position: inside;
	}
	hr {
	    border: 0;
	    height: 0;
	    border-top: 1px dotted rgba(0, 0, 0, 0.1);
	    border-bottom: 1px dotted rgba(255, 255, 255, 0.3);
	}
	/* -------------------------------------
			Shopify
	------------------------------------- */
	.products {
		width:100%;
		height:40px;
		margin:10px 0 10px 0;
	}
	.products img {
		float:left;
		height:40px;
		width:auto;
		margin-right:20px;
	}
	.products span {
		font-size:17px;
	}
	/* ---------------------------------------------------
			RESPONSIVENESS
			Nuke it from orbit. It's the only way to be sure.
	------------------------------------------------------ */
	/* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
	.container {
		display:block!important;
		max-width:600px!important;
		margin:0 auto!important; /* makes it centered */
		clear:both!important;
	}
	/* This should also be a block element, so that it will fill 100% of the .container */
	.content {
		padding:15px;
		max-width:600px;
		margin:0 auto;
		display:block;
	}
	/* Let's make sure tables in the content area are 100% wide */
	.content table {
        width: 100%;
    }
	/* Be sure to place a .clear element after each set of columns, just to be safe */
	.clear {
        display: block;
        clear: both;
    }
	/* -------------------------------------------
			PHONE
			For clients that support media queries.
			Nothing fancy.
	-------------------------------------------- */
	@media only screen and (max-width: 600px) {
		a[class="btn"] {
            display:block!important;
            margin-bottom:10px!important;
            background-image:none!important;
            margin-right:0!important;
        }
		div[class="column"] {
            width: auto!important;
            float:none!important;
        }
		table.social div[class="column"] {
			width:auto!important;
		}
	}
</style>

</head>

<body bgcolor="#FFFFFF">

<!-- HEADER -->
<table class="head-wrap" bgcolor="#ff4259">
	<tr>
		<td></td>
		<td class="header container">

				<div class="content">
					<table bgcolor="#ff4259">
						<tr>
							<td>
							</td>
							<td style="text-align: right">
								<h6 class="collapse">Thư xác nhận đơn hàng của khách</h6>
							</td>
						</tr>
					</table>
				</div>

		</td>
		<td></td>
	</tr>
</table><!-- /HEADER -->


<!-- BODY -->
<table class="body-wrap">
	<tr>
		<td></td>
		<td class="container" bgcolor="#5595ff">
			<div class="content">
			<table>
				<tr>
					<td>
						<p><img src="data:image/png;base64,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" alt=""></p>
						<br/>
                            <br> Cám ơn bạn đã mua sắm tại <b>Unicorn BookStore</b>
                            <br>
                            <br> Đơn hàng của bạn đang 
                            <b>chờ shop</b>  
                            <b>xác nhận</b> (trong vòng 24h)
                            <br> Chúng tôi sẽ thông tin <b>trạng thái đơn hàng</b> trong email tiếp theo.
                            <br> Bạn vui lòng kiểm tra email thường xuyên nhé.
                        <br/>

                        <!-- Order detail -->
                        <table class="table ps-cart__table">
                            <thead>
                                <tr style="text-align: left">
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Tổng tiền</th>
                                </tr>
                            </thead>
                        </table>
                        <br/>

					</td>
				</tr>
			</table>
			</div>

		</td>
		<td></td>
	</tr>
</table>
<!-- /BODY -->

<!-- FOOTER -->
<table class="footer-wrap" bgcolor="#5595ff">
	<tr>
		<td></td>
		<td class="container">

				<!-- content -->
				<div class="content">
                    <table>
                        <tr>
                        <td align="center" valign="middle" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:black;line-height:20px;padding-bottom:5px"> 
                            Đây là thư tự động từ hệ thống. Vui lòng không trả lời email này.
                            <br> Nếu có bất kỳ thắc mắc hay cần giúp đỡ, Bạn vui lòng ghé thăm 
                            <b style="font-family:Arial,Helvetica,sans-serif;font-size:13px;text-decoration:none;font-weight:bold">Trung tâm trợ giúp</b> của chúng tôi tại địa chỉ: 
                            <a href="#" style="font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#0066cc;text-decoration:none;font-weight:bold" target="_blank">
                                unicornBook.com
                            </a>
                        </td>
                        </tr>
                    </table>
                </div>
                <!-- /content -->

		</td>
		<td></td>
	</tr>
</table>
<!-- /FOOTER -->

</body>
</html>