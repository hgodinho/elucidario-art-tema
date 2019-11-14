<?php
/*
<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionAmbientes">
                    <div class="card-body">
                        <?php
            $paragrafos_descricao = explode('</p>', term_description());
            if($paragrafos_descricao > 0){?>
                        <p class="pt-4">
                            <?php
                echo $paragrafos_descricao[0];
            ?>
                        </p>
                        <p>
                            <a data-toggle="collapse" href="#paragrafos" aria-expanded="false"
                                aria-controls="paragrafos">Leia
                                mais</a>
                        </p>
                        <div class="collapse" id="paragrafos">
                            <?php
            unset($paragrafos_descricao[0]);
            $paragrafos_normalize = array_values($paragrafos_descricao);
            foreach($paragrafos_normalize as $paragrafo){
                echo $paragrafo . '</p>';
            }
        ?>
                        </div>
                        <?php
            }
        ?>
                    </div>
                </div>

                */
                ?>