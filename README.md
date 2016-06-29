#Table of Contents
  * [Vagrant / VirtualBox Installation](#install)
  * [Project Setup](#setup)
  * [Gulp Setup](#gulp)
  * [How to edit your Mac / Window Hosts file](#host)
  * [Git Update - All The Time](#update)
  * [Git Push - Daily!](#push)

<br>
<br>
<a id="install"></a>
## Vagrant / VirtualBox Installation

----------------------------------------

This is the most lengthy part of the setup, IF you haven't already downloaded them, now is probably the best time to do that.

[VirtualBox](https://www.virtualbox.org/ "VirtualBox")

[Vagrant](https://www.vagrantup.com/)

_**NOTE!!! Do NOT follow any of their setup tutorials. Our nifty little "vagrant up" command handles the installation of the Linux distro for you. Easy.**_


<br>
<a id="setup"></a>
## Project Setup
----------

1. Clone https://github.com/englebt/project-1.git onto your desktop.

  If you're lazy, you can run the following:

  `$ git clone https://github.com/englebt/project-1.git`

1. You'll need to ensure you're now within the project's directory, and create your branch. Create a branch based on your username locally by running the following command:

 `$ git checkout -b "usernamehere"`

  > for me, this would look like the following:

  > `$ git checkout -b aalicki`

  >  where "usernamehere" = your username, minus the quotation marks. Git automagically pushed you into that branch once you created it, from here on out, you'll be working in this branch.

1. At this point, you should see a directory named "api" with other files, and many subdirectories in it, if this is the case, good job, everything is going smoothly.

1. You'll need to ensure you're still in the project directory. You'll now need to run the following:

 `$ vagrant up`

  this command will spinup a local VM for you to work in. If you do   not yet have Vagrant or Virtual Box, you'll need to install those   (it's a long but simple process, RIP coffee machine).

  Assuming you've been able to "\*vagrant up\*" at this point, we're   going to move on to verifying your local VM is actually working.

1. You should now navigate to local.todolist.com:8008 in your browsers. If you get here, and see the default index page, then you've successfully been able to install the project properly. Have a beer or something.


<br>
<a id="host"></a>
## How to edit your Mac / Window Hosts file
----------------------------------------

In order to access local.todolist.com:8008, you're going to edit your HOSTS file. On Windows this is found at:

 _**C:\\Windows\\System32\\drivers\\etc\\hosts**_

On a Mac, this is located at:

 _**/private/etc/hosts**_

I recommend copying this file to your desktop, editing it, then dragging it back into the folder, and overwriting it.

Here is what you'll need to enter into that file:

 _**127.0.0.1 local.todolist.com**_

This will allow our local host to access the project, in which our Vagrant Up command earlier has made available in the VM.

The editing / line entry is the same for both Mac and Windows.


<br>
<a id="gulp"></a>
## Gulp Setup
-----
1. Lets install node and npm by first using [Node Js](https://nodejs.org/en/)</span> installer by downloading the LTS version of the installer.

  1. To check if **Node** and **NPM** installed successfully please run:

    `$ node -v`
    and
    `$ npm -v`

1. Once Node JS is successfully installed it'll be time to install *Gulp CLI* by running the following command in the terminal:

 `npm install --global gulp-cli`
 1. To check if **Node** and *NPM* installed successfully please run:

    `$ gulp -v`

    You should see something similar to this in your terminal meaning you installed it successfully:

    `[01:53:05] CLI version 3.9.1`
    `[01:53:05] Local version 3.9.1`

1. Cool, now lets get to the nitty gritty of this setup by navigating to the root of the directory if you haven't. If you already are or have already navigated to the very root of the project folder run the following commmand to install the dependency:

  `npm install`

  It'll then go into the proccess of installing each and every dependency.

1. After the installation is completed from the previous step all that's left to do is simply run:

  `$ gulp`

  a new browser window will open with `localhost:8080`. All files where we will be making changes would be in the _**src**_ folder which we use scss for the css preprocessor. In the _**views**_ Folder is where images, minified css _**(please make any changes to css in the src/scss/ folder)**_, and any JS files are located as well as our index file.


<br>
<a id="update"></a>
## Git Update - All the time
----------------------------------------

In order to stay up to date with the latest code, you'll need to run a git pull on the master branch. This ensures that all of the latest merged code goes into your local branch.

Run the following command to make magic happen:

 `$ git pull origin master`

<span class="def">_**origin**_</span> is the remote branch of our primary project.
<span class="def">_**master**_</span> is the branch name in which all of our code gets put into.


<br>
<a id="push"></a>
## Git Push - Daily!
----------------------------------------

Working on something? Please don't forget to run a git push so that the repo has your code, there is a minor chance you may get hit by a bus, and while we would hate for that to happen, we still need your code. So PUSH!

Run the following to ensure your latest code gets pushed to the repo:

1. `$ git add -A`

  This adds ALL of the files you've been working on.

1. `$ git commit -m "message here, example."`

  this is the commit message, keep it related to what you work on. It can really be confusing should we ever need to rebase or revert changes.

1. `$ git push origin BRANCHNAME`

  This then pushes the code to the branch you're associated with on the repo. Obviously, replace BRANCHNAME with the name of the repo you're working under.
>  In my case, I would do the following:
 `$ git push origin aalicki`
