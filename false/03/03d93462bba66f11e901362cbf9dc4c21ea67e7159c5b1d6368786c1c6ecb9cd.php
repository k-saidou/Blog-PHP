<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* posts/show.html.twig */
class __TwigTemplate_9378c392ba5fe68af9f1a65dc7b69442aa18f916ff8a6b5a7e533ace241ed353 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "default.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("default.html.twig", "posts/show.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "       
        <!-- Page Header-->
        <header class=\"masthead\" style=\"background-image: url('assets/img/post-bg.jpg')\">
            <div class=\"container position-relative px-4 px-lg-5\">
                <div class=\"row gx-4 gx-lg-5 justify-content-center\">
                    <div class=\"col-md-10 col-lg-8 col-xl-7\">
                        <div class=\"post-heading\">
                            <h1>";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["post"] ?? null), "titre", [], "any", false, false, false, 11), "html", null, true);
        echo "</h1>
                            <h2 class=\"subheading\">Problems look mighty small from 150 miles up</h2>
                            <span class=\"meta\">
                                Posted by
                                <a href=\"#!\">Start Bootstrap</a>
                                on August 24, 2022
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class=\"mb-4\">
            <div class=\"container px-4 px-lg-5\">
                <div class=\"row gx-4 gx-lg-5 justify-content-center\">
                    <div class=\"col-md-10 col-lg-8 col-xl-7\">
                        <p class>";
        // line 28
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["post"] ?? null), "contenu", [], "any", false, false, false, 28), "html", null, true);
        echo "</p>
                            Placeholder text by
                            <a href=\"http://spaceipsum.com/\">Space Ipsum</a>
                            &middot; Images by
                            <a href=\"https://www.flickr.com/photos/nasacommons/\">NASA on The Commons</a>
                        </p>
                    </div>
                </div>
            </div>
        </article>

";
    }

    public function getTemplateName()
    {
        return "posts/show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 28,  59 => 11,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "posts/show.html.twig", "C:\\wamp64\\www\\Blog-PHP\\views\\posts\\show.html.twig");
    }
}
