<?php


namespace Mouf\Javascript;

use Mouf\Html\HtmlElement\HtmlString;
use Mouf\Html\Utils\WebLibraryManager\InlineWebLibrary;
use Mouf\Html\Utils\WebLibraryManager\WebLibrary;
use Psr\Container\ContainerInterface;
use TheCodingMachine\Funky\Annotations\Factory;
use TheCodingMachine\Funky\Annotations\Tag;
use TheCodingMachine\Funky\ServiceProvider;

class SyntaxHighlighterServiceProvider extends ServiceProvider
{
    /**
     * @Factory(name="jQuerySyntacHighlighterWebLibrary", tags={@Tag(name="webLibraries", priority=-10.0)})
     */
    public static function createWebLibrary(ContainerInterface $container): WebLibrary
    {
        return new WebLibrary(
            [
                'vendor/mouf/javascript.syntaxhighlighter/scripts/shCore.js',
                'vendor/mouf/javascript.syntaxhighlighter/scripts/shAutoloader.js'
            ],
            [
                'vendor/mouf/javascript.syntaxhighlighter/styles/shCore.css',
                'vendor/mouf/javascript.syntaxhighlighter/styles/shCoreDefault.css'
            ]);
    }

    /**
     * @Factory(name="jQuerySyntacHighlighter2WebLibrary", tags={@Tag(name="webLibraries", priority=-20.0)})
     */
    public static function createWebLibrary2(ContainerInterface $container): InlineWebLibrary
    {
        $rootUrl = $container->get('root_url');
        return new InlineWebLibrary(null, null, new HtmlString(
            <<<EOF
jQuery(document).ready(function() {
    SyntaxHighlighter.autoloader(
    [
        "applescript ${rootUrl}vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushAppleScript.js",
        "as3 ${rootUrl}vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushAS3.js",
        "bash ${rootUrl}vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushBash.js",
        "coldfusion ${rootUrl}vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushColdFusion.js",
        "cpp ${rootUrl}vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushCpp.js",
        "csharp ${rootUrl}vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushCSharp.js",
        "css ${rootUrl}vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushCss.js",
        "delphi ${rootUrl}vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushDelphi.js",
        "diff ${rootUrl}vendor/mouf/javascript.syntaxhighlighter/scripts/shBrush.js",
        "erlang ${rootUrl}vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushErlang.js",
        "groovy ${rootUrl}vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushGroovy.js",
        "java ${rootUrl}vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushJava.js",
        "javaFX ${rootUrl}vendor/mouf/javascript.syntaxhighlighter/scripts/shBrush.js",
        "jscript ${rootUrl}vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushJScript.js",
        "javascript ${rootUrl}vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushJScript.js",
        "js ${rootUrl}vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushJScript.js",
        "perl ${rootUrl}vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushPerl.js",
        "php ${rootUrl}vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushPhp.js",
        "plain ${rootUrl}vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushPlain.js",
        "powershell ${rootUrl}vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushPowerShell.js",
        "python ${rootUrl}vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushPython.js",
        "ruby ${rootUrl}vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushRuby.js",
        "sass ${rootUrl}vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushSass.js",
        "scala ${rootUrl}vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushScala.js",
        "sql ${rootUrl}vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushSql.js",
        "vb ${rootUrl}vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushVb.js",
        "xml ${rootUrl}vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushXml.js",
        "html ${rootUrl}vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushXml.js",
        "xhtml ${rootUrl}vendor/mouf/javascript.syntaxhighlighter/scripts/shBrushXml.js"
    ]);
    SyntaxHighlighter.all();
});
EOF
        ));
    }
}
