<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SparQL
{
    /**
     * Variabel yang meng-"inherit" super class dari CodeIgniter
     *
     * @access protected
     * @var object
     */
    protected $_CI;

    /**
     * Variabel untuk diproses
     *
     * @var mixed
     */
    private $_data = [];

    /**
     * Variabel untuk menyimpan berapa banyak  session yang tidak ada
     * @var int
     */
    private $_not_exist;

    public function __construct()
    {
        $this->_CI = &get_instance();
    }

    public function getSearchResult($keyword)
    {
        $format = 'json';
        str_replace(' ', '_', $keyword);
        $query =
        '
        PREFIX owl: <http://www.w3.org/2002/07/owl#>
        PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
        PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
        PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIX foaf: <http://xmlns.com/foaf/0.1/>
        PREFIX dc: <http://purl.org/dc/elements/1.1/>
        PREFIX dbpedia: <http://dbpedia.org/>
        PREFIX skos: <http://www.w3.org/2004/02/skos/core#>
        PREFIX dbp: <http://dbpedia.org/resource/>
        PREFIX dbo: <http://dbpedia.org/ontology/>

        SELECT ?namafilm ?wikiPageID ?abstract
        WHERE {
            ?subject rdf:type dbo:Film .
            ?subject foaf:name ?namafilm .
            ?subject dbo:wikiPageID ?wikiPageID .
            ?subject dbo:abstract ?abstract .

            FILTER regex(?namafilm, ".*' . $keyword . '.*", "i") .
            FILTER (lang(?abstract) = "en")
        }
        ';

        $searchUrl = 'http://dbpedia.org/sparql?' . 'query=' . urlencode($query) . '&format=' . $format;

        $result = $this->request($searchUrl);

        return $result;
    }

    public function getSearchResultFilm($wikiPageID)
    {
        $format = 'json';
        $query =
        '
        PREFIX owl: <http://www.w3.org/2002/07/owl#>
        PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
        PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
        PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIX foaf: <http://xmlns.com/foaf/0.1/>
        PREFIX dc: <http://purl.org/dc/elements/1.1/>
        PREFIX dbpedia: <http://dbpedia.org/>
        PREFIX skos: <http://www.w3.org/2004/02/skos/core#>
        PREFIX dbr: <http://dbpedia.org/resource/>
        PREFIX dbp: <http://dbpedia.org/property/>
        PREFIX dbo: <http://dbpedia.org/ontology/>
        PREFIX dbow: <http://dbpedia.org/ontology/Work/>

        SELECT ?namafilm ?abstract ?namaStarring ?starring ?linkdirector ?director ?linkproducer ?producer ?homepage ?durasi ?primaryTopic ?wikiPageID ?country ?language ?starringWikiPageID ?directorID ?producerID
        WHERE {
            ?subject dbo:wikiPageID "' . $wikiPageID . '"^^xsd:integer .
            ?subject foaf:name ?namafilm .
            ?subject dbo:abstract ?abstract .

            ?subject dbo:director ?linkdirector .
            ?linkdirector foaf:name ?director .
            ?linkdirector foaf:isPrimaryTopicOf ?directorID .

            ?subject dbo:producer ?linkproducer .
            ?linkproducer foaf:name ?producer .
            ?linkproducer foaf:isPrimaryTopicOf ?producerID .
            
            ?subject dbp:country ?country .
            ?subject dbp:language ?language .

            ?subject foaf:homepage ?homepage .
            ?subject dbow:runtime ?durasi .
            ?subject foaf:isPrimaryTopicOf ?primaryTopic .
            ?subject dbo:wikiPageID ?wikiPageID .
            
            ?subject dbo:starring ?namaStarring .
            ?namaStarring foaf:name ?starring .
            ?namaStarring foaf:isPrimaryTopicOf ?starringWikiPageID .

            FILTER (lang(?namafilm) = "en") .
            FILTER (lang(?starring) = "en") .
            FILTER (lang(?producer) = "en") .
            FILTER (lang(?director) = "en") .
            FILTER (lang(?abstract) = "en")
        }
        ';

        $searchUrl = 'http://dbpedia.org/sparql?' . 'query=' . urlencode($query) . '&format=' . $format;

        $result = $this->request($searchUrl);

        return $result;
    }

    public function request($searchUrl)
    {
        if (!function_exists('curl_init')) {
            die('CURL is not installed!');
        }

        // kendali curl
        $ch = curl_init();

        // setel permintaan url
        curl_setopt($ch, CURLOPT_URL, $searchUrl);

        // kembali respons, jangan print/echo
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        /*
        Untuk menemukan lebih banyak opsi dari curl:
        http://www.php.net/curl_setopt
        */

        $response = curl_exec($ch);

        curl_close($ch);

        return $response;
    }

    public function get_images($primaryTopic)
    {
        if (!function_exists('curl_init')) {
            die('CURL is not installed!');
        }

        $primaryTopic = 'https://' . substr($primaryTopic, 7);

        // kendali curl
        $ch = curl_init();

        // setel permintaan url
        curl_setopt($ch, CURLOPT_URL, $primaryTopic);

        // kembali respons, jangan print/echo
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        /*
        Untuk menemukan lebih banyak opsi dari curl:
        http://www.php.net/curl_setopt
        */

        $response = curl_exec($ch);

        preg_match_all('!upload.wikimedia.org/wikipedia/en/[^\s]*?/[^\s]*?/[^\s]*?.jpg!', $response, $matches);

        curl_close($ch);

        return $matches;
    }
}
