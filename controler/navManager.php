<?php
session_start();

// TEST
$_GET['form'] = '';            // 'administrateur' 'gestionnaire'
$_GET['option'] = '';          // 'read_customer'
// require($_SERVER['DOCUMENT_ROOT'].'/ProjetStapa/view/navView.php');
if ($_SESSION['log_ok'] !== true) {
    echo "Accès à la page session refusé";
} else {
    // Menu Utilisateur (+ gestio et admin)
    $nav1;
    // Menu Gestionnaire (+ admin)
    if (isset($_SESSION['user_id_type']) AND ($_SESSION['user_id_type'] == 'gestionnaire' //isset?????
    OR $_SESSION['user_id_type'] == 'administrateur')) {
        $nav2;
        // Si l'utilisateur clique sur le bouton Gestionnaire
        if (isset($_GET['form']) AND $_GET['form'] == 'customer_form_view') {
            $_SESSION['nav2_options'];
            if (isset($_GET['option'])) {
                switch  ($_GET['option']) {
                    case 'read_customer':
                    $content2 = 'r';
                    break;
                    case 'create_customer':
                    $content2 = 'c';
                    break;
                    case 'update_customer':
                    $content2 = 'u';
                    break;
                    case 'delete_customer':
                    $content2 = 'd';
                    break;
                    default: echo 'ERREUR contacter le support';
                    break;
                }
            }
        }
    }

    // Menu Admin
    if ($_SESSION['user_id_type'] == 'administrateur') {
        $nav3;
        // Si l'utilisateur clique sur le bouton Administrer
        if (isset($_GET['form']) AND $_GET['form'] == 'user_form_view') {
            $nav3_options;
            if (isset($_GET['option'])) {
                switch  ($_GET['option']) {
                    case 'read_customer':
                    $content2 = 'r';
                    break;
                    case 'create_customer':
                    $content2 = 'c';
                    break;
                    case 'update_customer':
                    $content2 = 'u';
                    break;
                    case 'delete_customer':
                    $content2 = 'd';
                    break;
                    default: echo 'ERREUR contacter le support';
                }
            } else {
                $nav3_options = '';
            }
        } else {
            $nav3_options = '';
        }
    }
