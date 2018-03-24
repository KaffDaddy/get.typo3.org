Release Notes for TYPO3 CMS 7.6.11
==================================

This document contains information about TYPO3 CMS 7.6.11 which was
released on September 13th, 2016.

News
----

This release is a combined bug fix and security release.

Notes
-----

Find more details in the security bulletins:

-   <https://typo3.org/teams/security/security-bulletins/typo3-core/typo3-core-sa-2016-021/>
-   <https://typo3.org/teams/security/security-bulletins/typo3-core/typo3-core-sa-2016-022/>

Download
--------

<https://typo3.org/download/>

MD5 checksums
-------------

    92a7068c6aee32a8dd899f08093c0721  typo3_src-7.6.11.tar.gz
    55d5f6036de8b32eb097d361b1230613  typo3_src-7.6.11.zip

SHA256 checksums
----------------

    e96f9085b6e22e0295a7f3b6ba108dd8a0997479604323a4c663301412826543  typo3_src-7.6.11.tar.gz
    9dd405ce28f99782c3e6d6c9480006366e3780133771840ac0507cfbf590bf6c  typo3_src-7.6.11.zip

Upgrading
---------

The [usual upgrading
procedure](https://docs.typo3.org/typo3cms/InstallationGuide/) applies.\
There were **changes in DB table sys\_file\_metadata** compared to
7.6.10. Log into TYPO3 Install Tool, click on “Compare current database
with specification” and apply changes.\
It might be required to clear all caches; the “important actions”
section in the TYPO3 Install Tool offers the accordant possibility to do
so.

Changes
-------

Here is a list of what was fixed since
[7.6.10](TYPO3_CMS_7.6.10 "wikilink"):

    2016-09-13  0e43819                  [RELEASE] Release of TYPO3 7.6.11 (TYPO3 Release Team)
    2016-09-13  7b8258d  #76462          [!!!][SECURITY] Mitigate potential cache flooding (Helmut Hummel)
    2016-09-13  e292d9e  #77906          [SECURITY] Fix select_key XSS in PageLayoutView (Georg Ringer)
    2016-09-13  3e74ca5  #77204          [BUGFIX] Prevent orphaned tags in Typo3DatabaseBackend (Thomas Schlumberger)
    2016-09-12  2afce43  #77054          [BUGFIX] Editing title inline now updates correct language (Gianluigi Martino)
    2016-09-12  3fc9c1e  #77840          [TASK] Add crosslinks to Forge in ChangeLogs (Martin Bless)
    2016-09-08  aa85508  #77885          [BUGFIX] Avoid calling login refresh poll too often (Helmut Hummel)
    2016-09-06  b320dbc  #77841          [BUGFIX] IRRE file upload button not shown to BE user (Felix Rauch)
    2016-09-05  0eff172  #77843          [BUGFIX] About module: Audio player is not used anymore (Markus Hoelzle)
    2016-09-05  5faa995  #76923          [BUGFIX] Fixes the suggest wizard item click by only returning one value (Wiard van Rij)
    2016-09-04  55a6d31  #77748          [TASK] Make regexp in stdWrap_doubleBrTag readable (Jigal van Hemert)
    2016-09-04  f77a31f  #77787          [TASK] Optimized rendering of Changelogs for docs.typo3.org (Ernesto Baschny)
    2016-09-03  50bc19b  #77793          [BUGFIX] FormViewHelper can handle empty string as pageUid (Frans Saris)
    2016-09-03  83af8a9  #77664          [BUGFIX] Search also in translated records (Frans Saris)
    2016-09-03  b81666c  #77825,#71375   [BUGFIX] Re-renable drag&drop in Folder Tree (Benni Mack)
    2016-09-03  419d974  #52244          [BUGFIX] Use mbstring for capitalizing a string (Philipp Gampe)
    2016-09-03  bc3895e  #77682          [BUGFIX] Highlight searchwords in indexed_search results (Frans Saris)
    2016-09-02  fed8273  #77760          [TASK] Mention StackOverflow in README.md (Philipp Gampe)
    2016-09-02  290015b  #77755          [BUGFIX] Check for null in debug_check_recordset (Tomita Militaru)
    2016-09-02  e521b203  #77802          [FOLLOWUP][TASK] Migrate to short array syntax (Daniel Goerz)
    2016-09-02  1b70205  #76991          [BUGFIX] Scheduler: Add missing GROUPBY to exec_SELECT_queryArray calls (Morton Jonuschat)
    2016-09-02  deee791                  [TASK] Add tests for Extbase UTC date/datetime handling (Andreas Wolf)
    2016-09-02  492a60f  #77528          [BUGFIX] Fix offset issue with maxSingleDBListItems (Morton Jonuschat)
    2016-09-02  0916ff8  #76012          [BUGFIX] Show inline elements in workspaces (Robert Vock)
    2016-09-01  527e94c  #77665          [BUGFIX] Do not show dropdown arrow if maxItems=1 (Andreas Fernandez)
    2016-09-01  7120e99  #76719          [BUGFIX] Catch invalid Enum value (Sascha Egerer)
    2016-09-01  ee4953a  #77743          [CLEANUP] Change Enumeration::cast return doc to self (Sascha Egerer)
    2016-09-01  cc85c21  #77733          [BUGFIX] Use correct icon for mounting as tree root in context menu (Tymoteusz Motylewski)
    2016-08-31  169ccd9  #77721          [TASK] Remove not existing exclude from .php_cs configuration (Wouter Wolters)
    2016-08-31  391eaac  #76364          [TASK] Limit request to get logout information (Nicole Cordes)
    2016-08-31  2e82809  #39979          [BUGFIX] Highlight keywords containing utf-8 characters in pagetree search (Tymoteusz Motylewski)
    2016-08-31  5ebf815  #77706          [BUGFIX] Fix syntax errors in ext_tables.sql files (Morton Jonuschat)
    2016-08-31  e794574  #77663          [BUGFIX] Check if mount page exist before fetching icon (Georg Ringer)
    2016-08-30  9e5e15f  #77678          [BUGFIX] Exclude uid '0' from any editing action in Info > Pagetree Overview (Andreas Fernandez)
    2016-08-30  e880e89  #77690          [TASK] EXT:sys_note: Button order (Daniel Windloff)
    2016-08-30  bbabbce  #77692          [TASK] Migrate to short array syntax (Wouter Wolters)
    2016-08-30  955e9b3  #77680          [BUGFIX] Load ClickMenu JavaScript in "Backend users" module (Andreas Fernandez)
    2016-08-30  5ef0fb9  #77675          [BUGFIX] Add returnUrl to records opened by EXT:opendocs (Andreas Fernandez)
    2016-08-30  0ed411e  #77691          [TASK] Make IconRegistry::getAllRegisteredIconIdentifiers() public API (Frank Naegler)
    2016-08-30  d1a963a  #74376          [BUGFIX] Extbase cannot persist to datetime fields (Andreas Wolf)
    2016-08-29  e5d12a9  #77679          [BUGFIX] Build proper Bootstrap markup in Info > Localization Overview (Andreas Fernandez)
    2016-08-29  2ffb2e7  #75911          [BUGFIX] Enforce RSA encryption for re-login modal (Helmut Hummel)
    2016-08-25  57f6bba  #77628          [TASK] Use correct history icon in EditDocumentController (Georg Ringer)
    2016-08-25  f5d56a9  #77551          Revert "[TASK] Remove locale-workaround for PHP before 5.5" (Frans Saris)
    2016-08-24  a87f853  #77500          [BUGFIX] FilesReplacePermissionUpdate wrong where clause (Christian Kuhn)
    2016-08-24  314baf3  #77409          [BUGFIX] Provide full url as origin for embedded Youtube videos (Sebastian Michaelsen)
    2016-08-24  b18b7f7  #77539          [TASK] Prevent console warning in jsfunc.evalfield.js (Wouter Wolters)
    2016-08-24  afdfb6c  #77567          [BUGFIX] Fix wrong configuration documentation for onlineMediaHelpers (Wouter Wolters)
    2016-08-23  65b60c5  #77588          [BUGFIX] Fix sql error in EXT:linkvalidator (Daniel Windloff)
    2016-08-23  3c929da  #77566          [BUGFIX] Continue searching after empty result (Alexander Jahn)
    2016-08-23  f19438d  #77604          [BUGFIX] Keep configuration of extbase table column cache (Christian Kuhn)
    2016-08-22  1b4ea2b  #77570          [TASK] Move reload button in recycler to right (Georg Ringer)
    2016-08-22  ca05d3f  #77541          [TASK] Improve media of pages_language_overlay (Georg Ringer)
    2016-08-22  c57da74  #77568          [BUGFIX] Fix column "note" to be compatible with MySQL strict mode (Wouter Wolters)
    2016-08-21  f3ed28c  #75915          [BUGFIX] Fix unsafe URL removal in EXT:felogin (Georg Ringer)
    2016-08-21  343e3c7  #77506          [BUGFIX] Fix message "Translate to" (Georg Ringer)
    2016-08-18  5047a12  #76928          [BUGFIX] Allow URL path segments like "typo3" (Mathias Brodala)
    2016-08-18  61ae89f  #67894          [BUGFIX] Felogin form with default layout is not visible (Michiel Roos)
    2016-08-18  e8c49e4  #76948          [BUGFIX] PHP 7.1: Non-numeric value encountered (Christian Kuhn)
    2016-08-18  2e1f20b  #77423          [TASK] Update contribution walkthrough link (Christian Kuhn)
    2016-08-15  315f429  #75998          [BUGFIX] Use special treatment for language field in RelationHandler (Esteban Marín)
    2016-08-14  98b8e99  #77301          [BUGFIX] Handle l10n_parent if field is no select-type (Markus Klein)
    2016-08-09  4731960  #77356          [BUGFIX] Search in Install Tool must find input values (Frank Naegler)
    2016-08-06  3c47cec  #76996          [BUGFIX] Fix broken language flags via IconUtility::getSpriteIcon (Frank Naegler)
    2016-08-06  0c449ce1  #47981          [BUGFIX] Check opendir result in fixPermissions (Tomita Militaru)
    2016-08-05  1837485  #77287          [BUGFIX] 'eval' => 'null' field stays disabled (Frank Naegler)
    2016-08-05  ca3529c  #77411          [TASK] Remove extbase table column cache (Benni Mack)
    2016-08-05  6211329  #77418          [BUGFIX] Make EXT:filemetadata work with MySQL strict mode (Benni Mack)
    2016-08-04  f7bba98  #77323          [TASK] EXT:sysext: enlarge column field in sys_refindex to 64 chars (Jörg Bösche)
    2016-08-04  7c4656c  #70087          [TASK] EXT:form - Update documentation (Björn Jacob)
    2016-08-03  eee0e85  #77374          [BUGFIX] Opposite MM relation between both new entities not created (Oliver Hader)
    2016-08-03  e623b79  #77384          [TASK] Add functional tests for versioned MM references (Oliver Hader)
    2016-08-02  4216473  #77365          [BUGFIX] Allow array of paths in psr-4 autoload definition (Helmut Hummel)
    2016-08-02  537ab90  #77363          [BUGFIX] Fix executable permissions on files (Wouter Wolters)
    2016-08-02  f5b81f8  #77364          [BUGFIX] Semaphore test: release system resources (Markus Klein)
    2016-08-02  a1064c7  #76799          [TASK] Update "workspaces" documentation (Francois Suter)
    2016-08-02  3f2a4d9  #77353          [BUGFIX] backend_layout TCA references invalid field (Benni Mack)
    2016-08-02  a31f86c  #77348          [TASK] Update fluid image viewhelper documentation (Henry Singleton)
    2016-08-02  76efdc4  #76381          [BUGFIX] Fix auto width in extension icon in EM (Benni Mack)
    2016-08-02  c613eeb  #76866          [BUGFIX] EXT:form - Handle values of CHECKBOX and RADIO correctly (Björn Jacob)
    2016-08-02  fdcd5e3  #76868,#72369   [BUGFIX] Fix undefined Tree error in FolderBrowser (Wouter Wolters)
    2016-08-02  d918985  #77344          [!!!][BUGFIX] Rename configuration for confirmation view (Ralf Zimmermann)
    2016-07-29  ea65499  #77236          [TASK] Suggest TCA overrides for FSC content elements (Mathias Brodala)
    2016-07-29  aa622da  #77284          [BUGFIX] Fix condition for USERDEF2 in procesItemState (Stefan Bürk)
    2016-07-29  41e7f6c  #77153          [TASK] Suggest "fileinfo" PHP extension (Mathias Brodala)
    2016-07-29  c701fce  #72407          [BUGFIX] Fix blacklist in DebuggerUtility::var_dump (Wouter Wolters)
    2016-07-28  d85e7d8  #77292          [TASK] Raise version of ext:compatibility6 in upgrade wizard (Wouter Wolters)
    2016-07-27  8cf1040  #76885          [BUGFIX] Show DataHandler table in log message (Benni Mack)
    2016-07-27  040d93e  #76399,#76668,  [BUGFIX] Correct record title escaping (Nicole Cordes)
    2016-07-27  6f578e8  #76425          [TASK] Make base test classes always available (Helmut Hummel)
    2016-07-27  b0aeb22  #76729          [BUGFIX] Fix link to edit file metadata in full window (Wouter Wolters)
    2016-07-26  16b8dd5  #77191          [BUGFIX] RTE: Correct behavior on empty textfield in Firefox (Andreas Fernandez)
    2016-07-23  c5a9f7f  #77192          [BUGFIX] Fix double encoding in VersionModuleController (Wouter Wolters)
    2016-07-22  5f9ae4e  #76995          [BUGFIX] Do not throw away active session (Helmut Hummel)
    2016-07-22  2e3ce99  #77210          [BUGFIX] Respect language in Section menu (Tim Spiekerkötter)
    2016-07-22  4b47927  #77205          [BUGFIX] Make ViewHelperBaseTestcase always available (Mark Watney)
    2016-07-21  47476ae  #70074          [BUGFIX] Return to content element after closing (K J Kooistra)
    2016-07-20  dbd9b62  #77159          [BUGFIX] Allow overriding of image manipulation crop ratios (Benni Mack)
    2016-07-19  c1bf12f  #77091          [BUGFIX] Allow deletion of File Recycler in fileadmin (Steven Cardoso)
    2016-07-19  0f9b584  #77098          [BUGFIX] Prepend current path to versionNumberInFilename RewriteRule (Marco Huber)
    2016-07-19  e8fbf24  #76232          [FOLLOWUP][BUGFIX] Throw empty table name exception in TCE GroupElement (Wouter Wolters)
    2016-07-19  04d039d  #76232          [BUGFIX] Throw empty table name exception in TCE GroupElement (Petra Arentzen)
    2016-07-19  0525c47                  [TASK] Set TYPO3 version to 7.6.11-dev (TYPO3 Release Team)


