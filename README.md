# Yii Web Setup

## Introduction

This is my template on a clean web setup for a Yii project.
This includes having the document root and its public files separated from the protected files and
setting up Yii with composer for your project.

## Configuration

You also have the possibility to setup defaults configs for your project in

	protected/config/main.php
	protected/config/console.php
	protected/config/test.php

And let your clients override some of the parameters in

	protected/config/main.local.php
	protected/config/console.local.php
	protected/config/test.local.php

Feel free to post your opinion on this approach and let us create a re-usable template/setup for us Yii developers.

Maybe there are also some more dependencies or modules you suggest having by default? Let me know.

## How to use this?

- Clone the project from github, delete .git folder afterwards and git init a new repository.
- Adjust package name in composer.json
- That's it, now you are ready to develop your project.

If your project has different need on dependencies, delete composer.lock, adjust composer.json to your needs and run
composer again to install your dependencies.

## Development setup

This project is shipped with a vagrant box example setup that you can use to start developing.

- On your development machine install [Virtualbox](https://www.virtualbox.org/) and [Vagrant](https://www.vagrantup.com/).
- enter vagrant folder
- type vagrant up

It will setup everything you need to start developing. After vagrant is done, open

    http://192.168.56.5/
    
and you will see the default yii installation. This box has xhprof pre-installed and bundled with Yii.
If you want to take a look at this cool profiler, open

    protected/config/main.local.php
    
and comment in the configuration. Now you will have a debug panel on each page with a link to the profiler result.