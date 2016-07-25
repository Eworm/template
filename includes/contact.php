<?php
    
    
/* Error messages
==================================================================================================================================*/
$nameError_message = 'Je bent vergeten je naam in te vullen';
$emailRequired_message = 'Je bent vergeten je e-mailadres in te vullen';
$emailError_message = 'Je hebt een ongeldig e-mailadres ingevuld';
$messageError_message = 'Je bent vergeten een bericht in te vullen';


/* Contactinfo submenu
==================================================================================================================================*/
add_action('admin_menu', 'mt_add_pages');
function mt_add_pages()
{
    add_management_page(__('Contactaanvragen','menu-contactrequest'), __('Contactaanvragen','menu-contactrequest'), 'manage_options', 'overview-contactrequest.php', 'mt_contactrequest_page');
};


/* Get contactinfo
==================================================================================================================================*/
function mt_contactrequest_page () 
{

    global $wpdb;
    
    $requests = $wpdb->get_results( 
    "SELECT *
    FROM maillog
    "
    );
    
    echo '<pre>';
    echo '</pre>';
    
    echo '<table cellspacing="10">';
    echo '<tr>';
    echo '<th align="left">Van</th>';
    echo '<th align="left">Emailadres</th>';
    echo '<th align="left">Bericht</th>';
    echo '<th align="left">Tijd</th>';
    echo '<tr>';
    
    foreach ( $requests as $request ) 
    {
        echo '<tr>';
        echo '<td valign="top">';
        echo $request->from;
        echo '</td>';
        echo '<td valign="top">';
        echo $request->email;
        echo '</td>';
        echo '<td valign="top">';
        echo $request->message;
        echo '</td>';
        echo '<td valign="top">';
        echo '<div style="white-space: nowrap;">'  .$request->time . '</div>';
        echo '</td>';
        echo '</tr>';
        echo '<tr><td colspan="4"><hr></td></tr>';
    }  
    echo '</table>';
    
}

?>
