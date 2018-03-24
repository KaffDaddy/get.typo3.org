Release Notes for TYPO3 6.0.9
=============================

This document contains information about TYPO3 CMS 6.0.9 which was
released on September 4th 2013.

News
----

This release is a combined bug fix and security release.

Notes
-----

Due to security issues found in the TYPO3 Core, there was a combined
release of TYPO3 CMS 6.0.9 and 6.1.4.\
Find more details in the security bulletin:
<https://typo3.org/teams/security/security-bulletins/typo3-core/typo3-core-sa-2013-003/>

Download
--------

<https://typo3.org/download/>

MD5 checksums
-------------

    5b31a48d6e4ed45adb2e1cc568b9f515  blankpackage-6.0.9.tar.gz
    3f4fa1ea8358247037c0fdceb52abf9a  blankpackage-6.0.9.zip
    dbf0d6a5a9c2311fecc4eee4398a44ff  dummy-6.0.9.tar.gz
    6c180f33d82aa07db519f58df61e85da  dummy-6.0.9.zip
    0f67f152eec9baf074f77d31547ba7b6  typo3_src+dummy-6.0.9.zip
    022feeab17de3b9bbc1c92dd5b75d0f6  typo3_src-6.0.9.tar.gz
    f7b3943ad7bbc51c8ee07315655526f6  typo3_src-6.0.9.zip

Upgrading
---------

