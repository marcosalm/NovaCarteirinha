<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of envioDeFotos
 *
 * @author marcos.almeida
 */
class envioDeFotos extends CI_Controller
{
    //put your code here
    public function __construct(){
		parent::__construct();
		$this->load->model('status_model');
	}
        
    public function enviaFotos(){
       
       /*----------------------------Gera ZIP--------------------------*/
       $this->load->library('zip');
       $all = $this->status_model->get_mat_a_enviar_foto_n(); 
       foreach ($all as $mat){
           $this->zip->read_file($mat); 
       }
       $zip_file = $this->zip->archive('/NovaCarteirinha/uploads/lote.zip'); 
       $this->load->library('ftp');
       
       /*----------------------------envia FTP-------------------------*/
        $config['hostname'] = 'ftpmulti.bettersolutions.com.br';
        $config['username'] = 'uvv';
        $config['password'] = 'd4sf$opA86=';
        $config['debug']    = TRUE;

        $this->ftp->connect($config);

        $this->ftp->upload('/NovaCarteirinha/uploads/lote.zip', '/public_html/myfile.html', 'ascii', 0775);

        $this->ftp->close();
        
        /*-----------------------Atualiza Status--------------------*/
        $this->db->where('matricula', $matricula);
        $this->db->update('crt_status', array("status_foto"=>"ENVIADA"));
       
    }
    
    public function retornoFotos(){
        $uploaddir = FCPATH .'uploads\\';
		$uploadfile = $uploaddir . $_FILES['file']['name'];

		if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
		   $this->leituraRetornoFotos($uploadfile);
		   redirect('admin');	
		} else {
			print "Possivel ataque de upload! Aqui esta alguma informação:\n";
			print_r($_FILES);
		}
		print "</pre>";
    }
    public function leituraRetornoFotos($uploadfile){
        $this->load->model('historico_model');
    	$uploaddir = FCPATH .'uploads\\';
		$uploadfile = $uploaddir . $_FILES['file']['name'];

		if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                     $handle = fopen($uploadfile, "r");
                        if ($handle) {
                                $a_line = array();
                                while (($line = fgets($handle)) !== false) {
                                            // process the line read.
                                        array_push($a_line, $line);
                                  }

                        }
                        foreach($a_line as $reg){
                           $mat = substr($reg,-11);
                           $array_mat[]=(int)$mat;
                        }
                    foreach($array_mat as $matricula){
                        $this->historico_model->fotoStatus($matricula,"OK");
                    }
                    
		} else {
			return;
		}
		
                
       

    }

}