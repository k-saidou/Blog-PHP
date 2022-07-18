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

/* main/index.html.twig */
class __TwigTemplate_7d52c665cd5f6ecf63cbb21561a1870f2acc0df67e824d88f4f1bb1388b4eec9 extends Template
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
        $this->parent = $this->loadTemplate("default.html.twig", "main/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    <!-- Page Header-->
    <header class=\"masthead\" style=\"background-image: url('assets/img/home-bg.jpg')\">
        <div class=\"container position-relative px-4 px-lg-5\">
            <div class=\"row gx-4 gx-lg-5 justify-content-center\">
                <div class=\"col-md-10 col-lg-8 col-xl-7\">
                    <div class=\"site-heading\">
                        <h1>developpeur Web</h1>
                        <span class=\"subheading\">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["posts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 19
            echo "    <div class=\"container px-4 px-lg-5\">
        <div class=\"row gx-4 gx-lg-5 justify-content-center\">
            <div class=\"col-md-10 col-lg-8 col-xl-7\">
                <!-- Post preview-->
                <div class=\"post-preview\">
                    <a href=\"post.html\">
                        <h2 class=\"post-title\">";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "titre", [], "any", false, false, false, 25), "html", null, true);
            echo " <a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "id_show", [], "any", false, false, false, 25), "html", null, true);
            echo "\"></a>  </h2>
                        <h3 class=\"post-subtitle\">Problems look mighty small from 150 miles up</h3>
                    </a>
                    <p class>";
            // line 28
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $this->extensions['Twig\Extra\String\StringExtension']->createUnicodeString(twig_get_attribute($this->env, $this->source, $context["post"], "contenu", [], "any", false, false, false, 28)), "truncate", [0 => 200, 1 => "...", 2 => false], "method", false, false, false, 28), "html", null, true);
            echo "</p>
                    <p class=\"post-meta\">
                        Posted by
                        <a href=\"#!\">Start Bootstrap</a>
                        on September 24, 2022
                    </p>

                </div>
                <!-- Divider-->
                <hr class=\"my-4\" />
                <!-- Pager-->
            </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "                    <div class=\"d-flex justify-content-end mb-4\"><a class=\"btn btn-primary text-uppercase\" href=\"about.html\">Voir tous les posts →</a></div>
        </div>

    </div>

";
    }

    public function getTemplateName()
    {
        return "main/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 41,  86 => 28,  78 => 25,  70 => 19,  66 => 18,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "main/index.html.twig", "C:\\wamp64\\www\\Blog-PHP\\views\\main\\index.html.twig");
    }
}
