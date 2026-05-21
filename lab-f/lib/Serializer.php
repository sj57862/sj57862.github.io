<?php
namespace lib;
use lib\Encoder\CSVEncoder;
use lib\Encoder\JsonEncoder;
use lib\Encoder\SSVEncoder;
use lib\Encoder\TSVEncoder;
use lib\Encoder\YamlEncoder;
class Serializer {
    private $encoder_csv;
    private $encoder_json;
    private $encoder_yml;
    public function __construct(){
        $this->encoder_csv = new CSVEncoder();
        $this->encoder_json = new JsonEncoder();
        $this->encoder_yml = new YamlEncoder();
        $this->encoder_ssv = new SSVEncoder();
        $this->encoder_tsv = new TSVEncoder();
    }
    public function encode($data,$type){
        try {
            switch ($type) {
                case 'CSV':
                    return $this->encoder_csv->encode($data);
                case 'TSV':
                    return $this->encoder_tsv->encode($data);
                case 'SSV':
                    return $this->encoder_ssv->encode($data);
                case 'JSON':
                    return $this->encoder_json->encode($data);
                case 'YAML':
                    return $this->encoder_yml->encode($data);
                default:
                    echo "typ nieobslugiwany";
            }
        }catch (Exception $e) {
            echo "Błąd podczas kodowania: " . $e->getMessage();
        }
    }
    public function decode($data,$type){
        try {

            switch ($type) {
                case 'CSV':
                    return $this->encoder_csv->decode($data);
                case 'TSV':
                    return $this->encoder_tsv->decode($data);
                case 'SSV':
                    return $this->encoder_ssv->decode($data);
                case 'JSON':
                    return $this->encoder_json->decode($data);
                case 'YAML':
                    return $this->encoder_yml->decode($data);
                default:
                    echo "typ nieobslugiwany";
            }
        }catch (Exception $e) {
            echo "Błąd podczas dekodowania: " . $e->getMessage();
        }
    }
    public function supports(){
        return ['csv','json','yml'];
    }
}
?>
