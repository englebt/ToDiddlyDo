Project Setup
----------
**Step 1:** Clone https://github.com/englebt/project-1.git onto your desktop.
If you're lazy, you can run the following:

    git clone https://github.com/englebt/project-1.git

**Step 2:** You'll need to ensure you're now within the project's directory, and create your branch. Create a branch based on your username locally by running the following command: 

    git checkout -b "usernamehere"
for me, this would look like the following:

    git checkout -b aalicki

where "usernamehere" = your username, minus the quotation marks. Git automagically pushed you into that branch once you created it, from here on out, you'll be working in this branch.

**Step 3:** At this point, you should see a directory named "api" with other files, and many subdirectories in it, if this is the case, good job, everything is going smoothly.

**Step 4:** You'll need to ensure you're still in the project directory. You'll now need to run the following:

    vagrant up
this command will spinup a local VM for you to work in. If you do not yet have Vagrant or Virtual Box, you'll need to install those (it's a long but simple process, RIP coffee machine).

Assuming you've been able to "*vagrant up*" at this point, we're going to move on to verifying your local VM is actually working.

**Step 5:** You should now navigate to local.todolist.com:8008 in your browsers. If you get here, and see the default index page, then you've successfully been able to install the project properly. Have a beer or something.


----------

How to edit your Mac / Window Hosts file
----------------------------------------
In order to access local.todolist.com:8008, you're going to edit your HOSTS file. On Windows this is found at:

    C:\Windows\System32\drivers\etc\hosts

On a Mac, this is located at:

    /private/etc/hosts

I recommend copying this file to your desktop, editing it, then dragging it back into the folder, and overwriting it.

Here is what you'll need to enter into that file:

    127.0.0.1   local.todolist.com
This will allow our local host to access the project, in which our Vagrant Up command earlier has made available in the VM.

The editing / line entry is the same for both Mac and Windows.


----------

Vagrant / VirtualBox Installation
----------------------------------------
Yes, this is the most lengthy part of the setup, IF you haven't already downloaded them, now is probably the best time to do that. 

VirtualBox: https://www.virtualbox.org/
Vagrant: https://www.vagrantup.com/

NOTE!!! Do NOT follow any of their setup tutorials. Our nifty little "vagrant up" command handles the installation of the Linux distro for you. Easy.

----------
Git Update - All the time
----------------------------------------
In order to stay up to date with the latest code, you'll need to run a git pull on the master branch. This ensures that all of the latest merged code goes into your local branch.
Run the following command to make magic happen:

    git pull origin master
*origin* is the remote branch of our primary project. *master* is the branch name in which all of our code gets put into.

----------
Git Push - Daily
----------------------------------------

Working on something? Please don't forget to run a git push so that the repo has your code, there is a minor chance you may get hit by a bus, and while we would hate for that to happen, we still need your code. So PUSH!

Run the following to ensure your latest code gets pushed to the repo:

    git add -A
This adds ALL of the files you've been working on.

    git commit -m "message here, example."
this is the commit message, keep it related to what you work on. It can really be confusing should we ever need to rebase or revert changes.

    git push origin BRANCHNAME
This then pushes the code to the branch you're associated with on the repo. Obviously, replace BRANCHNAME with the name of the repo you're working under. In my case, I would do the following:

    git push origin aalicki
=======
# project-1