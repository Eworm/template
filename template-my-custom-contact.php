<?php
/*
Template Name: Contactformulier
*/

    $context = Timber::get_context();
    $context['post'] = new TimberPost();
    $context['nonce'] = wp_nonce_field('#body', 'site_nonce', true, false);
    $template = ['page-contact.twig'];

    $emailSent = false;

    if (!empty($_POST)) {
        if (isset($_POST['submitted'])) {
            if (!isset($_POST['site_nonce']) || !wp_verify_nonce($_POST['site_nonce'], '#body')) {
                print 'Sorry, your nonce did not verify.';
                exit;
            } else {

                //
                if (trim($_POST['contact_name']) === '') {
                    $context['contact_name_error'] = true;
                    $hasError = true;
                } else {
                    $contact_name = trim($_POST['contact_name']);
                    $context['contact_name'] = $contact_name;
                }

                //
                if (trim($_POST['contact_contact']) === '') {
                    $context['contact_contact_error'] = true;
                    $hasError = true;
                } else {
                    $contact_contact = trim($_POST['contact_contact']);
                    $context['contact_contact'] = $contact_contact;
                }

                //
                if (!trim($_POST['contact_info']) == '') {
                    if (function_exists('stripslashes')) {
                        $contact_info = stripslashes(trim($_POST['contact_info']));
                    } else {
                        $contact_info = trim($_POST['contact_info']);
                    }
                }


                if (!isset($hasError)) {
                    $emailTo = get_option('tz_email');
                    if (!isset($emailTo) || ($emailTo == '')) {
                        $emailTo = get_option('admin_email');
                    }
                    $subject = 'Contactformulier verzonden door ' . $contact_name;
                    $body = "Naam: $contact_name \nE-mailadres: $contact_contact \nBericht: $contact_info";
                    $headers = 'From: ' . $contact_name;

                    wp_mail('wout@woutmager.nl', $subject, $body);
                    $context['email_sent'] = true;
                    $emailSent = true;
                }
            }
        }
    }

    Timber::render($template, $context);
