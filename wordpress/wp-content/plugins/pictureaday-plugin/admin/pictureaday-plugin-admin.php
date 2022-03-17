<?php
// Admin stuff



function pictureaday_plugin_admin_init()
{
    // https://developer.wordpress.org/reference/functions/register_setting/
    register_setting(
        "pictureaday-plugin",          // Option group
        "pictureaday-plugin-data"      // Option name
    );

    // https://developer.wordpress.org/reference/functions/add_settings_section/
    add_settings_section(
        "pictureaday-plugin-section-1",            // Id
        "Image Enabler",                        // Title
        "pictureaday_plugin_render_section",       // Callback
        "pictureaday-plugin-settings"              // Page (slug)
    );

    // https://developer.wordpress.org/reference/functions/add_settings_field/
    add_settings_field(
        "pictureaday-plugin-field-1",              // Id
        "Enable Picture",                             // Title
        "pictureaday_plugin_render_enable_field",    // Callback
        "pictureaday-plugin-settings",             // Page (slug)
        "pictureaday-plugin-section-1",            // Section Id
        ["label_for" => "pictureaday-plugin-enable"] // <label for="">
    );
}

// The 'instruction' text below the section header
function pictureaday_plugin_render_section()
{
    echo "
    <p>This is the section</p>
    ";
}

function pictureaday_plugin_render_enable_field()
{
    // https://developer.wordpress.org/reference/functions/get_option/
    $data = get_option("pictureaday-plugin-data");
    // https://developer.wordpress.org/reference/functions/esc_attr/
    $enable = esc_attr($data["enable"]);
    $checked = $enable == "enabled" ? "checked" : "";
    // NOTE: notice the 'name' syntax for storing stuff inside an array
    //       See: https://stackoverflow.com/a/7946494

    echo "
    <div id='nasapicture'></div>
    <input type='hidden' name='pictureaday-plugin-data[enable]' id='pictureaday-plugin-enable' value='unabled'>
    <input type='checkbox' $checked name='pictureaday-plugin-data[enable]' id='pictureaday-plugin-enable' value='enabled'>
    <p class='description'>Enable or disable picture of the day from NASA</p>
    ";

    var_dump($enable);
}




function pictureaday_plugin_admin_view()
{
    // https://developer.wordpress.org/reference/functions/wp_enqueue_style/
    wp_enqueue_style(
        "pictureaday-plugin-admin-style",
        // https://developer.wordpress.org/reference/functions/plugin_dir_url/
        plugin_dir_url(__FILE__) . "css/pictureaday-plugin-admin.css"
    );

    // https://developer.wordpress.org/reference/functions/wp_enqueue_script/
    wp_enqueue_script(
        "pictureaday-plugin-admin-script",
        plugin_dir_url(__FILE__) . "js/pictureaday-plugin-admin.js"
    );

    // Include our <form> (rather then echo'ing it here)
    require_once __DIR__ . "/../includes/admin-view.php";
}

function pictureaday_plugin_setup_admin_menu()
{
    // https://developer.wordpress.org/reference/functions/add_menu_page/
    add_menu_page(
        "Picture A Day Plugin Settings",     // Page title
        "Picture a day Plugin",              // Menu title
        "manage_options",           // User permissions
        "pictureaday-plugin-settings",     // Slug (Page)
        "pictureaday_plugin_admin_view",   // View function
        "dashicons-star-filled",          // Menu icon
        100                         // Menu order (last)
    );
}

// https://developer.wordpress.org/reference/functions/add_action/
add_action("admin_menu", "pictureaday_plugin_setup_admin_menu");
add_action("admin_init", "pictureaday_plugin_admin_init");
