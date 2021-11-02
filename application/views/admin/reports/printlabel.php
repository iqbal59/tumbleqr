<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd>

<html xmlns=http://www.w3.org/1999/xhtml>

<head><title>

</title>
<link href="https://app.quickdrycleaning.com/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://app.quickdrycleaning.com/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="https://app.quickdrycleaning.com/css/StyleSheet.css" rel="stylesheet" type="text/css" />
<link href="https://app.quickdrycleaning.com/css/BarCodeSetting.css" rel="stylesheet" type="text/css" />
<script src="https://app.quickdrycleaning.com/JavaScript/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="https://app.quickdrycleaning.com/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" language="Javascript">

function SetPrintOption() {

document.getElementById("divButtons").style.visibility = "hidden";

window.print();

//document.getElementById("divButtons").style.visibility="visible";

}

function SetPrintOption(PrnName, indexvalue) {

// var LastStyle = $("#divPrint div:last-child").attr('style');

// alert(LastStyle);

// $("#divPrint div:last-child").attr('style', 'width:1.51in;height:2.01in;font-size:6px;text-align:center;overflow:hidden;');

if (CheckIsPrinterInstalled() == false) {

}

else {

var msg = '<div">' + document.getElementById("divPrint").innerHTML + '</div>';

var AllData = $(msg).html().replace(/\n/g, "").replace(/[\t ]+\</g, "<").replace(/\>[\t ]+\</g, "><").replace(/\>[\t ]+$/g, ">")

var PrinterServiceBaseURL = 'http://127.0.0.1:9012/api/printservice/';

$.ajax({

type: 'POST',

dataType: 'json',

cache: false,

async: false,

url: PrinterServiceBaseURL + 'PrintHtmlContent',

data: {

Width: $('#hdnbarcodewidth').val().trim(),

height: $('#hdnbarcodeheight').val().trim(),

PrinterName: PrnName,

IsWetStrengthPaper: "false",

Align: $('#hdnBarcodeTextAlign').val().trim(),

htmlString: AllData,

StoreCode: window.location.pathname.split("/")[1].toUpperCase().trim()

},

success: function (data) {

// alert(data);

},

error: function (jqXHR, textStatus, errorThrown) {

alert(errorThrown);

}

});

// if asked to close window, close it

if ($('#hdnCloseWindow').val() == 'true' && $('#hdnRedirectBack').val() == 'true') {

debugger;

var me = window;

//window.open('../New_Booking/frm_New_Booking.aspx');

window.open('../Home.html', '_self');

// window.location('../New_Booking/frm_New_Booking.aspx');

debugger;

me.close();

window.close();

return;

}

else if ($('#hdnCloseWindow').val() == 'true' && $('#hdnRedirectBack').val() != 'true') {

window.close();

return;

}

else if ($('#hdnCloseWindow').val() != 'true' && $('#hdnRedirectBack').val() == 'true') {

// window.open('../New_Booking/frm_New_Booking.aspx');

// window.location('../New_Booking/frm_New_Booking.aspx');

window.close();

return;

}

}

// if (typeof (jsPrintSetup) == 'undefined') {

// installjsPrintSetup();

// } else {

// // var win4Print = window.open('', 'Win4Print');

// var win4Print = window.open('', 'Popup', 'toolbar=no,scrollbars=no,location=no,statusbar=no,menubar=no,resizable=0,width=10,height=10,left = 490,top = 262', 'Win4Print');

// var msg = document.getElementById("divPrint").innerHTML;

//

// jsPrintSetup.setPrinter(PrnName);

// jsPrintSetup.setOption('orientation', jsPrintSetup.kPortraitOrientation);

// if (indexvalue != 0) {

// jsPrintSetup.setOption('printRange', jsPrintSetup.kRangeSpecifiedPageRange);

// jsPrintSetup.setOption('startPageRange', 1);

// jsPrintSetup.setOption('endPageRange', 1);

// }

// jsPrintSetup.setOption('marginTop', 0);

// jsPrintSetup.setOption('marginBottom', 0);

// jsPrintSetup.setOption('marginLeft', 0);

// jsPrintSetup.setOption('marginRight', 0);

// // set empty page header

// jsPrintSetup.setOption('headerStrLeft', '');

// jsPrintSetup.setOption('headerStrCenter', '');

// jsPrintSetup.setOption('headerStrRight', '');

// // set empty page footer

// jsPrintSetup.setOption('footerStrLeft', '');

// jsPrintSetup.setOption('footerStrCenter', '');

// jsPrintSetup.setOption('footerStrRight', '');

// jsPrintSetup.definePaperSize(100, 100, 'label', 'label', 'label', 39, 86, jsPrintSetup.kPaperSizeMillimeters);

// jsPrintSetup.setPaperSizeData(100);

// jsPrintSetup.setOption('printBGColors', 1);

// jsPrintSetup.setOption('printBGImages', 1);

//

// jsPrintSetup.setOption('printSilent', 1);

// win4Print.document.write(msg);

// win4Print.focus();

//

// jsPrintSetup.print();

// //window.close();

// // win4Print.document.close();

// // if ($('#hdnPrintBookingSlip').val() != 'true' || $('#hdnPrintBookingSlip').val() == null || $('#hdnPrintBookingSlip').val() == '' || $('#hdnPrintBookingSlip') == null) {

// // win4Print.document.write(msg);

//

// win4Print.close();

// // }

// }

}

