<?php
// Admin stuff



function demo_plugin_admin_init()
{
    // https://developer.wordpress.org/reference/functions/register_setting/
    register_setting(
        "demo-plugin",          // Option group
        "demo-plugin-data"      // Option name
    );

    // https://developer.wordpress.org/reference/functions/add_settings_section/
    add_settings_section(
        "demo-plugin-section-1",            // Id
        "Image Enabler",                        // Title
        "demo_plugin_render_section",       // Callback
        "demo-plugin-settings"              // Page (slug)
    );

    // https://developer.wordpress.org/reference/functions/add_settings_field/
    add_settings_field(
        "demo-plugin-field-1",              // Id
        "Enable Picture",                             // Title
        "demo_plugin_render_enable_field",    // Callback
        "demo-plugin-settings",             // Page (slug)
        "demo-plugin-section-1",            // Section Id
        ["label_for" => "demo-plugin-enable"] // <label for="">
    );
}

// The 'instruction' text below the section header
function demo_plugin_render_section()
{
    echo "
    <p>This is the section</p>
    ";
}

function demo_plugin_render_enable_field()
{
    // https://developer.wordpress.org/reference/functions/get_option/
    $data = get_option("demo-plugin-data");
    // https://developer.wordpress.org/reference/functions/esc_attr/
    $enable = esc_attr($data["enable"]);
    $checked = $enable == "enabled" ? "checked" : "";
    // NOTE: notice the 'name' syntax for storing stuff inside an array
    //       See: https://stackoverflow.com/a/7946494

    echo "
    <div id='nasapicture'></div>
    <input type='hidden' name='demo-plugin-data[enable]' id='demo-plugin-enable' value='unabled'>
    <input type='checkbox' $checked name='demo-plugin-data[enable]' id='demo-plugin-enable' value='enabled'>
    <p class='description'>Enable or disable picture of the day from NASA</p>
    ";

    var_dump($enable);
}




function demo_plugin_admin_view()
{
    // https://developer.wordpress.org/reference/functions/wp_enqueue_style/
    wp_enqueue_style(
        "demo-plugin-admin-style",
        // https://developer.wordpress.org/reference/functions/plugin_dir_url/
        plugin_dir_url(__FILE__) . "css/demo-plugin-admin.css"
    );

    // https://developer.wordpress.org/reference/functions/wp_enqueue_script/
    wp_enqueue_script(
        "demo-plugin-admin-script",
        plugin_dir_url(__FILE__) . "js/demo-plugin-admin.js"
    );

    // Include our <form> (rather then echo'ing it here)
    require_once __DIR__ . "/../includes/admin-view.php";
}

function demo_plugin_setup_admin_menu()
{
    // https://developer.wordpress.org/reference/functions/add_menu_page/
    add_menu_page(
        "Demo Plugin Settings",     // Page title
        "Demo Plugin",              // Menu title
        "manage_options",           // User permissions
        "demo-plugin-settings",     // Slug (Page)
        "demo_plugin_admin_view",   // View function
        "dashicons-album",          // Menu icon
        100                         // Menu order (last)
    );
}

// https://developer.wordpress.org/reference/functions/add_action/
add_action("admin_menu", "demo_plugin_setup_admin_menu");
add_action("admin_init", "demo_plugin_admin_init");
