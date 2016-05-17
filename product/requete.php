<?php

// Requête SELECT
$requete_select_psProduct = $connexionPS->prepare(' SELECT  id_product,
                                                            reference
                                                    FROM    ps_product
                                                    WHERE   reference IS NOT NULL;');

?>
