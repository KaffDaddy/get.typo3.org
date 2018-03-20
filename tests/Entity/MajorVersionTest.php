<?php
declare(strict_types=1);

namespace App\Tests\Service;


use App\Entity\Embeddables\Package;
use App\Entity\MajorVersion;
use App\Entity\Release;
use App\Service\DataToJson;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\TestCase;

class MajorVersionTest extends TestCase
{

    /**
     * @test
     */
    public function jsonSerializeRelease(): void
    {
        $r1 = $this->getRelease('8.1.0');
        $r2 = $this->getRelease('8.7.9');
        $r3 = $this->getRelease('8.4.0');


        $majorVersion = new MajorVersion(
            8,
            'title',
            'subtitle',
            'description',
            new \DateTimeImmutable(),
            new \DateTimeImmutable('+30days'),
            new ArrayCollection([]),
            new ArrayCollection([$r1, $r2, $r3])
        );

        $result = $majorVersion->jsonSerialize();

        $expected = [
            'releases' => [
                '8.7.9' =>
                    [
                        'version' => '8.7.9',
                        'date' => '2018-01-30 15:44:52 UTC',
                        'type' => 'regular',
                        'checksums' =>
                            [
                                'tar' =>
                                    [
                                        'sha1' => '3a277826d716eb4e82a36a2200deefd76d15378c',
                                        'sha256' => '138c8ec6b7f80e7dce5f9ac9d24edaf7c3a87fef0c02258b86c5273886db0841',
                                    ],
                                'zip' =>
                                    [
                                        'sha1' => '680b263e6de11f3e74af453193f7c43d99cfcdfe',
                                        'sha256' => '012d8c858691aefe4da0224bf76543187e112a3b7696eb65e236d18a9481631e',
                                    ],
                            ],
                        'url' =>
                            [
                                'zip' => 'https://get.typo3.org/8.7.9/zip',
                                'tar' => 'https://get.typo3.org/8.7.9',
                            ],
                    ],
                '8.4.0' =>
                    [
                        'version' => '8.4.0',
                        'date' => '2018-01-30 15:44:52 UTC',
                        'type' => 'regular',
                        'checksums' =>
                            [
                                'tar' =>
                                    [
                                        'sha1' => '3a277826d716eb4e82a36a2200deefd76d15378c',
                                        'sha256' => '138c8ec6b7f80e7dce5f9ac9d24edaf7c3a87fef0c02258b86c5273886db0841',
                                    ],
                                'zip' =>
                                    [
                                        'sha1' => '680b263e6de11f3e74af453193f7c43d99cfcdfe',
                                        'sha256' => '012d8c858691aefe4da0224bf76543187e112a3b7696eb65e236d18a9481631e',
                                    ],
                            ],
                        'url' =>
                            [
                                'zip' => 'https://get.typo3.org/8.4.0/zip',
                                'tar' => 'https://get.typo3.org/8.4.0',
                            ],
                    ],
                '8.1.0' =>
                    [
                        'version' => '8.1.0',
                        'date' => '2018-01-30 15:44:52 UTC',
                        'type' => 'regular',
                        'checksums' =>
                            [
                                'tar' =>
                                    [
                                        'sha1' => '3a277826d716eb4e82a36a2200deefd76d15378c',
                                        'sha256' => '138c8ec6b7f80e7dce5f9ac9d24edaf7c3a87fef0c02258b86c5273886db0841',
                                    ],
                                'zip' =>
                                    [
                                        'sha1' => '680b263e6de11f3e74af453193f7c43d99cfcdfe',
                                        'sha256' => '012d8c858691aefe4da0224bf76543187e112a3b7696eb65e236d18a9481631e',
                                    ],
                            ],
                        'url' =>
                            [
                                'zip' => 'https://get.typo3.org/8.1.0/zip',
                                'tar' => 'https://get.typo3.org/8.1.0',
                            ],
                    ],
            ],
            'latest' => '8.7.9',
            'stable' => '8.7.9',
            'active' => true
        ];

        $arrResult = json_decode(json_encode($result), true);
        $this->assertSame($expected, $arrResult);
    }

    protected function getRelease($version)
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
        return new Release($version, 'regular', $date, $tarPackage, $zipPackage);
    }

}
