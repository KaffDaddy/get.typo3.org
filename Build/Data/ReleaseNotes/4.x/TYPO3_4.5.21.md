Release Notes for TYPO3 4.5.21
==============================

This document contains information about TYPO3 version 4.5.21 which was
released on November 8th 2012.

News
----

This release is a combined bug fix and security release.

Notes
-----

Due to security issues found in the TYPO3 Core, there was a combined
release of TYPO3 4.5.21, 4.6.14 and 4.7.6.\
Find more details in the security bulletin:
<https://typo3.org/teams/security/security-bulletins/typo3-core/typo3-core-sa-2012-005/>

Download
--------

<https://typo3.org/download/>

MD5 checksums
-------------

    e5ed0c4a65ccf333fa8e02ec1e6053f6  blankpackage-4.5.21.tar.gz
    9793dc83cbb12044bdecd17ea84193a8  blankpackage-4.5.21.zip
    efd38f19c0eb088317a93362acf358ab  dummy-4.5.21.tar.gz
    4c5185fe8ac8584cd984f912f27f8efa  dummy-4.5.21.zip
    643bc19e0ca828860281afca30c27a4e  introductionpackage-4.5.21.tar.gz
    cc4bfc32f0cd5ac17be589be2b1e4d3e  introductionpackage-4.5.21.zip
    07636343c980406d62f2563dc9604df8  typo3_src+dummy-4.5.21.zip
    267ea8ed73faeb72f4063617ba7af974  typo3_src-4.5.21.tar.gz
    56bfe5aa29c12b7bb5d8261611eec88e  typo3_src-4.5.21.zip

Upgrading
---------

The [usual upgrading
procedure](https://docs.typo3.org/typo3cms/InstallationGuide/) applies.
No database updates are necessary.

Changes
-------

Here is a list of what was fixed since
[4.5.20](TYPO3_4.5.20 "wikilink"):

    2012-11-08  c211c0e                  [RELEASE] Release of TYPO3 4.5.21 (TYPO3 Release Team)
    2012-11-08  5245e09  #42696          [SECURITY] Fix SQL injection and XSS in record history (Oliver Hader)
    2012-11-08  ab335bc  #42774          [SECURITY] XSS in TCA Tree (Oliver Hader)
    2012-11-08  a768d97  #42776          [SECURITY] Fix potential XSS in t3lib_BEfunc::getFuncCheck (Helmut Hummel)
    2012-11-08  ba187e5                  [TASK] Raise submodule pointer (TYPO3 Release Team)
    2012-11-07  b4f7658  #39677          [BUGFIX] No sorting in TypoScript Object Browser when browsing (Nicole Cordes)
    2012-11-02  dba123b  #42281          [BUGFIX] Translated non-published page in workspace breaks live workspace (Oliver Hader)
    2012-11-02  fc6f82f  #38024          [BUGFIX] Illegal string offsets in t3lib_stdgraphic (Wouter Wolters)
    2012-11-01  ded3a6e  #37578          [BUGFIX] PHP 5.4 warning in CLI context in switch back user (Christian Kuhn)
    2012-10-29  c05e759  #28248          [BUGFIX] t3lib_div: adjust substUrlsInPlainText to also work on URLs at end of sentence (Robert Heel)
    2012-10-29  d4c539d  #40733          [BUGFIX] Wrong call to TSFE in FrontendEditing (Steffen Ritter)
    2012-10-27  7b28c0e  #42444          [TASK] Fix generation of ext_emconf.php (Wouter Wolters)
    2012-10-22  7f0696f  #38699          [BUGFIX] t3lib_div::unlink_tempfile does not always work on Windows (Stanislas Rolland)
    2012-10-22  f50483d  #27020          [BUGFIX] TCEForms.Suggest wizard in IRRE records (Nicole Cordes)
    2012-10-19  b77171c                  [BUGFIX] Fix case of tests folder (Xavier Perseguers)
    2012-10-19  2490737                  [BUGFIX] Unit test for saltedpasswords fail (Xavier Perseguers)
    2012-10-18  9a14bcf  #36087          [BUGFIX] RTE: Link to disabled page doesn't show in FE, link icon does (Stanislas Rolland)
    2012-10-18  f8fc399  #29685          [BUGFIX] RTE: Words containing umlauts not added to personal dictionary (Stanislas Rolland)
    2012-10-17  17b1d65  #38406          [BUGFIX] Extension Import not working with postgresql and DBAL (Ernesto Baschny)
    2012-10-16  19163bb                  [TASK] Set TYPO3 version to 4.5.21-dev (TYPO3 Release Team)
    2012-10-16  9419c2c                  [RELEASE] Release of TYPO3 4.5.20 (TYPO3 Release Team)


