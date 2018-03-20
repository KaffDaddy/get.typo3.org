<?php
declare(strict_types=1);


foreach ([7, 8, 9] as $version) {
    $releasesFileContent = file_get_contents(__DIR__ . '/../Data/' . $version . '.json');
    $v = json_decode($releasesFileContent, true);

    $db = new SQLite3(__DIR__ . '/../var/gettr.db');

    foreach ($v['systemRequirements'] as $category => $requirement) {
        if ($requirement['min'] ?? false) {
            $uuid = guidv4();
            $stmt = $db->prepare(
                'INSERT INTO requirement (uuid, version, category, name, min, max) VALUES' .
                '(:uuid, :version, :category, :name, :min, :max)'
            );
            $stmt->bindParam(':uuid', $uuid);
            $stmt->bindParam(':version', $version);
            $stmt->bindParam(':category', $category);
            $stmt->bindParam(':name', $category);
            $stmt->bindParam(':min', $requirement['min']);
            $max = $perCatReq['max'] ?? null;
            $stmt->bindParam(':max', $max);
            $stmt->execute();

        } else {
            foreach ($requirement as $name => $perCatReq) {
                $uuid = guidv4();
                $stmt = $db->prepare(
                    'INSERT INTO requirement (uuid, version, category, name, min, max) VALUES' .
                    '(:uuid,:version, :category, :name, :min, :max)'
                );
                $stmt->bindParam(':uuid', $uuid);
                $stmt->bindParam(':version', $version);
                $stmt->bindParam(':category', $category);
                $stmt->bindParam(':name', $name);
                if ($perCatReq['min'] === 'latest') {
                    $min = null;
                    $stmt->bindParam(':min', $min);
                } else {
                    $stmt->bindParam(':min', $perCatReq['min']);
                }
                $max = $perCatReq['max'] ?? null;
                $stmt->bindParam(':max', $max);
                $stmt->execute();
            }
        }
    }

}

function guidv4()
{
    if (function_exists('com_create_guid') === true) {
        return trim(com_create_guid(), '{}');
    }

    $data = openssl_random_pseudo_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}
