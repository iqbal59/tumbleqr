<?php
if (isset($imagesData)) { ?>
    <div style="background-color:#ffffff; margin:0 auto;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="700px">
            <tbody>
                <tr>
                    <td align="center" style="background-color: #e8eced;">
                        <table align="center" border="0" cellpadding="25" cellspacing="0" width="100%">
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        <a href="#">
                                            <img width="35%"
                                                src="https://simplifytumbledry.in/assets/emailer/before_after/logo.png"
                                                alt="">
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="background-color: #ffffff;">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <img width="100%"
                                            src="https://simplifytumbledry.in/assets/emailer/before_after/header1.png"
                                            alt="">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>


                <?php foreach ($imagesData as $image) {
                    //  if (($image['remarks'] != 'Colour Bleed' && $image['remarks'] != 'Stain') || $image['picture_new'] == '')
                    if (!$image['picture_new'])
                        continue;
                    ?>
                    <tr>
                        <td align="center" style="background-color: #ffffff;">
                            <table align="center" border="0" cellpadding="20" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td>
                                            <img width="100%"
                                                src="https://swatinfosystems.com/upload/<?php echo $image['picture']; ?>" />

                                        </td>
                                        <td>
                                            <img width="100%"
                                                src="https://swatinfosystems.com/upload/<?php echo $image['picture_new']; ?>" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                <?php } ?>

                <tr>
                    <td align="center" style="background-color: #ffffff;">
                        <table align="center" border="0" cellpadding="20" cellspacing="0" width="100%">
                            <tbody>
                                <tr>
                                    <td align="center">
                                        <img src="https://simplifytumbledry.in/assets/emailer/before_after/result_text.png"
                                            alt="">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="background-color: #ffffff;">
                        <table align="center" border="0" cellpadding="20" cellspacing="0" width="100%">
                            <tbody>
                                <tr>
                                    <td align="center">
                                        <a href="#">
                                            <img width="40%"
                                                src="https://simplifytumbledry.in/assets/emailer/before_after/button.png"
                                                alt="">
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="background-color: #c3d3d2;">
                        <table align="center" border="0" cellpadding="20" cellspacing="0" width="100%">
                            <tbody>
                                <tr>
                                    <td colspan="3" align="center">
                                        <img width="42%"
                                            src="https://simplifytumbledry.in/assets/emailer/before_after/more_service.png"
                                            alt="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#">
                                            <img width="100%"
                                                src="https://simplifytumbledry.in/assets/emailer/before_after/1.png" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#">
                                            <img width="100%"
                                                src="https://simplifytumbledry.in/assets/emailer/before_after/2.png" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#">
                                            <img width="100%"
                                                src="https://simplifytumbledry.in/assets/emailer/before_after/3.png" alt="">
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="background-color: #c3d3d2;">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="#">
                                            <img width="100%"
                                                src="https://simplifytumbledry.in/assets/emailer/before_after/4.png" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#">
                                            <img width="100%"
                                                src="https://simplifytumbledry.in/assets/emailer/before_after/5.png" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#">
                                            <img width="100%"
                                                src="https://simplifytumbledry.in/assets/emailer/before_after/6.png" alt="">
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="background-color: #ffffff;">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tbody>
                                <tr>
                                    <td>&nbsp;</td>
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