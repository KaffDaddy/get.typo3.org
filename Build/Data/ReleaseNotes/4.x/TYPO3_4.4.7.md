Release Notes for TYPO3 4.4.7
=============================

This document contains information about TYPO3 version 4.4.7 which was
released on February 23, 2011.

News
----

This version is a maintenance release and contains bugfixes only.

Download
--------

<https://typo3.org/download/>

MD5 checksums
-------------

    af88d6aeb97cd8a746d8a506c6faf561  dummy-4.4.7.tar.gz
    b447f7f9832348340081ba9a9930bf3a  dummy-4.4.7.zip
    77ec411f06cd16f0379958c09116ca90  typo3_src-4.4.7.tar.gz
    e97bd6c41e68d480c6c5dc760b71e2b2  typo3_src-4.4.7.zip
    5d20fcf28bdd26ebced7fa7438bf5169  typo3_src+dummy-4.4.7.zip
    9840334bf78a379f8cf348bf727a84ee  introductionpackage-4.4.7.zip

Upgrading
---------

The usual upgrading procedure applies; no database updates are
necessary.

Changelog
---------

    2011-02-23  Oliver Hader  <oliver.hader@typo3.org>

        * Release of TYPO3 4.4.7

    2011-02-23  Oliver Hader  <oliver.hader@typo3.org>

        * Fixed bug #17719: Move donation popup to about module (thanks to Steffen Kamper)
        * Follow-up to bug #17719: Removed unused files

    2011-02-23  Tolleiv Nietsch  <typo3@tolleiv.de>

        * Fixed bug #17511: tx_install_session::write doesn't fix permissions

    2011-02-23  Thorsten Kahler  <thorsten.kahler@dkd.de>

        * Fixed bug #17501: User setup - pressing return creates installtool file (Thanks to Steffen Kamper)

    2011-02-23  Francois Suter  <francois.suter@typo3.org>

        * Fixed bug #16636: Suggest wizard does not work with drop-down select fields

    2011-02-22  Jigal van Hemert  <jigal@xs4all.nl>

        * Fixed bug #16656: ImageMagick does not work with quotes in exec() path on Windows

    2011-02-22  Stanislas Rolland  <typo3@sjbr.ca>

        * Fixed bug #17695: htmlArea RTE: Removing format may remove content

    2011-02-22  Steffen Ritter  <info@steffen-ritter.net>

        * Fixed bug #16891: showpic.php causes a fatal error if parameters GET variable is not an array (Thanks to Helmut Hummel)

    2011-02-21  Jigal van Hemert  <jigal@xs4all.nl>

        * Fixed bug #17498: The refresh login dialogue is shown even if the session already timed out (Thanks to Helmut Hummel)

    2011-02-20  Stanislas Rolland  <typo3@sjbr.ca>

        * Follow-up to issue #17677: htmlArea RTE: Classes configuration is loaded twice
        * Fixed bug #17669: htmlArea RTE: Dialogue window positioning properties not honoured

    2011-02-19  Stanislas Rolland  <typo3@sjbr.ca>

        * Fixed bug #17676: htmlArea RTE: Some combo stores are loaded twice
        * Fixed bug #17677: htmlArea RTE: Classes configuration is loaded twice

    2011-02-17  Stanislas Rolland  <typo3@sjbr.ca>

        * Fixed bug #17616: htmlArea RTE: Link dialogue doesn't open when anchor class is set with double quotes

    2011-02-15  Stanislas Rolland  <typo3@sjbr.ca>

        * Fixed bug #17587: htmlArea RTE: RTE should not be enabled on Android

    2011-02-14  Tolleiv Nietsch  <typo3@tolleiv.de>

        * Fixed bug #17541: cookies are not required in CLI mode / cookieSecure blocks cli

    2011-02-11  Christian Kuhn  <lolli@schwarzbu.ch>

        * Fixed bug #16534: Exception message for missing memcache wrong
        * Fixed bug #15721: Memcache::delete() without timeout param causes loss of memcache server in pool (Thanks to Michiel Ross)

    2011-02-10  Christian Kuhn  <lolli@schwarzbu.ch>

        * Fixed bug #12230: Function tslib_cObj::crop() is not fully multibyte safe (Thanks to Vladimir Podkovanov)

    2011-02-05  Steffen Gebert  <steffen@steffen-gebert.de>

        * Fixed bug #17374: implode() issues in Install Tool

    2011-02-02  Christian Kuhn  <lolli@schwarzbu.ch>

        * Fixed bug #17087: BE user password not changable via setup module with "saltedpasswords" (Thanks to Marcus Krause)

    2011-02-01  Stanislas Rolland  <typo3@sjbr.ca>

        * Fixed bug #17373: Standalone images in RTE-enabled field not rendered in frontend

    2011-01-21  Stanislas Rolland  <typo3@sjbr.ca>

        * Fixed bug #17140: htmlArea RTE: In WebKit, RTE inserts incorrect link if text is double-clicked
        * Updated htmlArea RTE version to 2.0.8
        * Fixed bug #17160: htmlArea RTE: Link editing problems in Internet Explorer

    2011-01-19  Stanislas Rolland  <typo3@sjbr.ca>

        * Fixed bug #17156: htmlArea RTE: Disable Cell merge button in FF when less than two cells are selected

    2011-01-18  Stanislas Rolland  <typo3@sjbr.ca>

        * Fixed bug #16045: htmlArea RTE: Merging table cells using context menu doesn't work in Firefox

    2011-01-17  Steffen Gebert  <steffen@steffen-gebert.de>

        * Fixed bug #17066: Wrong PHPDoc comment for t3lib_div::writeFileToTypo3tempDir

    2011-01-16  Francois Suter  <francois.suter@typo3.org>

        * Fixed bug #17069: Scheduler: Refresh icon has disappeared

    2011-01-14  Christian Kuhn  <lolli@schwarzbu.ch>

        * Fixed bug #17036: Misleading deprecation comment getReferenceHTML()

    2011-01-11  Christian Kuhn  <lolli@schwarzbu.ch>

        * Fixed bug #17036: Misleading deprecation comment getReferenceHTML()
        * Fixed bug #16967: [Caching framework] Remove not existing "GlobalsBackend" from config_default.php

    2011-01-10  Christian Kuhn  <lolli@schwarzbu.ch>

        * Fixed bug #15133: Rendering images with ImageMagick fails to set file permissions (Thanks to Alexander Grein)

    2011-01-09  Stanislas Rolland  <typo3@sjbr.ca>

        * Fixed bug #13695: Image output in frontend is not xhtml valid
        * Fixed bug #5896: Inserting a divider (<hr>) in the RTE breaks XHTML validation (and other things)

    2011-01-07  Stanislas Rolland  <typo3@sjbr.ca>

        * Fixed bug #16904: htmlArea RTE: Trailing slash stripped from href of autolinks
        * Fixed bug #16750: htmlArea RTE: Popup layer for editing links is not resizeable in IE

    2011-01-06  Steffen Gebert  <steffen@steffen-gebert.de>

        * Fixed bug #16030: Page tree root node lacks white-space: nowrap
        * Fixed bug #16828: missing XCLASS statement in t3lib/class.t3lib_compressor.php

    2011-01-05  Steffen Kamper  <steffen@typo3.org>

        * Fixed bug #16900: [Cache] Filebackend fails on windows

    2011-01-04  Jeff Segars  <jeff@webempoweredchurch.org>

        * Fixed bug #15466: meaningfulTempFilePrefix does not convert Umlauts and special characters (Thanks to Sebastian Michaelsen)

    2011-01-01  Susanne Moog  <typo3@susanne-moog.de>

        * Fixed bug #16308: displayEditIcons expects array, null given (Thanks to Daniel Müller)

    2010-12-31  Christian Kuhn  <lolli@schwarzbu.ch>

        * Fixed bug #16231: Mail not sent if safe mode is on (Thanks to Boris Gulay)

    2010-12-30  Christian Kuhn  <lolli@schwarzbu.ch>

        * Fixed bug #15034: Login to backend fails with IPv6 Address as HTTP_HOST (Thanks to Roland Schenke)
        * Fixed bug #10480: Add missing header in auto_respond_msg (Thanks to Christian Buelter)

    2010-12-29  Christian Kuhn  <lolli@schwarzbu.ch>

        * Fixed bug #16849: [Unit tests] fixPermissions* tests rely on availability of posix_getegid() (Thanks to Steffen Gebert)
        * Fixed bug #16847: Use Tx_Phpunit_Service_TestFinder for finding the path of the Core unit tests (Thanks to Oliver Klee)

    2010-12-28  Christian Kuhn  <lolli@schwarzbu.ch>

        * Fixed bug #15969: Task Center - sys_action: setting labels_ignoreprefix from sql query is ignored (Thanks to Andreas Kiessling)

    2010-12-28  Steffen Gebert  <steffen@steffen-gebert.de>

        * Fixed bug #16093: Media content object with selection of "HTML Embed Element" does not respect dimension settings (Thanks to Simon Schaufelberger)
