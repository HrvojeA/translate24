<?php

class TicketsController {


    public function __construct () {

        add_action ('init', array ($this, 'ticketeer'));
    }

    public  function getTickets($operator_id = NULL, $status = NULL){
        global $wpdb;

        $results = $wpdb->get_results('SELECT * FROM t24_tickets LEFT JOIN t24_customer ON t24_tickets.customer_id = t24_customer.id LEFT JOIN t24_language ON t24_tickets.original_language_id = t24_language.id ');


        return $results;

    }



}