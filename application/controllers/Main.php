<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') == 'admin') {
            redirect(base_url('admin'));
        } elseif ($this->session->userdata('role') == 'user') {
            redirect(base_url('user'));
        }

        $this->load->library('data_konvertor');
        $this->load->library('sparql');
        $this->load->model('Main_model', 'M');
    }

    public function index()
    {
        $var = [
            'title' => 'MoviePedia',
            'content' => '/default/content/main'
        ];

        $this->load->vars($var);
        $this->load->view('default/layout');
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        if ($keyword != '') {
            $var = [
                'title' => 'Search result for ' . $this->input->post('keyword'),
                'content' => '/default/content/explore',
                'result' => json_decode($this->sparql->getSearchResult($keyword), true)
            ];
            $keyword = '';

            $this->load->vars($var);
            $this->load->view('default/layout');
        } else {
            redirect(base_url(''));
        }
    }

    public function film($wikiPageID = '')
    {
        if ($wikiPageID != '') {
            $result = json_decode($this->sparql->getSearchResultFilm($wikiPageID), true);
            $poster = $this->sparql->get_images($result['results']['bindings'][0]['primaryTopic']['value']);
            // print_r($poster);
            // var_dump($result['results']['bindings']);
            $var = [
                'title' => $result['results']['bindings'][0]['namafilm']['value'],
                'content' => '/default/content/film',
                'data' => $result['results']['bindings'][0],
                'starring' => $result['results']['bindings'],
                'poster' => 'https://' . $poster[0][0]
            ];
            $wikiPageID = '';

            $this->load->vars($var);
            $this->load->view('default/layout');
        } else {
            redirect(base_url(''));
        }
    }
}
