<?php
// Public stuff

function demo_plugin_setup_shortcode()
{
    $data = get_option("demo-plugin-data");
    $enabled = $data["enable"];


    if ($enabled == "enabled") {
        // https://developer.wordpress.org/reference/functions/wp_enqueue_script/
        wp_enqueue_script(
            "demo-plugin-public-script",
            plugin_dir_url(__FILE__) . "js/demo-plugin-public.js",
            [],
            false,
            true        // Put our <script> before closing </body>
        );
    }

    // https://developer.wordpress.org/reference/functions/wp_enqueue_style/
    wp_enqueue_style(
        "demo-plugin-public-style",
        plugin_dir_url(__FILE__) . "css/demo-plugin-public.css"
    );





    $html = "
    <div id='nasapicturepublic'></div>
    ";

    // Shortcodes must return their content (not 'echo')
    return $html;
}

// https://developer.wordpress.org/reference/functions/add_shortcode/
add_shortcode("demo-plugin-shortcode", "demo_plugin_setup_shortcode");

// This handles our async request from the frontend
function demo_plugin_ajax()
{
    // Get the posted data
    $newName = $_POST["name"];

    // Fetch all data
    $data = get_option("demo-plugin-data");
    // Update the key 'name'
    $data["name"] = $newName;
    // Save our changes to the DB
    // https://developer.wordpress.org/reference/functions/update_option/
    update_option("demo-plugin-data", $data);

    // Respons with some success message
    echo json_encode(["message" => "Success!"]);
    exit();
}

// "wp_ajax_{YOUR CUSTOM EVENT NAME}", "handler"
add_action("wp_ajax_demo_plugin_ajax", "demo_plugin_ajax");
// 'nopriv' is needed for not-logged-in requests
add_action("wp_ajax_nopriv_demo_plugin_ajax", "demo_plugin_ajax");
