<style>
	        /*http://stackoverflow.com/questions/7846346/how-to-avoid-extra-blank-page-at-end-while-printing*/
	        
@media print {
    html, body {
        border: 1px solid white;
        height: 99%;
        page-break-after: avoid;
        page-break-before: avoid;
    }
    
	
	
	.taglabel { width:1.51in;height:3.11in;} 

}






    *{ margin:0; padding:0;}
	
	.label{
       
        width: 225mm; /* 227plus .6 inches from padding */
		height:85mm;
        
		
        text-align: center;
		font-family:"arial";
		font-size:20px;
        overflow: hidden;
		margin:0 auto;
       /* outline doesn't occupy space like border does */
        }
		.page-break  {
        clear: left;
        display:block;
        page-break-after:always;
        }
    .rowheight{ height: 30px;}
	
	.name{ font-size:30px;}
	.large{font-size: 45px;}
	.big{ font-size: 30px;}
		
	.border{ border: 2px solid #000;}	
		
    </style>
 <body class="taglabel" onload="javascript:window.print();">  

<center id="divBarcodeText">

<div style='width:1.51in;height:3.11in;font-size:6px;text-align:center;overflow:hidden;page-break-after:always;'><div style='width: 100%;  overflow: hidden; font-size:14px; text-align:center;vertical-align: middle;'><?php echo $challans['store_id']."- ".$challans['Store_Name'] ?></div><div style='width: 100%; height: ; font-family:Arial Black; font-size:18px; font-weight:Bold;font-style:; text-decoration:; text-align:Center;margin-bottom:-2%;' ><?php echo $challans['Order_No']?> </div><br/><span style='font-size: 13px;'><?php echo $challans['Barcode']; ?></span><div style='width: 100%; height: ; font-family:Arial; font-size:10px; font-weight:Bold;font-style:; text-decoration:; text-align:Center; text-transform: capitalize' ><?php echo $challans['Sub_Garment'];?></div><div style=margin-top:-2px;>--------------------</div></div>

</center>


<!-- <div style='width: 100%; height:25px ; font-family:Arial; font-size:12px; font-weight:Bold;font-style:; text-decoration:; text-align:;margin-left:6%;' ><div style='position:relative;float:right;margin-top:4px;margin-right:20%;'>1/1</div><div style='position:relative;float:right;margin-top:4px;margin-right:20%;'>SI</div></div><div style='width: 100%; height: ; font-family:Arial; font-size:14px; font-weight:Bold;font-style:; text-decoration:; text-align:Center;'>21 Mar 21 Sun </div><div style='width: 100%; height: ; font-family:Arial Black; font-size:8px; font-weight:Bold;font-style:; text-decoration:; text-align:Center;margin-top:-2%;'>Shorts </div> -->
 </body>