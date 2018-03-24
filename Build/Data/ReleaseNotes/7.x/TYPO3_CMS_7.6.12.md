Release Notes for TYPO3 CMS 7.6.12
==================================

This document contains information about TYPO3 CMS 7.6.12 which was
released on November 1st, 2016.

News
----

This version is a maintenance release and contains bug fixes only.

Download
--------

<https://typo3.org/download/>

MD5 checksums
-------------

    69e1e975b5257619a913893fb6222dc2  typo3_src-7.6.12.tar.gz
    00f4802cb32ae02f4a9c90efcace41d8  typo3_src-7.6.12.zip

SHA256 checksums
----------------

    e7f479bfbd9498ce0c5465656f99bccb0487a2dc7fb37855a0702e630c5a5c0f  typo3_src-7.6.12.tar.gz
    09bd768487f893b1b8910bf695b14e31ec0649aef5d055a4346ad5cd00deb3dc  typo3_src-7.6.12.zip

Upgrading
---------

The [usual upgrading
procedure](https://docs.typo3.org/typo3cms/InstallationGuide/) applies.\
There were **changes in DB tables index\_phash and
sys\_file\_reference** compared to 7.6.11. Log into TYPO3 Install Tool,
click on “Compare current database with specification” and apply
changes.\
It might be required to clear all caches; the “important actions”
section in the TYPO3 Install Tool offers the accordant possibility to do
so.

Changes
-------

Here is a list of what was fixed since
[7.6.11](TYPO3_CMS_7.6.11 "wikilink"):

    2016-11-01  b8c6127                  [RELEASE] Release of TYPO3 7.6.12 (TYPO3 Release Team)
    2016-11-01  8bff4bd  #69062          [TASK] Properly escape all form attributes in SetupModuleController (Stefan Neufeind)
    2016-11-01  4d4a519  #78059          [BUGFIX] Make checks in localize compatible with new Localization Wizard (Tymoteusz Motylewski)
    2016-10-31  3dcf111  #78299          [BUGFIX] Remove dependency to RsaEncryptionModule in LoginRefresh (Frank Naegler)
    2016-10-31  b330463  #60399,#76745   [BUGFIX] Allow RTE transformations in palettes (Johannes Schlier)
    2016-10-31  a43deab  #78473          [BUGFIX] Use FAL api to delete file in garbage collection task (Nicole Cordes)
    2016-10-31  5178ab9  #78411          [BUGFIX] Prevent adding a backend user without password (Michael Oehlhof)
    2016-10-31  55143df  #77075          [BUGFIX] Add icon rendering for custom permissions options (Benjamin Serfhos)
    2016-10-31  0a83dfb  #78511          [BUGFIX] DebuggerUtility changes global blacklist (Christian Kuhn)
    2016-10-31  81acd41  #78333          [FOLLOWUP][BUGFIX] Fetching configuration-comments should require no comma (Markus Klein)
    2016-10-29  1ed8d6f  #78494,#76542   [BUGFIX] Prevent installation of incompatible extensions (Nicole Cordes)
    2016-10-29  9df5ce3  #78495          [BUGFIX] Allow "0" as path segment in ArrayUtility (Helmut Hummel)
    2016-10-29  d6b4de0  #76926          [BUGFIX] Allow shortcuts to edit module (Nicole Cordes)
    2016-10-29  d6b50d7  #78493          [BUGFIX] Use correct content type for BE ajax requests (Markus Klein)
    2016-10-27  4dbff0a  #76478          [TASK] Clean up DebuggerUtility (Nicole Cordes)
    2016-10-27  84eba27  #75254          [BUGFIX] Fix negative pid when doing a positioned insert (Marco Huber)
    2016-10-27  8779705  #72957          [BUGFIX] Fix unclear position for the new page using the wizard (Michael Oehlhof)
    2016-10-26  37e3136  #78444          [BUGFIX] Pass correct query parameter to image manipulation view (pille72)
    2016-10-26  adebb13  #77734          [BUGFIX] Group mount points that have the same parent (Michael Stucki)
    2016-10-26  502cf19  #77734          [BUGFIX] Show mountpoint path in record + link browsers if enabled in UserTS (Michael Stucki)
    2016-10-26  678848f  #77734          [BUGFIX] Fix page tree mountpoint path (Michael Stucki)
    2016-10-25  9167a9e  #77296          [BUGFIX] Adding back access to parentMenuArr and menuitem in subMenu (Stefan Bürk)
    2016-10-25  ed57ea9  #78416          [BUGFIX] Make extbase subclasses work with numeric types (Sascha Egerer)
    2016-10-25  075d71d  #78419          [BUGFIX] Minor lint in 7.6 .travis.yml (Christian Kuhn)
    2016-10-25  2e19738  #78368          [BUGFIX] Fix reference count when ref_table is sys_file (Wouter Wolters)
    2016-10-24  405b905  #78381          [BUGFIX] Custom select renderTypes use TcaSelectItems (Christian Kuhn)
    2016-10-24  57d9a4c  #34636          [BUGFIX] Respect options.disableDelete UserTSConfig (Christian Weiske)
    2016-10-24  b215521  #67661          [BUGFIX] Prevent duplicate pastes in rtehtmlarea (Stefan Froemken)
    2016-10-24  308df64  #78333          [BUGFIX] Fetching configuration-comments should require no comma (Stefan Neufeind)
    2016-10-24  8e8dee2  #78149          [BUGFIX] Set caption and copyright filemetadata DB columns to TEXT (Claus Due)
    2016-10-23  14bf0e5  #78382          [TASK] Cover t3_origuid in Workspaces Regular/Modify functional tests (Tymoteusz Motylewski)
    2016-10-21  3735298  #77710          [BUGFIX] Add missing functionality for YouTube "related" parameter (Tim Rücker)
    2016-10-21  ab3358b  #78312          [BUGFIX] Backend page module: set default mode to "Columns" (Josef Glatz)
    2016-10-21  2a68843  #78326          [BUGFIX] Add back-reference to $self in compiled Fluid templates (Claus Due)
    2016-10-21  fa4a618  #77630,#77629   [TASK] Migrate wizard icons to use icon fonts (Georg Ringer)
    2016-10-21  ee5d4a0  #78303          [TASK] Check t3_origuid field in DataHandler functional tests (Tymoteusz Motylewski)
    2016-10-21  d59447a  #78371          [TASK] Raise version number of compatibility6 in update wizard (Wouter Wolters)
    2016-10-21  c7f0537  #78369          [TASK] Raise version number in openid update wizard (Wouter Wolters)
    2016-10-21  0d47228  #77375          [BUGFIX] MM references are not transformed to versioned entities (Oliver Hader)
    2016-10-21  27b16b3  #77719          [BUGFIX] Correct position of t3editor autocomplete (Robert Vock)
    2016-10-21  218ea57  #77753          [BUGFIX] Show Create Content button only for allowed languages (Daniel Maier)
    2016-10-21  da06d6b  #78107          [BUGFIX] Do not cut constants in debug output (Sascha Egerer)
    2016-10-21  6212a49  #78329          [BUGFIX] Prevent Uncaught TypeError in ClickMenu.js (Benni Mack)
    2016-10-21  9ffe88a  #75866          [BUGFIX] Check if TypoScript is loaded for indexed_search (Tomita Militaru)
    2016-10-20  b71fa59  #78296          [BUGFIX] Resolves wrong usage of col and colgroup (Markus Sommer)
    2016-10-20  930b5da  #78327          [BUGFIX] isHiddenPalette removes 'form-section' class (Eric Chavaillaz)
    2016-10-18  9caa7aa  #71044          [BUGFIX] Fix special menu element rendered in wrong order (Johannes Schlier)
    2016-10-14  6542e06  #78223          [BUGFIX] Do not provide non selectable columns in colPos selector (Helmut Hummel)
    2016-10-14  c5ab384  #78290          [BUGFIX] Show login spinner if EXT:rsaauth is not installed (Andreas Fernandez)
    2016-10-13  3453276  #61560          [BUGFIX] Hide edit icon in list view (Nicole Cordes)
    2016-10-13  29d1b0a  #78262          [BUGFIX] Include CORS settings attribute when using integrity (Xavier Perseguers)
    2016-10-13  04481f8  #77956          [BUGFIX] Prevent exception due to missing id in the language menu (Sascha Nowak)
    2016-10-12  a6dd4d5  #78021          [BUGFIX] Exception with cHashIncludePageId but no id in the URL (Dmitry Dulepov)
    2016-10-12  a7a04b5  #78254          [TASK] splitFunctionalTests.sh in 7.6 (Christian Kuhn)
    2016-10-12  f3317ce  #78053          [BUGFIX] Fix requiring playlist argument when "loop" is set (Wouter Wolters)
    2016-10-10  0aee6a0  #77263          [FOLLOWUP][BUGFIX] Do not override hidden UC fields in user settings (Markus Klein)
    2016-10-10  31707ee  #78170          [FOLLOWUP][BUGFIX] Fix evaluation of rootLevel configuration in NewRecordController (Nicole Cordes)
    2016-10-09  53e5e7b  #77970          [BUGFIX] Change Indexed Search index_phash.data_filename column length (Karol Lamparski)
    2016-10-08  7559498  #76918          [BUGFIX] Fix select with multiple enabled not being saved correctly (Johannes Schlier)
    2016-10-08  4e62de8  #71328          [BUGFIX] Do not throw exception for inaccessible folders (Sascha Egerer)
    2016-10-07  9a75f0d  #78186          [BUGFIX] Treat <pre> tags correctly in RTE (Markus Klein)
    2016-10-07  a9b29fe  #77263          [BUGFIX] Do not override hidden UC fields in user settings (Stefan Froemken)
    2016-10-06  48f38fe  #77310          [BUGFIX] Bring back some colors in workspace diff view (Peter Niederlag)
    2016-10-06  10adf02  #77953          [BUGFIX] Use only domain with scheme at youtube origin (Ruud Silvrants)
    2016-10-06  e525591  #77238          [BUGFIX] indexed_search renders HTML5 placeholder regardless of sword (Daniel Neugebauer)
    2016-09-30  42119d5  #78118          [TASK] Fixed typo in extensions install and lowlevel (Robert van Kammen)
    2016-09-30  3896be7  #78102          [BUGFIX] Incorrect cHash generation may cause 404 on any page (Dmitry Dulepov)
    2016-09-29  63be404  #78086          [BUGFIX] Trim function name passed to GeneralUtility::callUserFunc() (Andreas Fernandez)
    2016-09-28  7d0b3eb  #78085          [BUGFIX] Fix evaluation of rootLevel configuration in NewRecordController (Georg Ringer)
    2016-09-28  8f40210  #78054          [BUGFIX] Always throw exception if ext_emconf.php is missing (Helmut Hummel)
    2016-09-28  59a8dee  #77856          [BUGFIX] BackendUserAuthentication checks wrong BE user permission (Felix Rauch)
    2016-09-28  58cc21e  #78083          [CLEANUP] Polish Enumeration exceptions (Mathias Brodala)
    2016-09-28  8db4e4e  #78084          [TASK] Add suggest wizard to field file_collections of tt_content (Georg Ringer)
    2016-09-28  557e72b  #64331          [BUGFIX] TCA slider wizard w. default value in flexform field (Joerg Kummer)
    2016-09-25  54b4dd5  #78047          [BUGFIX] Remove field restriction in PageLinkHandler (Georg Ringer)
    2016-09-22  c60716b  #77998          [TASK] Always use HTTPS for youtube and vimeo (Georg Ringer)
    2016-09-22  dbccc52  #78039          [BUGFIX] Display correct text for invalid links on password reset (Daniel Goerz)
    2016-09-21  ee356e7  #77943          [BUGFIX] Avoid duplicated classes in typolink VH (Tymoteusz Motylewski)
    2016-09-21  fb0c056  #77896          [BUGFIX] Support target in ctype uploads and fluid_styled_content (Georg Ringer)
    2016-09-20  f3489c4  #76940          [TASK] Add key to uid_local of sys_file_reference (Georg Ringer)
    2016-09-19  7b5951f  #77989          [BUGFIX] PSR-7 properties must be initialized as array (Patrik Karisch)
    2016-09-16  d08186f  #77891          [TASK] Add Forger RST utility link to Changelog HowTo (Mathias Brodala)
    2016-09-16  de6c78d  #77907          [BUGFIX] Remove unnecessary fields from history (Susanne Moog)
    2016-09-16  693de54  #77877          [BUGFIX] Correct show configuration in newContentElement wizard (Nicole Cordes)
    2016-09-13  8bfcf19  #77937          [BUGFIX] DataHandler should inherit $isImporting (Georg Ringer)
    2016-09-13  eb58462                  [TASK] Set TYPO3 version to 7.6.12-dev (TYPO3 Release Team)


