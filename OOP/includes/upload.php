<?php
class Upload extends db_object{
    protected static $table_name = "post"; 
    protected static $columns = array('post_id' , 'userid' ,'title' , 'details','price','fileName');
    public $post_id;
    public $userid;
    public $title;
    public $details;
    public $price;
    public $fileName;
    public $fileTmpName;
    public $direction = "../upload/";
    public $fileError = array();
    public $array_err = array(
        UPLOAD_ERR_OK  =>  "ئەپلۆد کرا",
        UPLOAD_ERR_INI_SIZE => "سایزی گەورەیە",
        UPLOAD_ERR_FORM_SIZE => "تکایە دڵنیا بەرەوە",
        UPLOAD_ERR_PARTIAL => "تکایە دووبارەی بکەرەوە",
        UPLOAD_ERR_NO_FILE => "تکایە وێنەیەک هەڵبژێرە",
        UPLOAD_ERR_NO_TMP_DIR => "فایلەکە بوونی نییە",
        UPLOAD_ERR_CANT_WRITE => "فایلەکە ناخوێندرێتەوە",
        UPLOAD_ERR_EXTENSION => "جۆری فایلەکە گونجاو نییە"
    );

    public function set_image($image){
         $fileAlow = array('png' , 'jpg' , 'jpeg');
         $fileExt = explode('.' , $image['name']);
         $fileActualExt = strtolower(end($fileExt));
         global $session;
        if(empty($image) || !$image ||  !is_array($image) || empty($session->userid) || empty($this->title) || empty($this->details) || empty($this->price)){
            return  $this->fileError = $this->array_err[UPLOAD_ERR_NO_TMP_DIR];
        }else if($image['error'] != 0){
            return $this->fileError = $this->array_err[UPLOAD_ERR_PARTIAL];
        }else if(!in_array($fileActualExt,$fileAlow)){
            return $this->fileError = $this->array_err[UPLOAD_ERR_EXTENSION];
        }else{
            $this->fileName = rand().rand().rand().$image['name'];
            $this->fileTmpName = $image['tmp_name'];
            return true;
        }
    }
    public function save(){

        if($this->post_id){
            $this->update();   
        }else{
        
            if(!empty($this->fileError)){
                return $this->fileError = $this->array_err[UPLOAD_ERR_FORM_SIZE];
            }
            if(empty($this->fileName) || empty($this->fileTmpName)){
                return $this->fileError = $this->array_err[UPLOAD_ERR_NO_TMP_DIR];
            }
            $dir = $this->direction.$this->fileName;
            if(file_exists($dir)){
            return $this->fileError = $this->array_err[UPLOAD_ERR_FORM_SIZE];
            }            
            if(move_uploaded_file($this->fileTmpName , $dir)){
                if($this->create()){
                    unset($this->fileTmpName);
                    return true;
                }
            }else{
                return $this->fileError = $this->array_err[UPLOAD_ERR_PARTIAL];
            }

        }



    }


}
$upload = new Upload(); 



?>