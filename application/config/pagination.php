<?php
defined('BASEPATH') or exit('No direct script access allowed');

$config['use_page_numbers'] = true;
$config['full_tag_open']    = '<ul class="pagination">';
$config['full_tag_close']   = '</ul>';

$config['first_link']       = 'Awal';
$config['last_link']        = 'Akhir';

$config['first_tag_open']   = '<li class="page-item page-link">';
$config['first_tag_close']  = '</li>';

$config['prev_link']        = '&laquo';
$config['prev_tag_open']    = '<li class="page-item page-link">';
$config['prev_tag_close']   = '</li>';

$config['next_link']        = '&raquo';
$config['next_tag_open']    = '<li class="page-item page-link">';
$config['next_tag_close']   = '</li>';

$config['last_tag_open']    = '<li class="page-item page-link">';
$config['last_tag_close']   = '</li>';

$config['cur_tag_open']     = '<li class="page-item active"><a href="#" class="page-link">';
$config['cur_tag_close']    = '</a></li>';

$config['num_tag_open']     = '<li class="page-item page-link">';
$config['num_tag_close']    = '</li>';
