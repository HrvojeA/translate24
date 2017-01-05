<?php

/**
 * Provides tickets listing for operators and tickets listing overview for super administrator
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin/partials
 */


$dir = get_home_path();


require_once($GLOBALS['t24_plugin_dir'] . 'admin/lib/TicketsController.php');;

$tcc = new TicketsController();

$tcc->getTickets();
?>

<div class="wrap content_container">

    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>


    <table class="datatable_1" id="table_id">
        <thead>
        <tr>
            <th>ID</th>
            <th>Ime i prezime</th>
            <th>Ulica</th>
            <th>Br.</th>
            <th>Pošt. broj</th>
            <th>Mjesto</th>
            <th>Telefon</th>
            <th>Strani jezici</th>
            <th>Status</th>
            <th>Iznos</th>
            <th>Napomena</th>
            <th>Preuzmi  </th>


        </tr>
        </thead>
        <tfoot>
        <tr>

        </tr>
        </tfoot>
    </table>
    <?php

    add_action('admin_footer', 'tickets_datatables_javascript'); // Write our JS below here





 ?>
</div>

