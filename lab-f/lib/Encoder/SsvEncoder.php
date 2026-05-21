<?php


namespace lib\Encoder;

use lib\Encoder\EncoderInterface;

class SSVEncoder implements EncoderInterface
{
    public function encode($data)
    {
        if (!is_array($data) || empty($data) || !isset($data[0]) || !is_array($data[0])) {
            return '';
        }

        $headers = array_keys($data[0]);
        $output = [];

        $output[] = implode(' ', $headers);

        foreach ($data as $row) {

            if (!is_array($row)) {
                continue;
            }

            $line = [];

            foreach ($headers as $h) {

                $value = $row[$h] ?? '';

                if (is_string($value)) {

                    // jeśli wartość zawiera spację → otocz cudzysłowem
                    if (
                        str_contains($value, ' ') ||
                        str_contains($value, '"') ||
                        str_contains($value, "\n")
                    ) {
                        $value = '"' . str_replace('"', '""', $value) . '"';
                    }
                }

                $line[] = $value;
            }

            $output[] = implode(' ', $line);
        }

        return implode("\n", $output);
    }

    public function decode($data)
    {
        $lines = array_filter(explode("\n", trim($data)));

        if (empty($lines)) {
            return [];
        }

        $headers = str_getcsv(array_shift($lines), ' ', '"', '\\');

        $result = [];

        foreach ($lines as $line) {

            $values = str_getcsv($line, ' ', '"', '\\');

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
        return ['ssv'];
    }
}

?>
