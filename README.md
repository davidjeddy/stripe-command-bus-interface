# Stripe Command Bus Interface

## Badges
[![Build Status](https://travis-ci.org/davidjeddy/stripe-command-bus-interface.svg?branch=master)](https://travis-ci.org/davidjeddy/stripe-command-bus-interface)
[![Latest Stable Version](https://poser.pugx.org/davidjeddy/stripe-command-bus-interface/v/stable?format=flat-square)](https://packagist.org/packages/davidjeddy/stripe-command-bus-interface)
[![Total Downloads](https://poser.pugx.org/davidjeddy/stripe-command-bus-interface/downloads)](https://packagist.org/packages/davidjeddy/stripe-command-bus-interface)
[![Latest Unstable Version](https://poser.pugx.org/davidjeddy/stripe-command-bus-interface/v/unstable?format=flat-square)](https://packagist.org/packages/davidjeddy/stripe-command-bus-interface)
[![License](https://poser.pugx.org/davidjeddy/stripe-command-bus-interface/license?format=flat-square)](https://packagist.org/packages/davidjeddy/stripe-command-bus-interface)
[![Monthly Downloads](https://poser.pugx.org/davidjeddy/stripe-command-bus-interface/d/monthly?format=flat-square)](https://packagist.org/packages/davidjeddy/stripe-command-bus-interface)
[![Daily Downloads](https://poser.pugx.org/davidjeddy/stripe-command-bus-interface/d/daily?format=flat-square)](https://packagist.org/packages/davidjeddy/stripe-command-bus-interface)
[![composer.lock](https://poser.pugx.org/davidjeddy/stripe-command-bus-interface/composerlock?format=flat-square)](https://packagist.org/packages/davidjeddy/stripe-command-bus-interface)
[![codecov](https://codecov.io/gh/davidjeddy/stripe-command-bus-interface/branch/master/graph/badge.svg)](https://codecov.io/gh/davidjeddy/stripe-command-bus-interface)
[![Maintainability](https://api.codeclimate.com/v1/badges/778bacb18bbdcda58ac7/maintainability)](https://codeclimate.com/github/davidjeddy/stripe-command-bus-interface/maintainability)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/1977432a-f69f-480d-a0cb-1f65627ba8f3/big.png)](https://insight.sensiolabs.com/projects/1977432a-f69f-480d-a0cb-1f65627ba8f3)

## Status / Version

EARLY ALPHA! I had a need so I created a solution.
(See [SemVer](http://semver.org/) for an explanation of version numbering.)

## Credit

Could not do this without the work of [Eugene Terentev](https://github.com/trntv).

## Description

A limited selection of [command bus](https://www.sitepoint.com/command-buses-demystified-a-look-at-the-tactician-package/)
style classes that overlay the Stripe PHP API classes.

## Install

Either
 - `composer install davidjeddy/stripe-command-bus-interface`
 - or add `"davidjeddy/stripe-command-bus-interface": "*",` to your projects composer.json in the `required` sections,
    -[THEN](https://www.youtube.com/channel/UCPSfjD7o1CQZXzdAy56c8kg) run `composer install`.

## Usage
1) Add the desired classes to your application classes `use` statements.

2) Implement command bus logic in the class:

```PHP
# basic command bus class to handler
$response = $commandBus->handle(
    # the Stripe Command Bus core class. All requests pass through this class.
    new CreateHandler([
        # the Stripe data is passed to the command bus handlers as the `data` property
        'data' => [
            'description'   => 'Test Co. LLC',
            'email'         => 'test@email.com',
        ]
    ])
);
```

 - `$response` is passed from the Stripe class response back to your application.
 - When mapping information for a Stripe class, it will always be contained within the 'data' array key.
