# bookwrapper
Test task for https://github.com/Chubik/phpdevtest/

# Install
The preferred way to install this extension is through <a href="http://getcomposer.org/download/">composer</a>.<br />
<pre>
composer require kolenchuk/bookwrapper:dev-master
</pre>

#Basic usage example
<pre>
&lt;?php
require_once 'vendor/autoload.php';

$wrapper = new \BookApiWrapper\BookApiWrapper();
print_r($wrapper->getAuthors());
print_r($wrapper->getBooks());
print_r($wrapper->getAuthorBooks(1));
</pre>

