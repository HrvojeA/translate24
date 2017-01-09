<?php

add_action( 'wp_ajax_tickets_datatables', 'tickets_datatables_callback' );


add_action('admin_footer', 'tickets_datatables_javascript'); // Write our JS below here



function tickets_datatables_javascript()
{ ?>
    <script type="text/javascript">


        jQuery(document).ready(function ($) {



            jQuery('#table_id').DataTable(
                {
                    "oLanguage": {
                        "sSearch": "Pretraga:",
                        "sEmptyTable": "Tablica je prazna.",
                        "sInfo": "Prikazano _START_ - _END_ od _TOTAL_ zapisa.",
                        "oPaginate": {
                            "sPrevious": "Natrag",
                            "sNext": "Naprijed"
                        }

                    },
                    "processing": true,
                    "serverSide": true,
                    "ajax": ajaxurl+'?action=tickets_datatables'


                });


            var data = {
                'action': 'tickets_datatables',
                'whatever': 1234
            };

            // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
           
        });
    </script> <?php
}


function tickets_datatables_callback() {

    global $wpdb; // this is how you get access to the database
    
    $tcc = new TicketsController();
    $tickets = $tcc->getTickets();


    $results['tickets'] = $tickets;
    $results['recordsTotal'] = count($tickets);
    $results['recordsFiltered'] = count($tickets);
    $results['aaData'] = array();


    foreach($results['tickets'] as $ticket){

         $row = array();

        $row[] = $ticket->id_ticket;
        $row[] = $ticket->fullname;
        $row[] = $ticket->address;
        $row[] = '#';
        $row[] = $ticket->zipcode;
        $row[] = $ticket->name;
        $row[] = $ticket->phone;
        $row[] = '<img style="width:30px;height:auto;" src="https://cdn3.iconfinder.com/data/icons/world-flags-square-vol-3/48/Portugal-128.png"/>';
        $row[] = $ticket->status;
        $row[] = 'nepoznato';
        $row[] = $ticket->note;
        $row[] = '<a href="#">download</a>';


        $results['aaData'][] = $row;
   }

    echo json_encode($results);
    wp_die(); // this is required to terminate immediately and return a proper response
}

