<div style="max-width:604px; background:#fffef8; margin:0 auto; border:1px solid #ccc;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
            <tr>
                <td align="center">
                    <div style="padding:30px;">
                        <a href="https://tumbledry.in/" target="_blank"> <img width="100%"
                                src="https://simplifytumbledry.in/assets/emailer/emailer_new/top-heading_high.png"
                                alt=""></a>
                    </div>
                </td>
            </tr>


            <tr>
                <td align="center">

                    <div style="padding:0 40px 40px 40px">

                        <table align="center" border:"0" width="100%">

                            <tbody>
                                <tr>
                                    <td align="center" width="45%">

                                        <img width="50%"
                                            src="https://simplifytumbledry.in/assets/emailer/emailer_new/before.png" />
                                    </td>
                                    <td width="10%"></td>
                                    <td align="center" width="45%">
                                        <img width="50%"
                                            src="https://simplifytumbledry.in/assets/emailer/emailer_new/after.png" />
                                    </td>
                                </tr>
                                <tr>

                                    <td colspan="3" style="height:40px;">&nbsp;</td>

                                </tr>

                                <?php
                                $i = 0;
                                //  $imagesData = array(array('picture' => '6633314e61358.jpg', 'picture_new' => '6633314e61358.jpg'), array('picture' => '6633314e61358.jpg', 'picture_new' => '6633314e61358.jpg'));
                                foreach ($imagesData as $image) {

                                    if (!$image['picture_new'])
                                        continue;
                                    ?>
                                    <tr>
                                        <td align="center" width="45%">

                                            <div style="border-radius:25px;border:2px solid black;" height="200">

                                                <img width="100%"
                                                    src="https://swatinfosystems.com/upload/<?php echo $image['picture']; ?>"
                                                    alt="" style="object-fit: contain; border-radius:25px;">
                                            </div>


                                        </td>
                                        <td width="10%" align="center" valign="middle">
                                            <img width="100%"
                                                src="https://simplifytumbledry.in/assets/emailer/emailer_new/arrow.png" />
                                        </td>

                                        <td align="center" width="45%">
                                            <div style="border-radius:25px;border:2px solid black;" height="200">
                                                <img width="100%" style="object-fit: contain; border-radius:25px;"
                                                    src="https://swatinfosystems.com/upload/<?php echo $image['picture_new']; ?>"
                                                    alt="">
                                            </div>
                                        </td>
                                    </tr>


                                    <tr>

                                        <td colspan="3" style="height:40px;">&nbsp;</td>

                                    </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </td>
            </tr>

        </tbody>
    </table>
</div>