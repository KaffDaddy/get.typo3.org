Release Notes for TYPO3 CMS 6.2.28
==================================

This document contains information about TYPO3 CMS 6.2.28 which was
released on November 1st, 2016.

News
----

This version is a maintenance release and contains bug fixes only.

Download
--------

<https://typo3.org/download/>

MD5 checksums
-------------

    86dad15f9d617d4f7f29b1e74aeaf526  typo3_src-6.2.28.tar.gz
    ec9a5aebc132e355ac564118ee991351  typo3_src-6.2.28.zip

SHA256 checksums
----------------

    5063c586b292a057db539fe32022119f2ec42d234c51ad3018826d78a45d91ed  typo3_src-6.2.28.tar.gz
    d47d77a4700306c07dee9a7a85be156694d41f3fbe8ef6443a61fd99fa138dfc  typo3_src-6.2.28.zip

Upgrading
---------

The [usual upgrading
procedure](https://docs.typo3.org/typo3cms/InstallationGuide/) applies.
No database updates are necessary.\
It might be required to clear all caches; the “important actions”
section in the TYPO3 Install Tool offers the accordant possibility to do
so.

Changes
-------

Here is a list of what was fixed since
[6.2.27](TYPO3_CMS_6.2.27 "wikilink"):

    2016-11-01  c423e5b                  [RELEASE] Release of TYPO3 6.2.28 (TYPO3 Release Team)
    2016-11-01  94ec146  #78494,#76542   [BUGFIX] Prevent installation of incompatible extensions (Benni Mack)
    2016-10-27  cf20781  #73156          [BUGFIX] FrontendContentAdapterService replaces LF chars before concat (Daniel Neugebauer)
    2016-10-25  d262000  #78418          [TASK] splitFunctionalTests.sh in 6.2 (Christian Kuhn)
    2016-10-25  c01ccd3  #78368          [BUGFIX] Fix reference count when ref_table is sys_file (Wouter Wolters)
    2016-10-25  4f5926a  #78408          [TASK] Remove failing test in IntegerValidatorTest (Anja Leichsenring)
    2016-10-21  953119f  #76901          [BUGFIX] Reset SYS/exceptionalErrors in live preset (Benni Mack)
    2016-10-13  44aa8dc  #77956          [BUGFIX] Prevent exception due to missing id in the language menu (Xavier Perseguers)
    2016-10-12  59f7404  #78021          [BUGFIX] Exception with cHashIncludePageId but no id in the URL (Dmitry Dulepov)
    2016-09-30  0aa80a6  #78102          [BUGFIX] Incorrect cHash generation may cause 404 on any page (Dmitry Dulepov)
    2016-09-23  5b6f9fc  #77877          [BUGFIX] Correct show configuration in newContentElement wizard (Nicole Cordes)
    2016-09-13  2c19670                  [TASK] Set TYPO3 version to 6.2.28-dev (TYPO3 Release Team)


