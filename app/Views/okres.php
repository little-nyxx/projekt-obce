<?= $this->extend('layout/sablona'); ?>

<?= $this->section('content'); ?>
<h1> Obce v okrese <?= $okres->nazev ?></h1>
<?php
echo anchor('okres/'.$okres->kod.'/perpage/10', 10, ['class' => 'btn btn-primary']);
echo anchor('okres/'.$okres->kod.'/perpage/20', 20, ['class' => 'btn btn-primary']);
echo anchor('okres/'.$okres->kod.'/perpage/50', 50, ['class' => 'btn btn-primary']);
echo anchor('okres/'.$okres->kod.'/perpage/100', 100, ['class' => 'btn btn-primary']);
?>

<?php

    $table = new \CodeIgniter\View\Table();
    $table->setHeading('Pořadí', 'Název', 'Počet adres');
    $poradi = $pager->getCurrentPage() * $strankovani - $strankovani-1;

    foreach ($adresniMista as $row) {
        $table->addRow($poradi++, $row->nazev, $row->pocetMist);
    }

    $template = array(
        'table_open'=> '<table class="table table-bordered">',
        'thead_open'=> '<thead>',
        'thead_close'=> '</thead>',
        'heading_row_start'=> '<tr>',
        'heading_row_end'=>' </tr>',
        'heading_cell_start'=> '<th>',
        'heading_cell_end' => '</th>',
        'tbody_open' => '<tbody>',
        'tbody_close' => '</tbody>',
        'row_start' => '<tr>',
        'row_end'  => '</tr>',
        'cell_start' => '<td>',
        'cell_end' => '</td>',
        'row_alt_start' => '<tr>',
        'row_alt_end' => '</tr>',
        'cell_alt_start' => '<td>',
        'cell_alt_end' => '</td>',
        'table_close' => '</table>'
        );
        
        $table->setTemplate($template);

        echo $table->generate();

        echo($pager->links());

?>

<?=$this->endSection(); ?>