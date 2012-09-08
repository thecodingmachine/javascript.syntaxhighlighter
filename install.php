<?php
require_once __DIR__."/../../autoload.php";

use Mouf\Actions\InstallUtils;
use Mouf\MoufManager;
use Mouf\Html\Utils\WebLibraryManager\WebLibraryInstaller;

// Let's init Mouf
InstallUtils::init(InstallUtils::$INIT_APP);

// Let's create the instance
$moufManager = MoufManager::getMoufManager();


if ($moufManager->instanceExists("javascript.syntaxHighlighter")) {
	$syntaxHighlighter = $moufManager->getInstanceDescriptor("javascript.syntaxHighlighter");
} else {
	$syntaxHighlighter = $moufManager->createInstance("\\Mouf\\Javascript\\SyntaxHighlighterWebLibrary");
	$syntaxHighlighter->setName("javascript.syntaxHighlighter");
}

$webLibraryManager = $moufManager->getInstanceDescriptor('defaultWebLibraryManager');
if ($webLibraryManager) {
	$libraries = $webLibraryManager->getProperty("webLibraries")->getValue();
	$libraries[] = $syntaxHighlighter;
	$webLibraryManager->getProperty("webLibraries")->setValue($libraries);
}

// Let's rewrite the MoufComponents.php file to save the component
$moufManager->rewriteMouf();

// Finally, let's continue the install
InstallUtils::continueInstall();
?>