The [usual upgrading
procedure](https://docs.typo3.org/typo3cms/InstallationGuide/) applies.
No database updates are necessary.

Changes
-------

Here is a list of what was fixed since [6.0.8](TYPO3_6.0.8 "wikilink"):

    2013-09-04  8506ff6                  [RELEASE] Release of TYPO3 6.0.9 (TYPO3 Release Team)
    2013-09-04  952974b  #50886          [SECURITY] Prohibit accessing storage 0 from backend UI (Steffen Ritter)
    2013-09-04  1e710fb  #50883          [SECURITY] Identifiers may refer to resources outside the storage (Steffen Ritter)
    2013-09-04  6073618  #51495          [SECURITY] Deny arbitrary code execution possibility for editors (Helmut Hummel)
    2013-09-04  b3e53a0  #51327          [SECURITY] Refactor and fix FAL user permission handling (Helmut Hummel)
    2013-09-04  31d5b88  #51326          [SECURITY] Add possibility to en-/disable file permission checks (Helmut Hummel)
    2013-09-04  02aa25d  #51079          [SECURITY] Check permissions in all actions of ResourceStorage (Steffen Ritter)
    2013-09-03  77701ad                  [TASK] CGL Cleanup of ResourceStorage (Helmut Hummel)
    2013-09-03  ec0a99c  #49842          [BUGFIX] Storage is offline but is still used (Frans Saris)
    2013-09-03  1cf9d3c  #51672          [BUGFIX] Fix fatal error in ExtendedFileUtility (Helmut Hummel)
    2013-09-01  55724fb  #31998          [BUGFIX] Faulty check for missing SMTP port (Tomita Militaru)
    2013-08-31  c73e4fe  #50424          [BUGFIX] Backend Layout Grid Wizard not fully visible in Mac Firefox 22 (Roland Schenke)
    2013-08-30  0547211  #51585          [BUGIFX] Missing argument in EM List view VH (Francois Suter)
    2013-08-29  2b86070  #51328          [BUGFIX] Only log file/directory actions which were done (Helmut Hummel)
    2013-08-29  dc01b69  #51544          [BUGFIX] Sprite manager cache improvement (Christian Kuhn)
    2013-08-29  01acc60  #50707          [BUGFIX] TCA 'group' selectedListStyle with 'width' breaking layout (Ernesto Baschny)
    2013-08-29  2727a6a  #51460          [BUGFIX] Database integrity check fatal error (Stefan Fürst)
    2013-08-29  1a04377  #51474          [BUGFIX] Cast autoload and classAliasMap to Array (Michel Georgy)
    2013-08-29  f1ab499  #51509          [BUGFIX] Add missing API method FileInterface::getNameWithoutExtension (Ernesto Baschny)
    2013-08-28  2c8a999  #36244          [BUGFIX] Exclude empty passwords from password hashing check (Nicole Cordes)
    2013-08-27  05fccd0  #50234          [TASK] Make the extension titles link to the configuration (Nicole Cordes)
    2013-08-27  774a1e0  #51304          [BUGFIX] Hide translations in categories selector (Francois Suter)
    2013-08-27  ed32255  #50870          [BUGFIX] Tests in Localization\Parser\LocallangXmlParserTest fail (Nicole Cordes)
    2013-08-27  f7e4a7e  #50760          [BUGFIX] Escape title tag of image links (Alexander Stehlik)
    2013-08-27  7bd1009  #25327,#37026   [BUGFIX] Page tree filtering broken in IE7 & IE8 (Aske Ertmann)
    2013-08-25  a735101  #51209          [BUGFIX] Ignore permission checks for processed files (Helmut Hummel)
    2013-08-20  910d820  #37892          [BUGFIX] No version overlay should be done for sys_language (Lienhart Woitok)
    2013-08-20  19a811d  #46989          [BUGFIX] Files with unclean path indexed multiple times (Stefan Neufeind)
    2013-08-18  fb7b686  #50614          [TASK] FilesContentObject::stdWrapValue(): only execute stdWrap once (Stefan Neufeind)
    2013-08-18  d368497  #43428          [BUGFIX] Language-module icons need to display in correct size (Stefan Neufeind)
    2013-08-17  fbbad86  #30636          [BUGFIX] TCA: subtypes_addlist not processed (Benjamin Mack)
    2013-08-17  f39a79d  #47844          [BUGFIX] Query parameters of external link may get altered (Stanislas Rolland)
    2013-08-16  a09dc5f  #51115          [TASK] Disable scheduler-tests if EXT:scheduler not loaded (Anja Leichsenring)
    2013-08-16  8dfaf9c  #51004          [BUGFIX] Fix file permission methods in BackendUserAuthentication (Helmut Hummel)
    2013-08-16  db51023  #51007          [BUGFIX] Fix inconsistencies in getTSConfig in BackenuserAuth (Helmut Hummel)
    2013-08-16  221a435                  Revert "[BUGFIX] Fix inconsistencies in getTSConfig in BackenuserAuth" (Helmut Hummel)
    2013-08-16  8b33a0d                  Revert "[BUGFIX] Fix file permission methods in BackendUserAuthentication" (Helmut Hummel)
    2013-08-15  d3b7851  #51007          [BUGFIX] Fix inconsistencies in getTSConfig in BackenuserAuth (Helmut Hummel)
    2013-08-15  329645c  #51004          [BUGFIX] Fix file permission methods in BackendUserAuthentication (Helmut Hummel)
    2013-08-14  61506bb  #46094          [BUGFIX] Avoid usage of subheader in mailform (Francois Suter)
    2013-08-12  d7ef5a9  #47806          [BUGFIX] Typing after abbr or acronym tag is difficult (Stanislas Rolland)
    2013-08-12  c8a83e7  #50193          [BUGFIX] FAL: Image Processing doesn't respect GFX "thumbnails_png" (Benjamin Mack)
    2013-08-12  7b16232  #51010          [BUGFIX] Allow reading files if storage is not browsable (Helmut Hummel)
    2013-08-11  f92dbbd  #51005          [BUGFIX] Take into account all file and folder permissions (Helmut Hummel)
    2013-08-11  4943a8f  #50844          [BUGFIX] Failing tests in Resource\Driver\LocalDriverTest on Windows (Nicole Cordes)
    2013-08-11  ac39140  #51012          [BUGFIX] Missing \TYPO3\CMS\Core\Utility\ in ResourceFactory (Wouter Wolters)
    2013-08-11  55446c5  #51011          [TASK] Add signal in ResourceFactory for storage creation (Helmut Hummel)
    2013-08-11  271e801  #44910          [BUGFIX] LocalDriver: Recursive file listing is broken (Andreas Wolf)
    2013-08-11  4978ea7  #50502          [BUGFIX] rtehtmlarea acronym error with static_info_tables 6.0+ (Stanislas Rolland)
    2013-08-08  150e458  #48523          [BUGFIX] Reports module tries to load not-installed extension (Wouter Wolters)
    2013-08-08  8ed8066  #50868          [BUGFIX] number_format() expects parameter 1 to be double (Wouter Wolters)
    2013-08-07  98bc16b  #50568          [BUGFIX] Ignore case in file extension filter (Alexander Stehlik)
    2013-08-07  20df928  #50872          [BUGFIX] Correctly set user storage permissions (Helmut Hummel)
    2013-08-07  c941199  #50867          [TASK] Introduce AbstractHierarchicalFilesystemDriver (Steffen Ritter)
    2013-08-07  f3f221d  #50843          [BUGFIX] Failing Resource\FactoryTest on Windows systems (Nicole Cordes)
    2013-08-07  c75eefb  #47106          [BUGFIX] Indexing of external files does not work in indexed_search (Wouter Wolters)
    2013-08-07  80aeb3a  #50562          [BUGFIX] Callback in CrawlerHook of indexed_search sysext buggy (Marius Büscher)
    2013-08-07  647d075  #50812          [BUGFIX] Backup singletons in unit tests prior to other setUp operations (Nicole Cordes)
    2013-08-06  5250c54  #50628          [BUGFIX] Fix EmConfUtility::fixEmConf conflicts generation (Sascha Egerer)
    2013-08-06  e3d9d7b  #50125          [BUGFIX] Incorrect check for empty folder (Philipp Gampe)
    2013-08-06  0f2a29d  #50615          [TASK] Use magic __CLASS__ in getInstance()-methods (Stefan Neufeind)
    2013-08-06  ad9328c  #50751          [BUGFIX] Fix empty href parameter (Anja Leichsenring)
    2013-08-06  9e407f0  #50809          [BUGFIX] Fix failing test in StorageRepositoryTest (Anja Leichsenring)
    2013-08-06  449dc72  #50803          [BUGFIX] Fatal error: "enableFields on non-object" in extension manager (Ernesto Baschny)
    2013-08-04  3cd1045  #50466          [BUGFIX] MySQL: Use ENGINE (not TYPE) for storage-engine (Stefan Neufeind)
    2013-08-01  db1c38b  #43893          [BUGFIX] selected = 1 doesn't work in FormContentObject (Wouter Wolters)
    2013-08-01  f827fc9  #47123          [BUGFIX] Suppress double page entry in temporary mounted pagetree (Frank Frewer)
    2013-07-31  2feccc5  #36031          [TASK] Provide information about import action in TCEmain to hooks (Stefan Galinski)
    2013-07-31  07f3578  #43631          [BUGFIX] RTE wizard can't "save document and view page" (Stanislas Rolland)
    2013-07-30  2b2aa1d                  [TASK] Set TYPO3 version to 6.0.9-dev (TYPO3 Release Team)


