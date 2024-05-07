<!-- @format -->

# Roff o Kap

<h2>About this project</h2>

This is a REST API built with vanilla PHP that outputs JSON. Use this project as
a base to build a frontend view or work with it through Postman.

#Installation

<ol>
<li>Clone this repository and put it into your MAMP folder <i>htdocs</i>.</li>
<li>Create the database with your preferred database-name in phpMyAdmin or MySQL Workbench and import the sql-querys from the sql-file found in the <b>db</b> folder-</li>
<li>In the <b>db</b> folder, create a file called config.php and put in your host, database name, user and password. <i>Tip: you can ask chatGPT for a template.</i></li>
<li>Use Postman to test these endpoints:</li>
<ul>
<li>/items/</li>
<li>/item/{$id}</li>
<li>/sellers/</li>
<li>/seller/{$id}</li>
<li>/sellers-items/</li>
<li>/sellers-total/</li>
<li>/submitted-items-amount/</li>
</ul>
</ol>
