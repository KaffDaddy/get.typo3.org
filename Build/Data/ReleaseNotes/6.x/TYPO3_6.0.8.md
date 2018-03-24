Release Notes for TYPO3 6.0.8
=============================

This document contains information about TYPO3 CMS 6.0.8 which was
released on July 30th 2013.

News
----

This release is a combined bug fix and security release.

Notes
-----

Due to security issues found in the TYPO3 Core, there was a combined
release of TYPO3 CMS 4.5.29, 4.7.14, 6.0.8 and 6.1.3.\
Find more details in the security bulletin:
<https://typo3.org/teams/security/security-bulletins/typo3-core/typo3-core-sa-2013-002/>

Download
--------

<https://typo3.org/download/>

MD5 checksums
-------------

    97f31c1c8c65f3264071c2e6c6150a34  blankpackage-6.0.8.tar.gz
    65977b0a4027de7bde82125ee982c3e3  blankpackage-6.0.8.zip
    9d5b3679cf27dc20b0793bb73588eea9  dummy-6.0.8.tar.gz
    ec09a1c4537a0ca8644e320190228bf2  dummy-6.0.8.zip
    433862d1e42aeef71c21d732a1ed98d3  typo3_src+dummy-6.0.8.zip
    d4afc2febef3252dbe16f618b2e7c7eb  typo3_src-6.0.8.tar.gz
    8a9fcf32ec8b955704dd72126e44495b  typo3_src-6.0.8.zip

Upgrading
---------

The [usual upgrading
procedure](https://docs.typo3.org/typo3cms/InstallationGuide/) applies.
No database updates are necessary.

Changes
-------

Here is a list of what was fixed since [6.0.7](TYPO3_6.0.7 "wikilink"):

    2013-07-30  d589674                  [RELEASE] Release of TYPO3 6.0.8 (TYPO3 Release Team)
    2013-07-30  2ab93c7  #47452          [SECURITY] fileDenyPattern ignored in file-list module (Jigal van Hemert)
    2013-07-30  a1ec169  #49209          [SECURITY] XSS in 3rd party library Flowplayer (Oliver Hader)
    2013-07-30  f1f6ca0  #49210          [SECURITY] XSS in 3rd party library Audio Player (Oliver Hader)
    2013-07-30  8e2a650  #50525          [BUGFIX] Deleted flag is not updated during file indexing (Oliver Hader)
    2013-07-30  d93d7d7  #49396          [BUGFIX] MailUtility breakLinesForEmail cuts text wrong and discard rest (Tim Lochmueller)
    2013-07-29  985248f                  Revert "[BUGFIX] setRespectSysLanguage(FALSE) doesn't prevent language overlay" (Anja Leichsenring)
    2013-07-29  b5b3f8e                  Revert "[BUGFIX] sys_file record doesn't get flagged as delete" (Oliver Hader)
    2013-07-29  e70aab7  #50041          [BUGFIX] Use correct url schema in MediaWizardProvider (Georg Ringer)
    2013-07-29  8730038  #50506          [TASK] Introduce use-statement for Utility-namespace in Bootstrap (Stefan Neufeind)
    2013-07-29  6d27f02  #11014          [BUGFIX] Workspace selector in top toolbar cannot scroll (Georg Ringer)
    2013-07-28  ad4742c  #45834          [BUGFIX] Detection of curlProxyServer settings is incorrect (Dmitry Dulepov)
    2013-07-28  a6a3b63  #50217          [BUGFIX] Class loader tries to load classes it cannot load (Andreas Wolf)
    2013-07-28  5089dd4  #50258          [TASK] Add tests for ContentObjectRenderer::getData() (Stefan Neufeind)
    2013-07-27  09c81cf  #44118          [BUGFIX] Debug exception handler: set exit code on CLI (Christian Weiske)
    2013-07-27  3a4ca12  #50492          [TASK] Run phpLint and phpUnit in different travis builds (Christian Kuhn)
    2013-07-27  9f783b8  #41165          [BUGFIX] Make BackendUtility::viewOnClick honor doc (Kasper Ligaard)
    2013-07-26  0646bba  #50480          [TASK] Remove empty .gitmodules file (Christian Kuhn)
    2013-07-26  f03e2ee  #50478          [BUGFIX] Failures in em unit tests due to phpunit update (Christian Kuhn)
    2013-07-26  7e83394  #50476          [BUGFIX] FAL wrong \RecursiveIteratorIterator usage (Christian Kuhn)
    2013-07-26  e503328  #50472          [BUGFIX] FAL does not copy subfolders cleanly (Christian Kuhn)
    2013-07-26  ce755bf  #50458          [BUGFIX] Fix failing test (Anja Leichsenring)
    2013-07-26  6f3341a  #49722          [BUGFIX] Uninstall extension with dependency throws Exception (Wouter Wolters)
    2013-07-25  2d0997e                  [BUGFIX] Test regression from patch for #47192 (Andreas Wolf)
    2013-07-25  313ebed  #50447          [BUGFIX] Improve method annotation and type hinting in FAL (Christian Kuhn)
    2013-07-25  dbcfde3  #50411          [BUGFIX] rsaauth BackendFactory does not unset backend (Markus Klein)
    2013-07-25  072eba3  #50442          [BUGFIX] require_once of vfsStream triggers travis fail (Christian Kuhn)
    2013-07-25  cfa053f  #50410          [TASK] Revise typo3/sysext/README.txt (Wouter Wolters)
    2013-07-23  74b4a73                  [TASK] Set TYPO3 version to 6.0.8-dev (TYPO3 Release Team)


