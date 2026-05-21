<?php
namespace lib\Encoder;
use lib\Encoder\EncoderInterface;
class CSVEncoder implements EncoderInterface{
    public function encode($data)
    {
        if (!is_array($data) || empty($data) || !isset($data[0]) || !is_array($data[0])) {
            return '';
        }

        $headers = array_keys($data[0]);
        $output = [];

        $output[] = implode(',', $headers);

        foreach ($data as $row) {
            if (!is_array($row)) {
                continue;
            }

            $line = [];

            foreach ($headers as $h) {
                $value = $row[$h] ?? '';

                if (is_string($value) && (str_contains($value, ',') || str_contains($value, '"') || str_contains($value, "\n"))) {
                    $value = '"' . str_replace('"', '""', $value) . '"';
                }

                $line[] = $value;
            }

            $output[] = implode(',', $line);
        }

        return implode("\n", $output);
    }
    public function decode($data){
        $lines = array_filter(explode("\n", trim($data)));
        $headers = str_getcsv(array_shift($lines), ',', '"', '\\');

        $result = [];

        foreach ($lines as $line) {
            $values = str_getcsv($line, ',', '"', '\\');
            $row = [];

            foreach ($headers as $i => $key) {
                $row[$key] = isset($values[$i]) ? $values[$i] : null;
            }

            $result[] = $row;
        }

        return $result;
    }
    public function supports(){
        return ['csv','json','yml'];
    }
}
?>
