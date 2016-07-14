<?php
/*
Plugin Name: CSV UPLOAD ADDUSER Plugin
Plugin URI: http://www.example.com/plugin
Description: CSVをアップしてユーザーを追加するプラグイン
Author: tamaki
Version: 0.1
Author URI: http://www.example.com
*/

//管理画面にメニューを追加
function add_pages(){
  add_menu_page('CSVアップローダー', 'CSVアップローダー', 'level_8', __FILE__, 'csv_upload', 'dashicons-upload',26);
}
//CSS追加関数
function add_init(){
    // CSS登録 http://[site domain]/wp-content/plugins/csv_up/css/csv-upload.css
    wp_register_style('csv-upload', plugins_url('css/csv-upload.css', __FILE__));
    wp_enqueue_style('csv-upload');
}
//関数を呼び出して実行
add_action('admin_init', 'add_init');

//プラグインの表示関数
function csv_upload(){
	
require_once 'indexq.php';

}

// 管理メニューに追加するフック。関数事項
add_action('admin_menu', 'add_pages');

