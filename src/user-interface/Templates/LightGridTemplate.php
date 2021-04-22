<?php
$cpt=0;
foreach ($viewModel->getLightGrid()->getLights() as $row){
    foreach ($row as $column){
        $cpt+=$column->getBrightness();//echo("o  ");
        //else echo(".  ");
    }
    //echo("\r\n");
}
echo("$cpt");
echo("\r\n");