</script>

<script type="text/javascript">

$(document).ready(function () {

$('.divTestBarcode').css('font-family', '"Code 128"');

$('#divBarcodeText div:last-child').css('page-break-after', 'avoid');

// check if direct printing

if ($('#hdnComingFrom').val() == 'PrintBarCode') {

// we are directly printing

// just print

$('input').hide();

var _PrnValue = $('#hdnValue').val();

var indexvalue = $('#hdnIndexValue').val();

debugger;

SetPrintOption(_PrnValue, indexvalue);

// // if asked to close window, close it

// if ($('#hdnCloseWindow').val() == 'true' && $('#hdnRedirectBack').val() == 'true') {

// debugger;

// var me = window;

// //window.open('../New_Booking/frm_New_Booking.aspx');

// window.open('../Home.html','_self');

// // window.location('../New_Booking/frm_New_Booking.aspx');

// debugger;

// me.close();

// window.close();

// return;

// }

// else if ($('#hdnCloseWindow').val() == 'true' && $('#hdnRedirectBack').val() != 'true') {

// window.close();

// return;

// }

// else if ($('#hdnCloseWindow').val() != 'true' && $('#hdnRedirectBack').val() == 'true') {

// // window.open('../New_Booking/frm_New_Booking.aspx');

// // window.location('../New_Booking/frm_New_Booking.aspx');

// window.close();

// return;

// }

// after this has been printed

// check if print booking slip is true

// if it is, then print the booking slip too..

// if ($('#hdnPrintBookingSlip').val() == 'true') {

// window.setTimeout(openTheBookingSlipWindow, 10000);

// }

// else if ($('#hdnRedirectBack').val() == 'true') {

// // window.open('../New_Booking/frm_New_Booking.aspx');

// window.open('../New_Booking/frm_New_Booking.aspx');

// window.close();

// }

return;

}

// if ($('#hdnPrintBookingSlip').val() != 'true' || $('#hdnPrintBookingSlip').val() == null || $('#hdnPrintBookingSlip').val() == '' || $('#hdnPrintBookingSlip') == null) {

// // only if coming from bookingScreen

// if ($('#hdnRedirectBack').val() == 'true') {

// // window.open('../New_Booking/frm_New_Booking.aspx');

// window.open('../New_Booking/frm_New_Booking.aspx');

// window.close();

// }

// // window.open('../New_Booking/frm_New_Booking.aspx');

// }

function openTheBookingSlipWindow(argBookingNumber, argDate) {

//alert($('#hdnBookingNumber').val());

var _url = '../Bookings/BookingSlip.aspx?BN=' + $('#hdnBookingNumber').val() + '-1' + $('#hdnBookingDate').val() + '&DirectPrint=true';

window.open(_url);

window.close();

}

$('#btnPrint').click(function () {

var PrnValue = $('#hdnValue').val();

var indexvalue = $('#hdnIndexValue').val();

SetPrintOption(PrnValue, indexvalue);

SaveInvoiceHistoryData();

// analytics.feature("Print Barcode", "Order", "QDC");

});

});

