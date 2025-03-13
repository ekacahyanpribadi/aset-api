<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();

        //load model
        $this->load->model('M_kategori');

        //load library form validasi
        $this->load->library('form_validation');
    }

    /**
     * Get All Data
     */
    public function index()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $cekToken = $data['token'];
        $cekToken2 = 'ZDwIspryCX3j7Lfdoo9B1rxjm2DfLerQsiVwJmrp3qDJYzVg0wj9iSrsTqaeFIcK';
        if ($cekToken!=$cekToken2) {
            Kategori::respResult(400, "Token request invalid!");
            exit;
        }

        $kategori = $this->M_kategori->get_all();

        $response = array();

        foreach ($kategori->result() as $hasil) {

            $response[] = array(
                'id_kategori' => $hasil->id_kategori,
                'kategori' => $hasil->kategori,
                'sub_kategori' => $hasil->sub_kategori,
                'keterangan' => $hasil->keterangan,
                'jumlah_aset' => $hasil->jumlah_aset,
                'status_kategori' => $hasil->status_kategori,
                'masa_manfaat' => $hasil->masa_manfaat,
                'penyusutan_persen_pertahun' => $hasil->penyusutan_persen_pertahun,
                'ins_user' => $hasil->ins_user,
                'ins_date' => $hasil->ins_date,
                'upd_user' => $hasil->upd_user,
                'upd_date' => $hasil->upd_date
            );

        }

        header('Content-Type: application/json');
        Kategori::respResult(200,$response);
    }

    /**
     * Detail Data Kategori
     */
    public function detail()
    {
        
        //get ID siswa from URL
        $id_kategori = $this->uri->segment(2);

        $data = json_decode(file_get_contents('php://input'), true);
        $cekToken = $data['token'];
        $cekToken2 = 'ZDwIspryCX3j7Lfdoo9B1rxjm2DfLerQsiVwJmrp3qDJYzVg0wj9iSrsTqaeFIcK';
        if ($cekToken!=$cekToken2) {
            Kategori::respResult(400, "Token request invalid!");
            exit;
        }

        $kategori = $this->M_kategori->detail_kategori($id_kategori)->row();
     
        if($kategori) {

            header('Content-Type: application/json');
            Kategori::respResult(200,$kategori);

        } else {

            header('Content-Type: application/json');
            Kategori::respResult(400,'ID Kategori tidak ditemukan!');

        }
        
    }

    /**
     * Simpan Data
     */
    public function saveKategori()
    {
        //set validasi
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Siswa', 'required');

        if ($this->form_validation->run() == TRUE) {

            $data = array(
                'nama_siswa' => $this->input->post("nama_siswa"),
                'alamat' => $this->input->post("alamat"),
            );

            $simpan = $this->M_kategori->saveKategori($data);

            if ($simpan) {

                header('Content-Type: application/json');
                Kategori::respResult(200,'Data Berhasil Disimpan!');   
                

            } else {

                header('Content-Type: application/json');
                Kategori::respResult(400,'Data Gagal Disimpan!');                  
            }

        } else {

            header('Content-Type: application/json');
            Kategori::respResult(400,validation_errors());           

        }

    }

    /**
     * Respond Json Data
     */
    public function respResult($vcode=null, $data=null)
    {
        header_remove();
        http_response_code($vcode);
        header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
        header('Content-Type: application/json');
        $status = array(
            200 => '200 OK',
            400 => '400 Bad Request',
            422 => 'Unprocessable Entity',
            500 => '500 Internal Server Error'
        );
        // ok, validation error, or failure
        header('Status: ' . $status[$vcode]);

        date_default_timezone_set('Asia/Jakarta');
        $dateNow = date("Y-m-d H:i:s");

        $jsonData = array(
            'code' => $vcode,
            'timestamp' => $dateNow,
            'data' => $data,
        );

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($jsonData);
        //return json_encode($jsonData);
        //return
    }

}