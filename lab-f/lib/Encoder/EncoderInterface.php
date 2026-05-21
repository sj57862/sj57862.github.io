<?php
namespace lib\Encoder;
interface EncoderInterface{
    public function supports();
    public function decode($data);
    public function encode($data);
}
?>