function SaveInvoiceHistoryData() {

$.ajax({

url: '../Autocomplete.asmx/InsertInvoiceHistory',

data: "{BookingNo: '" + $('#hdnTmpBookingNo').val() + "', ItemRowIndex: '" + $('#hdnTmpItemRowIndex').val() + "'}",

type: 'POST',

datatype: 'JSON',

contentType: 'application/json; charset=utf8',

async: true,

success: function (response) {

result = response.d;

},

error: function (response) {

}

});

}

function SetBarcodeTextAlign() {

var strAlign = $('#hdnBarcodeTextAlign').val().trim().toUpperCase();

if (strAlign === "LEFT") {

//changed by aditya on 18/5/2019 for page break issue

//$('#divBarcodeText').css('float','left');

$('#divBarcodeText div').css("float", "left");

$('#divBarcodeText').children().before('<div style="clear: both;"></div><div style="page-break-after: always;height: 0px; display: block!important;">&nbsp;</div>')

}

else if (strAlign === "RIGHT") {

//changed by aditya on 18/5/2019 for page break issue

//$('#divBarcodeText').css('float', 'right');

$('#divBarcodeText div').css("float", "right");

$('#divBarcodeText').children().before('<div style="clear: both;"></div><div style="page-break-after: always;height: 0px; display: block!important;">&nbsp;</div>');

}

}

</script>

</head>

<body>

<form name="form1" method="post" action="./Barcodet?bookingNo=T9599&amp;id=0&amp;Index=0&amp;ClearContent=03%2f17%2f2021+14%3a15%3a11" id="form1">

<div>

<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwULLTEzNzQxNzE3OTBkZMhuRkfw5+WUzuPkwxWYTjUB7oyI" />

</div>

<div>

<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="14AB0DEE" />

<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="/wEdABBnb9XphKKpCpvLkvkT/nFf+Ot37oCEEXP3EjBFcbJhKJLPy0BbfEjTS6f9O3RQ0WvMmanfg2wj6wMAwMZ6dh0Rf6aWN7j5qdWN5UdXzJNMUO/I/gHF9JRXNdlxFC53xLIogdYxvPoLFDrrpdMGySBvWdO1UlmEw1OtxQAfTYwn6mpAtu7S3MFkAl8Z/DR9FpQ+VJreiv222YPpxJs75i8H7PcLEz2Ebt3U3lraRtDwF/egwIG8cVUEazXoYxEhaqWt/tcmOS/nivo53vr+vLB7lfZSar5UJmWOCRuQDh1a0J1TMOkvrgOzhujTLWXUxv4N4j6djPdTNDTP/Wm5YJD7CDYqN/YiWnOCUSR46k7/P/dkVXg=" />

</div>

<div style="position: absolute">

<table>

<tr>

<td>

&nbsp;<input type="button" id="btnPrint" value="Print" style="background-color: #ABDC28;

font-weight: bold; font-family: Tahoma" tabindex="1" onclick="return btnPrint_onclick()" />

</td>

<td>

<style type="text/css">

.holder-gotomeeting

{

position: fixed;

bottom: 25px;

left: 25px;

}

.gotomeeting

{

padding: 10px;

border: 1px solid yellow;

width: 280px;

font-size: 24px;

border-radius: 4px;

background: lightyellow;

}

.holder-gotomeeting-for-mozilla

{

position: fixed;

right: 50px;

top: 20px;

}

.gotomeeting-for-mozilla

{

padding: 10px 10px;

border: 1px solid yellow;

width: 750px;

font-size: 24px;

border-radius: 4px;

background: lightyellow;

float: right;

}

.gotomeeting-for-mozilla .step1, .step2

{

float: left;

width: 325px;

margin-right: 10px;

padding-left: 60px;

position: relative;

margin-top: 0;

}

.gotomeeting-for-mozilla > .step1 > img.steps-img, .gotomeeting-for-mozilla > .step2 > img.steps-img

{

position: absolute;

top: 0px;

left: 0;

}

.gotomeeting-for-mozilla img.arrow-img

{

margin: 25px -25px;

}

.gotomeeting p

{

padding-left: 60px;

position: relative;

}

.gotomeeting img

{

position: absolute;

top: 0px;

left: 0;

}

</style>

<div class="modal" id="pnlPrinterPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"

aria-hidden="true">

