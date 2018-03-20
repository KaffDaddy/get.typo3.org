# Get.typo3.org

Symfony 4 application for release notes, download redirects and JSON API for releases.

## Generating new release notes HTML

- Go to `Build/MdConverter`
- Write release notes as .md file (in release-notes/ReleaseNotes)
- have pandoc installed
- add pandoc path to .env file (see .env.tmpl) in `Build/MdConverter`
- do composer install in Build/MdConverter 
- call `php Build/MdConverter/ConvertReleaseNotes` from project root
- wait. commit. push.

# Installation

- composer install
- edit .env vars
- create sqlite database: var/gettr.db