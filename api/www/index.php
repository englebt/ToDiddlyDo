<p>
	All responses are in JSON.
</p>

<h3>User Endpoints</h3>
<strong>Fetch all users:</strong><br>
/api/users/all <br>
<a href="/api/users/all">local.todolist.com:8008/api/users/all</a><br><br>

<strong>Fetch a single user:</strong><br>
/api/user/:id <br>
<a href="/api/user/1">local.todolist.com:8008/api/user/1</a><br><br>

<hr>

<h3>Tasks Endpoints</h3>
<strong>Fetch all tasks for a user:</strong><br>
/api/usertasks/:userid <br>
<a href="/api/usertasks/1">local.todolist.com:8008/api/usertasks/1</a><br><br>

<strong>Fetch a single task:</strong><br>
/api/task/single/:id <br>
<a href="/api/task/single/3">local.todolist.com:8008/api/task/single/3</a><br><br>

<strong>Create Task:</strong><br>
This will create an example task for user ID 1.<br>
/api/task/create <br>
<a href="/api/task/create">local.todolist.com:8008/api/task/create</a><br><br>

<strong>Delete a Task:</strong><br>
/api/task/delete/:id <br>
<a href="/api/task/delete/1">local.todolist.com:8008/api/task/delete/1</a><br><br>

<strong>Edit a Task:</strong><br>
Since this requires form data, the example API request wont do anything.<br>
/api/task/edit <br>
<a href="/api/task/edit">local.todolist.com:8008/api/task/edit</a><br><br>

<strong>Mark task Complete / Incomplete</strong><br>
This will mark task ID 3 as Complete.<br>
/api/task/mark/:id/:status <br>
<a href="/api/task/mark/3/complete">local.todolist.com:8008/api/task/mark/3/complete</a><br><br>