<div class="modal-dialog" id="divPnlprinter">

<div class="modal-content">

<div class="panel panel-primary" style="margin: 5px;">

<div class="panel-heading">

<h3 class="panel-title">

<span>Install Printing Services</span>

<button type="button" class="close" id="Button3" data-dismiss="modal">

<span aria-hidden="true"><i class="fa fa-times-circle"></i></span><span class="sr-only">

Close</span></button>

</h3>

</div>

<div class="panel-body well-sm-tiny" style="padding: 0px;">

<div id="divPrinterInstaller">

<div class="row-fluid div-margin">

<div class="col-sm-12">

<div class="text-center">

<img src="../images/PrinterImg.png" style="width: 130px; height: 130px;" />

</div>

<div class="div-margin" style="font-size: 14px">

Printing Services not installed. Please install Printing Services to enable automatic

<span id="spnInvTag">invoice and tag</span> printing.<br />

Click the download button below to download the Printing Services setup.<br />

After installing the Printing Services, login once again to setup the printers.

</div>

</div>

</div>

<div class="row-fluid text-center">

<div class="col-sm-12">

<br />

<a id="btnPrinter" class="btn btn-primary" href="#"><i class="fa fa-download"></i>&nbsp;Download

Printer Setup</a>

<br />

&nbsp;

</div>

</div>

</div>

<div id="divPrinterAlert" style="display: none;">

<div class="row-fluid div-margin">

<div class="col-sm-3 text-center">

<i class="fa fa-exclamation-triangle fa-3x" style="color: #EAAB06; padding: 25px 5px 20px 5px;">

</i>

</div>

<div class="col-sm-9" style="padding: 20px 5px 30px 5px">

Printing Services not installed. Please install Printing Services to enable automatic

invoice and tag printing.

</div>

</div>

</div>

</div>

</div>

</div>

</div>

</div>

<div class="holder-gotomeeting" id="divChrome" style="display: none; z-index: 1000">

<div class="gotomeeting">

<p>

<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAOaSURBVGhD1ZpJiFRXFEBbxajEAceYIIqC4hBBHIhxQASVIIJZuRCXKqIuVAIOC4dViCjJIiKIC0UiimShKAEHiBqCAcEQB4wITnGIA1GMiqLGc376QdH8+l12VXffPnCg/61Xv+6r+u/9+97vumD0xNm4Gnfhz3gRH+B/eBhD0h4/x2/wPL5BEy5nuI58ghvwL8xLuNSTuALH4gcYgkG4G19hSvQafo/78Fl97CluxeEYiu74Lb5EE7UjB3AW+pqXTOqYY+NjDMcU9Fs3yddoov4yYsLn0Ncc0HMxHO1wPZq8if6CIzHRA/9AX7uCQzEcHXAHmqSX05r6WMJBewJ9/TL2xXCY5I9oko9wEjZkM/r6LRxgICLb0CSdWksvpcR09H7hJTfZQEQWoZ24j0MMNKAjXkXbbDIQkc/Q8eA37beex1K0E3bGToWjE15Ak1xpIIcP8R7aZp6BiHyFJvgbOu3msRBt8zuWa9OqeD9wdnqLEw2U4QzakSXZUUDSr7E3O8rnU7SNNVQ3A9GwDL+B/hp5U23CGcqO7MmOAuLsZIKW2kWcRtstyI4Csh1NcHF2lI+zldWuv1p/AxG5jibYLzvK5wu0s64AQ2K1aoJWsEW4/rZd2PExH03Q2qqInWi7tdlRQLagCRaNDzmFtvsyOwrIITRBV4BF3EHbjcqOApJWd42tJ2yjYWesh+iMVVTFdsXUkc4GIuK94fH/f5blI7QTL7KjFqQXjqtAdwdN8C4WMRhtZ1GZd548a1IZexe+hOlyaEzrrCJGY977yvkd1owR+C96Yr/xYwX+gEX4i+S9L3kc03aRZX7Nt0Qt7jy5W5hFVW21rEI/x0svbdrVnLQv5aXmJVdrHGeu8Z355hhoLrpg2s6sdZ3UGx1fnttHCs3OMHyCfqBbPbXAWekIek7Ll9IdyGbFHQ8/9DmOMVAlbp96vr/R5yQtis8v/PA/0ccATWUqOkvpTAMtjdPiWbQz+w00ARdft9FztOouo/eEf9BElhl4DxwHR9H3eu9osXFRDtcUTpdOm+MNVIjPSeyEJb31Vwh8tmdSPoXycXJjzMA0LqYZiILj5Ve0MwexqMhzVnJ2su06A9EYiK5HTNCdxjwcB2mZ+xOG3O8V/0PB8eK6JO+BzddoJ25iHwORKZdsY50MR97lU8llF5LSAb0RK50IQmK5kRZIWunUHBL/ScZOeLOcYKCtksqQ5dlRG6eayrgK6ureAXThGdfhzSZKAAAAAElFTkSuQmCC">

