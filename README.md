# Laravel 5 Installer

PHP installer for setting Laravel up. It will help with the following setup:

* Ensure **.env exists** and will copy it from **.env.example**
* Check **.env** if the **APP_KEY** is set, if not it run `php artisan key:generate` for you
* **Create Database** with a wizard and put values in **.env**

## Install Laravel Installer



### Clone project into project.dev`/public/installer`
```bash
cd public
git clone git@github.com:dwoodard/installer.git
```

goto url project.dev/installer/index.php


## Scripts

Scripts give you the abilty to add diffent functionality

```
\---installer
    +---css
    +---images
    +---js
    |   +---bootstrap
    \---scripts
    	+---
```

### Workflow
index.php uses a jquery wizard plugin called  [jquery.steps](https://github.com/rstaib/jquery-steps/wiki)
* `index.php` is where you add inputs and tabs to wizard 

* Give **inputs** a name which will be use by `$_POST`

````html
<input type="text" name="field"/>` is used server-side like `$_POST['field']
````

install.php

````php
include $install_src_path . '/database.php';
include $install_src_path . '/queue.php';
include $install_src_path . '/settings.php';
````

Allows for additional scripts to be added