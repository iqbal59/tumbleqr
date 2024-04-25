<div
    style="max-width:600px; background:url('https://simplifytumbledry.in/assets/emailer/before_after/bg.png') #fff top left; margin:0 auto;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
        <tbody>
            <tr>
                <td align="center">
                    <a href="https://tumbledry.in/" target="_blank"> <img width="100%"
                            src="https://simplifytumbledry.in/assets/emailer/before_after/Header_01.png" alt=""></a>
                </td>
            </tr>





            <?php 
            $i=0;
            foreach ($imagesData as $image) {
                //  if (($image['remarks'] != 'Colour Bleed' && $image['remarks'] != 'Stain') || $image['picture_new'] == '')
                if (!$image['picture_new'])
                    continue;
                ?>
            <tr>
                <td align="center" style="padding-top:15px; position:relative;">
                    <?php if($i==0){?>
                    <img src="https://simplifytumbledry.in/assets/emailer/before_after/before.png" alt=""
                        style="position:absolute; top:0;left:30;">
                    <img src="https://simplifytumbledry.in/assets/emailer/before_after/after.png" alt=""
                        style="position:absolute; top:0;right:30;">
                    <?php }?>
                    <div
                        style="padding-bottom:60px; background:url('https://simplifytumbledry.in/assets/emailer/before_after/bg-image.png')  no-repeat  bottom center; margin :0 auto; width:80%">
                        <table align="center" border:"0" style=" background:#fff;padding:3%; margin:0px;" width="98%">

                            <tbody>
                                <tr>
                                    <td style="padding-right:10px;">
                                        <img width="100%"
                                            src="https://swatinfosystems.com/upload/<?php echo $image['picture']; ?>"
                                            alt="">
                                    </td>
                                    <td style="padding-left:10px;">
                                        <img width="100%"
                                            src="https://swatinfosystems.com/upload/<?php echo $image['picture_new']; ?>"
                                            alt="">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>

            <?php $i++; } ?>



            <tr>
                <td align="center">
                    <a href="https://tumbledry.in/" target="_blank"><img width="30%"
                            src="https://simplifytumbledry.in/assets/emailer/before_after/button_txt.png" alt=""></a>
                </td>
            </tr>

            <tr>
                <td align="center" style=" padding:50px 0;">
                    <table align="center" border="0" cellpadding="20" cellspacing="0" width="80%"
                        style="border-radius:5px;box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;">
                        <tbody>


                            <tr>
                                <td> <a href="#" target="_blank"><img
                                            src="https://simplifytumbledry.in/assets/emailer/before_after/icon_01.png"
                                            width="100%" alt=""></a>
                                </td>

                                <td> <a href="#" target="_blank"><img
                                            src="https://simplifytumbledry.in/assets/emailer/before_after/icon_02.png"
                                            width="100%" alt=""></a>
                                </td>

                                <td> <a href="#" target="_blank"><img
                                            src="https://simplifytumbledry.in/assets/emailer/before_after/icon_03.png"
                                            width="100%" alt=""></a>
                                </td>
                                <td> <a href="#" target="_blank"><img
                                            src="https://simplifytumbledry.in/assets/emailer/before_after/icon_04.png"
                                            width="100%" alt=""></a>
                                </td>
                                <td> <a href="#" target="_blank"><img
                                            src="https://simplifytumbledry.in/assets/emailer/before_after/icon_05.png"
                                            width="100%" alt=""></a>
                                </td>

                                <td> <a href="#" target="_blank"><img
                                            src="https://simplifytumbledry.in/assets/emailer/before_after/icon_06.png"
                                            width="100%" alt=""></a>
                                </td>


                            </tr>


                        </tbody>
                    </table>
                </td>
            </tr>

        </tbody>
    </table>
</div>