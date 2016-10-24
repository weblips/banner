<?php
class UploadToBanner
{
    public $path_img;
    private $data_file;
    public $arr_info;
    public $arr_from_data;
    
    
    public function __construct($path_img_dir, $name_data = 'data.txt') 
    {
        if(is_dir($path_img_dir)){
            $this->path_img = (string)$path_img_dir;
            $this->data_file = (string)$name_data;
            $this->iteratorDir($this->path_img);
        }else return $path_img_dir . ' not dir';   
    }
    
    private function iteratorDir($path) 
    {
        $iterator = new DirectoryIterator($path);
        foreach($iterator as $fileinfo){
            if($fileinfo->isFile() && $fileinfo->getFilename() !== $this->data_file) 
		$arr[$fileinfo->getFilename()] =   getimagesize($fileinfo->getPathname());
        
        }
        $this->arr_info = $arr;
    }
    private function getInfoImg(){
        
    }

    public function exportDataTxt()
    {
        if(!file_exists($this->path_img . DIRECTORY_SEPARATOR . $this->data_file)) return;
        include $this->path_img . DIRECTORY_SEPARATOR . $this->data_file ;
        $get_me = file_get_contents($this->path_img . DIRECTORY_SEPARATOR . $this->data_file) ;
        var_export($get_me, TRUE );
        $this->arr_from_data = $array_ex_data_txt;

        return $this->arr_from_data;
    }

    public function createNewData( array $data_err)
    {
        if(empty($data_err)) return;
        $new_array = array_diff($data_err, array(''));
        $new_array = $this->overrideArr($new_array);

    }

    private function overrideArr(array $override)
    {
        foreach ($override as $key => $velue) {
            switch () {
                case 'value':
                    # code...
                    break;
                
                default:
                    # code...
                    break;
            }
        }
    }

    private function issetKey($key,$value)
    {
        return (strstr($key, $value) === 0) ? true : false; 
    }
        
}