<?php
if (isset($imagesData)) { ?>




    <div style="width:650px; background-color:#ffffff; margin:0 auto;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
            <tbody>
                <tr>
                    <td align="center">
                        <a href="https://tumbledry.in/" target="_blank"> <img width="100%"
                                src="https://simplifytumbledry.in/assets/emailer/before_after/top_header.jpg" alt=""></a>
                    </td>
                </tr>

                <?php foreach ($imagesData as $image) {
                    //  if (($image['remarks'] != 'Colour Bleed' && $image['remarks'] != 'Stain') || $image['picture_new'] == '')
                    if (!$image['picture_new'])
                        continue;
                    ?>
                    <tr>
                        <td align="center" style="background-color: #ffffff;">
                            <table align="center" border="0" cellpadding="10" cellspacing="0" width="90%">
                                <tbody>
                                    <tr>
                                        <td>
                                            <img width="100%"
                                                src="https://swatinfosystems.com/upload/<?php echo $image['picture']; ?>"
                                                alt="">
                                        </td>
                                        <td>
                                            <img width="100%"
                                                src="https://swatinfosystems.com/upload/<?php echo $image['picture_new']; ?>"
                                                alt="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                <?php } ?>



                <tr>
                    <td align="center">
                        <a href="https://tumbledry.in/" target="_blank"><img width="100%"
                                src="https://simplifytumbledry.in/assets/emailer/before_after/order_again.jpg" alt=""></a>
                    </td>
                </tr>

                <tr>
                    <td align="center" style="background-color: #c3d3d2;">
                        <table align="center" border="0" cellpadding="20" cellspacing="0" width="90%">
                            <tbody>

                                <tr>
                                    <td colspan="3" align="center"> <img
                                            src="https://simplifytumbledry.in/assets/emailer/before_after/more-services.jpg"
                                            alt=""></td>

                                </tr>
                                <tr>
                                    <td> <a href="https://tumbledry.in/" target="_blank"><img
                                                src="https://simplifytumbledry.in/assets/emailer/before_after/dry-clean.jpg"
                                                width="100%" alt=""></a>
                                    </td>

                                    <td>
                                        <a href="https://tumbledry.in/" target="_blank"><img
                                                src="https://simplifytumbledry.in/assets/emailer/before_after/shoe-cleaning.jpg"
                                                width="100%" alt=""></a>
                                    </td>

                                    <td>

                                        <a href="https://tumbledry.in/" target="_blank"><img
                                                src="https://simplifytumbledry.in/assets/emailer/before_after/leather-cleaning.jpg"
                                                width="100%" alt=""></a>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <a href="https://tumbledry.in/" target="_blank"><img
                                                src="https://simplifytumbledry.in/assets/emailer/before_after/curtain-cleaning.jpg"
                                                width="100%" alt=""></a>
                                    </td>

                                    <td> <a href="https://tumbledry.in/" target="_blank"><img
                                                src="https://simplifytumbledry.in/assets/emailer/before_after/carpet-cleaning.jpg"
                                                width="100%" alt=""></a>
                                    </td>

                                    <td> <a href="https://tumbledry.in/" target="_blank"><img
                                                src="https://simplifytumbledry.in/assets/emailer/before_after/darning.jpg"
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





    <?php
}
?>