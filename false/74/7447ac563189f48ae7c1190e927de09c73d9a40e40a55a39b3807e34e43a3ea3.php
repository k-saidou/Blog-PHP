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

/* posts/index.html.twig */
class __TwigTemplate_f2005b2f236f9cc3d5ba7df75d689037d275a2357f394e69a3168d3a8390f51c extends Template
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
        $this->parent = $this->loadTemplate("default.html.twig", "posts/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    
        <!-- Page Header-->
        <header class=\"masthead\" style=\"background-image: url('assets/img/about-bg.jpg')\">
            <div class=\"container position-relative px-4 px-lg-5\">
                <div class=\"row gx-4 gx-lg-5 justify-content-center\">
                    <div class=\"col-md-10 col-lg-8 col-xl-7\">
                        <div class=\"page-heading\">
                            <h1>All Post</h1>
                            <span class=\"subheading\"></span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["posts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 20
            echo "        <!-- Main Content-->
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"post-preview col-lg-6 col-md-6\">
                    <a href=\"post.html\">
                        <h2 class=\"post-title\">";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "titre", [], "any", false, false, false, 25), "html", null, true);
            echo "</h2>
                        <h3 class=\"post-subtitle\">Problems look mighty small from 150 miles up</h3>
                    </a>
                    <p class=\"post-meta\">
                        Posted by
                        <a href=\"#!\">Start Bootstrap</a>
                        on September 24, 2022
                    </p>
                </div>
                </div>
            </div>
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "posts/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 25,  71 => 20,  67 => 19,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "posts/index.html.twig", "C:\\wamp64\\www\\Blog-PHP\\views\\posts\\index.html.twig");
    }
}
