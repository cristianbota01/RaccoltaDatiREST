<?php

session_start();

require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Writer\Xlsx; 

class Logic{

    function __construct(){
        $this->dbaccess = new DBAccess();
    }

    function UploadFile($files){

        $extensions = ['xlsx']; 
        $path = "./files/";
        $arr_files = [];

        for ($cont = 0; $cont < count($files["tmp_name"]); $cont ++){

            $error = NULL;
            
            $file_name = $files['name'][$cont]; 
            $file_tmp = $files['tmp_name'][$cont]; 
            $file_type = $files['type'][$cont]; 
            $file_size = $files['size'][$cont]; 
            $file_ext = strtolower(end(explode('.', $files['name'][$cont]))); 
            
            $file = $path . $file_name; 

            if(in_array($file_ext, $extensions)) { 
                
                if ($file_size < 2097152) { 
                    
                    move_uploaded_file($file_tmp, $file); 
                    array_push($arr_files, $file);

                } else{
                    $error = 'Il file supera i 2MB: '. $file_name . ' '. $file_type; 
                }
            } else{
                $error = 'Formato non valido: '. $file_name . ' '. $file_type; 
            }

            if ($error !== NULL){

                $response = [
                    'id' => '',
                    'errors' => 1,
                    'error_type' => 'file_errors',
                    'error_message' => $error
                ];
    
                echo json_encode($response);
                
            }else{
                $this->xlsxToDB($arr_files);
            }
        }
    }

    function xlsxToDB($arr_files){
        echo json_encode($arr_files);
    }
}
