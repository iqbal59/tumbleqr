<div
    style="max-width:604px; background:url('https://simplifytumbledry.in/assets/emailer/before_after/bg.png') #fff top left; margin:0 auto;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
            <tr>
                <td align="center">
                    <a href="https://tumbledry.in/" target="_blank"> <img width="100%"
                            src="https://simplifytumbledry.in/assets/emailer/before_after/Header_01.png" alt=""></a>
                </td>
            </tr>





            <?php
            $i = 0;
            //$imagesData = array(array('picture' => '6633314e61358.jpg', 'picture_new' => '6633314e61358.jpg'), array('picture' => '6633314e61358.jpg', 'picture_new' => '6633314e61358.jpg'));
            foreach ($imagesData as $image) {

                if (!$image['picture_new'])
                    continue;
                ?>
                <tr>
                    <td align="center" style="padding-top:15px;">

                        <div
                            style="width:564px; height:<?php echo $i == 0 ? '372px' : '332px' ?>'; background:url('https://simplifytumbledry.in/assets/emailer/before_after/<?php echo $i == 0 ? 'first_row_bg.png' : 'bg-image.png' ?>')  no-repeat bottom center; margin :0 auto;">
                            <div style="<?php echo $i == 0 ? 'padding:50px' : 'padding:0px 50px 50px 50px' ?>">
                                <table align="center" border:"0" width="98%">

                                    <tbody>
                                        <tr>
                                            <td align="left" style="<?php echo $i == 0 ? '' : 'padding-top:15px;' ?>">

                                                <img width="217" height="270"
                                                    src="https://swatinfosystems.com/upload/<?php echo $image['picture']; ?>"
                                                    alt="" style="object-fit: contain;">
                                            </td>
                                            <td align="right" style="<?php echo $i == 0 ? '' : 'padding-top:15px;' ?>">
                                                <img width="217" height="270" style="object-fit: contain;"
                                                    src="https://swatinfosystems.com/upload/<?php echo $image['picture_new']; ?>"
                                                    alt="">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </td>
                </tr>

                <?php $i++;
            } ?>



            <tr>
                <td align="center">
                    <a href="https://tumbledry.in/" target="_blank"><img width="30%"
                            src="https://simplifytumbledry.in/assets/emailer/before_after/button_txt.png" alt=""></a>
                </td>
            </tr>

            <tr>
                <td align="center" style=" padding:50px 0;">
                    <table align="center" border="0" cellpadding="20" cellspacing="0" width="80%">
                        <tbody>


                            <tr>
                                <td> <a href="#" target="_blank"><img
                                            src="https://simplifytumbledry.in/assets/emailer/before_after/services.png"
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