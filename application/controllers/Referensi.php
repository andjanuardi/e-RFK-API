<?php
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') or exit('No direct script access allowed');

class Referensi extends CI_Controller
{

    public function belanja()
    {
         $postdata = file_get_contents("php://input");
         $postdata =json_decode($postdata) ;
        $tabel = null;
        switch ($postdata->data)
        {

            case 'akun':
                $tabel = 'ref_belanja_akun';
            break;
            case 'kelompok':
                $tabel = 'v_belanja_kelompok';

            break;
            case 'jenis':
                $tabel = 'ref_belanja_jenis';

            break;
            case 'objek':
                $tabel = 'ref_belanja_objek';

            break;
            case 'rincian-objek':
                $tabel = 'ref_belanja_rincian_objek';

            break;
            case 'sub-rincian-objek':
                $tabel = 'ref_belanja_sub_rincian_objek';

            break;
            default:
                echo false;
            break;
        }
        $data = $this->db->query("select * from ".$tabel);
        
        echo json_encode($data->result_array());

    }

}

