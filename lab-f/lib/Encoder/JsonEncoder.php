<?php
namespace lib\Encoder;
use lib\Encoder\EncoderInterface;
class JsonEncoder implements EncoderInterface{
    public function encode($data){
        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
    public function decode($data){
        return json_decode($data,true);
    }
    public function supports(){
        return ['csv','json','yml'];
    }
}
?>
