<?php
namespace lib\Encoder;
use lib\Encoder\EncoderInterface;
class YamlEncoder implements EncoderInterface{
    public function encode($data){
        return yaml_emit($data);
    }
    public function decode($data){
        return yaml_parse($data);
    }
    public function supports(){
        return ['csv','json','yml'];
    }
}
?>
