<?php 
class TreeFolder {
    public $page_url;
    public $page_id;
    public $tur;
    public $file_name;
    public $files;
    public $return_url;
    public $return_statu = false; 
    public function FolderCustomer(){
        switch ($this->tur) {
            case 'user_login':
                $this->return_url = $this->UserFolder();
            break;

            default:
            break;
        }
        return $this->return_url;
    }
    public function AddOneFile(){
        $url = $this->page_url; 
        if (!is_dir($url)) {
            mkdir($url, 0755, true);
        }
        $file_name = $this->file_name;
        $files = $this->files;
        $file = explode(".", $files["name"]);
        $uzanti = end($file);
        $yol = $url.$file_name.".".$uzanti;
        if(!file_exists($yol)){
            if(move_uploaded_file($files["tmp_name"], $yol)){ $this->return_statu = true;}
        } else {
            $say = 1;
            for ($i=0; $i < $say; $i++) { 
                if(!file_exists($url.$file_name."_".$say.".".$uzanti)){
                    $yol = $url.$file_name."_".$say.".".$uzanti;
                    $this->file_name = $file_name."_".$say;
                    if(move_uploaded_file($files["tmp_name"], $yol)){ $this->return_statu = true;}
                    break;
                }
                $say++;
            }
        }
        return $yol;
    }
    public function DeleteOneFile($FileUrl) {
        if (!empty($FileUrl)) {
            if (file_exists($FileUrl)) {
                if (unlink($FileUrl)) {
                    return true;
                }
            }
        } else {
            return false;
        }
    } 
}
?>