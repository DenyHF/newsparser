RSS Channels Parser
===================

[![Build Status][testing-image]][testing-link]
[![Scrutinizer Code Quality][scrutinizer-code-quality-image]][scrutinizer-code-quality-link]
[![Code Coverage][code-coverage-image]][code-coverage-link]

### Commands
```bash
php bin/console app:project:parse -vvv
```

### Consumers
```bash
php bin/console app:queue:project:channel:parse -vvv
```

[testing-link]: https://travis-ci.org/khaperets/newsparser
[testing-image]: https://travis-ci.org/khaperets/newsparser.svg?branch=master
[code-coverage-link]: https://scrutinizer-ci.com/g/khaperets/newsparser/?branch=master
[code-coverage-image]: https://scrutinizer-ci.com/g/khaperets/newsparser/badges/coverage.png?b=master
[scrutinizer-code-quality-link]: https://scrutinizer-ci.com/g/khaperets/newsparser/?branch=master
[scrutinizer-code-quality-image]: https://scrutinizer-ci.com/g/khaperets/newsparser/badges/quality-score.png?b=master