Click <strong>Printer Setup Opener</strong> to begin.</p>

</div>

</div>

<div class="holder-gotomeeting-for-mozilla" id="divmozilla" style="display: none;

z-index: 1000">

<div class="gotomeeting-for-mozilla">

<p class="step1">

<img class="steps-img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAFJSURBVGhD7dgtSwRRFIDhEYMaDXYFkwoW/Qf7O4yCYBEEwSBGi9E1mGTZsphsGkxGLTZBk2LQ4gcYVNT3ggM3nLM7zqxz75XzwlOGPXc5MAO7k1mWZVlWDQ1jNJABVGoKe7jDV0DvOMcqRvCr3JA7QDo4pCvMoFArkA6JxT3G0bVJvEE6ICZH6NoOpMEYzULtGtJQjNaglsJtlduFmjRQ1QXO8OFd64c21KSBKm4xCNcjpM+UVdsin1hCXlKL3OAAW5iDX1KLNKGV1CKHaHj8nxPJPiOO/2W2iMIWKcMWKcAWKcMWKcAWKePfLHKM/P3U08+1fql1kb/UgtozpKEYbUPtFNJQjBagtgxpKDYvcM+d2hAuIQ3HZB09m8YDpANi4P5K5y80ejaBE0gHhfKKDRRewm8em9hHJxD3Im4RY7Asy7IsSy/LvgGZdwo14du0hgAAAABJRU5ErkJggg==">

Click <strong>Save File</strong> in the dialog box in the center.</p>

<p class="step2">

<img class="steps-img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAHzSURBVGhD7di7Sx1BFIDxGw3xURhSaKGBKAhCIqQQCwur9P4JdprGIhFBsBC72FikCBZiIPgoRBCraKOCdhoiIRoUBRstkk5Bgg+S70AWluXMzc7K7I4wH/wQ7s4sHHS9c28pFAqFQqEcqsaTgjzAnXqOKZzhT4Gu8QVDqIFVskluoN24SEdoR6reQruJL36iGWVrxRW0G/hkFWX7AG2jj17C2DG0TT4ahrH78GcVmYQxbUNWv7GBWSxjD9q6rOZgTNuQxTwakKwD36DtseV8kM+Ivxs/RXwoebc+gbbXhvNB2iA9xiai1xfxCFIf4nuycDrIPqLeIXn9NST5LSWv2XI6yBKitGdhGtJDJK/ZcjrICuSBFhf/Xot7A+kZktdsOX9GTL5DPg5Ig9DW2ChkkG00QpKfcvDT1tnIdZAbjCP6byUP+S60tbZyG+QQXYjqxim0tVnkMsg66iDV4j1uoa3Nyvkgcr6KHupO/IC27q6cDnKJJkg9cHmadjrIR0gVkDPXjsFXaPttOB2kF2mSc5i234bTQV4hTd4PkqcZGDuHtslHEzC2BW2Tj8o+jwPQNvlGTtbySdNYFQ6gbfbJCP7bC/yCdgMfyEfmSqSqBWvQblQUOTWMIvUQ8eSsNIZPWCiIfBHXj3qEQqFQKBQyVyr9BRib5t9/OkoZAAAAAElFTkSuQmCC">

Click

<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAACZSURBVEhL7dSxDkAwEMbxvqCO3oWJgcXbSDB5IovBTo476VAi+EqT/pNbLm1/E8qrdNrM5vAaH2FVN64TYGgB5jW+APMaX4B5jQ8OR0mT0cO2MWHb0F1+5l46bYs476eyHnbsaOgMnaU7fP1ZV/DXUekMh6GSDYejkok7QyXBnaISgc5R/7P9eZDD7Aab3yVy/gO7HGa/SKkFZHqafxeCjw0AAAAASUVORK5CYII="

