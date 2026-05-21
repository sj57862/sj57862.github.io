<?php


namespace lib\Encoder;

use lib\Encoder\EncoderInterface;

class TSVEncoder implements EncoderInterface
{
    public function encode($data)
    {
        if (!is_array($data) || empty($data) || !isset($data[0]) || !is_array($data[0])) {
            return '';
        }

        $headers = array_keys($data[0]);
        $output = [];

        $output[] = implode("\t", $headers);

        foreach ($data as $row) {

            if (!is_array($row)) {
                continue;
            }

            $line = [];

            foreach ($headers as $h) {

                $value = $row[$h] ?? '';

                if (is_string($value)) {
                    $value = str_replace(["\t", "\n", "\r"], ' ', $value);
                }

                $line[] = $value;
            }

            $output[] = implode("\t", $line);
        }

        return implode("\n", $output);
    }

    public function decode($data)
    {
        $lines = array_filter(explode("\n", trim($data)));

        if (empty($lines)) {
            return [];
        }

        $headers = str_getcsv(array_shift($lines), "\t");

        $result = [];

        foreach ($lines as $line) {

            $values = str_getcsv($line, "\t");

            $row = [];

            foreach ($headers as $i => $key) {
                $row[$key] = $values[$i] ?? null;
            }

            $result[] = $row;
        }

        return $result;
    }

    public function supports()
    {
        return ['tsv'];
    }
}

?>
