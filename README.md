# Yii Web Setup

This is my template on a clean web setup for a Yii project.
This includes having the document root and its public files separated from the protected files and
setting up Yii with composer for your project.

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

# How to use this?

Clone the project from github, delete .git folder afterwards and git init a new repository.
That's it, now you are ready to develop your project.

If your project has different need on dependencies, delete composer.lock, adjust composer.json to your needs and run
composer again to install your dependencies.
