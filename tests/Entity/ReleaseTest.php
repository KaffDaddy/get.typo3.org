<?php
declare(strict_types=1);

namespace App\Tests\Service;


use App\Entity\Embeddables\Package;
use App\Entity\Release;
use App\Service\DataToJson;
use PHPUnit\Framework\TestCase;

class ReleaseTest extends TestCase
{

    /**
     * @test
     */
    public function jsonSerializeRelease(): void
    {
        $date = new \DateTime('2018-01-30 15:44:52 UTC');
        $tarPackage = new Package(
            null,
            '3a277826d716eb4e82a36a2200deefd76d15378c',
            '138c8ec6b7f80e7dce5f9ac9d24edaf7c3a87fef0c02258b86c5273886db0841'
        );
        $zipPackage = new Package(
            null,
            '680b263e6de11f3e74af453193f7c43d99cfcdfe',
            '012d8c858691aefe4da0224bf76543187e112a3b7696eb65e236d18a9481631e'
        );
        $data = new Release('9.1.0', 'regular', $date, $tarPackage, $zipPackage);

        $result = $data->jsonSerialize();

        $expected = json_decode('{
            "version": "9.1.0",
            "date": "2018-01-30 15:44:52 UTC",
            "type": "regular",
            "checksums": {
              "tar": {
                "sha1": "3a277826d716eb4e82a36a2200deefd76d15378c",
                "sha256": "138c8ec6b7f80e7dce5f9ac9d24edaf7c3a87fef0c02258b86c5273886db0841"
              },
              "zip": {
                "sha1": "680b263e6de11f3e74af453193f7c43d99cfcdfe",
                "sha256": "012d8c858691aefe4da0224bf76543187e112a3b7696eb65e236d18a9481631e"
              }
            },
            "url": {
              "zip": "https:\/\/get.typo3.org\/9.1.0\/zip",
              "tar": "https:\/\/get.typo3.org\/9.1.0"
            }
          }', true);

        $this->assertEquals($expected, json_decode(json_encode($result), true));
    }

}
