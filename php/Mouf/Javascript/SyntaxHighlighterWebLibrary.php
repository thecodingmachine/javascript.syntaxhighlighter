<?php
namespace Mouf\Javascript;

use Mouf\Html\Utils\WebLibraryManager\WebLibraryInterface;
use Mouf\Html\Utils\WebLibraryManager\WebLibraryRendererInterface;

/**
 * This class can be used to insert the JS and CSS files required to run SyntaxHighlighter.
 * Insert an instance of this class in the defaultWebLibraryManager of your application and your code sample will automatically be highlighted.
 * See: <a href="http://alexgorbatchev.com/SyntaxHighlighter">http://alexgorbatchev.com/SyntaxHighlighter</a>
 *
 * @Component
 */
class SyntaxHighlighterWebLibrary implements WebLibraryInterface, WebLibraryRendererInterface {
	
    /**
     * List of brushes loaded dynamically.
     * A brush = a supported language.
     *
     * See <a href="http://alexgorbatchev.com/SyntaxHighlighter/manual/installation.html">http://alexgorbatchev.com/SyntaxHighlighter/manual/installation.html</a> for more information.
     *
     * Brushes in this list will be loaded dynamically if a matching class is found on page load. 
     *
     * @Property
     * @var array<string, string> The key is the name of the language, the value the file of the brush.
     */
    public $brushes;
    
    /**
     * List of brushes loaded statically (each time the page is loaded).
     * A brush = a supported language.
     *
     * See <a href="http://alexgorbatchev.com/SyntaxHighlighter/manual/installation.html">http://alexgorbatchev.com/SyntaxHighlighter/manual/installation.html</a> for more information.
     *
     * @Property
     * @var array<string>
     */
    public $staticBrushes = array();
    
    
    /**
     * Theme file.
     *
     * @Property
     * @var string
     */
    public $theme;
    
    public function __construct() {
    	$this->theme = 'vendor/mouf/javascript.syntaxhighlighter/styles/shCoreDefault.css';
    	
    	$this->brushes = array(
    		"applescript" => 'vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushAppleScript.js',
	    	"as3" => 'vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushAS3.js',
	    	"bash" => 'vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushBash.js',
	    	"coldfusion" => 'vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushColdFusion.js',
	    	"cpp" => 'vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushCpp.js',
	    	"csharp" => 'vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushCSharp.js',
	    	"css" => 'vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushCss.js',
	    	"delphi" => 'vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushDelphi.js',
	    	"diff" => 'vendor/mouf/javascript.syntaxhighlighter/scripts/shBrush.js',
	    	"erlang" => 'vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushErlang.js',
	    	"groovy" => 'vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushGroovy.js',
	    	"java" => 'vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushJava.js',
	    	"javaFX" => 'vendor/mouf/javascript.syntaxhighlighter/scripts/shBrush.js',
	    	"jscript" => 'vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushJScript.js',
	    	"javascript" => 'vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushJScript.js',
	    	"js" => 'vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushJScript.js',
	    	"perl" => 'vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushPerl.js',
	    	"php" => 'vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushPhp.js',
	    	"plain" => 'vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushPlain.js',
	    	"powershell" => 'vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushPowerShell.js',
	    	"python" => 'vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushPython.js',
	    	"ruby" => 'vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushRuby.js',
	    	"sass" => 'vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushSass.js',
	    	"scala" => 'vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushScala.js',
	    	"sql" => 'vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushSql.js',
	    	"vb" => 'vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushVb.js',
	    	"xml" => 'vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushXml.js',
    		"html" => 'vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushXml.js',
    		"xhtml" => 'vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushXml.js',
    	);
    }
    
    
    /**
     * Returns an array of Javascript files to be included for this library.
     *
     * @return array<string>
     */
    public function getJsFiles() {
    	return array();
    }
    
    /**
     * Returns an array of CSS files to be included for this library.
     *
     * @return array<string>
     */
    public function getCssFiles() {
    	return array();
    }
    
    /**
     * Returns a list of libraries that must be included before this library is included.
     *
     * @return array<WebLibraryInterface>
     */
    public function getDependencies() {
    	return array();
    }
    
    /**
     * Returns a list of features provided by this library.
     * A feature is typically a string describing what the file contains.
     *
     * For instance, an object representing the JQuery library would provide the "jquery" feature.
     *
     * @return array<string>
     */
    public function getFeatures() {
    	return array();
    }
    
    /**
     * Returns the renderer class in charge of outputing the HTML that will load CSS ans JS files.
     *
     * @return WebLibraryRendererInterface
     */
    public function getRenderer() {
    	return $this;
    }
    
    /**
     * Renders the CSS part of a web library.
     *
     * @param WebLibraryInterface $webLibrary
     */
    function toCssHtml(WebLibraryInterface $webLibrary) {
    	echo '<link href="'.ROOT_URL.'vendor/mouf/javascript.syntaxhighlighter/styles/shCore.css" rel="stylesheet" type="text/css" />'."\n";
    	if($this->theme) {
    		if(strpos($this->theme, 'http://') === false && strpos($this->theme, 'https://') === false) {
    			$url = ROOT_URL.$this->theme;
    		} else {
    			$url = $this->theme;
    		}
    		echo '<link href="'.$url.'" rel="stylesheet" type="text/css" />'."\n";
    	}
    }
    
    /**
     * Renders the JS part of a web library.
     *
     * @param WebLibraryInterface $webLibrary
     */
    function toJsHtml(WebLibraryInterface $webLibrary) {
    	echo '<script type="text/javascript" src="'.ROOT_URL.'vendor/mouf/javascript.syntaxhighlighter/scripts/shCore.js"></script>';
    	echo '<script type="text/javascript" src="'.ROOT_URL.'vendor/mouf/javascript.syntaxhighlighter/scripts/shAutoloader.js"></script>';
    	foreach ($this->staticBrushes as $brush) {
    		echo '<script type="text/javascript" src="'.ROOT_URL.$brush.'"></script>';
    	}
    }
    
    /**
     * Renders any additional HTML that should be outputed below the JS and CSS part.
     *
     * @param WebLibraryInterface $webLibrary
     */
    function toAdditionalHtml(WebLibraryInterface $webLibrary) {
    	echo '<script type="text/javascript">';
    	echo "jQuery(document).ready(function() {\n";
    	$jsStringArray = array();
    	foreach ($this->brushes as $key=>$value) {
    		if(strpos($value, 'http://') === false && strpos($value, 'https://') === false) {
    			$url = ROOT_URL.$value;
    		} else {
    			$url = $value;
    		}
    		$jsStringArray[] = json_encode($key." ".$url);
    	}
    	
    	echo "\nSyntaxHighlighter.autoloader(";
    	echo implode(",", $jsStringArray);
    	echo ");\n";
    	echo "SyntaxHighlighter.all();\n";
    	echo "});\n";
    	echo '</script>';
    }
}
?>