width="22">

above, then click <strong>Printer Setup Opener</strong> to begin.</p>

<img class="arrow-img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAOnSURBVGhD1ZpZqE1RGICvOYQMoYRIppAMD6YHESkkD4YXkSRDJMQDIXmgDA8iwwMJSZRQUqSMD4RkLEXGDJll5vuOu+t222ffc9nnnHW++mL/Z529/+XsvYZ/K0uZodji719Ll3b4Ck9gTQOlSF28gL/LXYYlyXq0A8/xR7neZiXFOPyFX7EvrkQ79QxbY0nQAd+gic8xALXwJBo7XX4cND4Xl9GEDxioQEt8gn622kDIbEYTvYuNDVRiCPqs/MSRBkJkItqJz9jbQBaWou1eYBsDIdEF36MJzjCQQA08jrY9i7UxCBrgdTSxPQZyoDk+RL+z1kAI7EQTuoUNDeTIAHR4dpgebaCYTEE78Qm7G6gmC9Dvv8b2BoqBidsBE7FD/4LPyyH0HJfQ4bugeAt5K5nADgP/QRO8j55rk4FC4kPtha9ifQP/SR/8gj4v4w0UAodXO/EOOxtIiVnoed9iRwP5xInOCc8LTjCQMvvRc1/BegbygUsOlx5eyKVIPmiEd9BrbDGQD1wEegEfzK7ozx+nu8IkHJnivhfpFsD1mNeahKnictwT56IzdhI9Me57cbrs8R8tFdqiW1aX50k6gnnxqjri/GM7Z/W481R2NzrfFAw3SyboLJ2Et14u7YrKR3RUS6Ip2hH3JMHyCE3S0ScbPuy20bjNVxCcRxN0f5KEz4ftirZQrIq9aIJjMkfZuYm2cykfJNE21j+TOIq2m5Y5CpARaIIuzZOIinfrMkcB4pL8O77EpLF/JtqRY5mjQLGgYJL9M0fx9ELb2OFgi9uL0SSTigr+WpaDbGdJNUhc0jjZPcWkUk+0CK1qYCgqvg8xyaTV63S0jXNPsFgONcl7mK2g4KweFS96GAiVc2iSCzNH8exC2xS86FAdBqLFBF8xtDIQw2C0I+7TrT4Gy1Y0Ud+JZHvwT6FtNmSOAsXn4AYm3T7ON/5yloM6GQgVk3MTZWfmG4hhH/r5RQymOh/HcPyGJrvKQCWa4WP08+DfZllxj4Zby6yVK5TD0InU22yqgZBxlIpelFo77ocViaqNloNSLwWljbtHqyMm7O3maFXxv3isQT/zl1mCBa2gVJc6aMJRIc468gr0za8sQjviZ76mC/7dvDWuI2jC0S90EEehtWX/14Rxb0dXCGlU/vPKIDyMbsqiTn3AMxgNEOowvhG7YdD4uno5XsMo+Wzexu04FoPGgvZsdLJ8gHGd0aC3y3FYD7B8NBnnoRPnNpyLMZSV/QGVQxnB59QBEwAAAABJRU5ErkJggg==">

</div>

</div>

<script src="../JavaScript/bowser.js" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function () {

$('#btnPrinter').click(function (event) {

$('#btnPrinter').attr('href', "../PrinterSetupDownload.ashx?file=Docs/QuickDryCleaningPrintingService.exe");

$('#pnlPrinterPopup').modal('hide');

var AllBrowseDetails = JSON.stringify(bowser, null, ' ');

var BrowseName = JSON.parse(AllBrowseDetails).name.trim();

if (BrowseName == 'Firefox') {

$('#divmozilla').show();

$('#divChrome').hide();

}

else {

$('#divmozilla').hide();

$('#divChrome').show();

}

setTimeout(function () { $('#divChrome,#divmozilla').hide(); }, 10000);

});

});

function CheckIsPrinterInstalled() {

var PrinterServiceStatus = true;

var PrinterServiceBaseURL2 = 'http://127.0.0.1:9012/api/printservice/';

var PrinterServiceCurrVer = '184.0.3';

$.ajax({

type: 'POST',

dataType: 'json',

data: { Version: PrinterServiceCurrVer },

cache: false,

async: false,

url: PrinterServiceBaseURL2 + "IsPrintUtilityInstalled",

success: function (data) {

PrinterServiceStatus = true;

$('#pnlPrinterPopup').modal('hide');

},

error: function (jqXHR, textStatus, errorThrown) {

PrinterServiceStatus = false;

$('#pnlPrinterPopup').modal({ backdrop: 'static', keyboard: false });

}

});

return PrinterServiceStatus;

}

</script>

<input type="submit" name="btnCancel" value="Close" id="btnCancel" style="color:White;background-color:#6086AC;border-color:White;border-width:2px;border-style:Solid;font-family:Verdana;font-size:10pt;font-weight:bold;" />

<input type="hidden" name="hdnValue" id="hdnValue" value="TSC TTP-244 Pro" />

<input type="hidden" name="hdnComingFrom" id="hdnComingFrom" />

<input type="hidden" name="hdnPrintBookingSlip" id="hdnPrintBookingSlip" />

<input type="hidden" name="hdnBookingNumber" id="hdnBookingNumber" />

<input type="hidden" name="hdnBookingDate" id="hdnBookingDate" />

<input type="hidden" name="hdnRedirectBack" id="hdnRedirectBack" />

<input type="hidden" name="hdnIndexValue" id="hdnIndexValue" value="0" />

<input type="hidden" name="hdnCloseWindow" id="hdnCloseWindow" />

<input type="hidden" name="hdnTmpBookingNo" id="hdnTmpBookingNo" value="T9599" />

<input type="hidden" name="hdnTmpItemRowIndex" id="hdnTmpItemRowIndex" value="0" />

<input type="hidden" name="hdnBarcodeTextAlign" id="hdnBarcodeTextAlign" value="Center" />

<input type="hidden" name="hdnbarcodewidth" id="hdnbarcodewidth" value="1.51in" />

<input type="hidden" name="hdnbarcodeheight" id="hdnbarcodeheight" value="3.11in" />

<input type="hidden" name="hdnEventClick" id="hdnEventClick" />

</td>

</tr>

</table>

</div>

<br /><br />

<div id="divPrint">

<center id="divBarcodeText">

<div style='width:1.51in;height:3.11in;font-size:6px;text-align:center;overflow:hidden;page-break-after:always;'><div style='width: 60%; float: left; overflow: hidden; font-size:10px; text-align:Left;vertical-align: middle; padding: 0px 1px 0px 1px;'>1 - Sector 46 Noida</div><div style='width: 100%; height: ; font-family:Arial Black; font-size:18px; font-weight:Bold;font-style:; text-decoration:; text-align:Center;margin-bottom:-2%;' >T9599 </div><img alt='T9599-1-1' runat='server' src='https://api.quickdrycleaning.com/NewTesting/api/getQrCode/4/T9599-1-1' style='width: 100%' id='imgCtrl' /><br /><span style='font-size: 13px;'>T9599-1-1</span><div style='width: 100%; height: ; font-family:Arial; font-size:10px; font-weight:Bold;font-style:; text-decoration:; text-align:Center; text-transform: capitalize' >Sakchi Anand</div><div style='width: 100%; height:25px ; font-family:Arial; font-size:12px; font-weight:Bold;font-style:; text-decoration:; text-align:;margin-left:6%;' ><div style='position:relative;float:right;margin-top:4px;margin-right:20%;'>1/1</div><div style='position:relative;float:right;margin-top:4px;margin-right:20%;'>SI</div></div><div style='width: 100%; height: ; font-family:Arial; font-size:14px; font-weight:Bold;font-style:; text-decoration:; text-align:Center;'>21 Mar 21 Sun </div><div style='width: 100%; height: ; font-family:Arial Black; font-size:8px; font-weight:Bold;font-style:; text-decoration:; text-align:Center;margin-top:-2%;'>Shorts </div><div style=margin-top:-2px;>--------------------</div></div>

</center>

</div>

<script type="text/javascript">

//<![CDATA[

SetBarcodeTextAlign();//]]>

</script>

</form>

</body>

</html>

